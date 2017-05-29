	<section class="sidebar">
		<ul class="sidebar-menu">
			<li class="header">MENU</li>
			<li class=""><a href="#"><i class='fa fa-check-square-o '></i> <span>Powrót do strony</span></a></li>
			<li class=""><a href="{{ route('admin.tag.index') }}"><i class='fa fa-tags'></i> <span>Tagi</span></a></li>
			<li class=""><a href="{{ route('admin.blog.index') }}"><i class='fa fa-book'></i> <span>Blog</span></a></li>
			<li class=""><a href="{{ route('admin.project.index') }}"><i class='fa fa-briefcase'></i> <span>Portfolio</span></a></li>
			<li class=""><a href="{{ route('admin.logout') }}"><i class='fa fa-ban'></i> <span>Wyloguj</span></a></li>
			<li class="treeview">
				<a href="#"><i class='fa fa-eur'></i> <span>Płatności</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="#">Oczekujące</a></li>
					<li><a href="#">Wszystkie</a></li>
				</ul>
			</li>
		</ul>
	</section>
