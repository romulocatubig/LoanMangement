@extends('layout.htmlwrapper')

@section('content')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<body>
		<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
		   			<ul class="nav navbar-nav navbar-header">
		   			<li><a href="{{url('/User')}}">User</a></li>
		   			<li><a href="{{url('/Category')}}">Category</a></li>
		   			<li><a href="{{url('/Loan')}}">Loan</a></li>
		   			<li class="dropdown">
		   				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Charts</a>
		   				<ul class="dropdown-menu">
		   					<li><a href="{{url('/Charts')}}">Loan Line Charts</a></li>
		   					<li><a href="{{url('/Charts/Payment')}}">Loan Bar Charts</a></li>
		   					<li><a href="{{url('/Charts/User')}}">User Charts</a></li>
		   				</ul>
		   			</li>
		   			</ul>
		   		</div>
		   	</div>
		 </nav>		
		@yield('body')
	</body>
 <script src="{{ asset('js/app.js') }}"></script>
@endsection