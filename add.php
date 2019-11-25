<?php

$page = "home";


include('config.php');

include('header.php');



 
 error_reporting( ~E_NOTICE );

    
    if (isset($_POST['submit'])) {

        
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $note1 = htmlspecialchars($_POST['note1']);
        $note2 = htmlspecialchars($_POST['note2']);
        $note3 = htmlspecialchars($_POST['note3']);

        
         if (empty($prenom) OR empty($nom) OR empty($note1) OR empty($note2) OR empty($note3) OR empty($_FILES['image']['name'])) {
             
             echo '
                    <div class="bs-example text-center">    
                        <div class="toast fade show">
                            <div class="toast-header red" >
                                <strong class="mr-auto"><i class="fa fa-exclamation-triangle"></i> Information</strong>
                                <button type="button" class="ml-2 mb-1 close red" data-dismiss="toast">&times;</button>
                            </div>
                            <div class="toast-body red">Veuillez; s\'il vous plaît remplir tous les champs du formulaire</div>
                        </div>
                    </div>  ';
         } else {
            $imgFile = $_FILES['image']['name'];       
            $tmp_dir = $_FILES['image']['tmp_name'];    
            $imgSize = $_FILES['image']['size'];        
            
          
            if(empty($imgFile)){
                
                $errMSG = "S'il vous plaît sélectionner une image.";
            } else {
               
                if (!file_exists('uploads/')) {
                    mkdir('uploads/');
                }
               
			    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
			    $valid_extensions = ['jpeg', 'jpg', 'png', 'gif', 'pdf'];
			    $image = rand(1000,1000000).".".$imgExt; 
                
                
			    if(in_array($imgExt, $valid_extensions)){			
                
                    
				    if($imgSize < 5000000) {
                        
                        move_uploaded_file($tmp_dir,$upload_dir.$image);

                        
                        $sql = "INSERT INTO `users` ( `name`, `last_name`, `picture` , `note1` , `note2` , `note3`) VALUES (:name, :last_name, :picture, :note1, :note2, :note3);";
                        $req = $bdd->prepare($sql);
                         
                        $result = $req->execute([
                                ':name'      => $nom,
                                ':last_name' => $prenom,
                                ':picture'   => $image,
                                ':note1'      => $note1,
                                ':note2'      => $note2,
                                ':note3'      => $note3
                        ]);

                        
                        if(!empty($result)){
                            
                            echo '
                                    <div class="bs-example text-center">    
                                        <div class="toast fade show">
                                            <div class="toast-header green" >
                                                <strong class="mr-auto green"><i class="fa fa-check-circle green"></i> Succes</strong>
                                                <button type="button" class="ml-2 mb-1 close green" data-dismiss="toast">&times;</button>
                                            </div>
                                            <div class="toast-body green">
                                                Bravo l\'enregistrement a bien été fait et vous serez rédirigez d\'ici 2 secondes
                                            </div>
                                        </div>
                                    </div> ';
                            header("refresh:5;index.php");
                        }

                    } else {
					    $errMSG = "Désolé l'image est un peu trop grande.";
				      }
                } else { 
				    $errMSG = "Désolé seule les format 'jpeg', 'jpg', 'png', 'gif' sont autorisés";		
			      }
             }
         }
    }

?>

<div class="container mt-5">
    <?php
        
		if(isset($errMSG)){
           
            echo '
                    <div class="container text-center">
                        <div class="row">
                            <div class="row col-sm">
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-info-sign"></span> 
                                        <strong>
                                            <?= $errMSG;?>
                                        </strong>
                                </div>
                            </div>
                        </div>
                    </div>';
                    } 
	?>

    <div class="jumbotron">
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm">
                    <h1 class="display-4">Home</h1>
                </div>
                <div class="col-sm"></div>
                <div class="col-sm"></div>
                <div class="col-sm"></div>
                <div class="col-sm"></div>
                <div class="col-sm">
                    <a name="" id="" class="btn btn-primary" href="index.php" role="button">
                        <i class="fa fa-arrow-left fa-3x" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <hr class="my-4">

        <p class="lead">
            <div class="login-form">

                <form action="" method="POST" name="frmAdd" class="ml-5 text-center" enctype="multipart/form-data">

                    <h2 class="text-center">Ajouter des informations</h2>

                    <hr class="w-25 bg-dark">

                    <div class="form-group ">
                        <input type="text" name="nom" class="form-control w-25" placeholder="Nom">
                    </div>

                    <div class="form-group">
                        <input type="text" name="prenom" class="form-control w-25" placeholder="Prenom">
                    </div>

                    <div class="form-group">
                        <input type="file" name="image" class="form-control w-50" id="file" > 
                    </div>
                    <div class="form-group ">
                        <input type="text" name="note1" class="form-control w-25" placeholder="Note Web desin">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="note2" class="form-control w-25" placeholder="Note PHP">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="note3" class="form-control w-25" placeholder="Note Algo">
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary">

                </form>
                
            </div>
        </p>
    </div>
</div>


</body>
</html>