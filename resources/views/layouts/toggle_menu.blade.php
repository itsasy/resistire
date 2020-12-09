@section('toggle_menu')
<div class="container-fluid">
   <a name="" id="toggle_menu" class="btn btn_transp mt-2 position-absolute" href="#" role="button">
      <i class="fas fa-sliders-h mr-0 mr-md-2"></i>
      <spam class="d-none d-md-inline">@lang('string.menu')</spam>
   </a>
</div>
<div class="menu_area bg_grad_v">
   <div class=" container-fluid d-flex justify-content-between position-absolute pt-2">
      <a name="" id="toggle_menu_close" class="btn btn_transp mt-2" href="#" role="button">
         <i class="fas fa-times mr-0 mr-md-2"></i>
         <spam class="d-none d-md-inline">@lang('string.close')</spam>
      </a>

      <a name="" id="" class="btn btn_transp mt-2" href="{{route('cerrar-sesion')}}" role="button">
         <i class="fas fa-sign-out-alt mr-0 mr-md-2"></i>
         <spam>@lang('string.logout')</spam>
      </a>
   </div>
   <div class="menu_content_area pt-5 px-0 px-md-1 px-lg-5">
      <div class="menu_content_buttons">
         <a href="{{route('alertList')}}"
            class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
            <i class="fas fa-exclamation-circle fa-lg"></i>@lang('string.incidents')
         </a>

         <a href="{{route('mostrarEstadisticas')}}"
            class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
            <i class="fas fa-chart-bar fa-lg"></i>@lang('string.statistics')
         </a>

         <!--<a href="{{route('mapAssociate')}}" class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
            <i class="fas fa-th-large fa-lg"></i>@lang('string.responsible_companies')
         </a>-->

         <!--<a href="{{route('public_institutions')}}" class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
            <i class="fas fa-th-large fa-lg"></i>@lang('string.public_institutions')
         </a>-->

         <!--<a href="{{route('alimentos.index')}}" class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
            <i class="fas fa-th-large fa-lg"></i>@lang('string.food_safety')
         </a>-->

         <!--@if(auth()->user()->usr_type_id != 1)
         <a href="{{route('local_news')}}" class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
            <i class="fas fa-th-large fa-lg"></i>@lang('string.news')
         </a>
         @endif
         @if(auth()->user()->usr_type_id == 1)
         <a href="{{route('noticias', ['seccion'=> "administrador"])}}" class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
            <i class="fas fa-th-large fa-lg"></i>@lang('string.news')
         </a>
         @endif-->
         <a href="{{route('areas')}}"
            class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
            <i class="fas fa-th-large fa-lg"></i>@lang('string.areas')
         </a>
         <a href="{{route('listUsuarios')}}"
            class="btn btn_outl_w p-3 m-2 d-flex justify-content-between align-items-center mb-3 rounded_1 mw_15">
            <i class="fas fa-th-large fa-lg"></i>@lang('string.users')
         </a>
      </div>
   </div>
</div>
@endsection