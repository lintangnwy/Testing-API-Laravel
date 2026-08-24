<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Kategori extends Model
{
    use HasFactory;
    
    protected $table      = 'kategoris';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_kategori'];
    public $timestamps    = true;            


    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori', 'id');
    }
}