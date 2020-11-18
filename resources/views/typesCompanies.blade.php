@extends('layouts.app')

@section ('title', 'Empresas responsables')

@section('content')
<div class="container-fluid position-absolute">
   <a name="" id="" class="btn btn_transp mt-2" href="{{route('mapAssociate')}}" role="button">
      <i class="fas fa-angle-left mr-0 mr-md-2"></i>
      <spam class="d-none d-md-inline">@lang('string.back')</spam>
   </a>
</div>

<div class="header pt-5 pt-md-0">
   <h3 class="header_title d-none d-md-block">@lang('string.responsible_companies')</h3>
   <h4 class="header_title d-block d-md-none">@lang('string.responsible_companies')</h4>
</div>

<div class="container pt-3">
   <div class="row">
      <div class="col-12 text-center mb-3">
         <a name="" id="" class="btn btn_outl_p rounded-pill" href="#" role="button" data-toggle="modal" data-target="#modalRegister">
         <i class="fas fa-plus mr-2"></i>@lang('string.register') @lang('string.category')</a>
      </div>
      @forelse ($categories as $type)
      <div class="col-md-6 col-lg-4 mb-3">
         <div class="card card_c">
            <div class="row no-gutters">
               <div class="col-3 bg_p p-2 d-flex justify-content-center align-items-center">
                  @if($type->id == 1)
                  <img src="{{asset('images/company_types/hospital.svg')}}" class="img-fluid"></img>
                  @elseif($type->id == 2)
                  <img src="{{asset('images/company_types/police-station.svg')}}" class="img-fluid"></img>
                  @elseif($type->id == 3)
                  <img src="{{asset('images/company_types/hotel.svg')}}" class="img-fluid"></img>
                  @elseif($type->id == 4)
                  <img src="{{asset('images/company_types/market.svg')}}" class="img-fluid"></img>
                  @elseif($type->id == 5)
                  <img src="{{asset('images/company_types/restaurant.svg')}}" class="img-fluid"></img>
                  @endif
               </div>
               <div class="col-9">
                  <div class="card-body p-3">
                     <h5 class="card-title text-secondary">{{$type->cmpt_desc}}</h5>
                     <div class="text-right mt-5">
                        <a name="" id="" class="btn btn_outl_p rounded-pill" href="{{route('show_asociate', $type)}}" role="button">@lang('string.enter')<i class="fas fa-angle-right ml-2"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @empty
      <div class="col-12">
         <h5 class="text-center text_p">@lang('string.no_data')</h5>
      </div>
      @endforelse
   </div>

   <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
         <form action="{{route('save_company_category')}}" method="POST" class="modal-content form_reg needs-validation" novalidate>
            @csrf
            <div class="modal-header justify-content-center align-items-center bg_p mh_4 p-0">
               <h6 class="text-white text-uppercase font-weight-bold m-0">@lang('string.reg_category')</h6>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label for="cmpt_desc">@lang('string.name')</label>
                  <input type="text" name="cmpt_desc" id="cmpt_desc" class="form-control" placeholder="@lang('string.enter_name')" maxlength="100" required>
                  <div class="invalid-feedback">@lang('string.enter_name')</div>
                  <div class="valid-feedback">@lang('string.name_entered')</div>
               </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
               <button type="button" class="btn btn_outl_p rounded-pill" data-dismiss="modal"><i class="fas fa-times mr-2"></i>@lang('string.close')</button>
               <button type="submit" class="btn btn_p rounded-pill">@lang('string.register')<i class="fas fa-angle-right ml-2"></i></button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection