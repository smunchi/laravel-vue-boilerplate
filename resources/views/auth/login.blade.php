<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rate Hammer') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/adminator.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="app">
<div id="app">
    <div id='loader'>
        <div class="spinner"></div>
    </div>

    <script>
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            setTimeout(() => {
                loader.classList.add('fadeOut');
            }, 300);
        });
    </script>
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv"
             style='background-image: url("{{asset("images/bg.jpg")}}")'>
            <div class="pos-a centerXY">
                <div class="bgc-white bdrs-50p pos-r" style='width: 120px; height: 120px;'>
                    <img class="pos-a centerXY w-100 p-20" src="{{asset('images/logo.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style='min-width: 320px;'>
            <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
            <form method="post">
                @csrf()
                <div class="form-group">
                    <label class="text-normal text-dark">Username</label>
                    <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                           value="{{old('email')}}"
                           name="email"
                           placeholder="Enter your email">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">{{$errors->first('email')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Password</label>
                    <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                           name="password"
                           placeholder="Enter password">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">{{$errors->first('password')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="peers ai-c jc-sb fxw-nw">
                        <div class="peer">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                <input type="checkbox" id="remember" name="remember" class="peer">
                                <label for="remember" class=" peers peer-greed js-sb ai-c">
                                    <span class="peer peer-greed">Remember Me</span>
                                </label>
                            </div>
                        </div>
                        <div class="peer">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
