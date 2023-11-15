
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Lastro BTC </title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="assets/css/app.css" />

        @yield('style')
    </head>
    <body>
        <nav class="navbar">
            <div class="navbar-logo">
                <a href="/">
                    <img src="{{ asset("assets/image/logo.png") }}" />
                </a>
            </div>
            <ul class="menu">
                <li class="menu-item">
                    <a href="#">Downloads</a>
                </li>
                <li class="menu-item">
                    <a href="#" >Github</a>
                </li>
                <li class="menu-item">
                    <a href="#">Donate</a>
                </li>
                <li class="menu-item">
                    <a href="#">About</a>
                </li>
            </ul>
            <div class="navbar-docs">
                <a class="btn-docs" href="#">Documentation</a>
            </div>
        </nav>
        <div class="row">
            @yield('content')
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="assets/js/app.js"></script>

        @yield('script')
    </body>
</html>