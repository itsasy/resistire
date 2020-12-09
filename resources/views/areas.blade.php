@extends('layouts.app')
@include('layouts.btn_return_map')
@section('content')
<div class="header pt-5 pt-md-0">
   <h3 class="header_title d-none d-md-block">@lang('string.areas')</h3>
   <h4 class="header_title d-block d-md-none">@lang('string.areas')</h4>
</div>
<div class="container pt-3">
   <div class="row">
      <div class="col-md-6 col-lg-4 mb-3">
         <div class="card card_c">
            <div class="circle mh_9">
               <p class="font-weight-bold text-uppercase">@lang('string.responsible_companies')</p>
            </div>
            <div class="card-body p-3">
               <h5 class="card-title text-secondary"></h5>
               <div class="text-center mt-1">
                  <a name="" id="" class="btn btn_outl_p rounded-pill" href="{{route('mapAssociate')}}"
                     role="button">@lang('string.enter')<i class="fas fa-angle-right ml-2"></i></a>
               </div>
            </div>
         </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-3">
         <div class="card card_c">
            <div class="circle mh_9">
               <p class="font-weight-bold text-uppercase">@lang('string.public_institutions')</p>
            </div>
            <div class="card-body p-3">
               <h5 class="card-title text-secondary"></h5>
               <div class="text-center mt-1">
                  <a name="" id="" class="btn btn_outl_p rounded-pill" href="{{route('public_institutions')}}"
                     role="button">@lang('string.enter')<i class="fas fa-angle-right ml-2"></i></a>
               </div>
            </div>
         </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-3">
         <div class="card card_c">
            <div class="circle mh_9">
               <p class="font-weight-bold text-uppercase">@lang('string.food_safety')</p>
            </div>
            <div class="card-body p-3">
               <h5 class="card-title text-secondary"></h5>
               <div class="text-center mt-1">
                  <a name="" id="" class="btn btn_outl_p rounded-pill" href="{{route('alimentos.index')}}"
                     role="button">@lang('string.enter')<i class="fas fa-angle-right ml-2"></i></a>
               </div>
            </div>
         </div>
      </div>
      
      @if(auth()->user()->usr_type_id != 1)
      <div class="col-md-6 col-lg-4 mb-3">
         <div class="card card_c">
            <div class="circle mh_9">
               <p class="font-weight-bold text-uppercase">@lang('string.news')</p>
            </div>
            <div class="card-body p-3">
               <h5 class="card-title text-secondary"></h5>
               <div class="text-center mt-1">
                  <a name="" id="" class="btn btn_outl_p rounded-pill" href="{{route('local_news')}}"
                     role="button">@lang('string.enter')<i class="fas fa-angle-right ml-2"></i></a>
               </div>
            </div>
         </div>
      </div>
      @endif
   </div>
</div>
@endsection