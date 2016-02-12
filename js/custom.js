/* 
	Ce fichier contient l'ensemble des fonctions appelé sur le site
*/

/* Cette fonction rend une div carre en hauteur de façon responsive */
function carre()
{
	jQuery('.carre').each(function()
	{
		var width = jQuery(this).width();
		jQuery(this).height(width);
	});
}

/* Cette fonction permet de fixer le line-height à la hauteur de la div */
function lineHeight()
{
	jQuery('.line-height').each(function()
	{
		var height = jQuery(this).height();
		jQuery(this).css('line-height', height + 'px');
	});
}

/* Cette fonction permet de fixer le height à la hauteur de la div parente */
function fullHeight()
{
	jQuery('.full-height').each(function()
	{
		var useforheight = jQuery(this).attr('useforheight');
		if (useforheight)
		{
			useforheight = jQuery(useforheight);
		}
		else
		{
			useforheight = jQuery(this).parent().closest('.use-for-height');
		}

		var height = useforheight.height();
		jQuery(this).css(
		{
			'height': height + 'px',
			'line-height': height + 'px',
		});
	});
}

/* Cette fonction permet de positionner comme il faut le rubban */
function moveRubban()
{
	jQuery('.rubban-une').each(function()
	{
		jQuery(this).css('top', '-' + jQuery(this).height() * 0.70 + 'px');
	});
}

/**
 * Cette fonction permet de changer de unes sur la page de comparaison.
 * @param data : Le donnees des unes sous forme json
 */
function changeUnes(data)
{
	var firstUne = jQuery('body').find('#firstUne');
	var secondUne = jQuery('body').find('#secondUne');

	firstUne.find('img').replaceWith('<img src="' + HTTP_PWD + 'img/unes/' + data.newStartups[0].randomid + '.png' + '" alt="' + data.newStartups[0].nom + '" />');
	firstUne.find('.startupNom').text(data.newStartups[0].nom);
	firstUne.find('.startupDescription').text(data.newStartups[0].description);

	secondUne.find('img').replaceWith('<img src="' + HTTP_PWD + 'img/unes/' + data.newStartups[1].randomid + '.png' + '" alt="' + data.newStartups[1].nom + '" />');
	secondUne.find('.startupNom').text(data.newStartups[1].nom);
	secondUne.find('.startupDescription').text(data.newStartups[1].description);

	firstUne.find('h3').text(data.newStartups[0].randomText);
	secondUne.find('h3').text(data.newStartups[1].randomText);

	firstUne.find('.une-comparaison').attr('randomid', data.newStartups[0].randomid);
	secondUne.find('.une-comparaison').attr('randomid', data.newStartups[1].randomid);

	nbImgLoad = 0;
	jQuery('.container-comparaison').find('img').on('load', function() {
		nbImgLoad ++;
		if (nbImgLoad == 2)
		{
			nbImgLoad = 0;
			jQuery('.versus-text').removeClass('hidden');	
			jQuery('.versus-icon').addClass('hidden');
			jQuery('body').find('#firstUne').removeClass('fadeOutLeft').setAnimation('fadeInLeft');
			jQuery('body').find('#secondUne').removeClass('fadeOutRight').setAnimation('fadeInRight');
		}
	});
}

function ajaxVote()
{
	jQuery.ajaxSetup({async: false});

	var ajaxUrl = HTTP_PWD + "match/vote/" + AFrandomid + "/" + AFdesire + "/" + AFprofitability + "/" + AFfeasibility + "/" + AFbudget;

	jQuery.post(ajaxUrl, function(data)
	{
		//Si on a reçu un bon retour
		if (data.success == 'ok')
		{
			changeUnes(data);
		}
		else //Sinon on recharge la page
		{
			window.location = '#';
		}
	}, "json");
	jQuery.ajaxSetup({async: true});	
}

function ajaxVotePopup()
{
	jQuery('.vote-popup').modal('show');
}

jQuery(document).ready(function ()
{
	carre();
	lineHeight();
	fullHeight();
	moveRubban();	
	jQuery(window).on('resize', function()
	{
		carre();
		lineHeight();
		fullHeight();
		moveRubban();	
	});

	nbImgLoad = 0;
	jQuery('.container-comparaison').find('img').on('load', function() {
		nbImgLoad ++;
		if (nbImgLoad == 2)
		{
			nbImgLoad = 0;
			carre();
			lineHeight();
			fullHeight();
		}
	});

	//On gère le clic sur un match
	jQuery('body').on('click', '.une-comparaison', function ()
	{
		AFrandomid = jQuery(this).attr('randomid');
		ajaxVotePopup();
	});

	jQuery('body').on('submit', '#vote-popup-form', function (e)
	{
		e.preventDefault();
		jQuery('.vote-popup').modal('hide');
		jQuery('.versus-text').addClass('hidden');	
		jQuery('.versus-icon').removeClass('hidden');	
		jQuery('body').find('#firstUne').setAnimation('fadeOutLeft');
		jQuery('body').find('#secondUne').setAnimation('fadeOutRight');
		
		AFdesire = jQuery(this).find('#desire').val();
		AFprofitability = jQuery(this).find('#profitability').val();
		AFfeasibility = jQuery(this).find('#feasibility').val();
		AFbudget = jQuery(this).find('#budget').val();

		ajaxTimeout = setTimeout(ajaxVote, 1000);
	});

	jQuery('body').on('click', '.startups-order-button', function ()
	{
		jQuery('body').find('.startup-list-container .startup-list-loader-container').html('<div class="startup-list-loader"><div class="fa fa-spinner fa-spin text-center"></div></div>');
		jQuery('body').find('.startups-order-button').removeClass('active');
		jQuery(this).addClass('active');
		var url = HTTP_PWD + "classement/order/" + jQuery(this).attr('value');
		jQuery.post(url, function(data)
		{
			jQuery('body').find('.startup-list-container').html(data);
			carre();
			lineHeight();
		});
	});
});
