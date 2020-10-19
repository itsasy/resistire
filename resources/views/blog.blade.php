@extends('layouts.app')

@section ('title', 'Noticias')

@section('header')
<div class="">
    @include('partials.blog.nav')
</div>
@endsection

@section('content')
<div class="container-fluid add-ff-nunito">
    <div class="row">
        <div class="col">
            <div class="tab-content">
                @includeWhen(auth()->user()->usr_type_id == 1, 'partials.blog.first_section')
                @include('partials.blog.second_section')
                @includeWhen(auth()->user()->usr_id_dst != 1090, 'partials.blog.third_section')
            </div>
        </div>
    </div>
</div>
@endsection