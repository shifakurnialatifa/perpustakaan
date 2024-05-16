<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengarangController extends Controller
{
    public function index(){
        $datas = Pengarang::all();

        return view('Pengarang/Pengarang', compact('datas'));
    }

    public function show($id){
        $pengarang = Pengarang::find($id);

        return view('', compact('Pengarang'));
    }

    public function create(){
        return view('Pengarang/create');
    }

    public function edit($id){
        $pengarang = pengarang::find($id);

        return view('pengarang/edit', compact('pengarang'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama_pengarang' => ['required', 'string'],
            'alamat' => ['required', 'string']
        ]);

        $create = Pengarang::create([
            'nama_pengarang'=> $validated["nama_pengarang"],
            'alamat' => $validated["alamat"]
        ]);

        if(!$create){
            return back()->withErrors(['create' => 'Gagal menyimpan Pengarang!']);
        }

        return redirect('/pengarang');
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'nama_pengarang' => ['required', 'string'],
            'alamat' => ['required', 'string']
        ]);

        $tobeUpdated = Pengarang::find($id);

        $update = $tobeUpdated->update([
            'nama_pengarang'=> $validated["nama_pengarang"],
            'alamat' => ["alamat"]

        ]);

        if(!$update){
            return back()->withErrors(['create' => 'Gagal menyimpan Pengarang!']);
        }

        return redirect('/pengarang');
    }

    public function delete($id) {
        try{

            $tobeDeleted = Pengarang::find($id);

            $tobeDeleted->delete();

            return redirect('/pengarang');

        }catch(Exception $e){
            return back()->withErrors($e);
        }
    }
}
