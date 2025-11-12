<?php

namespace App\Controllers;

class Onboarding extends BaseController
{
    public function slide1()
    {
        return view('slide1');
    }

    public function slide2()
    {
        return view('slide2');
    }
}
