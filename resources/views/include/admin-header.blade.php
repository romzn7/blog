<header>

	<div class="container">
		<h1> Admin Dashboard </h1>

			<nav class="navbar navbar-inverse">

				<ul class="nav nav-tabs">
				  <li role="presentation" {{ Request::is('admin') ? 'class=active': '' }}><a href="{{ route('admin.index') }}">Dashboard</a></li>
				  <li role="presentation" {{ Request::is('admin/blog/post*') ? 'class=active': '' }}><a href="{{ route('admin.blog.post.all') }}">Posts</a></li>
				  <li role="presentation" {{ Request::is('admin/blog/categories*') ? 'class=active': '' }}><a href="{{ route('admin.blog.categories') }}">Categories</a></li>
				  <li role="presentation" {{ Request::is('admin/blog/contact') ? 'class=active': '' }}><a href="{{ route('admin.blog.contact-messages') }}">Contact Messages</a></li>
				  @if(Auth::check())
				  <li role="presentation"><a href="{{ route('admin.logout')}}">Logout</a></li>
				  @else
				<a href="{{ route('admin.login')}}">Login</a></li>
					@endif
				</ul>
			</nav>
	</div>

	

</header>