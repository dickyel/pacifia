<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    //
    public function cek() {
        if (auth()->user()->role_id === 1) {
            return redirect('/admin-dashboard');
        } else if(auth()->user()->role_id === 2){
            return redirect('/user');
        } 
    }
}
