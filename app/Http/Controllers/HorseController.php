<?php

namespace App\Http\Controllers;

use App\Horse;
use App\Better;
use Illuminate\Http\Request;

class HorseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('horses.index', ['horses' => Horse::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = new Horse();
        $country->fill($request->all());
        $country->save();
        return redirect()->route('horses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Horse $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horse $horse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Horse $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Horse $horse)
    {
        return view('horses.edit', ['horse' => $horse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Horse $horse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horse $horse)
    {
        $horse->fill($request->all());
        $horse->save();
        return redirect()->route('horses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Horse $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horse $horse)
    {
        $horse->delete();
        return redirect()->route('horses.index');
    }


}
