<?php
class user{
    protected $cin;
    protected $nom;
    protected $prenom;
    protected $ville;
    protected $gouvernerat;
    protected $email;
    protected $motpasse;
    protected $tel;
    protected $image;


    public function __construct() {
      
    }

    public function getCin() {
        return $this->cin;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getGouvernerat() {
        return $this->gouvernerat;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMotpasse() {
        return $this->motpasse;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getImage() {
        return $this->image;
    }
    public function setCin($cin) {
        $this->cin = $cin;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setGouvernerat($gouvernerat) {
        $this->gouvernerat = $gouvernerat;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMotpasse($motpasse) {
        $this->motpasse = $motpasse;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function setImage($image) {
        $this->image = $image;
    }
      public function inscription($pdo,$cin,$nom,$prenom,$email,$password,$tel,$gouvernerat,$ville,$codePostal,$image){
        try{
            $pdostat = $pdo->prepare("INSERT INTO user VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $pdostat->execute([$cin, $nom, $prenom, $email, $password, $tel, $gouvernerat, $ville, $codePostal, $image]);
            echo "user inserée avec succées";
        }
        catch(PDOException $e){
            echo "erreur:".$e->getMessage();
            die();
        }}
        public function findAll($pdo){
            try{
                $pdostat = $pdo->query("SELECT * FROM user");
                $result=$pdostat->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            catch(PDOException $e){
                echo "erreur:".$e->getMessage();
                die();
            }
    } 
    public function findBy($pdo,$email,$password){
        try{
            $pdostat = $pdo->prepare("select * from user where email=? and password=?");
            $result=$pdostat->execute([$email, $password]);
            $result=$pdostat->fetchAll(PDO::FETCH_ASSOC);
                return $result;
        }  
        catch(PDOException $e){
            echo "erreur:".$e->getMessage();
            die();
        }
    }
}


?>