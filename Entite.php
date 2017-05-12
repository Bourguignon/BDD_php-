<?php

class Client{
	
	//DONNEES MEMBRES
	private static $_ncli=0;
	private $_nom;
	private $_prenom;
	private $_adresse;
	private $_cp;
	private $_ville;
	private $_pays;
	private $_Facture = array();
	
	//Fonctions MEMBRES
	
	public function __construct($mNom,$mPrenom,$mAdresse,$mCp,$mVille,$mPays){
		
		echo "Constructeur </br>";
		self::initClient();
		$this->_nom=$mNom;
		$this->_prenom=$mPrenom;
		$this->_adresse=$mAdresse;
		$this->_cp=$mCp;
		$this->_ville=$mVille;
		$this->_pays=$mPays;
	}
	
	public static function initClient(){
		
		self::$_ncli++;
	}
	
	public function __destruct(){
		
		echo "Destroy ".self::$_ncli."<br/>";
		echo "Destroy ".$this->_nom."</br>";
		echo "Destroy ".$this->_prenom."</br>";
		echo "Destroy ".$this->_adresse."</br>";
		echo "Destroy ".$this->_cp."</br>";
		echo "Destroy ".$this->_ville."</br>";
		echo "Destroy ".$this->_pays."</br>";
	}
	
	public function afficheClient(){
		
		echo "ID : ".self::$_ncli."<br/>";
		echo "Nom : ".$this->_nom."<br/>";
		echo "Prenom : ".$this->_prenom."<br/>";
		echo "Adresse : ".$this->_adresse."<br/>";
		echo "Code Postal : ".$this->_cp."<br/>";
		echo "Ville : ".$this->_ville."<br/>";
		echo "Pays : ".$this->_pays."<br/>";
	}
	
	public function createFacture($mFacture){
		
		$this->_Facture = $mFacture;
	}
	
	//Mutateur
	//Get
	public function getFacture(){
		
		return $this->_Facture;
	}
	
	public function getNcli(){
		
		return self::$_ncli;
	}
	
	public function getNom(){
		
		return $this->_nom;
	}
	
	public function getPrenom(){
		
		return $this->_prenom;
	}
	
	public function getAdresse(){
		
		return $this->_adresse;
	}
	
	public function getCp(){
		
		return $this->_cp;
	}
	
	public function getVille(){
		
		return $this->_ville;
	}
	
	public function getPays(){
		
		return $this->_pays;
	}
	
	//Set
	public function setNom($mNom){
		
		return $this->_nom=$mNom;
	}
	
	public function setPrenom($mPrenom){
		
		return $this->_prenom=$mPrenom;
	}
	
	public function setAdresse($mAdresse){
		
		return $this->_adresse=$mAdresse;
	}
	
	public function setCp($mCp){
		
		return $this->_cp=$mCp;
	}
	
	public function setVille($mVille){
		
		return $this->_ville=$mVille;
	}
	
	public function setPays($mPays){
		
		return $this->_pays=$mPays;
	}
}

class Facture{
	
	//DONNEES MEMBRES
	private static $_ncom=0;
	private $_date;
	private $Client;
	private $Detail = array ();
	
	//Fonctions MEMBRES
	public function __construct($mDate){
		
		echo "Constructeur </br>";
		self::initFacture();
		$this->_date=$mDate;
	}
	
	public function initFacture(){
		
		self::$_ncom++;
	}
	
	public function __destruct(){
		
		echo "Destroy ".self::$_ncom."<br/>";
		echo "Destroy ".$this->_date."</br>";
	}
	
	public function afficheFacture(){
		
		echo "ID : ".self::$_ncom."<br/>";
		echo "Date : ".$this->_date."</br>";
	}
	
	public function createClient($mClient){
		
		$this->_Client= $mClient;
	}
	
	public function createDetail($mDetail){
		
		$this->_Detail=$mDetail;
	}
	//Mutateur
	//Get
	public function getClient(){
		
		return $this->_Client;
	}
	
	public function getDetail(){
		
		return $this->_Detail;
	}
	
	public function getNbFacture(){
		
		return self::$_ncom;
	}
	
	public function getDate(){
		
		return $this->_date;
	}
	
	//Set
	public function setDate($mDate){
		
		return $this->_date=$mDate;
	}
}

class Produit{
	
	//DONNEES MEMBRES
	private static $_nprod=0;
	private $_des;
	private $_puht;
	private $_Detail = array();
	
	//Fonctions MEMBRES
	public function __construct($mDes,$mPuht){
		
		echo "Constructeur </br>";
		self::initProduit();
		$this->_des=$mDes;
		$this->_puht=$mPuht;
	}
	
	public function initProduit(){
		
		self::$_nprod++;
	}
	
	public function __destruct(){
		
		echo "Destroy ".self::$_nprod."<br/>";
		echo "Destroy ".$this->_des."</br>";
		echo "Destroy ".$this->_puht."</br>";
	}
	
	public function afficheProduit(){
		
		echo "ID : ".self::$_nprod."<br/>";
		echo "Description : ".$this->_des."<br/>";
		echo "Prix unitaire HT : ".$this->_puht."<br/>";
	}
	
	public function createDetail($mDetail){
		
		$this->_Detail = $mDetail;
	}
	
	//Mutateur
	//Get
	public function getDetail(){
		
		return $this->_Detail;
	}
	
	public function getDes(){
		
		return $this->_des;
	}
	
	public function getPuht(){
		
		return $this->_puht;
	}
	
	//Set
	public function setDes($mDes){
		
		return $this->_des=$mDes;
	}
	
	public function setPuht($mPuht){
		
		return $this->_puht=$mPuht;
	}
}

class Detail{
	
	//DONNEES MEMBRES
	private static $_ndet;
	private $_qte;
	private $_Facture;
	private $_Produit = array();
	
	//Fonctions MEMBRES
	public function __construct($mQte){
		
		echo "Constructeur </br>";
		self::initDetail();
		$this->_qte=$mQte;
	} 
	
	public function initDetail(){
		
		self::$_ndet++;
	}
	
	public function __destruct(){
		
		echo "Destroy ".self::$_ndet."<br/>";
		echo "Destroy ".$this->_qte."</br>";
	}
	
	public function afficheDetail(){
		
		echo "ID : ".self::$_ndet."<br/>";
		echo "Quantite : ".$this->_qte."<br/>";
	}
	
	public function createProduit($mProduit){
		
		$this->_Produit = $mProduit;
	}
	
	public function createFacture($mFacture){
		
		$this->_Facture = $mFacture;
	}
	
	//Mutateur
	//Get
	public function getFacture(){
		
		return $this->_Facture;
	}
	
	public function getProduit(){
		
		return $this->_Produit;
	}
	
	public function getNbDetail(){
		
		return self::$_ndet;
	}
	
	public function getQte(){
		
		return $this->_qte;
	}
	
	//Set
	public function setQte($mQte){
		
		return $this->_qte=$mQte;
	}
}



$Client=new Client("Bourguignon","Kévin","20 rue dudu",67500,"Ville","France");
$Facture=new Facture("11-05-2017");
$Produit=new Produit("Orinateur",19.99);
$Detail=new Detail(20);

/*$Client->afficheClient();
$Facture->afficheFacture();
$Produit->afficheProduit();
$Detail->afficheDetail();*/

$Client->createFacture($Facture);
$Facture->createClient($Client);
$Facture->createDetail($Detail);
$Produit->createDetail($Detail);
$Detail->createFacture($Facture);
$Detail->createProduit($Produit);

$Client->getFacture()->afficheFacture();
$Facture->getClient()->afficheClient();
$Facture->getDetail()->afficheDetail();
$Produit->getDetail()->afficheDetail();
$Detail->getFacture()->afficheFacture();
$Detail->getProduit()->afficheProduit();
?>