<?php
include('admin/bd.php');

if ($result = mysqli_query($conn, "SELECT * FROM portfolio")) {
    while ($row = $result -> fetch_row()){
        $textPresentation = $row[1];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Yanisse Saddek</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
</head>

<body >
    <div class="main-background" id="accueil">
        <div id="particles-js">
            <div class="navbar">
                <img src="img/icon.png" alt="" srcset="">
                <div class="right-links">
                    <a href="#accueil">Accueil</a>
                    <a href="#profil">Profil</a>
                    <a href="#competences">Compétences</a>
                    <a href="#portfolio">Portfolio</a>
                    <a href="#contact">Contact</a>
                </div>
                <div class="hamburger" style="display:none">
                    <svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"/></svg>
                    <div class="hamburger-menu">
                        <a href="#accueil">Accueil</a>
                        <a href="#profil">Profil</a>
                        <a href="#competences">Compétences</a>
                        <a href="#portfolio">Portfolio</a>
                        <a href="#contact">Contact</a>    
                    </div>
                </div>
            </div>

            <div class="name-section">
                <p class="name">Yanisse Saddek</p>
                <hr class="line">
                <p class="sub-name">Développeur Web Junior</p>
            </div>
        </div>
    </div>
    </div>

    <div class="section" id="profil">
        <div class="section-inside">
            <div class="section-title">
                <p class="title">À propos de moi    </p>
                <hr class="line">
            </div>
            <div class="section-part show-element">
                <div class="section-left">
                    <img src="img/icon.png" alt="">
                </div>
                <div class="section-right">
                    <p><?php echo $textPresentation?></p>
                </div>
            </div>

        </div>
    </div>
    <div class="section" id="competences">
        <div class="section-inside">
            <div class="section-title">
                <p class="title">Compétences</p>
                <hr class="line">
            </div>
            <div class="show-box">
                <div class="box-grid ">
                    <?php 
                    if ($resultCompetences = mysqli_query($conn, "SELECT * FROM competences")) {
                        while ($rowCompetence = $resultCompetences -> fetch_row()){
                            $id = $rowCompetence[0];
                            $competences = $rowCompetence[1];
                            $image = $rowCompetence[2];

                            echo "<div class='box'>
                                    <img src='./img/competences/".$image."'/>
                                    <p class='box-txt'>".$competences."</p>
                                </div>";
                        }
                    }                    
                    ?>
                </div>
            </div>

        </div>
    </div>
    <div class="section" id="portfolio">
        <div class="section-inside">
            <div class="section-title">
                <p class="title">Portfolio</p>
                <hr class="line">
                <p class="subtitle">Quelques-uns de mes projets :</p>
            </div>
            <div class="project-list">
                <?php 
                    if ($result = mysqli_query($conn, "SELECT * FROM projets")) {
                        while ($row= $result -> fetch_row()){
                            echo "<div class='project'>
                                    <a target='_blank' href='".$row[3]."'>
                                        <img src='img/projets/".$row[2]."'>
                                        <p class='project-title'>".$row[1]."</p>
                                    </a>
                                    <p class='project-subtitle'>".$row[4]."</p>
                                </div>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="section relative" id="contact">
        <div class="section-inside">
            <div class="section-title">
                <p class="title">Me contacter</p>
                <hr class="line">
                <p class="subtitle">Contactez moi sur les réseaux suivant:</p>
            </div>
            <div class="icon-list">
                <div>
                <a target='_blank' href="https://linkedin.com/in/yanisse-saddek"><svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                    </svg></a>
                </div>
                <div>
                    <a target='blank' href="https://github.com/yanisse-saddek"><svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 496 512">
                    <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                    d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z" />
                </svg></a>
            </div>
            <div>
                <a href="mailto:yanisse.sdk@gmail.com"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                    d="M256 352c-16.53 0-33.06-5.422-47.16-16.41L0 173.2V400C0 426.5 21.49 448 48 448h416c26.51 0 48-21.49 48-48V173.2l-208.8 162.5C289.1 346.6 272.5 352 256 352zM16.29 145.3l212.2 165.1c16.19 12.6 38.87 12.6 55.06 0l212.2-165.1C505.1 137.3 512 125 512 112C512 85.49 490.5 64 464 64h-416C21.49 64 0 85.49 0 112C0 125 6.01 137.3 16.29 145.3z" />
                </svg></a>
                <p onClick="copy('mail')" id="mail" class="mail">yanisse.sdk@gmail.com</p>
            </div>
        </div>
        </div>
        <div class="footer-svg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#273036" fill-opacity="1"
                    d="M0,288L40,261.3C80,235,160,181,240,154.7C320,128,400,128,480,128C560,128,640,128,720,154.7C800,181,880,235,960,256C1040,277,1120,267,1200,224C1280,181,1360,107,1400,69.3L1440,32L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
                </path>
            </svg>
    </div>
    </div>


</body>
<script src="js/particles.js"></script>
<script src="js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/script.js"></script>

</html>