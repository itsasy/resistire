@section('btn_return_map')
<div class="container-fluid">
   <a name="" id="" class="btn btn_transp mt-2 position-absolute" href="{{route('Mapa', [ session('distrito'), session('id_distrito'), session('nom_provincia')])}}" role="button">
      <i class="fas fa-angle-left mr-0 mr-md-2"></i>
      <spam class="d-none d-md-inline">@lang('string.main')</spam>
   </a>
</div>
@endsection