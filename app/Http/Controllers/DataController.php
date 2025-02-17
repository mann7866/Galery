<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::latest()->get();
        return view('index', compact('data'));
    }

    // Mengambil data (dipakai oleh AJAX untuk refresh tanpa reload)
    public function getData()
    {
        $data = Data::latest()->get();
        return response()->json($data);
    }

    // Menyimpan data dari AJAX request
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data = Data::create([
            'nama' => $request->nama,
        ]);

        return response()->json(['nama' => $data->nama, 'message' => 'Data berhasil disimpan']);
    }
}
