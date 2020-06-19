@extends('intranet.template.base')
@section('title', $config['blade']['viewTitle'])

@if ($config['blade']['showBreadcrumb'])
@section('breadcrumb')
    @foreach($config['breadcrumb'] as $key => $data)
        <li><a href="{{ $data['link'] }}"
               class="{{ count($config['breadcrumb']) == $key + 1 ? 'active' : '' }}">{{ $data['name'] }}</a></li>
    @endforeach
@endsection
@endif

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                {{--<div class="panel-heading">--}}
                {{--<h3 class="panel-title"></h3>--}}
                {{--</div>--}}
                <div class="panel-body">

                    <div id="toolbar">
                        @if($config['action']['create'])
                            <a href="{{ route($config['route'] . 'create') }}" class="btn btn-success"><i
                                    class="ti-plus"></i> {{$config['blade']['btnNew']}}</a>
                        @endif

                        @if($config['action']['active'])
                            <button type="submit" id="status" class="btn btn-success"
                                    style="margin-left: 10px">{!! $name_button !!}</button>
                        @endif

                        {{--<button id="delete-row" class="btn btn-danger" disabled><i class="demo-pli-cross"></i> Delete</button>--}}
                    </div>

                    <table id="table-bs"
                           data-toolbar="#toolbar"
                           data-cookie="true"
                           data-cookie-id-table="{{$config['tableCookie']}}"
                           data-search="true"
                           data-show-refresh="false"
                           data-show-export="false"
                           data-show-toggle="false"
                           data-show-columns="true"
                           data-sort-name="id"
                           data-page-list="[5, 10, 20]"
                           data-page-size="10"
                           data-pagination="true"
                           data-show-pagination-switch="true">
                    </table>

                    <form id="form-all-change" method="POST" action="{{ route('intranet.users.all_change') }}">
                        @csrf()
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

            let columns = [
                {{--{--}}
                {{--    title: 'Foto',--}}
                {{--    field: 'image',--}}
                {{--    sortable: false,--}}
                {{--    cellStyle : cellStyle,--}}
                {{--    formatter : function (value, row, index){--}}
                {{--        console.log(row);--}}
                {{--        let img = '{{ Storage::url('public/perfil/:id.jpg') }}';--}}
                {{--        img = img.replace (':id', row.id);--}}
                {{--        return '<img class="img-circle img-md" id="image-product" src="' + img + '">';--}}
                {{--    }--}}
                {{--},--}}
                // {
                //     title: 'id',
                //     field: 'id',
                //     sortable: true,
                //     cellStyle : cellStyle,
                // },
                {
                    title: 'Nombre Completo',
                    field: 'full_name',
                    sortable: true,
                    cellStyle: midAling,
                },
                {
                    title: 'Email',
                    field: 'email',
                    sortable: true,
                    cellStyle: midAling,
                },
                {
                    title: 'Roles',
                    field: 'roles',
                    sortable: true,
                    cellStyle: midAling,
                    formatter: function (value, row, index) {
                        let roles = '';
                        if (row.roles.length) {
                            row.roles.forEach(function (role, index) {
                                let coma = (index + 1 === row.roles.length ? ' ' : ', ');
                                roles += role.name + coma;
                            });
                        } else {
                            roles = '<div class="label label-table label-danger">SIN ROL</div>';
                        }

                        return roles;
                    }
                },
                {
                    title: 'F. Registro',
                    field: 'created_at',
                    sortable: true,
                    formatter: function (value, row, index) {
                        return moment(row.created_at).format('DD-MM-YYYY HH:mm:ss');
                    }
                }
            ];

            @if($config['action']['changeStatus'])
            columns.push({
                title: 'Cambiar Estado',
                field: 'changeStatus',
                align: 'center',
                cellStyle: cellStyle,
                clickToSelect: false,
                formatter: function (value, row, index) {

                }
            });
            @endif

            @if($config['action']['active'])
            columns.push({
                title: 'Activo',
                field: 'active',
                align: 'center',
                cellStyle: cellStyle,
                clickToSelect: false,
                formatter: function (value, row, index) {
                    return getActiveButton(row.id, row.active);
                }
            });
            @endif

            @if($config['blade']['showActions'] and $config['any_action'])

            columns.push({
                title: 'Acciones',
                field: 'active',
                align: 'center',
                cellStyle: cellStyle,
                clickToSelect: false,
                formatter: function (value, row, index) {
                    let append = '';
                    let prepend = '';
                        @if($config['action']['permissionsEdit'])
                    let url = '{{ route($config['route'] . 'permissionsEdit',['id' => ':id'] ) }}';
                    url = url.replace(':id', row.id);
                    prepend = '<a href="' + url + '" class="btn btn-sm btn-default btn-hover-info add-tooltip" title="Permisos del usuario"><i class="fa fa-lock"></i></a>';

                    @endif
                        return getShowActionButtons(row, prepend, append);

                }
            });

            @endif

            $('#table-bs').bootstrapTable({
                data: @json($objects),
                columns: columns,

            });

            runActiveControl()
        });
    </script>

    @include('intranet.template.components._crud_script_actions_buttons')
    @include('intranet.template.components._crud_script_active')
    @include('intranet.template.components._crud_script_change_status')
    @include('intranet.template.components._crud_script_delete')

    <script>
        $(document).ready(function () {
            $("#status").click(function () {
                $("#form-all-change").submit();
            });
        });
    </script>

@endsection

