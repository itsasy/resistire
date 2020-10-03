@extends('layouts.app')
@section ('title', 'Registrar punto de ayuda')
@section('content')
<div class="container-fluid pt-5 bg_grad_h h_header">
  <div class="row">
    <div class="col d-flex flex-column align-items-center">
      <h4 class="text-center text-white text-uppercase mt-2 mb-4 ff_saira">REGISTRO DE EMPRESA ASOCIADA
      </h4>
      <form action="{{route('saveCompanies')}}" method="POST" enctype="multipart/form-data"
        class="col-lg-8 col-md-10 px-3 px-sm-4 pt-3 pt-sm-4 pb-1 mb-4 form_reg bg-white rounded_1 shadow needs-validation"
        >
        {{ csrf_field() }}
        <div class="py-3">
          <div class="d-flex justify-content-center mb-2">
            <p
              class="subarea_reg font-weight-bold text-secondary text-center py-2 px-3 position-absolute mt-n3 bg-white rounded_1">
              Datos de la empresa</p>
          </div>
          <div class="subarea_reg rounded_1 pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
            <div class="form-row d-flex justify-content-center">
              <div class="form-group col-lg-12">
                <label for="cmp_name">Nombre</label>
                <input type="text" name="cmp_name" id="cmp_name" class="form-control rounded_1"
                  placeholder="Ingrese el nombre" required>
                <div class="invalid-feedback">Ingrese el nombre</div>
                <div class="valid-feedback">Nombre ingresado</div>
              </div>
              <div class="form-group col-lg-12">
                <label for="cmp_id_cmpt">Seleccionar categoría</label>
                <select name="cmp_id_cmpt" class="form-control rounded_1" required>
                  <option value="" selected="true" disabled="disabled">Seleccione</option>
                  <option value="1">Hospital</option>
                  <option value="2">Comisaria</option>
                  <option value="3">CEM</option>
                  <option value="4">Mercados</option>
                  <option value="5">Restaurantes</option>
                </select>
                <div class="invalid-feedback">Seleccione categoría</div>
                <div class="valid-feedback">Categoría seleccionada</div>
              </div>
              <div class="form-group col-lg-12">
                <label for="address_place">Dirección del lugar</label>
                <input type="text" name="address_place" id="address_place" class="form-control rounded_1"
                  placeholder="Ingrese la dirección" required>
                <div class="invalid-feedback">Ingrese la dirección</div>
                <div class="valid-feedback">Dirección</div>
              </div>
              <div class="form-group col-lg-6">
                <label for="img">Imagen</label>
                <input type="file" class="form-control-file" name="cmp_img" id="img" required>
                <div class="invalid-feedback">Seleccione imagen</div>
                <div class="valid-feedback">Imagen seleccionada</div>
                <div class="d-flex justify-content-center pt-3">
                  <img src="{{asset('images/img_default.png')}}" class="img-fluid rounded_1 img_reg shadow_light"
                    id="img_output_01" alt="">
                </div>
              </div>
            </div>
            {{--  --}}

            <div class="py-3 mb-2">
              <div class="d-flex justify-content-center mb-2">
                <p
                  class="subarea_reg font-weight-bold text-secondary text-center py-2 px-3 position-absolute mt-n3 bg-white rounded_1">
                  Información adicional u opcional</p>
              </div>
              <div class="subarea_reg rounded_1 pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="cmp_instagram">Instagram</label>
                    <input type="url" name="cmp_instagram" id="cmp_instagram" class="form-control rounded_1">
                    <div class="invalid-feedback">Dirección incorrecta</div>
                    <div class="valid-feedback">Dirección correcta</div>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="cmp_facebook">Facebook</label>
                    <input type="url" name="cmp_facebook" id="cmp_facebook" class="form-control rounded_1">
                    <div class="invalid-feedback">Dirección incorrecta</div>
                    <div class="valid-feedback">Dirección correcta</div>
                  </div>
                  <div class="form-group col-lg-6 ">
                    <label for="cmp_url">Página web</label>
                    <input type="url" name="cmp_url" id="cmp_url" class="form-control rounded_1">
                    <div class="invalid-feedback">Dirección incorrecta</div>
                    <div class="valid-feedback">Dirección correcta</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <p class="font-weight-bold text-secondary text-center py-2 px-3 mt-n3 bg-white rounded_1 text-center">
                  Seleccione la ubicación en el mapa</p>
                <div id="map" class="map_reg rounded_1 shadow"></div>
              </div>
            </div>

            <div class="d-none">
              <input type="text" name="latitude_place" id="latitude_place">
              <input type="text" name="length_place" id="length_place">
            </div>

          </div>
        </div>
        <div class="form-row justify-content-center">
          <div class="form-group col-lg-4 d-flex">
            <a name="" id="" class="btn btn_circl_outl_p rounded-circle mr-2"
          href="{{URL::previous()}}" role="button"><i class="fas fa-times"></i></a>
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

<script type="text/javascript" src="{{asset('js/pointsMap.js')}}"></script>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMpejtLKPvpLv1KbtzGXpRC0yvPqm-w8o&callback=iniciarMap">
</script>

@endsection
