<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function dashboard(){
        return view('siswa.index');
    }

    public function index()
    {
        return view('siswa.page');
    }

    public function datalist()
    {
        return view('siswa.datalist');
    }

    public function create(){
        return view('siswa.create');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'image' => 'required',
            'name' => 'required',
            'notelp' => 'required',
            'addres' => 'required',
        ]);

        if($request->hasFile('image')){
            $validateData['image'] = $request->file('image')->store('images','public');
        }

        Classes::create($validateData);
        return redirect()->route('siswa.page')->with('success','data berhasil ditambahkan');

    }

}
