@extends('layouts.app')
@section ('title', 'Registrar noticia')
@section('content')
<div class="container-fluid">
   <a name="" id="" class="btn btn_transp mt-2 position-absolute" @if(\Request::is('*/locales'))
      href="{{route('local_news')}}" @elseif(\Request::is('*/nacionales'))
      href="{{route('noticias', ['seccion'=> "nacionales"])}}" @elseif(\Request::is('*/oficiales'))
      href="{{route('noticias', ['seccion'=> "oficiales"])}}" @elseif(\Request::is('*/fake'))
      href="{{route('noticias', ['seccion'=> "fake"])}}" @elseif(\Request::is('*/mundo'))
      href="{{route('noticias', ['seccion'=> "mundo"])}}" @endif role="button">
      <i class="fas fa-angle-left mr-0 mr-md-2"></i>
      <spam class="d-none d-md-inline">@lang('string.cancel')</spam>
   </a>
</div>
<div class="header_form pt-5 pt-md-0 pb-3">
   <h3 class="header_form_title d-none d-md-block">@lang('string.reg_news')
      @if(\Request::is('*/locales'))
      @lang('string.of') {{$distrito}}
      @elseif(\Request::is('*/nacionales'))
      (@lang('string.nationals'))
      @elseif(\Request::is('*/oficiales'))
      (@lang('string.official_communiques'))
      @elseif(\Request::is('*/fake'))
      (@lang('string.fake'))
      @elseif(\Request::is('*/mundo'))
      (@lang('string.world'))
      @endif
   </h3>
   <h4 class="header_form_title d-block d-md-none">@lang('string.reg_news')
      @if(\Request::is('*/locales'))
      @lang('string.of') {{$distrito}}
      @elseif(\Request::is('*/nacionales'))
      (@lang('string.nationals'))
      @elseif(\Request::is('*/oficiales'))
      (@lang('string.official_communiques'))
      @elseif(\Request::is('*/fake'))
      (@lang('string.fake'))
      @elseif(\Request::is('*/mundo'))
      (@lang('string.world'))
      @endif
   </h4>
</div>

<div class="container-fluid mt-n3 mt-md-n5 pb-4 px-0 d-flex justify-content-center">
   <form action="{{route('saveNews')}}" method="POST" enctype="multipart/form-data"
      class="col-md-10 col-lg-8 p-2 p-md-4 form_reg shadow border needs-validation" novalidate>
      {{ csrf_field() }}
      <div class="py-3">
         <div class="d-flex justify-content-center mb-2">
            <p class="sub_title text-center py-2 px-3 position-absolute mt-n3">@lang('string.author_data')</p>
         </div>
         <div class="sub_title_bg pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row d-flex justify-content-center">
               <div class="form-group col">
                  <label for="author">@lang('string.name')</label>
                  <input type="text" name="author" id="author" class="form-control"
                     placeholder="@lang('string.enter_name')" maxlength="100" required>
                  <div class="invalid-feedback">@lang('string.enter_name')</div>
                  <div class="valid-feedback">@lang('string.name_entered')</div>
               </div>
            </div>
         </div>
      </div>
      <div class="py-3">
         <div class="d-flex justify-content-center mb-2">
            <p class="sub_title text-center py-2 px-3 position-absolute mt-n3">@lang('string.general_data')</p>
         </div>
         <div class="sub_title_bg pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row d-flex justify-content-center">
               <div class="form-group col-md-6">
                  <label for="title">@lang('string.title')</label>
                  <input type="text" name="title" id="title" class="form-control"
                     placeholder="@lang('string.enter_title')" maxlength="200" required>
                  <div class="invalid-feedback">@lang('string.enter_title')</div>
                  <div class="valid-feedback">@lang('string.title_entered')</div>
               </div>
               <div class="form-group col-md-6">
                  <label for="nws_type">@lang('string.category')</label>
                  <select name="nws_type" id="nws_type" class="form-control" required>
                     @if(\Request::is('*/locales'))
                     <option value="1">@lang('string.local_news')</option>
                     @elseif(\Request::is('*/nacionales'))
                     <option value="2">@lang('string.national_news')</option>
                     @elseif(\Request::is('*/mundo'))
                     <option value="3">@lang('string.world_news')</option>
                     @elseif(\Request::is('*/fake'))
                     <option value="4">@lang('string.fake_news')</option>
                     @elseif(\Request::is('*/oficiales'))
                     <option value="5">@lang('string.official_communiques')</option>
                     @endif
                  </select>
                  <div class="invalid-feedback">@lang('string.select_category')</div>
                  <div class="valid-feedback">@lang('string.category_selected')</div>
               </div>
               <div class="form-group col-12">
                  <label for="description">@lang('string.description')</label>
                  <textarea type="text" name="description" id="description" class="form-control"
                     placeholder="@lang('string.enter_description')" maxlength="500" required></textarea>
                  <div class="invalid-feedback">@lang('string.enter_description')</div>
                  <div class="valid-feedback">@lang('string.description_entered')</div>
               </div>
               <div class="form-group col-12">
                  <label for="nws_image">@lang('string.image')</label>
                  <input type="file" class="form-control-file text-truncate" name="nws_image" id="img" required>
                  <div class="invalid-feedback">@lang('string.select_image')</div>
                  <div class="valid-feedback">@lang('string.image_selected')</div>
                  <div class="d-flex justify-content-center pt-3">
                     <img src="{{asset('images/img_default.png')}}" class="img-fluid img_reg" id="img_output_01"
                        alt="nws_image">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="py-3">
         <div class="d-flex justify-content-center mb-2">
            <p class="sub_title text-center py-2 px-3 position-absolute mt-n3">@lang('string.publication_data')</p>
         </div>
         <div class="sub_title_bg pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row d-flex justify-content-center">
               <div class="form-group col-md-6">
                  <label for="nws_date">@lang('string.date')</label>
                  <input type="date" name="nws_date" id="nws_date" class="form-control"
                     placeholder="@lang('string.select_date')" maxlength="15" required>
                  <div class="invalid-feedback">@lang('string.select_date')</div>
                  <div class="valid-feedback">@lang('string.date_selected')</div>
               </div>
               <div class="form-group col-md-6">
                  <label for="hora">@lang('string.hour')</label>
                  <input type="time" name="hora" id="hora" class="form-control"
                     placeholder="@lang('string.select_hour')" maxlength="15" required>
                  <div class="invalid-feedback">@lang('string.select_hour')</div>
                  <div class="valid-feedback">@lang('string.hour_selected')</div>
               </div>
            </div>
         </div>
      </div>
      <div class="py-3">
         <div class="d-flex justify-content-center mb-2">
            <p class="sub_title text-center py-2 px-3 position-absolute mt-n3">@lang('string.source_data')</p>
         </div>
         <div class="sub_title_bg pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row">
               <div class="form-group col-lg-6">
                  <label for="source">@lang('string.name')</label>
                  <input type="text" name="source" id="source" class="form-control"
                     placeholder="@lang('string.enter_name')" maxlength="200" required>
                  <div class="invalid-feedback">@lang('string.enter_name')</div>
                  <div class="valid-feedback">@lang('string.name_entered')</div>
               </div>
               <div class="form-group col-lg-6 ">
                  <label for="cmp_url">@lang('string.webaddress')</label>
                  <input type="url" name="cmp_url" id="cmp_url" class="form-control"
                     placeholder="@lang('string.enter_webaddress')" maxlength="200" required>
                  <div class="invalid-feedback">@lang('string.enter_webaddress')</div>
                  <div class="valid-feedback">@lang('string.webaddress_entered')</div>
               </div>
            </div>
         </div>
      </div>
      <div class="d-none">
         <input type="text" id="tipo" name='tipo' value="{{request()->route('tipo')}}">
      </div>
      <div class="form-group d-flex justify-content-between mb-0">
         <a name="" id="" class="btn btn_outl_p rounded-pill" @if(\Request::is('*/locales'))
            href="{{route('local_news')}}" @elseif(\Request::is('*/nacionales'))
            href="{{route('noticias', ['seccion'=> "nacionales"])}}" @elseif(\Request::is('*/oficiales'))
            href="{{route('noticias', ['seccion'=> "oficiales"])}}" @elseif(\Request::is('*/fake'))
            href="{{route('noticias', ['seccion'=> "fake"])}}" @elseif(\Request::is('*/mundo'))
            href="{{route('noticias', ['seccion'=> "mundo"])}}" @endif role="button"><i
               class="fas fa-times mr-2"></i>@lang('string.cancel')</a>
         <button class="btn btn_p rounded-pill" type="submit">@lang('string.register')
            <i class="fas fa-angle-right ml-2"></i></button>
      </div>
   </form>
</div>
@endsection