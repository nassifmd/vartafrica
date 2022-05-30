<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Spatie\Permission\Models\Role;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminRegisterationController extends Controller
{
    public function index () {
		return view("admin.admin_reg.profiles");
	}

    public function generate(Request $request)
    {
        $roles = Role::all();
        return view("admin.admin_reg.index", compact('roles'));
    }

    public function save ()
    {
        $admin = Admin::create([
            'type' => 'Admin-2',
            'name' => request()->Name,
            'company' => request()->companyName,
            'contact_person' => request()->contactPersonName,
            'email' => request()->email,
            'country_code' => request()->country_code,
            'country' => request()->country,
            'mobile_number' => request()->mobileNumber,
            'country' => request()->country,
            'password' => Hash::make(request()->password)
        ]);

        $admin->assignRole(request()->role);

        $details = [
            'name' => 'Mail from Vartafrica',
            'email' => request()->email,
            'password' => request()->password,
        ];

        // \Mail::to(request()->email)->send(new SendMail($details));

        if($admin){
            return response()->json([
                'success' => true,
                'message' => 'New Admin Created successfully'
            ]);
        } else{
            return response()->json([
                'success' => false,
                'message' => 'Sorry Something went wrong!'
            ]);
        }
	}

    public function get () {
        $admins = Admin::select(['admins.id',
            'admins.name',
            'admins.company',
            'admins.contact_person',
            'admins.mobile_number',
            'admins.country',
            'admins.created_at'])->where('type', 'Admin-2');

        return Datatables::of($admins)
            ->rawColumns(['name'])
            ->make(true);
	}
}
