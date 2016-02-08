<?php
	class internalIncs extends Controller
	{
		/**
		 * Cette fonction retourne le header html
		 * @param string $title : Le titre de la page, si non fourni laissé à vide
		 */
		public function head($title = '')
		{
			$title = (!empty($title) ? $title . ' - ' : '') . 'Clash Of Startup';

			$description = 'Clash Of Startup, choisissez la meilleure startup !';
			$keywords = '';
			$author = 'nobody';
			
			return $this->render('incs/head', array(
				'title'			=> $title,
				'description'		=> $description,
				'keywords'		=> $keywords,
				'author'		=> $author,
			));
		}
		
		/**
		 * Cette fonction retourne le header du site
		 * @param string $currentPage, le nom de la page actuel, il s'agit de la clef renseignée dans le tableau $page défini dans cette méthode
		 */
		public function header($currentPage)
		{
			return $this->render('incs/header', array(
				'currentPage'		=> $currentPage,
			));
		}

		/**
		 * Cette fonction retourne le header de l'admin du site
		 * @param string $currentPage, le nom de la page actuel, il s'agit de la clef renseignée dans le tableau $page défini dans cette méthode
		 */
		public function headerAdmin($currentPage)
		{
			return $this->render('incs/headerAdmin', array(
				'currentPage'		=> $currentPage,
			));
		}
	
		/**
		 * Cette fonction retourne le footer du site
		 */	
		public function footer()
		{			
			return $this->render('incs/footer');
		}

		/**
		 * Cette fonction retourne le carrousel
		 */
		public function carousel()
		{
			return $this->render('incs/carousel');
		}
	
		/**
		 * Cette fonction retourne un fil d'ariane
		 * @param array $fils : Le tableau des URL du fil au format "nom du fil" => "url". Le dernier fil ne doit pas avoir d'url et sera le fil en cours
		 */
		public function ariane($fils)
		{
			return $this->render('incs/ariane', array('fils' => $fils));
		}

		/**
		 * Cette fonction retourne la pagination d'une page
		 * @param array $pagination : Le tableau qui contient les pages à afficher. Sous les clefs 'current' le numéro de la page en cours, sous 'prev' la page précedente, sous 'next' la suivante
		 */
		public function paginate($pagination)
		{
			return $this->render('incs/pagination', array('pagination' => $pagination));
		}
	}
