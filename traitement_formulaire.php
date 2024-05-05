<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "societe_generale";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$code_postal = $_POST['code_postal'];
$email = $_POST['email'];

// Requête d'insertion des données dans la base de données
$sql = "INSERT INTO clients (nom, prenom, adresse, ville, code_postal, email) VALUES ('$nom', '$prenom', '$adresse', '$ville', '$code_postal', '$email')";

if ($connexion->query($sql) === TRUE) {
    echo "Les données du client ont été enregistrées avec succès.";
} else {
    echo "Erreur lors de l'enregistrement des données du client : " . $connexion->error;
}

// Fermeture de la connexion à la base de données
$connexion->close();
?>