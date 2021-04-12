	<section class="sidebar">
		<ul class="sidebar-menu">
			<li class="header">MENU</li>
			<li><a href=""><i class='fa fa-check-square-o '></i> <span>Powrót do strony</span></a></li>
			<li class="{{ active('admin/tag*') }}"><a href="{{ route('admin.tag.index') }}"><i class='fa fa-tags'></i> <span>Tagi</span></a></li>
			<li class="{{ active('admin/blog*') }}"><a href="{{ route('admin.blog.index') }}"><i class='fa fa-book'></i> <span>Blog</span></a></li>
			<li class="{{ active('admin/category*') }}"><a href="{{ route('admin.category.index') }}"><i class='fa fa-object-group'></i> <span>Kategorie zdjęć</span></a></li>
			<li class="{{ active('admin/project*') }}"><a href="{{ route('admin.project.index') }}"><i class='fa fa-briefcase'></i> <span>Projekty</span></a></li>
			<li class="{{ active('admin/realization*') }}"><a href="{{ route('admin.realization.index') }}"><i class='fa fa-television'></i> <span>Realizacje</span></a></li>
			<li class="{{ active('admin/offer*') }}"><a href="{{ route('admin.offer.index') }}"><i class='fa fa-handshake-o'></i> <span>Oferty</span></a></li>
			<li class="{{ active('admin/file*') }}"><a href="{{ route('admin.file.index') }}"><i class='fa fa-file-image-o'></i> <span>Biblioteka plików</span></a></li>
			<li class="{{ active('admin.logs') }}"><a href="{{ route('admin.logs') }}"><i class='fa fa-code'></i> <span>Logi</span></a></li>
			<li><a href="{{ route('admin.logout') }}"><i class='fa fa-ban'></i> <span>Wyloguj</span></a></li>
		</ul>
	</section>
