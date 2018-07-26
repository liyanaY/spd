<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sesi;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$openSesi = Sesi::where('status', 1)->get();
        //return view('backend.sesi_index')->withSesis($openSesi);

        // return  byk data = select * from Sesi (classic php)
        return view('backend.sesi_index')->withSesis(Sesi::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Add new sesi
        return view('backend.sesi_add')->withSesi(new Sesi);
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
            'name' => 'required', 
            'pingat' => 'required'
        ], [
            'name.required' => 'Please enter session name',
            'pingat.required' => 'Please enter pingat name'
        ]);

        // Shorthand boolean statement
        $request['status'] = $request->status == 'on' ? true : false;

        // return variable ni
        Sesi::create($request->only('name', 'pingat', 'status'));

        /*
        // Untuk masukkan data ke dalam db
        $user = new User(); // create new class named User (drp model User)
        $user->name = $request->name; // asign variable
        $user->email = $request->email;
        $user->ic = $request->ic;
        $user->password = bcrypt($request->password); // utk encrypt password using bcrypt function
        $user->save(); // save ke db
        */

        return back()->withSuccess('Successfully Add Session'); // with(<session>, <msg dia>)
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
        return view('backend.sesi_show')->withSesi(Sesi::findOrFail($id));
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
        return view('backend.sesi_edit')->withSesi(Sesi::findOrFail($id));
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
            'name' => 'required', 
            'pingat' => 'required'
        ], [
            'name.required' => 'Please enter session name',
            'pingat.required' => 'Please enter pingat name'
        ]);

        // Shorthand boolean statement
        $request['status'] = $request->status == 'on' ? true : false;

        // return variable ni
        Sesi::where('id', $id)->update($request->only('name', 'pingat', 'status'));

        return redirect()->route('sesi.index')->withSuccess('Successfully Update'); // with(<session>, <msg dia>)
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
