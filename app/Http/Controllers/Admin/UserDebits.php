<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Str;
use App\Models\UserDebit;
use App\Models\User;
use Auth;
use Yajra\DataTables\DataTables;

class UserDebits extends Controller {

	public function index () {
		return view("admin.user_debits.index");
	}

	public function form () {
		return view("admin.user_debits.form");
	}

	public function save () {
		$amount = request()->amount;
		$user_id = request()->user_id;
		$user = User::find($user_id);
		if(!$user)
			return response()->json([
				'success' => false,
				'message' => "User not found"
			]);
		if($amount > $user->balance)
			return response()->json([
				'success' => false,
				'message' => "User balance less than debit amount"
			]);
		$debit = new UserDebit();
		$debit->amount = $amount;
		$debit->admin_id = Auth::id();
		$debit->user_id = $user_id;
		if(!$debit->save())
			return response()->json([
				'success' => false,
				'message' => "Error debit user"
			]);
		$user->balance -= $amount;
		$user->save();
		return response()->json([
			'success' => true,
			'message' => "User debited successfully"
		]);
	}

	public function get () {
        $debits = UserDebit::select(['user_debits.id',
            'user_debits.amount',
            'user_debits.created_at',
            'users.name as username',
            'admins.name as created_by'])
        	->leftJoin("admins", "admins.id", "user_debits.admin_id")
        	->leftJoin("users", "users.id", "user_debits.user_id");

        return Datatables::of($debits)
            ->make(true);
	}

	public function getUsers () {
		return response()->json(User::select("id", "name", "balance")->get());
	}

	public function getPackages () {
		return response()->json(User::select("id", "target_package", "save_amount")->where('id', request()->id)->first());
	}
	
    public function getAgents () {
		return response()->json(Admin::select("id", "name")->where('type', 'Agent')->get());
	}

}
