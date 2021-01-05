<?php

namespace Phuong\Order\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'id';

    public function Order_Detail() {
        return $this->hasMany('App\Order_Detail', 'order_id', 'local_key');
    }
}
