@extends('layouts.app')
@include('layouts.btn_previous')
@section ('title', 'Actualizar seguridad alimentaria')
@section('content')
<div class="header_form pt-5 pt-md-0 pb-3">
   <h3 class="header_form_title d-none d-md-block">@lang('string.update_food_safety')</h3>
   <h4 class="header_form_title d-block d-md-none">@lang('string.update_food_safety')</h4>
</div>
<div class="container-fluid mt-n3 mt-md-n5 pb-4 px-0 d-flex justify-content-center">
   <form action="{{route('alimentos.update', $article->id)}}" method="POST" enctype="multipart/form-data" class="col-md-10 col-lg-8 p-2 p-md-4 form_reg shadow border needs-validation" novalidate>
      @method('PUT')
      {{ csrf_field() }}
      <div class="py-3">
         <div class="d-flex justify-content-center mb-2">
            <p class="sub_title text-center py-2 px-3 position-absolute mt-n3">@lang('string.general_data')</p>
         </div>
         <div class="sub_title_bg pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row d-flex justify-content-center">
               <div class="form-group col-md-6">
                  <label for="fds_title">@lang('string.title')</label>
                  <input type="text" name="fds_title" id="fds_title" class="form-control" placeholder="@lang('string.enter_title')" value="{{$article->fds_title}}" maxlength="200" required>
                  <div class="invalid-feedback">@lang('string.enter_title')</div>
                  <div class="valid-feedback">@lang('string.title_entered')</div>
               </div>
               <div class="form-group col-md-6">
                  <label for="fds_id_fdst">@lang('string.category')</label>
                  <select name="fds_id_fdst" class="form-control " required>
                     <option value="#" disabled="disabled">@lang('string.select')</option>
                     @foreach ($types as $tipo)
                     <option @if($tipo->id == $article->fds_id_fdst) 'selected' @endif value="{{$tipo->id}}">{{$tipo->fdst_desc}}</option>
                     @endforeach
                  </select>
                  <div class="invalid-feedback">@lang('string.select_category')</div>
                  <div class="valid-feedback">@lang('string.category_selected')</div>
               </div>
               <div class="form-group col-12">
                  <label for="fds_desc">@lang('string.description')</label>
                  <input type="text" name="fds_desc" id="fds_desc" class="form-control" placeholder="@lang('string.enter_description')" value="{{$article->fds_desc}}" maxlength="500" required>
                  <div class="invalid-feedback">@lang('string.enter_description')</div>
                  <div class="valid-feedback">@lang('string.description_entered')</div>
               </div>
               <div class="form-group col-md-6">
                  <label for="fds_source">@lang('string.source')</label>
                  <input type="text" name="fds_source" id="fds_source" class="form-control" placeholder="@lang('string.enter_source')" value="{{$article->fds_source}}" maxlength="200" required>
                  <div class="invalid-feedback">@lang('string.enter_source')</div>
                  <div class="valid-feedback">@lang('string.source_entered')</div>
               </div>
               <div class="form-group col-md-6">
                  <label for="fds_date">@lang('string.date')</label>
                  <input type="date" name="fds_date" id="fds_date" class="form-control" placeholder="@lang('string.select_date')" value="{{$article->fds_date}}" maxlength="200" required>
                  <div class="invalid-feedback">@lang('string.select_date')</div>
                  <div class="valid-feedback">@lang('string.date_selected')</div>
               </div>
               <div class="form-group col-12">
                  <label for="img">@lang('string.image')</label>
                  <input type="file" class="form-control-file text-truncate" name="fds_img" id="img">
                  <div class="invalid-feedback">@lang('string.select_image')</div>
                  <div class="valid-feedback">@lang('string.image_selected')</div>
                  <div class="d-flex justify-content-center pt-3">
                     <img src="{{url("storage/foodSafety/"). '/'.$article->fds_img}}" onerror="this.onerror=null; this.src='{{asset('images/img_default.png')}}'" class="img-fluid img_reg" id="img_output_01" alt="">
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
                  <label for="fsd_instagram">@lang('string.instagram')</label>
                  <input type="url" name="fsd_instagram" id="fsd_instagram" class="form-control" placeholder="@lang('string.enter_instagram')" value="{{$article->fds_instagram}}" maxlength="200">
                  <div class="invalid-feedback">@lang('string.enter_instagram')</div>
                  <div class="valid-feedback">@lang('string.instagram_entered')</div>
               </div>
               <div class="form-group col-lg-6">
                  <label for="fsd_facebook">@lang('string.facebook')</label>
                  <input type="url" name="fsd_facebook" id="fsd_facebook" class="form-control" placeholder="@lang('string.enter_facebook')" value="{{$article->fds_facebook}}" maxlength="200">
                  <div class="invalid-feedback">@lang('string.enter_facebook')</div>
                  <div class="valid-feedback">@lang('string.facebook_entered')</div>
               </div>
               <div class="form-group col-lg-6">
                  <label for="fsd_youtube">@lang('string.youtube')</label>
                  <input type="url" name="fsd_youtube" id="fsd_youtube" class="form-control" placeholder="@lang('string.enter_youtube')" value="{{$article->fds_youtube}}" maxlength="200">
                  <div class="invalid-feedback">@lang('string.enter_youtube')</div>
                  <div class="valid-feedback">@lang('string.youtube_entered')</div>
               </div>
               <div class="form-group col-lg-6 ">
                  <label for="fsd_url">@lang('string.webpage')</label>
                  <input type="url" name="fsd_url" id="fsd_url" class="form-control" placeholder="@lang('string.enter_webpage')" value="{{$article->fds_url}}" maxlength="200">
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
   </form>
</div>
@endsection