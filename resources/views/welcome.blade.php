<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huella Records</title>

    {{-- GOOGLE FONTS --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&display=swap" rel="stylesheet">

    <style>
        * {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            font-weight: 300;
            color: #111;
        }

        /* ---------------------------------
           HEADER
        --------------------------------- */
        .main-header {
            position: fixed;
            top: 15px;   /* 🔥 MENÚ MÁS ABAJO */
            left: 0;
            right: 0;
            padding: 20px 50px; /* 🔥 más aire */
            z-index: 50;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            transition: background 0.3s ease, padding 0.3s ease, top 0.3s ease;
        }

        .main-header.scrolled {
            background: rgba(0,0,0,0.75);
            backdrop-filter: blur(4px);
            padding: 12px 40px;
            top: 0; /* se pega cuando scrollea */
        }

        .header-nav {
            display: flex;
            gap: 30px;
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        .header-nav a {
            color: white;
            text-decoration: none;
        }

        /* ---------------------------------
           HERO
        --------------------------------- */
        .hero {
            width: 100%;
            height: 60vh;
            background-image: url('{{ asset('img/hero-huella.png') }}');
            background-size: cover;
            background-position: center top;
            background-repeat: no-repeat;
            position: relative;
        }

        /* Degradado para que el menú se vea */
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 45%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.65), transparent);
        }

        /* ---------------------------------
           ANIMACIONES
        --------------------------------- */
        .fade {
            opacity: 0;
            transform: translateY(40px);
            transition: 0.6s ease;
        }

        .visible {
            opacity: 1 !important;
            transform: translateY(0px) !important;
        }

        /* ---------------------------------
           ABOUT
        --------------------------------- */
        .about {
            padding: 120px 40px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 100px;
        }

        .about-title {
            font-size: 48px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .about-text {
            max-width: 550px;
            font-size: 18px;
            line-height: 1.6;
        }

        /* ---------------------------------
           CONTACTO
        --------------------------------- */
        .contact {
            background: #000;
            color: white;
            padding: 120px 40px;
            display: flex;
            justify-content: center;
            gap: 180px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 25px;
            width: 350px;
        }

        input, textarea {
            background: transparent;
            border: none;
            border-bottom: 1px solid white;
            padding: 12px 0;
            color: white;
            font-size: 16px;
            outline: none;
            font-weight: 300;
        }

        textarea {
            height: 120px;
        }

        .contact-title {
            font-size: 48px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .contact-icons {
            margin-top: 25px;
            display: flex;
            gap: 20px;
        }

        .contact-icons img {
            width: 28px;
            cursor: pointer;
        }

        /* ---------------------------------
           RESPONSIVE
        --------------------------------- */
        @media (max-width: 992px) {
            .about, .contact {
                flex-direction: column;
                text-align: center;
                gap: 60px;
            }

            form {
                margin: 0 auto;
            }

            .main-header {
                padding: 15px 20px;
            }
        }
    </style>
</head>

<body>

<header class="main-header" id="header">
    <nav class="header-nav">
        <a href="#nosotros">Nosotros</a>
        <a href="#mision">Misión</a>
        <a href="#contacto">Contacto</a>
    </nav>
</header>

{{-- HERO --}}
<div class="hero"></div>

{{-- SOBRE NOSOTROS --}}
<section id="nosotros" class="about fade">
    <div class="about-title">Sobre<br>Nosotros</div>

    <div class="about-text">
        Huella Studios es mucho más que un estudio: es un espacio donde la creatividad toma forma y las ideas se convierten en música.
        Ubicados en Buenos Aires, somos un referente en la escena musical latinoamericana y un punto de encuentro para artistas que buscan elevar su arte.
        <br><br>
        En nuestro estudio crean, ensayan y graban algunos de los principales artistas nacionales e internacionales que visitan Argentina.
        <br><br>
        Contamos con instalaciones de última generación y equipamiento de primera línea.
        <br><br>
        En Huella Studios trabajamos para dejar una marca en cada artista.
    </div>
</section>

{{-- CONTACTO --}}
<section id="contacto" class="contact fade">
    <form>
        <input type="text" placeholder="Nombre">
        <input type="email" placeholder="Email">
        <textarea placeholder="Mensaje"></textarea>
    </form>

    <div>
        <div class="contact-title">Queremos<br>Conocerte</div>

        <div class="contact-icons">
            <img src="{{ asset('img/logo-ig.png') }}" alt="Instagram">
            <img src="{{ asset('img/logo-x.png') }}" alt="X / Twitter">
        </div>
    </div>
</section>

{{-- JS --}}
<script>
    // HEADER sticky
    window.addEventListener("scroll", function() {
        const header = document.getElementById("header");
        if (window.scrollY > 40) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });

    // FADE animations
    const fades = document.querySelectorAll('.fade');
    function runFade() {
        fades.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight - 120) {
                el.classList.add('visible');
            }
        });
    }
    window.addEventListener('scroll', runFade);
    window.addEventListener('load', runFade);
</script>

</body>
</html>