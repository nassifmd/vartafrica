<?php

namespace App\Exports;

use App\Models\UserDebit;
use App\Models\Admin;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserDebitExport implements FromCollection, WithHeadings
{

    protected $request;

    function __construct($request) {
        $this->request = $request;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return UserDebit::all();
        $deductions =  Admin::select("users.admin_id","admins.name as username","users.balance")
            ->leftJoin("users", "admins.id", "users.admin_id")
            ->leftJoin("orders", "orders.user_id", "users.id")
            // ->selectRaw('sum(orders.quantity_ordered) as quantity_ordered')
            // ->selectRaw('sum(users.save_amount)+sum(users.save_amount2) as save_amount')
            // ->selectRaw('sum(users.balance) as balance')
            // ->selectRaw('sum(orders.quantity_ordered) as net_order_value')
            // ->selectRaw('sum(orders.quantity_ordered) as total_price')
            ->leftJoin("user_debits", "user_debits.user_id", "users.id")
            ->selectRaw('sum(user_debits.amount) as deduction');
        if($this->request->agent_id != "all" && is_numeric($this->request->agent_id))
            $deductions->where("admins.id", $this->request->agent_id);
        $deductions->where("admins.type", 'Agent');

        return $deductions->groupBy('admins.id')->get();
    }

    public function headings(): array
    {
        return [

            'Id',
            'Agent',
            'Balance of all farmers',
            'Deduction',
        ];
    }
}
