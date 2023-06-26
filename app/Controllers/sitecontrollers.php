<?php

namespace App\Controllers;

class sitecontrollers extends BaseController
{
    public function simple()
    {
        echo view("admin_ecom/simple");
    }
    public function about()
    {
        echo "<h1>this is about</h1>";
    }
  
}
