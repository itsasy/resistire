@extends('layouts.app')
@include('layouts.btn_return_map')

@section ('title', 'Instituciones públicas')

@section('content')
<div class="h_header bg_grad_h d-flex justify-content-center align-items-center">
    <h3 class="title text-center">Instituciones públicas de {{$name}}
    </h3>
</div>

<div class="container-fluid add-ff-nunito mt-2">
    @include('partials.blog.second_section')
</div>
@endsection