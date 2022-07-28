<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = M_Siswa::all();
        return view('siswa')->with([
            'data' => $data
        ]);
    }

    public function sort(Request $request)
    {
        if ($request->has('sort')) {
            //echo($request-sort);
            if ($request->sort == "DESC") {
                $data = M_Siswa::orderBy('nama', 'DESC')->latest()->get();
            } else if($request->sort == "ASC") {
                $data = M_Siswa::orderBy('nama', 'ASC')->latest()->get();
            }
        }

        return view('siswa',compact("data"));
    }

    public function filter(Request $request)
    {
        if ($request->has('filter')) {
            $query = '%'.$request->filter.'%';
            $data = M_Siswa::where('kelamin', 'like',$query)->get();
            return view('siswa', compact('data'));
            
        }

        return view('siswa',compact("data"));
    }

    public function search(Request $request)
    {
        $query = '%' .$request->cari. '%';
        
        $data = M_Siswa::where('nama','like',$query)->orWhere('kelamin','like',$query)->orWhere('nisn','like',$query)->get();

        return view('siswa',compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        M_Siswa::insert($data);
        return redirect('/koperasi-siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = M_Siswa::findOrFail($id);
        return view('show')->with([
            'data' => $data
        ]);
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
        $item = M_Siswa::findOrFail($id);
        $data = $request->except(['_token']);
        $item->update($data);  
        return redirect('/koperasi-siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = M_Siswa::findOrFail($id);
        $item->delete();
        return redirect('/koperasi-siswa');

    }
}
