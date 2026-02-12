<?php

namespace App\Controllers;
use App\Models\ProdiModel;
use App\Models\KategoriModel;

class HomeController extends BaseController
{

    public function LandingPage()
    {
        return view('Landing/index');
    }


    public function BuatLaporan()
    {
        $prodi = new ProdiModel();
        $data['prodi'] = $prodi->findAll();
        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->findAll();
        return view('Landing/formPengaduan', $data);
    }
}
