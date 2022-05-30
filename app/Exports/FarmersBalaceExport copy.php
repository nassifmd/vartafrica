<?php

namespace App\Exports;

use App\Models\Card;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FarmersBalaceExport implements FromView
{
    protected $request;

    function __construct($request) {
        $this->request = $request;
    }

    public function view() :View
    {
        $cards = Card::select(['cards.id',
        'cards.serial',
        'cards.amount',
        'cards.used_at',
        'users.name as used_by'])
        ->leftJoin("users", "users.id", "cards.used_by")
        ->where("cards.is_used", true)
        ->where('users.id', request()->farmer_id)
        ->where('users.admin_id', \Auth::user()->id)
        ->get();

        return view('admin.reports.views.farmer_balance', [
            'cards' => $cards,
        ]);
    }
}
