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

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
		   			<ul class="nav navbar-nav navbar-header">
		   			<li><a href="{{url('/User')}}">Users</a></li>
		   			<li><a href="{{url('/Member')}}">Members</a></li>
		   			<li><a href="{{url('/Category')}}">Categories</a></li>
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
		   		</div>
		   		</div>
		   	</div>
		 </nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
		  <div class="panel-heading">
		  	<ul class="nav navbar-nav navbar-header">
		  		{{-- <li><a href="{{url('/Loan/Create')}}">Create New Loan</a></li> --}}
		   		<li><a href="{{url('/Loan')}}">Pending / Cancel</a></li>
		   		<li><a href="{{url('/Loan/Approved')}}">Approved</a></li>
		   		<li><a href="{{url('/Loan/Paid')}}">Paid</a></li>
				<li><a href="{{url('/Loan/Rejected')}}">Rejected</a></li>
		   	</ul>
		  </div>
		</div>
	</div>
</div>		
		@yield('body')
	</body>
 <script src="{{ asset('js/app.js') }}"></script>
@endsection