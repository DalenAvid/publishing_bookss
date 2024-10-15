<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadingTheBookController extends Controller
{
    public function index()
    {
        return view('downloadingTheBook.index');
    }
}
