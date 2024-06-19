<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('pnj-all/Bootstrap-css/bootstrap.min.css') }}">
    <script src="{{ asset('pnj-all/Bootstrap-js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('pnj-all/css/pnjmain.css?v=2.0') }}">
    <title>Mail Notification</title>
</head>

<body>
    <?php
    $number = intval($arrayProduct['price']);
    $formattedNumber = number_format($number, 0, '.', ',');
    ?>
    <div style="width: 80%; margin: 0 auto;">
        <center>
            <h1>Thông báo xác nhận đơn hàng</h1>
            <div>
                <h2>
                    Khách hàng {{ $data['data']['name'] }} đã đặt hàng vui lòng phản hồi.
                </h2>
                <table style="border: 2px solid #e4a11b; margin: .5em">
                    <thead>
                        <tr>
                            <th colspan="3"
                                style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.8em;">
                                Thông tin khách hàng
                            </th>
                            <th colspan="4"
                                style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.8em;">
                                Thông tin sản phẩm
                            </th>
                        </tr>
                        <tr>
                            <th style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.5em;"
                                class="fw-bold fs-4">Họ và tên</th>
                            <th style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.5em;"
                                class="fw-bold fs-4">SĐT</th>
                            <th style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.5em;"
                                class="fw-bold fs-4">Địa chỉ</th>
                            <th style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.5em;"
                                class="fw-bold fs-4">Tên sản phẩm</th>
                            <th style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.5em;"
                                class="fw-bold fs-4">Giá sản phẩm</th>
                            <th style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.5em;"
                                class="fw-bold fs-4">Mã đơn hàng</th>
                            <th style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.5em;"
                                class="fw-bold fs-4">Thời gian đặt hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.4em;"
                                class="fs-5">{{ $data['data']['name'] }}</td>
                            <td style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.4em;"
                                class="fs-5">{{ $data['data']['phone'] }}</td>
                            <td style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.4em;"
                                class="fs-5">{{ $data['data']['address'] }}, {{ $data['data']['wards'] }},
                                {{ $data['data']['district'] }}, {{ $data['data']['city'] }}</td>
                            <td style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.4em;"
                                class="fs-5">{{ $arrayProduct['name'] }}</td>
                            <td style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.4em;"
                                class="fs-5">{{ $formattedNumber }}vnđ</td>
                            <td style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.4em;"
                                class="fs-5">{{ $arrayProduct['bar_code'] }}</td>
                            <td style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.4em;"
                                class="fs-5">{{ $data['data']['dateTime'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </center>
    </div>

</body>
