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
</header><br><br>
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
            require_once('contextForAddStudents.php');
            showContextForAddingStudent();
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
            echo  '
            <section id="content" class="scrollable">';
            showPanelForReportByAddedStudents();
            displayproducts();
            echo'</section>';
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
?>
    </div>
<footer id="footer">
    <p>Copyright WWSIS &copy; 2016, You have entered to this site [<?php if (isset($_COOKIE['wizyta'])) echo $_COOKIE['wizyta'];  else echo '1';?>] times and you have logged [<?php echo $_SESSION['licznikwsesji']; ?>] times via session</p>
    <p>This site has been created by Dmytro Melnychuk</p>
</footer>
</body>
</html>