<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengajar extends Model
{
    protected $table = 'pengajar';
    protected $fillable = ['nip','nama','gender','telp','email','alamat'];
    protected $timestamp =['created_at','updated_at'];

    public function materi(): HasMany
    {
        return $this->hasMany(Pengajar::class);
    }
}
