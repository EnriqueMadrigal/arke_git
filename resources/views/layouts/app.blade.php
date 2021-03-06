<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Arke</title>

       
             <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
             <link href="{{ asset('assets/css/jquery-ui.css') }}" rel="stylesheet">
             <link href="{{ asset('assets/css/wickedpicker.css') }}" rel="stylesheet">
             
            
 
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Raleway:300,400,600)' rel='stylesheet' type='text/css'>
 
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                       
						Inicio
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                      @guest
                           
                        @else
                        
                        @if(Auth::user()->type==1 || Auth::user()->type==2) 
                        <li><a href="{{ route('obras') }}">Obras</a></li>
                        @endif
                       
                         
                        @if(Auth::user()->type==1) 
                        <li><a href="{{ route('catalogos') }}">Tipos</a></li>
                        @endif
                        
                        @if(Auth::user()->type==1 || Auth::user()->type==2) 
                        <li><a href="{{ route('herramientas') }}">Herramientas</a></li>
                        @endif
                        
                        <li><a href="{{ route('ubicaciones') }}">Ubicación</a></li>
                        
                       @if(Auth::user()->type==1 || Auth::user()->type==2) 
                        <li><a href="{{ route('mantenimientos') }}">Mantenimientos</a></li>
                       @endif
                       
                       @if(Auth::user()->type==1) 
                        <li><a href="{{ route('usuarios') }}">Usuarios App</a></li>
                       @endif
                       
                       @if(Auth::user()->type==1) 
                        <li><a href="{{ route('reportes') }}">Reportes</a></li>
                       @endif
                       
                       
                       @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                          
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
				
					
                </div>
            </div>
        </nav>

          <h1 class="page-header">
         @yield('title')
         </h1>
       
        @yield('content')
        
        
    </div>

  
	<!-- Scripts -->
          
        <script src="{{ asset('assets/js/jquery.js') }}"></script>
          <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
          <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
          <script src="{{ asset('assets/js/wickedpicker.js') }}"></script>
         
    
     
    
    <script>         
$(document).ready(function(){
    
 $("#imageFotoUpload").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;

     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#image-holder");
     image_holder.empty();


     if (extn === "gif" || extn === "png" || extn === "jpg" || extn === "jpeg") {

            if (typeof (FileReader) !== "undefined") {


             //loop for each file selected for uploaded.
             for (var i = 0; i < countFiles; i++) {

                 var reader = new FileReader();
                 reader.onload = function (e) {
                     
                     $("<img />", {"src": e.target.result,"class": "thumb-image","style":"width:110px;height:140px"}).appendTo(image_holder);
                     
                     // $(image_holder).html("<img src='" + e.target.result + "' />");
                       console.log($(image_holder).html());
                     console.log("<img src='" + e.target.result + "'/>");
                 };

                 //image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
 });
 $("#imageFotoUpload2").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;

     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#image-holder2");
     image_holder.empty();


     if (extn === "gif" || extn === "png" || extn === "jpg" || extn === "jpeg") {

            if (typeof (FileReader) !== "undefined") {


             //loop for each file selected for uploaded.
             for (var i = 0; i < countFiles; i++) {

                 var reader = new FileReader();
                 reader.onload = function (e) {
                     
                     $("<img />", {"src": e.target.result,"class": "thumb-image","style":"width:220px;height:280px"}).appendTo(image_holder);
                     
                     // $(image_holder).html("<img src='" + e.target.result + "' />");
                       console.log($(image_holder).html());
                     console.log("<img src='" + e.target.result + "'/>");
                 };

                 //image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
 });
 $("#imageFotoUpload3").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;

     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#image-holder3");
     image_holder.empty();


     if (extn === "gif" || extn === "png" || extn === "jpg" || extn === "jpeg") {

            if (typeof (FileReader) !== "undefined") {


             //loop for each file selected for uploaded.
             for (var i = 0; i < countFiles; i++) {

                 var reader = new FileReader();
                 reader.onload = function (e) {
                     
                     $("<img />", {"src": e.target.result,"class": "thumb-image","style":"width:120px;height:140px"}).appendTo(image_holder);
                     
                     // $(image_holder).html("<img src='" + e.target.result + "' />");
                       console.log($(image_holder).html());
                     console.log("<img src='" + e.target.result + "'/>");
                 };

                 //image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
 });
 
 $('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
    e.preventDefault();
    var $form=$(this);
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $form.submit();
        });
}); 
    
});
</script>
</body>
</html>
