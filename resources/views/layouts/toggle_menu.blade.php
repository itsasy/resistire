@section('toggle_menu')

<div class="toggle_menu container-fluid">
    <a href="#" id="toggle_menu" class="btn btn_transp d-flex justify-content-center align-items-center my-2">
        <i class="fas fa-sliders-h mr-0 mr-md-2"></i>
        <p class="p-0 m-0 d-none d-md-block font-weight-bold">Menú</p>
    </a>
</div>
<div class="menu_area bg_grad_v">
    <div class=" container-fluid d-flex justify-content-between align-items-center position-absolute py-2">
        <a href="#" id="toggle_menu_close" class="btn btn_transp d-flex justify-content-center align-items-center">
            <i class="fas fa-times mr-0 mr-md-2"></i>
            <p class="p-0 m-0 d-none d-md-block font-weight-bold">Cerrar</p>
        </a>
        
        <a href="{{route('cerrar-sesion')}}" class="btn btn_transp d-flex justify-content-center align-items-center">
            <i class="fas fa-sign-out-alt mr-2"></i>
            <p class="p-0 m-0 font-weight-bold">Cerrar sesión</p>
        </a>
    </div>
    <div class="menu_content_area pt-5 px-0 px-md-1 px-lg-5">
        <div class="menu_content_buttons">
            <a href="{{route('alertList')}}"
                class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
                <i class="fas fa-exclamation-circle fa-lg"></i>Incidencias
            </a>

            <a href="{{route('mostrarEstadisticas')}}"
                class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
                <i class="fas fa-chart-bar fa-lg"></i>Estadísticas
            </a>

            <a href="{{route('mapAssociate')}}"
                class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
                <i class="fas fa-th-large fa-lg"></i>Empresas responsables
            </a>

            <a href="{{route('public_institutions')}}"
                class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
                <i class="fas fa-th-large fa-lg"></i>Instituciones públicas
            </a>

            <a href="{{route('alimentos.index')}}"
                class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
                <i class="fas fa-th-large fa-lg"></i>Seguridad alimentaria
            </a>
            
            @if(auth()->user()->usr_type_id != 1)
            <a href="{{route('local_news')}}"
                class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
                <i class="fas fa-th-large fa-lg"></i>Noticias
            </a>
            @endif
            @if(auth()->user()->usr_type_id == 1)
            <a href="{{route('noticias', ['seccion'=> "administrador"])}}"
                class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
                <i class="fas fa-th-large fa-lg"></i>Noticias del administrador
            </a>
            @endif
            <a href="{{route('listUsuarios')}}"
                class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
                <i class="fas fa-th-large fa-lg"></i>Usuarios
            </a>
            <!--<a href="{{route('cerrar-sesion')}}"
                class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
                <i class="fas fa-chevron-circle-left fa-lg"></i>Cerrar sesión
            </a>-->
        </div>
    </div>
</div>
@endsection