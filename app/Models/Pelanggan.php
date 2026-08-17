<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table      = 'pelanggans';
    protected $primaryKey = 'id_pelanggan';
    public $timestamps    = false;

    protected $fillable = ['nama_pelanggan', 'alamat'];

    
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_pelanggan');
    }
}