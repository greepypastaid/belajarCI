<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | WPU'
        ];
        echo view("layouts/header", $data);
        echo view("pages/home");
        echo view("layouts/footer");
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        echo view("layouts/header", $data);
        echo view("pages/about");
        echo view("layouts/footer");
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. abc No. 123',
                    'kota' => 'Bandung'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Setiabudi No. 193',
                    'kota' => 'Bandung'
                ]
            ]
        ];

        echo view("layouts/header", $data);
        echo view("pages/contact", $data);
        echo view("layouts/footer");
    }
}