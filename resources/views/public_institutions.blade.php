@extends('layouts.app')
@include('layouts.btn_return_map')

@section ('title', 'Instituciones públicas')

@section('content')
<div class="header pt-5 pt-md-0">
   <h3 class="header_title d-none d-md-block">@lang('string.public_institutions_of') {{$name}}</h3>
   <h4 class="header_title d-block d-md-none">@lang('string.public_institutions_of') {{$name}}</h4>
</div>

<div class="container-fluid mt-3">
    @include('partials.blog.second_section')
</div>
@endsection