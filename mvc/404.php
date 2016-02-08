<html>
<style>
	html
	{
		width: 100vw;
		height: 100vh;
		overflow: hidden;
	}

	img
	{
		position: absolute;
		min-width: 100vw;
		min-height: 100vh;
		right: 0;
		top: 0;
	}

	a
	{
		position: absolute;
		font-size: 7vh;
		color: #fff;
		text-decoration: none;
		font-family: sans-serif;
		font-weight: 100;
		right: 1vw;
		bottom: 5vh;

	}
	
	a:hover
	{
		text-decoration: underline;
	}
</style>
<img src="<?php echo HTTP_PWD_IMG; ?>/404.jpg" alt="404 page not found" />
<a href="<?php echo HTTP_PWD; ?>" title="Allez à l'accueil">Retour à l'accueil</a>
</html>
