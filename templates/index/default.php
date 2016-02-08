<?php
	$incs = new internalIncs();
	$incs->head('Accueil');
?>
<?php 
	$incs->header('accueil');
	$incs->carousel();
?>
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
				<div class="block-icon">
					<i class="fa fa-lightbulb-o"></i>
				</div>
				<div class="block-body">
					<h2>Aider à comprendre</h2>
					<div class="line-subtitle"></div>
					<p>Avec le Daily Charlie, nous cherchons à aider le plus grand nombre à comprendre les idées de Charlie Hebdo, en recontextualisant les anciennes Unes.</p>
				</div>
				</div>
				<div class="col-md-4 col-sm-4">
				<div class="block-icon">
					<i class="fa fa-globe"></i>
				</div>
				<div class="block-body">
					<h2>Faire connaitre</h2>
					<div class="line-subtitle"></div>
					<p>Nous voulons faire connaitre au plus grand nombre Charlie Hebdo, et plus particulièrement les anciennes Unes, qui ne sont plus accessibles aujourd'hui.</p>
				</div>
				</div>
				<div class="col-md-4 col-sm-4">
				<div class="block-icon">
					<i class="fa fa-newspaper-o"></i>
				</div>
				<div class="block-body">
					<h2>Amener à redécouvrir</h2>
					<div class="line-subtitle"></div>
					<p>Nous souhaitons également amener les lecteurs historiques de Charlie Hebdo à ressortir leurs anciens exemplaires et à se replonger dans leurs souvenirs liés à Charlie Hebdo.</p>
				</div>
				</div>
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</div> <!-- /.section -->
<?php
	$incs->footer();
