<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sesi;
use App\Calon;
use App\Pencalonan;
use Auth;

class PencalonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('backend.pencalonan_index')->withPencalonans(Pencalonan::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.pencalonan_add')
                    ->withSesis(Sesi::all())
                    ->withCalon(new Calon)
                    ->withPencalonan(new Pencalonan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'sesi_id' => 'required', 
            'name' => 'required',
            'ic' => 'required',
            'email' => 'required|email',
            'asas' => 'required'
        ], [
            'sesi_id.required' => 'Please select session',
            'name.required' => 'Please enter candidate name',
            'ic.required' => 'Please enter candidate IC no',
            'email.required' => 'Please enter candidate email',
            'email.email' => 'Please enter a valid email',
            'asas.required' => 'Please filled in Asas field'
        ]);

        // Sesi
        $sesi = Sesi::findOrFail($request->sesi_id);

        // Calon
        $calon = Calon::create($request->only('name', 'ic', 'email'));

        // Pencalonan
        $pencalonan = new Pencalonan;
        $pencalonan->user_id = Auth::user()->id;
        $pencalonan->sesi_id = $sesi->id;
        $pencalonan->calon_id = $calon->id;
        $pencalonan->asas = $request->asas;
        $pencalonan->save();

        return back()->withSuccess('Successfully Add Candidate'); // with(<session>, <msg dia>)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
