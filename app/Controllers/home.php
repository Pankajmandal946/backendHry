<?php

namespace App\Controllers;

class home extends BaseController
{
   public function Home()
   {
      return view("include/header")
         .  view("include/navbar")
         . view("include/sidebar")
         . view("backHry/home")
         . view("include/footerJs")
         . view("include/footer");
   }
}
