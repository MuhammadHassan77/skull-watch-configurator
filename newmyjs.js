
$(document).ready(function () {

    $('.style-1').click(function () {
        $(".tabsrt").addClass('d-none');
        $($(this).data('tab')).removeClass('d-none');

        $(".style-1").removeClass('active-style');
        $(this).addClass('active-style');
    });

    $('.style-box-btn').click(function () {
        $('#myCanvas').css('transform', 'translateX(-15%)');
        $('.dot-menu').css('transform', 'translateX(-270%)');
        $(".watchmodels").removeClass('d-none');
        $(".watchtip").addClass('d-none');
    })

    $('.desgin-box-btn').click(function () {
        $('#myCanvas').css('transform', 'translateX(-5%)');
        $('.dot-menu').css('transform', 'translateX(-160%)');
        $(".color-popup").removeClass('d-none');
    });

    $('.case-btn').click(function () {
        $('.hands-main-div,.sec-hands-div').hide();
        $('.case-main-div').show();
    });

    $(document).on("click", ".case-style", function () { $(".style-box-btn,.case-btn").trigger("click"); })
    $(document).on("click", ".hand-style", function () { $(".style-box-btn,.hands-btn").trigger("click"); })
    $(document).on("click", ".second-hand-style", function () { $(".style-box-btn,.second-hand-btn").trigger("click"); })
    
    $('.hands-btn').click(function () {
        $('.case-main-div,.sec-hands-div').hide();
        $('.hands-main-div').show();
    });

    $('.second-hand-btn').click(function () {
        $('.case-main-div,.hands-main-div').hide();
        $('.sec-hands-div').show();
    });

    $('.right-popup .model-box').click(function () {
        $('.right-popup .model-box').removeClass('active-model');
        $('.right-popup .model-text').removeClass('active-model-text');
        $(this).addClass('active-model');
        $(this).find('.model-text').addClass('active-model-text');
    });

    $('.color-box').click(function () {
        $('.color-box').removeClass('active-clr');
        $(this).addClass('active-clr');
    });


    $('.zoom-op').click(function () {
        $('.zoom-btns').toggle();
        $(this).toggleClass('toggle-zoom');
    });


    function myFunction(x) {
        if (x.matches) {
            $('.last-clr').attr('style', 'margin-right:5% !important;');

            $('.style-box-btn').click(function () {
                $('#myCanvas').css('transform', 'translateX(0%)');
                $('.dot-menu').css('transform', 'translateX(0%)');

            })

            $(document).on('click', '#desk-sx svg g', function () {
                $('#myCanvas').css('transform', 'translateX(0%)');
                $('.dot-menu').css('transform', 'translateX(0%)');
            });
            $('.canvas-div').click(function () {
                $('.color-popup').hide();
            });

            $(document).on('click', '.newControlMenu', function () {
                $('#myCanvas').css('transform', 'translateX(0%)');
            });

            $(document).on('click', '.mob-skull-stl-1 .model-box', function () {
                $(".watchskull").hide();
                // $(".mob-skull-stl").show();
            })

        } else {
            $('.last-clr').removeAttr('style');
        }
    }

    var x = window.matchMedia("(max-width: 576px)")
    myFunction(x)
    x.addListener(myFunction)


});//end-document.ready
