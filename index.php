<?php
require 'function.inc.php';
require 'kodphp.inc.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php addBootstrap();?>
    <meta charset="UTF-8" >
    <link rel="Stylesheet" href="style.css">
    <title>HTML and PHP exam project</title>
</head>
<body>
<header id="header">
    <?php
       showHeader();
    ?>
</header><br>


    <br>
<?php
    include("menu_buttons.php");
    ?>
<?php
if (isset($message)) { //jeśli $komunikat ustawiony wyświetl sekcję z komunikatem
    echo '<section id="messageInfo">' . $message . '</h2></section>';
}
if (isset($_GET['podstrona'])) {   // sprawdzenie czy podstrona została ustawiona
    switch ($_GET['podstrona']) {
        case 'classes':

            echo '<section id="content" class="scrollable">';
                  include("classes_content.php");
            echo '</section>';

            break;
        case 'students':
            echo '<section id="content" class="scrollable"><h1 class="tableHead">Add yourself to student list</h1>';
            ?>
            <form action="index.php" method="POST">
                <table  cellspacing="50" cellpadding="50" class="tableMain">
                    <tr><td><b>Full Name</b></td><td><input type="text" name="fullName" size="60"  required></td></tr>
                    <tr><td>Birthdate(yyyy-mm-dd) </td><td><input type="text" name="birthdate" size="60"  required ></td></tr>
                    <tr><td>Specialization </td><td><input type="text" name="branch" size="60"  required></td></tr>
                    <tr><td><input type="submit" type="button" class="btn btn-success" name="dodaj_produkt" value="Dodaj produkt"></td></tr>
                </table>
            </form>
            <?php
            echo '</section>';
            break;
        case 'kontakt':
            ?>
            <section id="content" class="scrollable"><h1>Kontakt</h1>
                <p>
                    Pehapus sp. z o.o.</br>
                    ul. Kodowa 14</br>
                    53-333 Wrocław</br>
                    tel. 71 342 xxx 234
                </p>
                <h2>Formularz kontaktowy</h2>
                <form action="index.php" method="POST">
                    Imię i nazwisko: <input type="text" name="login" size="50"></br>
                    Telefon kontaktowy: <input type="text" name="haslo"></br>
                    Wiadomość: <textarea rows="8" cols="80" name="wiadomosc"></textarea></br>
                    <input type="submit" name="form_kontakt" value="Wyślij">
                </form>
            </section>
            <?php
            break;
        case 'logowanie':
            ?>
            <section id="content" class="scrollable"><h1>Login</h1>
                <form action="index.php" method="POST">
                    Login: <input type="text" name="login"></br>
                    Password: <input type="password" name="haslo"></br>
                    <input type="submit" name="logowanie" value="Zaloguj">
                </form>
            </section>
            <?php
            break;
        case 'mysql':
            require_once('function.inc.php');
            validateCreatedDataBase();
            ?>
            <section id="content" class="scrollable">
                <ul id="menu">
                    <li><a type="button" class="btn btn-success" href="?action=updateStudents" title="Tytuł linka">Refresh table</a></li>
                    <li><a type="button" class="btn btn-danger" href="?action=clearDateBase" title="Classes">Clear data</a></li>
                </ul>
            <h1 class="tableHead">Currently added following students to date base: </h1>
                </br>
                <?php
                displayproducts();  ?>
            </section>
            <?php

            break;
        default:
            echo '<section id="content"><h2>Strona o podanym adresie nie istnieje.<br>Przejdź do <a href="index.php">strony głównej</a></h2></section>';
    }
} else {
    echo '<section id="content" class="scrollable">';
    include("main_content.php");
    echo '</section>';
    ?>

    <?php
}
    function showHeader(){
        if(isset($_SESSION['zalogowany'])) {
            echo '<h1><a href="index.php" title="Strona główna">Hello, ' . $_SESSION['zalogowany'] .  '. Nice to see you again</a></h1>';
        }
        else
        {
            echo '<h1><a href="index.php" title="Strona główna">You haven\'t logged yet</a></h1><br>';
        }
    }
    function addBootstrap(){
        echo '
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> ';
    }
?>
    </div>
<footer id="footer">
    <p>Copyright PHP &copy; 2015, Licznik odwiedzin: [xxx] Licznik Twoich wyświetleń [<?php if (isset($_COOKIE['wizyta'])) echo $_COOKIE['wizyta']; else echo '1';?>] Licznik wyświetleń w sesji [<?php echo $_SESSION['licznikwsesji']; ?>]</p>
    <p>Strona główna - głowny plik witryny &nbsp;&nbsp;&nbsp; <a href="index.php" title="Programowanie PHP">index.php</a></p>
</footer>
</body>
</html>