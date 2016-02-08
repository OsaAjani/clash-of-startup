<?php foreach ($startups as $startup) { ?>
	<div class="col-xs-12 startup-container">
		<h3 class="text-center"><?php secho($startup['nom']); ?></h3>
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-3 col-md-offset-0">
			<img class="startup-img" src="<?php echo HTTP_PWD_IMG . '/unes/' . $startup['randomid'] . '.png'; ?>" />
			<div class="clearfix"></div>
		</div>
		<div class="col-xs-12 col-md-9">
			<div class="startup-stat-container"><div class="startup-stat carre line-height <?php echo $by == 'choice' ? 'active' : ''; ?>">
				<span class="value"><?php secho($startup['choice']); ?></span><span class="logo">%</span>
			</div></div><div class="startup-stat-container"><div class="startup-stat carre line-height <?php echo $by == 'desire' ? 'active' : ''; ?>">
				<span class="value"><?php secho($startup['desire']); ?></span><span class="logo fa fa-smile-o"></span>
			</div></div><div class="startup-stat-container"><div class="startup-stat carre line-height <?php echo $by == 'profitability' ? 'active' : ''; ?>">
				<span class="value"><?php secho($startup['profitability']); ?></span><span class="logo fa fa-line-chart"></span>
			</div></div><div class="startup-stat-container"><div class="startup-stat carre line-height <?php echo $by == 'feasibility' ? 'active' : ''; ?>">
				<span class="value"><?php secho($startup['feasibility']); ?></span><span class="logo fa fa-check"></span>
			</div></div><div class="startup-stat-container"><div class="startup-stat carre line-height <?php echo $by == 'budget' ? 'active' : ''; ?>">
				<span class="value"><?php secho($startup['budget']); ?></span><span class="logo fa fa-usd"></span>
			</div>
		</div>
	</div>
	</div>
	<div class="clearfix"></div>
	<hr>
<?php } ?>
