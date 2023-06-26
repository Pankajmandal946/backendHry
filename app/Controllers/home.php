<?php

namespace App\Controllers;

class home extends BaseController
{
   public function Home(){
    return view("include/header");
    return view("include/navbar");     
    return view("include/sidebar");
    return view("backHry/home");
    return view("include/footerJs");
    return view("include/footer");
   }
}