<?php

class vehicule{
    protected $id;
    protected $titre;
    protected $couleur;
    protected $categorie;
    protected $prix;
    protected $adresseExacte;
    protected $gouvernerat;
    protected $ville;
    protected $image;
    protected $proprietaire;

    public function __construct() {
    }

    public function getId() {
        return $this->id;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getAdresseExacte() {
        return $this->adresseExacte;
    }

    public function getGouvernerat() {
        return $this->gouvernerat;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getImage() {
        return $this->image;
    }

    public function getProprietaire() {
        return $this->proprietaire;
    }

    public function setCouleur($couleur) {
        $this->couleur = $couleur;
    }
    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setAdresseExacte($adresseExacte) {
        $this->adresseExacte = $adresseExacte;
    }

    public function setGouvernerat($gouvernerat) {
        $this->gouvernerat = $gouvernerat;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setProprietaire($proprietaire) {
        $this->proprietaire = $proprietaire;
    }
    public function getVehiculeNonReserveOneDate($pdo,$dateDebutClient,$heureDebutClient,$heureFinClient,$vitesse,$categorie,$gouvernerat,$ville){
        try{
            $pdostat = $pdo->prepare("select * from vehicule where categorie=? and vitesse like ? and gouvernerat=? and ville=?
             and idVehicule not in 
            (select idVehiculeReserve from reservation join vehicule ON reservation.idVehiculeReserve = vehicule.idVehicule 
            where categorie=? and vitesse like ? 
            and ((dateDebut<? AND dateFin > ?) 
                 OR (dateDebut< ? and dateFin=? and heureFin> ?) 
                 OR (dateDebut=? and dateFin=? and heureFin>? and heureDebut<?)))
             ");
            $result= $pdostat->execute([
                        $categorie, $vitesse, $gouvernerat, $ville,
                        $categorie, $vitesse,
                        $dateDebutClient, $dateDebutClient,
                         $dateDebutClient, $dateDebutClient, $heureDebutClient,
                       $dateDebutClient, $dateDebutClient, $heureDebutClient, $heureFinClient
                     ]);
            $result=$pdostat->fetchAll(PDO::FETCH_ASSOC);
                return $result;
        }
        catch(PDOException $e){
            echo "erreur:".$e->getMessage();
            die();
        }
     
    }


        public function getVehiculeNonReserveTwoDate($pdo,$dateDebutClient,$heureDebutClient,$heureFinClient,$vitesse,$categorie,$dateFinClient,$gouvernerat,$ville){
            try{
                $pdostat = $pdo->prepare("select * from vehicule where categorie=? and vitesse like ? and gouvernerat=? and ville=? 
                 and idVehicule not in 
                (select idVehiculeReserve from reservation join vehicule ON reservation.idVehiculeReserve = vehicule.idVehicule 
                where categorie=? and vitesse like ? 
                and ((dateFin=? AND heureFin > ?) 
                     OR (dateDebut>=? and dateDebut<?) 
                     OR (dateFin> ? and dateFin < ?)))
                 ");
                $result=$pdostat->execute([$categorie, $vitesse,$gouvernerat,$ville,
                $categorie, $vitesse,
                $dateDebutClient,$heureDebutClient,
                $dateDebutClient,$dateFinClient,
                $dateDebutClient,$dateFinClient]);
                $result=$pdostat->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
            }
            catch(PDOException $e){
                echo "erreur:".$e->getMessage();
                die();
            }}

            public function AddVehicle($pdo,$id,$titre,$couleur,$vitesse,$image,$categorie,$gouvernerat,$ville,$adresse,$prix,$equipement,$proprietaire){
                try{
                    echo $id." ".$titre." ".$couleur." ".$vitesse." ".$image." ".$categorie." ".$gouvernerat." ".$ville." ".$adresse." ".$prix." ".$equipement." ".$proprietaire;
                    $pdostat = $pdo->prepare("INSERT INTO vehicule VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
                $pdostat->execute([$id, $titre, $couleur, $categorie, $prix, $adresse, $ville, $gouvernerat, $image, $vitesse,$equipement,$proprietaire]);
                    echo "vehicule inserée avec succées";
                }
                catch(PDOException $e){
                    echo "erreur:".$e->getMessage();
                    die();
                }
            }
            public function findAllByCin($pdo,$cin){
                try{
                    $pdostat = $pdo->prepare("select * from vehicule where proprietaire=?");
                    $result=$pdostat->execute([$cin]);
                    $result=$pdostat->fetchAll(PDO::FETCH_ASSOC);
                        return $result;
                }
                catch(PDOException $e){
                    echo "erreur:".$e->getMessage();
                    die();
                }
            }
            public function findByID($pdo,$id){
                try{
                    $pdostat = $pdo->prepare("select * from vehicule where idVehicule=?");
                    $result=$pdostat->execute([$id]);
                    $result=$pdostat->fetchAll(PDO::FETCH_ASSOC);
                        return $result;
                }
                catch(PDOException $e){
                    echo "erreur:".$e->getMessage();
                    die();
                }
            }
            public function UPDATE($pdo, $id, $titre, $couleur, $vitesse, $image, $categorie, $gouvernerat, $ville, $adresse, $prix, $equipement) {
                try {
                    $pdostat = $pdo->prepare("UPDATE vehicule SET
                        titre = ?,
                        couleur = ?,
                        categorie = ?,
                        prix = ?,
                        adresseExacte = ?,
                        ville = ?,
                        gouvernerat = ?,
                        image = ?,
                        vitesse = ?,
                        equipement = ?
                        WHERE idVehicule = ?");
            
                    $result = $pdostat->execute([$titre, $couleur, $categorie, $prix, $adresse, $ville, $gouvernerat, $image, $vitesse, $equipement, $id]);
                } catch (PDOException $e) {
                    echo "erreur:" . $e->getMessage();
                    die();
                }
            }
    }

?>