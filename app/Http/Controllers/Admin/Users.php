<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\DataTables;

class Users extends Controller {

	public function index () {
		return view("admin.users.index");
	}

	public function view ($id) {
		$user = User::findOrFail($id);
		return view("admin.users.view", compact('user'));
	}

	public function get () {
        $users = User::select(['users.id',
            'users.name',
            'users.username',
            // 'users.email',
            'users.balance',
            'users.contact',
            'users.crop_cultivated',
            'users.seed_quantity',
            'users.sex',
            'users.age',
            'users.target_package',
            'users.save_amount',
            'users.next_of_kin_name',
            'users.next_of_kin_phone',
            'users.village',
            'users.parish',
            'users.sub_county',
            'users.district',
            'users.country',
            'users.latitude',
            'users.disability_status',
            'users.land_area',
            'users.mechanization_needed',
            'users.fertilizer',
            'users.created_at']);

        return Datatables::of($users)
            ->rawColumns(['name'])
            ->editColumn('name', '<a href="{{ route("admin.users.view", $id) }}">{{ $name }}</a>')
            ->make(true);
	}

}
