@extends('layouts.app')

@include('layouts.toggle_menu')

@section('title', 'Prueba')

@section('content')

<div class="h_header bg_grad_h d-flex justify-content-center align-items-center">
    <h2 class="title text-center">Mapa de Test</h2>
</div>
<div class="container-fluid barra">
    <div class="position-fixed mb-1 z_i_1">
    <a name="" id="" class="btn btn_circl_outl_p rounded-circle" href="{{route('regCompanies')}}"
            role="button" title="Nuevo"><i class="fas fa-plus"></i></a>
    </div>
    <div class="row">
        <div id="map" class="map"></div>
    </div>
</div>

@endsection


@section('script')
<script src="{{asset('js/script.js')}}"></script>

<script type="text/javascript" src="{{asset('js/mapsTest.js')}}"></script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHeMnFqK0Z-SnBltWBsKdhks6izYFGajI&libraries=geometry&&callback=iniciarMap">
</script>

@endsection
