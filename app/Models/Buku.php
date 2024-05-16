<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'judul',
        'image',
        'tahun_terbit',
        'jumlah',
        'id_pengarang',
        'id_penerbit'
    ];

    public function penerbit(){
        return $this->belongsTo(penerbit::class, 'id_penerbit', 'id');
    }

    public function pengarang(){
        return $this->belongsTo(pengarang::class, 'id_pengarang', 'id');
    }
}

