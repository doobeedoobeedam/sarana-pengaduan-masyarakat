<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakat';
    public function pengaduan() {
        return $this->hasMany(Pengaduan::class);
    }
    use HasFactory;
}
