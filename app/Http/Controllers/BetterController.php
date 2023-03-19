<?php

namespace App\Http\Controllers;

use App\Better;
use App\Horse;
use Illuminate\Http\Request;

class BetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        if (isset($request->horse_id) && ($request->horse_id != 0)) {
            $horse_id = $request->horse_id;
            $betters = Better::where('horse_id', $horse_id)->orderBy('name')->get();
        } else {
            $horse_id = 0;
            $betters = Better::orderBy('name')->get();
        }

        return view('betters.index', [
            'betters' => $betters,
            'horses' => Horse::orderBy('name')->get(),
            'horse_id' => $horse_id

        ]);
    }

    public function filter(Request $request)
    {

        if (isset($request->horse_id) && ($request->horse_id != 0)) {
            $horse_id = $request->horse_id;
            $betters = Better::where('horse_id', $horse_id)->orderBy('name')->get();
        } else {
            $horse_id = 0;
            $betters = Better::orderBy('name')->get();
        }

        return view('betters.index', [
            'betters' => $betters,
            'horses' => Horse::orderBy('name')->get(),
            'horse_id' => $horse_id

        ]);
    }

    //$horse_id=0;
    // return view('betters.index', [
    //  'betters'=>Better::orderBy('name')->get(),
    //  'horses'=>Horse::orderBy('name')->get(),
    //    'horse_id'=>$horse_id


    //$horse_id=0;
    //$betters = Better::orderby('bet', 'asc')->with('horse')->get();
    // return view('betters.index', [
    //   'betters' => $betters,
    //     'horse_id'=>$horse_id


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horses = Horse::all();
        return view('betters.create',
            [
                'horses' => $horses,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $better = new Better();
        $better->fill($request->all());
        $better->save();
        return redirect()->route('betters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Better $better
     * @return \Illuminate\Http\Response
     */
    public function show(Better $better)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Better $better
     * @return \Illuminate\Http\Response
     */
    public function edit(Better $better)
    {
        $horses = Horse::all();
        return view('betters.edit', [
            'better' => $better,
            'horses' => $horses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Better $better
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Better $better)
    {
        $better->name = $request->name;
        $better->surname = $request->surname;
        $better->bet = $request->bet;
        $better->horse_id = $request->horse_id;
        $better->save();
        return redirect()->route('betters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Better $better
     * @return \Illuminate\Http\Response
     */
    public function destroy(Better $better)
    {
        $better->delete();
        return redirect()->route('betters.index');
    }
}
