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
    <title>Przykładowa strona www wykonana w HTML 5</title>
    <meta name="Description" content="Przykładowy szablon strony html" >
    <meta name="keywords" content="Tutaj słowa kluczowe oddzielone przecinkiem">
    <meta name="author" content="PHP">
</head>
<body>
<header id="header">
    <?php
        if(isset($_SESSION['zalogowany'])) {
            echo '<h1><a href="index.php" title="Strona główna">Hello, ' . $_SESSION['zalogowany'] .  '. Nice to see you again</a></h1>';
        }
        else
        {
            echo '<h1><a href="index.php" title="Strona główna">You haven\'t logged yet</a></h1>';
        }
    $checkMenu=1;
    ?>


   <nav>
        <ul id="menu" class="nav nav-tabs">
            <?php
            if($checkMenu==1){
                echo '<li><a class="active" href="index.php" title="Strona główna">Main</a></li>';
            }else{
                echo '<li><a href="index.php" title="Strona główna">Main</a></li>';
            }
            if($checkMenu==2) {
                echo '<li><a class="active" href="?podstrona=classes" title="Classes">Classes</a></li>';
            }else{
                echo '<li><a href="?podstrona=classes" title="Classes">Classes</a></li>';
            }
            echo '<li><a class="menu-7" href="?podstrona=produkty" title="Dodaj produkt">Dodaj produkt</a></li>';
            echo '<li><a class="menu-8" href="?podstrona=mysql" title="Zarządzanie bazą">MySql</a></li>';
            echo '<li><a class="menu-5" href="?podstrona=kontakt" title="Tytuł linka">Kontakt</a></li>';
            echo '<li><a class="menu-3" href="?podstrona=" title="Tytuł linka">About WWSIS</a></li>';
            if (isset($_SESSION['zalogowany']))
                echo '<li><a class="menu-6" href="?wyloguj=1" title="Tytuł linka"> Wyloguj</a></li>';
            else
                echo '<li><a class="menu-6" href="?podstrona=logowanie" title="Tytuł linka">Logowanie</a></li>';
            ?>

        </ul>
    </nav>
</header><br>
<?php
if (isset($komunikat)) { //jeśli $komunikat ustawiony wyświetl sekcję z komunikatem
    echo '<section id="komunikat">' . $komunikat . '</h2></section>';
}
if (isset($_GET['podstrona'])) {   // sprawdzenie czy podstrona została ustawiona
    switch ($_GET['podstrona']) {
        case 'classes':
            $checkMenu=2;
            echo '<section id="content" class="scrollable">';
                  include("classes_content.php");
            echo '</section>';

            break;
        case 'produkty':
            echo '<section id="content"><h1>Dodawanie produktu</h1>';
            ?>
            <form action="index.php" method="POST">
                <table>
                    <tr><td>Nazwa</td><td>j.m.</td><td>Ilość</td><td>cena netto</td></tr>
                    <tr><td><input type="text" name="nazwa" required></td>
                        <td><select name="jm" required> //tutaj zmieniłem nazwe
                                <option selected>szt</option>
                                <option>kg</option>
                            </select></td>
                        <td><input type="text" name="ilosc" required></td>
                        <td><input type="text" name="cena" required></td></tr>
                </table>
                <input type="submit" name="dodaj_produkt" value="Dodaj produkt">
            </form>
            <?php
            echo '</section>';
            break;
        case 'kontakt':
            ?>
            <section id="content"><h1>Kontakt</h1>
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
            <section id="content"><h1>Logowanie</h1>
                <form action="index.php" method="POST">
                    Login: <input type="text" name="login"></br>
                    Hasło: <input type="password" name="haslo"></br>
                    <input type="submit" name="logowanie" value="Zaloguj">
                </form>
            </section>
            <?php
            break;
        case 'mysql':
            ?>
            <section id="content"><h1>Operacje na bazie danych</h1>
                <ul id="menu">
                    <li><a class="dbbutton" href="?action=createdb" title="Strona główna">Utwórz bazę danych</a></li>
                    <li><a class="dbbutton" href="?action=dropdb" title="Classes">Usuń bazę daych</a></li>
                    <li><a class="dbbutton" href="?action=addtable" title="Tytuł linka">Dodaj tabelę produkty</a></li>
                    <li><a class="dbbutton" href="?action=addproduct" title="Tytuł linka">Dodaj produkt</a></li>
                    <li><a class="dbbutton" href="?action=delproduct" title="Tytuł linka">Usuń produkt id=1</a></li>
                    <li><a class="dbbutton" href="?action=updateproduct" title="Tytuł linka">Aktualizuj produkt</a></li>
                </ul></br></br>
                <?php
                displayproducts();  ?>
            </section>
            <?php

            break;
        default:
            echo '<section id="content"><h2>Strona o podanym adresie nie istnieje.<br>Przejdź do <a href="index.php">strony głównej</a></h2></section>';
    }
} else {
    // jeśli podstrona nie została ustawiona wyświetl stronę główną
    $checkMenu=1;
    echo '<section id="content" class="scrollable">';
    include("main_content.php");
    echo '</section>';
    ?>

    <?php
}

    function addBootstrap(){
        echo '
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> ';
    }
?>

<footer id="footer">
    <p>Copyright PHP &copy; 2015, Licznik odwiedzin: [xxx] Licznik Twoich wyświetleń [<?php if (isset($_COOKIE['wizyta'])) echo $_COOKIE['wizyta']; else echo '1';?>] Licznik wyświetleń w sesji [<?php echo $_SESSION['licznikwsesji']; ?>]</p>
    <p>Strona główna - głowny plik witryny &nbsp;&nbsp;&nbsp; <a href="index.php" title="Programowanie PHP">index.php</a></p>
</footer>
</body>
</html>