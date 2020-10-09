@extends('layouts.app')
@section ('title', 'Registrar punto de ayuda')
@section('content')
<div class="container-fluid pt-5 bg_grad_h h_header">
    {{-- <div class="position-fixed mb-1 z_i_1 ">
        <button type="button" class="btn btn_circl_outl_p rounded-circle" data-toggle="modal" data-target="#modal" title="Agregar Categoría">
            <i class="fas fa-plus"></i>
        </button>
    </div> --}}
    <div class="col d-flex flex-column align-items-center">
        <h4 class="text-center text-white text-uppercase mt-2 mb-4 ff_saira">REGISTRANDO SEGURIDAD ALIMENTARIA
        </h4>
        <form action="{{route('alimentos.store')}}" method="POST" enctype="multipart/form-data"
            class="col-lg-8 col-md-10 px-3 px-sm-4 pt-3 pt-sm-4 pb-1 mb-4 form_reg bg-white rounded_1 shadow needs-validation">
            {{ csrf_field() }}
            <div class="py-3">
                <div class="d-flex justify-content-center mb-2">
                    <p class="subarea_reg font-weight-bold text-secondary text-center py-2 px-3 position-absolute mt-n3 bg-white rounded_1">
                        Datos del Artículo</p>
                </div>
                <div class="subarea_reg rounded_1 pt-4 px-2 px-sm-3 pb-2 pb-sm-3">
                    <div class="form-row d-flex justify-content-center">
                        <div class="form-group col-lg-12">
                            <label for="fds_title">Título</label>
                            <input type="text" name="fds_title" id="fds_title" class="form-control rounded_1"
                                placeholder="Ingrese el nombre" required>
                            <div class="invalid-feedback">Ingrese el título</div>
                            <div class="valid-feedback">Título ingresado</div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="fds_desc">Descripción</label>
                            <input type="text" name="fds_desc" id="fds_desc" class="form-control rounded_1"
                                placeholder="Ingrese la descripción" required>
                            <div class="invalid-feedback">Ingrese la descripción</div>
                            <div class="valid-feedback">Descripción ingresada</div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="fds_id_fdst">Categoría</label>
                            <select name="fds_id_fdst" class="form-control rounded_1" required>
                                <option value="#" selected disabled>Seleccione</option>
                                @foreach ($types as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->fdst_desc}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Seleccione categoría</div>
                            <div class="valid-feedback">Categoría seleccionada</div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="fds_source">Fuente</label>
                            <input type="text" name="fds_source" id="fds_source" class="form-control rounded_1"
                                placeholder="Ingrese la fuente" required>
                            <div class="invalid-feedback">Ingrese la fuente</div>
                            <div class="valid-feedback">Fuente ingresada</div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="fds_url">Dirección web</label>
                            <input type="text" name="fds_url" id="fds_url" class="form-control rounded_1"
                                placeholder="Ingrese la dirección web" required>
                            <div class="invalid-feedback">Ingrese la dirección web</div>
                            <div class="valid-feedback">Dirección web ingresada</div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="fds_youtube">Youtube</label>
                            <input type="text" name="fds_youtube" id="fds_youtube" class="form-control rounded_1"
                                placeholder="Ingrese vídeo de youtube">
                            <div class="invalid-feedback">Ingrese la dirección del vídeo</div>
                            <div class="valid-feedback">Vídeo ingresado</div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="fds_instagram">Instagram</label>
                            <input type="text" name="fds_instagram" id="fds_instagram" class="form-control rounded_1"
                                placeholder="Ingrese vídeo de youtube">
                            <div class="invalid-feedback">Ingrese la dirección Instagram</div>
                            <div class="valid-feedback">Instagram ingresado</div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="fds_facebook">Facebook</label>
                            <input type="text" name="fds_facebook" id="fds_facebook" class="form-control rounded_1"
                                placeholder="Ingrese la dirección Facebook">
                            <div class="invalid-feedback">Ingrese la dirección Facebook</div>
                            <div class="valid-feedback">Facebook ingresado</div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="fds_date">Fecha</label>
                            <input type="date" name="fds_date" id="fds_date" class="form-control rounded_1"
                                placeholder="Ingrese la fecha">
                            <div class="invalid-feedback">Seleccione la fecha</div>
                            <div class="valid-feedback">Fecha ingresada</div>
                        </div>
                        <div class="form-group col-lg-6">
                        <label for="nws_image">Imagen</label>
                        <input type="file" class="form-control-file" name="fds_img" id="img" required>
                        <div class="invalid-feedback">Seleccione imagen</div>
                        <div class="valid-feedback">Imagen seleccionada</div>
                        <div class="d-flex justify-content-center pt-3">
                          <img src="{{asset('images/img_default.png')}}" class="img-fluid rounded_1 img_reg shadow_light"
                            id="img_output_01" alt="">
                        </div>
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

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear categoría</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fdst_desc">Nombre de categoría</label>
                        <input type="text" name="fdst_desc" id="fdst_desc" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{asset('js/script.js')}}"></script>
@endsection