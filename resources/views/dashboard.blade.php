@extends('layouts.app')

@section('content')
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/js/bootstrap.min.js">
</head>
<body class="img">
	<section class="row posts">
		<div class="col-md-6 col-md-offset-3">
			@if(Session::has('message'))
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			@endif
			<h3>Shout Outs <i class="glyphicon glyphicon-comment"></i></h3>
		</div>

		<div class="col-md-6 col-md-offset-3" style="width: 50%; height: 350px; overflow: scroll;">

			@foreach($posts as $post)
				<article class="post panel panel-success" data-postid="{{ $post->id }}">

					<div class="info panel-heading">
						{{ $post->user->name }} 	{{ $post->created_at }}
					</div>
					<div class="panel-body" style="margin-left: 20px;">{{ $post->body }}</div>

				</article>
			@endforeach

		</div>
	</section>
	<section class="row new-post"> 
		<div class="col-md-6 col-md-offset-3">
			<header><h3>Enter text here</h3></header>
			<form action="{{ route('post.create') }}" method="post">
				<div class="form-group">
					<textarea class="form-control" name="body" id="new-post" rows="5" placeholder="enter your message here" required></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Send Message</button>
				<input type="hidden" value="{{ Session::token() }} " name="_token">
			</form>
		</div>
	</section>
</body>

@endsection

