<?php
	
	$incs = new internalIncs();
	$incs->head('Classement');
?>
<?php 
	$incs->header('classement');
?>
<div class="section-header text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Classement des startups !</h1>
			</div>
		</div>
	</div> <!-- /.container -->
</div> <!-- /.section-colored -->

<div class="container container-int">
	<div class="row">
		<div class="col-xs-12 text-center">
			<h2>Trier les startups par</h2>
			<div class="clearfix"></div>
			<div class="startups-order-button active" value="choice">% NOMBRE DE CHOIX</div>
			<div class="startups-order-button" value="desire"><span class="fa fa-smile-o"></span> ENVIE</div>
			<div class="startups-order-button" value="profitability"><span class="fa fa-line-chart"></span> RENTABILITÉ</div>
			<div class="startups-order-button" value="feasibility"><span class="fa fa-check"></span> FAISABILITÉ</div>
			<div class="startups-order-button" value="budget"><span class="fa fa-dollar"></span> DONS MOYENS</div>
		</div>
	</div>
	<div class="row startup-list-container">
		<?php $this->order('choice'); ?>
	</div>
</div>
<?php
	$incs->footer();
