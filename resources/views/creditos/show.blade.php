@extends('layouts.app')
@section('title', 'Detalle de Crédito')
@section('content')
<div class="row justify-content-center">
 <div class="col-md-8">
 <div class="card shadow-sm">
 <div class="card-header bg-info text-white">Información del Crédito #{{$credito->id }}</div>
 <div class="card-body">
 <p><strong>Cliente:</strong> {{ $credito->cliente->nombre ?? 'N/A' }} ({{$credito->cliente->email ?? 'N/A' }})</p>
 <p><strong>Fecha:</strong> {{ $credito->fecha }}</p>
 <p><strong>Monto Total:</strong> ${{ number_format($credito->monto, 2)}}</p>
 <p><strong>Valor de Cuota:</strong> ${{ number_format($credito->cuota, 2)}}</p>
 <p><strong>Número de Cuotas:</strong> {{ $credito->ncuotas }}</p>
 <p><strong>Tipo de Crédito:</strong> {{ $credito->tipo }}</p>

 <a href="{{ route('creditos.index') }}" class="btn btn-secondary">Volver al Listado</a>
 </div>
 </div>
 </div>
</div>
@endsection
