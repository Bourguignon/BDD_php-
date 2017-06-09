<?php
class ClientsManager{
	
	private $_db;
	
	public function __construct($mdb){
		
		$this->setDb($mdb);
	}
	
	public function add(Client $mCli){
		
		$q = $this->_db->prepare('INSERT INTO client (NumClient,NomClient,PrenomClient,
		AdresseClient,Cp,VilleClient,PaysClient) VALUES (:num,:nom,:prenom,:adr,:cp,:ville,:pays)');
	
		$q->bindValue(':num',$mCli->getId(),PDO::PARAM_INT);
		$q->bindValue(':nom',$mCli->getNom());
		$q->bindValue(':prenom',$mCli->getPrenom());
		$q->bindValue(':adr',$mCli->getAdresse());
		$q->bindValue(':cp',$mCli->getCp());
		$q->bindValue(':ville',$mCli->getVille());
		$q->bindValue(':pays',$mCli->getPays());
		
		$q->execute();
	}
	
	public function delete(Client $mCli){
		
		$this->_db->exec('DELETE FROM client where NumClient= '.$mCli->getId());
	}
	
	public function get($id){
		
		$id=(int) $id;
		
		$q=$this->_db->query('SELECT NumClient,NomClient,PrenomClient,
		AdresseClient,Cp,VilleClient,PaysClient FROM client where NumClient= '.$id);
		$donnees=$q->fetch(PDO::FETCH_ASSOC);
		
		return new Client($donnees);
	}
	
	public function getList(){
		
		$Clients=[];
		
		$q=$this->_db->query('SELECT NumClient,NomClient,PrenomClient,
		AdresseClient,Cp,VilleClient,PaysClient FROM client ORDER BY NomClient');
		
		while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
			
			$Clients[] = new Client($donnees);
		}
		
		return $Clients;
	}
	
	public function update(Client $mCli){
		
		$q = $this->_db->prepare('UPDATE client SET NomClient = :nom,PrenomClient = :prenom ,
		AdresseClient = :adr,Cp = :cp,VilleClient = :ville,PaysClient = :pays WHERE NumClient = :num');
	
		
		$q->bindValue(':nom',$mCli->getNom());
		$q->bindValue(':prenom',$mCli->getPrenom());
		$q->bindValue(':adr',$mCli->getAdresse());
		$q->bindValue(':cp',$mCli->getCp());
		$q->bindValue(':ville',$mCli->getVille());
		$q->bindValue(':pays',$mCli->getPays());
		$q->bindValue(':num',$mCli->getId(),PDO::PARAM_INT);
		
		$q->execute();
	}
	
	public function setDb(PDO $mdb){
		
		$this->_db=$mdb;
	}
}
?>