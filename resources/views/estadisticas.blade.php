@extends('layouts.app')

@include('layouts.btn_return_map')

@section('title', 'Estadísticas')

@section('content')
<div class="container-fluid h_header bg_grad_h pt-5">
  <div class="row">
    <div class="col">
      <div class="d-flex flex-column align-items-center">
        <h4 class="title text-center mt-2 mb-5">Estadísticas</h4>
      </div>
      <br>
      <!-- Area Chart -->
      <div class="row">
        <div class="col-xl-7 col-lg-6">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Alertas recibidas</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- Pie Chart -->
        <div class="d-inline col-xl-5 col-lg-6">
          <div class="col-12">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Alertas según el mes</h6>
                
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-pie">
                  <canvas id="myPieChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Alertas totales según el distrito.</h6>
              </div>
              <div class="card-body">

                {{--  --}}
                @foreach($contador as $contar)
                <h4 class="small font-weight-bold">{{$contar->info_district->dst_name}}<span
                    class="float-right">{{$contar->total}}</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-danger" style="width:{{$contar->total}}px" role="progressbar"
                    aria-valuenow="{{$contar->total}}" aria-valuemin="0"></div>
                </div>
                @endforeach
                {{--  --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js">
</script>
<script type="module" src="{{asset('js/chart-area-demo1.js')}}"></script>
<script type="module" src="{{asset('js/chart-pie-demo.js')}}"></script>

@endsection