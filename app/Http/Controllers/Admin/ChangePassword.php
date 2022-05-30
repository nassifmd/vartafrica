<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class ChangePassword extends Controller {

	public function index () {
		return view("admin.change_password");
	}

	public function save () {
		$user = Admin::find(auth()->user()->id);

		if(!$user)
			return response()->json([
				'success' => false,
				'message' => 'User not found, Please check your login'
			]);


		$old_password = Hash::check(request()->old_password, $user->password);
		if(!$old_password) 
			return response()->json([
				'success' => false,
				'message' => 'The provided password does not match your current password.'
			]);

		$user->password = Hash::make(request()->new_password);

		if(!$user->save())
			return response()->json([
				'success' => false,
				'message' => 'Error updating password, Please try again'
			]);
		auth()->logout();
		return response()->json([
			'success' => true,
			'message' => 'Password changed successfully, Please login again'
		]);
	}

}