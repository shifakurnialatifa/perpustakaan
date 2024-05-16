<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index(){
        $datas = Kategori::all();

        return view('Kategori/kategori', compact('datas'));
    }

    public function show($id){
        $kategori = kategori::find($id);

        return view('', compact('Kategori'));
    }

    public function create(){
        return view('Kategori/create');
    }

    public function edit($id){
        $kategori = kategori::find($id);

        return view('kategori/edit', compact('kategori'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama_kategori' => ['required', 'string'],
            'deskripsi' => ['required', 'string']
        ]);

        $create = Kategori::create([
            'nama_kategori'=> $validated["nama_kategori"],
            'deskripsi' => $validated["deskripsi"]
        ]);

        if(!$create){
            return back()->withErrors(['create' => 'Gagal menyimpan Kategori!']);
        }

        return redirect('/kategori');
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'nama_kategori' => ['required', 'string'],
            'deskripsi' => ['required', 'string']
        ]);

        $tobeUpdated = Kategori::find($id);

        $update = $tobeUpdated->update([
            'nama_kategori'=> $validated["nama_kategori"],
            'deskripsi' => $validated["deskripsi"]

        ]);

        if(!$update){
            return back()->withErrors(['create' => 'Gagal menyimpan kategori!']);
        }

        return redirect('/kategori');
    }

    public function delete($id) {
        try{

            $tobeDeleted = Kategori::find($id);

            $tobeDeleted->delete();

            return redirect('/kategori');

        }catch(Exception $e){
            return back()->withErrors($e);
        }
    }
}
