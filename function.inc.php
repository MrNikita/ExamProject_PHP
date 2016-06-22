<?php
function validateCreatedDataBase() {
    $link = mysqli_connect("localhost", "root", "") or die("Error, MySQL is not connect");
    $tableExists = mysqli_query($link, "DESCRIBE `myTable`");
    if(!$tableExists){
        $sql = "CREATE DATABASE demo";
        if(mysqli_query($link, $sql)){
            $GLOBALS['komunikat']= "Baza 'demo' została utworzona...";
        } else{
            $GLOBALS['komunikat']=  "ERROR: Nie można wykonać polecenia '$sql'. " . mysqli_error($link);
        }
    }
    mysqli_close($link);
}
function clearDateBase() {
    $link = mysqli_connect("localhost", "root", "", "demo");
    if($link === false){
        die("ERROR: Brak połączenia z mysql. " . mysqli_connect_error());
    }
    $sql = "TRUNCATE TABLE produkty";
    if(mysqli_query($link, $sql)){
        $GLOBALS['komunikat']=  "Baza 'demo' została wyczyszczona...";
    } else{
        $GLOBALS['komunikat']=  "ERROR: Nie można wykonać polecenia '$sql'. " . mysqli_error($link);
    }
    mysqli_close($link);
}

function addtable() {
    // $link = mysqli_connect("localhost", "root", "root", "demo");
    $link = mysqli_connect("localhost", "root", "", "demo");
    if($link === false){
        die("ERROR: Brak połączenia z mysql. " . mysqli_connect_error());
    }
    $sql = "CREATE TABLE produkty(produkt_id INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT, nazwa CHAR(30) NOT NULL, jm CHAR(4) NOT NULL, ilosc FLOAT NOT NULL, cena_netto FLOAT NOT NULL)";
    if (mysqli_query($link, $sql)){
        $GLOBALS['komunikat']=  "Tabela 'produkty' została dodana poprawnie";
    } else {
        $GLOBALS['komunikat']=  "ERROR: Nie można wykonać polecenia $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
}

function addproduct($nazwa,  $jm,  $ilosc,  $cena_netto) {
    // $link = mysqli_connect("localhost", "root", "root", "demo");
    $link = mysqli_connect("localhost", "root", "", "demo");
    if($link === false){
        die("ERROR: Brak połączenia z mysql. " . mysqli_connect_error());
    }
    echo (" '$nazwa',  '$jm',  $ilosc,  $cena_netto ");
    echo "<br> Wyzej sprawdz <br>";
    $sql = "INSERT INTO  `demo`.`produkty` (`produkt_id` ,`nazwa` ,`jm` ,`ilosc` ,`cena_netto`) VALUES (NULL ,  '$nazwa',  '$jm',  $ilosc,  $cena_netto)";
    if (mysqli_query($link, $sql)){
        $GLOBALS['komunikat']=  "Produkt został dodany";
    } else {
        $GLOBALS['komunikat']=  "ERROR: Nie można wykonać polecenia $sql. " . mysqli_error($link);
    }
    mysqli_close($link);

}

function delproduct($id) {
    // $link = mysqli_connect("localhost", "root", "root", "demo");
    $link = mysqli_connect("localhost", "root", "", "demo");
    if($link === false){
        die("ERROR: Brak połączenia z mysql. " . mysqli_connect_error());
    }
    $sql = "DELETE FROM `demo`.`produkty` WHERE `produkty`.`produkt_id` = $id";
    if (mysqli_query($link, $sql)){
        $GLOBALS['komunikat']=  "Produkt został usunięty";
    } else {
        $GLOBALS['komunikat']=  "ERROR: Nie można wykonać polecenia $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
}
function updateproduct() {
    // $link = mysqli_connect("localhost", "root", "root", "demo");
    $link = mysqli_connect("localhost", "root", "", "demo");
    if($link === false){
        die("ERROR: Brak połączenia z mysql. " . mysqli_connect_error());
    }
    $sql = "UPDATE  `demo`.`produkty` SET  `cena_netto` =  12.55 WHERE  `produkty`.`produkt_id` =1;";
    if (mysqli_query($link, $sql)){
        $GLOBALS['komunikat']=  "Produkt został zaktualizowany";
    } else {
        $GLOBALS['komunikat']=  "ERROR: Nie można wykonać polecenia $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
}
function displayproducts() {
    $link=mysqli_connect("localhost","root","","demo") or die("Error, MySQL is not connect");
    $query = mysqli_query($link,"SELECT * FROM produkty LIMIT 10;");  // wykonanie zapytania do bazy
    echo "<table width=\"800px\" border=\"1\"><tr><td>id</td><td>nazwa</td><td>jm</td><td>ilosc</td><td>cena_netto</td><td></td></tr>";
    while ($rekord = mysqli_fetch_assoc($query)) {
        $id = $rekord['produkt_id'];
        $nazwa = $rekord['nazwa'];
        $jm = $rekord['jm'];
        $ilosc = $rekord['ilosc'];
        $cena_netto = $rekord['cena_netto'];
        echo "<tr><td>$id</td><td>$nazwa</td><td>$jm</td><td>$ilosc</td><td>$cena_netto</td><td><a href=\"?action=del&id={$rekord['produkt_id']}\">DEL</a> </td></tr>";
    }
    echo "</table>";
}
?>