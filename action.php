<html>
<title>Action</title>

<form action="action.php" method="post">
<input type="checkbox" name="check_list[]" value="value 1">one<br>
<input type="checkbox" name="check_list[]" value="value 2"> two<br>
<input type="checkbox" name="check_list[]" value="value 3"> three<br>
<input type="checkbox" name="check_list[]" value="value 4"> four<br>
<input type="checkbox" name="check_list[]" value="value 5"> five<br>
<input type="submit" />
</form>
<?php
if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
            echo $check; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
}
?>

</html>
