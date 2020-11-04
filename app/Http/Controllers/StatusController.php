<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
 public function getStatus($status = null){
     if($status == null){
         $navBar = NavBar::whereNull('role')->get()->toArray();
         return $navBar;
     }
 }
}
