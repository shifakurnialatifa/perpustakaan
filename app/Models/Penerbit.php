<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;

    protected $table = 'penerbit';
    protected $guarded = ['id'];

    // public function buku(){
    //     return $this->hashMany(Buku::class,)
    // }
}
