	<section class="sidebar">
		<ul class="sidebar-menu">
			<li class="header">MENU</li>
			<li class=""><a href=""><i class='fa fa-check-square-o '></i> <span>Powrót do strony</span></a></li>
			<li class="{{ active('admin.tag.index') }}"><a href="{{ route('admin.tag.index') }}"><i class='fa fa-tags'></i> <span>Tagi</span></a></li>
			<li class="{{ active('admin.blog.index') }}"><a href="{{ route('admin.blog.index') }}"><i class='fa fa-book'></i> <span>Blog</span></a></li>
			<li class="{{ active('admin.project.index') }}"><a href="{{ route('admin.project.index') }}"><i class='fa fa-briefcase'></i> <span>Portfolio</span></a></li>
			<li class="{{ active('admin.offer.index') }}"><a href="{{ route('admin.offer.index') }}"><i class='fa fa-handshake-o'></i> <span>Oferty</span></a></li>
			<li class="{{ active('admin.logs') }}"><a href="{{ route('admin.logs') }}"><i class='fa fa-code'></i> <span>Logi</span></a></li>
			<li class=""><a href="{{ route('admin.logout') }}"><i class='fa fa-ban'></i> <span>Wyloguj</span></a></li>
		</ul>
	</section>
