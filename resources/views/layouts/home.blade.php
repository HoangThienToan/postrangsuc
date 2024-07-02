<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css"> -->

    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    {{-- Start --}}
    <script type="text/javascript" nonce="114314a4685b4d16bb4ea0cbe73"
        src="//local.adguard.org?ts=1692264629451&amp;type=content-script&amp;dmn=phanmemvangta.com:2083&amp;app=com.microsoft.edgemac&amp;css=1&amp;js=1&amp;gcss=1&amp;rel=1&amp;rji=1&amp;sbe=0">
    </script>
    <script type="text/javascript" nonce="114314a4685b4d16bb4ea0cbe73"
        src="//local.adguard.org?ts=1692264629451&amp;name=AdGuard%20Popup%20Blocker%20%28Beta%29&amp;type=user-script">
    </script>
    <script type="text/javascript" nonce="a198406dc43f47f3994933bb6c4"
        src="//local.adguard.org?ts=1690356755139&amp;type=content-script&amp;dmn=hovangiap.toidayhoc.com&amp;app=com.microsoft.edgemac&amp;css=1&amp;js=1&amp;gcss=1&amp;rel=1&amp;rji=1&amp;sbe=0">
    </script>
    <script type="text/javascript" nonce="a198406dc43f47f3994933bb6c4"
        src="//local.adguard.org?ts=1690356755139&amp;name=AdGuard%20Popup%20Blocker%20%28Beta%29&amp;type=user-script">
    </script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./javas/main.js">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css"
        integrity="sha256-ogmFxjqiTMnZhxCqVmcqTvjfe1Y/ec4WaRj/aQPvn+I=" crossorigin="anonymous">

    <!-- Compressed JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/js/foundation.min.js"
        integrity="sha256-pRF3zifJRA9jXGv++b06qwtSqX1byFQOLjqa2PTEb2o=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/dd8c49730d.js" crossorigin="anonymous"></script>
    <title>Phần Mềm Vàng Ta - Phần mềm chuyên quản lý ngành vàng bạc đá quý</title>
    <meta name='description'
        content='Phần mềm vangta là một ứng dụng chuyên dụng được thiết kế để quản lý và điều hành các hoạt động kinh doanh trong ngành bán vàng. Với giao diện trực quan, phần mềm này cung cấp một loạt các tính năng hiệu quả để giúp các doanh nghiệp và cửa hàng bán vàng nâng cao năng suất và tối ưu hóa quy trình kinh doanh.'>
    <link rel="stylesheet" href="{{ asset('css/style_home.css?v=8.0') }}">
    {{-- End --}}
    <!-- Styles -->

    <style>
        body {
            min-height: 100vh;
            background-color: #243949;
            color: #fff;
            /* padding-right: 0px !important; */
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.12'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }



        .navbar-default {
            background-color: transparent;
            border: none;
        }

        .navbar-static-top {
            margin-bottom: 0px !important;
            top: 10%;
        }

        .navbar-default .navbar-nav>li>a {
            color: #fff !important;
            font-weight: 600;
            font-size: 24px;
            padding: 5px;
        }

        .navbar-default .navbar-nav>li>a:hover {
            color: #000 !important;
        }

        .navbar-default .navbar-brand {
            color: white;
            font-weight: 600;
            display: none;
            font-size: 24px;
        }

        .flex-between {
            display: flex;
            justify-content: space-between;
        }

        @media only screen and (max-width: 700px) {
            .flex-between {
                display: -webkit-inline-box
            }

            .navbar-nav {
                margin: 12px 0px;
            }
        }
    </style>
</head>

<body>
    <!--Start of Tawk.to Script-->
    {{-- <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/60b85314de99a4282a1b1a83/1f7809268';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script> --}}
    <!--End of Tawk.to Script-->
    <div style='z-index:1;' class='position-relative'>
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container position-fixed">
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                {
                    "symbols": [{
                            "proName": "BITSTAMP:BTCUSD",
                            "title": "Bitcoin"
                        },
                        {
                            "description": "GOLD$US",
                            "proName": "TVC:GOLD"
                        },
                        {
                            "description": "SILVER$US",
                            "proName": "TVC:SILVER"
                        },
                        {
                            "description": "USD/VND",
                            "proName": "FX_IDC:USDVND"
                        },
                        {
                            "description": "USD/JPY",
                            "proName": "FX:USDJPY"
                        },
                        {
                            "description": "S&P500",
                            "proName": "VANTAGE:SP500"
                        },
                        {
                            "description": "NAS100",
                            "proName": "NASDAQ:NDX"
                        },
                        {
                            "description": "DOW30",
                            "proName": "SKILLING:DJ30"
                        }
                    ],
                    "showSymbolLogo": true,
                    "colorTheme": "light",
                    "isTransparent": false,
                    "displayMode": "compact",
                    "locale": "en"
                }
            </script>
        </div>
        <!-- TradingView Widget END -->
    </div>
    <header>
        @include('layouts.partials.home_header')
        <video autoplay="" muted="" loop="" id="myVideo" class="myVideo">
            <source src="{{ asset('image-home/edge-software-v03_1080.mp4') }}" type="video/mp4">
        </video>
        <div class="content">
            <div class="container sticky">
                <nav class="d-flex center between none-dp">
                    <div>
                        <a class="navbar-brand image-logo" href="">
                            <img src="{{ asset('image-home/VangtaIcon.png') }}" alt="Phần mềm VangTa">
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class='hide-ul'>
                            <ul class="navbar-nav nav-ul flex-row">
                                <li class="nav-item bold"><a class="nav-link"
                                        href="../demotrangsuc/feature/index.html">TÍNH NĂNG</a></li>
                                <li class="nav-item bold"><a class="nav-link"
                                        href="../demotrangsuc/pricing/index.html">SỬ DỤNG
                                        NGAY</a>
                                </li>
                                <li class="nav-item bold"><a class="nav-link"
                                        href="../demotrangsuc/education/index.html">ĐÀO TẠO</a></li>
                                <li class="nav-item bold"><a class="nav-link" href="#">THÀNH LẬP</a></li>
                                <li class="nav-item bold"><a class="nav-link" href="#">ĐỐI TÁC</a></li>
                                <li class="nav-item bold"><a class="nav-link" href="#">BLOG</a></li>
                                <li class="nav-item bold nav-li-contac"><a class="nav-bor nav-link nav-a-contac"
                                        href="#">LIÊN HỆ</a>
                                </li>
                                <li class="nav-item bold">
                                    <a class="nav-link" href="#">
                                        <span>ĐĂNG NHẬP</span>
                                        <span class="glyphicon glyphicon-user"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i
                                    class="fa-solid fa-bars"></i></span>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="container d-flex header-bottom">
                <div class='d-flex flex-column align-items-center'>
                    <h3 class="header-name-1 text-center" style='margin-bottom:10px;'>Một Giải pháp Toàn diện cho Hệ
                        thống bán Sỉ Lẻ Trang sức</h3>
                    <a class="learn-more white bold" style='text-align:center;' href="{{ route('login') }}">
                        Sử dụng ngay
                    </a>

                </div>
            </div>
        </div>
        <div id="myNav" class="overlay">
            <div class="overlay-content">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <div class='d-flex flex-column justify-content-center align-items-center'>
                    <a href="../demotrangsuc/feature/index.html" class='bold'>TÍNH NĂNG</a>
                    <a href="../demotrangsuc/pricing/index.html" class='bold'>NÂNG CẤP</a>
                    <a href="../demotrangsuc/education/index.html" class='bold'>ĐÀO TẠO</a>
                    <a href="#" class='bold'>THÀNH LẬP</a>
                    <a href="#" class='bold'>ĐỐI TÁC</a>
                    <a href="#" class='bold'>BLOG</a>
                    <a href="#" class='bold'>LIÊN HỆ</a>
                    <hr>
                    <a class="nav-a-popu-bottom" href="#">Yêu cầu</a>
                    <a class="nav-a-popu-bottom" href="#">Thương hiệu</a>
                    <a class="nav-a-popu-bottom" href="#">Hội chợ</a>
                    <a class="nav-a-popu-bottom" href="#">LIÊN HỆ</a>
                </div>
            </div>
        </div>
    </header>
    <div class="body-bottom">
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe width="100%" height="500px" src="https://www.youtube.com/embed/vwoy0ubXT6g"
                            title="Dự án phần mềm quản lý trang sức phanmemvangta.com tại trung tâm Toidayhoc"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-1 edge-top">
            <div class="container d-flew flew-row ">
                <div class=" left">
                    <!-- Button trigger modal -->
                    <span type="button" data-toggle="modal" data-target="#exampleModalCenter" class="widget-inner">
                        <img src="{{ asset('image-home/playpreview.png') }}" alt="Phần mềm quản lý vàng bạc miễn phí">
                    </span>
                    <!-- Modal -->
                </div>
                <div class="right">
                    <a class=" arow-first" href="{{ route('login') }}">Thử  &amp; Thành công
                    </a>
                    <p class="mb-2">
                        <strong>CÁC XU HƯỚNG DẪN ĐẦU CỦA NGÀNH CÔNG NGHIỆP TRANG SỨC</strong>
                        <br> Chúng tôi luôn từng bước cố gắng, hoàn thiện trong việc áp dụng công nghệ
                        để mang đến một sản phẩm toàn diện về quản lý trang sức cho các cửa hàng. Hơn cả
                        1 phần mềm, chúng tôi mang lại giải pháp tổng thể đặc biệt phục vụ cho những thách
                        thức phát triển của ngành kim hoàn

                    </p>
                    <a class="button-section bold" href="{{ route('login') }}">
                        <span>
                            Sử dụng ngay
                        </span>
                    </a>
                </div>
            </div>
        </section>
        <section class="section-2 edge-top">
            <div class="container">
                <h2 class="h2-section">
                    <span>CÁC TÍNH NĂNG</span>
                </h2>
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <i class="fa fa-credit-card icon-section-2"></i>
                        <h5 class="section-2-h5">GIAO DIỆN</h5>
                        <p class="section-2-p">Trực quan dễ sử dụng và tối đa hóa tốc độ, mang đến một giải pháp
                            bán hàng thanh lịch với sự linh hoạt phù hợp với nhu cầu cửa hàng của bạn.
                        </p>
                        <a href="/features?tab=point-of-sale" class="btn-link bold none-dp">TÌM HIỂU THÊM</a>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <span class="material-icons icon-section-2">
                            shopping_cart
                        </span>
                        <h5 class="section-2-h5">KHO VẬN</h5>
                        <p class="section-2-p">Tăng lợi nhuận của bạn với tất cả các công cụ cần thiết để quản lý
                            hàng tồn kho 1 cách cân bằng, mang lại lợi nhuận cho cửa hàng.
                        </p>
                        <a href="/features?tab=inventory" class="btn-link bold none-dp">TÌM HIỂU THÊM</a>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <span class="material-icons icon-section-2">
                            supervisor_account
                        </span>
                        <h5 class="section-2-h5">KHÁCH HÀNG</h5>
                        <p class="section-2-p">Xây dựng và theo dõi mối quan hệ giữa khách hàng với tính năng cho phép
                            bạn
                            quảng bá thương hiệu 1 cách hiệu quả, tạo dựng sự trung thành giữa khách với cửa hàng.
                        </p>
                        <a href="/features?tab=customers" class="btn-link bold none-dp">TÌM HIỂU THÊM</a>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <span class="material-icons icon-section-2">
                            build
                        </span>

                        <h5 class="section-2-h5">DỊCH VỤ</h5>
                        <p class="section-2-p">Quản lý hiệu quả các dịch vụ cửa hàng của bạn và dễ dàng
                            theo dõi tất cả các khía cạnh của công việc.
                        </p>
                        <a href="/features?tab=services" class="btn-link bold none-dp">TÌM HIỂU THÊM</a>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <span class="material-icons icon-section-2">
                            security
                        </span>
                        <h5 class="section-2-h5">CÁC LỢI ÍCH KHÁC</h5>
                        <p class="section-2-p">
                            Được thiết kế từ đầu để sử dụng trong nhiều môi trường cửa hàng khác nhau, đồng thời cũng
                            có một loạt các lợi ích khác mang lại giá trị lớn cho nền tảng.
                        </p>
                        <a href="/features?tab=other-benefits" class="btn-link bold none-dp">TÌM HIỂU THÊM</a>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <i class="material-icons icon-section-2">assignment</i>
                        <h5 class="section-2-h5">BÁO CÁO</h5>
                        <p class="section-2-p"> Một bộ báo cáo đầy đủ cung cấp lượng lớn thông tin bao gồm các hoạt
                            động
                            hàng ngày, phân tích hiệu suất hàng tồn kho &amp; hiệu quả tiếp thị khách hàng, v.v.
                        </p>
                        <a href="/features?tab=reports" class="btn-link bold none-dp">TÌM HIỂU THÊM</a>

                    </div>
                </div>
            </div>


        </section>
        <section class="section-3 edge-top" style="background: #fab704 !important">
            <div class="container section-3-dad">
                <h2 class="h2-section ">
                    <span class="section-3-span">
                        THÀNH TỰU
                    </span>
                </h2>
                <div class="row section-3-son mb-4">
                    <div class="col-md-4 text-center">
                        <span>
                            <h2 class="count" data-animateDuration='2000'>24
                            </h2>
                            <h3 class='bold'>
                                TỔNG CÁC CỬA HÀNG
                            </h3>
                        </span>
                    </div>
                    <div class="col-md-4 text-center">
                        <span>
                            <h2 class="count" data-animateDuration='3000'>236
                            </h2>
                            <h3 class='bold'>
                                TỔNG CÁC TRẠM
                            </h3>
                        </span>
                    </div>
                    <div class="col-md-4 text-center">
                        <span>
                            <h2 class="count" data-animateDuration='4000'>332
                            </h2>
                            <h3 class='bold'>
                                TỔNG GIỜ ĐÀO TẠO
                            </h3>
                        </span>
                    </div>
                </div>
                <div class="row widget-center-section3">
                    <div class="col-md-6 right-section-3">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container brightness">
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js"
                                async>
                                {
                                    "colorTheme": "light",
                                    "dateRange": "12M",
                                    "showChart": true,
                                    "locale": "en",
                                    "largeChartUrl": "",
                                    "isTransparent": true,
                                    "showSymbolLogo": true,
                                    "showFloatingTooltip": false,
                                    "width": "100%",
                                    "height": "450",
                                    "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                                    "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                                    "gridLineColor": "rgba(240, 243, 250, 0)",
                                    "scaleFontColor": "rgba(106, 109, 120, 1)",
                                    "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                                    "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                                    "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                                    "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                                    "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                                    "tabs": [{
                                            "title": "Indices",
                                            "symbols": [{
                                                    "s": "TVC:GOLD",
                                                    "d": "GOLD/US"
                                                },
                                                {
                                                    "s": "TVC:SILVER",
                                                    "d": "SILVER/US"
                                                },
                                                {
                                                    "s": "FOREXCOM:SPXUSD",
                                                    "d": "SPXUSD"
                                                },
                                                {
                                                    "s": "FX:EURUSD",
                                                    "d": "EURUSD"
                                                },
                                                {
                                                    "s": "NASDAQ:AAPL",
                                                    "d": "APPLE"
                                                }
                                            ],
                                            "originalTitle": "Indices"
                                        },
                                        {
                                            "title": "Futures",
                                            "symbols": [{
                                                    "s": "CME_MINI:ES1!",
                                                    "d": "S&P 500 E-Mini"
                                                },
                                                {
                                                    "s": "CME:6E1!",
                                                    "d": "Euro"
                                                },
                                                {
                                                    "s": "COMEX:GC1!",
                                                    "d": "Gold"
                                                },
                                                {
                                                    "s": "NYMEX:CL1!",
                                                    "d": "Oil"
                                                },
                                                {
                                                    "s": "NYMEX:NG1!",
                                                    "d": "Gas"
                                                },
                                                {
                                                    "s": "CBOT:ZC1!",
                                                    "d": "Corn"
                                                }
                                            ],
                                            "originalTitle": "Futures"
                                        },
                                        {
                                            "title": "Bonds",
                                            "symbols": [{
                                                    "s": "CBOT:ZB1!",
                                                    "d": "T-Bond"
                                                },
                                                {
                                                    "s": "CBOT:UB1!",
                                                    "d": "Ultra T-Bond"
                                                },
                                                {
                                                    "s": "EUREX:FGBL1!",
                                                    "d": "Euro Bund"
                                                },
                                                {
                                                    "s": "EUREX:FBTP1!",
                                                    "d": "Euro BTP"
                                                },
                                                {
                                                    "s": "EUREX:FGBM1!",
                                                    "d": "Euro BOBL"
                                                }
                                            ],
                                            "originalTitle": "Bonds"
                                        },
                                        {
                                            "title": "Forex",
                                            "symbols": [{
                                                    "s": "FX:EURUSD",
                                                    "d": "EUR to USD"
                                                },
                                                {
                                                    "s": "FX:GBPUSD",
                                                    "d": "GBP to USD"
                                                },
                                                {
                                                    "s": "FX:USDJPY",
                                                    "d": "USD to JPY"
                                                },
                                                {
                                                    "s": "FX:USDCHF",
                                                    "d": "USD to CHF"
                                                },
                                                {
                                                    "s": "FX:AUDUSD",
                                                    "d": "AUD to USD"
                                                },
                                                {
                                                    "s": "FX:USDCAD",
                                                    "d": "USD to CAD"
                                                }
                                            ],
                                            "originalTitle": "Forex"
                                        }
                                    ]
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                    <div class="col-md-6 section-3-img">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8217740115642!2d108.20779567595547!3d16.074735784605586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142199d0f437cbf%3A0x571d9da9fa5c9f30!2zVG9pZGF5aG9jIHNwYWNlIGNobyB0aHXDqiB2xINuIHBow7JuZyBraOG7n2kgbmdoaeG7h3Ag4bufIMSQw6AgTuG6tW5n!5e0!3m2!1svi!2s!4v1693451009160!5m2!1svi!2s" width="100%" height="100%" style="border:0; border-radius:1em" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <span class="material-icons icon-section-3">
                            school
                        </span>
                        <h5 class="section-3-h5">GIỚI THIỆU<br>ĐÀO TẠO</h5>
                        <p class="section-2-p">Được đào tạo thực hành từ những người có kinh nghiệm, kiên trì &amp;
                            kiên
                            nhẫn.</p>
                        <a href="/education" class="btn-link bold none-dp">TÌM HIỂU THÊM</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <span class="material-icons icon-section-3">
                            brightness_auto
                        </span>
                        <h5 class="section-2-h5">ĐÀO TẠO<br>TRÌNH ĐỘ CAO</h5>
                        <p class="section-2-p">Tìm hiểu cách tận dụng mọi tính năng nâng cao lợi nhuận.</p>
                        <a href="/education#advanced" class="btn-link bold none-dp">TÌM HIỂU THÊM</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <span class="material-icons icon-section-3">
                            location_on
                        </span>
                        <h5 class="section-2-h5">ĐÀO TẠO<br>TRỰC TIẾP</h5>
                        <p class="section-2-p">Hướng dẫn trực tiếp là một cách tuyệt vời để đào tạo kỹ năng của chính
                            bạn.
                        </p>
                        <a href="/education" class="btn-link bold none-dp">TÌM HIỂU THÊM</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-4 edge-top none-dp">
            <div class="container section-4-dad">
                <div class="mb-4">
                    <h2 class="h2-section ">
                        <span>
                            ĐỐI TÁC
                        </span>

                    </h2>
                    <p class="text-center ">
                        Click vào logo của đối tác để hiểu thêm cách họ hỗ trợ chúng tôi.
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3 logo-brand">
                        <a href="#">
                            <img src="{{ asset('image-home/driveretail-logo.png') }}" alt="Phần mềm bán trang sức">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 logo-brand">
                        <a href="#">
                            <img src="{{ asset('image-home/logo-snapretail.png') }}"
                                alt="Phần mềm quản lý tiệm vàng">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 logo-brand">
                        <a href="#">
                            <img src="https://mma.prnewswire.com/media/1226256/Jewelers_Mutual_Group_Logo.jpg?p=publish"
                                alt="Phanmemvangta">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 logo-brand">
                        <a href="#">
                            <img src="data:image/png;base64,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"
                                alt="Phanmemvangta">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 logo-brand">
                        <a href="#">
                            <img src="{{ asset('image-home/logo-gemfind.png') }}"
                                alt="Phần mềm quản lý cửa hàng vàng bạc">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 logo-brand">
                        <a href="#">
                            <img src="{{ asset('image-home/logo-podium.png') }}" alt="Phanmemvangta">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 logo-brand">
                        <a href="#">
                            <img src="{{ asset('image-home/montage-logo.jpg') }}" alt="Phanmemvangta">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 logo-brand">
                        <a href="#">
                            <img src="{{ asset('image-home/hershelbarg-logo.jpg') }}" alt="Phần mềm vangta">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 logo-brand">
                        <a href="#">
                            <img src="{{ asset('image-home/edgeretail-logo.jpg') }}" alt="Phanmemvangta">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 logo-brand">
                        <a href="#">
                            <img src="{{ asset('image-home/integratedcreditcards-logo.jpg') }}" alt="Phanmemvangta">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 logo-brand">
                        <a href="#">
                            <img src="{{ asset('image-home/Zillion_Logo_black.jpg') }}" alt="Phanmemvangta">
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-5 edge-top none-dp">
            <div class="container section-5-dad">
                <div class="header-sectipon-5">
                    <h2 class="h2-section ">
                        <span> GIÁ TIÊU CHUẨN</span>
                    </h2>
                    <div class="text-center">
                        <a href="/features" class="mx-3">PHẦN MỀM</a>
                        <a href="/requirements" class="mx-3">TRANG THIẾT BỊ</a>
                        <a href="/contact" class="mx-3">HỖ TRỢ KHÁCH HÀNG</a>
                        <a href="/education" class="mx-3">ĐÀO TẠO</a>
                    </div>
                </div>
                <div class="">
                    <div class="card-deck mb-3 text-center card-dad">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">1 Cửa Hàng</h4>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h1 class="card-title pricing-card-title">$4,600 <small class="text-muted">/
                                            mo</small>
                                    </h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li class="text1-son-pricing">1 Cửa hàng / 1 Máy trạm</li>
                                        <li class="text2-son-pricing">BAO GỒM ĐÀO TẠO</li>
                                        <li><a href="#">
                                                Các điều khoản và điều kiện
                                            </a></li>
                                    </ul>
                                </div>
                                <div>
                                    <button type="button"
                                        class="btn btn-lg btn-block col-bt-12 button-pricing bold">ĐẶT
                                        NGAY</button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">1 Cửa Hàng</h4>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h1 class="card-title pricing-card-title">$5,700 <small class="text-muted">/
                                            mo</small>
                                    </h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li class="text1-son-pricing">1 Cửa hàng / 3 Máy trạm</li>
                                        <li class="text2-son-pricing">BAO GỒM ĐÀO TẠO</li>
                                        <li><a href="#"> Các điều khoản và điều kiện</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-lg btn-block button-pricing bold">ĐẶT
                                        NGAY</button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Nhiều cửa hàng</h4>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h1 class="card-title pricing-card-title">$12,450 <small class="text-muted">/
                                            mo</small>
                                    </h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li class="text1-son-pricing">2 Cửa hàng / 6 máy trạm</li>
                                        <li class="text3-son-pricing">BAO GỒM ĐÀO TẠO</li>
                                        <li class="text4-son-pricing">Thêm cửa hàng thứ 3 với giá +$6,750</li>
                                        <li><a href="#">Các điều khoản và điều kiện</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-lg btn-block button-pricing bold">ĐẶT
                                        NGAY</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-center ">
                            Định giá dựa trên số lượng cửa hàng và máy trạm. <br>Lần mua đầu tiên của bạn bao gồm 6
                            tháng
                            hỗ trợ kỹ thuật; sau đó, hỗ trợ có thể được gia hạn hàng năm với 20%
                            tổng giá mua trong danh sách của bạn..
                        </p>
                        <div class="text-center bold section-5-bottom">
                            <span>TÌM HIỂU THÊM</span>
                        </div>

                    </div>
                </div>
        </section>
        <div class="contactAll">
            <div class="icon3d">
                <div class="ul3d d-flex justify-content-between">
                    <div class="li3d position-fixed stick-contactfb">
                        <div class="fb position-relative">
                            <a href="https://www.facebook.com/Toidayhoc" class="fb3d "><i
                                    class="fb-color fa fa-facebook"></i></a>
                            <!--<div class="fb-message bg-fb rounded  p-2 position-absolute">-->
                            <!--    <p class="m-0 text-white">Tìm hiểu thêm về chúng tôi</p>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="li3d position-fixed stick-contactzalo">
                        <div class="zalo position-relative">
                            <a href="https://zalo.me/0935070243" class="zalo3d">
                                <img src="{{ asset('image-home/LogoZaloArc.png') }}" class="shadow w-zalo fa img3d"
                                    alt="Phần mềm bán sỉ lẻ trang sức">
                            </a>
                            <!--<div class="zalo-message bg-zalo rounded p-2 position-absolute">-->
                            <!--    <p class="m-0 text-dark">Liên hệ với chúng tôi</p>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="li3d position-fixed stick-contactphone">
                        <a href="tel:0935070243" class="phone3d"><i class="phone-color fa fa-phone"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!--Contact Response-->
        <div id="button-contact-vr">
            <div id="gom-all-in-one"><!-- v3 -->
                <!-- contact -->
                <!-- end contact -->
                <!-- viber -->
                <!-- end viber -->
                <!-- zalo -->
                <div id="zalo-vr" class="button-contact">
                    <div class="phone-vr">
                        <div class="phone-vr-circle-fill"></div>
                        <div class="phone-vr-img-circle">
                            <a target="_blank" href="https://zalo.me/0935070243">
                                <img src="https://toidayhoc.com/wp-content/plugins/button-contact-vr/img/zalo.png"
                                    class="lazyloaded" data-ll-status="loaded"
                                    alt='Phần mềm bán sỉ lẻ vàng bạc'><noscript><img
                                        src="https://toidayhoc.com/wp-content/plugins/button-contact-vr/img/zalo.png" /></noscript>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end zalo -->
                <!-- Phone -->
                <div id="phone-vr" class="button-contact">
                    <div class="phone-vr">
                        <div class="phone-vr-circle-fill"></div>
                        <div class="phone-vr-img-circle">
                            <a href="tel:0935070243">
                                <img src="https://toidayhoc.com/wp-content/plugins/button-contact-vr/img/phone.png"
                                    class="lazyloaded" alt='phanmemvangta' data-ll-status="loaded"><noscript><img
                                        src="https://toidayhoc.com/wp-content/plugins/button-contact-vr/img/phone.png" /></noscript>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end phone -->
            </div><!-- end v3 class gom-all-in-one -->
        </div>

        <footer class="edge-top none-dp">
            <div class="container">
                <div class="row footer-dad">
                    <div class="col-md-3">
                        <div class="fit-img">
                            <a href='http://phanmemvangta.com'>
                                <img class="fit-in" src="{{ asset('image-home/VangtaIcon.png') }}"
                                    alt="phần mềm bán sỉ lẻ vàng bạc">
                            </a>
                        </div>
                        <h6>Phần Mềm Vàng Ta Inc.</h6>
                        <div>
                            <address>
                                Makers of PhanmemVangta®<br>
                                3 Corporate Drive #215<br>
                                Shelton, CT 06484<br>
                                <a href="tel:18558793343"><strong>1-855-TRY-EDGE</strong></a>
                            </address>
                            <div>
                                <img src="{{ asset('image-home/microsoft-partner.png') }}" alt="phanmemvangta">
                                <small>

                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h6>
                            About Us ®
                        </h6>
                        <ul class=" footerlinks">
                            <li><a href="/features">Tính năng</a></li>
                            <li><a href="/requirements">Hệ thống</a></li>
                            <li><a href="/education">Cơ hội</a></li>
                            <li><a href="/about">Thành lập</a></li>
                            <li><a href="/pricing">Giá cả</a></li>
                            <li><a href="/partners">Đối tác</a></li>
                            <li><a href="/contact-the-edge">Chăm sóc khách hàng</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h6>Đào tạo</h6>
                        <ul class=" footerlinks">
                            <li><a href="/education-calendar">Lịch đào tạo</a></li>
                            <li><a href="/education-emv">Swipe, Learn, Earn</a></li>
                            <li><a href="/education-courses">Các khóa đào tạo</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h6>
                            Company
                        </h6>
                        <ul class=" footerlinks">
                            <li><a href="/brand">Cam kết</a></li>
                            <li><a href="/tradeshows">Hội chơ</a></li>
                            <li><a href="/terms-and-conditions">Điều khoản và điều kiện</a></li>
                            <li><a href="/contact-the-edge">Liên hệ</a></li>
                        </ul>
                        <h6>
                            Kết nối với chúng tôi
                        </h6>
                        <div>
                            <a href="https://www.facebook.com/TheEdgebyAbbott/" class="network facebook"
                                target="_blank" rel="nofollow noopener" title="">
                                <span class="material-icons">
                                    facebook
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <p class="copyrights">© 2021 PhanmemVangta®. All Rights Reserved. <a target="_blank"
                            rel="nofollow noopener" href="http://www.punchmark.com/?ref=webclient">Website
                            design</a><a target="_blank" rel="nofollow noopener"
                            href="http://www.punchmark.com?ref=webclient">ed,
                            maintained, and hosted
                            by
                        </a>
                        <a target="_blank" rel="nofollow noopener"
                            href="http://www.punchmark.com?ref=webclient">Punchmark
                        </a>. <a href="/ada-compliance">Accessibility
                            Statement</a>.
                    </p>
                </div>
            </div>
        </footer>
    </div>
    <script>
        var video = document.getElementById("myVideo");
        var btn = document.getElementById("myBtn");

        function myFunction() {
            if (video.paused) {
                video.play();
                btn.innerHTML = "Pause";
            } else {
                video.pause();
                btn.innerHTML = "Play";
            }
        }

        function openNav() {
            document.getElementById("myNav").style.height = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.height = "0%";
        }
        const initAnimatedCounts = () => {
            const ease = (n) => {
                // https://github.com/component/ease/blob/master/index.js
                return --n * n * n + 1;
            };
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        // Once this element is in view and starts animating, remove the observer,
                        // because it should only animate once per page load.
                        observer.unobserve(entry.target);
                        const countToString = entry.target.getAttribute('data-countTo');
                        const countTo = parseFloat(countToString);
                        const duration = parseFloat(entry.target.getAttribute('data-animateDuration'));
                        const countToParts = countToString.split('.');
                        const precision = countToParts.length === 2 ? countToParts[1].length : 0;
                        const startTime = performance.now();
                        const step = (currentTime) => {
                            const progress = Math.min(ease((currentTime - startTime) / duration),
                                1);
                            entry.target.textContent = (progress * countTo).toFixed(precision);
                            if (progress < 1) {
                                animationFrame = window.requestAnimationFrame(step);
                            } else {
                                window.cancelAnimationFrame(animationFrame);
                            }
                        };
                        let animationFrame = window.requestAnimationFrame(step);
                    }
                });
            });
            document.querySelectorAll('[data-animateDuration]').forEach((target) => {
                target.setAttribute('data-countTo', target.textContent);
                target.textContent = '0';
                observer.observe(target);
            });
        };
        initAnimatedCounts();
    </script>
    @include('layouts.partials.javascripts')

    <!-- Scripts -->
    <script src="{{ asset('js/login.js?v=' . $asset_v) }}"></script>
    @yield('javascript')
</body>

</html>
