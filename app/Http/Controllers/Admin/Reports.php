<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Carbon\Carbon;
use App\Models\Card;
use App\Models\User;
use App\Models\Admin;
use App\Models\UserDebit;
use Illuminate\Support\Str;
use App\Exports\AgentsExport;
use App\Exports\FarmersExport;
use App\Exports\UsedCardsExport;
use App\Exports\UserDebitExport;
use Yajra\DataTables\DataTables;
use App\Exports\ActiveCardsExport;
use App\Exports\FarmersBalaceExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;

class Reports extends Controller {

	public function index () {
		$admins = Admin::select("id", "name")->get();
		return view("admin.reports.index", ['admins' => $admins]);
	}

	public function generateActive () {
        $request = request();

        if ($request->has('excel'))
        return Excel::download(new ActiveCardsExport($request), 'ActiveCards.xlsx');
        else
        return Excel::download(new ActiveCardsExport($request), 'ActiveCards.pdf');
        exit;

		$request = request();
		$cards = Card::select("cards.id", "cards.amount", "cards.serial", "cards.created_at", "admins.name as created_by")
					->where("cards.is_used", false)
					->leftJoin("admins", "admins.id", "cards.admin_id");

		if($request->created_by != "all" && is_numeric($request->created_by))
			$cards->where("cards.admin_id", $request->created_by);
		if($request->amount_type == "custom")
			$cards->where("cards.amount", $request->amount_operator,$request->amount_value);

		if($request->custom_dates == "on"){
			$dates = explode("-", str_replace(" ", "", $request->selected_dates));
			$start_date = $dates[0] ?? date("m-d-Y");
			$end_date = $dates[1] ?? date("m-d-Y");
			$cards->whereBetween("cards.created_at", [Carbon::parse($start_date)->format("Y-m-d 00:00:00"), Carbon::parse($end_date)->format("Y-m-d 23:59:59")]);
		}

		$cards = $cards->orderBy("cards.created_at")->get();
		return view("admin.reports.views.cards.active", ['cards' => $cards, 'request' => $request]);
	}

    public function generateActivepdf () {
        $request = request();

        return Excel::download(new ActiveCardsExport($request), 'ActiveCards.pdf');
        exit;

		$request = request();
		$cards = Card::select("cards.id", "cards.amount", "cards.serial", "cards.created_at", "admins.name as created_by")
					->where("cards.is_used", false)
					->leftJoin("admins", "admins.id", "cards.admin_id");

		if($request->created_by != "all" && is_numeric($request->created_by))
			$cards->where("cards.admin_id", $request->created_by);
		if($request->amount_type == "custom")
			$cards->where("cards.amount", $request->amount_operator,$request->amount_value);

		if($request->custom_dates == "on"){
			$dates = explode("-", str_replace(" ", "", $request->selected_dates));
			$start_date = $dates[0] ?? date("m-d-Y");
			$end_date = $dates[1] ?? date("m-d-Y");
			$cards->whereBetween("cards.created_at", [Carbon::parse($start_date)->format("Y-m-d 00:00:00"), Carbon::parse($end_date)->format("Y-m-d 23:59:59")]);
		}

		$cards = $cards->orderBy("cards.created_at")->get();
		return view("admin.reports.views.cards.active", ['cards' => $cards, 'request' => $request]);
	}

	public function generateUsed () {
        $request = request();
        return Excel::download(new UsedCardsExport($request), 'UsedCards.xlsx');
        exit;

		$request = request();
		$cards = Card::select("cards.id", "cards.amount", "cards.serial", "cards.used_at", "admins.name as created_by", "users.name as used_by")
					->where("cards.is_used", true)
					->leftJoin("admins", "admins.id", "cards.admin_id")
					->leftJoin("users", "users.id", "cards.used_by");

		if($request->created_by != "all" && is_numeric($request->created_by))
			$cards->where("cards.admin_id", $request->created_by);
		if($request->user_id != "all" && is_numeric($request->user_id))
			$cards->where("cards.used_by", $request->user_id);
		if($request->amount_type == "custom")
			$cards->where("cards.amount", $request->amount_operator,$request->amount_value);

		if($request->custom_dates == "on"){
			$dates = explode("-", str_replace(" ", "", $request->selected_dates));
			$start_date = $dates[0] ?? date("m-d-Y");
			$end_date = $dates[1] ?? date("m-d-Y");
			$cards->whereBetween("cards.used_at", [Carbon::parse($start_date)->format("Y-m-d 00:00:00"), Carbon::parse($end_date)->format("Y-m-d 23:59:59")]);
		}

		$cards = $cards->orderBy("cards.used_at")->get();
		return view("admin.reports.views.cards.used", ['cards' => $cards, 'request' => $request]);
	}

	public function generateDebits () {
		$request = request();
		$debits = UserDebit::select("user_debits.id", "user_debits.amount", "user_debits.created_at", "admins.name as created_by", "users.name as used_by")
					->leftJoin("admins", "admins.id", "user_debits.admin_id")
					->leftJoin("users", "users.id", "user_debits.user_id");

		if($request->created_by != "all" && is_numeric($request->created_by))
			$debits->where("user_debits.admin_id", $request->created_by);
		if($request->user_id != "all" && is_numeric($request->user_id))
			$debits->where("user_debits.user_id", $request->user_id);
		if($request->amount_type == "custom")
			$debits->where("user_debits.amount", $request->amount_operator,$request->amount_value);

		if($request->custom_dates == "on"){
			$dates = explode("-", str_replace(" ", "", $request->selected_dates));
			$start_date = $dates[0] ?? date("m-d-Y");
			$end_date = $dates[1] ?? date("m-d-Y");
			$debits->whereBetween("user_debits.created_at", [Carbon::parse($start_date)->format("Y-m-d 00:00:00"), Carbon::parse($end_date)->format("Y-m-d 23:59:59")]);
		}

		$debits = $debits->orderBy("user_debits.created_at")->get();
		return view("admin.reports.views.debits", ['debits' => $debits, 'request' => $request]);
	}

	public function generateUserBalance () {
		$request = request();
		$users = User::select("users.id", "users.balance", "users.name", "users.username", "users.age", "users.sex", "users.target_package", "users.save_amount"
			, DB::raw('sum(user_debits.amount) as total_debits'))
					->join("user_debits", "user_debits.user_id", "users.id");

		if($request->user_id != "all" && is_numeric($request->user_id))
			$users->where("users.id", $request->user_id);
		if($request->amount_type == "custom")
			$users->where("users.balance", $request->amount_operator,$request->amount_value);

		if($request->order_by == "debits")
			$order_by = 'total_debits';
		else
			$order_by = 'users.balance';

		$users->groupBy("users.id", "users.balance", "users.name", "users.username");

		$users = $users->orderBy($order_by, $request->order_type)->get();

		return view("admin.reports.views.user_balance", ['users' => $users, 'request' => $request]);
	}

    public function generateAgent () {
        $request = request();
        return Excel::download(new AgentsExport($request), 'agents.xlsx');
        exit;

        $request = request();
		$agents = Admin::select("admins.id", "admins.name", "admins.country",
                DB::raw('count(users.id) as total_farmers'),
                DB::raw('count(cards.id) as used_cards')
            )
            ->join("users", "admins.id", "users.admin_id")
            ->join("cards", "cards.admin_id", "admins.id")
            ->where("cards.is_used", 1);

		if($request->agent_id != "all" && is_numeric($request->agent_id))
			$agents->where("admins.id", $request->agent_id);

		$agents = $agents->orderBy('id', $request->order_type)->get();

		return view("admin.reports.views.agent", ['agents' => $agents, 'request' => $request]);
	}

    public function generateFarmer () {

        $request = request();

        if ($request->has('excel'))
        return Excel::download(new FarmersExport($request), 'farmers.xlsx');
        else

        return Excel::download(new FarmersExport($request), 'farmers.pdf');

      exit;

		$request = request();
		$users = User::select("users.id", "users.name", "users.username",
                "users.contact", "users.sex", "orders.crop_cultivated",
                "orders.variety", "orders.created_at", "users.country",
                "orders.quantity_ordered", "orders.disc_value_per_unit",
                "orders.net_order_value", "users.balance",
                DB::raw('count(cards.id) as used_cards')
                )
                ->join("orders", "orders.user_id", "users.id")
                ->join("cards", "cards.used_by", "users.id")
                ->where("cards.is_used", 1)
                ->where("users.admin_id", Auth::user()->id);

		if($request->farmer_id != "all" && is_numeric($request->farmer_id))
			$users->where("users.id", $request->farmer_id);

		$users = $users->orderBy('id', $request->order_type)->get();

		return view("admin.reports.views.farmer", ['users' => $users, 'request' => $request]);
	}

    public function generateFarmerpdf () {
        $request = request();
        //return Excel::download(new FarmersExport($request), 'farmers.xlsx');

         return Excel::download(new FarmersExport($request), 'farmers.pdf');

        exit;

		$request = request();
		$users = User::select("users.id", "users.name", "users.username",
                "users.contact", "users.sex", "orders.crop_cultivated",
                "orders.variety", "orders.created_at", "users.location",
                "orders.quantity_ordered", "orders.disc_value_per_unit",
                "orders.net_order_value", "users.balance",
                DB::raw('count(cards.id) as used_cards')
                )
                ->join("orders", "orders.user_id", "users.id")
                ->join("cards", "cards.used_by", "users.id")
                ->where("cards.is_used", 1)
                ->where("users.admin_id", Auth::user()->id);

		if($request->farmer_id != "all" && is_numeric($request->farmer_id))
			$users->where("users.id", $request->farmer_id);

		$users = $users->orderBy('id', $request->order_type)->get();

		return view("admin.reports.views.farmer", ['users' => $users, 'request' => $request]);
	}

    public function generateFarmerBalance()
    {
        $request = request();
        return Excel::download(new FarmersBalaceExport($request), 'farmersbalance.xlsx');
        exit;

        $cards = Card::select(['cards.id',
        'cards.serial',
        'cards.amount',
        'cards.used_at',
        'users.name as used_by'])
        ->leftJoin("users", "users.id", "cards.used_by")
        ->where("cards.is_used", true)->where('users.id', request()->farmer_id)->get();

        return view("admin.reports.views.farmer_balance", ['cards' => $cards]);
    }

	public function generateUserProfile () {
		$request = request();
		$users = User::select("users.id", "users.balance", "users.name", "users.username", "users.age", "users.sex", "crop_cultivated", "seed_quantity", "contact", "location", "users.target_package", "users.save_amount", "users.next_of_kin_name", "users.next_of_kin_phone",
			 DB::raw('sum(user_debits.amount) as total_debits'))
					->leftjoin("user_debits", "user_debits.user_id", "users.id");

		if($request->user_id != "all" && is_numeric($request->user_id))
			$users->where("users.id", $request->user_id);
		if($request->amount_type == "custom")
			$users->where("users.balance", $request->amount_operator,$request->amount_value);

		if($request->order_by == "debits")
			$order_by = 'total_debits';
		else
			$order_by = 'users.balance';

		$users->groupBy("users.id", "users.balance", "users.name", "users.username");

		$users = $users->orderBy($order_by, $request->order_type)->get();

		return view("admin.reports.views.user_profile", ['users' => $users, 'request' => $request]);
	}

    public function generateFarmerDeductions()
    {
        $request = request();
        return Excel::download(new UserDebitExport($request), 'UserDebit.xlsx');
        exit;
        $userDebits = UserDebit::select("users.name as username", "admins.name as created_by", "users.id", "user_debits.amount", "user_debits.created_at")->leftJoin("users", "users.id", "user_debits.user_id")->leftJoin("admins", "admins.id", "user_debits.admin_id")->orderBy("user_debits.created_at", "DESC")->take(10)->get();
        return view("admin.reports.views.deductions", ['userDebits' => $userDebits]);
    }

}
