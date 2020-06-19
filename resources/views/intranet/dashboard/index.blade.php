@extends('intranet.template.base')
@section('title', 'Dashboard')
@section('breadcrumb')
    <li>Panel Principal</li>
@endsection

@section('content')
    @include('intranet.template.components._alerts')

    <div class="row">
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-body py-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-0">
                                <input type="text"
                                       class="form-control input-lg"
                                       name="current_task_name"
                                       id="current_task_name"
                                       placeholder="¿Que estás haciendo?">
                                <div class="input-group-btn">
                                    <button class="btn btn-link btn-lg font-13" type="button" style="box-shadow:none;">
                                        <i class="ti-plus"></i> Agregar Proyecto
                                    </button>
                                    <button class="btn btn-success btn-lg font-13" type="button">
                                        <i class="ti-control-play"></i> INICIAR
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-body py-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group text-center">
                                <div id="current_task_timer" class="bold font-30 text-black my-0"
                                     style="margin-top: 2px;">
                                    00:00:00
                                </div>
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-lg"
                                            style="border-bottom-left-radius: 2px; border-top-left-radius: 2px;">
                                        <i class="ti-control-pause"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-hover-danger btn-lg">
                                        <i class="ti-control-stop"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="tttable-responsive">
                            <table id="table-bs"
                                   class="table table-borderless"
                                   data-toggle="table"
                                   data-toolbar="#toolbar"
                                   data-cookie="true"
                                   {{--                                   data-cookie-id-table=""--}}
                                   data-search="true"
                                   data-show-refresh="false"
                                   data-show-toggle="false"
                                   data-show-columns="true"
                                   data-show-export="false"
                                   data-sort-name="id"
                                   data-page-list="[5, 10, 20]"
                                   data-page-size="10"
                                   data-pagination="true"
                                   data-show-pagination-switch="true">
                                <thead>
                                <tr>
                                    <th>Tarea</th>
                                    <th>Projecto</th>
                                    <th>Estado</th>
                                    <th>Tipo</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="semi-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                        <span class="d-block font-10 text-black-50">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam assumenda, fugiat inventore ipsa ipsam itaque molestias neque nisi voluptate. Accusantium aut earum expedita molestias nesciunt nisi odio, suscipit totam.
                                        </span>
                                    </td>
                                    <td style="white-space: nowrap; width: max-content;">
                                        <a href="#" class="btn-link">&bullet; Project Name</a>
                                    </td>
                                    <td>
                                        <div class="label label-table label-success" style="min-width: 120px"><i
                                                class="ti-check"></i> Estado
                                        </div>
                                    </td>
                                    <td>
                                        <div class="label label-table label-info" style="min-width: 120px"><i
                                                class="ti-vector"></i> Task Type
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 80px">
                                            <input type="text" class="form-control" value="00:00:00">
                                        </div>
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <div style="width: max-content;">
                                            {{--                                            <button type="button" class="btn btn-default btn-hover-success">--}}
                                            {{--                                                <i class="ti-control-play"></i>--}}
                                            {{--                                            </button>--}}
                                            <button type="button" class="btn btn-info" title="Pausar Tarea">
                                                <i class="ti-control-pause"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" title="Detener Tarea">
                                                <i class="ti-control-stop"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <div class="dropdown" style="width: max-content;">
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown" title="Más opciones"
                                                    style="box-shadow: none;">
                                                <i class="ti-more"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="ti-files"></i> Duplicar</a></li>
                                                <li><a href="#"><i class="ti-close"></i> Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="semi-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                        <span class="d-block font-10 text-black-50">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam assumenda, fugiat inventore ipsa ipsam itaque molestias neque nisi voluptate. Accusantium aut earum expedita molestias nesciunt nisi odio, suscipit totam.
                                        </span>
                                    </td>
                                    <td style="white-space: nowrap; width: max-content;">
                                        <a href="#" class="btn-link">&bullet; Project Name</a>
                                    </td>
                                    <td>
                                        <div class="label label-table label-success" style="min-width: 120px"><i
                                                class="ti-check"></i> Estado
                                        </div>
                                    </td>
                                    <td>
                                        <div class="label label-table label-info" style="min-width: 120px"><i
                                                class="ti-vector"></i> Task Type
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 80px">
                                            <input type="text" class="form-control" value="00:00:00">
                                        </div>
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <div style="width: max-content;">
                                            <button type="button" class="btn btn-success"
                                                    title="Reanudas o Iniciar Tarea">
                                                <i class="ti-control-play"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <div class="dropdown" style="width: max-content;">
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown" title="Más opciones"
                                                    style="box-shadow: none;">
                                                <i class="ti-more"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="ti-files"></i> Duplicar</a></li>
                                                <li><a href="#"><i class="ti-close"></i> Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('styles')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" rel="stylesheet">


@endsection

@section('scripts')
    <script src="/themes/intranet/plugins/air_datepicker/datepicker.min.js"></script>
    <script src="/themes/intranet/plugins/air_datepicker/i18n/datepicker.es.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

    <script>
        $(document).ready(() => {
            $('#table-bs').on('show.bs.dropdown', function () {
                $('.fixed-table-body').css('overflow', 'inherit');
            });

            $('#table-bs ').on('hidden.bs.dropdown', function () {
                setTimeout(function () {
                    $('.fixed-table-body').css('overflow', 'auto');
                }, 300);
            })
        })
    </script>
@endsection
