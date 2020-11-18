@extends('layouts.app')

@include('layouts.btn_return_map')

@section ('title', 'Noticias')

@section('content')
<div class="header pt-5 pt-md-0">
   <h3 class="header_title d-none d-md-block">@lang('string.news_of') {{$name}}</h3>
   <h4 class="header_title d-block d-md-none">@lang('string.news_of') {{$name}}</h4>
</div>

<div class="container pt-4">
    @include('partials.local_news.news')
</div>
@endsection
