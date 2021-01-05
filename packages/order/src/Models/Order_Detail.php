<?php

namespace Phuong\Order\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    //
    protected $table = 'order_details';
    protected $primaryKey = 'id';

    public function Products() {
        return $this->belongsTo('App\Products', 'forigen_key', 'local_key');
    }
}
