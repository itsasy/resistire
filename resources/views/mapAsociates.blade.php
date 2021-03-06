@extends('layouts.app')
@include('layouts.btn_return_map')
@section('title', 'Prueba')
@section('content')
<div class="header pt-5 pt-md-0">
   <h3 class="header_title d-none d-md-block">@lang('string.responsible_companies')</h3>
   <h4 class="header_title d-block d-md-none">@lang('string.responsible_companies')</h4>
</div>
<div class="container-fluid barra">
   <div class="row">
      <p class="text-secondary" id="district" hidden>{{$district}}</p>
      <p class="text-secondary" id="iddistrict" hidden>{{$iddistrict}}</p>
      <p class="text-sdsfecondary" id="provincia" hidden>{{$provincia}}</p>
   </div>

   <div class="position-fixed mb-1 z_i_1">
      <div class="d-block d-md-none">
         <a name="" id="" class="btn btn_circl_outl_p mt-3" href="{{route('regCompanies')}}" role="button"><i class="fas fa-plus"></i></a>
         <a name="" id="" class="btn btn_circl_outl_p mt-3" href="{{route('allAsociates')}}" role="button"><i class="fas fa-eye"></i></a>
      </div>
      <div class="d-none d-md-block">
         <a name="" id="" class="btn btn_outl_p rounded-pill mt-3 mr-1" href="{{route('regCompanies')}}" role="button"><i class="fas fa-plus mr-2"></i>@lang('string.register')</a>
         <a name="" id="" class="btn btn_outl_p rounded-pill mt-3 ml-1" href="{{route('allAsociates')}}" role="button"><i class="fas fa-eye mr-2"></i>@lang('string.categories')</a>
      </div>
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
                  <h5>@lang('string.location'):</h5>
                  <p id="lugarPoint" class="text-secondary"></p>
                  <h5>@lang('string.webpage'):</h5>
                  <p class="text-secondary"><a id="webPoint" href="" id="w3s"></a></p>
                  <p id="date" class="text-secondary text-right"></p>
               </div>
               <div class="col-lg-6">
                  <div id="imgPoint" class="img-fluid"></div>
               </div>
            </div>
            <div class="modal-footer">
               <!--<button type="button" class="btn btn-primary" data-dismiss="modal"><i id='loadCircle' class='fa fa-circle-o-notch fa-spin'></i>Aceptar</button>-->
               <a href="#" id="" class="btn btn_p rounded-pill d-flex justify-content-center align-items-center" data-dismiss="modal">
                  <i class="fas fa-times mr-0 mr-md-2"></i>
                  <p class="p-0 m-0 d-none d-md-block">@lang('string.close')</p>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/mapAsociates.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHeMnFqK0Z-SnBltWBsKdhks6izYFGajI&libraries=geometry&&callback=iniciarMap">
</script>
@endsection