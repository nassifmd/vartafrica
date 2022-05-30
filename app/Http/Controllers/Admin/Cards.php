<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Card;
use Auth;
use Yajra\DataTables\DataTables;

class Cards extends Controller {

	public function active () {
		return view("admin.cards.active");
	}

    public function activepdf () {
		return view("admin.cards.active");
	}

	public function used () {
		return view("admin.cards.used");
	}

	public function generate () {
		return view("admin.cards.generate");
	}

	public function save () {
        $serials = array();
        for($i=0; $i<request()->num_of_cards; $i++){
            $serial = strtoupper(bin2hex(openssl_random_pseudo_bytes(8)));
            $card = new Card();
            $card->serial = $serial;
            $card->amount = request()->amount;
            $card->admin_id = Auth::id();
            if(!$card->save())
                return response()->json([
                    'success' => false,
                    'message' => "Error saving card"
                ]);
            $serial = implode("-", str_split($serial, 4));
            $serials[] = $serial;
        }

		return response()->json([
			'success' => true,
			'serial' => $serials
		]);
	}

	public function delete ($id, $serial) {
		$serial = str_replace("-", "", $serial);
		$card = Card::where([
			'serial' => $serial,
			'is_used' => false
		])->find($id);
		if(!$card)
			return response()->json([
				'success' => false,
				'message' => "Card not found"
			]);
		if($card->delete())
			return response()->json([
				'success' => true,
				'message' => "Card deleted successfully"
			]);

		return response()->json([
				'success' => false,
				'message' => "Can't delete card"
			   ]);
	}

	public function getActive () {
        // 'admins.name as created_by'
        $cards = Card::select(['cards.id',
            'cards.serial',
            'cards.amount',
            'cards.created_at',
            \DB::raw('count(cards.id) as total_active_cards')
            ])
        	->leftJoin("admins", "admins.id", "cards.admin_id")
            ->where("cards.is_used", false)->groupBy('cards.amount');


        return Datatables::of($cards)
            ->rawColumns(['delete'])
            ->editColumn('serial', '{{ implode("-", str_split($serial, 4)) }}')
            ->addColumn('delete', '<a href="#" onclick="deleteCard({{ $id }}, \'{{implode("-", str_split($serial, 4))}}\', \'{{ $amount }}\')">Delete</a>')
            ->make(true);
	}

    public function getActivepdf () {
        // 'admins.name as created_by'
        $cards = Card::select(['cards.id',
            'cards.serial',
            'cards.amount',
            'cards.created_at',
            \DB::raw('count(cards.id) as total_active_cards')
            ])
        	->leftJoin("admins", "admins.id", "cards.admin_id")
            ->where("cards.is_used", false)->groupBy('cards.amount');


        return Datatables::of($cards)
            ->rawColumns(['delete'])
            ->editColumn('serial', '{{ implode("-", str_split($serial, 4)) }}')
            ->addColumn('delete', '<a href="#" onclick="deleteCard({{ $id }}, \'{{implode("-", str_split($serial, 4))}}\', \'{{ $amount }}\')">Delete</a>')
            ->make(true);
	}

	public function getUsed () {
        // 'users.name as used_by'
        $cards = Card::select(['cards.id',
            'cards.serial',
            'cards.amount',
            'cards.created_at',
            \DB::raw('count(cards.id) as total_active_cards')
            ])
        	->leftJoin("users", "users.id", "cards.used_by")
            ->where("cards.is_used", true)->groupBy('cards.amount');

        return Datatables::of($cards)
            ->editColumn('serial', '{{ implode("-", str_split($serial, 4)) }}')
            ->make(true);
	}

}
