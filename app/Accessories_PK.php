<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories_PK extends Model
{
    //
    protected $table = 'accessories';
    protected $primaryKey = 'id';

    public function PK_Product() {
        return $this->hasMany('App\Models\PK_Product', 'accessories_id', 'local_key');
    }
}
