<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('pnj-all/Bootstrap-css/bootstrap.min.css') }}">
    <script src="{{ asset('pnj-all/Bootstrap-js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('pnj-all/css/pnjmain.css?v=2.0') }}">
    <title>Document</title>
</head>

<body>
    <style>
        table,
        td,
        th {
            border: 4px solid #e4a11b;
            padding: .5em;
        }
    </style>
    <?php
    $number = intval($arrayProduct['price']);
    $formattedNumber = number_format($number, 0, '.', ',');
    
    ?>
    
    <center>
        <h1>Cảm ơn quý khách, đơn hàng đã được xác nhận</h1>
        <table style="border: 2px solid #e4a11b; margin: .5em">
            <thead>
                <tr>
                    <th style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.5em;"
                        class="fw-bold fs-4">Tên sản phẩm</th>
                    <th style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.5em;"
                        class="fw-bold fs-4">Mã đơn hàng</th>
                    <th style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.5em;"
                        class="fw-bold fs-4">Trọng lượng</th>
                    <th style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.5em;"
                        class="fw-bold fs-4">Giá sản phẩm</th>
                    <th style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.5em;"
                        class="fw-bold fs-4">Thời gian đặt hàng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.4em;"
                        class="fs-5">{{ $arrayProduct['name'] }}</td>
                   
                    </td>
                    <td style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.4em;"
                        class="fs-5">{{ $arrayProduct['bar_code'] }}</td>
                    <td style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.4em;"
                        class="fs-5">{{ $arrayProduct['weight'] }}</td>
                    <td style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.4em;"
                        class="fs-5"><span class='font3'> {{ $formattedNumber }}vnđ</span>
                    </td>
                    <td style="border: 2px solid rgb(228,161,27); padding: .5em; text-align: center; font-size: 1.4em;"
                        class="fs-5">{{ $dateTime }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('pnj.template') }}" class="m-2">Truy cập để theo dõi đơn hàng</a>
    </center>
</body>

</html>
