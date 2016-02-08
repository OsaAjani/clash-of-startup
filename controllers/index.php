<?php
	/**
	 * Ce controller gère la page d'accueil
	 */
	class index extends Controller
	{
		/**
		 * Cette fonction est un alias de accueil
		 * @return void;
		 */	
		public function byDefault()
		{
			return $this->render('index/default');
		}
	}
