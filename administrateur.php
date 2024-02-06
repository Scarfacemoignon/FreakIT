<?php
//require('php/users/securityAction.php');
require('php/questions/categorieAction.php');
require('php/users/contactAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'include/head.php'; ?>

<body>
    <?php include 'include/navbar.php'; ?>
    <div class="container-administrateur">
        <br/><br/><br/>
        <?php
        require('php/database.php');

        $recoverUser = $db->query("SELECT * FROM users");
        while ($user = $recoverUser->fetch()) {
        ?>
            <!-- Bloc d'utilisateur -->
            <div class="user-block">
                <div class="user-name">Utilisateur #<?= $user['id'] ?> </div>
                <p><?= $user['pseudo']; ?> <a href="php/users/deleteUserAction.php?id=<?= $user['id'] ?>" style="color:red; text-decoration:none;">Delete User</a></p>
                <a href="profile.php?id=<?= $user['id'] ?>" class="user-link">Voir le profil</a>
            </div>
        <?php
        }
        ?>
        <br/><br/>
        <?php 
        if(isset($msg)){
            echo "<p style='color:green;text-align:left;font-weight:bold;'>".$msg."</p>";
        }
        ?>
        <h2>Ajouter une Catégorie</h2>
        <form method="post">
            <div class="category-block">
                <label class="label_admin" for="category_name">Nom de la Catégorie :</label>
                <input class="input_det_admin" type="text" name="category_name" required>
                <button class="button_det_admin" type="submit" name="add_category">Ajouter</button>
            </div>
        </form>

        <h2>Liste des Catégories</h2>
        <form method="post">
            <div class="category-block">
                <select name="category_id">
                    <?php foreach ($getCategories as $category): ?>
                        <option value="<?= $category['id']; ?>"><?= $category['category_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="button_det_admin" type="submit" name="delete_category">Supprimer</button>
            </div>
            <br/>
            <h2>Liste des Contacts</h2>
            <div class="category-block">
                <table border="1">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Statut</th>
                        <th>Subject</th>
                    </tr>
                    <?php foreach ($getAllContacts as $contact): ?>
                        <tr>
                            <td><?php echo $contact['firstname']; ?></td>
                            <td><?php echo $contact['lastname']; ?></td>
                            <td><?php echo $contact['email']; ?></td>
                            <td><?php echo $contact['number']; ?></td>
                            <td><?php echo $contact['statut']; ?></td>
                            <td><?php echo $contact['subject']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                    
            </div>
        </form>
    </div>
</body>
</html>
