<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FarmerAPIController extends Controller
{
    //
    public function register(Request $request)
    {
        $token = $request->headers->get('token');
        $user = Admin::where('api_token', $token)->first();
        $admin_id = '';
        $user_id = '';
        if($request->has('user_side'))
           // $user_id = \Auth::user()->id;
           $user_id = $user->id;
        elseif($request->has('farmers')){
            //$admin_id = \Auth::user()->id;
            $admin_id = $user->id;
            $user_id = request()->farmers;
        }
        $total_quantity=0;
        foreach(request()->seed_quantity as $seed_quantity)
            $total_quantity += $seed_quantity;
        Order::create([
            'admin_id' => $admin_id,
            'user_id' => $user_id,
            'crop_cultivated' => request()->crop_cultivated,
            'variety' => implode(',', request()->variety),
            'total_quantity' => $total_quantity,
            'quantity_ordered' => implode(',', request()->seed_quantity),
            'unit_price' => implode(',', request()->unit_price),
            'total_price' => implode(',', request()->total_price),
            'disc_value_per_unit' => request()->dis_val_per_unit,
            'net_order_value' => request()->net_order_val,
            'total_net_saving_goal' => request()->total_net_saving_goal,
            'target_saving_amount' => request()->save_amount
            //'prcnt_of_net_saving_goal' => request()->prcnt_of_net_saving_goal,
            // 'period_of_package_delivery' => request()->period_of_package_delivery
        ]);
        return response()->json(['sucess' => true, 'msg' => 'Order Creatd successfully']);
}
}
