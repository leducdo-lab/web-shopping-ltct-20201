<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    //
    protected $table = 'carts';
    protected $primaryKey = 'id';

    public function User() {
        return $this->belongsTo('App\Models\User', 'foreign_key', 'local_key');
    }
}
