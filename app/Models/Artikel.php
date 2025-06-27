<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'artikel';

    protected $fillable = [
        'id',
        'gambar',
        'judul',
        'konten',
        'id_kategori',
        'id_penulis',
        'tentang',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }


    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'id_artikel');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }

    public function deleteImage()
    {
        if ($this->gambar && file_exists(public_path('images/artikel/' . $this->gambar))) {
            return unlink(public_path('images/artikel/' . $this->gambar));
        }
    }
}
