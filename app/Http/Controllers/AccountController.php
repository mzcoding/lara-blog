<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
  public function index()
  {
       return view('account.index');
  }
}