<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Galery::all();
        return view('pages.user.dashboard',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $galery)
    {
        // $image = Galery::where('id_unik', $galery)
        // ->with(['comments' => function ($query) {
        //     $query->where('parent_id', null);
        // }])
        // ->first();
        $image = Galery::where('id_unik', $galery)
        ->with('comments.replies')
        ->first();
        $images = Galery::all();
        // dd($images);
        return view('pages.user.show',compact('images','image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galery $galery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galery $galery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galery $galery)
    {
        //
    }
}
