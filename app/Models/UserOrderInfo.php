<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrderInfo extends Model
{
    use HasFactory;

    protected $table = 'user_order_info';

    protected $fillable = [
        'order_id',
        'country_id',
        'state_id',
        'city_id',
        'phone_number',
        'address_line',
        'user_name',
    ];

    /**
     * Get the order associated with the user order info.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the country associated with the user order info.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the state associated with the user order info.
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * Get the city associated with the user order info.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
