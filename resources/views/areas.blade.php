@extends('layouts.app')

@section('content')

<div class="h_header bg_grad_h d-flex justify-content-center align-items-center">
    <h3 class="title text-center"></h3>
</div>
<div class="container col-12">
    <div class="row  justify-content-center">
        @foreach (range(1,6) as $option)
        <div class="card border-primary col-3 m-1">
            <img class="card-img-top" src="holder.js/100px180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection