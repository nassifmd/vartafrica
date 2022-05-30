<?php 

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;

class UserCards extends Controller {


	public function charge () {
		$serial = strtoupper(request()->serial);
		if(strlen($serial) != 16)
			return response()->json([
				'success' => false,
				'message' => "Card length must be 16 alphabetical"
			]);

		$card = Card::where("serial", $serial)->first();

		if(!$card)
			return response()->json([
				'success' => false,
				'message' => "Invalid card serial"
			]);

		if($card->is_used){
			if($card->used_by == auth()->user()->id)
				return response()->json([
					'success' => false,
					'message' => "Card used by you at ".$card->used_at
				]);
			else
				return response()->json([
					'success' => false,
					'message' => "Card used"
				]);
		}

		$card->used_by = auth()->user()->id;
		$card->is_used = true;
		$card->used_at = date("Y-m-d H:i:s");

		if(!$card->save())
			return response()->json([
					'success' => false,
					'message' => "Error charging card, Please try again"
				]);

		$user = User::find(auth()->user()->id);
		$user->balance += $card->amount;
		$user->save();

		return response()->json([
					'success' => true,
					'message' => "Card charged successfully with amount ".number_format($card->amount)
				]);
	}


}