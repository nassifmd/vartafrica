<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\UserDebit;
use App\Models\User;
use App\Models\Card;
use App\Models\Admin;
use Auth;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use DB;

class UserReports extends Controller {

	public function cards () {
		$request = request();
		$cards = Card::select("cards.id", "cards.amount", "cards.serial", "cards.used_at")
					->where("cards.is_used", true)
					->where("cards.used_by", auth()->user()->id);
		
		if($request->amount_type == "custom")
			$cards->where("cards.amount", $request->amount_operator,$request->amount_value);
		
		if($request->custom_dates == "on"){
			$dates = explode("-", str_replace(" ", "", $request->selected_dates));
			$start_date = $dates[0] ?? date("m-d-Y");
			$end_date = $dates[1] ?? date("m-d-Y");
			$cards->whereBetween("cards.used_at", [Carbon::parse($start_date)->format("Y-m-d 00:00:00"), Carbon::parse($end_date)->format("Y-m-d 23:59:59")]);
		}
		

		$cards = $cards->orderBy("cards.used_at")->get();
		return view("reports.views.cards", ['cards' => $cards, 'request' => $request]);
	}

	public function debits () {
		$request = request();
		$debits = UserDebit::select("user_debits.id", "user_debits.amount", "user_debits.created_at")
					->where("user_debits.user_id", auth()->user()->id);
		
		if($request->amount_type == "custom")
			$debits->where("user_debits.amount", $request->amount_operator,$request->amount_value);
		
		if($request->custom_dates == "on"){
			$dates = explode("-", str_replace(" ", "", $request->selected_dates));
			$start_date = $dates[0] ?? date("m-d-Y");
			$end_date = $dates[1] ?? date("m-d-Y");
			$debits->whereBetween("user_debits.created_at", [Carbon::parse($start_date)->format("Y-m-d 00:00:00"), Carbon::parse($end_date)->format("Y-m-d 23:59:59")]);
		}
		
		$debits = $debits->orderBy("user_debits.created_at")->get();
		return view("reports.views.debits", ['debits' => $debits, 'request' => $request]);
	}

}