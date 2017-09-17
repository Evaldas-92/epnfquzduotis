<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config('app.name', 'Laravel') }} @yield('title')</title>--}}
    <title>{{ config('app.name', 'Laravel') }} - užsakymai</title>

    <!-- Styles -->
    <link rel="shortcut icon" href="{{{ asset('/images/favicon.ico') }}}">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nfq.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

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
                    <h4 class="panel-title pull-left"><strong>Užsakymai</strong></h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="uzsakymai">
                            <thead>
                            <div class="flash-message" id="message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                                    @endif
                                @endforeach
                            </div>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="table-text"><div><strong>Nr.</strong></div></td>
                                <td class="table-text"><div><strong>Vardas</strong></div></td>
                                <td class="table-text"><div><strong>Pavardė</strong></div></td>
                                <td class="table-text"><div><strong>Telefonas</strong></div></td>
                                <td class="table-text"><div><strong>El. paštas</strong></div></td>
                                <td class="table-text"><div><strong>Kiekis</strong></div></td>
                                <td class="table-text"><div><strong>Suma</strong></div></td>
                                <td class="table-text"><div><strong>Užsakymo data</strong></div></td>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1 @endphp
                            @foreach ($uzsakymai as $uzsakymas)
                                <tr>
                                    <td><a class="btn btn-sm btn-info" data-toggle="tooltip" title="Užsakymo duomenys" href="{{ url('uzsakymai/' . $uzsakymas->id . '/edit') }}"><i class="glyphicon glyphicon-edit"></i></a></td>
                                    <td>
                                        <form action="{{ url('uzsakymai/'.$uzsakymas->id) }}" method="POST" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Ištrinti užsakymą" onclick="return confirm('Ar tikrai norite ištrinti šį užsakymą?')">
                                                <i class="fa fa-btn fa-trash glyphicon glyphicon-remove"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="table-text"><div>{{ $i++ }}</div></td>
                                    <td class="table-text"><div>{{ $uzsakymas->vardas }}</div></td>
                                    <td class="table-text"><div>{{ $uzsakymas->pavarde }}</div></td>
                                    <td class="table-text"><div>{{ $uzsakymas->telefonas }}</div></td>
                                    <td class="table-text"><div>{{ $uzsakymas->elpastas }}</div></td>
                                    <td class="table-text"><div>{{ $uzsakymas->kiekis }}</div></td>
                                    <td class="table-text"><div>{{ $uzsakymas->suma }}</div></td>
                                    <td class="table-text"><div>{{ $uzsakymas->created_at }}</div></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script type="text/javascript">
    $(document).ready( function () {
       $('#uzsakymai').DataTable( {
            responsive: true,
            "order": [],
            "columnDefs": [ {
                "targets"  : [0, 1],
                "orderable": false,
            }],
            "columns": [
                { "width": "1%" },
                { "width": "5%" },
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null
            ],
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Lithuanian.json"
            }

        });
    } );
</script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip({ trigger: "hover", container: 'body' });
    });
</script>

<script>
    $(document).ready(function(){
        setTimeout(function() {
            $('#message').fadeOut('slow', "swing");
        }, 5000);
    });
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</html>
