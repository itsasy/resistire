@extends('layouts.app')

@section ('title', 'Noticias')

@section('header')
<div class="">
    <nav class="navbar navbar-expand-lg navbar navbar-expand-lg navbar-dark bg_grad_h add-ff-nunito "
        style="padding:1.5rem;">

        <a class="navbar-brand d-lg-none" href="#"> </a>
        <a name="" id="" class="btn btn-custom__transparent__red shadow text-white d-lg-none" href="#" role="button"
            data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-sliders-h fa-lg"></i></a>

        @if($seccion == 'nacionales')
        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
            <ul class="nav navbar-nav d-flex align-items-center" id="justifiedTab" role="tablist">
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="NacionalesOficiales" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#NacionalesOficiales" id="nacionalesTab" role="tab">Nacionales
                        Oficiales</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="LocalesDistritales" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#LocalesDistritales" id="localesTab" role="tab">Locales Distritales</a>
                </li>
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="Mundiales" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Mundiales" id="mundialesTab" role="tab">Mundo</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Fake" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                        href="#Fake" id="fakeTab" role="tab">Fake News</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Puntos" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                        href="#Puntos" id="puntosTab" role="tab">Instituciones públicas</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Adicional" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Adicional" id="adicionalTab" role="tab">Tu municipalidad</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Companies" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Companies" id="companiesTab" role="tab">Asociados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold"
                        href="  {{route('Mapa', [ session('distrito'), session('id_distrito'), session('nom_provincia')])}}"
                        id="" role="btn">Salir</a>
                </li>
            </ul>
        </div>
        @elseif($seccion == 'locales')
        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
            <ul class="nav navbar-nav d-flex align-items-center" id="justifiedTab" role="tablist">
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="NacionalesOficiales" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#NacionalesOficiales" id="nacionalesTab" role="tab">Nacionales
                        Oficiales</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="LocalesDistritales" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#LocalesDistritales" id="localesTab" role="tab">Locales Distritales</a>
                </li>
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="Mundiales" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Mundiales" id="mundialesTab" role="tab">Mundo</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Fake" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                        href="#Fake" id="fakeTab" role="tab">Fake News</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Puntos" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                        href="#Puntos" id="puntosTab" role="tab">Puntos de atención</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Adicional" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Adicional" id="adicionalTab" role="tab">Tu municipalidad</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Companies" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Companies" id="companiesTab" role="tab">Asociados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold"
                        href="{{route('Mapa', [ session('distrito'), session('id_distrito'), session('nom_provincia')])}}"
                        id="" role="btn">Salir</a>
                </li>
            </ul>
        </div>
        @elseif($seccion == 'mundo')
        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
            <ul class="nav navbar-nav d-flex align-items-center" id="justifiedTab" role="tablist">
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="NacionalesOficiales" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#NacionalesOficiales" id="nacionalesTab" role="tab">Nacionales
                        Oficiales</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="LocalesDistritales" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#LocalesDistritales" id="localesTab" role="tab">Locales Distritales</a>
                </li>
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="Mundiales" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#Mundiales" id="mundialesTab" role="tab">Mundo</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Fake" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                        href="#Fake" id="fakeTab" role="tab">Fake News</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Puntos" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                        href="#Puntos" id="puntosTab" role="tab">Puntos de atención</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Adicional" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Adicional" id="adicionalTab" role="tab">Tu municipalidad</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Companies" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Companies" id="companiesTab" role="tab">Asociados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold"
                        href="{{route('Mapa', [ session('distrito'), session('id_distrito'), session('nom_provincia')])}}"
                        id="" role="btn">Salir</a>
                </li>
            </ul>
        </div>
        @elseif($seccion == 'fake')
        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
            <ul class="nav navbar-nav d-flex align-items-center" id="justifiedTab" role="tablist">
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="NacionalesOficiales" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#NacionalesOficiales" id="nacionalesTab" role="tab">Nacionales
                        Oficiales</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="LocalesDistritales" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#LocalesDistritales" id="localesTab" role="tab">Locales Distritales</a>
                </li>
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="Mundiales" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Mundiales" id="mundialesTab" role="tab">Mundo</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Fake" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#Fake" id="fakeTab" role="tab">Fake News</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Puntos" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                        href="#Puntos" id="puntosTab" role="tab">Puntos de atención</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Adicional" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Adicional" id="adicionalTab" role="tab">Tu municipalidad</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Companies" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Companies" id="companiesTab" role="tab">Asociados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold"
                        href="{{route('Mapa', [ session('distrito'), session('id_distrito'), session('nom_provincia')])}}"
                        id="" role="btn">Salir</a>
                </li>
            </ul>
        </div>
        @elseif($seccion == 'puntos')
        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
            <ul class="nav navbar-nav d-flex align-items-center" id="justifiedTab" role="tablist">
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="NacionalesOficiales" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#NacionalesOficiales" id="nacionalesTab" role="tab">Nacionales
                        Oficiales</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="LocalesDistritales" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#LocalesDistritales" id="localesTab" role="tab">Locales Distritales</a>
                </li>
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="Mundiales" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Mundiales" id="mundialesTab" role="tab">Mundo</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Fake" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                        href="#Fake" id="fakeTab" role="tab">Fake News</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Puntos" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#Puntos" id="puntosTab" role="tab">Puntos de atención</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Adicional" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Adicional" id="adicionalTab" role="tab">Tu municipalidad</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Companies" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Companies" id="companiesTab" role="tab">Asociados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold"
                        href="{{route('Mapa', [ session('distrito'), session('id_distrito'), session('nom_provincia')])}}"
                        id="" role="btn">Salir</a>
                </li>
            </ul>
        </div>
        @elseif($seccion == 'adicional')
        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
            <ul class="nav navbar-nav d-flex align-items-center" id="justifiedTab" role="tablist">
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="NacionalesOficiales" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#NacionalesOficiales" id="nacionalesTab" role="tab">Nacionales
                        Oficiales</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="LocalesDistritales" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#LocalesDistritales" id="localesTab" role="tab">Locales Distritales</a>
                </li>
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="Mundiales" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Mundiales" id="mundialesTab" role="tab">Mundo</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Fake" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                        href="#Fake" id="fakeTab" role="tab">Fake News</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Puntos" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                        href="#Puntos" id="puntosTab" role="tab">Puntos de atención</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Adicional" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#Adicional" id="adicionalTab" role="tab">Tu municipalidad</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Companies" aria-selected="true" class="nav-link font-weight-bold "
                        data-toggle="tab" href="#Companies" id="companiesTab" role="tab">Asociados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold"
                        href="{{route('Mapa', [ session('distrito'), session('id_distrito'), session('nom_provincia')])}}"
                        id="" role="btn">Salir</a>
                </li>
            </ul>
        </div>
        @elseif($seccion == 'companies')
        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
            <ul class="nav navbar-nav d-flex align-items-center" id="justifiedTab" role="tablist">
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="NacionalesOficiales" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#NacionalesOficiales" id="nacionalesTab" role="tab">Nacionales
                        Oficiales</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="LocalesDistritales" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#LocalesDistritales" id="localesTab" role="tab">Locales Distritales</a>
                </li>
                <!--<li class="nav-item mx-lg-4">
                    <a aria-controls="Mundiales" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Mundiales" id="mundialesTab" role="tab">Mundo</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Fake" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                        href="#Fake" id="fakeTab" role="tab">Fake News</a>
                </li>-->
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Puntos" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                        href="#Puntos" id="puntosTab" role="tab">Puntos de atención</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Adicional" aria-selected="true" class="nav-link font-weight-bold"
                        data-toggle="tab" href="#Adicional" id="adicionalTab" role="tab">Tu municipalidad</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a aria-controls="Companies" aria-selected="true" class="nav-link font-weight-bold active"
                        data-toggle="tab" href="#Companies" id="companiesTab" role="tab">Asociados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold"
                        href="{{route('Mapa', [ session('distrito'), session('id_distrito'), session('nom_provincia')])}}"
                        id="" role="btn">Salir</a>
                </li>
            </ul>
        </div>
        @endif

    </nav>
</div>
@endsection

@section('content')
<div class="container-fluid add-ff-nunito">
    <div class="row">
        <div class="col">
            <div class="tab-content">
                <!-- PRIMERA SECCIÓN -->
                <!--<div aria-labelledby="nacionalesTab"
                    class="tab-pane fade @if($seccion == 'nacionales') show active @endif" id="NacionalesOficiales"
                    role="tabpanel">
                    @if(session('autenticacion')->usr_type_id == 1)
                    <div class="position-fixed mb-1 z_i_1">
                        <a name="" id="" class="btn btn_circl_outl_p rounded-circle"
                            href="{{route('regNews', ['tipo'=> "nacionales"])}}" role="button" title="Nuevo"><i
                                class="fas fa-plus"></i></a>
                    </div>
                    @endif
                    <div class="container">
                        <h3 class="text_p txt_c font-weight-bold my-4 text-center">¡NOTICIAS NACIONALES!
                        </h3>
                        <div class="row">
                            @foreach($noticiasAdmi as $news)
                            @if($news->nws_id_nwst == 2)
                            <div class="col-lg-4">
                                <div class="card mb-3 card_reveal_effect_rotate_y rounded_1 shadow">
                                    <div class="inner-img rounded_t_1">
                                        <img src="http://34.226.78.219:8080/api_covid19/public/api/img/{{$news->nws_img}}"
                                            class="card-img-top rounded_t_1 img_reg" alt="img-news">
                                        <p class="position-absolute text-white mt-n5 ml-3 ml-lg-4 py-1">
                                            <small>{{$news->nws_author}}</small></p>
                                        <p
                                            class="position-absolute r_0 text-secondary bg-white mt-n5 mr-3 mr-lg-4 rounded-pill px-3 py-1">
                                            <i class="far fa-calendar-alt"></i><small class="font-weight-bold">
                                                {{Carbon\Carbon::parse($news->nws_date)->format('d/m/Y')}}</small>
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold text-justify mh_6">{{$news->nws_title}}
                                        </h5>
                                        <p class="card-text text-secondary text-justify mh_6 mxh_6 overflow-hidden">
                                            {{$news->nws_desc}}
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <a name="" id="" class="text_p font-weight-bold" href="{{$news->nws_url}}"
                                                role="link">{{$news->nws_source}}</a>
                                            <p class="card-text">
                                                <small class="text-muted font-weight-bold">
                                                    {{Carbon\Carbon::parse($news->nws_date)->format('h:i a')}}
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                    @if(session('autenticacion')->usr_type_id == 1)
                                    <div class="rounded_1 text-center">
                                        <a name="" id="" class="btn mx-1"
                                            href="{{route('updateNews',['tipo'=>'nacionales', 'id'=>$news->id])}}"
                                            role="button" title="Editar"><i class="fas fa-pen"></i></a>
                                        <a name="" id="" class="btn mx-1"
                                            href="{{route('deleteNews', $news->id)}}" role="button" title="Eliminar"><i
                                                class="fas fa-times"></i></a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                            @endforeach

                        </div>
                    </div>
                </div>-->
                <!-- SEGUNDA SECCIÓN -->
                <!--<div aria-labelledby="localesTab" class="tab-pane fade @if($seccion == 'locales') show active @endif"-->
                <div aria-labelledby="localesTab" class="tab-pane fade show active"
                    id="LocalesDistritales" role="tabpanel">
                    @if(session('autenticacion')->usr_type_id == 2)
                    <div class="position-fixed mb-1 z_i_1">
                        <a name="" id="" class="btn btn_circl_outl_p rounded-circle"
                            href="{{route('regNews', ['tipo'=> "locales"])}}" role="button" title="Nuevo"><i class="fas fa-plus"></i></a>
                    </div>
                    @endif
                    <div class="container">
                        <h3 class="text_p txt_c font-weight-bold my-4 text-center text-uppercase">¡NOTICIAS DE
                            {{session('distrito')}}!
                        </h3>
                        <div class="row">
                            @foreach($noticias as $news)
                            @if($news->nws_id_nwst == 1)
                            <div class="col-lg-4">
                                <div class="card mb-3 card_reveal_effect_rotate_y rounded_1 shadow">
                                    <div class="inner-img rounded_t_1">
                                        <img src="http://34.226.78.219:8080/api_covid19/public/api/img/{{$news->nws_img}}"
                                            class="card-img-top rounded_t_1 img_reg" alt="img-news">
                                        <p class="position-absolute text-white mt-n5 ml-3 ml-lg-4 py-1">
                                            <small>{{$news->nws_author}}</small></p>
                                        <p
                                            class="position-absolute r_0 text-secondary bg-white mt-n5 mr-3 mr-lg-4 rounded-pill px-3 py-1">
                                            <i class="far fa-calendar-alt"></i><small class="font-weight-bold">
                                                {{Carbon\Carbon::parse($news->nws_date)->format('d/m/Y')}}</small>
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold text-justify mh_6">{{$news->nws_title}}
                                        </h5>
                                        <p class="card-text text-secondary text-justify mh_6 mxh_6 overflow-hidden">
                                            {{$news->nws_desc}}
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <a name="" id="" class="text_p font-weight-bold" href="{{$news->nws_url}}"
                                                role="link">{{$news->nws_source}}</a>
                                            <p class="card-text">
                                                <small class="text-muted font-weight-bold">
                                                    {{Carbon\Carbon::parse($news->nws_date)->format('h:i a')}}
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                    @if(session('autenticacion')->usr_type_id == 2)
                                    <div class="rounded_1 d-flex justify-content-end">
                                        <a name="" id="" class="btn btn_circl_outl_p m-1"
                                            href="{{route('updateNews',['tipo'=> 'locales', $news->id])}}"
                                            role="button" title="Editar"><i class="fas fa-pen"></i></a>
                                        <a name="" id="" class="btn btn_circl_outl_p m-1"
                                            href="{{route('deleteNews', $news->id)}}" role="button" title="Eliminar"><i class="fas fa-times"></i></a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- TERCERA SECCIÓN -->
                <!--<div aria-labelledby="mundialesTab" class="tab-pane fade @if($seccion == 'mundo') show active @endif"
                    id="Mundiales" role="tabpanel">
                    @if(session('autenticacion')->usr_type_id == 1)
                    <div class="position-fixed mb-1 z_i_1">
                        <a name="" id="" class="btn btn_circl_outl_p rounded-circle"
                            href="{{route('regNews', ['tipo'=> "mundo"])}}" role="button" title="Nuevo"><i
                    class="fas fa-plus"></i></a>
            </div>
            @endif
            <div class="container">
                <h3 class="text_p txt_c font-weight-bold my-4 text-center">NOTICIAS DEL MUNDO</h3>
                <div class="row">
                    @foreach($noticiasAdmi as $news)
                    @if($news->nws_id_nwst == 3)
                    <div class="col-lg-4">
                        <div class="card mb-3 card_reveal_effect_rotate_y rounded_1 shadow">
                            <div class="inner-img rounded_t_1">
                                <img src="http://34.226.78.219:8080/api_covid19/public/api/img/{{$news->nws_img}}"
                                    class="card-img-top rounded_t_1 img_reg" alt="img-news">
                                <p class="position-absolute text-white mt-n5 ml-3 ml-lg-4 py-1">
                                    <small>{{$news->nws_author}}</small></p>
                                <p
                                    class="position-absolute r_0 text-secondary bg-white mt-n5 mr-3 mr-lg-4 rounded-pill px-3 py-1">
                                    <i class="far fa-calendar-alt"></i><small class="font-weight-bold">
                                        {{Carbon\Carbon::parse($news->nws_date)->format('d/m/Y')}}</small>
                                </p>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-justify mh_6">{{$news->nws_title}}
                                </h5>
                                <p class="card-text text-secondary text-justify mh_6 mxh_6 overflow-hidden">
                                    {{$news->nws_desc}}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <a name="" id="" class="text_p font-weight-bold" href="{{$news->nws_url}}"
                                        role="link">{{$news->nws_source}}</a>
                                    <p class="card-text"><small class="text-muted font-weight-bold">
                                            {{Carbon\Carbon::parse($news->nws_date)->format('h:i a')}}
                                        </small>
                                    </p>
                                </div>
                            </div>
                            @if(session('autenticacion')->usr_type_id == 1)
                            <div class="rounded_1 text-center">
                                <a name="" id="" class="btn mx-1"
                                    href="{{route('updateNews',['tipo'=> 'mundo', $news->id])}}" role="button"><i
                                        class="fas fa-pen"></i></a>
                                <a name="" id="" class="btn mx-1"
                                    href="{{route('deleteNews', $news->id)}}" role="button" title="Eliminar"><i class="fas fa-times"></i></a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>-->
        <!-- CUARTA SECCIÓN -->
        <!--<div aria-labelledby="fakeTab" class="tab-pane fade @if($seccion == 'fake') show active @endif" id="Fake"
            role="tabpanel">
            @if(session('autenticacion')->usr_type_id == 1)
            <div class="position-fixed mb-1 z_i_1">
                <a name="" id="" class="btn btn_circl_outl_p rounded-circle"
                    href="{{route('regNews', ['tipo'=> "fake"])}}" role="button" title="Nuevo"><i class="fas fa-plus"></i></a>
            </div>
            @endif
            <div class="container">
                <h3 class="text_p txt_c font-weight-bold my-4 text-center">¡FAKE NEWS!</h3>
                <div class="row">
                    @foreach($noticiasAdmi as $news)
                    @if($news->nws_id_nwst == 4)
                    <div class="col-lg-4">
                        <div class="card mb-3 card_reveal_effect_rotate_y rounded_1 shadow">
                            <div class="inner-img rounded_t_1">
                                <img src="http://34.226.78.219:8080/api_covid19/public/api/img/{{$news->nws_img}}"
                                    class="card-img-top rounded_t_1 img_reg" alt="img-news">
                                <p class="position-absolute text-white mt-n5 ml-3 ml-lg-4 py-1">
                                    <small>{{$news->nws_author}}</small></p>
                                <p
                                    class="position-absolute r_0 text-secondary bg-white mt-n5 mr-3 mr-lg-4 rounded-pill px-3 py-1">
                                    <i class="far fa-calendar-alt"></i><small class="font-weight-bold">
                                        {{Carbon\Carbon::parse($news->nws_date)->format('d/m/Y')}}</small>
                                </p>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-justify mh_6">{{$news->nws_title}}
                                </h5>
                                <p class="card-text text-secondary text-justify mh_6 mxh_6 overflow-hidden">
                                    {{$news->nws_desc}}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <a name="" id="" class="text_p font-weight-bold" href="{{$news->nws_url}}"
                                        role="link">{{$news->nws_source}}</a>
                                    <p class="card-text"><small class="text-muted font-weight-bold">
                                            {{Carbon\Carbon::parse($news->nws_date)->format('h:i a')}}
                                        </small>
                                    </p>
                                </div>
                            </div>
                            @if(session('autenticacion')->usr_type_id == 1)
                            <div class="rounded_1 text-center">
                                <a name="" id="" class="btn mx-1"
                                    href="{{route('updateNews',['tipo'=> 'fake', $news->id])}}" role="button" title="Editar"><i
                                        class="fas fa-pen"></i></a>
                                <a name="" id="" class="btn mx-1"
                                    href="{{route('deleteNews', $news->id)}}" role="button" title="Eliminar"><i
                                        class="fas fa-times"></i></a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
        </div>-->
        <!-- QUINTA SECCIÓN -->
        <div aria-labelledby="puntosTab" class="tab-pane @if($seccion == 'puntos') show active @endif" id="Puntos"
            role="tabpanel">
            <div class="position-fixed mb-1 z_i_1">
                <a name="" id="" class="btn btn_circl_outl_p rounded-circle" href="{{route('regPoint')}}"
                    role="button" title="Nuevo"><i class="fas fa-plus"></i></a>
            </div>
            <div class="container">
                <h3 class="text_p txt_c font-weight-bold my-4 text-center">¡INSTITUCIONES PÚBLICAS {{session('distrito')}}!</h3>
                <div class="row">
                    @foreach($puntos as $points)
                    <div class="col-lg-4">
                        <div class="card mb-3 card_reveal_effect_rotate_y rounded_1 shadow">
                            <div class="inner-img rounded_t_1">
                                <img src="http://34.226.78.219:8080/api_covid19/public/api/imgPoints/{{$points->atp_img}}"
                                    class="card-img-top rounded_t_1 img_reg" alt="atp_img">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-justify mh_3">{{$points->atp_name}}
                                </h5>
                                <p class="card-text text-secondary text-justify mh_4">
                                    {{$points->atp_address}}
                                </p>
                            </div>
                            <div class="rounded_1 d-flex justify-content-end">
                                <a name="" id="" class="btn btn_circl_outl_p m-1"
                                    href="{{route('updatePoint', $points->id)}}" role="button" title="Editar"><i
                                        class="fas fa-pen"></i></a>
                                <a name="" id="" class="btn btn_circl_outl_p m-1"
                                    href="{{route('deletePoint', $points->id)}}" role="button" title="Eliminar"><i
                                        class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- SEXTA SECCIÓN -->
        <div aria-labelledby="adicionalTab" class="tab-pane fade @if($seccion == 'adicional') show active @endif"
            id="Adicional" role="tabpanel">
            @if(session('autenticacion')->usr_type_id == 1)
            <div class="position-fixed mb-1 z_i_1">
                <a name="" id="" class="btn btn_circl_outl_p rounded-circle" href="{{route('regInfo')}}"
                    role="button" title="Nuevo"><i class="fas fa-plus"></i></a>
            </div>
            @endif
            <div class="container">
                <h3 class="text_p txt_c font-weight-bold my-4 text-center">¡TU MUNICIPALIDAD!</h3>
                <div class="row">
                    @foreach($infoadi as $info)
                    <div class="col-lg-4">
                        <div class="card mb-3 card_reveal_effect_rotate_y rounded_1 shadow">
                            <div class="inner-img rounded_t_1">
                                <img src="http://34.226.78.219:8080/api_covid19/public/api/imageInfo/{{$info->adi_img}}"
                                    class="card-img-top rounded_t_1 img_reg" alt="{{$info->adi_img}}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-justify mh_6">{{$info->adi_title}}
                                </h5>
                                <p class="card-text text-secondary text-justify mh_6 mxh_6 overflow-hidden">
                                    {{$info->adi_desc}}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <a name="" id="" class="text_p font-weight-bold" href="{{$info->adi_url}}"
                                        role="link">{{$info->adi_source}}</a>
                                    <p class="card-text"><small class="text-muted font-weight-bold">
                                            {{Carbon\Carbon::parse($info->adi_date)->format('h:i a')}}
                                        </small>
                                    </p>
                                </div>
                            </div>
                            @if(session('autenticacion')->usr_type_id == 1)
                            <div class="rounded_1 text-center">
                                <a name="" id="" class="btn mx-1"
                                    href="{{route('updateInfo', $info->id)}}" role="button" title="Editar"><i
                                        class="fas fa-pen"></i></a>
                                <a name="" id="" class="btn mx-1"
                                    href="{{route('deleteInfo', $info->id)}}" role="button" title="Eliminar"><i
                                        class="fas fa-times"></i></a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

        <!-- SEPTIMA SECCIÓN -->
        <div aria-labelledby="companiesTab" class="tab-pane fade @if($seccion == 'companies') show active @endif"
            id="Companies" role="tabpanel">
            @if(session('autenticacion')->usr_type_id == 2)
            <div class="position-fixed mb-1 z_i_1">
                <a name="" id="" class="btn btn_circl_outl_p rounded-circle" href="{{route('regCompanies')}}"
                    role="button" title="Nuevo"><i class="fas fa-plus"></i></a>
            </div>
            @endif
            <div class="container col-12">
                <h3 class="text_p txt_c font-weight-bold my-4 text-center">
                    ¡ASOCIADOS!
                </h3>
                <ul class="nav justify-content-center row" id="pills-tab" role="tablist">
                   <li class="nav-item col-lg-2 col-md-2 col-sm-4 text-center">
                        <a class="active" id="pills-category1-tab" data-toggle="pill" href="#pills-category1" role="tab"
                            aria-controls="pills-category1" aria-selected="true">
                            <img src="{{asset('images/img_default.png')}}" id="item_dad_1"
                                class="img-fluid rounded_1   " alt="">
                                <p class="btn btn-custom__cancel border border-light text-white rounded-pill"
                                    id="item_start_blur_dad_1">HOSPITAL</p>
                        </a>
                    </li>
                    <li class="nav-item col-lg-2 col-md-2 col-sm-4 text-center">
                        <a class="" id="pills-category2-tab" data-toggle="pill" href="#pills-category2" role="tab"
                            aria-controls="pills-category2" aria-selected="false">
                            <img src="{{asset('images/img_default.png')}}" id="item_dad_2"
                                class="img-fluid rounded_1   " alt="">
                            <p class="btn btn-custom__cancel border border-light text-white rounded-pill"
                                    id="item_start_blur_dad_2">COMISARÍA</p>
                        </a>
                    </li>
                    <li class="nav-item col-lg-2 col-md-2 col-sm-4 text-center">
                        <a class="" id="pills-category3-tab" data-toggle="pill" href="#pills-category3" role="tab"
                            aria-controls="pills-category3" aria-selected="false">
                            <img src="{{asset('images/img_default.png')}}" id="item_dad_3"
                                class="img-fluid rounded_1   " alt="">
                                <p class="btn btn-custom__cancel border border-light text-white rounded-pill"
                                    id="item_start_blur_dad_3">CEM</p>
                        </a>
                    </li>
                    <li class="nav-item col-lg-2 col-md-2 col-sm-4 text-center">
                        <a class="" id="pills-category4-tab" data-toggle="pill" href="#pills-category4" role="tab"
                            aria-controls="pills-category4" aria-selected="false">
                            <img src="{{asset('images/img_default.png')}}" id="item_dad_3"
                                class="img-fluid rounded_1   " alt="">
                           
                                <p class="btn btn-custom__cancel border border-light text-white rounded-pill"
                                    id="item_start_blur_dad_3">MERCADOS</p>
                         
                        </a>
                    </li>
                   <li class="nav-item col-lg-2 col-md-2 col-sm-4 text-center">
                        <a class="" id="pills-category5-tab" data-toggle="pill" href="#pills-category5" role="tab"
                            aria-controls="pills-category5" aria-selected="false">
                            <img src="{{asset('images/img_default.png')}}" id="item_dad_3"
                                class="img-fluid rounded_1   " alt="">
                                <p class="btn btn-custom__cancel border border-light text-white rounded-pill"
                                    id="item_start_blur_dad_3">RESTAURANTES</p>
                        </a>
                    </li>
                </ul>
                {{-- ELEMENTOS --}}
                {{-- PRIMERA CATEGORIA --}}
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-category1" role="tabpanel"
                        aria-labelledby="pills-category1-tab">
                        <div class="d-flex align-items-center mt-2 mb-4">
                            <hr class="col bg-custom-primary">
                            <p
                                class="  font-weight-bold   text-center rounded-lg py-1 py-sm-2 px-2 px-sm-4 m-0">
                                HOSPITAL</p>
                            <hr class="col bg-custom-primary">
                        </div>
                        <div class="row justify-content-center">
                            @forelse ($companies1 as $companies)
                            <div class="col-md-4 col-sm-5 col-lg-3">
                                <div
                                    class="card     rounded_1 mb-3  ">
                                    <div class="inner-img rounded_1">
                                        <a name="" id="" class="" href="{{$companies->cmp_url}}" target="_blank"
                                            role="button">
                                            <img {{-- src="http://3.231.42.58:8080/apiCacaoApp/public/api/v1/imageCompanie/{{$companies->cmp_img}}"
                                                --}} src="{{asset('images/img_default.png')}}"
                                                class="img-fluid rounded_1  ">
                                        </a>
                                    </div>
                                    {{-- @if(session('autenticacion')->usr_type_id == 1) --}}
                                      <div class="rounded_1 text-center">
                                        <a name="" id="" class="btn  mx-1"
                                            href="{{route('editCompanies', $companies->id)}}" role="button" title="Editar"><i
                                                class="fas fa-pen"></i></a>
                                        <a name="" id="" class="btn  mx-1"
                                            href="{{route('deleteCompanies', $companies->id)}}" role="button" title="Eliminar"><i
                                                class="fas fa-times"></i></a>
                                               <a name="" id=""
                                                        class="btn  mx-1"
                                                        href="{{route('banCompanies', $companies->id)}}" role="button" title="@if($companies->cmp_state == 1) Bloquear @else Desbloquear @endif">
                                                        <i class="fas @if($companies->cmp_state==1) fa-ban @else fa-check @endif" style="color: @if($companies->cmp_state==1)red @else green @endif"></i></a>
                                    </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                            @empty
                            <p>No existen elementos para mostrar.</p>
                            @endforelse
                        </div>
                    </div>
                    {{-- SEGUNDA CATEGORIA --}}
                    <div class="tab-pane" id="pills-category2" role="tabpanel" aria-labelledby="pills-category2-tab">
                        <div class="d-flex align-items-center mt-2 mb-4">
                            <hr class="col bg-custom-primary">
                            <p
                                class="  font-weight-bold   text-center rounded-lg py-1 py-sm-2 px-2 px-sm-4 m-0">
                                COMISARÍA</p>
                            <hr class="col bg-custom-primary">
                        </div>
                        <div class="row justify-content-center">
                            @forelse ($companies2 as $companies)
                            <div class="col-md-4 col-sm-5 col-lg-3">
                                <div
                                    class="card     rounded_1 mb-3  ">
                                    <div class="inner-img rounded_1">
                                        <a name="" id="" class="" href="{{$companies->cmp_url}}" target="_blank"
                                            role="button">
                                            <img {{-- src="http://3.231.42.58:8080/apiCacaoApp/public/api/v1/imageCompanie/{{$companies->cmp_img}}"
                                                --}} src="{{asset('images/img_default.png')}}"
                                                class="img-fluid rounded_1  ">
                                        </a>
                                    </div>
                                    {{-- @if(session('autenticacion')->usr_type_id == 1) --}}
                                      <div class="rounded_1 text-center">
                                        <a name="" id="" class="btn  mx-1"
                                            href="{{route('editCompanies', $companies->id)}}" role="button" title="Editar"><i
                                                class="fas fa-pen"></i></a>
                                        <a name="" id="" class="btn  mx-1"
                                            href="{{route('deleteCompanies', $companies->id)}}" role="button" title="Eliminar"><i
                                                class="fas fa-times"></i></a>
                                                <a name="" id=""
                                                        class="btn  mx-1"
                                                        href="{{route('banCompanies', $companies->id)}}" role="button" title="@if($companies->cmp_state == 1) Bloquear @else Desbloquear @endif">
                                                        <i class="fas @if($companies->cmp_state==1) fa-ban @else fa-check @endif" style="color: @if($companies->cmp_state==1)red @else green @endif"></i></a>
                                    </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                            @empty
                            <p>No existen elementos para mostrar.</p>
                            @endforelse
                        </div>
                    </div>
                    {{-- TERCERA CATEGORÍA --}}
                    <div class="tab-pane" id="pills-category3" role="tabpanel" aria-labelledby="pills-category3-tab">
                        <div class="d-flex align-items-center mt-2 mb-4">
                            <hr class="col bg-custom-primary">
                            <p
                                class="  font-weight-bold   text-center rounded-lg py-1 py-sm-2 px-2 px-sm-4 m-0">
                                CEM</p>
                            <hr class="col bg-custom-primary">
                        </div>
                        <div class="row justify-content-center">
                            @forelse ($companies3 as $companies)
                            <div class="col-md-4 col-sm-5 col-lg-3">
                                <div
                                    class="card     rounded_1 mb-3  ">
                                    <div class="inner-img rounded_1">
                                        <a name="" id="" class="" href="{{$companies->cmp_url}}" target="_blank"
                                            role="button">
                                            <img {{-- src="http://3.231.42.58:8080/apiCacaoApp/public/api/v1/imageCompanie/{{$companies->cmp_img}}"
                                                --}} src="{{asset('images/img_default.png')}}"
                                                class="img-fluid rounded_1  ">
                                        </a>
                                    </div>
                                    {{-- @if(session('autenticacion')->usr_type_id == 1) --}}
                                     <div class="rounded_1 text-center">
                                        <a name="" id="" class="btn  mx-1"
                                            href="{{route('editCompanies', $companies->id)}}" role="button" title="Editar"><i
                                                class="fas fa-pen"></i></a>
                                        <a name="" id="" class="btn  mx-1"
                                            href="{{route('deleteCompanies', $companies->id)}}" role="button" title="Eliminar"><i
                                                class="fas fa-times"></i></a>
                                               <a name="" id=""
                                                        class="btn  mx-1"
                                                        href="{{route('banCompanies', $companies->id)}}" role="button" title="@if($companies->cmp_state == 1) Bloquear @else Desbloquear @endif">
                                                        <i class="fas @if($companies->cmp_state==1) fa-ban @else fa-check @endif" style="color: @if($companies->cmp_state==1)red @else green @endif"></i></a>
                                    </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                            @empty
                            <p>No existen elementos para mostrar.</p>
                            @endforelse
                        </div>
                    </div>
                    {{-- CUARTA --}}
                    <div class="tab-pane" id="pills-category4" role="tabpanel" aria-labelledby="pills-category4-tab">
                        <div class="d-flex align-items-center mt-2 mb-4">
                            <hr class="col bg-custom-primary">
                            <p
                                class="  font-weight-bold   text-center rounded-lg py-1 py-sm-2 px-2 px-sm-4 m-0">
                                MERCADOS</p>
                            <hr class="col bg-custom-primary">
                        </div>
                        <div class="row justify-content-center">
                            @forelse ($companies4 as $companies)
                            <div class="col-md-4 col-sm-5 col-lg-3">
                                <div
                                    class="card     rounded_1 mb-3">
                                    <div class="inner-img rounded_1">
                                        <a name="" id="" class="" href="{{$companies->cmp_url}}" target="_blank"
                                            role="button">
                                            <img {{-- src="http://3.231.42.58:8080/apiCacaoApp/public/api/v1/imageCompanie/{{$companies->cmp_img}}"
                                                --}} src="{{asset('images/img_default.png')}}"
                                                class="img-fluid rounded_1">
                                        </a>
                                    </div>
                                    {{-- @if(session('autenticacion')->usr_type_id == 1) --}}
                                   
                                     <div class="rounded_1 text-center">
                                        <div>
                                        @if($companies->cmp_facebook != null)
                                        <a name="" id="" class="btn mx-1"
                                            href="{{$companies->cmp_facebook}}" role="button" title="facebook"><i
                                                class="fab fa-facebook"></i></a>
                                        @endif
                                        @if($companies->cmp_instagram !=null)
                                        <a name="" id="" class="btn  mx-1"
                                            href="{{$companies->cmp_instagram}}" role="button" title="Instagram"><i class="fab fa-instagram"></i></a>
                                            @endif
                                        </div>
                                         <div>
                                        <a name="" id="" class="btn mx-1"
                                            href="{{route('editCompanies', $companies->id)}}" role="button" title="Editar"><i
                                                class="fas fa-pen"></i></a>
                                        <a name="" id="" class="btn  mx-1"
                                            href="{{route('deleteCompanies', $companies->id)}}" role="button" title="Eliminar"><i
                                                class="fas fa-times"></i></a>
                                                <a name="" id=""
                                                        class="btn  mx-1"
                                                        href="{{route('banCompanies', $companies->id)}}" role="button" title="@if($companies->cmp_state == 1) Bloquear @else Desbloquear @endif">
                                                        <i class="fas @if($companies->cmp_state==1) fa-ban @else fa-check @endif" style="color: @if($companies->cmp_state==1)red @else green @endif"></i></a>
                                    </div>
                                    </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                            @empty
                            <p>No existen elementos para mostrar.</p>
                            @endforelse
                        </div>
                    </div>
                    {{-- QUINTA --}}
                    <div class="tab-pane" id="pills-category5" role="tabpanel" aria-labelledby="pills-category5-tab">
                        <div class="d-flex align-items-center mt-2 mb-4">
                            <hr class="col bg-custom-primary">
                            <p
                                class="  font-weight-bold   text-center rounded-lg py-1 py-sm-2 px-2 px-sm-4 m-0">
                                RESTAURANTES</p>
                            <hr class="col bg-custom-primary">
                        </div>
                        <div class="row justify-content-center">
                            @forelse ($companies5 as $companies)
                            <div class="col-md-4 col-sm-5 col-lg-3">
                                <div
                                    class="card rounded_1 mb-3  ">
                                    <div class="inner-img rounded_1">
                                        <a name="" id="" class="" href="{{$companies->cmp_url}}" target="_blank"
                                            role="button">
                                            <img {{-- src="http://3.231.42.58:8080/apiCacaoApp/public/api/v1/imageCompanie/{{$companies->cmp_img}}"
                                                --}} src="{{asset('images/img_default.png')}}"
                                                class="img-fluid rounded_1  ">
                                        </a>
                                    </div>
                                    {{-- @if(session('autenticacion')->usr_type_id == 1) --}}

                                     <div class="rounded_1 text-center">
                                        <a name="" id="" class="btn  mx-1"
                                            href="{{route('editCompanies', $companies->id)}}" role="button" title="Editar"><i
                                                class="fas fa-pen"></i></a>
                                        <a name="" id="" class="btn  mx-1"
                                            href="{{route('deleteCompanies', $companies->id)}}" role="button" title="Eliminar"><i
                                                class="fas fa-times"></i></a>
                                               <a name="" id=""
                                                        class="btn  mx-1"
                                                        href="{{route('banCompanies', $companies->id)}}" role="button" title="@if($companies->cmp_state == 1) Bloquear @else Desbloquear @endif">
                                                        <i class="fas @if($companies->cmp_state==1) fa-ban @else fa-check @endif" style="color: @if($companies->cmp_state==1)red @else green @endif"></i></a>
                                    </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                            @empty
                            <p>No existen elementos para mostrar.</p>
                            @endforelse
                        </div>
                    </div>
                    {{-- END --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection