<?php
session_start();
include('bd.php');

if(!$_SESSION['admin']){
        header('Location: index.php');
    }

    if ($result = mysqli_query($conn, "SELECT * FROM portfolio")) {
        while ($row = $result -> fetch_row()){
            $textPresentation = $row[1];
        }
    }
    if(isset($_GET['newText'])){
        include('bd.php');
        $text = $conn -> real_escape_string($_GET['newText']);

        $sql = "INSERT INTO portfolio (presentation) VALUES ('$text')";
        if(mysqli_query($conn,$sql)){
            echo "ok";
        }else{
            echo("Error description: " . mysqli_error($conn));
        }
        // header('Location: admin.php');     
    }

    if(isset($_GET['remove'])){
        remove($_GET['remove']);
    }
    function remove($id){
        include('bd.php');

        $sql = "DELETE FROM competences WHERE id=".$id."";
        echo $sql;
        if (mysqli_query($conn,$sql)) {
        echo "Record deleted successfully";
        } 
        header('Location: admin.php');
        
    }
    if(isset($_GET['removeProject'])){
        removeProject($_GET['removeProject']);
    }

    function removeProject($id){
        include('bd.php');
        $sql = "DELETE FROM projets WHERE id=".$id."";
        echo $sql;
        if (mysqli_query($conn,$sql)) {
        echo "Record deleted successfully";
        } 
        header('Location: admin.php');
    }

    if(isset($_POST['competence']) && isset($_FILES['competenceImage'])){
        $langage = $_POST['competence'];
        $img = $_FILES['competenceImage']['name'];
        var_dump($img);
        $sql = "INSERT INTO competences (langage, image) VALUES ('$langage', '$img')";
        echo $sql;
        mysqli_query($conn,$sql);
        $target_dir = "../img/competences/";
        $target_file = $target_dir . basename($_FILES["competenceImage"]["name"]);
        echo $target_file;
        if (move_uploaded_file($_FILES["competenceImage"]["tmp_name"], $target_file)) {
          }

        header('Location: admin.php');
    }

    if(isset($_FILES['img']) && isset($_POST['projet']) && isset($_POST['link'])){
        $img = $_FILES['img']['name'];
        $titre = $_POST['projet'];
        $link = $_POST['link'];
        $sql = "INSERT INTO projets (title, image, link) VALUES ('$titre', '$img', '$link')";
        mysqli_query($conn,$sql);
        
        $target_dir = "../img/projets/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        echo $target_file;
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
          }

        header('Location: admin.php');
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script src="script/index.js"></script>
</head>
<body>
    <div class="app">
        <div class="navbar">
            <a href="../index.php">Accéder au site</a>
            <a href="">Déconnexion</a>
        </div>
        <div class="panel">
            <div class="edit-presentation">
                <h2 >Modifier le texte de presentation</h2>
                <form class="form"  method="get" action="">
                    <textarea name="newText"><?php echo $textPresentation?></textarea> 
                    <input class="btn" type="submit" value='Modifier'>
                </form> 
            </div>
            <div class="edit-competences">
            <h2 >Ajouter une compétence</h2>
                <form  enctype="multipart/form-data" class="form-competences" action="" method="POST">
                    <input type="file" name="competenceImage">
                    <input type="text" placeholder="Competence" name="competence">
                    <input type="submit" class="submit"  value="Ajouter">
                 </form>
                <?php 
                   if ($resultCompetences = mysqli_query($conn, "SELECT * FROM competences")) {
                     while ($rowCompetence = $resultCompetences -> fetch_row()){
                             $id = $rowCompetence[0];
                             $competences = $rowCompetence[1];
                             $image = $rowCompetence[2];

                            echo "<div class='competence'  id=". $id .">
                                    <a href='admin.php?remove=".$id."'>x</a>
                                    <div class='box'>
                                        <img src='../img/competences/".$image."'/>
                                        <p class='box-txt'>".$competences."</p>
                                    </div>
                                </div>";
                            }
                        }                    
                ?>
            </div>
            <div class="edit-projets">
                <h2>Ajouter un projet</h2>
                <form  enctype="multipart/form-data" class="form-projet" action="" method="POST">
                    <input type="file" name="img" >
                    <input type="text" placeholder="Nom project" name="projet">
                    <input type="text" placeholder="Lien" name="link">
                    <input type="submit" class="submit"  value="Ajouter">
                 </form>

                <div class="project-list">
                <?php
                   if ($result = mysqli_query($conn, "SELECT * FROM projets")) {
                      while ($row= $result -> fetch_row()){
                         echo "<div class='project-info'>
                                 <a class='remove' href='admin.php?removeProject=".$row[0]."'>x</a>
                                <div class='project'>
                                <img  height='50px' src='../img/projets/".$row[2]."'>
                                <a href='".$row[3]."' class='project-title'>".$row[1]."</a>
                               </div>
                               </div>";
                                        }
                                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


