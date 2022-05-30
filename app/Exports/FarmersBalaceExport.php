<?php

namespace App\Exports;

use App\Models\Admin;
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
        $balances =  Admin::select("admins.name as agent_name", "users.username as user_name")
            ->join("users", "users.admin_id", "admins.id")
            ->join("orders", "orders.user_id", "users.id")
            ->selectRaw('sum(orders.total_quantity) as total_quantity_ordered')
            ->selectRaw('sum(orders.net_order_value) as net_order_value')
            ->selectRaw('sum(orders.total_net_saving_goal) as total_net_saving_goal')
            ->selectRaw('sum(users.balance) as total_balance')
            ->where('admins.id', \Auth::user()->id);

        if($this->request->farmer_id != "all" && is_numeric($this->request->farmer_id))
            $balances->where("admins.id", $this->request->farmer_id);

        $balances = $balances->groupBy('admins.id')->get();

        return view('admin.reports.views.farmer_balance', [
            'balances' => $balances
        ]);
    }
}
