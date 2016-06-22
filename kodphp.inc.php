<?php
session_start();  // uruchomienie sesji
//echo 'ID sesji: ' . session_id() . '<br>';  // wyświetlenie identyfikatora sesji
// Licznik wyświetleń w sesji -------------------------------------------------------------------------------
if (isset($_SESSION['licznikwsesji'])) //sprawdzenie czy ustawiona zmienna sesyjna
    $_SESSION['licznikwsesji']++;   // zwiększenie licznika
else
    $_SESSION['licznikwsesji']=1;  // ustawienie zmiennej sesyjnej jeśli jej nie ma

// Licznik wyświetleń danego użytkownika w ciągu ostatniej minuty -------------------------------------------
if(isset($_COOKIE['wizyta'])) { // spr. czy cookie istnieje
    $licznik=intval($_COOKIE['wizyta']);
    $licznik++;
    setcookie("wizyta","$licznik",time()+60*1); //ustawienie cookie z nową wartością czas życua +60s
} else {
    setcookie("wizyta","1",time()+60*1); //ustawienie cookie po raz pierwszy
}

// Logowanie ------------------------------------------------------------------------------------------------
if (isset($_POST['logowanie'])) {  //Jeśli formularz logowania został wysłany to sprawdź login i hasło
    if (($_POST['login']=='admin') && ($_POST['haslo']=='123')) {
        $_SESSION['zalogowany']=$_POST['login'];  //Jeśli logowanie poprawne ustaw zmienną sesyjną 'zalogowany'
        $komunikat='Witaj ' . $_POST['login'] . '. Zostałes poprawnie zalogowany.';
    } else {
        $komunikat='Błędny login lub hasło.';
        $_GET['podstrona']='logowanie';  // ustaw zmienną 'podstrona' aby ponownie wyświetlić formularz logowania
    }
}

// Wylogowanie  -  usunięcie zmiennej sesyjnej $_SESSION['zalogowany'] --------------------------------------
if (isset($_GET['wyloguj'])) {
    unset($_SESSION['zalogowany']);
    $komunikat='Zostałes poprawnie wylogowany';
}

// Dodawanie produktu ---------------------------------------------------------------------------------------
if (isset($_POST['dodaj_produkt'])) {
    addproduct($_POST['nazwa'],  $_POST['jm'],  $_POST['ilosc'],  $_POST['cena']);
}
//Operacje na bazie danych---------------------------------------------------------
if (isset($_GET['action'])) {
    switch($_GET['action']) {
        case "clearDateBase":
            clearDateBase();
            break;
        case "addtable":
            addtable();
            break;
        case "addproduct":
            addproduct('Kamienie', 'szt', 2, 33);
            addproduct('Kamienie', 'szt', 2, 44);
            break;
        case "delproduct":
            delproduct(1);
            break;
        case "updateproduct":
            updateproduct();
            break;
        case "del":
            delproduct($_GET['id']);
            break;
    }
    $_GET['podstrona'] = "mysql";
}

?>