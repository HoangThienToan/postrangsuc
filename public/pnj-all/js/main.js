// Run multiple slide by the splide

document.addEventListener('DOMContentLoaded', function () {
    var splide = new Splide('#splide', {
        type: 'loop',
        perPage: 1,
        // rewind: true,
        // rewindSpeed:1000,
        autoplay: true,
    })
    splide.mount();
});

document.addEventListener('DOMContentLoaded', function () {
    var splideTrend = new Splide('#splideTrend', {
        // type: 'loop',
        perMove: 1,
        height: '10em',
        width: 'auto',
        // focus: 'center',
        rewindSpeed: 1500,
        rewind: true,
        // autoplay: true
        pagination: false,
        perPage: 8,
        breakpoints:{
            1024: {
                perPage: 6,
            },
            640:{
                perPage: 4,
                // autoWidth: true,
                // width: '100%',

            },
        },
    })
    splideTrend.mount();

});

document.addEventListener('DOMContentLoaded', function () {
    var splideBrand = new Splide('#splideBrand', {
        perMove: 1,
        height: 'auto',
        width: '100%',
        rewind: true,
        autoplay: true,
        rewindSpeed: 1500,
        pagination: false,
        updateOnmove: true,
        perPage: 3,
        breakpoints: {
            1024: {
                perPage: 2
            },
            640: {
                perPage: 1
            },
        },
    })
    splideBrand.mount();
});

document.addEventListener('DOMContentLoaded', function () {
    var splideSales = new Splide('#splideSales', {
        // type: 'loop',
        perPage: 4,
        perMove: 1,
        height: 'auto',
        width: '100%',
        // focus: 'center',
        rewindSpeed: 1500,
        rewind: true,
        autoplay: true,
        pagination: false,
        breakpoints:{
            640:{
                perPage:2
            }
        }

    })
    splideSales.mount();
});

document.addEventListener('DOMContentLoaded', function () {
    var splideCollections = new Splide('#splideCollections', {
        // type: 'loop',
        perPage: 3,
        perMove: 1,
        height: 'auto',
        width: '100%',
        // focus: 'center',
        rewindSpeed: 1500,
        rewind: true,
        autoplay: true,
        pagination: false,
        breakpoints:{
            640:{
                perPage:2
            }
        }
    })
    splideCollections.mount();
});

document.addEventListener('DOMContentLoaded', function () {
    var splideTradition = new Splide('#splideTradition', {
        // type: 'loop',
        perPage: 3,
        perMove: 1,
        height: 'auto',
        width: '100%',
        // focus: 'center',
        rewindSpeed: 1500,
        rewind: true,
        autoplay: true,
        pagination: false,
        breakpoints:{
            640:{
                perPage:2
            }
        }
    })
    splideTradition.mount();
});

document.addEventListener('DOMContentLoaded', function () {
    var splideMarry = new Splide('#splideMarry', {
        // type: 'loop',
        perPage: 4,
        perMove: 1,
        height: 'auto',
        width: '100%',
        // focus: 'center',
        rewindSpeed: 1500,
        rewind: true,
        autoplay: true,
        pagination: false,
        breakpoints:{
            640:{
                perPage:2
            }
        }
    })
    splideMarry.mount();
});

document.addEventListener('DOMContentLoaded', function () {
    var splideEcz = new Splide('#splideEcz', {
        // type: 'loop',
        perPage: 4,
        perMove: 1,
        height: 'auto',
        width: '100%',
        // focus: 'center',
        rewindSpeed: 1500,
        rewind: true,
        autoplay: true,
        pagination: false,
        breakpoints:{
            640:{
                perPage:2
            }
        }
    })
    splideEcz.mount();
});

document.addEventListener('DOMContentLoaded', function () {
    var splideBrace = new Splide('#splideBrace', {
        // type: 'loop',
        perPage: 4,
        perMove: 1,
        height: 'auto',
        width: '100%',
        // focus: 'center',
        rewindSpeed: 1500,
        rewind: true,
        autoplay: true,
        pagination: false,
        breakpoints:{
            640:{
                perPage:2
            }
        }
    })
    splideBrace.mount();
});

document.addEventListener('DOMContentLoaded', function () {
    var splideDisney = new Splide('#splideDisney', {
        // type: 'loop',
        perPage: 4,
        perMove: 1,
        height: 'auto',
        width: '100%',
        // focus: 'center',
        rewindSpeed: 1500,
        rewind: true,
        // autoplay: true
        pagination: false,
        breakpoints:{
            640:{
                perPage:2
            }
        }
    })
    splideDisney.mount();
});

document.addEventListener('DOMContentLoaded', function () {
    var splideWatch = new Splide('#splideWatch', {
        // type: 'loop',
        perPage: 4,
        perMove: 1,
        height: 'auto',
        width: '100%',
        // focus: 'center',
        rewindSpeed: 1500,
        rewind: true,
        // autoplay: true
        pagination: false,
        breakpoints:{
            640:{
                perPage:2
            }
        }
    })
    splideWatch.mount();
});

