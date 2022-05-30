<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Card;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsedCardsExport implements FromView
{
    protected $request;

    function __construct($request) {
        $this->request = $request;
    }

    public function view(): View
    {
        $request = request();
		$cards = Card::select("cards.id", "cards.amount", "cards.serial", "cards.used_at", "admins.name as created_by", "users.name as used_by")
					->where("cards.is_used", true)
					->leftJoin("admins", "admins.id", "cards.admin_id")
					->leftJoin("users", "users.id", "cards.used_by")
                    ->where("admins.id", \Auth::user()->id);

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

        return view('admin.reports.views.cards.used', [
            'cards' => $cards,
            'request' => $this->request
        ]);
    }
}
