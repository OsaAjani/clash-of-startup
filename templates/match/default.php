<?php
	
	$incs = new internalIncs();
	$incs->head('Comparaison');
?>
<?php 
	$incs->header('match');
?>
<div class="section-header text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Que le meilleur gagne !</h1>
			</div>
		</div>
	</div> <!-- /.container -->
</div> <!-- /.section-colored -->

<div class="container container-int">
	<div class="row">
		<div class="container-comparaison">
			<div class="col-xs-5" id="firstUne">
				<span class="link-portfolio une-comparaison" randomid="<?php secho($startups[0]['randomid']); ?>">
					<h2 class="startupNom"><?php secho($startups[0]['nom']); ?></h2>
					<div class="overlay-portfolio text-center line-height use-for-height">
						<h3 class="full-height"><?php secho($texteOne); ?></h3>
					</div>
					<img src="<?php secho(HTTP_PWD_IMG . 'unes-resize/' . $startups[0]['randomid']); ?>.jpg" alt="<?php secho($startups[0]['nom']); ?>" />

					<br/><hr/><br/>

					<div class="startupDescription">
						<?php secho($startups[0]['description']); ?>
					</div>
				</span>
			</div>
			<div class="col-xs-2 text-center full-height" useforheight=".container-comparaison">
					<div class="versus-radius carre line-height"><span class="fa fa-spinner fa-spin hidden versus-icon"></span><span class="versus-text">Vs.</span></div>	
			</div>
			<div class="col-xs-5" id="secondUne">
				<span class="link-portfolio une-comparaison" randomid="<?php secho($startups[1]['randomid']); ?>">
					<h2 class="startupNom"><?php secho($startups[1]['nom']); ?></h2>
					<div class="overlay-portfolio text-center line-height use-for-height">
						<h3 class="full-height"><?php secho($texteTwo); ?></h3>
					</div>
					<img src="<?php secho(HTTP_PWD_IMG . 'unes-resize/' . $startups[1]['randomid']); ?>.jpg" alt="<?php secho($startups[1]['nom']); ?>" />

					<br/><hr/><br/>

					<div class="startupDescription">
						<?php secho($startups[1]['description']); ?>
					</div>
				</span>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="modal fade vote-popup" tabindex="-1" role="dialog" aria-labelledby="">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<h3>Que pensez-vous de cette startup ?</h3>
			<form method="POST" action="#" id="vote-popup-form">
				<div class="form-group">
					<label for="desire">Niveau d'envie que vous inspire ce projet</label>
					<select class="form-control" id="desire">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				<div class="form-group">
					<label for="profitability">Potentiel économique du projet (business modèle, bénéfices possibles)</label>
					<select class="form-control" id="profitability">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				<div class="form-group">
					<label for="feasibility">Niveau de faisabilité du projet</label>
					<select class="form-control" id="feasibility">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				<div class="form-group">
					<label for="budget">Si vous deviez soutenir ce projet, combien seriez-vous prêt à investir</label>
					<select class="form-control" id="budget">
						<option value="0">0€</option>
						<option value="5">5€</option>
						<option value="10">10€</option>
						<option value="25">25€</option>
						<option value="50">50€</option>
						<option value="75">75€</option>
						<option value="100">100€</option>
					</select>
				</div>
				<button type="submit" class="btn btn-success">Voter</button>
			</form>
		</div>
	</div>
</div>
<?php
	$incs->footer();
