@extends('layouts.app')

@section ('title', 'Noticias')

@section('header')
<div class="bg_grad_h add-ff-nunito text-center" style="padding:0.7rem;">
    <div class="justify-content-center">
        <h3 class=" font-weight-bold my-4 text-center text-white text-uppercase">Noticias de {{$name}}</h3>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid add-ff-nunito">
    @include('partials.local_news.news')
</div>
@endsection
