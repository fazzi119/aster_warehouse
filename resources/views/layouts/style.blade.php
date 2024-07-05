 <!-- Fonts and icons -->
 <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
 <script>
     WebFont.load({
         google: {
             "families": ["Open+Sans:300,400,600,700"]
         },
         custom: {
             "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
             urls: ['{{ asset('assets/css/fonts.css') }}']
         },
         active: function() {
             sessionStorage.fonts = true;
         }
     });
 </script>

 <!-- CSS Files -->
 <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/css/azzara.min.css') }}">

 <!-- CSS Just for demo purpose, don't include it in your project -->
 <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">

 {{-- css libary select2 --}}
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <style>
     body.login {
         background-image: url('{{ asset('assets/img/bg.png') }}');
         background-size: cover;
         background-position: center;
         height: 100vh;
         margin: 0;
     }

     .login-header {
         display: flex;
         flex-direction: column;
         align-items: center;
         margin-bottom: 20px;
     }

     .logo-container {
         display: flex;
         justify-content: center;
         margin-bottom: 10px;
     }

     .logo {
         margin: 0 10px;
     }
 </style>
