<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link rel="apple-touch-icon" sizes="76x76" href="./quickblog/assets/img/favicon.ico">
<link rel="icon" type="image/png" href="./quickblog/assets/img/favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

<title>Quick Blog</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Source+Sans+Pro:400,700" rel="stylesheet">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!-- Main CSS -->
<link href="{{asset('quickblog/assets/css/main.css')}}" rel="stylesheet"/>
<link rel="stylesheet" href="{{asset('quickblog/assets/comment.css')}}" rel="stylesheet"/>

</head>
<body>
<!--------------------------------------
NAVBAR
--------------------------------------->
<nav class="topnav navbar navbar-expand-lg navbar-light bg-white fixed-top">
	<div class="container">
		<a class="navbar-brand" href="{{route('post.index')}}"><strong>Quick Blog</strong></a>
		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-collapse collapse" id="navbarColor02" style="">
			<ul class="navbar-nav mr-auto d-flex align-items-center">
				{{-- <li class="nav-item">
				<a class="nav-link" href="./index.html">Intro <span class="sr-only">(current)</span></a>
				</li> --}}
			
				{{-- <li class="nav-item">
				<a class="nav-link" href="./docs.html">Template <span class="badge badge-secondary">docs</span></a>
				</li> --}}
			</ul>
			<ul class="navbar-nav ml-auto d-flex align-items-center">
				<li class="nav-item highlight">
				<a class="nav-link" href="">Login</a>
				</li>
			</ul>
		</div>
	</div>
	</nav>
	<!-- End Navbar -->
		
	<!--------------------------------------
HEADER
--------------------------------------->
<div class="container">
	<div class="jumbotron jumbotron-fluid mb-3 pl-0 pt-0 pb-0 bg-white position-relative">
		<div class="h-100 tofront">
			<div class="row justify-content-between">
				<div class="col-md-6 pt-6 pb-6 pr-6 align-self-center">
					<p class="text-uppercase font-weight-bold">
						<a class="text-danger" href="{{route('post.index')}}">Stories</a>
					</p>
					<h1 class="display-4 secondfont mb-3 font-weight-bold">{{$post->title}}</h1>
					<p class="mb-3">
						 {{-- Analysts told CNBC that the currency could hit anywhere between $1.35-$1.40 if the deal gets passed through the U.K. parliament. --}}
					</p>
					<div class="d-flex align-items-center">
						<img class="rounded-circle" src="quickblog/assets/img/demo/avatar2.jpg" width="70">
						<small class="ml-2">Admin <span class="text-muted d-block">{{$post->created_at}} &middot; 5 min. read</span>
						</small>
					</div>
				</div>
				<div class="col-md-6 pr-0">
					<img style="width:100%; height:100%" src="@if($post->banner) {{ asset('storage/postBanners/' . $post->banner)}} @else {{asset('quickblog/assets/images.jpg')}} @endif">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Header -->
    
<!--------------------------------------
MAIN
--------------------------------------->
<div class="container pt-4 pb-4">
	<div class="row justify-content-center">
		<div class="col-lg-2 pr-4 mb-4 col-md-12">
			<div class="sticky-top text-center">
				<div class="text-muted">
					Share this
				</div>
				<div class="share d-inline-block">
					<!-- AddToAny BEGIN -->
					<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
						<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
						<a class="a2a_button_facebook"></a>
						<a class="a2a_button_twitter"></a>
					</div>
					<script async src="https://static.addtoany.com/menu/page.js"></script>
					<!-- AddToAny END -->
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-8">
			<article class="article-post">
			{!! $post->body !!}
		
			
            </article>
            
		</div>
	</div>
</div>
<div class="container pt-4 pb-4">
	<h5 class="font-weight-bold spanborder"><span>Read next</span></h5>
	<div class="row">
		<div class="col-lg-6">
			<div class="card border-0 mb-4 box-shadow h-xl-300">
				<div style="background-image: url(@if($post->nextPost() && $post->nextPost()['banner']) {{ asset('storage/postBanners/' . $post->nextPost()['banner'])}} @elseif($post->nextPost() && $post->nextPost()['banner'] == null) {{asset('quickblog/assets/images.jpg')}} @endif); height: 150px; background-size: cover; background-repeat: no-repeat;">
				</div>
				<div class="card-body px-0 pb-0 d-flex flex-column align-items-start">
					<h2 class="h4 font-weight-bold">
					<a class="text-dark" href="#">{{$post->nextPost()['title']}}</a>
					</h2>
					<p class="card-text">
						 {!! $post->nextPost()['body'] !!}
					</p>
					<div>
						<small class="d-block"><a class="text-muted" href="./author.html">@if($post->nextPost()) Admin @endif </a></small>
						<small class="text-muted">{{$post->nextPost()['created_at']}}</small>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- End Main -->
    
<!--------------------------------------
FOOTER
--------------------------------------->
<div class="container mt-5">
	<footer class="bg-white border-top p-3 text-muted small">
	<div class="row align-items-center justify-content-between">
		<div>
            <span class="navbar-brand mr-2"><strong>Quick Blog</strong></span> Copyright &copy;
			<script>document.write(new Date().getFullYear())</script>
			 . All rights reserved.
		</div>
		<div>
			{{-- Made with <a target="_blank" class="text-secondary font-weight-bold" href="https://www.wowthemes.net/mundana-free-html-bootstrap-template/">Quick</a>  --}}
		</div>
	</div>
	</footer>
</div>
<!-- End Footer -->
    
<!--------------------------------------
JAVASCRIPTS
--------------------------------------->
{{-- <script src="{{asset('quickblog/assets/js/vendor/jquery.min.js')}}" type="text/javascript"></script> --}}
{{-- <script src="{{asset('quickblog/assets/js/vendor/popper.min.js')}}" type="text/javascript"></script> --}}
{{-- <script src="{{asset('quickblog/assets/js/vendor/bootstrap.min.js')}}" type="text/javascript"></script> --}}
{{-- <script src="{{asset('quickblog/assets/js/functions.js')}}" type="text/javascript"></script> --}}
</body>
</html>