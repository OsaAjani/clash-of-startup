<?php
	/**
	 * Ce controller gère les match de unes
	 */
	class match extends Controller
	{
		/**
		 * Cette fonction est un alias de comparaison
		 * @return void;
		 */	
		public function byDefault()
		{
			global $db;

			$startups = $this->getTwoRandomStartups();

			$texteOne = $this->getRandomPhraseStartups();
			$texteTwo = $this->getRandomPhraseStartups();

			return $this->render('match/default', array(
				'startups' => $startups,
				'texteOne' => $texteOne,
				'texteTwo' => $texteTwo,
			));
		}

		/**
		 * Cette fonction permet de voter pour une Une
		 * @param string $randomid : L'id random de la une pourlaquelle on vote
		 */
		public function vote($randomid, $desire, $profitability, $feasibility, $budget)
		{
			global $db;
			$retour = array(
				'success' => 'ko',
			);

			$desire = (int) $desire;	
			$profitability = (int) $profitability;	
			$feasibility = (int) $feasibility;	
			$budget = (int) $budget;	

			if (($desire < 0 || $desire > 5) || ($profitability < 0 || $profitability > 5) || ($feasibility < 0 || $feasibility > 5) || ($budget < 0 || $budget > 100))
			{
				echo json_encode($retour);
				return false;
			}

			//Si le randomid n'est pas dans ceux autorisés
			if (!isset($_SESSION['currentMatch']) || !in_array($randomid, $_SESSION['currentMatch']))
			{
				echo json_encode($retour);
				return false;
			}

			unset($_SESSION['currentMatch']);

			//Si on arrive pas a choper de unes on retourne une erreur
			if (!$startup = $db->getFromTableWhere('startups', ['randomid' => $randomid]))
			{
				echo json_encode($retour);
				return false;
			}

			$startup = $startup[0];

			$now = new DateTime();
			$now = $now->format('Y-m-d H:i:s');

			$vote = array(
				'ip' => $this->userIp,
				'at' => $now,
				'startup_id' => $startup['id'],
				'desire' => $desire,
				'profitability' => $profitability,
				'feasibility' => $feasibility,
				'budget' => $budget,
			);

			//Si on arrive pas a insérer de vote, on retourne une erreur
			if (!$db->insertIntoTable('votes', $vote))
			{
				echo json_encode($retour);
				return false;
			}

			$newStartups = $this->getTwoRandomStartups();

			foreach ($newStartups as $key => $newStartup)
			{
				$newStartups[$key]['randomText'] = $this->getRandomPhraseStartups();
			}

			$retour = array(
				'success' => 'ok',
				'newStartups' => $newStartups,
			);

			echo json_encode($retour);
			return false;
		}	

		/**
		 * Cette fonction permet de récupérer deux startups au hasard, etc
		 */
		private function getTwoRandomStartups()
		{

			global $db;

			//On boucle tant que l'on a pas de unes
			$allStartups = $db->getFromTableWhere('startups');

			if (!$startupsKeys = array_rand($allStartups, 2))
			{
				return false;
			}

			$startups = [$allStartups[$startupsKeys[0]], $allStartups[$startupsKeys[1]]];
			$_SESSION['currentMatch'] = isset($_SESSION['currentMatch']) ? $_SESSION['currentMatch'] : []; 
			
			$db->insertIntoTable('matchs', ['startup_id_one' => $startups[0]['id'], 'startup_id_two' => $startups[1]['id']]);

			foreach ($startups as $startup)
			{
				$_SESSION['currentMatch'][] = $startup['randomid'];
			}
			return $startups;
		}

		/**
		 * Cette fonction retourne une phrase au hasard parmis celles à afficher au survol d'une une
		 * @return string : La chaine tirée
		 */
		private function getRandomPhraseStartups()
		{
			$randomTexts = array(
				'Vote pour moi !',
				'Come on !',
				'Please, I just want to be loved !',
				'Tu sais que je suis le meilleur !',
				'Click me !',
				'Choisi moi !',
			);
			return $randomTexts[array_rand($randomTexts)];
		}
	}
