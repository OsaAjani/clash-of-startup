<nav class="navbar navbar-fixed-top navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button"><span class="sr-only">Changer de navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo $this->generateUrl(''); ?>">Clash Of Startup</a>
		</div>

		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="<?php echo ($currentPage == 'accueil') ? 'active' : ''; ?>">
					<a href="<?php echo $this->generateUrl(''); ?>" title="Retourner à l'accueil">Accueil</a>
				</li>
				<li class="<?php echo ($currentPage == 'match') ? 'active' : ''; ?>">
					<a href="<?php echo $this->generateUrl('match'); ?>" title="Comparer des startups">Comparer des startups</a>
				</li>
				<li class="<?php echo ($currentPage == 'classement') ? 'active' : ''; ?>">
					<a href="<?php echo $this->generateUrl('classement'); ?>" title="Classement des startups">Classement des startups</a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container -->
</nav>
