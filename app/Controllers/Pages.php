<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        echo view("/layouts/header");
        echo view("/pages/home");
        echo view("/layouts/footer");
    }

    public function about()
    {
        echo view("/layouts/header");
        echo view("/pages/about");
        echo view("/layouts/footer");
    }

    public function contact()
    {
        echo view("/layouts/header");
        echo view("/pages/contact");
        echo view("/layouts/footer");
    }
}