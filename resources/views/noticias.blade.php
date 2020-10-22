@extends('layouts.app')

@include('layouts.btn_return_map')

@section ('title', 'Noticias')

@section('content')

<div class="h_header bg_grad_h d-flex justify-content-center align-items-center">
    <h3 class="title text-center">Noticias de {{$name}}
    </h3>
</div>

<div class="container-fluid add-ff-nunito mt-2">
    @include('partials.local_news.news')
</div>
@endsection
