<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Shutle Bus Jogja</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../../../user/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../../user/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../../user/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../user/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="/" class="navbar-brand">
                    <h1 class="m-0 text-primary"><span class="text-dark">Shutle</span>BUS</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="/" class="nav-item nav-link active">Home</a>

                        <a href="/history" class="nav-item nav-link">History</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="blog.html" class="dropdown-item">Blog Grid</a>
                                <a href="single.html" class="dropdown-item">Blog Detail</a>
                                <a href="destination.html" class="dropdown-item">Destination</a>
                                <a href="guide.html" class="dropdown-item">Travel Guides</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        @if(!Auth::check())
                            <a href="/login" class="nav-item nav-link">Login</a>
                        @else
                        <a href="/logout" class="nav-item nav-link">Logout</a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    @include('sweetalert::alert')
            <!-- Registration Start -->
            <div class="container-fluid bg-registration py-5" style="margin-top:-50px">
                <div class="container py-5">
                    <div class="row align-items-center">
                        @foreach($produk as $p)
                        @if ($p->sifat_pemesanan == "PRIBADI")
                        <div class="col-lg-6">
                            <div class="card border-0">
                                <div class="card-header bg-primary text-center p-4">
                                    <h1 class="text-white m-0">Seat</h1>
                                </div>
                                <div class="card-body rounded-bottom bg-white p-5">
                                    <form method="post" action="/formpemesanan/{{$p->id}}/checkout/pesan">
                                        @csrf

                                        <div class="container">
                                            <div class="row">
                                                @php

                                                for ($i = 1; $i <= 24; $i++){
                                                        $finded = false;
                                                        $part = "";
                                                    foreach ($seat as $d){


                                                        if($i == (int) $d->no_seat) {
                                                            $finded = true;
                                                            break;
                                                        }


                                                    }

                                                    if($i > 0 && $i < 5){
                                                            $part = "A";
                                                    }elseif($i > 4 && $i < 9){
                                                            $part = "B";

                                                    }elseif($i > 8 && $i < 13){
                                                            $part = "C";

                                                    }elseif($i > 12 && $i < 17){
                                                            $part = "D";

                                                    }elseif($i > 16 && $i < 21){
                                                            $part = "E";

                                                    }elseif($i > 20 && $i < 25){
                                                            $part = "F";

                                                    }
                                                        @endphp
                                                        <div class="col-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="no_seat[]" id="inlineCheckbox1" value={{$i}}  {{$finded == true ? 'checked disabled' : ''}}>
                                                        <label class="form-check-label" for="inlineCheckbox1">{{$part}}{{$i}}</label>
                                                      </div>

                                                  </div>

                                                  @php
                                                    }
                                                  @endphp







                                            </div>
                                          </div>



                                </div>
                            </div>
                        </div>

                        @else
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="mb-4">
                                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">ShutleBus</h6>
                                <h1 class="text-white"><span class="text-primary">Nikamti Perjalanan</span> Anda dengan ShutleBus</h1>
                            </div>
                            <ul class="list-inline text-white m-0">
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Nyaman</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Praktis</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Terjamin</li>
                            </ul>
                        </div>
                        @endif

                        <div class="col-lg-6">
                            <div class="card border-0">
                                <div class="card-header bg-primary text-center p-4">
                                    <h1 class="text-white m-0">FORM PEMESANAN</h1>
                                </div>
                                <div class="card-body rounded-bottom bg-white p-5">
                                    @if ($p->sifat_pemesanan == "INSTANSI")
                                    <form method="post" action="/formpemesanan/{{$p->id}}/checkout/pesan">
                                        @csrf
                                    @endif

                                        <div class="form-group">
                                            <input type="text" class="form-control p-4" name="nama" value="{{auth()->user()->name}}" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control p-4" name="email" value="{{auth()->user()->email}}" required="required" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control p-4" name="notelp" value="{{auth()->user()->no_hp}}" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control p-4" name="kodebus" value="{{$p->produkbus->kode_bus}}" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control p-4" name="kodearea" value="{{$p->produkbus->area->kode_area}}" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control p-4" name="harga" value="{{$p->harga}}" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control p-4" name="sifatpemesanan" value="{{$p->sifat_pemesanan}}" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control p-4" name="jadwal" value="{{$p->jadwal}}" required="required" />
                                        </div>
                                        @if ($p->sifat_pemesanan == "PRIBADI")

                                                @if ($seat->count() == 24)
                                                    <div>
                                                        <button class="btn btn-danger btn-block py-3" type="button">Seat Sudah Penuh</button>
                                                    </div>
                                                @elseif(sizeof($seat) > 0)

                                                @php
                                                    $isTrue = false;
                                                @endphp
                                                @foreach ($seat as $data)
                                                    @if ($data->order->email == Auth::user()->email)
                                                        @php
                                                            $isTrue = true;
                                                        @endphp
                                                    @break

                                                      @endif
                                                @endforeach
                                                @if ($isTrue)
                                                        <div>
                                                            <button class="btn btn-warning btn-block py-3" type="button">Sudah Memesan</button>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <button class="btn btn-primary btn-block py-3" type="submit">Pembayaran</button>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div>
                                                        <button class="btn btn-primary btn-block py-3" type="submit">Pembayaran</button>
                                                    </div>
                                                @endif

                                        @else
                                        <div>
                                            <button class="btn btn-primary btn-block py-3" type="submit">Pembayaran</button>
                                        </div>
                                        @endif

                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Registration End -->
    <!-- Carousel Start -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">Shutle</span>BUS</h1>
                </a>
                <p>Enjoy your Journey with ShutleBus</p>
                {{-- <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                </div> --}}
            </div>

        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">ShutleBus</a>. All Rights Reserved.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white-50">Designed by <a href="#">ShutleBus</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../../../user/lib/easing/easing.min.js"></script>
    <script src="../../../user/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../../user/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../../user/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../../user/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../../../user/mail/jqBootstrapValidation.min.js"></script>
    <script src="../../../user/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../../../user/js/main.js"></script>
</body>

</html>
