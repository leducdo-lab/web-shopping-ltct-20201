<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getIndex() {
        return view('admin.dashboard');
    }
    public function getProduct() {
        return view('admin.list_product');
    }
    public function getUser() {
        return view('admin.list_user');
    }
    public function getAddProduct() {
        return view('admin.add_product');
    }
    public function getSignUp() {
        return view('admin.sign_up');
    }
}
