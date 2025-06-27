<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Penulis extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'penulis';

    protected $fillable = [
        'id',
        'nama',
        'email',
        'foto_profil',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'id_penulis');
    }

    public function deleteImage()
    {
        if ($this->gambar && file_exists(public_path('images/profil/' . $this->gambar))) {
            return unlink(public_path('images/profil/' . $this->gambar));
        }
    }
}
