<div aria-labelledby="puntosTab" class="tab-pane {{Request::segment(2) == 'puntos' ? 'show active' : ' '}}" id="Puntos"
    role="tabpanel">
    <div class="position-fixed mb-1 z_i_1">
        <a name="" id="" class="btn btn_circl_outl_p rounded-circle" href="{{route('regPoint')}}" role="button"
            title="Nuevo"><i class="fas fa-plus"></i></a>
    </div>
    <div class="container">
        <div class="row">
            @forelse($puntos as $points)
            <div class="col-lg-4">
                <div class="card mb-3 card_reveal_effect_rotate_y rounded_1 shadow">
                    <div class="inner-img rounded_t_1">
                        <img src="http://34.226.78.219:8080/api_covid19/public/api/imgPoints/{{$points->atp_img}}"
                            class="card-img-top rounded_t_1 img_reg" alt="atp_img">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-justify mh_3">{{$points->atp_name}}
                        </h5>
                        <p class="card-text text-secondary text-justify mh_4">
                            {{$points->atp_address}}
                        </p>
                    </div>
                    <div class="rounded_1 d-flex justify-content-end">
                        <a name="" id="" class="btn btn_circl_outl_p m-1" href="{{route('updatePoint', $points->id)}}"
                            role="button" title="Editar"><i class="fas fa-pen"></i></a>
                        <a name="" id="" class="btn btn_circl_outl_p m-1" href="{{route('deletePoint', $points->id)}}"
                            role="button" title="Eliminar"><i class="fas fa-times"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="container">
                <h1 class="text-center text-primary">No existen elementos para mostrar.</h1>
            </div>
            @endforelse
        </div>
    </div>
</div>