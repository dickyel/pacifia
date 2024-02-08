<!doctype html>
<html lang="en">
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
			
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('./sidebar/css/style.css') }}">
	</head>
	<body>
			
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Toggle Menu</span>
					</button>
				</div>
				<div class="p-4">
					<h1><a href="" class="logo">Dashboard</a></h1>
					<ul class="list-unstyled components mb-5">
					<li class="active">
						<a href="#"><span class="fa fa-home mr-3"></span>Dashboard</a>
					</li>

					<li>
					<a href="#"><span class="fa fa-sticky-note mr-3"></span>Role Management</a>
					</li>		

					<div class="footer">
						<p>
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <i class="icon-heart" aria-hidden="true"></i> by <a href="https://xenulis.my.id" target="_blank">Lokerapp</a>
								</p>
					</div>

				</div>
			</nav>

			<!-- Page Content  -->
			@yield('content')
		</div>

		<script src="{{ asset('/sidebar/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/sidebar/js/popper.js') }}"></script>
		<script src="{{ asset('/sidebar/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/sidebar/js/main.js') }}"></script>
	</body>
</html>