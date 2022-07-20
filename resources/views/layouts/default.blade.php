<!DOCTYPE HTML>
<html>
    <head>
        <link rel="icon" href="{{asset ('images/favicon.ico') }}"/>
        <link rel="stylesheet" href="{{asset ('css/style.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/36955405bc.js" crossorigin="anonymous"></script>
    </head>
    <body>
            
            <nav class="nav-bar">
                <img class="logo" src="{{url ('/images/logo.png') }}" alt="logo" width="300" height="100">
                <div class="nav_links">
                     <ul>  
                        <li><a href="#"> ACCUEIL</a></li>
                        <li><a href="#"> TROMBINOSCOPE</a></li>
                    </ul>
                </div>    
            </nav>


        <main>
          @yield('main')     
        </main>




        <footer>
            <div class="footer-content">
                <h3> Trombinoscope ETNA </h3>
                <p> Copyright &copy;2022 ETNA</p>
            </div>
        </footer>

        
    </body>


</html>
