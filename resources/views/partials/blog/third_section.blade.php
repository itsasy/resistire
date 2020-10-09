<div aria-labelledby="adicionalTab" class="tab-pane fade  {{Request::segment(2) == 'locales' ? 'show active' : ' '}}"
    id="Adicional" role="tabpanel">
    @if(session('autenticacion')->usr_type_id == 1)
    <div class="position-fixed mb-1 z_i_1">
        <a name="" id="" class="btn btn_circl_outl_p rounded-circle" href="{{route('regInfo')}}" role="button"
            title="Nuevo"><i class="fas fa-plus"></i></a>
    </div>
    @endif
    <div class="container">
        <h3 class="text_p txt_c font-weight-bold my-4 text-center">¡TU MUNICIPALIDAD!</h3>
        <div class="row">
            @foreach($infoadi as $info)
            <div class="col-lg-4">
                <div class="card mb-3 card_reveal_effect_rotate_y rounded_1 shadow">
                    <div class="inner-img rounded_t_1">
                        <img src="http://34.226.78.219:8080/api_covid19/public/api/imageInfo/{{$info->adi_img}}"
                            class="card-img-top rounded_t_1 img_reg" alt="{{$info->adi_img}}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-justify mh_6">{{$info->adi_title}}
                        </h5>
                        <p class="card-text text-secondary text-justify mh_6 mxh_6 overflow-hidden">
                            {{$info->adi_desc}}
                        </p>
                        <div class="d-flex justify-content-between">
                            <a name="" id="" class="text_p font-weight-bold" href="{{$info->adi_url}}"
                                role="link">{{$info->adi_source}}</a>
                            <p class="card-text"><small class="text-muted font-weight-bold">
                                    {{Carbon\Carbon::parse($info->adi_date)->format('h:i a')}}
                                </small>
                            </p>
                        </div>
                    </div>
                    @if(session('autenticacion')->usr_type_id == 1)
                    <div class="rounded_1 text-center">
                        <a name="" id="" class="btn mx-1" href="{{route('updateInfo', $info->id)}}" role="button"
                            title="Editar"><i class="fas fa-pen"></i></a>
                        <a name="" id="" class="btn mx-1" href="{{route('deleteInfo', $info->id)}}" role="button"
                            title="Eliminar"><i class="fas fa-times"></i></a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
