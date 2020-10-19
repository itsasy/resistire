@section('toggle_menu')

<div class="toggle_menu container-fluid">
    <a href="#" id="toggle_menu" class="btn btn_transp my-2 z_i_2">
        <i class="fas fa-sliders-h"></i>
    </a>
</div>
<div class="menu_area bg_grad_v">
    <div class="container-fluid">
        <a href="#" id="toggle_menu_close" class="btn btn_transp my-2 position-absolute">
            <i class="fas fa-times"></i>
        </a>
    </div>
    <div class="h-100 w-100 d-flex justify-content-center align-items-center">
        <div class="menu_content_area d-flex flex-column">

            <a href="{{route('alertList')}}"
                class="btn btn_outl_w py-4 mx-5 d-flex justify-content-between align-items-center mb-3 rounded_1">
                <i class="fas fa-exclamation-circle fa-2x"></i>Incidencias
            </a>

            <a href="{{route('mostrarEstadisticas')}}"
                class="btn btn_outl_w py-4 mx-5 d-flex justify-content-between align-items-center mb-3 rounded_1">
                <i class="fas fa-chart-bar fa-2x"></i>Estadísticas
            </a>

            <a href="{{route('mapAssociate')}}"
                class="btn btn_outl_w py-4 mx-5 d-flex justify-content-between align-items-center mb-3 rounded_1">
                <i class="fas fa-th-large fa-2x"></i>Asociados
            </a>

            <a href="{{route('alimentos.index')}}"
                class="btn btn_outl_w py-4 mx-5 d-flex justify-content-between align-items-center mb-3 rounded_1">
                <i class="fas fa-th-large fa-2x"></i>Seguridad alimentaria
            </a>
            
            @if(auth()->user()->usr_type_id != 1)
            <a href="{{route('local_news')}}"
                class="btn btn_outl_w py-4 mx-5 d-flex justify-content-between align-items-center mb-3 rounded_1">
                <i class="fas fa-th-large fa-2x"></i>Noticias Locales
            </a>
            @endif
            <a @if(auth()->user()->usr_type_id == 1)
                href="{{route('noticias', ['seccion'=> "administrador"])}}"
                @else
                href="{{route('noticias', ['seccion' => 'puntos'])}}"
                @endif
                class="btn btn_outl_w py-4 mx-5 d-flex justify-content-between align-items-center mb-3 rounded_1">
                <i class="fas fa-th-large fa-2x"></i>Blog
            </a>
            <a href="{{route('listUsuarios')}}"
                class="btn btn_outl_w py-4 mx-5 d-flex justify-content-between align-items-center mb-3 rounded_1">
                <i class="fas fa-th-large fa-2x"></i>Usuarios
            </a>
            <a href="{{route('cerrar-sesion')}}"
                class="btn btn_outl_w py-4 mx-5 d-flex justify-content-between align-items-center mb-3 rounded_1">
                <i class="fas fa-chevron-circle-left fa-2x"></i>Cerrar sesión
            </a>
        </div>
    </div>
</div>
@endsection