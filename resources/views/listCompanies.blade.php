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
<div class="col-12 mt-2">
    <div class="position-fixed mb-1 z_i_1">
        <a name="" id="" class="btn btn_circl_outl_p rounded-circle" href="{{route('regCompanies')}}" role="button"
            title="Nuevo"><i class="fas fa-plus"></i></a>
        <a name="" id="" class="btn btn_circl_outl_p rounded-circle mt-2" href="{{route('allAsociates')}}" role="button"
            title="Atrás"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="container justify-content-center">
        <div class="row">
            @forelse($data as $element)
            <div class="col-md-4 col-sm-5 col-lg-3 mb-1">
                <div class="card rounded_1">
                    <div class="inner-img rounded_t_1">
                        <a name="" id="" class="" href="" target="_blank" role="button">
                            <img src="{{url('/'). '/api/imageCompany/' . $element->cmp_img}}"
                                onerror="this.onerror=null; this.src='{{asset('images/img_default.png')}}"
                                class="card-img-top rounded_t_1 mh_6 mxh_6">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-justify mh_3">
                            {{$element->cmp_name}}
                        </h5>
                        @auth
                        <div class="rounded_1 text-center">
                            <a name="" id="" class="btn  mx-1" href="{{route('editCompanies', $element->id)}}"
                                role="button" title="Editar"><i class="fas fa-pen"></i></a>
                            <a name="" id="" class="btn  mx-1" href="{{route('deleteCompanies', $element->id)}}"
                                role="button" title="Eliminar"><i class="fas fa-times"></i></a>
                            <a name="" id="" class="btn  mx-1" href="{{route('banCompanies', $element->id)}}"
                                role="button" title="@if($element->cmp_state == 1) Bloquear @else Desbloquear @endif">
                                <i class="fas @if($element->cmp_state==1) fa-check  @else  fa-ban @endif"
                                    style="color: @if($element->cmp_state==1) green @else  red @endif"></i></a>
                        </div>
                        @endauth
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
