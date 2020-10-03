@extends('layouts.app')

@section ('title', 'Login')

@prepend('styles')
<link rel="stylesheet" href="{{asset('css/base_backgroundimage_style.css')}}">
@endprepend

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col h_100_vh d-flex justify-content-center align-items-center">
            <form action="{{route('logeo')}}" method="POST" class="login_form text-center bg-white rounded_1 shadow">
                {{csrf_field()}}
                <div class="form-group p-4">
                    <img src="{{asset('images/resistire_logo.png')}}" alt="login" class="img-fluid" width="120">
                </div>
                <div class="form-group">
                    <input type="text" name="username" id="" class="form-control form-control-lg rounded-pill"
                        placeholder="Usuario">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="" class="form-control form-control-lg rounded-pill"
                        placeholder="Contraseña">
                </div>
                <div class="forgot-link d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <label class="form-check-label text-secondary">
                            <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                            Recordar contraseña
                        </label>
                    </div>
                    <a href="#" class="font-weight-bold text_p">Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" class="btn btn-lg mt-5 btn_grad_reg btn-block rounded-pill text-uppercase">
                    INGRESAR<i class="fas fa-chevron-right ml-2"></i>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection