<?php

namespace App\Exports;

use App\Models\UserDebit;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserDebitExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return UserDebit::all();
        return UserDebit::select("users.name as username", "admins.name as created_by", "users.id", "user_debits.amount", "user_debits.created_at")
            ->leftJoin("users", "users.id", "user_debits.user_id")
            ->leftJoin("admins", "admins.id", "user_debits.admin_id")
            ->orderBy("user_debits.created_at", "DESC")
            ->take(10)
            ->get();
    }

    public function headings(): array
    {
        return [
            'User ID',
            'Name',
            'Date',
            'Amount',
            'Created By'
        ];
    }
}
