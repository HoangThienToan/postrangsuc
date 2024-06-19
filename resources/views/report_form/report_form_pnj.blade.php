@extends('layouts.app')
@section('title', __('Giá vàng'))
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{ asset('./pnj-all/cssform/style_pnj.css?v=2.8') }}">

@section('content')

    <section id="light-mode" class="bg-primary">
        <div class="container-fluid pb-3 container-form">
            <div class="e-flex">
                <button class="btn btn-secondary m-3 font-bold" onclick="zoomIn()">Phóng to</button>
                <button class="btn btn-secondary m-3 font-bold" onclick="zoomOut()">Thu nhỏ</button>
            </div>
            <div class="d-flex">
                <p class="color-gold display-4">BẢNG GIÁ VÀNG</p>
            </div>
            <div class="row mx-3 py-3 banner d-flex">
                <div class="col-1">
                    <div class="d-flex">
                        <img src="{{asset('./image-home/VangtaIcon.png')}}" alt="Phần mềm quản lý trang sức đầu tiên tại Đà Nẵng" style="width:100%">
                    </div>
                </div>
                <div class="col-10">
                    <div class="row hidden-mobile">
                        <p class="color-gold h3 pad-left">
                            <marquee behavior="scroll" direction="left">
                                Giá vàng hôm nay <b id='dateToday'></b>: Dân buôn chớp thời cơ
                                chốt lời, giá vàng lại giảm
                            </marquee>
                            <script>
                                function refreshTime() {
                                    var dt = new Date();
                                    var month = dt.getUTCMonth() + 1; //months from 1-12
                                    var day = dt.getUTCDate();
                                    var newDate = day + '/' + month;
                                    document.getElementById("dateToday").innerHTML = newDate;
                                }
                                setInterval(refreshTime, 1000);
                            </script>
                        </p>
                    </div>
                    <!-- TradingView Widget BEGIN -->
                    <div
                        class="tradingview-widget-container hidden-mobile row d-flex">
                        <div id="tradingview_93b2a" style="width: inherit"></div>
                        <!-- <div class="tradingview-widget-copyright"><a href="https://vn.tradingview.com/symbols/GOLD/"
                                            rel="noopener" target="_blank"><span class="blue-text">GOLD Biểu đồ</span> </a> bởi TradingView
                                    </div> -->
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget({
                                // "width": 750,
                                // "height": 140,
                                "autosize": true,
                                "symbol": "GOLD",
                                "interval": "D",
                                "timezone": "Asia/Ho_Chi_Minh",
                                "theme": "light",
                                "style": "2",
                                "locale": "vi_VN",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "allow_symbol_change": true,
                                "container_id": "tradingview_93b2a"
                            });
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
            <div class=" mx-3 mb-1 d-flex align-items-end menu mt-4">
                <div class="col-3">
                    <p class="text-white h4" contenteditable="true">ĐVT: 1.000 đ/chỉ</p>
                </div>
                <div class="col-5">
                    <div class=" d-flex date-time">
                        <div class="mx-3">
                            <p class="text-white h4">NGÀY:</p>
                        </div>
                        <div class="mx-3">
                            <span class="text-danger h4 font-weight-bold" id="date"></span>
                            <script>
                                function refreshTime() {
                                    var dt = new Date();
                                    var month = dt.getUTCMonth() + 1; //months from 1-12
                                    var day = dt.getUTCDate();
                                    var year = dt.getUTCFullYear();
                                    var newDate = day + '/' + month + '/' + year;
                                    document.getElementById("date").innerHTML = newDate;
                                }
                                setInterval(refreshTime, 1000);
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class=" d-flex date-time">
                        <div class="mx-3">
                            <p class="text-white h4">GIỜ:</p>
                        </div>
                        <div class="mx-3">
                            <span class="text-danger h4 font-weight-bold" id="time"></span>
                            <script>
                                function refreshTime() {
                                    var dt = new Date();
                                    document.getElementById("time").innerHTML = dt.toLocaleTimeString();
                                }
                                setInterval(refreshTime, 1000);
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" flex-column mx-5 mb-1">
                <div class=" flex">
                    <div class="col-6 bg-light border border-dark d-flex">
                        <p class="h5 font-weight-bold">LOẠI VÀNG</p>
                    </div>
                    <div class="col-3 bg-light border border border-dark d-flex">
                        <p class="h5 font-weight-bold">MUA VÀO</p>
                    </div>
                    <div class="col-3 bg-light border border-dark d-flex">
                        <p class="h5 font-weight-bold">BÁN RA</p>
                    </div>
                </div>
                <div class=" maque scroll-height">
                    <!-- <marquee behavior="alternate" direction="down" scrolldelay="10" class="col-12 full-height"> -->
                    <div class="col-12 full-height">
                        <div class="flex">
                            <div
                                class="col-6 border border-dark flex-column"  contenteditable="true">
                                <div>
                                    <p class="text-white h5">VÀNG MIẾNG</p>
                                </div>
                                <div>
                                    <p class="color-gold h5">SJC</p>
                                </div>
                            </div>
                            <div class="col-3 border border-dark d-flex">
                                <p class="text-danger h1 font-weight-bold" contenteditable="true">3456</p>
                            </div>
                            <div class="col-3 border border-dark d-flex">
                                <p class="text-danger h1 font-weight-bold" contenteditable="true">7896</p>
                            </div>
                        </div>
                        <div class=" flex">
                            <div class="col-6 border border-dark flex-column" contenteditable="true">
                                <div>
                                    <p class="text-white h5">VÀNG MIẾNG</p>
                                </div>
                                <div>
                                    <p class="text-white h5">PHUNHUANPNJ - DONGABANK</p>
                                </div>
                                <div>
                                    <p class="color-gold h5">PNJ - DAB</p>
                                </div>
                            </div>
                            <div class="col-3 border border-dark d-flex">
                                <p class="text-danger h1 font-weight-bold" contenteditable="true">3456</p>
                            </div>
                            <div class="col-3 border border-dark d-flex">
                                <p class="text-danger h1 font-weight-bold" contenteditable="true">7896</p>
                            </div>
                        </div>
                        <div class=" flex">
                            <div
                                class="col-6 border border-dark flex-column" contenteditable="true">
                                <div>
                                    <p class="text-white h5">NỮ TRANG 9.999</p>
                                </div>
                                <div>
                                    <p class="color-gold h5">(24K)</p>
                                </div>
                            </div>
                            <div class="col-3 border border-dark d-flex">
                                <p class="text-danger h1 font-weight-bold" contenteditable="true">3456</p>
                            </div>
                            <div class="col-3 border border-dark d-flex">
                                <p class="text-danger h1 font-weight-bold" contenteditable="true">7896</p>
                            </div>
                        </div>
                        <div class=" flex">
                            <div
                                class="col-6 border border-dark flex-column" contenteditable="true">
                                <div>
                                    <p class="text-white h5">NỮ TRANG 920</p>
                                </div>
                                <div>
                                    <p class="color-gold h5">(22K)</p>
                                </div>
                            </div>
                            <div class="col-3 border border-dark d-flex">
                                <p class="text-danger h1 font-weight-bold" contenteditable="true">3456</p>
                            </div>
                            <div class="col-3 border border-dark d-flex">
                                <p class="text-danger h1 font-weight-bold" contenteditable="true">7896</p>
                            </div>
                        </div>
                        <div class=" flex">
                            <div
                                class="col-6 border border-dark flex-column" contenteditable="true">
                                <div>
                                    <p class="text-white h5">NỮ TRANG 750</p>
                                </div>
                                <div>
                                    <p class="color-gold h5">(18K)</p>
                                </div>
                            </div>
                            <div class="col-3 border border-dark d-flex">
                                <p class="text-danger h1 font-weight-bold" contenteditable="true">3456</p>
                            </div>
                            <div class="col-3 border border-dark d-flex">
                                <p class="text-danger h1 font-weight-bold" contenteditable="true">7896</p>
                            </div>
                        </div>
                        <div class=" flex">
                            <div
                                class="col-6 border border-dark flex-column" contenteditable="true">
                                <div>
                                    <p class="text-white h5">NỮ TRANG 585w</p>
                                </div>
                                <div>
                                    <p class="color-gold h5">(14K)</p>
                                </div>
                            </div>
                            <div class="col-3 border border-dark d-flex">
                                <p class="text-danger h1 font-weight-bold" contenteditable="true">3456</p>
                            </div>
                            <div class="col-3 border border-dark d-flex">
                                <p class="text-danger h1 font-weight-bold" contenteditable="true">7896</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('./pnj-all/javascript/zoom.js') }}"></script>
    </section>

@endsection
