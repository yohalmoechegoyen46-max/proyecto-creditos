<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Cliente extends Model
{
 use HasFactory;
 protected $table = 'clientes';
 protected $fillable = [
 'nombre',
 'fechanac',
 'email',
 ];
 // Relación de uno a muchos: Un cliente posee muchos créditos
 public function creditos()
 {
 return $this->hasMany(Credito::class, 'id_cliente');
 }
}
