<div aria-labelledby="companiesTab"
class="tab-pane fade @if($seccion == 'companies') show active @endif" id="Companies"
role="tabpanel">
@if(session('autenticacion')->usr_type_id == 2)
<div class="position-fixed mb-1 z_i_1">
    <a name="" id="" class="btn btn_circl_outl_p rounded-circle" href="{{route('regCompanies')}}"
        role="button" title="Nuevo"><i class="fas fa-plus"></i></a>
</div>
@endif
<div class="container col-12">
    <h3 class="text_p txt_c font-weight-bold my-4 text-center">
        ¡ASOCIADOS!
    </h3>
    <ul class="nav justify-content-center row" id="pills-tab" role="tablist">
        <li class="nav-item col-lg-2 col-md-2 col-sm-4 text-center">
            <a class="active" id="pills-category1-tab" data-toggle="pill" href="#pills-category1"
                role="tab" aria-controls="pills-category1" aria-selected="true">
                <img src="{{asset('images/img_default.png')}}" id="item_dad_1"
                    class="img-fluid rounded_1   " alt="">
                <p class="btn btn-custom__cancel border border-light text-white rounded-pill"
                    id="item_start_blur_dad_1">HOSPITAL</p>
            </a>
        </li>
        <li class="nav-item col-lg-2 col-md-2 col-sm-4 text-center">
            <a class="" id="pills-category2-tab" data-toggle="pill" href="#pills-category2"
                role="tab" aria-controls="pills-category2" aria-selected="false">
                <img src="{{asset('images/img_default.png')}}" id="item_dad_2"
                    class="img-fluid rounded_1   " alt="">
                <p class="btn btn-custom__cancel border border-light text-white rounded-pill"
                    id="item_start_blur_dad_2">COMISARÍA</p>
            </a>
        </li>
        <li class="nav-item col-lg-2 col-md-2 col-sm-4 text-center">
            <a class="" id="pills-category3-tab" data-toggle="pill" href="#pills-category3"
                role="tab" aria-controls="pills-category3" aria-selected="false">
                <img src="{{asset('images/img_default.png')}}" id="item_dad_3"
                    class="img-fluid rounded_1   " alt="">
                <p class="btn btn-custom__cancel border border-light text-white rounded-pill"
                    id="item_start_blur_dad_3">CEM</p>
            </a>
        </li>
        <li class="nav-item col-lg-2 col-md-2 col-sm-4 text-center">
            <a class="" id="pills-category4-tab" data-toggle="pill" href="#pills-category4"
                role="tab" aria-controls="pills-category4" aria-selected="false">
                <img src="{{asset('images/img_default.png')}}" id="item_dad_3"
                    class="img-fluid rounded_1   " alt="">

                <p class="btn btn-custom__cancel border border-light text-white rounded-pill"
                    id="item_start_blur_dad_3">MERCADOS</p>

            </a>
        </li>
        <li class="nav-item col-lg-2 col-md-2 col-sm-4 text-center">
            <a class="" id="pills-category5-tab" data-toggle="pill" href="#pills-category5"
                role="tab" aria-controls="pills-category5" aria-selected="false">
                <img src="{{asset('images/img_default.png')}}" id="item_dad_3"
                    class="img-fluid rounded_1   " alt="">
                <p class="btn btn-custom__cancel border border-light text-white rounded-pill"
                    id="item_start_blur_dad_3">RESTAURANTES</p>
            </a>
        </li>
    </ul>
    {{-- ELEMENTOS --}}
    {{-- PRIMERA CATEGORIA --}}
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-category1" role="tabpanel"
            aria-labelledby="pills-category1-tab">
            <div class="d-flex align-items-center mt-2 mb-4">
                <hr class="col bg-custom-primary">
                <p
                    class="  font-weight-bold   text-center rounded-lg py-1 py-sm-2 px-2 px-sm-4 m-0">
                    HOSPITAL</p>
                <hr class="col bg-custom-primary">
            </div>
            <div class="row justify-content-center">
                @forelse ($companies1 as $companies)
                <div class="col-md-4 col-sm-5 col-lg-3">
                    <div class="card     rounded_1 mb-3  ">
                        <div class="inner-img rounded_1">
                            <a name="" id="" class="" href="{{$companies->cmp_url}}" target="_blank"
                                role="button">
                                <img {{-- src="http://3.231.42.58:8080/apiCacaoApp/public/api/v1/imageCompanie/{{$companies->cmp_img}}"
                                    --}} src="{{asset('images/img_default.png')}}"
                                    class="img-fluid rounded_1  ">
                            </a>
                        </div>
                        {{-- @if(session('autenticacion')->usr_type_id == 1) --}}
                        <div class="rounded_1 text-center">
                            <a name="" id="" class="btn  mx-1"
                                href="{{route('editCompanies', $companies->id)}}" role="button"
                                title="Editar"><i class="fas fa-pen"></i></a>
                            <a name="" id="" class="btn  mx-1"
                                href="{{route('deleteCompanies', $companies->id)}}" role="button"
                                title="Eliminar"><i class="fas fa-times"></i></a>
                            <a name="" id="" class="btn  mx-1"
                                href="{{route('banCompanies', $companies->id)}}" role="button"
                                title="@if($companies->cmp_state == 1) Bloquear @else Desbloquear @endif">
                                <i class="fas @if($companies->cmp_state==1) fa-ban @else fa-check @endif"
                                    style="color: @if($companies->cmp_state==1)red @else green @endif"></i></a>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
                @empty
                <p>No existen elementos para mostrar.</p>
                @endforelse
            </div>
        </div>
        {{-- SEGUNDA CATEGORIA --}}
        <div class="tab-pane" id="pills-category2" role="tabpanel"
            aria-labelledby="pills-category2-tab">
            <div class="d-flex align-items-center mt-2 mb-4">
                <hr class="col bg-custom-primary">
                <p
                    class="  font-weight-bold   text-center rounded-lg py-1 py-sm-2 px-2 px-sm-4 m-0">
                    COMISARÍA</p>
                <hr class="col bg-custom-primary">
            </div>
            <div class="row justify-content-center">
                @forelse ($companies2 as $companies)
                <div class="col-md-4 col-sm-5 col-lg-3">
                    <div class="card     rounded_1 mb-3  ">
                        <div class="inner-img rounded_1">
                            <a name="" id="" class="" href="{{$companies->cmp_url}}" target="_blank"
                                role="button">
                                <img {{-- src="http://3.231.42.58:8080/apiCacaoApp/public/api/v1/imageCompanie/{{$companies->cmp_img}}"
                                    --}} src="{{asset('images/img_default.png')}}"
                                    class="img-fluid rounded_1  ">
                            </a>
                        </div>
                        {{-- @if(session('autenticacion')->usr_type_id == 1) --}}
                        <div class="rounded_1 text-center">
                            <a name="" id="" class="btn  mx-1"
                                href="{{route('editCompanies', $companies->id)}}" role="button"
                                title="Editar"><i class="fas fa-pen"></i></a>
                            <a name="" id="" class="btn  mx-1"
                                href="{{route('deleteCompanies', $companies->id)}}" role="button"
                                title="Eliminar"><i class="fas fa-times"></i></a>
                            <a name="" id="" class="btn  mx-1"
                                href="{{route('banCompanies', $companies->id)}}" role="button"
                                title="@if($companies->cmp_state == 1) Bloquear @else Desbloquear @endif">
                                <i class="fas @if($companies->cmp_state==1) fa-ban @else fa-check @endif"
                                    style="color: @if($companies->cmp_state==1)red @else green @endif"></i></a>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
                @empty
                <p>No existen elementos para mostrar.</p>
                @endforelse
            </div>
        </div>
        {{-- TERCERA CATEGORÍA --}}
        <div class="tab-pane" id="pills-category3" role="tabpanel"
            aria-labelledby="pills-category3-tab">
            <div class="d-flex align-items-center mt-2 mb-4">
                <hr class="col bg-custom-primary">
                <p
                    class="  font-weight-bold   text-center rounded-lg py-1 py-sm-2 px-2 px-sm-4 m-0">
                    CEM</p>
                <hr class="col bg-custom-primary">
            </div>
            <div class="row justify-content-center">
                @forelse ($companies3 as $companies)
                <div class="col-md-4 col-sm-5 col-lg-3">
                    <div class="card     rounded_1 mb-3  ">
                        <div class="inner-img rounded_1">
                            <a name="" id="" class="" href="{{$companies->cmp_url}}" target="_blank"
                                role="button">
                                <img {{-- src="http://3.231.42.58:8080/apiCacaoApp/public/api/v1/imageCompanie/{{$companies->cmp_img}}"
                                    --}} src="{{asset('images/img_default.png')}}"
                                    class="img-fluid rounded_1  ">
                            </a>
                        </div>
                        {{-- @if(session('autenticacion')->usr_type_id == 1) --}}
                        <div class="rounded_1 text-center">
                            <a name="" id="" class="btn  mx-1"
                                href="{{route('editCompanies', $companies->id)}}" role="button"
                                title="Editar"><i class="fas fa-pen"></i></a>
                            <a name="" id="" class="btn  mx-1"
                                href="{{route('deleteCompanies', $companies->id)}}" role="button"
                                title="Eliminar"><i class="fas fa-times"></i></a>
                            <a name="" id="" class="btn  mx-1"
                                href="{{route('banCompanies', $companies->id)}}" role="button"
                                title="@if($companies->cmp_state == 1) Bloquear @else Desbloquear @endif">
                                <i class="fas @if($companies->cmp_state==1) fa-ban @else fa-check @endif"
                                    style="color: @if($companies->cmp_state==1)red @else green @endif"></i></a>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
                @empty
                <p>No existen elementos para mostrar.</p>
                @endforelse
            </div>
        </div>
        {{-- CUARTA --}}
        <div class="tab-pane" id="pills-category4" role="tabpanel"
            aria-labelledby="pills-category4-tab">
            <div class="d-flex align-items-center mt-2 mb-4">
                <hr class="col bg-custom-primary">
                <p
                    class="  font-weight-bold   text-center rounded-lg py-1 py-sm-2 px-2 px-sm-4 m-0">
                    MERCADOS</p>
                <hr class="col bg-custom-primary">
            </div>
            <div class="row justify-content-center">
                @forelse ($companies4 as $companies)
                <div class="col-md-4 col-sm-5 col-lg-3">
                    <div class="card     rounded_1 mb-3">
                        <div class="inner-img rounded_1">
                            <a name="" id="" class="" href="{{$companies->cmp_url}}" target="_blank"
                                role="button">
                                <img {{-- src="http://3.231.42.58:8080/apiCacaoApp/public/api/v1/imageCompanie/{{$companies->cmp_img}}"
                                    --}} src="{{asset('images/img_default.png')}}"
                                    class="img-fluid rounded_1">
                            </a>
                        </div>
                        {{-- @if(session('autenticacion')->usr_type_id == 1) --}}

                        <div class="rounded_1 text-center">
                            <div>
                                @if($companies->cmp_facebook != null)
                                <a name="" id="" class="btn mx-1"
                                    href="{{$companies->cmp_facebook}}" role="button"
                                    title="facebook"><i class="fab fa-facebook"></i></a>
                                @endif
                                @if($companies->cmp_instagram !=null)
                                <a name="" id="" class="btn  mx-1"
                                    href="{{$companies->cmp_instagram}}" role="button"
                                    title="Instagram"><i class="fab fa-instagram"></i></a>
                                @endif
                            </div>
                            <div>
                                <a name="" id="" class="btn mx-1"
                                    href="{{route('editCompanies', $companies->id)}}" role="button"
                                    title="Editar"><i class="fas fa-pen"></i></a>
                                <a name="" id="" class="btn  mx-1"
                                    href="{{route('deleteCompanies', $companies->id)}}"
                                    role="button" title="Eliminar"><i class="fas fa-times"></i></a>
                                <a name="" id="" class="btn  mx-1"
                                    href="{{route('banCompanies', $companies->id)}}" role="button"
                                    title="@if($companies->cmp_state == 1) Bloquear @else Desbloquear @endif">
                                    <i class="fas @if($companies->cmp_state==1) fa-ban @else fa-check @endif"
                                        style="color: @if($companies->cmp_state==1)red @else green @endif"></i></a>
                            </div>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
                @empty
                <p>No existen elementos para mostrar.</p>
                @endforelse
            </div>
        </div>
        {{-- QUINTA --}}
        <div class="tab-pane" id="pills-category5" role="tabpanel"
            aria-labelledby="pills-category5-tab">
            <div class="d-flex align-items-center mt-2 mb-4">
                <hr class="col bg-custom-primary">
                <p
                    class="  font-weight-bold   text-center rounded-lg py-1 py-sm-2 px-2 px-sm-4 m-0">
                    RESTAURANTES</p>
                <hr class="col bg-custom-primary">
            </div>
            <div class="row justify-content-center">
                @forelse ($companies5 as $companies)
                <div class="col-md-4 col-sm-5 col-lg-3">
                    <div class="card rounded_1 mb-3  ">
                        <div class="inner-img rounded_1">
                            <a name="" id="" class="" href="{{$companies->cmp_url}}" target="_blank"
                                role="button">
                                <img {{-- src="http://3.231.42.58:8080/apiCacaoApp/public/api/v1/imageCompanie/{{$companies->cmp_img}}"
                                    --}} src="{{asset('images/img_default.png')}}"
                                    class="img-fluid rounded_1  ">
                            </a>
                        </div>
                        {{-- @if(session('autenticacion')->usr_type_id == 1) --}}

                        <div class="rounded_1 text-center">
                            <a name="" id="" class="btn  mx-1"
                                href="{{route('editCompanies', $companies->id)}}" role="button"
                                title="Editar"><i class="fas fa-pen"></i></a>
                            <a name="" id="" class="btn  mx-1"
                                href="{{route('deleteCompanies', $companies->id)}}" role="button"
                                title="Eliminar"><i class="fas fa-times"></i></a>
                            <a name="" id="" class="btn  mx-1"
                                href="{{route('banCompanies', $companies->id)}}" role="button"
                                title="@if($companies->cmp_state == 1) Bloquear @else Desbloquear @endif">
                                <i class="fas @if($companies->cmp_state==1) fa-ban @else fa-check @endif"
                                    style="color: @if($companies->cmp_state==1)red @else green @endif"></i></a>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
                @empty
                <p>No existen elementos para mostrar.</p>
                @endforelse
            </div>
        </div>
        {{-- END --}}
    </div>
</div>
</div>
