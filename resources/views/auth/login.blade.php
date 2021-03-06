<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ config('app.name') }}</title>

    <!-- Icono-->
    <link rel="icon" type="image/png" href={{ URL::asset('images/birrete.ico') }} />
    
    <!-- Bootstrap -->
    <link href={{ asset("css/bootstrap.min.css") }} rel="stylesheet">
    <!-- Font Awesome -->
    <link href={{ asset("css/font-awesome.min.css") }} rel="stylesheet">
    <!-- NProgress -->
    <link href={{ asset("css/nprogress.css") }} rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href={{ asset("css/custom.min.css") }} rel="stylesheet">

</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post" action={{ url('/login') }}>
                    {!! csrf_field() !!}
                    
                    <h1>Iniciar Sesión</h1>
                    <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-center center-block">
                            <input type="submit" class="btn btn-default submit" value="Entrar">
                            {{-- <a class="reset_pass" href={{  url('/password/reset') }}>¿Olvidó su contraseña?</a> --}}
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    <div class="separator">
                        <p class="change_link">¿No posee un usuario?
                            <a href="{{ url('/register') }}" class="to_register"> Crear Cuenta </a>
                        </p>
                        
                        <div class="clearfix"></div>
                        <br />
                        
                        <div>
                            <h1><i class="fa fa-graduation-cap"></i> Simoncito "Las Américas"</h1>
                            <p>©2017 Simoncito "Las Américas".</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>