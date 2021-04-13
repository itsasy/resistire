@extends('layouts.app')
@include('layouts.btn_previous')
@section ('title', 'Registrar punto de ayuda')
@section('content')
<div class="header_form pt-5 pt-md-0 pb-3 pt-md-0">
   <h3 class="header_form_title d-none d-md-block">@lang('string.update_responsible_company')</h3>
   <h4 class="header_form_title d-block d-md-none">@lang('string.update_responsible_company')</h4>
</div>
<div class="container-fluid mt-n3 mt-md-n5 pb-4 px-0 d-flex justify-content-center">
   <form action="{{route('saveUpdateCompanies')}}" method="POST" enctype="multipart/form-data" class="col-md-10 col-lg-8 p-2 p-md-4 form_reg shadow border needs-validation" novalidate>
      {{ csrf_field() }}
      <div class="py-3">
         <div class="d-flex justify-content-center mb-2">
            <p class="sub_title text-center py-2 px-3 position-absolute mt-n3">@lang('string.general_data')</p>
         </div>
         <div class="sub_title_bg pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row d-flex justify-content-center">
               <div class="form-group col-md-6">
                  <label for="cmp_name">@lang('string.name')</label>
                  <input type="text" name="cmp_name" id="cmp_name" class="form-control" placeholder="@lang('string.enter_name')" value="{{$companie->cmp_name}}" maxlength="200" required>
                  <div class="invalid-feedback">@lang('string.enter_name')</div>
                  <div class="valid-feedback">@lang('string.name_entered')</div>
               </div>
               <div class="form-group col-md-6">
                  <label for="cmp_id_cmpt">@lang('string.category')</label>
                  <select name="cmp_id_cmpt" class="form-control" required>
                     <option value="" selected="true" disabled="disabled">@lang('string.select')</option>
                     <option <?php if ($companie->cmp_id_cmpt == '1') echo "selected"; ?> value="1">@lang('string.cmp_1_name')</option>
                     <option <?php if ($companie->cmp_id_cmpt == '2') echo "selected"; ?> value="2">@lang('string.cmp_2_name')</option>
                     <option <?php if ($companie->cmp_id_cmpt == '3') echo "selected"; ?> value="3">@lang('string.cmp_3_name')</option>
                     <option <?php if ($companie->cmp_id_cmpt == '4') echo "selected"; ?> value="4">@lang('string.cmp_4_name')</option>
                     <option <?php if ($companie->cmp_id_cmpt == '5') echo "selected"; ?> value="5">@lang('string.cmp_5_name')</option>
                  </select>
                  <div class="invalid-feedback">@lang('string.select_category')</div>
                  <div class="valid-feedback">@lang('string.category_selected')</div>
               </div>
               <div class="form-group col-lg-12">
                  <label for="address_place">@lang('string.address')</label>
                  <input type="text" name="address_place" id="address_place" class="form-control" placeholder="@lang('string.enter_address')" value="{{$companie->cmp_address}}" maxlength="200" required>
                  <div class="invalid-feedback">@lang('string.enter_address')</div>
                  <div class="valid-feedback">@lang('string.address_entered')</div>
               </div>
               <div class="form-group col-12">
                  <p class="text-center">@lang('string.select_location_on_map')</p>
                  <div id="map" class="map_reg"></div>
               </div>
               <div class="d-none">
                  <input type="text" name="cmp_latitude" id="latitude_place" value="{{$companie->cmp_latitude}}">
                  <input type="text" name="cmp_longitude" id="length_place" value="{{$companie->cmp_longitude}}">
               </div>
               <div class="form-group col-lg-12">
                  <label for="img">@lang('string.image')</label>
                  <input type="file" class="form-control-file text-truncate" name="cmp_img" id="img">
                  <div class="invalid-feedback">@lang('string.select_image')</div>
                  <div class="valid-feedback">@lang('string.image_selected')</div>
                  <div class="d-flex justify-content-center pt-3">
                     <img src="{{url('/'). '/api/imageCompany/' . $companie->cmp_img}}" onerror="this.onerror=null; this.src='{{asset('images/img_default.png')}}" id="img_output_01" alt="" class="img-fluid img_reg">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="py-3">
         <div class="d-flex justify-content-center mb-2">
            <p class="sub_title text-center py-2 px-3 position-absolute mt-n3">@lang('string.social_networks') @lang('string.optional')</p>
         </div>
         <div class="sub_title_bg pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row">
               <div class="form-group col-lg-6">
                  <label for="cmp_instagram">@lang('string.instagram')</label>
                  <input type="url" name="cmp_instagram" id="cmp_instagram" class="form-control" placeholder="@lang('string.enter_instagram')" value="{{$companie->cmp_instagram}}" maxlength="200">
                  <div class="invalid-feedback">@lang('string.enter_instagram')</div>
                  <div class="valid-feedback">@lang('string.instagram_entered')</div>
               </div>
               <div class="form-group col-lg-6">
                  <label for="cmp_facebook">@lang('string.facebook')</label>
                  <input type="url" name="cmp_facebook" id="cmp_facebook" class="form-control" placeholder="@lang('string.enter_facebook')" value="{{$companie->cmp_facebook}}" maxlength="200">
                  <div class="invalid-feedback">@lang('string.enter_facebook')</div>
                  <div class="valid-feedback">@lang('string.facebook_entered')</div>
               </div>
               <div class="form-group col-lg-6 ">
                  <label for="cmp_url">@lang('string.webpage')</label>
                  <input type="url" name="cmp_url" id="cmp_url" class="form-control" placeholder="@lang('string.enter_webpage')" value="{{$companie->cmp_url}}" maxlength="200">
                  <div class="invalid-feedback">@lang('string.enter_webpage')</div>
                  <div class="valid-feedback">@lang('string.webpage_entered')</div>
               </div>
            </div>
         </div>
      </div>
      <div class="form-group d-flex justify-content-between mb-0">
         <a name="" id="" class="btn btn_outl_p rounded-pill" href="{{URL::previous()}}" role="button"><i class="fas fa-times mr-2"></i>@lang('string.cancel')</a>
         <button class="btn btn_p rounded-pill" type="submit">@lang('string.update')<i class="fas fa-angle-right ml-2"></i></button>
      </div>
      <div class="d-none">
         <input type="text" id="id" name='id' value="{{request()->route('id')}}">
      </div>
   </form>
</div>
@endsection


@section('script')
<script type="text/javascript" src="{{asset('js/pointsMap.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMpejtLKPvpLv1KbtzGXpRC0yvPqm-w8o&callback=iniciarMap"></script>
@endsection