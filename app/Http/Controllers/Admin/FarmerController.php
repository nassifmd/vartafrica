<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Card;
use Illuminate\Support\Facades\Hash;

use Yajra\DataTables\DataTables;

class FarmerController extends Controller
{
    public function index () {
		return view("admin.farmers.profiles");
	}

    public function generate()
    {
        return view("admin.farmers.index");
    }

    public function save ()
    {
        request()->validate([
            'password' => 'required|min:8'
        ]);

        User::create([
            'admin_id' => \Auth::user()->id,
            'name' => request()->first_name,
            'last_name' => request()->last_name,
            'username' => request()->user_name,
            'location' => request()->location,
            'country_code' => request()->country_code,
            'contact' => request()->mobileNumber,
            'age' => request()->age,
            'sex' => request()->sex,
            'next_of_kin_name' => request()->next_of_kin_name,
            'next_of_kin_phone' => request()->next_of_kin_phone,
            'village' => request()->village,
            'parish' => request()->parish,
            'sub_county' => request()->sub_county,
            'district' => request()->district,
            'country' => request()->country,
            'latitude' => request()->latitude,
            'longitude' => request()->longitude,
            'disability_status' => request()->disability_status,
            'land_area' => request()->land_area,
            'mechanization_needed' => request()->mechanization_needed,
            'fertilizer' => request()->fertilizer,
            //'target_package' => implode(',', request()->target_package),
            //'save_amount' => request()->save_amount,
            //'save_amount2' => request()->save_amount2,
            'password' => Hash::make(request()->password)
        ]);

        $msg = "Hello! Your account details are: Username: ".request()->user_name." Password: ".request()->password;
        $num = request()->country_code.request()->mobileNumber;
        $resp = send_sms($msg, $num);
        return redirect()->back()->with('msg', 'New Farmer Created successfully');
	}

    public function get () {
        $users = User::select(['users.id',
            'users.name',
            'users.sex',
            'users.contact',
            'users.district',
            'users.country',
            'users.created_at'])
            ->join("admins", "admins.id", "users.admin_id");

        return Datatables::of($users)
            ->rawColumns(['name'])
            ->make(true);
	}

    public function order()
    {
        $farmers = User::orderBy('id', 'Desc')->get();
        return view("admin.farmers.order", compact('farmers'));
    }

    public function register(Request $request)
    {
        $admin_id = '';
        $user_id = '';
        if($request->has('user_side'))
            $user_id = \Auth::user()->id;
        elseif($request->has('farmers')){
            $admin_id = \Auth::user()->id;
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
		return redirect()->back()->with('msg', 'Order Created Successfully');
    }

    public function recharge()
    {
        $farmers = User::orderBy('id', 'Desc')->get();
        return view("admin.farmers.recharge", compact('farmers'));
    }

    public function rechargePost(Request $request)
    {
        $request->validate([
            'farmers' => 'required',
            'serial_number' => 'required'
        ]);

        $is_valid_card = Card::where('serial', request()->serial_number)->first();
        if(!empty($is_valid_card)){
            if($is_valid_card->is_used!=1){
                $is_valid_card->is_used = 1;
                $is_valid_card->used_by = request()->farmers;
                $is_valid_card->used_at = now();
                $is_valid_card->save();

                $farmer = User::findOrFail(request()->farmers);

                //$resp = $this->SendSMS('Vartafrica', '+256774733492', "testing");
                $msg = "You have successfully uploaded UGX ".$is_valid_card->amount;
                $num = $farmer->contry_code.$farmer->contact;
                $resp = send_sms($msg, $num);

                $farmer->balance = $farmer->balance + $is_valid_card->amount;
                if($farmer->save()){
                    return redirect()->back()->with('msg', 'Farmer Recharged Successfully with Card Serial Number: '.request()->serial_number);
                }

            } else{
                return redirect()->back()->with('msg', 'Card Already Used With Serial Number: '.request()->serial_number);
            }
        } else {
            return redirect()->back()->with('msg', 'Card With Serial Number: '.request()->serial_number.' Not Found.');
        }
    }

    public function SendSMS($sender,$number,$message)
    {

        $data= array(
            'method'=>'SendSms',
            'userdata'=> array(
                'username'=>'nas1',// Egosms Username
                'password'=>'Greatminds1@' //Egosms Password
            ),
            'msgdata'=> array(
                'number'=>233233302007,
                'message'=>'elias',
                'senderid'=>'Vartafrica'
            )
        );

        $json_builder =json_encode($data);
        //use curl to post the the json encoded information
        $ch = curl_init('http://www.egosms.co/api/v1/json/');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_builder);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $ch_result = curl_exec($ch);
        curl_close($ch);
        //print an array that is json decoded
        print_r(json_decode($ch_result,true));
    }
}
