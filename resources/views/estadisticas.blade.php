@extends('layouts.app')
@include('layouts.btn_return_map')
@section('title', 'Estadísticas')
@section('content')
    <div class="header pt-5 pt-md-0">
        <h3 class="header_title d-none d-md-block">@lang('string.statistics')</h3>
        <h4 class="header_title d-block d-md-none">@lang('string.statistics')</h4>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-lg-6">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <h6 class="font-weight-bold text_p m-0">@lang('string.alerts_received')</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-lg-6">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <h6 class="font-weight-bold text_p m-0">@lang('string.alerts_by_month')</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            @if(auth()->user()->usr_type_id == 1)
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <h6 class="font-weight-bold text_p m-0">@lang('string.total_alerts_by_district')</h6>
                        </div>
                        <div class="card-body">
                            @foreach($contador as $contar)
                                <h4 class="small font-weight-bold">{{$contar->info_district->dst_name}}<span
                                        class="float-right">{{$contar->total}}</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg_p" style="width:{{$contar->total}}px" role="progressbar"
                                         aria-valuenow="{{$contar->total}}" aria-valuemin="0"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
        myValues = {!!  $myValues !!}
    </script>
    <script>
        usr_type = {!! auth()->user()->usr_type_id !!}
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script type="module" src="{{asset('js/chart-area-demo.js')}}"></script>
    <script type="module" src="{{asset('js/chart-pie-demo.js')}}"></script
@endsection
