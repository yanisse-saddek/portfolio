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
</head>
<body>
    <form action="" method="post">
        <input type="text" name="password" >
        <input type="submit" placeholder="proute">
    </form>
</body>
</html>