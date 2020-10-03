@extends('layouts.app')

@include('layouts.btn_return_map')

@section('title', 'Incidencias')

@section('content')
<div class="container-fluid h_header bg_grad_h pt-5">
  <div class="row">
    <div class="col">
      <div class="d-flex flex-column align-items-center">
        <h4 class="title text-center mt-2 mb-5">LISTA DE INCIDENCIAS</h4>
        <div class="col-lg-11 bg-white p-3 p-sm-4 mb-3 rounded_1 shadow">
          {{-- Botón para excel --}}
          <div class="col text-center">
            <button type="button" class="btn btn_outl_p" data-toggle="modal" data-target="#excel">Exportar a Excel</button>
          </div>
          <br>
          <table class="table table-responsive-sm table-responsive-md table-responsive-lg text_list shadow"
            id="table_alerts">
            <thead class="bg_grad_h text-center text-uppercase text-white">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">USUARIO</th>
                <th scope="col">FECHA Y HORA</th>
                <th scope="col">TIPO<span class="invisible">_</span>DE<span class="invisible">_</span>ALERTA</th>
                <th scope="col">DIRECCIÓN</th>
                <th scope="col">ACCIONES</th>
              </tr>
            </thead>
            <tbody class="text-secondary">
              @foreach ($list as $alerts)
              

              <tr>
                <td class="bg-light text_p font-weight-bold">{{$loop->iteration}}</td>
                
                <td >{{$alerts->info_user->usr_patname}}</td>
                
                <td>{{Carbon\Carbon::parse($alerts->alt_date)->format('d/m/Y - h:i:s a')}}</td>
                @switch($alerts->alt_id_altt)
                  @case(1)
                  <td>Serenazgo</td>
                  @break
                  @case(2)
                  <td>Ambulancia</td>
                  @break
                  @case(3)
                  <td>Bombero</td>
                  @break
                  @case(4)
                  <td>Fiscalización</td>
                  @break
                  @case(5)
                  <td>Violencia familiar</td>
                  @break
                  @case(6)
                  <td>R.R.S.S.</td>
                  @break
                  @case(7)
                  <td>Reciclaje</td>
                  @break
                  @case(8)
                  <td>Salud mental</td>
                  @break
                @endswitch
                
                <td>{{$alerts->alt_address}}</td>
                <td class="d-flex justify-content-center align-items-center">
                  @if($alerts->alt_img!=null && $alerts->alt_comentary!=null)
                  <a name="" id="" class="btn_circl_outl_p mr-1" href="#" role="button" aria-pressed="true"
                    data-toggle="modal" data-target="#modal_info{{$alerts->id}}">
                    <i class="fas fa-info"></i>
                  </a>
                  @elseif($alerts->alt_img!=null)
                  <a name="" id="" class="btn_circl_outl_p mr-1" href="#" role="button" aria-pressed="true"
                    data-toggle="modal" data-target="#modal_image{{$alerts->id}}">
                    <i class="fas fa-image"></i>
                  </a>
                  @elseif($alerts->alt_comentary!=null)
                  <a name="" id="" class="btn_circl_outl_p mr-1" href="#" role="button" aria-pressed="true"
                    data-toggle="modal" data-target="#modal_comentary{{$alerts->id}}">
                    <i class="fas fa-comment"></i>
                  </a>
                  @endif
                  <a name="" id="" class="btn_circl_outl_p ml-1" href="{{route('deleteAlert', $alerts->id)}}"
                    role="button">
                    <i class="fas fa-times"></i>
                  </a>
                </td>
              </tr>
              {{-- ********************************************************* --}}
              <div class="modal fade" id="modal_info{{$alerts->id}}" role="dialog" aria-labelledby="modal_image"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                  <div class="modal-content">
                    <div class="modal-header justify-content-center">
                      <h5 id=titulo class="text-uppercase font-weight-bold text_p">Información adicional</h5>
                    </div>
                    <div class="modal-body row">
                      @if($alerts->alt_img != null)
                      <div id="img" class="col-lg-8">
                        <p class="font-weight-bold">Imagen de referencia</p>
                        <img src="http://34.226.78.219:8080/api_covid19/public/api/imageAlert/{{$alerts->alt_img}}"
                          class="img-fluid rounded" alt="img">
                      </div>
                      @endif
                      
                      @if($alerts->alt_comentary != null)
                        <div id="commentary" class="col-lg-4">
                          <p class="font-weight-bold">Comentario:</p>
                          <div class="border p-2 rounded">
                            <p class="text-secondary m-0 text-justify">{{$alerts->alt_comentary}}</p>
                          </div>
                        </div>
                      @endif
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><Cancelar>Cerrar</Cancelar></button>
                    </div>
                  </div>
                </div>
              </div>
              {{-- ********************************************************* --}}
              <div class="modal fade" id="modal_image{{$alerts->id}}" role="dialog" aria-labelledby="modal_image"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                  <div class="modal-content">
                    <div class="modal-header justify-content-center">
                      <h5 id=titulo class="text-uppercase font-weight-bold text_p">Información adicional</h5>
                    </div>
                    <div class="modal-body text-center">
                      @if($alerts->alt_img != null)
                      <div id="img">
                        <p class="font-weight-bold">Imagen de referencia</p>
                        <img src="http://34.226.78.219:8080/api_covid19/public/api/imageAlert/{{$alerts->alt_img}}"
                          class="img-fluid rounded" alt="img">
                      </div>
                      @endif
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><Cancelar>Cerrar</Cancelar></button>
                    </div>
                  </div>
                </div>
              </div>
              {{-- ********************************************************* --}}
              <div class="modal fade" id="modal_comentary{{$alerts->id}}" role="dialog" aria-labelledby="modal_image"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header justify-content-center">
                      <h5 id=titulo class="text-uppercase font-weight-bold text_p">Información adicional</h5>
                    </div>
                    <div class="modal-body text-center">
                      @if($alerts->alt_comentary != null)
                        <div id="commentary">
                          <p class="font-weight-bold">Comentario:</p>
                          <div class="border p-2 rounded">
                            <p class="text-secondary m-0 text-justify">{{$alerts->alt_comentary}}</p>
                          </div>
                        </div>
                      @endif
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"><Cancelar>Cerrar</Cancelar></button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
                                          {{ $list->links() }}

            </tbody>
          </table>
        </div>
        
        {{--  EXCEL --}}
         <div class="modal fade" id="excel" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                <h5 class="modal-title text-secondary">Seleccione un rango de fechas para generar el reporte:
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="{{route('excel')}}" method="get">
                <div class="modal-body text-center">
                  <div class="form-group">
                    <label for="inicio" class="text-secondary">Fecha inicial</label>
                    <input type="date" class="form-control" name="inicio" id="inicio">
                  </div>
                  <div class="form-group">
                    <label for="fin" class="text-secondary">Fecha final</label>
                    <input type="date" class="form-control" name="fin" id="fin">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" id="aceptar">Aceptar</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
              </form>
            </div>
          </div>
        </div>



      </div>
    </div>
  </div>
</div>
@endsection