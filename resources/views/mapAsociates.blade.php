@extends('layouts.app')

@include('layouts.toggle_menu')

@section('title', 'Prueba')

@section('content')

<div class="h_header bg_grad_h d-flex justify-content-center align-items-center">
    <h2 class="title text-center">Mapa de empresas responsables</h2>
</div>
<div class="container-fluid barra">
    
     <div class="row">

        <p class="text-secondary"    id="district"   hidden>{{$district}}</p>
        <p class="text-secondary"    id="iddistrict" hidden>{{$iddistrict}}</p>
        <p class="text-sdsfecondary" id="provincia"  hidden>{{$provincia}}</p>

    </div>
    
    <div class="position-fixed mb-1 z_i_1">
        <a name="" id="" class="btn btn_circl_outl_p rounded-circle" href="{{route('regCompanies')}}" role="button"
            title="Nuevo"><i class="fas fa-plus"></i></a>
    </div>
    <div class="row">
        <div id="map" class="map"></div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 id="nombrePoint" class="text-primary font-weight-bold"></h5>
                </div>
                <div class="modal-body row">
                    <div class="col-lg-6">
                        <h5>Ubicación:</h5>
                        <p id="lugarPoint" class="text-secondary"></p>
                        <h5>Página Web:</h5>
                        <p class="text-secondary"><a id="webPoint" href="" id="w3s"></a></p>
                        <p id="date" class="text-secondary text-right"></p>
                    </div>
                    <div class="col-lg-6">
                        <div id="imgPoint" class="img-fluid"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i id='loadCircle'
                            class='fa fa-circle-o-notch fa-spin'></i>Aceptar</button>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection


@section('script')

<script type="text/javascript" src="{{asset('js/mapAsociates.js')}}"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHeMnFqK0Z-SnBltWBsKdhks6izYFGajI&libraries=geometry&&callback=iniciarMap">
</script>

@endsection
