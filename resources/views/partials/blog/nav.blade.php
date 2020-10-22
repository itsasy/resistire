<nav class="navbar navbar-expand-lg navbar navbar-expand-lg navbar-dark bg_grad_h add-ff-nunito "
    style="padding:1.5rem;">

    <a class="navbar-brand d-lg-none" href="#"> </a>
    <a name="" id="" class="btn btn-custom__transparent__red shadow text-white d-lg-none" href="#" role="button"
        data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation"><i class="fas fa-sliders-h fa-lg"></i></a>

    <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
        <ul class="nav navbar-nav d-flex align-items-center" id="justifiedTab" role="tablist">
            @if(auth()->user()->usr_type_id == 1)
            <li class="nav-item mx-lg-4 {{Request::segment(2) == 'administrador' ? 'active' : ' '}}">
                <a aria-controls="administrador" aria-selected="true" class="nav-link font-weight-bold"
                    data-toggle="tab" href="#administrador" id="localesTab" role="tab">Noticias</a>
            </li>
            @endif
            {{-- <li class="nav-item mx-lg-4 {{Request::segment(2) == 'puntos' ? 'active' : ' '}}">
                <a aria-controls="Puntos" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                    href="#Puntos" id="puntosTab" role="tab">Instituciones públicas</a>
            </li> --}}
            {{-- @if(session('autenticacion')->usr_id_dst != 1090)
            <li class="nav-item mx-lg-4 {{Request::segment(2) == 'municipalidad' ? 'active' : ' '}}">
                <a aria-controls="Adicional" aria-selected="true" class="nav-link font-weight-bold" data-toggle="tab"
                    href="#Adicional" id="adicionalTab" role="tab">Tu municipalidad</a>
            </li>
            @endif --}}
            <li class="nav-item">
                <a class="nav-link font-weight-bold"
                    href="  {{route('Mapa', [ session('distrito'), session('id_distrito'), session('nom_provincia')])}}"
                    id="" role="btn">Salir</a>
            </li>
        </ul>
    </div>


</nav>