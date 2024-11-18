@extends('backend.layouts.master')

@section('title')
    Detalle de Cotización - Panel de Administración
@endsection

@section('admin-content')
<div class="page-title-area">
    <h4 class="page-title">Detalle de Cotización</h4>
    <ul class="breadcrumbs">
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.cotizaciones.index') }}">Cotizaciones</a></li>
        <li><span>Detalle de Cotización</span></li>
    </ul>
</div>

<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Cotización #{{ $cotizacion->id }}</h4>
                    <p><strong>Proveedor:</strong> {{ $cotizacion->proveedor->nombre }}</p>
                    <p><strong>Producto:</strong> {{ $cotizacion->producto }}</p>
                    <p><strong>Descripción:</strong> {{ $cotizacion->descripcion }}</p>
                    <p><strong>Precio Unitario:</strong> {{ $cotizacion->precio_unitario }}</p>
                    <p><strong>Cantidad:</strong> {{ $cotizacion->cantidad }}</p>
                    <p><strong>Precio Total:</strong> {{ $cotizacion->precio_total }}</p>
                    <p><strong>Impuesto:</strong> {{ $cotizacion->impuesto }}</p>
                    <p><strong>Total con Impuesto:</strong> {{ $cotizacion->total_con_impuesto }}</p>
                    <p><strong>Fecha de Cotización:</strong> {{ $cotizacion->fecha_cotizacion }}</p>
                    <a href="{{ route('admin.cotizaciones.index') }}" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
