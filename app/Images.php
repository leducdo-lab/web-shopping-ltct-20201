<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //
    protected $table = 'image';
    protected $primaryKey = 'id';

    public function Products() {
        return $this->belongsTo('App\Models\Products', 'forigen_key', 'local_key');
    }
}
