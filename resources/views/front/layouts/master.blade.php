<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        @yield('title')
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->	
        @include('front.includes.link')
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin"></div>
            <div class="pulse"></div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
            <!-- header-->
            @include('front.includes.header')
            <!--  header end -->	
            <!-- wrapper -->	
            <div id="wrapper">
                <!-- Content-->   
                <div class="content">
                    @yield('konten')
                </div>
                <!-- Content end -->      
            </div>
            <!-- wrapper end -->
            <!--footer -->
            @include('front.includes.footer')
            <!--footer end  -->
            <!--register form -->
            @include('front.includes.modal')
            <!--register form end -->
            <a class="to-top"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        @include('front.includes.script')
    </body>
</html>
@yield('footscript')