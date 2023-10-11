<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $user = Auth::user();

        if($user->name=='Admin'){
            return redirect()->route('admin');
        }elseif($user->name=='Manager'){
            return redirect()->route('manager');
        }else{
            return $user;
        }

    }
}
