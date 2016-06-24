<?php
function showContextForAddingStudent()
{
    echo '
            <section id="content" class="scrollable"><h1 class="tableHead">Add yourself to student list</h1>
                <form action="index.php" method="POST">
                    <table  cellspacing="50" cellpadding="50" class="tableMain">
                        <tr><td>Full Name</td><td><input type="text" name="fullName" size="60"  required></td></tr>
                        <tr><td>Birthdate(yyyy-mm-dd) </td><td><input type="text" name="birthdate" size="60"  required ></td></tr>
                        <tr><td>Specialization </td><td><input type="text" name="branch" size="60"  required></td></tr>
                        <tr><td><input type="submit" type="button" class="btn btn-success" name="dodaj_produkt" value="Add student"></td></tr>
                    </table>
                </form>
            </section>
            ';
}
?>