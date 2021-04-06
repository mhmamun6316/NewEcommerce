<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class Order extends Model
{
    public function OrderCustomer()
    {
        return $this->hasOne('App\Customer', 'id', 'customer_id');
    }
}
