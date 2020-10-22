@extends('layouts.app')
@include('layouts.btn_return_map')

@section ('title', 'Noticias')

{{-- @section('header')
<div class="">
    @include('partials.blog.nav')
</div>
@endsection --}}

@section('content')
<div class="h_header bg_grad_h d-flex justify-content-center align-items-center">
    <h3 class="title text-center">NOTICIAS DEL ADMINISTRADOR</h3>
</div>

<div class="container-fluid add-ff-nunito mt-2">
    <div class="row">
        <div class="col">
            <div class="tab-content">
                @includeWhen(auth()->user()->usr_type_id == 1, 'partials.blog.first_section')
                {{--  @includeWhen(auth()->user()->usr_id_dst != 1090, 'partials.blog.third_section') --}}
            </div>
        </div>
    </div>
</div>
@endsection