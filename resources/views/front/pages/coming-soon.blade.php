<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Kumpool.com - Coming Soon</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        @include('front.includes.link')
    </head>
    <body style="background:#fff !important;">
        <!-- loader-->
        <div class="loader-wrap">
            <div class="pin"></div>
            <div class="pulse"></div>
        </div>
        <!--loader end -->
        <!--Main-->
        <div id="main">
            <!--wrapper -->
            <div class="fixed-bg">
                <div class="bg"  data-bg="images/bg/1.jpg"></div>
                <div class="overlay" style="background:#fff !important;"></div>
                <div class="bubble-bg"></div>
            </div>
            <!-- cs-wrapper -->
            <div class="cs-wrapper fl-wrap">
                <!-- container  -->
                <div class="container small-container counter-widget" data-countDate="09/12/2019">
                    <div class="cs-logo"><img src="{{asset('front/images/logo_kumpool_tr.png')}}" alt="" style="height:130px;"></div>
                    <span class="section-separator"></span>
                    <h4 class="soon-title" style="font-size:25pt !important;color:#111">Kanal Investasi Anda Sedang Kami Persiapkan</h4>
                    <h3 class="soon-title" style="font-size:50pt !important;color:#111">We're Getting <span style="color:#FF6500">Ready !!</span></h3>
                    <!-- countdown -->
                    <i class="fa fa-smile-o" style="font-size:40pt !important;color:#FF6500"></i>
                    <i class="fa fa-smile-o" style="font-size:40pt !important;color:#FF6500"></i>
                    <!-- cs-social -->
                    <div class="cs-social fl-wrap">
                        <ul>
                            <li><a href="#" target="_blank" ><i class="fa fa-facebook-official"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                    <!-- cs-social end -->
                </div>
                <!-- container end -->
            </div>
            <!-- cs-wrapper end-->
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        @include('front.includes.script')
    </body>
</html>