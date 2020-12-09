@extends('layouts.app')
@section ('title', 'Edición de noticias')
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
   <h3 class="header_form_title d-none d-md-block">@lang('string.update_news')</h3>
   <h4 class="header_form_title d-block d-md-none">@lang('string.update_news')</h4>
</div>
<div class="container-fluid mt-n3 mt-md-n5 pb-4 px-0 d-flex justify-content-center">
   <form action="{{route('saveUpdateNews')}}" method="POST" enctype="multipart/form-data"
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
                     placeholder="@lang('string.enter_name')" value="{{$noticias->nws_author}}" maxlength="100"
                     required>
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
                     placeholder="@lang('string.enter_title')" value="{{$noticias->nws_title}}" maxlength="200"
                     required>
                  <div class="invalid-feedback">@lang('string.enter_title')</div>
                  <div class="valid-feedback">@lang('string.title_entered')</div>
               </div>
               <div class="form-group col-md-6">
                  <label for="nws_type">@lang('string.category')</label>
                  <select name="nws_type" id="nws_type" class="form-control" required>
                     @if(session('autenticacion')->usr_type_id == 2)
                     <option <?php if($noticias->nws_id_nwst =='1') echo "selected";  ?> value="1">
                        @lang('string.local_news')
                        @else
                     <option <?php if($noticias->nws_id_nwst =='2') echo "selected";  ?> value="2">
                        @lang('string.national_news')
                     </option>
                     <option <?php if($noticias->nws_id_nwst =='3') echo "selected";  ?> value="3">
                        @lang('string.world_news')
                     </option>
                     <option <?php if($noticias->nws_id_nwst =='4') echo "selected";  ?> value="4">
                        @lang('string.fake_news')
                     </option>
                     <option <?php if($noticias->nws_id_nwst =='5') echo "selected";  ?> value="5">
                        @lang('string.official_communiques')
                     </option>
                     @endif
                  </select>
                  <div class="invalid-feedback">@lang('string.select_category')</div>
                  <div class="valid-feedback">@lang('string.category_selected')</div>
               </div>
               <div class="form-group col-12">
                  <label for="description">@lang('string.description')</label>
                  <textarea type="text" name="description" id="description" class="form-control"
                     placeholder="@lang('string.enter_description')" maxlength="500"
                     required>{{$noticias->nws_desc}}</textarea>
                  <div class="invalid-feedback">@lang('string.enter_description')</div>
                  <div class="valid-feedback">@lang('string.description_entered')</div>
               </div>
               <div class="form-group col-12">
                  <label for="nws_image">@lang('string.image')</label>
                  <input type="file" class="form-control-file text-truncate" name="nws_image" id="img" required>
                  <div class="invalid-feedback">@lang('string.select_image')</div>
                  <div class="valid-feedback">@lang('string.image_selected')</div>
                  <div class="d-flex justify-content-center pt-3">
                     <img src="http://34.226.78.219:8080/api_covid19/public/api/img/{{$noticias->nws_img}}"
                        onerror="this.onerror=null; this.src='{{asset('images/img_default.png')}}" id="img_output_01"
                        alt="news_image" class="img-fluid img_reg">
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
                  <label for="nws_date">@lang('string.date')
                     ({{Carbon\Carbon::parse($noticias->nws_date)->format('d/m/yy')}})</label>
                  <input type="date" name="nws_date" id="nws_date" class="form-control"
                     placeholder="@lang('string.select_date')"
                     value="{{Carbon\Carbon::parse($noticias->nws_date)->format('yyyy-m-d')}}" maxlength="15" required>
                  <div class="invalid-feedback">@lang('string.select_date')</div>
                  <div class="valid-feedback">@lang('string.date_selected')</div>
               </div>
               <div class="form-group col-md-6">
                  <label for="hora">@lang('string.hour')
                     ({{Carbon\Carbon::parse($noticias->nws_date)->format('h:i')}})</label>
                  <input type="time" name="hora" id="hora" class="form-control"
                     placeholder="@lang('string.select_hour')"
                     value="{{Carbon\Carbon::parse($noticias->nws_date)->format('h:i a')}}" maxlength="15" required>
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
                     placeholder="@lang('string.enter_name')" value="{{$noticias->nws_source}}" maxlength="200"
                     required>
                  <div class="invalid-feedback">@lang('string.enter_name')</div>
                  <div class="valid-feedback">@lang('string.name_entered')</div>
               </div>
               <div class="form-group col-lg-6 ">
                  <label for="cmp_url">@lang('string.webaddress')</label>
                  <input type="url" name="cmp_url" id="cmp_url" class="form-control"
                     placeholder="@lang('string.enter_webaddress')" value="{{$noticias->nws_url}}" maxlength="200"
                     required>
                  <div class="invalid-feedback">@lang('string.enter_webaddress')</div>
                  <div class="valid-feedback">@lang('string.webaddress_entered')</div>
               </div>
            </div>
         </div>
      </div>
      <div class="d-none">
         <input type="text" id="id" name='id' value="{{request()->route('id')}}">
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
         <button class="btn btn_p rounded-pill" type="submit">@lang('string.update')
            <i class="fas fa-angle-right ml-2"></i></button>
      </div>
   </form>
</div>
@endsection