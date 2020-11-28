<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Person;

class PersonController extends Controller
{
    //
    public function createPerson($email, $password, $is_admin) {
        $person = new Person();
        $person->email = $email;
        $person->password = Hash::make($password);
        $person->is_admin = $is_admin;
        $person->save();
    }

    public function getPersonId($email) {
        $id = Person::select('id')->where('email', $email)->get();
        // dd($id[0]->id);
        return $id[0]->id;
    }
}
