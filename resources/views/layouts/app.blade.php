<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/animate.min.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>آسان آموز برنامه نویسی</title>

    @livewireStyles
  </head>

  <body dir="rtl">

    <livewire:header/>

    {{$slot}}

    <livewire:footer/>

    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/js/popper.js"></script>
    <script src="/assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/js/grid.js"></script>
    @livewireScripts

    <script>
        window.livewire.on('showAlert' , function(message){
            Swal.fire({
                position: 'top-start',
                icon: 'success',
                title: message,
                showConfirmButton: false,
                timer: 1500
            })
        })
    </script>

  </body>
