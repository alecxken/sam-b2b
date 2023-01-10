
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<meta name="robots" content="noindex, nofollow">
<title>Avrello Exception Page </title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">



 <link rel="stylesheet" href="{{asset('myfiles/css/bootstrap.min.css')}}">
		  <!-- Bootstrap 3.3.7 -->
 <!--  -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('myfiles/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('myfiles/Ionicons/css/ionicons.min.css')}}">

  <link rel="stylesheet" href="{{asset('myfiles/line-awesome/css/line-awesome.min.css')}}">
 <link rel="stylesheet" href="{{asset('myfiles/css/style.css')}}">

<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>
<body class="error-page">

<div class="main-wrapper">
<div class="error-box">
@yield('content')
</div>
</div>


   <script src="{{asset('myfiles/js/jquery-3.5.1.min.js')}}"></script>
       <script src="{{asset('myfiles/js/jquery-3.2.1.min.js')}}"></script> 
	
		 
		<!-- Bootstrap Core JS -->
        <script src="{{asset('myfiles/js/popper.min.js')}}"></script>
        <script src="{{asset('myfiles/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
		<script src="{{asset('myfiles/js/jquery.slimscroll.min.js')}}"></script>
		
		<!-- Chart JS -->
	
		<script src="{{asset('myfiles/js/chart.js')}}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('myfiles/js/app.js')}}"></script>

		@yield('extrajs')
		<script src="{{asset('myfiles/js/toastr.js')}}"></script>
		<script type="text/javascript">
    toastr.options = {
      "closeButton": true,
    "debug": true,
    "newestOnTop": true,
    "progressBar": true,
  // "positionClass": "toast-top-center",
 // "preventDuplicates": true,
  // "onclick": null,
  "showDuration": "300",
   "hideDuration": "1000",
   "timeOut": "5000",
   "extendedTimeOut": "1000",
   "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
@if(session("danger"))
  toastr.error("{{ session("danger") }}");
@elseif(session("status"))
    toastr.success("{{ session("status") }}");
@elseif(session("success"))
    toastr.success("{{ session("success") }}");
@elseif(session("info"))
 toastr.info("{{ session("info") }}");
@elseif(session("error"))
toastr.error("{{ session("error") }}");
@elseif(session("warning"))
 toastr.warning("{{ session("warning") }}");

@endif
 @if ($errors->any())
   @foreach ($errors->all() as $error)
              toastr.warning("{{ $error }}");
            @endforeach

 @endif
</script>
</body>
</html>