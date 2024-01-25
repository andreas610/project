<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\metadata;
use Illuminate\Http\Request;

class pengaturanHalamanController extends Controller
{
    function index()
    {
        $datahalaman = halaman::orderBy('judul', 'asc')->get();
        return view("dashboard.pengaturanhalaman.index")->with('datahalaman', $datahalaman);
    }
    function update(Request $request)
    {
        metadata::updateOrCreate(['meta_key'=>'_about'],
        ['meta_value' => $request->_about]);
        metadata::updateOrCreate(['meta_key'=>'_interest'],
        ['meta_value' => $request->_interest]);
        metadata::updateOrCreate(['meta_key'=>'_award'],
        ['meta_value' => $request->_award]);

        return redirect()->route('pengaturanhalaman.index')->with('success', 'Berhasil update pengaturan halaman');
    }
}
