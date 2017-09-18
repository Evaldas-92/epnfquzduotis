<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config('app.name', 'Laravel') }} @yield('title')</title>--}}
    <title>{{ config('app.name', 'Laravel') }} - redaguoti užsakymą</title>

    <!-- Styles -->
    <link rel="shortcut icon" href="{{{ asset('/images/favicon.ico') }}}">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nfq.css') }}" rel="stylesheet">
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous">
    </script>

</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" id="myNavBar">
    <div class="container">
        <div class="wrapper">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="/">
                    Pradžia
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Prisijungti</a></li>
                        @else
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Atsijungti
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="table-wrapper">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"><strong>Užsakymo duomenys</strong></h4>
                    <div class="pull-right">
                        <a data-toggle="tooltip" title="Atgal į sąrašą" class="btn btn-sm btn-default" href="{{url('uzsakymai') }}"><i class ="glyphicon glyphicon-chevron-left"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    {!! Form::model($uzsakymas, array('class' => 'form-horizontal', 'route' => array('uzsakymai.update', $uzsakymas->id), 'method' => 'PUT')) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="vardas" class="col-md-1 control-label">Vardas</label>
                            <div class="col-md-3">
                                {!! Form::text('vardas', null, array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                            <label for="pavarde" class="col-md-1 control-label">Pavardė</label>
                            <div class="col-md-3">
                                {!! Form::text('pavarde', null, array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                            <label for="telefonas" class="col-md-1 control-label">Telefonas</label>
                            <div class="col-md-3">
                                {!! Form::text('telefonas', null, array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="adresas" class="col-md-1 control-label">Adresas</label>
                            <div class="col-md-3">
                                {!! Form::text('adresas', null, array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                            <label for="miestas" class="col-md-1 control-label">Miestas</label>
                            <div class="col-md-3">
                                {!! Form::text('miestas', null, array('class' => 'form-control')) !!}
                            </div>
                            <label for="elpastas" class="col-md-1 control-label">El. paštas</label>
                            <div class="col-md-3">
                                {!! Form::text('elpastas', null, array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kiekis" class="col-md-1 control-label">Kiekis</label>
                            <div class="col-md-3">
                                {!! Form::input('number', 'kiekis', null, ['class' => 'form-control', 'required' => 'true', 'min' => '1', 'step' => '1', 'id' => 'kiekis']) !!}
                            </div>
                            <label for="suma" class="col-md-1 control-label">Suma (Eur)</label>
                            <div class="col-md-3">
                                {!! Form::text('suma', null, array('class' => 'form-control', 'id' => 'suma')) !!}
                            </div>
                            <label for="pristatymas" class="col-md-1 control-label">Pristatymas</label>
                            <div class="col-md-3">
                                <select class="form-control" name="pristatymas">
                                    <option value="Atsiimti artimiausiame pašto skyriuje">Atsiimti artimiausiame pašto skyriuje</option>
                                    <option value="Pristatymas į namus">Pristatymas į namus</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="data" class="col-md-1 control-label">Data</label>
                            <div class="col-md-3">
                                {!! Form::text('data', "$uzsakymas->created_at", array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                            <label for="atnaujinta" class="col-md-1 control-label">Atnaujinta</label>
                            <div class="col-md-3">
                                {!! Form::text('atnaujinta', "$uzsakymas->updated_at", array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                            <label for="atnaujino" class="col-md-1 control-label">Atnaujino</label>
                            <div class="col-md-3">
                                {!! Form::text('atnaujino', null, array('class' => 'form-control', 'readonly' => 'true')) !!}
                            </div>
                        </div>
                        <div class="div-order-button col-md-12 col-xs-12">
                            <button class="order-button">Atnaujinti</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script>
    $(document).ready(function(){
        setTimeout(function() {
            $('#message').fadeOut('slow', "swing");
        }, 2000);
    });
</script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip({ trigger: "hover", container: 'body' });
    });
</script>

<script>
    $(document).ready(function()
    {
        function updatePrice()
        {
            var price = $("#kiekis").val();
            var total = (price * 29.95);
            $("#suma").val(total);
        }
        $(document).on("change, keyup, mouseup", "#kiekis", updatePrice);
    });
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>
