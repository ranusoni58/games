<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('front/css/front.css')}}">

    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


    <title>Games</title>
</head>
<body>

    
         @yield('content')

         <!-- footer -->
<div class="footer">
<div class="row py-5" style="width:95%; margin:0 auto">
<div class="col-md-6">
<div class="row">
<div class="col-md-4 col-6 mb-4">
<div class='footer-social-div py-3 text-center'>
<p>Stay updated with us: </p>
<div class="row">
<div class="col-md-6 col-6 pr-0">
<img src="{{asset('front/images/facbook2.png')}}"
width="45%"
alt='facbookimg.png'
/>
</div>
<div class="col-md-6 col-6 pl-0">
<img src="{{asset('front/images/insta.jpg')}}"
width="40%"
alt='instaimg.png'
/>
</div>
</div>
</div>
</div>

<div class="col-md-4 col-6 mb-4">
<div class='footer-social-div py-3 text-center'>
<p>Need help?</p>
<div class="row">
<div class="col-md-6 col-6 pr-0">
<img src="{{asset('front/images/facbook2.png')}}"
width="45%"
alt='facbookimg.png'
/>
</div>
<div class="col-md-6 col-6 pl-0">
<img src="{{asset('front/images/insta.jpg')}}"
width="40%"
alt='instaimg.png'
/>
</div>
</div>

</div>
</div>

</div>
</div>
<div class="col-md-6">
<div class="text-right">
<a style="text-decoration:none;" href="{{url('/')}}"><h5 class="text-muted my-2">Home</h5></a>
<p class="text-muted my-2">Marketing & Partnerships</p>
<p class="text-muted my-2">Terms & Conditions</p>
<p class="text-muted">Privacy Policy</p>
<p class="text-muted font-weight-normal">Copyright</p>
</div>
</div>
</div>

</div>
     
</body>
</html>