<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $table = 'orders';

    protected $fillable = [
        'admin_id',
        'user_id',
        'crop_cultivated',
        'variety',
        'total_quantity',
        'quantity_ordered',
        'unit_price',
        'total_price',
        'disc_value_per_unit',
        'net_order_value',
        'total_net_saving_goal',
        'target_saving_amount',
        'prcnt_of_net_saving_goal',
        'period_of_package_delivery'
    ];
}
