<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Credito extends Model
{
 use HasFactory;
 protected $table = 'creditos';
 protected $fillable = [
 'fecha',
 'monto',
 'id_cliente',
 'cuota',
 'ncuotas',
 'tipo',
 ];
 // Relación inversa: Un crédito pertenece a un cliente
 public function cliente()
 {
 return $this->belongsTo(Cliente::class, 'id_cliente');
 }
}
