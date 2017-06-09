
<?php

//classe Client
class Client{


	//Données Membres
	private $_IdClient;
	private $_Nom;
	private $_Prenom;
	private $_Adresse;
	private $_Cp;
	private $_Ville;
	private $_Pays;

	
	private $_collectFacture=array();
	

	//Fcts Membres

	
	public function __construct(/*$mId,$mNom,$mPrenom,$mAdr,$mCp,$mVille,$mPays */array $donnees){

		//echo "Contructeur <br/>";
		/*$this->_IdClient=$mId;
		$this->_Nom=$mNom;
		$this->_Prenom=$mPrenom;
		$this->_Adresse=$mAdr;
		$this->_Cp=$mCp;
		$this->_Ville=$mVille;
		$this->_Pays=$mPays;*/
		
		foreach ($donnees as $key => $value){

			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method)){

				$this->$method($value);

			}

		}
		
		/*$this->_IdClient=0;
		$this->_Nom="";
		$this->_Prenom="";
		$this->_Adresse="";
		$this->_Cp="";
		$this->_Ville="";
		$this->_Pays="";*/
		

	
	}
	
	public function hydrate(Client $donnees){
		
		foreach ($donnees as $key => $value){

			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method)){

				$this->$method($value);

			}

		}
	}

	public function __destruct(){

		

	}



	//Mutateurs

	public function getId(){


		return $this->_IdClient;
	}

	public function getNom(){


		return $this->_Nom;
	}

	public function getPrenom(){


		return $this->_Prenom;
	}

	public function getAdresse(){


		return $this->_Adresse;
	}

	public function getCp(){

		return $this->_Cp;
	}


	public function getVille(){

		return $this->_Ville;

	}

	public function getPays(){

		return $this->_Pays;

	}

	public function setIdClient($mId){

		$this->_IdClient=$mId;

	}

	public function setNom($mNom){

		$this->_Nom=$mNom;

	}

	public function setPrenom($mPrenom){

		$this->_Prenom=$mPrenom;

	}

	public function setAdresse($mAdresse){

		$this->_Adresse=$mAdresse;

	}

	public function setCp($mCp){

		$this->_Cp=$mCp;

	}

	public function setVille($mVille){

		$this->_Ville=$mVille;

	}

	public function setPays($mPays){

		$this->_Pays=$mPays;

	}

	public function affiche(){

		echo $this->_IdClient."<br/>".$this->_Nom."<br/>".$this->_Prenom."<br/>".$this->_Adresse."<br/>".$this->_Cp."<br/>".$this->_Ville."<br/>".$this->_Pays."<br/>"; 
		//echo $this->_collectFacture[$i]->affiche();"<br/>";

		// Affichage des produits dans la facture
  		/*foreach(self::getFactClient() as $valeur) {
 
    		echo $valeur->affiche().'<br/>';
    			
  		}*/

	}



	public function getFactClient(){

		return $this->_collectFacture;

	}

	public function addFature(Facture $mCollection){

		if (!in_array($mCollection,$this->_collectFacture)){
			$mCollection->setClient($this);
			$this->_collectFacture[]=$mCollection;
		}
		
			

	}


	
}


?>