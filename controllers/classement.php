<?php
	/**
	 * Ce controller gère la page d'accueil
	 */
	class classement extends Controller
	{
		/**
		 * Cette fonction est un alias de accueil
		 * @return void;
		 */	
		public function byDefault()
		{
			global $db;
			return $this->render('classement/default');
		}

		/**
		 * Cette fonction permet de trier les startups
		 */
		public function order($by)
		{
			global $db;

			$startups = $db->getFromTableWhere('startups');

			foreach ($startups as $key => $startup)
			{
				$votes = $db->getFromTableWhere('votes', ['startup_id' => $startup['id']]);

				$desire = 0;
				$profitability = 0;
				$feasibility = 0;
				$budget = 0;

				foreach ($votes as $vote)
				{
					$desire += $vote['desire'];
					$profitability += $vote['profitability'];
					$feasibility += $vote['feasibility'];
					$budget += $vote['budget'];
				}

				$nbMatchs = count($db->getFromTableWhere('matchs', ['startup_id_one' => $startup['id']])) + count($db->getFromTableWhere('matchs', ['startup_id_two' => $startup['id']]));

				$startups[$key]['desire'] = round($desire / (count($votes) ? count($votes) : 1), 1);
				$startups[$key]['profitability'] = round($profitability / (count($votes) ? count($votes) : 1), 1);
				$startups[$key]['feasibility'] = round($feasibility / (count($votes) ? count($votes) : 1), 1);
				$startups[$key]['budget'] = round($budget / (count($votes) ? count($votes) : 1), 1);
				$startups[$key]['choice'] = round(((count($votes) / ($nbMatchs ? $nbMatchs : 1)) * 100), 1);
			}

			switch ($by)
			{
				case 'desire':
					usort($startups, [$this, 'sortByDesire']); 
					break;
				case 'profitability':
					usort($startups, [$this, 'sortByProfitability']); 
					break;
				case 'feasibility':
					usort($startups, [$this, 'sortByFeasibility']); 
					break;
				case 'budget':
					usort($startups, [$this, 'sortByBudget']); 
					break;
				case 'choice':
					usort($startups, [$this, 'sortByChoice']); 
					break;
			}

			$startups = array_reverse($startups);

			return $this->render('classement/order', array(
				'startups' => $startups,
				'by' => $by,
			));
		}

		private function sortByDesire ($a, $b)
		{
			return (($a['desire'] == $b['desire'] ? 0 : ($a['desire'] < $b['desire'] ? -1 : 1)));
		}

		private function sortByProfitability ($a, $b)
		{
			return (($a['profitability'] == $b['profitability'] ? 0 : ($a['profitability'] < $b['profitability'] ? -1 : 1)));
		}

		private function sortByFeasibility ($a, $b)
		{
			return (($a['feasibility'] == $b['feasibility'] ? 0 : ($a['feasibility'] < $b['feasibility'] ? -1 : 1)));
		}

		private function sortByBudget ($a, $b)
		{
			return (($a['budget'] == $b['budget'] ? 0 : ($a['budget'] < $b['budget'] ? -1 : 1)));
		}

		private function sortByChoice ($a, $b)
		{
			return (($a['choice'] == $b['choice'] ? 0 : ($a['choice'] < $b['choice'] ? -1 : 1)));
		}
	}
