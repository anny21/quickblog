<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link rel="apple-touch-icon" sizes="76x76" href="./quickblog/assets/img/favicon.ico">
<link rel="icon" type="image/png" href="./quickblog/assets/img/favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

<title>Blog Posts</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Source+Sans+Pro:400,600,700" rel="stylesheet">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!-- Main CSS -->
<link href="{{asset('quickblog/assets/css/main.css')}}" rel="stylesheet"/>

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
	<div class="row justify-content-between">
		<div class="col-md-8">
			<h5 class="font-weight-bold spanborder"><span>All Stories</span></h5>
			@forelse($posts as $post)
			<div class="mb-3 d-flex justify-content-between">
				<div class="pr-3">
					<h2 class="mb-1 h4 font-weight-bold">
					<a class="text-dark" href="{{route('post.show', $post->slug)}}">{{$post->title}}</a>
					</h2>
					<p>
						{!!$post->body!!}
					</p>
					<div class="card-text text-muted small">
						 Category : 
						 @if (is_array($post->category) || is_object($post->category))
@forelse($post->category as $cat)
						 
{{$cat}},
@empty

@endforelse
@else
Uncategorized
@endif
						

						 
					</div>
					<small class="text-muted">{{$post->created_at}} &middot; 5 min read</small>
				</div>
				<img  height="120" src="@if($post->banner) {{ asset('storage/postBanners/' . $post->banner)}} @else {{asset('quickblog/assets/images.jpg')}} @endif">
				{{-- <img height="120" src="{{asset('storage/postBanners/' . $post->banner)}}"> --}}
			</div>
			@empty
			No posts yet please check back
			@endforelse
			
		{{$posts->links()}}
			
		</div>
		<div class="col-md-4 pl-4">
            <h5 class="font-weight-bold spanborder"><span>Recents</span></h5>
			<ol class="list-featured">
				@if(count($posts) > 0)
				@forelse($post->recentPost() as $post)
				<li>
					<span>
					<h6 class="font-weight-bold">
					<a href="{{route('post.show', $post->slug)}}" class="text-dark">{{$post->title}}</a>
					</h6>
					<p class="text-muted">
						Category:  @if (is_array($post->category) || is_object($post->category))
						@forelse($post->category as $cat)
												 
						{{$cat}},
						@empty
						
						@endforelse
						
						@else
						Uncategorized
						@endif
						
					</p>
					</span>
					</li>
					
				@empty

				@endforelse
				@endif
				
			</ol>
		</div>
	</div>
</div>
    
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
<script src="{{asset('quickblog/assets/js/vendor/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quickblog/assets/js/vendor/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quickblog/assets/js/vendor/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quickblog/assets/js/functions.js')}}" type="text/javascript"></script>

<script>
	  
</script>
</body>
</html>