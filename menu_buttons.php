<?php
    echo '<div class="container">
                <ul class="nav nav-tabs">';
    
    if (!isset($_GET['podstrona']))
    {
        echo '<li class="active"><a href="index.php" title="Strona główna">Main</a></li>';
        echo '<li><a href="?podstrona=classes" title="Classes">Classes</a></li>';
        echo '<li><a  href="?podstrona=produkty" title="Dodaj produkt">Dodaj produkt</a></li>';
        echo '<li><a  href="?podstrona=mysql" title="Zarządzanie bazą">MySql</a></li>';
        echo '<li><a  href="?podstrona=kontakt" title="Tytuł linka">Kontakt</a></li>';
    }
    else
    {
        echo '<li><a href="index.php" title="Strona główna">Main</a></li>';
        if($_GET['podstrona']=='classes')
        {
            echo '<li class="active"><a  href="?podstrona=classes" title="Classes">Classes</a></li>';
            echo '<li><a  href="?podstrona=produkty" title="Dodaj produkt">Dodaj produkt</a></li>';
            echo '<li><a  href="?podstrona=mysql" title="Zarządzanie bazą">MySql</a></li>';
            echo '<li><a  href="?podstrona=kontakt" title="Tytuł linka">Kontakt</a></li>';
        }else if ($_GET['podstrona']=='produkty')
        {
            echo '<li><a  href="?podstrona=classes" title="Classes">Classes</a></li>';
            echo '<li class="active"><a class="menu-7" href="?podstrona=produkty" title="Dodaj produkt">Dodaj produkt</a></li>';
            echo '<li><a  href="?podstrona=mysql" title="Zarządzanie bazą">MySql</a></li>';
            echo '<li><a  href="?podstrona=kontakt" title="Tytuł linka">Kontakt</a></li>';
        }else if ($_GET['podstrona']=='kontakt')
        {
            echo '<li><a  href="?podstrona=classes" title="Classes">Classes</a></li>';
            echo '<li><a  href="?podstrona=produkty" title="Dodaj produkt">Dodaj produkt</a></li>';
            echo '<li><a  href="?podstrona=mysql" title="Zarządzanie bazą">MySql</a></li>';
            echo '<li class="active"><a class="menu-5" href="?podstrona=kontakt" title="Tytuł linka">Kontakt</a></li>';
        }else if ($_GET['podstrona']=='mysql')
        {
            echo '<li><a  href="?podstrona=classes" title="Classes">Classes</a></li>';
            echo '<li><a  href="?podstrona=produkty" title="Dodaj produkt">Dodaj produkt</a></li>';
            echo '<li class="active"><a class="menu-8" href="?podstrona=mysql" title="Zarządzanie bazą">MySql</a></li>';
            echo '<li><a  href="?podstrona=kontakt" title="Tytuł linka">Kontakt</a></li>';
        }else if ($_GET['podstrona']=='about')
        {
            echo '<li><a  href="?podstrona=classes" title="Classes">Classes</a></li>';
            echo '<li><a  href="?podstrona=produkty" title="Dodaj produkt">Dodaj produkt</a></li>';
            echo '<li><a  href="?podstrona=mysql" title="Zarządzanie bazą">MySql</a></li>';
            echo '<li><a  href="?podstrona=kontakt" title="Tytuł linka">Kontakt</a></li>';
            echo '<li class="active"><a class="menu-3" href="?podstrona=about" title="Tytuł linka">About WWSIS</a></li>';
        }
    
    }
    if (isset($_SESSION['zalogowany']))
        echo '<li><a  href="?wyloguj=1" title="Tytuł linka"> Wyloguj</a></li>';
    else
        echo '<li><a href="?podstrona=logowanie" title="Tytuł linka">Logowanie</a></li>';
    echo '</ul>';
?>