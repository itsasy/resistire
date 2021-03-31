@extends('layouts.app')
@section('sound')
<audio id="sonido" src="{{asset('js/alarma.mp3')}}" controls loop preload="auto" hidden></audio>
@endsection

@include('layouts.toggle_menu')

@section('title', 'Mapa')

@section('content')
<div class="header pt-5 pt-md-0">
   <h3 class="header_title d-none d-md-block">@lang('string.alerts_of') {{$district}}</h3>
   <h4 class="header_title d-block d-md-none">@lang('string.alerts_of') {{$district}}</h4>
</div>

<div class="container-fluid barra">
   <div class="row">
      <div id="map" class="map"></div>
      <p class="text-secondary" id="district" hidden>{{$district}}</p>
      <p class="text-secondary" id="iddistrict" hidden>{{$iddistrict}}</p>
      <p class="text-sdsfecondary" id="provincia" hidden>{{$provincia}}</p>
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
                     <h5>@lang('string.location'):</h5>
                     <p id="lugar" class="text-secondary"></p>
                     <div class="row">
                        <div class="col">
                           <h5>@lang('string.fullname'):</h5>
                           <p id="nombre" class="text-secondary"></p>
                        </div>
                        <div class="col">
                           <h5>@lang('string.dni'):</h5>
                           <p id="dni" class="text-secondary"></p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <h5>@lang('string.contact'):</h5>
                           <p id="contacto" class="text-secondary"></p>
                        </div>
                        <div class="col">
                           <h5>@lang('string.date_and_hour'):</h5>
                           <p id="date" class="text-secondary"></p>
                        </div>
                     </div>
                     <div class="" id="comentario"></div>
                     <div class="" id="img"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn_p" id="atendido"><i id='loadCircle' class='fa fa-circle-o-notch fa-spin'></i>&nbsp;@lang('string.attend')</button>
               <button type="button" class="btn btn-secondary" id="dismissButton">@lang('string.cancel')</button>
            </div>
         </div>
      </div>
   </div>

   <div class="modal fade" id="ModalPuntoAtencion" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
         <div class="modal-content rounded_1">
            <div class="modal-header justify-content-center align-items-center bg_p mh_4 p-0">
               <h6 id="nombrePoint" class="text-white font-weight-bold m-0"></h6>
            </div>
            <div class="modal-body row">
               <div class="col-lg-6">
                  <p class="font-weight-bold text-secondary">@lang('string.location'):</p>
                  <p id="lugarPoint" class="text-secondary"></p>
                  <p class="font-weight-bold text-secondary">@lang('string.webpage'):</p>
                  <p class="text-secondary"><a id="webPoint" href="" id="w3s"></a></p>
                  <p id="date" class="text-secondary text-right"></p>
               </div>

               <div class="col-lg-6">
                  <div id="imgPoint"></div>
               </div>

            </div>
            <div class="modal-footer">
               <!--<button type="submit" class="btn btn_p" id="atendidoPoint"><i id='loadCircle' class='fa fa-circle-o-notch fa-spin'></i>&nbsp;Cerrar</button>-->
               <button class="btn btn_outl_p rounded-pill" type="button" data-dismiss="modal"><i class="fas fa-times mr-2"></i>@lang('string.close')</button>
            </div>

         </div>
      </div>
   </div>
   <!-- ************************************* -->
</div>

@endsection


@section('script')
<script type="text/javascript" src="{{asset('js/maps.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHeMnFqK0Z-SnBltWBsKdhks6izYFGajI&callback=iniciarMap&libraries=geometry"></script>
@endsection