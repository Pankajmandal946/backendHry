<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function Home()
    {
        return view("include/header")
            . view("include/navbar")
            . view("include/sidebar")
            . view("backHry/home")
            . view("include/footerJs")
            . view("include/footer");
    }
    public function Dashboard()
    {
        return view("backHry/home");
    }
    public function index()
    {
        return view('welcome_message');
    }
}
