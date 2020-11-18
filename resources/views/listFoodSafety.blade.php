@extends('layouts.app')
@section ('title', 'Seguridad Sanitaria')

@section('content')
<div class="container-fluid position-absolute">
   <a name="" id="" class="btn btn_transp mt-2" href="{{route('alimentos.index')}}" role="button">
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
         <a name="" id="" class="btn btn_outl_p rounded-pill" href="{{route('alimentos.create')}}" role="button"><i class="fas fa-plus mr-2"></i>@lang('string.register')</a>
      </div>
      @forelse($data as $element)
      <div class="col-md-6 col-lg-4">
         <div class="card card_c mb-3">
            <div class="inner-img">
               <img src="{{url("storage/foodSafety/"). '/'.$element->fds_img}}" onerror="this.onerror=null; this.src='{{asset('images/img_default.png')}}'" class="card-img-top img-fluid" alt="atp_img">
            </div>
            <div class="card-body">
               <p class="card-title text-secondary font-weight-bold text-justify">{{$element->fds_title}}</p>
               <p class="card-text text-secondary text-justify">{{$element->fds_desc}}</p>

               <div class="d-flex justify-content-center mb-3">
                  <a name="" id="" @if ($element->fds_instagram == null)
                  class="btn m-1 btn_circl_outl_g" href="#"
                  @else
                  class="btn m-1 btn_circl_outl_p" href="{{$element->fds_instagram}}" target="_blank"
                  @endif
                  role="button" title="@lang('string.instagram')"><i class="fab fa-instagram"></i></a>

                  <a name="" id="" @if ($element->fds_facebook == null)
                  class="btn m-1 btn_circl_outl_g" href="#"
                  @else
                  class="btn m-1 btn_circl_outl_p" href="{{$element->fds_facebook}}" target="_blank"
                  @endif
                  role="button" title="@lang('string.instagram')"><i class="fab fa-facebook-f"></i></a>

                  <a name="" id="" @if ($element->fds_youtube == null)
                  class="btn m-1 btn_circl_outl_g" href="#"
                  @else
                  class="btn m-1 btn_circl_outl_p" href="{{$element->fds_youtube}}" target="_blank"
                  @endif
                  role="button" title="@lang('string.instagram')"><i class="fab fa-youtube"></i></a>

                  <a name="" id="" @if ($element->fds_url == null)
                  class="btn m-1 btn_circl_outl_g" href="#"
                  @else
                  class="btn m-1 btn_circl_outl_p" href="{{$element->fds_url}}" target="_blank"
                  @endif
                  role="button" title="@lang('string.website')"><i class="far fa-window-maximize"></i></a>
               </div>

               <div class="d-flex justify-content-between">
                  <a name="" id="" class="text_p font-weight-bold"
                  @if ($element->fds_instagram != null)
                     href="{{$element->fds_instagram}}" target="_blank"
                  @elseif ($element->fds_facebook != null)
                     href="{{$element->fds_facebook}}" target="_blank"
                  @elseif ($element->fds_youtube != null)
                     href="{{$element->fds_youtube}}" target="_blank"
                  @elseif ($element->fds_url != null)
                     href="{{$element->fds_url}}" target="_blank"
                  @else
                     href="#"
                  @endif
                  role="link">{{$element->fds_source}}</a>
                     
                  <p class="card-text"><small class="text-muted font-weight-bold">{{Carbon\Carbon::parse($element->fds_date)->format('h:i a')}}</small></p>
               </div>
            </div>
            
            @auth
            <div class="d-flex justify-content-end p-1 bg_p">
               <a name="" id="" class="btn btn_circl_outl_w m-1" href="{{route('alimentos.edit', $element->id)}}" role="button" title="@lang('string.update')"><i class="fas fa-pen"></i></a>
               {{--<a name="" id="" class="btn btn_circl_outl_w m-1" href="{{route('alimentos.destroy', $element->id)}}" role="button" title="@lang('string.delete')"><i class="fas fa-times"></i></a>--}}
               <form action="{{route('alimentos.destroy', $element->id)}}" method="POST">
                     @method('delete')
                     @csrf
                     <button type="submit" class="btn btn_circl_outl_w m-1" title="@lang('string.delete')"><i class="fas fa-times"></i></button>
               </form>
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