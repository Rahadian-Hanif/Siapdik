
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('/fonts/icomoon/style.css')}}">

        <link rel="stylesheet" href="{{asset('/css/owl.carousel.min.css')}}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
        
        <!-- Style -->
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">

        <title>Login</title>
    </head>
    <body>
    

    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('{{asset('assets/img/Group 39 v2.svg')}}');"></div>
        <div class="contents order-2 order-md-1">

        <div class="container">
            <div class="row align-items-center justify-content-center">
            <div class="col-md-7">
                <div class="mb-5 text-center">
                    <img src="{{asset('assets/img/LOGO_DISDIK-removebg-preview.svg')}}" alt="" width="100" height="90">
                    <img src="{{asset('assets/img/LOGO_PAUD-removebg-preview.svg')}}" alt="" width="100" height="90">
                </div>
                <div class="mb-4 text-center" style="color: #375cd5;">
                    <h3>Silahkan Masuk</h3>
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group last mb-3 rounded-pill" style="border-color: #375cd5;">
                        <label for="username">NPSN</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group last mb-3 rounded-pill" style="border-color: #375cd5;">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <input type="submit" value="Log In" class="btn btn-block rounded-pill text-white" style="background-color: #375cd5;">

                </form>
            </div>
            </div>
        </div>
        </div>

        
    </div>
        
        

        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
    </body>
</html>