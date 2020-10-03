@extends('layouts.app')

@section ('title', 'Edición de noticias')

@section('content')
<div class="container-fluid pt-5 bg_grad_h h_header">
  <div class="row">
    <div class="col d-flex flex-column align-items-center">
      <h4 class="text-center text-white text-uppercase mt-2 mb-4 ff_saira">EDICIÓN DE NOTICIAS
      </h4>
      <form action="{{route('saveUpdateNews')}}" method="POST" enctype="multipart/form-data"
        class="col-lg-8 col-md-10 px-3 px-sm-4 pt-3 pt-sm-4 pb-1 mb-4 form_reg bg-white rounded_1 shadow needs-validation"
        novalidate>
        {{ csrf_field() }}
        <div class="py-3">
          <div class="d-flex justify-content-center mb-2">
            <p
              class="subarea_reg font-weight-bold text-secondary text-center py-2 px-3 position-absolute mt-n3 bg-white rounded_1">
              Datos de autor</p>
          </div>
          <div class="subarea_reg rounded_1 pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-group">
              <label for="author">Nombre</label>
              <input type="text" name="author" id="author" class="form-control rounded_1" placeholder="Ingrese nombre"
                value="{{$noticias->nws_author}}" required>
              <div class="invalid-feedback">Ingrese nombre</div>
              <div class="valid-feedback">Nombre ingresado</div>
            </div>
          </div>
        </div>
        <div class="py-3">
          <div class="d-flex justify-content-center mb-2">
            <p
              class="subarea_reg font-weight-bold text-secondary text-center py-2 px-3 position-absolute mt-n3 bg-white rounded_1">
              Datos de noticia</p>
          </div>
          <div class="subarea_reg rounded_1 pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row d-flex justify-content-center">
              <div class="form-group col-lg-12">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control rounded_1" placeholder="Ingrese Título"
                  value="{{$noticias->nws_title}}" required>
                <div class="invalid-feedback">Ingrese Título</div>
                <div class="valid-feedback">Título ingresado</div>
              </div>
              <div class="form-group col-lg-12">
                <label for="nws_type">Seleccionar categoría</label>
                <select name="nws_type" class="form-control rounded_1" required>
                  <option value="" selected="true" disabled="disabled">Seleccione</option>
                  @if(session('autenticacion')->usr_type_id == 2)
                  <option <?php if($noticias->nws_id_nwst =='1') echo "selected";  ?> value="1">Noticias locales
                    @else
                  <option <?php if($noticias->nws_id_nwst =='2') echo "selected";  ?> value="2">Noticias Nacionales
                  </option>
                  <option <?php if($noticias->nws_id_nwst =='3') echo "selected";  ?> value="3">Noticias del Mundo
                  </option>
                  <option <?php if($noticias->nws_id_nwst =='4') echo "selected";  ?> value="4">Fake News
                  </option>
                  <option <?php if($noticias->nws_id_nwst =='5') echo "selected";  ?> value="5">Comunicados oficiales
                  </option>
                  @endif
                </select>
                <div class="invalid-feedback">Seleccione categoría</div>
                <div class="valid-feedback">Categoría seleccionada</div>
              </div>
              <div class="form-group col-lg-12">
                <label for="description">Descripción</label>
                <textarea class="form-control form-control_textarea_md rounded_1" name="description" id="description"
                  maxlength="200" placeholder="Ingrese descripción" required>{{$noticias->nws_desc}}</textarea>
                <div class="invalid-feedback">Ingrese descripción</div>
                <div class="valid-feedback">Descripción ingresada</div>
              </div>
              <div class="form-group col-lg-6">
                <label for="image">Imagen</label>
                <input type="file" class="form-control-file" name="nws_image" id="" required>
                <div class="invalid-feedback">Seleccione imagen</div>
                <div class="valid-feedback">Imagen seleccionada</div>
                <div class="d-flex justify-content-center pt-3">
                  <img src="http://34.226.78.219:8080/api_covid19/public/api/img/{{$noticias->nws_img}}"
                    class="card-img-top rounded_t_1 img_reg" alt="img-news">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="py-3">
          <div class="d-flex justify-content-center mb-2">
            <p
              class="subarea_reg font-weight-bold text-secondary text-center py-2 px-3 position-absolute mt-n3 bg-white rounded_1">
              Datos de publicación</p>
          </div>
          <div class="subarea_reg rounded_1 pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row">
              <div class="form-group col-lg-6">
                <label for="nws_date ">Fecha</label>
                <input type="date" name="nws_date" id="nws_date" class="form-control rounded_1">
                <div class="invalid-feedback">Seleccione la fecha</div>
                <div class="valid-feedback">Fecha seleccionada</div>
              </div>
              <div class="form-group col-lg-6">
                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora" class="form-control rounded_1">
                <div class="invalid-feedback">Seleccione la hora</div>
                <div class="valid-feedback">Hora seleccionada</div>
              </div>
            </div>
          </div>
        </div>
        <div class="py-3">
          <div class="d-flex justify-content-center mb-2">
            <p
              class="subarea_reg font-weight-bold text-secondary text-center py-2 px-3 position-absolute mt-n3 bg-white rounded_1">
              Datos de fuente</p>
          </div>
          <div class="subarea_reg rounded_1 pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row">
              <div class="form-group col-lg-6">
                <label for="source">Nombre</label>
                <input type="text" name="source" id="source" class="form-control rounded_1"
                  placeholder="Ingrese nombre de fuente" value="{{$noticias->nws_source}}" required>
                <div class="invalid-feedback">Ingrese nombre de fuente</div>
                <div class="valid-feedback">Nombre de fuente ingresado</div>
              </div>
              <div class="form-group col-lg-6">
                <label for="url">Dirección web</label>
                <input type="url" name="url" id="url" maxlength="200" class="form-control rounded_1"
                  placeholder="Ingrese dirección web" value="{{$noticias->nws_url}}" required>
                <div class="invalid-feedback">Ingrese dirección web</div>
                <div class="valid-feedback">Dirección web ingresada</div>
              </div>
            </div>
          </div>
          <div class="d-none">
            <input type="text" id="id" name='id' value="{{request()->route('id')}}">
            <input type="text" id="tipo" name='tipo' value="{{request()->route('tipo')}}">
          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-lg-4 d-flex">
            <a name="" id="" class="btn btn_circl_outl_p rounded-circle mr-2" @if(\Request::is('*/locales'))
              href="{{route('noticias', ['seccion'=> "locales"])}}" @elseif(\Request::is('*/nacionales'))
              href="{{route('noticias', ['seccion'=> "nacionales"])}}" @elseif(\Request::is('*/oficiales'))
              href="{{route('noticias', ['seccion'=> "oficiales"])}}" @elseif(\Request::is('*/fake'))
              href="{{route('noticias', ['seccion'=> "fake"])}}" @elseif(\Request::is('*/mundo'))
              href="{{route('noticias', ['seccion'=> "mundo"])}}" @endif role="button"><i class="fas fa-times"></i></a>
            <button class="btn btn_grad_reg col rounded-pill" type="submit">Registrar<i
                class="fas fa-angle-double-right ml-2"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{asset('js/script.js')}}"></script>
@endsection