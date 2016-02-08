<?php
	/**
	 * Cette classe contient l'ensemble des requetes sur la base
	 */
	class DataBase extends Model
	{
		/**
		 * Cette fonction permet de modifier les données d'une table pour un la clef primaire
		 * @param string $table : Le nom de la table dans laquelle on veux insérer des données
		 * @param string $primary : La clef primaire qui sert à identifier la ligne a modifier
		 * @param array $datas : Les données à insérer
		 */
		public function updateTable($table, $primary, $datas)
		{
			$fields = $this->describeTable($table);
			if (!$fields)
			{
				return false;
			}
			
			$params = array();
			$sets = array();
			$primaryField = null;


			//On s'assure davoir toutes les données, on définie le champs primaire, on casse en cas de donnée absente, etc.
			foreach ($fields as $nom => $field)
			{
				//On fixe le champs primaire
				if ($field['PRIMARY'])
				{
					$primaryField = $nom;
					$params[$nom] = $primary;
					continue;
				}

				//Si il manque un champs qui peux être NULL, on passe au suivant				
				if ((!isset($datas[$nom]) || $datas[$nom] === NULL || $datas[$nom] === '') && $field['NULL'])
				{
					continue;
				}
				
				//Si il nous manque un champs
				if (!isset($datas[$nom]))
				{
					return false;
				}

				$params[$nom] = $datas[$nom];
				$sets[] = $nom . " = :" . $nom . " ";
			}
			
			//On fabrique la requete
			$query = "UPDATE " . $table . " SET " . implode(', ', $sets) . " WHERE " . $primaryField . " = :" . $primaryField;

			//On retourne le nombre de lignes insérées
			return $this->runQuery($query, $params, self::ROWCOUNT);
		}

		/**
		 * Cette fonction permet de supprimer une ligne d'une table pour un id donné
		 * @param string $table : Le nom de la table dans laquelle on veux supprimer la ligne
		 * @param int $id : L'id de la ligne que l'on veux supprimer
		 * @return mixed : Si le champs id existe dans cette table, on retourne le nombre de ligne delete. Sinon, false.
		 */
		public function deleteFromTableForId($table, $id)
		{
			//Pour pouvoir mener cette opération nous devons etre sur que le champs id existe dans la table
			if (!$this->fieldExist('id', $table))
			{
				return false;
			}

			$query = 'DELETE FROM ' . $table . ' WHERE id = :id';
			$params = array('id' => $id);

			return $this->runQuery($query, $params, self::ROWCOUNT);
		}

		/**
		 * Cette fonction permet de récupérer une ligne en fonction de son id
		 * @param string $table : Le nom de la table dans laquelle on veux recuperer la ligne
		 * @param int $id : L'id de la ligne que l'on veux recuperer
		 * @return mixed : Si le champs id nexiste pas, on retourne false, sinon on retourne la ligne
		 */
		public function getFromTableForId($table, $id)
		{
			//Pour pouvoir mener cette opération nous devons etre sur que le champs id existe dans la table
			if (!$this->fieldExist('id', $table))
			{
				return false;
			}
			
			$query = "SELECT " . $this->getColumnsForTable($table) . " FROM " . $table . " WHERE id = :id";
			$params = array('id' => $id);

			return $this->runQuery($query, $params, self::FETCH);
		}

		/**
		 * Cette fonction retourne deux unes recupérées au hasard qui ne sont pas dans une liste d'id
		 * @param array $notIn : Le tableau des id à eviter
		 * @return array : Les deux unes recupérées
		 */
		public function getTowUnesNotIn($notIn)
		{
			$params = array();			
			$query = "SELECT " . $this->getColumnsForTable('unes') . " FROM unes";

			if (count($notIn))
			{
				$clauseIn = $this->generateInFromArray($notIn);
				$query .= " WHERE id NOT " . $clauseIn['QUERY'];
				$params = array_merge($params, $clauseIn['PARAMS']);
			}

			$query .= " ORDER BY RAND() LIMIT 0,2";
			return $this->runQuery($query, $params);
		}

		/**
		 * Cette fonction retourne une Une en fonction d'un randomid
		 * @param string $randomid : Le randomid de la une
		 * @return array : la une
		 */
		public function getUneByRandomid($randomid)
		{
			$query = "SELECT " . $this->getColumnsForTable('unes') . " FROM unes WHERE randomid = :randomid";
			$params = array('randomid' => $randomid);
			return $this->runQuery($query, $params, self::FETCH);
		}

		/**
		 * Cette fonction insert un vote
		 * @param string $ip : L'adresse ip qui a voté
		 * @param int $choice : L'id de la une pour laquelle on a voté
		 * @return int : Le nombre de ligne insérées
		 */
		public function insertVote($ip, $choice)
		{
			$query = "INSERT INTO votes(at, ip, choice)
				VALUES(NOW(), :ip, :choice)";
			$params = array(
				'ip' => $ip,
				'choice' => $choice,
			);

			return $this->runQuery($query, $params, self::ROWCOUNT);
		}	

		/**
		 * Cette fonction retourne les trois meilleurs unes
		 * @return array : Les unes
		 */
		public function get3BestUnes()
		{
			$query = "
				SELECT " . $this->getColumnsForTable('unes', 'unes') . ", COUNT(votes.choice) AS nb_votes
				FROM unes
				JOIN votes
				ON (unes.id = votes.choice)
				GROUP BY unes.id
				ORDER BY nb_votes DESC
				LIMIT 0,3";

			return $this->runQuery($query);
		}

		/**
		 * ATTENTION : LES PARAMETRES LIMIT ET OFFSET NE SONT PAS FILTRES FORTEMENT, JUSTE PASSE EN INT POSITIF !
		 * Cette fonction retourne les unes classées par nombre de votes
		 * @param int $limit : Le nombre de unes maximum à retourner
		 * @param int $offset : Le nombre de unes à ignorer
		 */
		public function getUnesOrderByVotes($limit, $offset)
		{
			$limit = abs((int) $limit);
			$offset = abs((int) $offset);		
			$query = "
				SELECT " . $this->getColumnsForTable('unes', 'unes') . ", COUNT(votes.choice) AS nb_votes
				FROM unes
				LEFT JOIN votes
				ON (unes.id = votes.choice)
				GROUP BY unes.id
				ORDER BY nb_votes DESC, unes.id
				LIMIT " . $offset . "," . $limit;

			return $this->runQuery($query);
		}

		/**
		 * Cette fonction retourne le nombre de vote groupé par date, sur les 7 dernier jour, pour un champ choice donné
		 * @param array $choice : L'id de la une que l'on veux
		 * @return array : Le nombre de vote sur les unes par dates
		 */
		public function getNbVotesOnLast7DayGroupByDateForChoice ($choice)
		{
			$query = "
				SELECT COUNT(id) AS nb_votes, choice, DATE_FORMAT(at, '%Y-%m-%d') AS date_vote
				FROM votes
				WHERE choice = :choice
				AND at > DATE_SUB(NOW(), INTERVAL 7 DAY)
				GROUP BY date_vote, choice
				ORDER BY nb_votes, date_vote DESC
				";
			
			$params = array(
				'choice' => $choice,
			);
			return $this->runQuery($query, $params);
		}
		
		/**
		 * Cette fonction retourne le nombre de vote groupé par date, sur les 7 dernier jour
		 * @return array : Le nombre de vote sur les unes par dates
		 */
		public function getNbVoteOnLast7Days ()
		{
			$query = "
				SELECT COUNT(id) AS nb_votes, DATE_FORMAT(at, '%Y-%m-%d') AS date_vote
				FROM votes
				WHERE at > DATE_SUB(NOW(), INTERVAL 7 DAY)
				GROUP BY date_vote
				ORDER BY date_vote";
			
			return $this->runQuery($query);
		}
	
	}
