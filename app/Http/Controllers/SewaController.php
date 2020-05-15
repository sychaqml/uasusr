<?php

namespace App\Http\Controllers;

use App\sewakost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SewaController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
        if(Gate::allows('admin'))return$next($request);
        abort(403, 'Anda Tidak Punya Hak Akses' );        
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='sewakost';
        $sewakost=sewakost::paginate(5);
        return view('admin.sewa', compact('title','sewakost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input Kamar';
        return view('admin.inputkamar', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required'  => 'Kolom :attribute harus Lengkap',
            'date'      => 'Kolom :attribute harus Tanggal',
            'numeric'   => 'Kolom :attribute harus Angka',
        ];
        $validasi = $request->validate([
            'id_kamar'=>'required',
            'fasilitas'=>'required',
            'status'=>'required',
            'harga_sewa'=>'required'
        ],$messages);
        sewakost::create($validasi);
        return redirect('sewa')->with('success','Data berhasil di update');
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
        $title='Input Kamar';
        $sewakost=sewakost::find($id);
        return view('admin.inputkamar', compact('title','sewakost'));
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
        $messages = [
            'required'  => 'Kolom :attribute harus Lengkap',
            'date'      => 'Kolom :attribute harus Tanggal',
            'numeric'   => 'Kolom :attribute harus Angka',
        ];
        $validasi = $request->validate([
            'id_kamar'=>'',
            'fasilitas'=>'required',
            'status'=>'required',
            'harga_sewa'=>'required'
        ],$messages);
        sewakost::whereid_kamar($id)->update($validasi);
        return redirect('sewa')->with('success','Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        sewakost::whereid_kamar($id)->delete();
        return redirect('sewa')->with('success','Data berhasil di update');
    }
}
