@extends('layouts.app')

@section ('title', 'Lista de asociados')

@section('content')
<div class="container-fluid position-absolute">
   <a name="" id="" class="btn btn_transp mt-2" href="{{route('allAsociates')}}" role="button">
      <i class="fas fa-angle-left mr-0 mr-md-2"></i>
      <spam class="d-none d-md-inline">@lang('string.back')</spam>
   </a>
</div>

<div class="header pt-5 pt-md-0">
   <h3 class="header_title d-none d-md-block">{{$name}}</h3>
   <h4 class="header_title d-block d-md-none">{{$name}}</h4>
</div>
<div class="container pt-3">
   <div class="row">
      <div class="col-12 text-center mb-3">
         <a name="" id="" class="btn btn_outl_p rounded-pill" href="{{route('regCompanies')}}" role="button"><i class="fas fa-plus mr-2"></i>@lang('string.register')</a>
      </div>
      @forelse($data as $element)
      <div class="col-md-6 col-lg-4 mb-3">
         <div class="card card_c">
            <div class="inner-img">
               <a name="" id="" class="" href="" target="_blank" role="button">
                  <img src="{{url('/'). '/api/imageCompany/' . $element->cmp_img}}" onerror="this.onerror=null; this.src='{{asset('images/img_default.png')}}" class="card-img-top img-fluid">
               </a>
            </div>
            <div class="card-body">
               <p class="card-title text-secondary font-weight-bold text-justify">{{$element->cmp_name}}</p>
               <p class="card-text text-secondary text-justify">{{$element->cmp_address}}</p>
               
               <div class="d-flex justify-content-center">
                  <a name="" id=""
                  @if ($element->cmp_instagram == null)
                     class="btn m-1 btn_circl_outl_g" href="#"
                  @else
                     class="btn m-1 btn_circl_outl_p" href="{{$element->cmp_instagram}}" target="_blank"
                  @endif
                  role="button" title="@lang('string.instagram')"><i class="fab fa-instagram"></i></a>
                  
                  <a name="" id="" 
                  @if ($element->cmp_facebook == null)
                     class="btn m-1 btn_circl_outl_g" href="#"
                  @else
                     class="btn m-1 btn_circl_outl_p" href="{{$element->cmp_facebook}}" target="_blank"
                  @endif
                  role="button" title="@lang('string.instagram')"><i class="fab fa-facebook-f"></i></a>
                  
                  <a name="" id="" 
                  @if ($element->cmp_url == null)
                     class="btn m-1 btn_circl_outl_g" href="#"
                  @else
                     class="btn m-1 btn_circl_outl_p" href="{{$element->cmp_url}}" target="_blank"
                  @endif
                  role="button" title="@lang('string.website')"><i class="far fa-window-maximize"></i></a>
               </div>
            </div>
            
            @auth
            <div class="d-flex justify-content-end bg_p p-1">
               <a name="" id="" class="btn btn_circl_outl_w m-1" href="{{route('editCompanies', $element->id)}}" role="button" title="@lang('string.update')"><i class="fas fa-pen"></i></a>
               <a name="" id="" class="btn btn_circl_outl_w m-1" href="{{route('deleteCompanies', $element->id)}}" role="button" title="@lang('string.delete')"><i class="fas fa-times"></i></a>
               <!--<a name="" id="" class="btn btn_circl_outl_p ml-1" href="{{route('banCompanies', $element->id)}}" role="button" title="@if($element->cmp_state == 1) Bloquear @else Desbloquear @endif">
                  <i class="fas @if($element->cmp_state==1) fa-check  @else  fa-ban @endif" style="color: @if($element->cmp_state==1) green @else  red @endif"></i>
               </a>-->
            </div>
            @endauth
            
         </div>
      </div>
      @empty
      <div class="col-12">
         <h5 class="text-center text_p">@lang('string.no_data')</h5>
      </div>
      @endforelse
   </div>
</div>
@endsection