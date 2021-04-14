@extends('layouts.app')

@include('layouts.btn_return_map')

@section('title', 'Lista de Usuarios')

@section('content')
<div class="header pt-5 pt-md-0">
   <h3 class="header_title d-none d-md-block">@lang('string.users')</h3>
   <h4 class="header_title d-block d-md-none">@lang('string.users')</h4>
</div>

<div class="container-fluid py-3">
   <table class="table table-responsive-sm table-bordered table-hover text_list shadow" id="table_person">
      <thead class="bg_p text-center text-uppercase text-white">
         <tr>
            <th scope="col">@lang('string.id')</th>
            <th scope="col">@lang('string.names')</th>
            <th scope="col">@lang('string.lastnames')</th>
            <th scope="col">@lang('string.dni')</th>
            <th scope="col">@lang('string.phone')</th>
            <th scope="col">@lang('string.actions')</th>
         </tr>
      </thead>
      <tbody class="text-secondary">
         @foreach ($list as $person)
         <tr>
            <td class="bg-light text_p text-center">{{$loop->iteration}}</td>
            <td>{{$person->usr_name}}</td>
            <td>{{$person->usr_patname . ' ' . $person->usr_matname }}</td>
            <td>{{$person->usr_document}}</td>
            <td>{{$person->usr_phone_1}}</td>
            <td class="d-flex justify-content-center align-items-center">
               <a name="" id="" class="btn_circl_outl_p mr-1" href="{{route('deleteUser', $person->id)}}"
                  role="button">
                  <i class="fas fa-times"></i>
               </a>
               <a name="" id="" class="btn_circl_outl_p ml-1" href="{{route('banUser', $person->id)}}" role="button">
                  @if($person->usr_enable == 1)
                  <i class="fas fa-ban" style="color:red"></i>
                  @else
                  <i class="fas fa-check-circle" style="color:green"></i>
                  @endif
               </a>
            </td>
         </tr>
         @endforeach
         {{ $list->links() }}
      </tbody>
   </table>
</div>
@endsection