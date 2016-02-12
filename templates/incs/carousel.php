<div id="myCarousel" class="carousel slide">
<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<div class="fill" style="background-image:url('<?php echo HTTP_PWD_IMG; ?>carousel/startup.jpg');"></div>
			<div class="carousel-caption">
				<h2>Clash Of Startup, qui sera la meilleure startup ?</h2>
				<a class="button" href="<?php echo $this->generateUrl('match'); ?>">VOTEZ POUR LES STARTUPS</a>
			</div>
		</div>
	</div>

	<!-- Controls -->
<!--
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<i class="fa fa-angle-left"></i>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<i class="fa fa-angle-right"></i>
	</a>
-->
</div>
