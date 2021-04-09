<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Kechiq</title>

    {{-- Font Awesome CDN  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    {{-- Font Awesome CDN  --}}

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div id="app">

        <section id="login_box">

            <span id="closer_box">
                <img src="{{ asset('img/closer.png') }}" alt="closer" class="img100">
            </span>

             {{-- Logo e presentazione  --}}
            <header>

                <div class="header_top">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo kechiq" class="img100">
                </div>

                <div class="header_middle">
                    <p>
                        <span class="welcome_text">Ciao, benvenuto/a!</span> Inserisci i tuoi dati per accedere a Kechiq
                    </p>
                </div>

                <div class="header_bottom">

                    <a href="" class="social_btn">
                        <div class="social_btn_left">
                            <img src="{{ asset('img/socials/facebook.png') }}" alt="logo Facebook" class="img100">
                        </div>
                        <div class="social_btn_right">
                            <span>Facebook</span>
                        </div>
                    </a>

                    <a href="" class="social_btn">
                        <div class="social_btn_left">
                            <img src="{{ asset('img/socials/google.png') }}" alt="logo Google" class="img100">
                        </div>
                        <div class="social_btn_right">
                            <span>Google</span>
                        </div>
                    </a>

                </div>

            </header>
             {{-- /Logo e presentazione --}}

             {{-- Form per il login --}}
            <main>

                <div class="main_title">
                    <h5>oppure accedi con i tuoi dati</h5>
                </div>

                <section id="form_login">

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        @method('POST')

                        @error('email')
                            <span class="invalid_feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form_box @error('email') invalid_field @enderror">
                            <label for="email">Email</label>
                            <div class="form_box_aside">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="form_box_input">
                                <input type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="email" placeholder="Inserisci la tua email" required>
                            </div>

                        </div>

                        <div class="form_box @error('email') invalid_field @enderror">
                            <div class="form_box_aside">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="form_box_input">
                                <input type="password" name="password" placeholder="Password" autocomplete="current-password" required>
                            </div>
                            <div class="form_box_aside">
                                <a href="#" class="pass_recover">Recupera</a>
                            </div>
                        </div>


                        <div class="form_check">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Ricorda gli accessi</label>
                        </div>

                        <button type="submit">Accedere</button>
                    </form>
                </section>
            </main>
             {{-- /Form per il login  --}}

             {{-- Registrazione --}}
            <footer>
                @guest
                    <p>
                        Non hai un account?
                        <a href="#" class="register_btn">
                            Registrati
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </p>
                @else
                    <p>
                        Ciao {{ Auth::user()->name }}!
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            <button type="submit" class="logout_btn">
                                Logout
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </form>
                    </p>
                @endguest
            </footer>
            {{-- /Registrazione --}}

        </section>

    </div>

    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>

</body>
</html>
