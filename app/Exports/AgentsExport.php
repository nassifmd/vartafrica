<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class AgentsExport implements FromCollection, WithHeadings
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
        return Admin::all();

        $agents = Admin::select("admins.id", "admins.name", "admins.country",
                DB::raw('count(users.name) as total_farmers'),
                DB::raw('count(cards.id) as used_cards'),
                DB::raw('sum(cards.amount) as total_amount'),
            )
            ->join("users", "admins.id", "users.admin_id")
            ->join("cards", "cards.admin_id", "admins.id")
            ->where("cards.is_used", 1)
            ->groupBy('admins.id');


		if($this->request->agent_id != "all" && is_numeric($this->request->agent_id))
			$agents->where("admins.id", $this->request->agent_id);

        return $agents->orderBy('id', $this->request->order_type)->get();
    }

    public function headings(): array
    {
        return [
            // 'ID',
            // 'User',
            // 'Country',
            // 'Total Farmers',
            // 'Total Used Cards',
            // 'Total Amount Received'
            'ID',
            'NAME',
            'ADMIN-ID',
            'EMAIL',
            'EMAIL VERIFIED',
            'ADMIN TYPE',
            'COMPANY NAME',
            'CONTACT PERSON',
            'MOBILE NUMBER',
            'COUNTRY',
            'DISTRICT',
            'REGISTERED ON',
            'UPDATED ON',
        ];
    }
}
