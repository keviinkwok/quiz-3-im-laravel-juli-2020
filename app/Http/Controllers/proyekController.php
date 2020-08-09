<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class proyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyek = DB::table('proyek')->get();
        return view('data-proyek',compact('proyek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $managerId = DB::table('manager')->get();
        return view('create-proyek',compact('managerId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        DB::table('proyek')->insert(
            [
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'manager_id'=> $request->managerId
            ]
        );

        return redirect('proyek')->with('status', 'Project added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyek = DB::table('proyek')
        ->join('manager', 'proyek.manager_id', '=', 'manager.manager_id')
        ->select('proyek.*','manager.*')->where('proyek_id', '=', $id)->first();
        return view('detail-proyek', compact('proyek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyek = DB::table('proyek')
        ->join('manager', 'proyek.manager_id', '=', 'manager.manager_id')
        ->select('proyek.*','manager.*')->where('proyek_id', '=', $id)->first();
        $managerId = DB::table('manager')->get();
        return view('update-proyek', compact('proyek', 'managerId'));
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        DB::table('proyek')->where('proyek_id', $id)->update(
            [
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'manager_id'=> $request->managerId
            ]
        );

        return redirect('proyek')->with('status', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('proyek')->where('proyek_id', $id)->delete();
        return redirect('proyek')->with('status', 'Project deleted successfully!');
    }
}
