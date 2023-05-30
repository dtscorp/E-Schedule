<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materi extends Model
{
    //use HasFactory;
    protected $table = 'materi';
    protected $fillable = ['kategori_id','kode_materi','nama'];
    // protected $timestamp =['created_at','updated_at'];

    public function kategori() : BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function jadwals()
    {
        return $this->hasMany(jadwal::class);
    }

}
