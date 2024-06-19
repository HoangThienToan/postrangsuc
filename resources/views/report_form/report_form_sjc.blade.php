@extends('layouts.app')
@section('title', __('Giá vàng'))
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="{{ asset('./pnj-all/cssform/style.css') }}">
<link rel="stylesheet" href="{{ asset('./pnj-all/cssform/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('./pnj-all/fontawesome-free-5.15.3-web/css/all.css') }}">

@section('content')

    <!-- Content Header (Page header) -->

    <section id="light-mode" data-theme="dark" class="bg-light">
        <header>
            <div class="d-flex e-flex mx-4" style='margin: 0 2em;'>
                <div class="">
                    <button id="btn-light" class="btn btn-mode-light" onclick="modeLight()">
                        <span class="material-icons mode-light">
                            light_mode
                        </span>
                    </button>
                    <button class="btn btn-secondary font-bold" onclick="zoomIn()">Phóng to</button>
                    <button class="btn btn-secondary font-bold" onclick="zoomOut()">Thu nhỏ</button>
                </div>
            </div>
            <div class="row nav-main">
                <div class="col-lg-4 logo">
                    <span class="title-logo">SJC</span>
                    <a class="btn btn-outline edit-logo"><i class="far fa-edit"></i></a>
                </div>
                <div class="col-lg-8">
                    <div class="title-gold" class="title-main-small">
                        <h4 class="title-company"><span>TẬP ĐOÀN VÀNG BẠC ĐÁ QUÝ SJC</span><a
                                class="btn btn-outline edit-title"><i class="far fa-edit"></i></a></h4>
                        <h3 class="title-header"><span>BẢNG GIÁ VÀNG</span></h3>
                    </div>
                </div>
            </div>
        </header>
        <section>
            <div class="row">
                <table class="col-lg-6 table-main flex-box">
                    <thead class="head-main-table flex-box">
                        <tr class="flex-box head-tr">
                            <th class="title-table-gold">
                                <span>LOẠI VÀNG</span>
                            </th>
                            <th class="title-table-gold">
                                <span>MUA VÀO</span>
                            </th>
                            <th class="title-table-gold">
                                <span>BÁN RA</span>
                                <a id="btn-add" class="btn btn-outline btn-add"><i class="fas fa-plus"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="body-main-table flex-box">
                        <tr class="flex-box body-tr">
                            <th class="title-table-small">
                                <span>AVPL / SJC</span>
                            </th>
                            <td class="content-main-table" id="td1">
                                <span>0000</span>
                            </td>
                            <td class="content-main-table" id="td2">
                                <span>0000</span>
                                <a class="btn btn-outline btn-edit"><i class="far fa-edit"></i></a>
                            </td>

                        </tr>
                        <tr class="flex-box body-tr">
                            <th class="title-table-small">
                                <span>KIM NGƯU</span>
                            </th>
                            <td class="content-main-table">
                                <span>0000</span>
                            </td>
                            <td class="content-main-table">
                                <span>0000</span>
                                <a class="btn btn-outline btn-edit"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                        <tr class="flex-box body-tr">
                            <th class="title-table-small">
                                <span>KIM THẦN TÀI</span>
                            </th>
                            <td class="content-main-table">
                                <span>0000</span>
                            </td>
                            <td class="content-main-table">
                                <span>0000</span>
                                <a class="btn btn-outline btn-edit"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                        <tr class="flex-box body-tr">
                            <th class="title-table-small">
                                <span>LỘC PHÁT TÀI</span>
                            </th>
                            <td class="content-main-table">
                                <span>0000</span>
                            </td>
                            <td class="content-main-table">
                                <span>0000</span>
                                <a class="btn btn-outline btn-edit"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                        <tr class="flex-box body-tr">
                            <th class="title-table-small">
                                <span>KIM NGÂN TÀI</span>
                            </th>
                            <td class="content-main-table">
                                <span>0000</span>
                            </td>
                            <td class="content-main-table">
                                <span>0000</span>
                                <a class="btn btn-outline btn-edit"><i class="far fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr class="flex-box body-tr">
                            <th class="title-table-small">
                                <span>NỮ TRANG 999</span>
                            </th>
                            <td class="content-main-table">
                                <span>0000</span>
                            </td>
                            <td class="content-main-table">
                                <span>0000</span>
                                <a class="btn btn-outline btn-edit"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                        <tr class="flex-box body-tr">
                            <th class="title-table-small">
                                <span>NỮ TRANG 18K</span>
                            </th>

                            <td class="content-main-table">
                                <span>0000</span>
                            </td>
                            <td class="content-main-table">
                                <span>0000</span>
                                <a class="btn btn-outline btn-edit"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-lg-6 flex-box slide-show">
                    <div class="flex-box time-date row">
                        <div class="flex-box col-lg-6 time">
                            <h4>Giờ:</h4>
                            <span id="MyClockDisplay" onload="showTime()">
                            </span>
                        </div>
                        <div class="flex-box col-lg-6 date">
                            <h4>Ngày:</h4>
                            <span id="getDate"></span>
                        </div>
                    </div>
                    <div class="slide-show-gold flex-box">
                        <div class="div-iframe" style="width:100%;"><iframe
                                src="https://goldbroker.com/widget/live/XAU?currency=USD&height=320" scrolling="no"
                                frameborder="0" width="100%" height="320"
                                style="border: 0; overflow: hidden;"></iframe><br>Gold price by <a
                                href="https://goldbroker.com/" style="text-transform: uppercase">GoldBroker.com</a>
                        </div>
                        {{-- <div id="slide-img1" class="mySlides"><img src="./img/picture-1.jpg" alt=""></div>
                        <div id="slide-img2" class="mySlides"><img src="./img/picture-2.jpg" alt=""></div>
                    </div>
                    <div class="icon-next-back flex-box">
                        <span class="material-icons back-icon" onclick="plusDivs(-1)">
                            chevron_left
                        </span>
                        <div class="dots-icon flex-box">
                            <span class="dot-icon" onclick="currentDiv(1)">
                            </span>
                            <span class="dot-icon" onclick="currentDiv(2)">
                            </span>
                            <span class="dot-icon" onclick="currentDiv(3)">
                            </span>
                        </div>
                        <span class="material-icons next-icon" onclick="plusDivs(1)">
                            navigate_next
                        </span> --}}
                    </div>

                    <a id="show-upload" class="btn btn-outline">Chỉnh sửa</a>
                    <div id="upload" style="display: none;">
                        <div><span>URL IFRAME nhúng:</span><input id="url-iframe"></div>
                        <div><span>URL hình ảnh:</span><input id="url-img1"></div>
                        <div><span>URL hình ảnh:</span><input id="url-img2"></div>
                        <button id="upload-slide">tải lên</button>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{ asset('./pnj-all/javascript/edit.js') }}"></script>
        <script src="{{ asset('./pnj-all/javascript/java.js') }}"></script>
        <script src="{{ asset('./pnj-all/javascript/zoom.js') }}"></script>
    </section>

@stop
