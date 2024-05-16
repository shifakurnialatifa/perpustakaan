<?php
namespace App\Http\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\App;

//Scharacters = '012345';
//  $randomString = '' :
// for ($i = 0; <6; $i++){
    //$index = rand(0, strlen($characters) - 1);
    //$randomString .= $characters[$index];
    //}
//$username=$randomString;
//$password = Hash::make($randomString);

class Admin extends Controller {
    public function index()
    {
        return redirect("admin/dashbord");
    }
    public function dashboard()
    {
        if(!session()->has('login'))return redirect('/');
        $app = DB::table('t_app')->where("id","1")-first();
        return view("admin/dashbord",['app'=>$app,'title'=>"Dashbord"]);
    }
    public function laporan()
    {
        if(!session()->has('login'))return redirect('/');
        $app = DB::table('t_app')->where("id","1")-first();
        return view("admin/laporan",['app'=>$app,'title'=>"Laporan"]);
    }
    public function setting()
    {
        if(!session()->has('login'))return redirect('/');
        $app = DB::table('t_app')->where("id","1")-first();
        return view("admin/setting",['app'=>$app,'title'=>"Setting"]);
    }
    public function updatesetting(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
            'email' => 'required',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $request->file('image')->extension();
            $image_name=date("dHis").".".$extension;
            $image->storeAs('public/image', $image_name);
        }else{
            $app = DB::table('t_app')->where("id","1")->first();
            $image_name=$app->logo;
        }
        $update = DB::table('t_app')->where("id","1")-update([
            'name' => $request->nama,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
            'email' => $request->email,
            'logo' => $request->logo,
        ]);
        if($update){
            return redirect("admin/setting")->with('succes','Succes');
        }else{
            return redirect("admin/setting")-with('error','Eror');
        }
    }
public function petugas()
{
    if(!session()->has('login'))return redirect('/');
    $app = DB::table('t_app')->where("id","1")->first();
    $petugas = DB::table('t_petugas')->where("hapus","0")->get();
    return view("admin/petugas/petugas",['app'=> $app, 'title' =>"Data Petugas"]);
}
public function tambahpetugas()
{
    if(!session()->has('login'))return redirect('/');
    $app = DB::table('t_app')->where("id","1")->first();
    return view("admin/petugas/tammbahpetugas",['app'=> $app, 'title' =>"Data Petugas"]);
}
public function editpetugas($id){
    if(!session()->has('login'))return redirect('/');
    $app = DB::table('t_app')->where("id","1")->first();
    $petugas = DB::table('t_petugas')->where("id","$id")->first();
    return view("admin/petugas/editpetugas",['app'=> $app, 'title' =>"Data Petugas"]);
}
public function prosespetugas(Request $request){
    $this->validate($request,[
        'nama' => 'required',
        'alamat' => 'required',
    ]);
}
}
?>
