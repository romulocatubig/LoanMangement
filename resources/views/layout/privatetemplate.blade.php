@extends('layout.htmlwrapper')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<ul class="nav navbar-nav navbar-header">
					@if(Auth::user()->position == "Admin")
					<li><a href="{{url('/User')}}">Users</a></li>
					<li><a href="{{url('/Member')}}">Members</a></li>
					<li><a href="{{url('/Category')}}">Categories</a></li>
					@else
					<li><a href="{{url('/Member')}}">Members</a></li>
					@endif
					<li><a href="{{url('/Loan')}}">Loans</a></li>
					<li><a href="{{url('/Scheme')}}">Reports</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Charts</a>
						<ul class="dropdown-menu">
							<li><a href="{{url('/Charts')}}">Loan Line Charts</a></li>
							<li><a href="{{url('/Charts/Payment')}}">Loan Bar Charts</a></li>
							<li><a href="{{url('/Charts/User')}}">User Charts</a></li>
						</ul>
					</li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="home">Hi : {{Auth::user()->firstname}} the {{Auth::user()->position}}</a></li>
					<li> <a href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						Logout
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form></li>
				</ul>
			</div>
		</div>
	</nav>		
	@yield('body')
</body>
<script src="{{ asset('js/app.js') }}"></script>
@endsection