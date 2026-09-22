<?php
namespace App\Http\Controllers;
use App\Models\Credito;
use App\Models\Cliente;
use Illuminate\Http\Request;
class CreditoController extends Controller
{
 public function index()
 {
 // Carga ansiosa (eager loading) de la relación cliente
 $creditos = Credito::with('cliente')->orderBy('id', 'desc')->paginate(10);
 return view('creditos.index', compact('creditos'));
 }
 public function create()
 {
 $clientes = Cliente::orderBy('nombre', 'asc')->get();
 return view('creditos.create', compact('clientes'));
 }
 public function store(Request $request)
 {
 $request->validate([
 'fecha' => 'required|date',
 'monto' => 'required|numeric|min:0',
 'id_cliente' => 'required|exists:clientes,id',
 'cuota' => 'required|numeric|min:0',
 'ncuotas' => 'required|integer|min:1',
 'tipo' => 'required|string|max:50',
 ]);
 Credito::create($request->all());
 return redirect()->route('creditos.index')
 ->with('success', 'Crédito otorgado exitosamente.');
 }
 public function show(Credito $credito)
 {
 $credito->load('cliente');
 return view('creditos.show', compact('credito'));
 }
 public function edit(Credito $credito)
 {
 $clientes = Cliente::orderBy('nombre', 'asc')->get();
 return view('creditos.edit', compact('credito', 'clientes'));
 }
 public function update(Request $request, Credito $credito)
 {
 $request->validate([
 'fecha' => 'required|date',
 'monto' => 'required|numeric|min:0',
 'id_cliente' => 'required|exists:clientes,id',
 'cuota' => 'required|numeric|min:0',
 'ncuotas' => 'required|integer|min:1',
 'tipo' => 'required|string|max:50',
 ]);
 $credito->update($request->all());
 return redirect()->route('creditos.index')
 ->with('success', 'Crédito actualizado correctamente.');
 }
 public function destroy(Credito $credito)
 {
 $credito->delete();
 return redirect()->route('creditos.index')
 ->with('success', 'Crédito eliminado correctamente.');
 }
}
