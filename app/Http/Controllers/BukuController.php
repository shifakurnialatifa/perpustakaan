<?php
// app/Http/Controllers/BookController.php
namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Exception;
use Illuminate\Http\Request;
class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('penerbit', 'pengarang')->get();

        // $buku = Buku::with('penerbit')->get();
        return view('Buku/buku', compact('buku'));
    }
    public function create()
    {
        $penerbit = Penerbit::all();
        $pengarang = Pengarang::all();
        return view('Buku/create',compact('penerbit','pengarang'));
    }
    public function store(Request $request)
    {
        $create = Buku::create([
            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah' => $request->jumlah,
            'id_pengarang' => $request->pengarang,
            'id_penerbit' => $request->penerbit,
        ]);
        if(!$create){
            return back()->withErrors(['create'=> 'Gagal menyimpan buku']);
        }
        return redirect('/buku');
    }
    public function show($id)
    {
        $buku= Buku::find($id);
        return view('', compact('buku'));
    }
    public function edit(Buku $buku)
    {
        $penerbit = Penerbit::all();
        $pengarang = Pengarang::all();
        $buku = Buku::with('pengarang', 'penerbit')->find($id);
        return view('Buku/edit', compact('penerbit', 'pengarang', 'buku'));
    }
    public function update(Request $request, Buku $buku)
    {
        $validatedData = $request->validate([
            'judul' => ['required', 'string'],
            'tahun_terbit' => ['required', 'date'],
            'jumlah'=>['required','integer'],
            'id_pengarang'=>['required','string'],
            'id_penerbit'=>['required','string']
        ]);
        $tobeUpdate = Buku::find($id);
        $update = $tobeUpdate->update([
            'judul'=>$validated['judul'],
            'tahun_terbit'=>$validated['tahun_terbit'],
            'jumlah'=>$validated['jumlah'],
            'id_pengarang'=>$validated['id_pengarang'],
            'id_penerbit'=>$validated['id_penerbit']
        ]);
        if($update){
            return response()->json(['message'=> 'Data berhasil diperbarui']);
        }else{
            return response()->json(['message'=>'Gagal memperbarui data']);
        }
    }
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku deleted successfully.');
    }
}

