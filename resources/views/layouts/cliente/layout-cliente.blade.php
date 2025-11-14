@extends('layouts.web.layout-web')

@section('contenido')
    <div class="layout_cliente">
        <div class="centrar">

            <div class="grid_layout_cliente">
                <aside class="contenedor_nav_links">
                    @include('layouts.cliente.menu')
                </aside>

                <div class="contenido_pagina">
                    @yield('contenidoCliente')
                </div>
            </div>
        </div>
    </div>
@endsection
