<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Exception;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index(){
        $datas = Penerbit::all();

        return view('Penerbit/penerbit', compact('datas'));
    }

    public function show($id){
        $penerbit = Penerbit::find($id);

        return view('', compact('penerbit'));
    }

    public function create(){
        return view('penerbit/create');
    }

    public function edit($id){
        $penerbit = penerbit::find($id);

        return view('penerbit/edit', compact('penerbit'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama_penerbit' => ['required', 'string'],
            'alamat' => ['required', 'string']
        ]);

        $create = Penerbit::create([
            'nama_penerbit'=> $validated["nama_penerbit"],
            'alamat' => $validated["alamat"]
        ]);

        if(!$create){
            return back()->withErrors(['create' => 'Gagal menyimpan Penerbit!']);
        }

        return redirect('/penerbit');
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'nama_penerbit' => ['required', 'string'],
            'alamat' => ['required', 'string']
        ]);

        $tobeUpdated = Penerbit::find($id);

        $update = $tobeUpdated->update([
            'nama_penerbit'=> $validated["nama_penerbit"],
            'alamat' => $validated["alamat"]

        ]);

        if(!$update){
            return back()->withErrors(['create' => 'Gagal menyimpan Penerbit!']);
        }

        return redirect('/penerbit');
    }

    public function delete($id) {
        try{

            $tobeDeleted = Penerbit::find($id);

            $tobeDeleted->delete();

            return redirect('/penerbit');

        }catch(Exception $e){
            return back()->withErrors($e);
        }
    }
}
