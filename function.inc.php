<?php
function validateCreatedDataBase() {
    $link = mysqli_connect("localhost", "root", "") or die("Error, MySQL is not connect");
    $tableExists = mysqli_query($link, "DESCRIBE `myTable`");
    if(!$tableExists){
        $sql = "CREATE DATABASE demo";
        if(mysqli_query($link, $sql)){
            $GLOBALS['message']= "Data base 'demo' has been created...";
        } else{
            $GLOBALS['message']=  "ERROR: Can't connect to date base '$sql'. " . mysqli_error($link);
        }
        addtable();
    }
    mysqli_close($link);
}
function clearDateBase() {
    $link = mysqli_connect("localhost", "root", "", "demo");
    if($link === false){
        die("ERROR: Can't connect to MySQL. " . mysqli_connect_error());
    }
    $sql = "TRUNCATE TABLE students";
    if(mysqli_query($link, $sql)){
        $GLOBALS['message']=  "Data base 'demo' has been cleaned...";
    } else{
        $GLOBALS['message']=  "ERROR: Can't connect to date base '$sql'. " . mysqli_error($link);
    }
    mysqli_close($link);
}

function addtable() {
    // $link = mysqli_connect("localhost", "root", "root", "demo");
    $link = mysqli_connect("localhost", "root", "", "demo");
    if($link === false){
        die("ERROR: Can't connect to date base " . mysqli_connect_error());
    }
    $sql = "CREATE TABLE students(student_id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT, fullName VARCHAR(30) NOT NULL, birthdate DATE, branch VARCHAR(30) NOT NULL )";
    if (!mysqli_query($link, $sql)){
        $GLOBALS['message']=  "ERROR: Can't connect to date base $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
}

function addStudent($fullName, $birthdate, $branch) {
    // $link = mysqli_connect("localhost", "root", "root", "demo");
    $link = mysqli_connect("localhost", "root", "", "demo");
    if($link === false){
        die("ERROR: Can't connect to date base. " . mysqli_connect_error());
    }
    $sql = "INSERT INTO  `demo`.`students` (`student_id` ,`fullName` ,`birthdate` ,`branch`) VALUES (NULL ,  '$fullName', CAST('". $birthdate ."' AS DATE) ,  '$branch')";
    if (mysqli_query($link, $sql)){
        $GLOBALS['message']=  "Student has been added. Name: '$fullName', Birthday: $birthdate, Specialization: $branch";
    } else {
        $GLOBALS['message']=  "ERROR: Can't connect to date base $sql. " . mysqli_error($link);
    }
    mysqli_close($link);

}

function delproduct($id) {
    // $link = mysqli_connect("localhost", "root", "root", "demo");
    $link = mysqli_connect("localhost", "root", "", "demo");
    if($link === false){
        die("ERROR: Can't connect to date base. " . mysqli_connect_error());
    }
    $sql = "DELETE FROM `demo`.`students` WHERE `students`.`student_id` = $id";
    if (mysqli_query($link, $sql)){
        $GLOBALS['message']=  "Student has been deleted";
    } else {
        $GLOBALS['message']=  "ERROR: Can't connect to date base $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
}
function updateStudents() {
        $GLOBALS['message']=  "Table has been refreshed";
}
function displayproducts() {
    $link=mysqli_connect("localhost","root","","demo") or die("Error, MySQL is not connect");
    $query = mysqli_query($link,"SELECT * FROM students LIMIT 10;");  // wykonanie zapytania do bazy
    echo "<table width=\"800px\" border=\"1\" class=\"table\"><tr><th class=\"col-sm-1\">Student's ID</th><th class=\"col-sm-4\">Full Name</th><th>Birthdate</th><th>Specialization </th><th></th></tr>";
    while ($rekord = mysqli_fetch_assoc($query)) {
        $id = $rekord['student_id'];
        $fullName = $rekord['fullName'];
        $birthdate = $rekord['birthdate'];
        $branch = $rekord['branch'];
        echo "<tr><td>$id</td><td>$fullName</td><td>$birthdate</td><td>$branch</td><td><a type=\"button\" class=\"btn btn-default\" href=\"?action=del&id={$rekord['student_id']}\">DELETE</a> </td></tr>";
    }
    echo "</table>";
}
?>