<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Décrouvrez Charlie Hebdo sous une autre forme</h3>
	</div>
	<?php
		foreach ($livres as $livre)
		{
			?>
			<div class="col-sm-3 col-xs-6">
				<a rel="nofollow" target="_blank" href="<?php secho($livre['url']); ?>" class="link-portfolio">
					<div class="overlay-portfolio">
						<h3><?php secho(ucfirst($livre['nom'])); ?></h3>
					</div> <!-- /.overlay-portfolio -->
					<img class="img-responsive img-customer" src="<?php secho(HTTP_PWD_IMG . 'livres-sources/' . $livre['nom']); ?>.jpg" alt="<?php secho($livre['nom']); ?>">
				</a>
			</div>
			<?php
		}
	?>
</div>
