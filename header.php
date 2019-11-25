<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
    $(".toast").toast();
});
</script>

<title>GESTIONS DES ETUDIANTS</title>
</head>
<body>


<div class="container ">
    <div class="container mt-5">
    <div class="row">
        <div class="col-sm"><a href="index.php"> <button class="btn btn-primary">ACCEUIL</button></a></div>
        <div class="col-sm"></div>
        <div class="col-sm"></div>
        
        <div class="col-sm"></div>
        <div class="col-sm"><button class="btn btn-primary"><h6>SE CONNECTER</h6></button>
        <form action="" method="POST" name="frmAdd" enctype="multipart/form-data">

<input type="text" name="matricule" placeholder="matricule">
<input type="text" name="nom" placeholder="nom">
<input type="password" name="password" placeholder="password"> <br>
<input type="submit" name="submit" class="btn btn-primary">

</form>
<?php 
        if (isset($_POST['submit'])) {


        $matricule = htmlspecialchars($_POST['matricule']);
        $nom= htmlspecialchars($_POST['nom']);
        $password= htmlspecialchars($_POST['password']);

        if ($matricule == "loic" and $password == "1234")
                     {echo header("refresh:1;admin.php");}

                else
                         {echo 'please try again Mrs/Mme ' .$nom ;}
                        

                }
        ?>
        </div>
       
        
    
</div>

