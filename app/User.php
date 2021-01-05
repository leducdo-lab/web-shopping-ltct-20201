<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function Address() {
        return $this->hasMany('App\Address', 'user_id', 'local_key');
    }
}
