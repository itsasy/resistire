@section('btn_previous')
<div class="container-fluid">
   <a name="" id="" class="btn btn_transp mt-2 position-absolute" href="{{URL::previous()}}" role="button">
      <i class="fas fa-angle-left mr-0 mr-md-2"></i>
      <spam class="d-none d-md-inline">@lang('string.cancel')</spam>
   </a>
</div>
@endsection