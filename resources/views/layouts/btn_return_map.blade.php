@section('btn_return_map')
<div class="container-fluid">
    <a href="{{route('Mapa', [ session('distrito'), session('id_distrito'), session('nom_provincia')])}}" id="" class="btn btn_transp my-2 position-absolute">
        <i class="fas fa-times"></i>
    </a>
</div>
@endsection