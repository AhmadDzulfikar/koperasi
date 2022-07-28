<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Seragam;


class SeragamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = M_Seragam::all();
        return view('seragam')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('createseragam');  
    }

    public function search(Request $request)
    {
        $query = '%' .$request->cari. '%';
        
        $data = M_Seragam::where('nama','like',$query)->orWhere('ukuran','like',$query)->get();

        return view('seragam',compact("data"));
    }

    public function sort(Request $request)
    {
        if ($request->has('sort')) {
            //echo($request-sort);
            if ($request->sort == "DESC") {
                $data = M_Seragam::orderBy('nama', 'DESC')->latest()->get();
            } else if($request->sort == "ASC") {
                $data = M_Seragam::orderBy('nama', 'ASC')->latest()->get();
            }
        }

        return view('seragam',compact("data"));
    }

    public function filter(Request $request)
    {
        if ($request->has('filter')) {
            $query = ''.$request->filter.'';
            $data = M_Seragam::where('ukuran', 'like',$query)->get();
            return view('seragam', compact('data'));
            
        }

        return view('seragam',compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        M_Seragam::insert($data);
        return redirect('/koperasi-seragam');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = M_Seragam::findOrFail($id);
        return view('showseragam')->with([
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
        $item = M_Seragam::findOrFail($id);
        $data = $request->except(['_token']);
        $item->update($data);
        return redirect('/koperasi-seragam');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = M_Seragam::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
