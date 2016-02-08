<nav class="navbar navbar-fixed-top navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button"><span class="sr-only">Changer de navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo $this->generateUrl('admin'); ?>">Le Daily Charlie</a>
		</div>

		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown <?php echo ($currentPage == 'medias') ? 'active' : ''; ?>">
					<a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#">Médias <i class="fa fa-angle-down"></i></a>

					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo $this->generateUrl('admin', 'listeMedia'); ?>">Liste</a>
						</li>
						<li>
							<a href="<?php echo $this->generateUrl('admin', 'addMedia'); ?>">Ajouter</a>
						</li>
					</ul>
				</li>
				<li class="dropdown <?php echo ($currentPage == 'analyses') ? 'active' : ''; ?>">
					<a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#">Analyses <i class="fa fa-angle-down"></i></a>

					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo $this->generateUrl('admin', 'liste', array('analyses')); ?>">Liste</a>
						</li>
						<li>
							<a href="<?php echo $this->generateUrl('admin', 'add', array('analyses')); ?>">Ajouter</a>
						</li>
					</ul>
				</li>
				<li class="dropdown <?php echo ($currentPage == 'livres') ? 'active' : ''; ?>">
					<a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#">Livres <i class="fa fa-angle-down"></i></a>

					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo $this->generateUrl('admin', 'liste', array('livres')); ?>">Liste</a>
						</li>
						<li>
							<a href="<?php echo $this->generateUrl('admin', 'add', array('livres')); ?>">Ajouter</a>
						</li>
					</ul>
				</li>
				<li class="dropdown <?php echo ($currentPage == 'votes') ? 'active' : ''; ?>">
					<a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#">Votes <i class="fa fa-angle-down"></i></a>

					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo $this->generateUrl('admin', 'liste', array('votes')); ?>">Liste</a>
						</li>
						<li>
							<a href="<?php echo $this->generateUrl('admin', 'add', array('votes')); ?>">Ajouter</a>
						</li>
					</ul>
				</li>
				<li class="dropdown <?php echo ($currentPage == 'unes') ? 'active' : ''; ?>">
					<a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#">Unes <i class="fa fa-angle-down"></i></a>

					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo $this->generateUrl('admin', 'liste', array('unes')); ?>">Liste</a>
						</li>
						<li>
							<a href="<?php echo $this->generateUrl('admin', 'add', array('unes')); ?>">Ajouter</a>
						</li>
					</ul>
				</li>
				<li class="dropdown <?php echo ($currentPage == 'mails') ? 'active' : ''; ?>">
					<a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#">Mails <i class="fa fa-angle-down"></i></a>

					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo $this->generateUrl('admin', 'liste', array('mails')); ?>">Liste</a>
						</li>
						<li>
							<a href="<?php echo $this->generateUrl('admin', 'add', array('mails')); ?>">Ajouter</a>
						</li>
					</ul>
				</li>
				<li class="<?php echo ($currentPage == 'deconnexion') ? 'active' : ''; ?>">
					<a href="<?php echo $this->generateUrl('login', 'logout'); ?>">Déconnexion</a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container -->
</nav>
