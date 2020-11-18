@extends('layouts.app')

@section ('title', 'Login')

@prepend('styles')
<link rel="stylesheet" href="{{asset('css/style_background.css')}}">
@endprepend

@section('content')

<div class="container_login">
  <div class="login shadow col-md-8 col-lg-5">
    <div class="login_img_layout">
      <img src="{{asset('images/logo/logo_resistire.png')}}" alt="login" class="img-fluid login_img">
    </div>
    <div class="login_form_layout">
      <form action="{{route('logeo')}}" method="POST" class="needs-validation py-3 col-md-8 col-lg-7 form_reg"
        novalidate>
        {{csrf_field()}}
        <div class="text-center text-md-left">
          <h4 class="text_p text-uppercase font-weight-bold">@lang('string.login')</h4>
        </div>
        <div class="form-row my-5">
          <div class="col-12 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
              <input type="text" class="form-control" id="user" name="username" placeholder="@lang('string.user')" maxlength="50" required>
              <div class="valid-feedback">@lang('string.correct')</div>
              <div class="invalid-feedback">@lang('string.enter_user')</div>
            </div>
          </div>
          <div class="col-12">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
              </div>
              <input type="password" class="form-control" id="password" name="password" placeholder="@lang('string.password')" maxlength="100" required>
              <div class="valid-feedback">@lang('string.correct')</div>
              <div class="invalid-feedback">@lang('string.enter_user')</div>
            </div>
          </div>
        </div>
        <div class="text-center text-md-right">
          <button class="btn btn-danger rounded-pill px-5" type="submit">@lang('string.enter')</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection