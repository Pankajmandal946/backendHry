<?php

namespace App\Controllers;

class home extends BaseController
{
   public function Home(){
    echo view("include/header");
    echo  view("include/navbar");     
    echo view("include/sidebar");
    echo view("backHry/home");
    echo view("include/footerJs");
    echo view("include/footer");
   }
}