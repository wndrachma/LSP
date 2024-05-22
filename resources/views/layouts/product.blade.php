<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GreenMarket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('lp/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lp/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('lp/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lp/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lp/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('lp/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('lp/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('lp/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('lp/css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ asset('lp/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('lp/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('lp/css/style.css') }}">
  </head>

  @yield('content')

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{ asset('lp/js/jquery.min.js') }}"></script>
<script src="{{ asset('lp/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('lp/js/popper.min.js') }}"></script>
<script src="{{ asset('lp/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('lp/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('lp/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('lp/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('lp/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lp/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('lp/js/aos.js') }}"></script>
<script src="{{ asset('lp/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('lp/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('lp/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('lp/js/google-map.js') }}"></script>
<script src="{{ asset('lp/js/main.js') }}"></script>

<script>
      $(document).ready(function(){

      var quantitiy=0;
         $('.quantity-right-plus').click(function(e){
              
              // Stop acting like a button
              e.preventDefault();
              // Get the field name
              var quantity = parseInt($('#quantity').val());
              
              // If is not undefined
                  
                  $('#quantity').val(quantity + 1);

                
                  // Increment
              
          });

           $('.quantity-left-minus').click(function(e){
              // Stop acting like a button
              e.preventDefault();
              // Get the field name
              var quantity = parseInt($('#quantity').val());
              
              // If is not undefined
            
                  // Increment
                  if(quantity>0){
                  $('#quantity').val(quantity - 1);
                  }
          });
          
      });
  </script>
  
</body>
</html>