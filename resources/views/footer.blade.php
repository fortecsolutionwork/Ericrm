<section class="footer1">
    <div class="container by_wordpress">
        <p>This website is built with Wordpress by Webzolution.</p>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="https://parsleyjs.org/dist/parsley.js"></script>
<script type="text/javascript" src="https://parsleyjs.org/dist/parsley.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function() {
        $('#demo-form').parsley();
    });

    $('.iti__country-name').click(function() {
        var code = $(this).next('.iti__dial-code').text();
        $("#phone_code").val(code);
    });

    $('#mySelect2').select2();
    $('.mySelect2').select2();
    $(".customer").click(function() {
        $(".side-main-menu").toggleClass("side-menu-open");
    });

    // Slidor
    function myFunction() {
        var x = document.getElementById("pages");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
    $('.testimonials_tabs').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        dots: true,
    });

    $('.mobile_brand_images').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 2,
        dots: true,
    });


    $('.Customers_tabs').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        dots: true,
        centerMode: true,
        centerPadding: '30px',
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
</script>

</body>

</html>