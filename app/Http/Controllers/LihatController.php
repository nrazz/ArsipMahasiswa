<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;
class LihatController extends Controller

{
    public function lihattampil()
    {
        // $datalihat = Lihat::paginate(5);
        return view('lihat');
    }
}