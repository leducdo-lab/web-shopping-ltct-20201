<?php

namespace HongThao\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'id';

    public function Order_Detail() {
        return $this->hasMany('App\Models\Order_Detail', 'order_id', 'local_key');
    }
}
