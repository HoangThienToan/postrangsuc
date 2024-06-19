@extends('layouts.app')
@section('title', __('Giá vàng'))
<link rel="stylesheet" href="{{ asset('./pnj-all/cssform/style_doji.css?v=3.7') }}">
<link rel="stylesheet" href="{{ asset('./pnj-all/splide-4.0.7/dist/css/splide.min.css') }}">
@section('content')
    <section class="background-light" id="light-mode">
        <div class="col-12 theme-head m-3">
            <button class="btn btn-secondary font-bold" onclick="zoomIn()">Phóng to</button>
            <button class="btn btn-secondary font-bold" onclick="zoomOut()">Thu nhỏ</button>
        </div>
        <h2 class="col-md-12 tablepress-table-name head-name" contenteditable="true">
            BẢNG GIÁ VÀNG
        </h2>
        <div class="main">
            <div class="flex-column">
                <div id="" class="col-md-4">
                    <div class="splide" role="group">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <iframe class="d-block w-100" alt=" Biểu đồ tỷ giá "
                                        src="https://goldbroker.com/widget/live/XAU?currency=VND&height=320" scrolling="no"
                                        frameborder="0" width="100%" height="50%"
                                        style="border: 0; overflow: hidden;"></iframe><br>Gold price by <a
                                        href="https://goldbroker.com/" style="text-transform: uppercase">GoldBroker.com</a>
                                </li>
                                <li class="splide__slide">
                                    <video class="video-bg fill hide-for-medium" preload="" playsinline="" autoplay=""
                                        muted="" loop="">
                                        <source src="https://cdn.webshopapp.com/shops/283663/files/296538447/access.mp4"
                                            type="video/mp4">
                                    </video>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-parent col-md-8 table-grand font-weight-bold" contenteditable="true">
                    <table id="table" data-toggle="table" class="table table-hover table-main light-mode table-responsive text-center">
                        <thead id="table-head" class="table-head">
                            <tr class="row-1">
                                <th data-field="state" data-filter-control="input" data-sortable="true"
                                    class="cl-head text-center">
                                    <strong> LOẠI VÀNG </strong>
                                </th>
                                <th data-field="date" data-filter-control="select" data-sortable="true"
                                    class="cl-head text-center">
                                    <strong> MUA VÀO</strong>
                                </th>
                                <th data-field="examen" data-filter-control="select" data-sortable="true" id="switch-theme"
                                    class="cl-head text-center">
                                    <strong>BÁN RA </strong>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tbody" class="table-bordered table-sm table-body light-mode">
                            <tr class="row-2 even">
                                <td> <strong> Vàng 9999 </strong></td>
                                <td><strong>5.400.000 </strong></td>
                                <td> <strong> 5.540.000</strong></td>
                            </tr>
                            <tr class="row-3 odd">
                                <td>Vàng 98</td>
                                <td>5.320.000</td>
                                <td>5.440.000</td>
                            </tr>
                            <tr class="row-4 even">
                                <td>Vàng 98/công ty</td>
                                <td>5.320.000</td>
                                <td>5.500.000</td>
                            </tr>
                            <tr class="row-5 odd">
                                <td>Vàng Sg 61%</td>
                                <td>3.150.000</td>
                                <td>3.500.000</td>
                            </tr>
                            <tr class="row-6 even">
                                <td>Vàng PNJ/650</td>
                                <td>3.250.000</td>
                                <td>5.600.000</td>
                            </tr>
                            <tr class="row-7 odd">
                                <td>Vàng PNJ/650</td>
                                <td>3.250.000</td>
                                <td>5.600.000</td>
                            </tr>
                            <tr class="row-8 even">
                                <td>Vàng trắng 416</td>
                                <td>2.100.000</td>
                                <td>2.500.000</td>
                            </tr>
                            <tr class="row-9 odd">
                                <td>Bạc</td>
                                <td>60.000</td>
                                <td>85.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>        
            <div class="iframe-top-dad col-md-10">
                <div class=" iframe-top">
                    <iframe scrolling="no" allowtransparency="true" frameborder="0"
                        src="https://s.tradingview.com/embed-widget/ticker-tape/?locale=vi_VN#%7B%22symbols%22%3A%5B%7B%22proName%22%3A%22OANDA%3ASPX500USD%22%2C%22title%22%3A%22S%26P%20500%22%7D%2C%7B%22proName%22%3A%22OANDA%3ANAS100USD%22%2C%22title%22%3A%22Nasdaq%20100%22%7D%2C%7B%22description%22%3A%22V%C3%A0ng%20th%E1%BA%BF%20gi%E1%BB%9Bi%22%2C%22proName%22%3A%22OANDA%3AXAUUSD%22%7D%2C%7B%22description%22%3A%22D%E1%BA%A7u%20th%C3%B4%20WTI%22%2C%22proName%22%3A%22TVC%3AUSOIL%22%7D%2C%7B%22description%22%3A%22%20%22%2C%22proName%22%3A%22GEMINI%3ABTCUSD%22%7D%5D%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Afalse%2C%22displayMode%22%3A%22adaptive%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A78%2C%22utm_source%22%3A%22giavang.net%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22ticker-tape%22%7D"
                        style="box-sizing: border-box; height: 80px; width: 100%;">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('./pnj-all/splide-4.0.7/dist/js/splide.min.js') }}"></script>
    <script>
        var splide = new Splide('.splide', {
            type: 'fade',
            perPage: 1,
            rewind: true,
            pagination: false,
            // rewindSpeed:1000,
            // autoplay: false,
        })
        splide.mount();

    </script>

    <script src="{{ asset('./pnj-all/javascript/zoom.js') }}"></script>

@endsection
