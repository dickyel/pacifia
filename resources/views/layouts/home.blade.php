<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="assets/style.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    <link rel="stylesheet" href="https://cdn.rawgit.com/payalord/xZoom/1.4.6/dist/xzoom.css">

    <script src="https://cdn.rawgit.com/payalord/xZoom/1.4.6/dist/xzoom.min.js"></script>
</head>
<body class="font-[Inter]">

    @yield('content')

    <script>
      $(document).ready(function () {
          $('.xzoom, .xzoom-gallery').xzoom({
              xoffset: 15,
              yoffset: 15,
              zoomWidth: 400,
              zoomHeight: 400,
              title: false,
          });

          // Handle click events on xZoom thumbs
          $('.xzoom-gallery-thumb-link').on('click', function (e) {
              e.preventDefault();
              var previewImage = $(this).data('preview');
              $('.xzoom').xzoom().destroy(); // Destroy the current xZoom instance
              $('.xzoom, .xzoom-gallery').xzoom({
                  xoffset: 15,
                  yoffset: 15,
                  zoomWidth: 400,
                  zoomHeight: 400,
                  title: false,
                  source: previewImage, // Set the source of the main image to the clicked thumbnail
              });
          });
      });
    </script>
  

</body>
</html>