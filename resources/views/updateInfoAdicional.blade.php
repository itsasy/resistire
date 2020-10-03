@extends('layouts.app')
@section ('title', 'Registrar información adicional')
@section('content')
<div class="container-fluid pt-5 bg_grad_h h_header">
  <div class="row">
    <div class="col d-flex flex-column align-items-center">
      <h4 class="text-center text-white text-uppercase mt-2 mb-4 ff_saira">REGISTRO DE INFORMACIÓN ADICIONAL
      </h4>
      <form action="{{route('saveUpdateInfo')}}" method="POST" enctype="multipart/form-data"
        class="col-lg-8 col-md-10 px-3 px-sm-4 pt-3 pt-sm-4 pb-1 mb-4 form_reg bg-white rounded_1 shadow needs-validation"
        novalidate>
        {{ csrf_field() }}
        <div class="py-3">
          <div class="d-flex justify-content-center mb-2">
            <p
              class="subarea_reg font-weight-bold text-secondary text-center py-2 px-3 position-absolute mt-n3 bg-white rounded_1">
              Datos de la publicación</p>
          </div>
          <div class="subarea_reg rounded_1 pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row d-flex justify-content-center">
              <div class="form-group col-lg-12">
                <label for="adi_title">Título</label>
                <input type="text" name="adi_title" id="adi_title" class="form-control rounded_1" value="{{$info->adi_title}}"
                  placeholder="Ingrese Título" required>
                <div class="invalid-feedback">Ingrese Título</div>
                <div class="valid-feedback">Título ingresado</div>
              </div>
              <div class="form-group col-lg-12">
                <label for="adi_id_adit">Categoría</label>
                <select name="adi_id_adit" class="form-control rounded-custom_1" required>
                  <option value="1">General</option>
                </select>
                <div class="invalid-feedback">Seleccione categoría</div>
                <div class="valid-feedback">Categoría seleccionada</div>
              </div>
              <div class="form-group col-lg-6">
                <label for="adi_date ">Fecha</label>
                <input type="date" name="adi_date" id="adi_date" class="form-control rounded-custom_1">
                <div class="invalid-feedback">Seleccione la fecha</div>
                <div class="valid-feedback">Fecha seleccionada</div>
              </div>
              <div class="form-group col-lg-6">
                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora" class="form-control rounded-custom_1">
                <div class="invalid-feedback">Seleccione la hora</div>
                <div class="valid-feedback">Hora seleccionada</div>
              </div>
              <div class="form-group col-lg-12">
                <label for="adi_desc">Descripción</label>
                <textarea class="form-control form-control_textarea_md rounded_1" name="adi_desc" id="adi_desc"
                  maxlength="200" placeholder="Ingrese descripción" required>{{$info->adi_desc}}</textarea>
                <div class="invalid-feedback">Ingrese descripción</div>
                <div class="valid-feedback">Descripción ingresada</div>
              </div>
              <div class="form-group col-lg-6">
                <label for="adi_img">Imagen</label>
                <input type="file" class="form-control-file" name="adi_img" id="img" required>
                <div class="invalid-feedback">Seleccione imagen</div>
                <div class="valid-feedback">Imagen seleccionada</div>
                <div class="d-flex justify-content-center pt-3">
                  <img src="http://34.226.78.219:8080/api_covid19/public/api/imageInfo/{{$info->adi_img}}" class="img-fluid rounded_1 img_reg shadow_light"
                    id="img_output_01" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="py-3">
          <div class="d-flex justify-content-center mb-2">
            <p
              class="subarea_reg font-weight-bold text-secondary text-center py-2 px-3 position-absolute mt-n3 bg-white rounded_1">
              Datos de la fuente</p>
          </div>
          <div class="subarea_reg rounded_1 pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row">
              <div class="form-group col-lg-6">
                <label for="adi_source">Nombre</label>
              <input type="text" name="adi_source" id="adi_source" class="form-control rounded_1" value="{{$info->adi_source}}"
                  placeholder="Ingrese nombre de la fuente" required>
                <div class="invalid-feedback">Ingrese nombre de fuente</div>
                <div class="valid-feedback">Nombre de fuente ingresado</div>
              </div>
              <div class="form-group col-lg-6">
                <label for="adi_url">Dirección web (opcional)</label>
                <input type="adi_url" name="adi_url" id="adi_url" class="form-control rounded_1" value="{{$info->adi_source}}"
                  placeholder="Ingrese la dirección web">
                <div class="invalid-feedback">Ingrese dirección web</div>
                <div class="valid-feedback">Dirección web ingresada</div>
              </div>
            </div>
          </div>
        </div>

        <div class="py-3">
          <div class="d-flex justify-content-center mb-2">
            <p
              class="subarea_reg font-weight-bold text-secondary text-center py-2 px-3 position-absolute mt-n3 bg-white rounded_1">
              Datos opcionales</p>
          </div>
          <div class="subarea_reg rounded_1 pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row">
              <div class="form-group col-lg-6">
                <label for="adi_youtube">Canal de YouTube</label>
                <input type="adi_youtube" name="adi_youtube" id="adi_youtube" class="form-control rounded_1" value="{{$info->adi_youtube}}"
                  placeholder="Ingrese la dirección de youtube">
                <div class="invalid-feedback">Ingrese la dirección de YouTube</div>
                <div class="valid-feedback">Dirección del canal ingresado</div>
              </div>
              <div class="form-group col-lg-6">
                <label for="adi_instagram">Instagram</label>
                <input type="adi_instagram" name="adi_instagram" id="adi_instagram" class="form-control rounded_1" value="{{$info->adi_instagram}}"
                  placeholder="Ingrese la dirección de Instagram">
                <div class="invalid-feedback">Ingrese dirección de Instagram</div>
                <div class="valid-feedback">Dirección de vídeo ingresado</div>
              </div>
              <div class="form-group col-lg-6">
                <label for="adi_facebook">Facebook</label>
                <input type="adi_facebook" name="adi_facebook" id="adi_facebook" class="form-control rounded_1" value="{{$info->adi_facebook}}"
                  placeholder="Ingrese la dirección de facebook">
                <div class="invalid-feedback">Ingrese dirección de Facebook</div>
                <div class="valid-feedback">Dirección de Facebook</div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-none">
          <input type="text" id="id" name='id' value="{{request()->route('id')}}">
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-lg-4 d-flex">
            <a name="" id="" class="btn btn_circl_outl_p rounded-circle mr-2"
              href="{{route('noticias', ['seccion'=> "adicional"])}}" role="button"><i class="fas fa-times"></i></a>
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