<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	  @yield('title')

    
    {{-- <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
	{{-- <script>
    	$(document).ready(function() {
            $('#example').DataTable( {
             
            } );
        } );
    </script> --}}
    
    {{-- css and js --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    {{-- end css and js --}}
	
    {{-- switch --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    {{-- end switch --}}

    {{-- modal --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	{{-- end modal --}}

    {{-- datatable --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    {{-- end datatable --}}
    
    {{-- <style>
        table, th, td {
          /*border: 1px solid black ;*/
          border-collapse: collapse;
          border-spacing: 30px;
        }
        th, td {
            padding: 11px;
        }

        tr:nth-child(even) {
          background-color: rgba(260,171,249,0.3);
        }

        /*tr:nth-child(even) {
          background-color: #D6EEEE;
        }*/

        th:nth-child(even) {
          background-color: rgba(255,0,255,0.3);
        }

        th:nth-child(odd) {
          background-color: rgba(255,0,255,0.3);
    }
    </style> --}}
</head>
<body>
	@include('Admin.header')
	@include('Admin.slidebar')
    @yield('content')

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    @include('Admin.footer')
    @yield('listscript')
</body>
</html>
