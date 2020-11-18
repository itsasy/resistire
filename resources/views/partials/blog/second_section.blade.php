<div aria-labelledby="puntosTab" class="tab-pane {{Request::segment(2) == 'puntos' ? 'show active' : ' '}}" id="Puntos" role="tabpanel">
   <div class="container">
      <div class="row">
         <div class="col-12 text-center mb-3">
            <a name="" id="" class="btn btn_outl_p rounded-pill" href="{{route('regPoint')}}" role="button"><i class="fas fa-plus mr-2"></i>@lang('string.register')</a>
         </div>
         @forelse($puntos as $points)
         <div class="col-lg-4">
            <div class="card card_c mb-3">
               <div class="inner-img">
                  <img src="http://34.226.78.219:8080/api_covid19/public/api/imgPoints/{{$points->atp_img}}" onerror="this.onerror=null; this.src='{{asset('images/img_default.png')}}" class="card-img-top img-fluid" alt="atp_img">
               </div>
               <div class="card-body">
                  <p class="card-title text-secondary font-weight-bold text-justify mh_3">{{$points->atp_name}}</p>
                  <p class="card-text text-secondary text-justify">{{$points->atp_address}}</p>
                  
                  <div class="d-flex justify-content-center">
                     <a name="" id="" 
                     @if ($points->atp_url == null)
                     class="btn m-1 btn_circl_outl_g" href="#"
                     @else
                     class="btn m-1 btn_circl_outl_p" href="{{$points->atp_url}}" target="_blank"
                     @endif
                     role="button" title="@lang('string.website')"><i class="far fa-window-maximize"></i></a>
               </div>
               </div>
               
               @auth
               <div class="d-flex justify-content-end bg_p p-1">
                  <a name="" id="" class="btn btn_circl_outl_w m-1" href="{{route('updatePoint', $points->id)}}" role="button" title="@lang('string.update')"><i class="fas fa-pen"></i></a>
                  <a name="" id="" class="btn btn_circl_outl_w m-1" href="{{route('deletePoint', $points->id)}}" role="button" title="@lang('string.delete')"><i class="fas fa-times"></i></a>
               </div>
               @endauth
               
            </div>
         </div>
         @empty
         <div class="container">
            <h1 class="text-center text-primary">@lang('string.no_data')</h1>
         </div>
         @endforelse
      </div>
   </div>
</div>