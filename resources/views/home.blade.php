
@extends('layouts.app')

@section('content')

    <div class="landing" id="landing">
        <div class="container">
            <div class="title col-md-8 col-md-offset-2 col-xs-12">
                <h1 class="wow fadeInUp">Maisto papildas</h1>
            </div>
            <div class="landing-citation col-md-8 col-md-offset-2 col-xs-12">
                <p class="wow fadeInUp" data-wow-delay="0.5s">Aukščiausios kokybės maisto papildas, gaminamas iš aukščiausios rūšies medžiagų, tinkantis tiek mėgejams, tiek profesionalams.</p>
            </div>
            <div class="div-about-button col-md-12 col-xs-12 wow fadeInUp" data-wow-delay="1s" >
                <a class="about-button" href="#apie-mus">Plačiau</a>
            </div>
        </div>
    </div>

    <div class="content" id="apie-mus">
        <div class="container-fluid">
            <div class="col-md-12">
                <hr class="content-hr-lg wow fadeInUp"/>
                    <h2 class="wow fadeInUp">Apie mus</h2>
                <hr class="content-hr-lg wow fadeInUp"/>
                <div class="about-info">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x wow fadeInUp">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fa fa-heart fa-stack-1x"></i>
                        </span>
                        <h1 class="wow fadeInUp">Kokybė</h1>
                        <hr class="content-hr wow fadeInUp"/>
                        <p class="wow fadeInUp">Šiame maisto papilde naudojamos tik aukščiausios rūšies medžiagos, nežalingos  Jūsų sveikatai.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x wow fadeInUp" data-wow-delay="0.5s">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fa fa-truck fa-stack-1x"></i>
                        </span>
                        <h1 class="wow fadeInUp" data-wow-delay="0.5s">Greitas pristatymas</h1>
                        <hr class="content-hr wow fadeInUp" data-wow-delay="0.5s"/>
                        <p class="wow fadeInUp" data-wow-delay="0.5s">Greitas pristatymas Jums patogiu būdu.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x wow fadeInUp" data-wow-delay="1s">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fa fa-eur fa-stack-1x"></i>
                        </span>
                        <h1 class="wow fadeInUp" data-wow-delay="1s">Kaina</h1>
                        <hr class="content-hr wow fadeInUp" data-wow-delay="1s"/>
                        <p class="wow fadeInUp" data-wow-delay="1s">Puikus kainos ir kokybės santykis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="order-forn" id="uzsakymo-forma">
        <div class="container-fluid">
            <div class="col-md-12">
                <hr class="content-hr-lg wow fadeInUp"/>
                    <h2 class="wow fadeInUp">Užsakymas</h2>
                <hr class="content-hr-lg wow fadeInUp"/>
                <form action="{{ url('uzsakymai')}}" method="POST" class="form-horizontal">
                    <div class="form-wrapper">
                        {{ csrf_field() }}
                        <div class="form-group wow fadeInLeft">
                            <label for="vardas" class="col-md-1 col-md-offset-4 control-label">Vardas*</label>
                            <div class="col-md-3">
                                {!! Form::text('vardas', null, array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                        </div>
                        <div class="form-group wow fadeInLeft" data-wow-delay="0.2s">
                            <label for="pavarde" class="col-md-1 col-md-offset-4 control-label">Pavardė*</label>
                            <div class="col-md-3">
                                {!! Form::text('pavarde', null, array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                        </div>
                        <div class="form-group wow fadeInLeft" data-wow-delay="0.4s">
                            <label for="telefonas" class="col-md-1 col-md-offset-4 control-label">Telefonas*</label>
                            <div class="col-md-3">
                                {!! Form::text('telefonas', null, array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                        </div>
                        <div class="form-group wow fadeInLeft" data-wow-delay="0.6s">
                            <label for="adresas" class="col-md-1 col-md-offset-4 control-label">Adresas*</label>
                            <div class="col-md-3">
                                {!! Form::text('adresas', null, array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                        </div>
                        <div class="form-group wow fadeInLeft" data-wow-delay="0.8s">
                            <label for="miestas" class="col-md-1 col-md-offset-4 control-label">Miestas*</label>
                            <div class="col-md-3">
                                {!! Form::text('miestas', null, array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                        </div>
                        <div class="form-group wow fadeInLeft" data-wow-delay="1s">
                            <label for="elpastas" class="col-md-1 col-md-offset-4 control-label">El. paštas*</label>
                            <div class="col-md-3">
                                {!! Form::text('elpastas', null, array('class' => 'form-control', 'required' => 'true')) !!}
                            </div>
                        </div>
                        <div class="form-group wow fadeInLeft" data-wow-delay="1.2s">
                            <label for="kiekis" class="col-md-1 col-md-offset-4 control-label">Kiekis*</label>
                            <div class="col-md-3">
                                {!! Form::input('number', 'kiekis', '1', ['class' => 'form-control', 'required' => 'true', 'min' => '1', 'step' => '1', 'id' => 'kiekis']) !!}
                            </div>
                        </div>
                        <div class="form-group wow fadeInLeft" data-wow-delay="1.4s">
                            <label for="suma" class="col-md-1 col-md-offset-4 control-label">Suma (Eur)</label>
                            <div class="col-md-3">
                                {!! Form::text('suma', 29.95, array('class' => 'form-control', 'readonly' => 'true', 'id' => 'suma')) !!}
                            </div>
                        </div>
                        <div class="form-group wow fadeInLeft" data-wow-delay="1.6s">
                            <label for="pristatymas" class="col-md-1 col-md-offset-4 control-label">Pristatymas</label>
                            <div class="col-md-3">
                                <select class="form-control" name="pristatymas">
                                    <option value="Atsiimti artimiausiame pašto skyriuje">Atsiimti artimiausiame pašto skyriuje</option>
                                    <option value="Pristatymas į namus">Pristatymas į namus</option>
                                </select>
                            </div>
                        </div>
                        <p class="col-md-3 col-md-offset-6 wow fadeInLeft" data-wow-delay="1.8s">* - laukeliai privalomi</p>
                    </div>
                    <div class="div-order-button col-md-12 col-xs-12 wow fadeInUp" data-wow-delay="2s">
                        <button class="order-button">Užsakyti</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer" id="kontaktai">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3> Kontaktai </h3>
                    <ul>
                        <li> <a href="https://www.facebook.com/vardenis.pavardenis"><i class="fa fa-facebook" aria-hidden="true"></i> &nbsp; Vardenis Pavardenis</a> </li>
                        <li> <a href="tel:+3700000000"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp; +370 00 000 000</li></a>
                        <li> <a href="mailto:vardenis,pavardenis@mail.com"><i class="fa fa-envelope-square" aria-hidden="true"></i>&nbsp; vardenis,pavardenis@mail.com</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if( Session::has('alert-' . $msg))
        <script type="text/javascript">
            $(document).ready(function() {
                $('#myModal').modal();
            });
        </script>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Užsakymas sėkmingai priimtas!</h2>
                        <h4>{{ Session::get('alert-' . $msg) }}</h4>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endforeach

    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(document).scrollTop() > 50) {
                    $('#myNavBar').addClass('transparentNav');
                } else {
                    $('#myNavBar').removeClass('transparentNav');
                }
            });
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

    <script>
        $(document).ready(function()
        {
        $('a[href*="#"]')
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                ) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top - 70
                        }, 1000, function() {
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) {
                                return false;
                            } else {
                                $target.attr('tabindex','-1');
                                $target.focus();
                            };
                        });
                    }
                }
            });
        });
    </script>
@endsection
