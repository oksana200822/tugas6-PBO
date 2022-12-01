<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Mahasiswa::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
        }else{
        $data = Mahasiswa::paginate(5);        
        }
        return view('datamahasiswa',compact('data'));
    }

    public function tambahmahasiswa(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        //dd($request->all());
        $data = mahasiswa::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotomahasiswa/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('mahasiswa')->with('success',' Data Berhasil Di Tambahkan');
    }

    public function tampilkandata($id){
        $data = Mahasiswa::find($id);
        //dd($data);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Mahasiswa::find($id);
        $data->update($request->all());
        return redirect()->route('mahasiswa')->with('success',' Data Berhasil Di Update');
    }

    public function delete($id){
        $data = Mahasiswa::find($id);
        $data->delete();
        return redirect()->route('mahasiswa')->with('success',' Data Berhasil Di Hapus');
    }
}
