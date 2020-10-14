@extends('layouts.app')

@section ('title', 'Noticias')

@section('header')
<div class="bg_grad_h add-ff-nunito text-center" style="padding:0.7rem;">
    <div class="justify-content-center">
        <h3 class="text_p txt_c font-weight-bold my-4 text-center">{{$name}}</h3>
    </div>
</div>
@endsection
@section('content')
<div class="col-12 d-flex justify-content-center mt-2">
    <div class="position-fixed mb-1 z_i_1 justify-content-left col-12">
        <a name="" id="" class="btn btn_circl_outl_p rounded-circle" href="{{route('alimentos.create')}}" role="button"
            title="Nuevo"><i class="fas fa-plus"></i></a>
        <a name="" id="" class="btn btn_circl_outl_p rounded-circle mt-2" href="{{route('mapAssociate')}}" role="button" title="Atrás"><i
                class="fas fa-arrow-left"></i></a>
    </div>
    <div class="container">
        <div class="row">
            @forelse($data as $element)
            <div class="col-lg-4">
                <div class="card mb-3 card_reveal_effect_rotate_y rounded_1 shadow">
                    <div class="inner-img rounded_t_1">
                        <img src="{{url("storage/foodSafety/"). '/'.$element->fds_img}}"
                            onerror="this.onerror=null; this.src='{{asset('images/img_default.png')}}'"
                            class="card-img-top rounded_t_1 img_reg" alt="atp_img">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-justify mh_6">
                            {{$element->fds_title}}
                        </h5>
                        <p class="card-text text-secondary text-justify mh_6 mxh_6 overflow-hidden">
                            {{$element->fds_desc}}
                        </p>

                        <div class="d-flex justify-content-between">
                            <a name="" id="" class="text_a font-weight-bold" href="{{$element->fds_url}}"
                                role="link">{{$element->fds_source}}</a>
                            <p class="card-text"><small class="text-muted font-weight-bold">
                                    {{Carbon\Carbon::parse($element->fds_date)->format('h:i a')}}
                                </small>
                            </p>
                        </div>
                    </div>
                    <div class="rounded_1 d-flex justify-content-end">
                        <a name="" id="" class="btn btn_circl_outl_p m-1"
                            href="{{route('alimentos.edit', $element->id)}}" role="button" title="Editar"><i
                                class="fas fa-pen"></i></a>

                        <form action="{{route('alimentos.destroy', $element->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn_circl_outl_p m-1">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
            @empty
            <div class="container">
                <h1 class="text-center text-primary">No existen elementos para mostrar</h1>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
