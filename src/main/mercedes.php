<!DOCTYPE html>
<html lang="de" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/output.css">
    
    <script src="https://kit.fontawesome.com/60f4014743.js" crossorigin="anonymous"></script>

    <title>Mercedes</title>
</head>
<body class="body-color">
    <header class="flex header-color p-2 justify-between border-solid border-b-2 header-border-color shadow-colored sticky z-50">
        <a href="./index.html">
            <img src="" alt="Logo" class="w-24" id="logo">
        </a>
        <div class="text-[3em] dark:text-white"><p>Mercedes</p></div>
        <div class="darkmode-icon pr-14">
            <i onclick="darkmodeToggle()" id="darkmode" class="fa-solid fa-2xl"></i>
        </div>
    </header>
    
    <nav class="flex md:justify-between border-discord-light dark:border-discord-dark py-1 my-5 sticky top-0 z-10">
             <div class="md:w-1/3 w-1/2">
                <ul class="nav-ul-left">
                    <li class="nav-li"><a class="nav-a" href="#Kombi">Kombi</a></li>
                    <li class="nav-li"><a class="nav-a" href="#Coupe">Coupé</a></li>
                    <li class="nav-li"><a class="nav-a" href="#Cabrio">Cabrio</a></li>
                 </ul>
            </div>
            <div class="md:w-1/3 w-1/2">
                <ul class="nav-ul-right">
                    <li class="nav-li"><a class="nav-a" href="#Limo">Limo</a></li>
                    <li class="nav-li"><a class="nav-a" href="#SUV">SUV</a></li>
                    <li class="nav-li"><a class="nav-a" href="#Sportwagen">Sportwagen</a></li>
                </ul>
            </div>
    </nav>
    
    <?php
                include './php/conn.php';
                include './php/GetCars.php';

                if ($conn) {
                    if (mysqli_error($conn)) {
                        echo 'Fehler: ' . mysqli_error($conn);
                    } else {
                        printCar("Mercedes", "Kombi");
                        printCar("Mercedes", "Coupe");
                        printCar("Mercedes", "Cabrio");
                        printCar("Mercedes", "Limo");
                        printCar("Mercedes", "SUV");
                        printCar("Mercedes", "Sportwagen");
                    }
                } else {
                    echo "Verbindungsfehler: " . mysqli_connect_error($conn);
                }
            ?>


    <footer class="flex justify-center border-solid border-t-2 rounded-t-xl w-full
     dark:text-white header-color border-x-2  header-border-color">
        <p>footer</p>
    </footer>
</body>
</html>

<script src="./js/darkmode.js"></script>