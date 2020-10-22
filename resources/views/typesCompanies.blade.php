@extends('layouts.app')

@include('layouts.btn_return_map')

@section ('title', 'Empresas responsables')

@section('content')
<div class="h_header bg_grad_h d-flex justify-content-center align-items-center">
    <h2 class="title text-center">EMPRESAS RESPONSABLES</h2>
</div>

<div class="position-fixed mb-1 z_i_1 ml-2">
   {{--  <button type="button" class="btn btn_circl_outl_p rounded-circle" data-toggle="modal" data-target="#modalRegister">
        <i class="fas fa-plus"></i>
    </button> --}}

    <a name="" id="" class="btn btn_circl_outl_p rounded-circle mt-2" href="{{route('mapAssociate')}}" role="button"
        title="Atrás"><i class="fas fa-arrow-left"></i></a>
</div>

<div class="col-12 d-flex justify-content-center mt-2">
    <div class="row col-10">
        @forelse ($categories as $type)
        <div class="col-12 col-md-4 col-lg-6 mb-1">
            <div class="card col-12 text-center shadow">
                <div class="card-body">
                    <h4 class="card-title font-weight-bold ">{{$type->cmpt_desc}}</h4>
                    <a name="" id="" class="btn btn-primary btn-block" href="{{route('show_asociate', $type)}}"
                        role="button">Ingresar</a>
                </div>
            </div>
        </div>
        @empty
        <div class="container">
            <h1 class="text-center text-primary">No existen categorías para mostrar, por favor cree una.</h1>
        </div>
        @endforelse
    </div>

    {{-- <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form action="{{route('save_company_category')}}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Crear categoría</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cmpt_desc">Nombre de categoría</label>
                        <input type="text" name="cmpt_desc" id="cmpt_desc" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    </div> --}}
</div>
@endsection
