@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
   <style>

         /* .fondo{
            background: url('../images/fondo.png') no-repeat center center fixed;
            -webkit-background-size: 780px;
            -moz-background-size:780px;
            -o-background-size:780px;
            background-size:780px;
            } */

.fondo {
 background: url('../images/fondo.png') no-repeat center center fixed;
-webkit-background-size: 780px;
-moz-background-size:780px;
-o-background-size:780px;
background-size:780px;

}

             /* .login-box{
                 background: #ffffff;
                 color: #000000;
                 border-radius: 15px;
                border: 3px solid #00dddd;
             } */
             .login-box-body{
                background: #ffffff;
                color: #000000;
                border-radius: 15px;
            }
            /* .form-control{
                border-radius: 15px;
                border: 1px solid #00dddd;
            } */
        .boton {
        border: 1px solid #337ab7; /*anchura, estilo y color borde*/
        padding: 8px; /*espacio alrededor texto*/
        background-color: #337ab7; /*color botón*/
        color: #ffffff; /*color texto*/
        text-decoration: none; /*decoración texto*/
        text-transform: uppercase; /*capitalización texto*/
        border-radius: 50px; /*bordes redondos*/
        }
   </style>
    @yield('css')
@stop

@section('body_class', 'login-page')


@section('body')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>SiSaluDent</b>') !!}</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.login_message') }}</p>
            <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <i onclick="ShowPassword()" title="Mostrar/Ocultar" class="fa fa-eye form-control-feedback form-control-feedback-click" id="eye"></i>
                </div>
                <div class="row">
                    <!-- <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> {{ trans('adminlte::adminlte.remember_me') }}
                            </label>
                        </div>
                    </div> -->
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="boton">{{ trans('adminlte::adminlte.sign_in') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- <div class="auth-links">
                <a href="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}"
                   class="text-center">
                   {{ trans('adminlte::adminlte.i_forgot_my_password') }}
                </a>
                <br>
            </div> -->
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->

   @stop


@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });


        function ShowPassword() {
            var x = document.getElementById("Password");
            if (x.type === "password") {
                x.type = "text";

                x.focus();
            } else {
                x.type = "password";
                //$("#eye").title = "Mostrar contraseña";
                x.focus();
            }
        }

    </script>
    @yield('js')
@stop
