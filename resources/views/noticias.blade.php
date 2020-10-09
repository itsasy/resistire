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
                {{-- <h1>{{request()->path()}}</h1> --}}
                @include('partials.blog.first_section')
                @include('partials.blog.second_section')
                @if(session('autenticacion')->usr_id_dst != 1090)
                @include('partials.blog.third_section')
                {{--  @include('partials.blog.fourth_section') --}}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
