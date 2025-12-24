<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        echo "Hello World!";
    }

    public function about()
    {
        echo "Hello my name is reka";
    }

    public function contact($nama, $angka)
    {
        echo "Halo, nama saya $nama" . " dan angka favorit saya adalah $angka";
    }


}
