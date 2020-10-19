<div aria-labelledby="localesTab" class="tab-pane fade {{Request::segment(2) == 'administrador' ? 'show active' : ' '}}"
    id="administrador" role="tabpanel">
    <div class="container">
        <h3 class="text_p txt_c font-weight-bold my-4 text-center text-uppercase">¡NOTICIAS DE
            {{session('distrito')}}!
        </h3>
        <div class="row">
            @foreach($noticias as $news)
            @if($news->nws_id_nwst == 1)
            <div class="col-lg-4">
                <div class="card mb-3 card_reveal_effect_rotate_y rounded_1 shadow">
                    <div class="inner-img rounded_t_1">
                        <img src="http://34.226.78.219:8080/api_covid19/public/api/img/{{$news->nws_img}}"
                            class="card-img-top rounded_t_1 img_reg" alt="img-news">
                        <p class="position-absolute text-white mt-n5 ml-3 ml-lg-4 py-1">
                            <small>{{$news->nws_author}}</small></p>
                        <p
                            class="position-absolute r_0 text-secondary bg-white mt-n5 mr-3 mr-lg-4 rounded-pill px-3 py-1">
                            <i class="far fa-calendar-alt"></i><small class="font-weight-bold">
                                {{Carbon\Carbon::parse($news->nws_date)->format('d/m/Y')}}</small>
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-justify mh_6">{{$news->nws_title}}
                        </h5>
                        <p class="card-text text-secondary text-justify mh_6 mxh_6 overflow-hidden">
                            {{$news->nws_desc}}
                        </p>
                        <div class="d-flex justify-content-between">
                            <a name="" id="" class="text_p font-weight-bold" href="{{$news->nws_url}}"
                                role="link">{{$news->nws_source}}</a>
                            <p class="card-text">
                                <small class="text-muted font-weight-bold">
                                    {{Carbon\Carbon::parse($news->nws_date)->format('h:i a')}}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>