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
		   			</ul>
		   		</div>
		   	</div>
		 </nav>		
		@yield('body')
	</body>
 <script src="{{ asset('js/app.js') }}"></script>
@endsection