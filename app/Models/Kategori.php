<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama'];
    protected $timestamp =['created_at','updated_at'];

    public function materi(): HasMany
    {
        return $this->hasMany(Materi::class);
    }
}
