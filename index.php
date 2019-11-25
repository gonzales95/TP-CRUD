<?php
$page = "home";
require_once('config.php');
include('header.php');


$req = $bdd->prepare("SELECT * FROM users");
$req->execute();
$users = $req->fetchAll(); 



?>

 
    <div class="container mt-5">

    <?php
		if(isset($errMSG)){
	?>
        <div class="container text-center">
            <div class="row">
            
            <div class="row col-sm">
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                </div>
            </div>
            </div>
        </div>

		
	<?php
		}
	?>


 


    <div class="jumbotron mt-5">
        <h1 class="display-3">LISTES DES ETUDIANTS</h1>
        <hr class="my-2">
        <p class="lead">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Picture</th>
                <th scope="col">Web Design</th>
                <th scope="col">PHP</th>
                <th scope="col">Algorithme</th>
                <th scope="col">Moy generale</th>
                <th scope="col">Decision</th>
                
                </tr>
            </thead>
            <?php
                if (!empty($users)) {
                   foreach ($users as $user) {
            ?>
            <tbody>
                <tr>
                <th scope="row"><?= $user["id"]; ?></th>
                <td><?= $user["name"]; ?></td>
                <td><?= $user["last_name"]; ?></td>
                <td> <img src="assets/uploads/<?= $user["picture"]; ?>" alt="" width="100"> </td>
                <td><?= $user["note1"]; ?></td>
                <td><?= $user["note2"]; ?></td>
                <td><?= $user["note3"]; ?></td>
                <td><?= $moy= ($user["note3"]+$user["note1"]+$user["note2"])/3?> </td>
                <td><?php if ($moy>=10){echo '<font color="green"> <strong> ADMIS </strong> </font>';}

                else {echo '<font color="red"> <strong> REFUSÉ </strong> </font>';}?></td>

                
            </tbody>
            <?php 

                   }
                }
            ?>

        
            </table>

        </p>
    </div>
</div>

<?php
include('footer.php');
