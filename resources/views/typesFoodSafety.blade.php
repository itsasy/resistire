@extends('layouts.app')
@include('layouts.btn_return_map')
@section ('title', 'Seguridad Alimentaria')
@section('content')
    <div class="header pt-5 pt-md-0">
        <h3 class="header_title d-none d-md-block">@lang('string.food_safety')</h3>
        <h4 class="header_title d-block d-md-none">@lang('string.food_safety')</h4>
    </div>

    <div class="container pt-3">
        <div class="row">
            @if(auth()->user()->usr_type_id == 2 || auth()->user()->usr_type_id == 1)
            <div class="col-12 text-center mb-3">
                <a name="" id="" class="btn btn_outl_p rounded-pill" href="#" role="button" data-toggle="modal"
                   data-target="#modalRegister">
                    <i class="fas fa-plus mr-2"></i>@lang('string.register')</a>
            </div>
            @endif
            @forelse ($data as $type)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card card_c">
                        <div class="row no-gutters">
                            <div class="col-3 bg_p p-2 d-flex justify-content-center align-items-center">
                                <i class="fas fa-shield-alt fa-3x"></i>
                            </div>
                            <div class="col-9">
                                <div class="card-body p-3">
                                    <h5 class="card-title text-secondary">{{$type->fdst_desc}}</h5>
                                    <div class="text-right mt-5">
                                        <a name="" id="" class="btn btn_outl_p rounded-pill"
                                           href="{{route('alimentos.show', $type->id)}}"
                                           role="button">@lang('string.enter')<i
                                                class="fas fa-angle-right ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
        @if(auth()->user()->usr_type_id == 2 || auth()->user()->usr_type_id == 1)

                        <div class="d-flex justify-content-end p-1 bg_p">
                            <button name="" id="" class="btn btn_circl_outl_w m-1"
                                    href="#" data-toggle="modal"
                                    data-target="#modalUpdate-{{$type->id}}" role="button"
                                    title="@lang('string.update')"><i class="fas fa-pen"></i></button>

                            <form action="{{route('tipo_alimentos.destroy', $type->id)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn_circl_outl_w m-1" title="@lang('string.delete')"><i
                                        class="fas fa-times"></i></button>
                            </form>
                        </div>
                        
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h5 class="text-center text_p">@lang('string.no_data')</h5>
                </div>
            @endforelse
        </div>

            @if(auth()->user()->usr_type_id == 2 || auth()->user()->usr_type_id == 1)

        <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <form action="{{route('tipo_alimentos.store')}}" method="POST"
                      class="modal-content form_reg needs-validation" novalidate>
                    @csrf
                    <div class="modal-header justify-content-center align-items-center bg_p mh_4 p-0">
                        <h6 class="text-white text-uppercase font-weight-bold m-0">@lang('string.reg_theme')</h6>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fdst_desc">@lang('string.name')</label>
                            <input type="text" name="fdst_desc" id="fdst_desc" class="form-control"
                                   placeholder="@lang('string.enter_name')" maxlength="100" required>
                            <div class="invalid-feedback">@lang('string.enter_name')</div>
                            <div class="valid-feedback">@lang('string.name_entered')</div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn_outl_p rounded-pill" data-dismiss="modal"><i
                                class="fas fa-times mr-2"></i>@lang('string.close')</button>
                        <button type="submit" class="btn btn_p rounded-pill">@lang('string.register')<i
                                class="fas fa-angle-right ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
        @foreach ($data as $type)
            <div class="modal fade" id="modalUpdate-{{$type->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <form action="{{route('tipo_alimentos.update', $type->id)}}" method="POST"
                          class="modal-content form_reg needs-validation" novalidate>
                        @method('PUT')
                        @csrf
                        <div class="modal-header justify-content-center align-items-center bg_p mh_4 p-0">
                            <h6 class="text-white text-uppercase font-weight-bold m-0">@lang('string.reg_theme')</h6>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="fdst_desc">@lang('string.name')</label>
                                <input type="text" name="fdst_desc" id="fdst_desc" class="form-control"
                                       placeholder="@lang('string.enter_name')" maxlength="100" required>
                                <div class="invalid-feedback">@lang('string.enter_name')</div>
                                <div class="valid-feedback">@lang('string.name_entered')</div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn_outl_p rounded-pill" data-dismiss="modal"><i
                                    class="fas fa-times mr-2"></i>@lang('string.close')</button>
                            <button type="submit" class="btn btn_p rounded-pill">@lang('string.register')<i
                                    class="fas fa-angle-right ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
        
        @endif
    </div>
@endsection