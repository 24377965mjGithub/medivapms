<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ url('build/assets/app-D-sv12UV.css') }}">
        <link rel="icon" href="{{ url('storage/favicon.png') }}">

    </head>
    <body class="bg-dark">
        {{ $slot }}

        <x-footer-component></x-footer-component>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function () {
                window.addEventListener('projectcreated', function () {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Project Created Successfully",
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                window.addEventListener('notecreated', function () {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Note Created Successfully",
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
            })
        </script>

        <script src="{{ url('build/assets/app-DbGB7dMJ.js') }}"></script>
    </body>
</html>
