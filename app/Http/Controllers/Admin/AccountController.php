<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
   public function index()
   {
       return view('admin.index');
   }
}