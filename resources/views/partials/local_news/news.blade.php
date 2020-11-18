<div class="row">
   <div class="col-12 text-center mb-4">
      @if(session('autenticacion')->usr_type_id == 2)
      <a name="" id="" class="btn btn_outl_p rounded-pill" href="{{route('regNews', ['tipo'=> "locales"])}}" role="button"><i class="fas fa-plus mr-2"></i>@lang('string.register')</a>
      @endif
   </div>
   @forelse($noticias as $news)
   <div class="col-md-6 col-lg-4">
      <div class="card card_c mb-3">
         <div class="inner-img">
            <img src="http://34.226.78.219:8080/api_covid19/public/api/img/{{$news->nws_img}}" onerror="this.onerror=null; this.src='{{asset('images/img_default.png')}}'" class="card-img-top img-fluid" 
            alt="nws_img">
            <div class="col-12 bg_sh px-1 d-flex justify-content-between mt-n5 pt-3">
               <p class="text-white text-truncate"><small>{{$news->nws_author}}</small></p>
               <p class="text_p bg-white rounded-pill px-2 text-truncate">
                  <i class="far fa-calendar-alt"></i>
                  <small class="font-weight-bold">{{Carbon\Carbon::parse($news->nws_date)->format('d/m/Y')}}</small>
               </p>
            </div>
         </div>
         <div class="card-body">
            <p class="card-title text-secondary font-weight-bold text-justify mh_2">{{$news->nws_title}}</p>
            <p class="card-text text-secondary text-justify">{{$news->nws_desc}}</p>
            <p class="card-text text_p">{{$news->nws_source}}</p>
            <div class="d-flex justify-content-between">
               <a name="" id="" class="text_a" role="link" href="{{$news->nws_url}}" target="_blank">@lang('string.view_more')</a>
               <p class="card-text text-secondary">{{Carbon\Carbon::parse($news->nws_date)->format('h:i a')}}</p>
            </div>
         </div>
         
         @if(session('autenticacion')->usr_type_id == 2)
         <div class="d-flex justify-content-end p-1 bg_p">
            <a name="" id="" class="btn btn_circl_outl_w m-1" href="{{route('updateNews',['tipo'=> 'locales', $news->id])}}" role="button" title="@lang('string.update')"><i class="fas fa-pen"></i></a>
            <a name="" id="" class="btn btn_circl_outl_w m-1" href="{{route('deleteNews', $news->id)}}" role="button" title="@lang('string.delete')"><i class="fas fa-times"></i></a>
         </div>
         @endif
         
      </div>
   </div>
   @empty
   <div class="container">
      <h1 class="text-center text-primary">@lang('string.no_data')</h1>
   </div>
   @endforelse
</div>