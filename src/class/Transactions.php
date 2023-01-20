<?php

class Transactions extends DbObject {
    public $id_expediteur;
	public $is_destinataire;
	public $montant;
	public $nom_monnaie;
	public $date_et_heure_trans;
	public $objet_trans;
}

?>