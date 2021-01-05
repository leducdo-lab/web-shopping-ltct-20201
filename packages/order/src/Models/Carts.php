<?php

namespace Phuong\Order\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    //
    protected $table = 'carts';
    protected $primaryKey = 'id';

    public function User() {
        return $this->belongsTo('App\User', 'foreign_key', 'local_key');
    }
}
