@extends('layouts.app')
@include('layouts.btn_return_map')
@section('title', 'Incidencias')
@section('content')
<div class="header pt-5 pt-md-0">
   <h3 class="header_title d-none d-md-block">@lang('string.incidents_list')</h3>
   <h4 class="header_title d-block d-md-none">@lang('string.incidents_list')</h4>
</div>
<div class="container-fluid py-3">
   <div class="row justify-content-center text-center mb-3">
      <a name="" id="" class="btn btn_outl_p rounded-pill" href="#" role="button" data-toggle="modal" data-target="#excel"><i class="fas fa-download mr-2"></i>@lang('string.export')</a>
   </div>
   <table class="table table-responsive-sm table-bordered table-hover text_list shadow" id="table_alerts">
      <thead class="bg_primary text-center text-uppercase text-white">
         <tr>
            <th scope="col">@lang('string.id')</th>
            <th scope="col">@lang('string.user')</th>
            <th scope="col">@lang('string.date_and_hour')</th>
            <th scope="col">@lang('string.alert_type')</th>
            <th scope="col">@lang('string.address')</th>
            <th scope="col">@lang('string.actions')</th>
         </tr>
      </thead>
      <tbody class="text-secondary">
         @foreach ($list as $alerts)
         <tr>
            <th class="bg-light text_p text-center">{{$loop->iteration}}</th>

            <td>{{$alerts->info_user->usr_patname}}</td>

            <td>{{Carbon\Carbon::parse($alerts->alt_date)->format('d/m/Y - h:i:s a')}}</td>
            @switch($alerts->alt_id_altt)
            @case(1)
            <td>@lang('string.alt_1_name_yauyos')</td>
            @break
            @case(2)
            <td>@lang('string.alt_2_name')</td>
            @break
            @case(3)
            <td>@lang('string.alt_3_name')</td>
            @break
            @case(4)
            <td>@lang('string.alt_4_name_yauyos')</td>
            @break
            @case(5)
            <td>@lang('string.alt_5_name')</td>
            @break
            @case(6)
            <td>@lang('string.alt_6_name')</td>
            @break
            @case(7)
            <td>@lang('string.alt_7_name')</td>
            @break
            @case(8)
            <td>@lang('string.alt_8_name')</td>
            @break
            @endswitch

            <td>{{$alerts->alt_address}}</td>

            <td class="">
               <div class="d-flex justify-content-center">
                  @if($alerts->alt_img!=null && $alerts->alt_comentary!=null)
                  <a name="" id="" class="btn_circl_outl_p mr-1" href="#" role="button" aria-pressed="true" data-toggle="modal" data-target="#modal_info{{$alerts->id}}">
                     <i class="fas fa-info"></i>
                  </a>
                  @elseif($alerts->alt_img!=null)
                  <a name="" id="" class="btn_circl_outl_p mr-1" href="#" role="button" aria-pressed="true" data-toggle="modal" data-target="#modal_image{{$alerts->id}}">
                     <i class="fas fa-image"></i>
                  </a>
                  @elseif($alerts->alt_comentary!=null)
                  <a name="" id="" class="btn_circl_outl_p mr-1" href="#" role="button" aria-pressed="true" data-toggle="modal" data-target="#modal_comentary{{$alerts->id}}">
                     <i class="fas fa-comment"></i>
                  </a>
                  @endif
                  <a name="" id="" class="btn_circl_outl_p ml-1" href="{{route('deleteAlert', $alerts->id)}}" role="button">
                     <i class="fas fa-times"></i>
                  </a>
               </div>
            </td>
         </tr>
         {{-- ********************************************************* --}}
         <div class="modal fade" id="modal_info{{$alerts->id}}" role="dialog" aria-labelledby="modal_image" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
               <div class="modal-content">
                  <div class="modal-header justify-content-center">
                     <h5 id=titulo class="text-uppercase font-weight-bold text_p">@lang('string.additionnal_info')</h5>
                  </div>
                  <div class="modal-body row">
                     @if($alerts->alt_img != null)
                     <div id="img" class="col-lg-8">
                        <p class="font-weight-bold">@lang('string.reference_img')</p>
                        <img src="http://34.226.78.219:8080/api_covid19/public/api/imageAlert/{{$alerts->alt_img}}" class="img-fluid rounded" alt="img">
                     </div>
                     @endif

                     @if($alerts->alt_comentary != null)
                     <div id="commentary" class="col-lg-4">
                        <p class="font-weight-bold">@lang('string.commentary')</p>
                        <div class="border p-2 rounded">
                           <p class="text-secondary m-0 text-justify">{{$alerts->alt_comentary}}</p>
                        </div>
                     </div>
                     @endif
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <Cancelar>Cerrar</Cancelar>
                     </button>
                  </div>
               </div>
            </div>
         </div>
         {{-- ********************************************************* --}}
         <div class="modal fade" id="modal_image{{$alerts->id}}" role="dialog" aria-labelledby="modal_image" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
               <div class="modal-content">
                  <div class="modal-header justify-content-center">
                     <h5 id=titulo class="text-uppercase font-weight-bold text_p">@lang('string.additionnal_info')</h5>
                  </div>
                  <div class="modal-body text-center">
                     @if($alerts->alt_img != null)
                     <div id="img">
                        <p class="font-weight-bold">@lang('string.reference_img')</p>
                        <img src="http://34.226.78.219:8080/api_covid19/public/api/imageAlert/{{$alerts->alt_img}}" class="img-fluid rounded" alt="img">
                     </div>
                     @endif
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <Cancelar>Cerrar</Cancelar>
                     </button>
                  </div>
               </div>
            </div>
         </div>
         {{-- ********************************************************* --}}
         <div class="modal fade" id="modal_comentary{{$alerts->id}}" role="dialog" aria-labelledby="modal_image" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
               <div class="modal-content">
                  <div class="modal-header justify-content-center">
                     <h5 id=titulo class="text-uppercase font-weight-bold text_p">@lang('string.additionnal_info')</h5>
                  </div>
                  <div class="modal-body text-center">
                     @if($alerts->alt_comentary != null)
                     <div id="commentary">
                        <p class="font-weight-bold">@lang('string.commentary')</p>
                        <div class="border p-2 rounded">
                           <p class="text-secondary m-0 text-justify">{{$alerts->alt_comentary}}</p>
                        </div>
                     </div>
                     @endif
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <Cancelar>Cerrar</Cancelar>
                     </button>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
         {{ $list->links() }}

      </tbody>
   </table>
   <div class="modal fade" id="excel" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header justify-content-center">
               <h5 class="modal-title text-secondary">@lang('string.incidents_list')</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>

            <form action="{{route('excel')}}" method="get">
               <div class="modal-body text-center">
                  <div class="form-group">
                     <label for="inicio" class="text-secondary">@lang('string.initial_date')</label>
                     <input type="date" class="form-control" name="inicio" id="inicio">
                  </div>
                  <div class="form-group">
                     <label for="fin" class="text-secondary">@lang('string.final_date')</label>
                     <input type="date" class="form-control" name="fin" id="fin">
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" id="aceptar">@lang('string.accept')</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('string.cancel')</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection