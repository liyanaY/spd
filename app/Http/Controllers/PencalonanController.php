<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sesi;
use App\Calon;
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
        // dd ( Auth::user() );
        //return view('backend.pencalonan_index')->withPencalonans(Pencalonan::all());
        return view('backend.pencalonan_index')
                    ->withCalons( Auth::user()->calons()->get() );
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
                    ->withCalon(new Calon);
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
        //$calon = Calon::create($request->only('name', 'ic', 'email'));

        // Calon
        $calon = new Calon;
        $calon->name = $request->name;
        $calon->ic = $request->ic;
        $calon->email = $request->email;
        $calon->user_id = Auth::user()->id;
        $calon->sesi_id = $sesi->id;
        $calon->asas = $request->asas;
        $calon->save();

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
        return view('backend.pencalonan_edit')->withCalon(Calon::findOrFail($id));

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
        return view('backend.pencalonan_edit')
                    ->withCalon(Calon::findOrFail($id))
                    ->withSesis(Sesi::where('status', 1)->get());
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
        $request->validate([
            'sesi_id' => 'required',
            'name' => 'required', 
            'ic' => 'required', 
            'email' => 'required', 
            'asas' => 'required'
        ], [
            'name.required' => 'Please enter session name',
            'ic.required' => 'Please enter session ic',
            'email.required' => 'Please enter session email',
            'asas.required' => 'Please enter asas'
        ]);

        // Sesi
        $sesi = Sesi::findOrFail($request->sesi_id);

        // Pencalonan
        $pencalonan = Calon::findOrFail($id);
        $pencalonan->name = $request->name;
        $pencalonan->ic = $request->ic;
        $pencalonan->user_id = Auth::user()->id;
        $pencalonan->sesi_id = $sesi->id;
        $pencalonan->email = $request->email;
        $pencalonan->asas = $request->asas;
        $pencalonan->save();

        return redirect()->route('pencalonan.index')->withSuccess('Successfully Update'); // with(<session>, <msg dia>)

        /*return view('backend.pencalonan_edit')
                    ->withCalon(Calon::findOrFail($id))
                    ->withSesis(Sesi::where('status', 1)->get())*/
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
        Calon::destroy($id);

        return back()->withSuccess('Successfully destroy');
    }
}
