<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //To make the website secure
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Method to display the admin view
     */
    public function index()
    {
        return view('users.admin');
    }

}
