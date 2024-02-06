<?php
require('php/database.php');

// Traitement pour ajouter une catégorie
if (isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];

    // Vérifier si la catégorie n'existe pas déjà
    $checkCategory = $db->prepare("SELECT * FROM categorie WHERE category_name = ?");
    $checkCategory->execute([$category_name]);

    if ($checkCategory->rowCount() == 0) {
        // Ajouter la catégorie à la base de données
        $addCategory = $db->prepare("INSERT INTO categorie (category_name) VALUES (?)");
        $addCategory->execute([$category_name]);
        $msg = "Catégorie ajoutée avec succès!";
    } else {
        $msg = "Cette catégorie existe déjà.";
    }
}

// Traitement pour supprimer une catégorie
if (isset($_POST['delete_category'])) {
    $category_id = $_POST['category_id'];

    // Supprimer la catégorie de la base de données
    $deleteCategory = $db->prepare("DELETE FROM categorie WHERE id = ?");
    $deleteCategory->execute([$category_id]);
    $msg = "Catégorie supprimée avec succès!";
}

// Récupérer toutes les catégories depuis la base de données
$getCategories = $db->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
?>

