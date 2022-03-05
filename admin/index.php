<?php 
session_start();
include('bd.php');
    if(isset($_POST['password'])){
        if ($result = mysqli_query($conn, "SELECT * FROM adminpanel")) {
            while ($row = $result -> fetch_row()){
                if($_POST['password'] == $row[1]){
                    $_SESSION['admin'] = true;
                    header('Location: admin.php');
                }
        }
    }
        
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css"/>
</head>
<body>
    <div class="app">
        <img src="../img/icon.png"/>
            <form class="form-log" action="" method="post">
                <h2>Bonjour Yanisse</h2>
                <input type="password" name="password" placeholder="Mot de passe" >
                <input type="submit" class="btn" value="Connexion" placeholder="proute">
            </form>
    </div>
</body>
</html>