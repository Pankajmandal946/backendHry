<?php

namespace App\Controllers;

class admin extends BaseController
{
   public function Dashboard(){
    return view("admin_ecom/Dashboard");
   }
}