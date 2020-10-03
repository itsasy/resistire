@extends('layouts.app')
@section('sound')
    <audio id="sonido" src="{{asset('js/alarma.mp3')}}" controls loop preload="auto" hidden></audio>
@endsection

@include('layouts.toggle_menu')

@section('title', 'Mapa')

@section('content')

<div class="h_header bg_grad_h d-flex justify-content-center align-items-center">
    <h2 class="title text-center">ALERTAS DE {{$district}}</h2>
</div>

<div class="container-fluid barra">
    <div class="row">

        <div id="map" class="map"> </div>
        <p class="text-secondary"    id="district"   hidden>{{$district}}</p>
        <p class="text-secondary"    id="iddistrict" hidden>{{$iddistrict}}</p>
        <p class="text-sdsfecondary" id="provincia"  hidden>{{$provincia}}</p>

    </div>

    <!-- ************************************* -->
    <div class="modal fade" id="Modal_maps_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 id=titulo class="text_p font-weight-bold"></h5>
                </div>
                <div class="modal-body">
                    <div class="row" id="info_area">
                        <div class="col">
                            <h5>Ubicación:</h5>
                            <p id="lugar" class="text-secondary"></p>
                            <div class="row">
                                <div class="col">
                                    <h5>Nombre:</h5>
                                    <p id="nombre" class="text-secondary"></p>
                                </div>
                                <div class="col">
                                    <h5>DNI:</h5>
                                    <p id="dni" class="text-secondary"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Contacto:</h5>
                                    <p id="contacto" class="text-secondary"></p>
                                </div>
                                <div class="col">
                                    <h5>Fecha y hora:</h5>
                                    <p id="date" class="text-secondary"></p>
                                </div>
                            </div>
                            <div class="" id="comentario"></div>
                            <div class="" id="img"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn_p" id="atendido"><i id='loadCircle' class='fa fa-circle-o-notch fa-spin'></i>&nbsp;Atender</button>
                    <button type="button" class="btn btn-secondary" id="dismissButton">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade" id="ModalPuntoAtencion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <hr>
                <div class="modal-header justify-content-center">

                    <h5 id="nombrePoint" class="text_p font-weight-bold"></h5>
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
                    <button type="submit" class="btn btn_p" id="atendidoPoint"><i id='loadCircle' class='fa fa-circle-o-notch fa-spin'></i>&nbsp;Aceptar</button>
                </div>

            </div>
        </div>
    </div>

    <!-- ************************************* -->

</div>

@endsection


@section('script')
    <script src="{{asset('js/script.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/maps.js')}}"></script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHeMnFqK0Z-SnBltWBsKdhks6izYFGajI&libraries=geometry&&callback=iniciarMap">
    </script>
@endsection
