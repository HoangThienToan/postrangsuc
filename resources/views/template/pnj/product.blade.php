<section class="container_product">
    <div>
        <ul class="flex-center reset-li">
            <li>
                <a href="{{ route('pnj.template') }}" class="text-muted">Trang chủ / </a>
            </li>
            <li>
                <a class="text-muted">{{ $arrayProduct['category'] }} / </a>
            </li>
            <li class="text-dark">
                <a>{{ $arrayProduct['name'] }}</a>
            </li>
        </ul>
    </div>
    <div class="d-flex my-5 column">
        <div class="hide-desktop">
            <div id="slideProduct" class="splide"
                aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
                <div class="splide__track">
                    <ul class="splide__list">
                        <!-- Các slide thumbnail -->
                        <li class="splide__slide rounded-4 flex-center">
                            <img class="" src="{{ asset('uploads/img/' . $arrayProduct['image']) }}"
                                alt="">
                        </li>
                        @foreach ($arrayProduct['fileNames'] as $index => $media)
                            <li class="splide__slide rounded-4 flex-center">
                                <img class="" src="{{ asset('uploads/media/' . $media) }}" alt="">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-flex my-2 hide-mobile">
            <div id="thumbnail-carousel" class="splide"
                aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
                <div class="relative">
                    <div class="splide__arrows">
                        <button class="splide__arrow splide__arrow--prev splide--arrow prev">
                            <i class="fa-solid fa-chevron-up"></i>
                        </button>
                        <button class="splide__arrow splide__arrow--next splide--arrow next">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="splide__track">
                        <ul class="splide__list" style='height:465px !important;'>
                            <!-- Các slide thumbnail -->
                            <li class="splide__slide rounded-4 flex-center">
                                <img class="" src="{{ asset('uploads/img/' . $arrayProduct['image']) }}"
                                    alt="">
                            </li>
                            @foreach ($arrayProduct['fileNames'] as $index => $media)
                                <li class="splide__slide rounded-4 flex-center">
                                    <div>
                                        <img class="" src="{{ asset('uploads/media/' . $media) }}" alt="">
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div id="main-carousel" class="splide flex-center w-100">
                <div class="splide__track">
                    <ul class="splide__list">
                        <!-- Các slide chính -->
                        <li class="splide__slide">
                            <img class="" src="{{ asset('uploads/img/' . $arrayProduct['image']) }}"
                                alt="">
                        </li>
                        @foreach ($arrayProduct['fileNames'] as $media)
                            <li class="splide__slide">
                                <div>
                                    <img class="" src="{{ asset('uploads/media/' . $media) }}" alt="">
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mt-mobile">
            <div>
                <h3>
                    {{ $arrayProduct['name'] }}
                </h3>
                <div class="d-flex price fs-4">
                    <span data-price='{{ $arrayProduct['price'] }}' class='font'
                        style="color: #021499; font-weight:bold; "></span>
                    <span class="font" style="color: #021499; font-weight:bold">
                        &#8363;</span>
                </div>
                <div>
                    <p style="color: #021499; font-weight:bold; ">Còn hàng - Gọi Hotline Ưu đãi độc quyền</p>
                </div>
                <div class="border border-primary border-2 rounded-4">
                    <p class="p-2 bg-secondary bg-opacity-25">Ưu đãi:</p>
                    <div class="d-flex align-items-center">
                        <p class="p-2 fs-5">
                            <span><i class="fa-brands fa-cc-apple-pay "></i></span>
                            <span>
                                Mã <strong class="text-primary fst-italic">PNJVNPAY</strong> tự động hiển thị 50k cho
                                đơn từ 2 triệu khi quét
                            </span>
                        </p>
                    </div>
                    <div class="d-flex align-items-center">
                        <p class="p-2 fs-5">
                            <i class="fa-regular fa-credit-card "></i>
                            Nhập mã <strong class="text-primary fst-italic">PNJSUMMER</strong> giảm 2% tối đa 100k khi
                            thanh toán
                        </p>
                    </div>
                </div>
                <div class="flex-center my-2">
                    <a class="border bg-danger text-light w-100 p-2 rounded-4 cursor"
                        href="{{ route('checkout.template', $arrayProduct['id']) }}">
                        <h6>MUA NGAY</h6>
                        <p class="fst-italic">Miễn phí giao hàng tận nhà hoặc tại cửa hàng</p>
                    </a>
                </div>
                <div>
                    <div class="mb-2">
                        <p> <i class="fa-solid fa-check border rounded-circle bg-success text-light p-1 me-1"></i>Đổi
                            size
                            trong
                            72h tại hệ thống cửa hàng PNJ</p>
                    </div>
                    <div>
                        <p> <i class="fa-solid fa-check border rounded-circle bg-success text-light p-1 me-1"></i>Miễn
                            phí
                            giao
                            nhanh toàn quốc 1-7 ngày, Xem thêm chính sách giao hàng</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>
        <div class="py-2">
            <div class="d-flex align-items-center justify-content-between p-2 px-4 rounded shadow cursor"
                data-bs-toggle="collapse" href="#collapseDescription" aria-expanded="false">
                <h3>Thông số và mô tả</h3>
                <i class="fa-solid fa-chevron-down fs-2"></i>
            </div>
            <div class="collapse p-2" id="collapseDescription">
                <p>
                    Trọng lượng: {{ $arrayProduct['weight'] }}
                </p>
                <p>
                    SKU: {{ $arrayProduct['sku'] }}
                </p>
                <p>
                    Bar_code: {{ $arrayProduct['bar_code'] }}
                </p>
                <p>
                    {{ $arrayProduct['description'] }}
                </p>
            </div>
        </div>
        <div class="py-2">
            <div class="d-flex align-items-center justify-content-between p-2 px-4 rounded shadow cursor"
                data-bs-toggle="collapse" href="#collapseReview" aria-expanded="false">
                <h3>Bình luận</h3>
                <i class="fa-solid fa-chevron-down fs-2"></i>
            </div>
            <div class="collapse p-2" id="collapseReview">
                <p>Khách hàng review</p>
            </div>
        </div>
        <div class="py-2">
            <div class="d-flex align-items-center justify-content-between p-2 px-4 rounded shadow cursor"
                data-bs-toggle="collapse" href="#collapseService" aria-expanded="false">
                <h3>Dịch vụ sau mua</h3>
                <i class="fa-solid fa-chevron-down fs-2"></i>
            </div>
            <div class="collapse p-2" id="collapseService">
                <h4>Bảo hành miễn phí 3 tháng</h4>
                <div>
                    <p>
                        Các sản phẩm Bạc sẽ được bảo hành miễn phí 3 tháng đầu về mặt kỹ thuật, nước xi.​
                    </p>
                    <p>
                        Từ tháng 4 đến hết tháng thứ 12, sản phẩm sẽ được bảo hành có tính phí.​​
                    </p>
                    <p>
                        Trên 12 tháng chưa nhận bảo hành.
                    </p>
                </div>
                <h4>
                    Siêu âm trọn đời bằng máy
                </h4>
                <p>Đối với sản phẩm bị oxy hóa, xuống màu, sẽ được siêu âm làm sạch bằng máy chuyên dụng (siêu âm,
                    không
                    xi) miễn phí trọn đời tại cửa hàng.
                </p>

                <h4>
                    Thay miễn phí đá CZ, tổng hợp
                </h4>
                <div>
                    <div>
                        Thay miễn phí đá CZ, đá tổng hợp trong suốt thời gian sản phẩm được bảo hành.​
                    </div>
                    <div>
                        <p>
                            Riêng đối với dòng sản phẩm charm DIY chỉ nhận bảo hành sản phẩm trong các trường hợp
                            sau:​​
                        </p>
                        <p>
                            - Sản phẩm là mẫu bạc hoàn toàn (không gắn đá, nhựa, thủy tinh).​​​
                        </p>
                        <p>
                            - Mẫu bạc có phủ colorit.​​​
                        </p>
                    </div>
                    <div>
                        <p>
                            * Không áp dụng bảo hành cho các trường hợp sau:​
                        </p>
                        <p>
                            - Dây chuyền, lắc chế tác bị đứt gãy; sản phẩm bị biến dạng hoặc hư hỏng nặng;​
                        </p>
                        <p>
                            - Khách hàng cung cấp thông tin truy lục hóa đơn không chính xác.​​
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2">
            <div class="d-flex align-items-center justify-content-between p-2 px-4 rounded shadow cursor"
                data-bs-toggle="collapse" href="#collapseQues" aria-expanded="false">
                <h3>Câu hỏi thường gặp</h3>
                <i class="fa-solid fa-chevron-down fs-2"></i>
            </div>
            <div class="collapse p-2" id="collapseQues">
                <h4>Online có ưu đãi gì</h4>
                <p>
                    PNJ mang đến nhiều trải nghiệm mua sắm hiện đại khi mua Online:
                </p>
                <p>
                    - Ưu đãi độc quyền Online với hình thức thanh toán đa dạng.
                </p>
                <p>
                    - Đặt giữ hàng Online, nhận tại cửa hàng.
                </p>
                <p>
                    - Miễn phí giao hàng từ 1-7 ngày trên toàn quốc và giao hàng trong 3 giờ tại một số khu vực
                    trung
                    tâm với các sản phẩm có gắn nhãn .
                </p>
                <p>
                    - Trả góp 0% lãi suất với đơn hàng từ 3 triệu.
                </p>
                <h4>
                    Thu mua lại trang sức
                </h4>
                <p>
                    Có dịch vụ thu đổi trang sức tại hệ thống trên toàn quốc
                </p>
                <h4>
                    Sản phẩm đeo lâu có xỉn màu không, bảo hành thế nào?
                </h4>
                <p>
                    Do tính chất sản phẩm, có khả năng bị oxy hóa, xuống màu. Có chính sách bảo hành miễn phí về lỗi
                    kỹ
                    thuật, nước xi:
                </p>
                <p>
                    - Trang sức vàng: 6 tháng.
                </p>
                <p>
                    - Tráng sức bạc: 3 tháng.
                </p>
            </div>
        </div>
    </div>
    <div>
        <div>
            <h3 class="m-2" style="color: #021499;">Sản phẩm bán chạy</h3>
            <div class="splide d-flex justify-content-center align-items-center m-4" id="slideGoods"
                aria-label="Placeholder Example">
                <div class="position-relative">
                    <div class="splide__arrows">
                        <button class="splide__arrow splide__arrow--prev splide--arrow prev-product">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="splide__arrow splide__arrow--next splide--arrow next-product">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                    <div class="splide__track ">
                        <ul class="splide__list reset-li relative" style="width:98%">
                            @foreach ($allProduct['arrayProduct'] as $all)
                                <li data-id-media="{{ $all['id'] }}"
                                    class="splide__slide sales-gra d-flex flex-column justify-content-center">
                                    <div class="zoom" onclick="redirectToProduct('{{ route('product.template', $all['id']) }}')">
                                        <img class="mySlides-{{ $all['id'] }} fadeS slideShow"
                                            src="{{ asset('uploads/img/' . $all['image']) }}" alt="">
                                    </div>
                                    <div class="relative" style="z-index: 123">
                                        <span
                                            class='text-center d-flex align-items-center justify-content-center'>{{ $all['product'] }}</span>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span data-price='{{ $all['max_price'] }}'
                                                class='font text-center d-flex align-items-center justify-content-center'
                                                style="color: burlywood; font-weight:bold; "></span>
                                            <p class="font" style="color: burlywood; font-weight:bold">
                                                &#8363;</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div>
                <h3 class="m-2" style="color: #021499;">Sản phẩm đã xem</h3>
                <div class="splide d-flex justify-content-center align-items-center m-4" id="slideView"
                    aria-label="Placeholder Example">
                    <div class="position-relative">
                        <div class="splide__arrows">
                            <button class="splide__arrow splide__arrow--prev splide--arrow prev-product">
                                <i class="fa-solid fa-chevron-left"></i>
                            </button>
                            <button class="splide__arrow splide__arrow--next splide--arrow next-product">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>
                        <div class="splide__track ">
                            <ul class="splide__list reset-li relative" style="width:98%">
                                @foreach ($allProduct['arrayProduct'] as $all)
                                    <li data-id-media="{{ $all['id'] }}"
                                        class="splide__slide sales-gra d-flex flex-column justify-content-center">
                                        <div class="zoom" onclick="redirectToProduct('{{ route('product.template', $all['id']) }}')">
                                            <img class="mySlides-{{ $all['id'] }} fadeS slideShow"
                                                src="{{ asset('uploads/img/' . $all['image']) }}" alt="">
                                        </div>
                                        <div class="relative" style="z-index: 123">
                                            <span
                                                class='text-center d-flex align-items-center justify-content-center'>{{ $all['product'] }}</span>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span data-price='{{ $all['max_price'] }}'
                                                    class='font text-center d-flex align-items-center justify-content-center'
                                                    style="color: burlywood; font-weight:bold; "></span>
                                                <p class="font" style="color: burlywood; font-weight:bold">
                                                    &#8363;</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Use li with href
    function redirectToProduct(url) {
        window.location.href = url;
    }
</script>
