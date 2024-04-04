<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Commerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/frontend/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/assets/img/favicon.ico">

    <link rel="stylesheet" href="/frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/assets/css/templatemo.css">
    <link rel="stylesheet" href="/frontend/assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="/frontend/assets/css/fontawesome.min.css">

</head>
<body>
   <x-header></x-header>
    {{ $slot }} 
<x-footer></x-footer>

    <!-- Start Script -->
    <script src="/frontend/assets/js/jquery-1.11.0.min.js"></script>
    <script src="/frontend/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/frontend/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/frontend/assets/js/templatemo.js"></script>
    <script src="/frontend/assets/js/custom.js"></script>
    <script src="https://kit.fontawesome.com/ecc23a7e0f.js" crossorigin="anonymous"></script>
    <!-- End Script -->
</body>
