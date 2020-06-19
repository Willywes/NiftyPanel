@extends('intranet.template.base')
@section('title', 'Editar perfil')

@section('breadcrumb')
    <li><a href="{{ route("intranet.profile.edit") }}" class="active">Editar perfil</a></li>
@endsection

@section('toolbar-buttons')
    <a href="{{route('intranet.dashboard')}}" class="btn btn-default"><i
            class="fa fa-chevron-left"></i> Atrás</a>
    <button class="btn btn-primary" type="button" onclick="doSubmit('form-create')"><i
            class="fa fa-save"></i> Guardar
    </button>
@endsection

@section('content')

    <form id="form-create" action="{{ route("intranet.profile.update") }}" enctype="multipart/form-data"
          method="POST">
        <button type="submit" class="hide"></button>
        @csrf()
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel">
                    <div class="panel-body">
                        @include('intranet.template.components._alerts')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group" id="group-error-imagen">
                                    <label for="avatar">Foto de perfil</label>
                                    <div class="image-product">
                                        <img id="image-product" src="{{ $user->photo ? Storage::url($user->photo) : '/themes/intranet/img/user-default.png'}}">
                                    </div>
                                    <input type="file" name="imagen" id="file-image-product"
                                           class="inputfile" accept="image/x-png,image/gif,image/jpeg"/>
                                    <label for="file-image-product">Seleccione una imagen</label>
                                    <span class="help-block" id="label-error-image"></span>
                                    <div class="link-del" onclick="deleteImg();"></div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="first_name">Nombres (*)</label>
                                            <input type="text" id="first_name" name="first_name" class="form-control"
                                                   required
                                                   value="{{ old('first_name')  ?? $user->first_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Apellido Paterno (*)</label>
                                            <input type="text" id="last_name" name="last_name" class="form-control"
                                                   required
                                                   value="{{ old('last_name') ?? $user->last_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Apellido Materno (*)</label>
                                            <input type="text" id="second_last_name" name="second_last_name"
                                                   class="form-control" required
                                                   value="{{ old('second_last_name') ?? $user->second_last_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email (*)</label>
                                            <input type="email" id="email" name="email" class="form-control" required
                                                   value="{{ old('email') ?? $user->email }} ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password" class="control-label">Contraseña (*)</label>
                                            <div class="input-group">
                                                <input id="password" name="password" class="form-control"
                                                       autocomplete="off"
                                                       value="{{ old('password') }}">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary btn-flat" type="button"
                                                            onclick="generatePassword()">
                                                        <i class="fa fa-key"></i> Generar
                                                    </button>
                                                </div>
                                            </div>
                                            <span class="help-block">Si no desea cambiar su contraseña, deje este campo en blanco.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="{{ route("intranet.dashboard") }}" class="btn btn-default"><i
                                        class="fa fa-chevron-left"></i> Atrás</a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <button class="btn btn-primary" type="submit"><i
                                        class="fa fa-save"></i> Guardar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('styles')
    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="/themes/intranet/plugins/select2/css/select2.min.css" rel="stylesheet">
    <style>
        .image-product {
            width: 100%;
            height: 235px;
            border: 1px solid #c5c5c5;
            padding: 5px;
            margin-bottom: 10px;
            display: flex;
            background: #f5f5f5;
        }

        a.cke_dialog_ui_button_ok {
            color: #fff;
            background-color: rgb(27, 126, 224);
            border-color: rgb(25, 118, 210);
        }

        .image-product img {
            width: 100%;
            object-fit: cover;
        }

        .image-product:after {
            content: "";
            display: block;
            padding-bottom: 100%;
        }

        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .inputfile + label {
            font-size: 1.25em;
            font-weight: 700;
            color: white !important;
            width: 100%;
            background-color: rgb(27, 126, 224);
            border-color: #126002;
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
        }

        .inputfile:focus + label,
        .inputfile + label:hover {
            background-color: rgb(27, 126, 224);
            border-color: rgb(27, 126, 224);
        }

        .link-del {
            text-align: center;
            color: rgb(27, 126, 224);;
            margin-top: 5px;
            cursor: pointer;
        }
    </style>
@endsection

@section('scripts')
    <script src="/themes/intranet/plugins/select2/js/select2.min.js"></script>
    <script src="/themes/intranet/plugins/rut/jquery.rut.js"></script>

    <script>

        /* password generator */
        function generatePassword() {
            var pass = Math.random().toString(36).substring(2);
            $('#password').val(pass);
        }
    </script>

    <script>
        function checkKey(name) {
            var clean = $('#' + name).val().replace(/[^0-9kK]/g, "");
            // don't move cursor to end if no change
            if (clean !== $('#' + name).val()) $('#' + name).val(clean);
        }
    </script>

    <script>
        $(function () {
            $("input#rut").rut({
                formatOn: 'keyup',
                validateOn: 'change' // si no se quiere validar, pasar null
            }).on('rutInvalido', function () {
                alert("El rut " + $(this).val() + " es inválido");
                $(this).parents(".form-group").addClass("has-error");
                $(this).val("");
            }).on('rutValido', function () {
                $(this).parents(".form-group").removeClass("has-error")
            });


            $('.image-product').css('height', $('.image-product').innerWidth())
        });
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-product').attr('src', e.target.result);
                    $('.link-del').html($('<i class="fa fa-trash"></i> <span>Eliminar</span>'));
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file-image-product").change(function () {
            readURL(this);
        });

        function deleteImg() {
            $('#image-product').attr('src', '/img/user-default.png');
            $('.link-del').html('');
            $("#file-image-product").val('');
        }

    </script>
@endsection
