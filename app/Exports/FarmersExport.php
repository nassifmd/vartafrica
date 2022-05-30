<?php

namespace App\Exports;

use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class FarmersExport implements FromCollection, WithHeadings
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
        // return User::all();
        $request = request();
		$users = User::select("users.name", "users.last_name", "users.username",
                    "users.contact", "users.sex", "users.age", "users.village",
                    "users.parish", "users.sub_county", "users.district", "users.country",
                    "users.disability_status", "users.land_area", "users.mechanization_needed",
                    "users.fertilizer", "users.next_of_kin_name", "users.next_of_kin_phone",
                    "users.longitude", "users.latitude",

    );


		return $users->orderBy('id', $request->order_type)->get();
    }

    public function headings() :array
    {
        return [
            'First Name',
            'Last Name',
            'Username',
            'Contact',
            'Sex',
            'Age',
            'Village',
            'Parish',
            'Subcounty',
            'District',
            'Country',
            'Disability Status',
            'Land Size',
            'Mechnaization',
            'Fertilizer',
            'Next of Kin Name',
            'Next of Kin Mobile Number',
            'GPS Longitude',
            'GPS latitude',
        ];
    }
}
