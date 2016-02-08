<ol class="breadcrumb">
	<?php
		foreach ($fils as $nom => $url)
		{
			if ($url)
			{
			?>
				<li><a href="<?php secho($url); ?>"><?php secho($nom); ?></a></li>
			<?php
			}
			else
			{
			?>
				<li class="active"><?php secho($nom); ?></li>
			<?php
			}
		}
	?>
</ol>
