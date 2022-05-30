<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Card;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Dompdf\Dompdf;

class ActiveCardsExport implements FromView
{
    protected $request;

    function __construct($request) {
        $this->request = $request;
    }

    public function view(): View
    {
        $cards = Card::select("cards.id", "cards.amount", "cards.serial", "cards.created_at", "admins.name as created_by")
					->where("cards.is_used", false)
					->leftJoin("admins", "admins.id", "cards.admin_id");

		if($this->request->created_by != "all" && is_numeric($this->request->created_by))
			$cards->where("cards.admin_id", $this->request->created_by);
		if($this->request->amount_type == "custom")
			$cards->where("cards.amount", $this->request->amount_operator,$this->request->amount_value);

		if($this->request->custom_dates == "on"){
			$dates = explode("-", str_replace(" ", "", $this->request->selected_dates));
			$start_date = $dates[0] ?? date("m-d-Y");
			$end_date = $dates[1] ?? date("m-d-Y");
			$cards->whereBetween("cards.created_at", [Carbon::parse($start_date)->format("Y-m-d 00:00:00"), Carbon::parse($end_date)->format("Y-m-d 23:59:59")]);
		}

		$cards = $cards->orderBy("cards.created_at")->get();

        return view('admin.reports.views.cards.active', [
            'cards' => $cards,
            'request' => $this->request
        ]);
    }
}
