<?php
    echo '<div >
                <ul class="nav nav-tabs">';
    
    if (!isset($_GET['podstrona']))
    {
        echo '<li class="active"><a href="index.php" title="Main site">Main</a></li>';
        echo '<li><a href="?podstrona=classes" title="Classes">Classes</a></li>';
        echo '<li><a  href="?podstrona=students" title="Add student">Add student</a></li>';
        echo '<li><a  href="?podstrona=mysql" title="Show students">Show students</a></li>';
    }
    else
    {
        echo '<li><a href="index.php" title="Main site">Main</a></li>';
        if($_GET['podstrona']=='classes')
        {
            echo '<li class="active"><a  href="?podstrona=classes" title="Classes">Classes</a></li>';
            echo '<li><a  href="?podstrona=students" title="Add student">Add student</a></li>';
            echo '<li><a  href="?podstrona=mysql" title="Show students">Show students</a></li>';
        }else if ($_GET['podstrona']=='students')
        {
            echo '<li><a  href="?podstrona=classes" title="Classes">Classes</a></li>';
            echo '<li class="active"><a  href="?podstrona=students" title="Add student">Add student</a></li>';
            echo '<li><a  href="?podstrona=mysql" title="Show students">Show students</a></li>';
        }else if ($_GET['podstrona']=='kontakt')
        {
            echo '<li><a  href="?podstrona=classes" title="Classes">Classes</a></li>';
            echo '<li><a  href="?podstrona=students" title="Add student">Add student</a></li>';
            echo '<li><a  href="?podstrona=mysql" title="Show students">Show students</a></li>';
        }else if ($_GET['podstrona']=='mysql')
        {
            echo '<li><a  href="?podstrona=classes" title="Classes">Classes</a></li>';
            echo '<li><a  href="?podstrona=students" title="Add student">Add student</a></li>';
            echo '<li class="active"><a  href="?podstrona=mysql" title="Show students">Show students</a></li>';
        }else if ($_GET['podstrona']=='about')
        {
            echo '<li><a  href="?podstrona=classes" title="Classes">Classes</a></li>';
            echo '<li><a  href="?podstrona=students" title="Add student">Add student</a></li>';
            echo '<li><a  href="?podstrona=mysql" title="Show students">Show students</a></li>';
        }
    
    }
    if (isset($_SESSION['zalogowany']))
        echo '<li><a  href="?wyloguj=1" title="Tytuł linka"> Wyloguj</a></li>';
    else
        echo '<li><a href="?podstrona=logowanie" title="Tytuł linka">Login</a></li>';
    echo '</ul>';
?>