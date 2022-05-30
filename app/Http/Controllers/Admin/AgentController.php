<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Spatie\Permission\Models\Role;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function index () {
		return view("admin.agents.profiles");
	}

    public function generate(Request $request)
    {
        $roles = Role::all();
        return view("admin.agents.index", compact('roles'));
    }

    public function save ()
    {
        $admin = Admin::create([
            'type' => 'Agent',
            'admin_id' => \Auth::user()->id,
            'name' => request()->name,
            'email' => request()->email,
            'country_code' => request()->country_code,
            'mobile_number' => request()->mobileNumber,
            'country' => request()->country,
            'district' => request()->district,
            'password' => Hash::make(request()->password)
        ]);

        $admin->assignRole(request()->role);

        $details = [
            'name' => 'Mail from Vartafrica',
            'email' => request()->email,
            'password' => request()->password,
        ];

        // \Mail::to('nasnickmd@gmail.com')->send(new SendMail($details));

		return response()->json([
			'success' => true,
			'message' => 'New Agent Created successfully'
		]);
	}

    public function get () {
        $agents = Admin::select(['admins.id',
            'admins.name',
            'admins.district',
            'admins.country',
            'admins.mobile_number',
            'admins.created_at'])->where('type', 'Agent')->where('admin_id', \Auth::user()->id);

        return Datatables::of($agents)
            ->rawColumns(['name'])
            ->make(true);
	}
}
