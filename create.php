<?php
include 'inc/header.php';
include 'database.php';
include 'config.php';
?>

<?php
$db = new database();
if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
    if ($name == '' || $email == '' || $skill == '') {
        echo "Field musy not be empty!";
    } else {
        $query = "INSERT INTO tbl_user(name,email,skill) VALUES('$name','$email','$skill')";
        $create = $db->insert($query);
    }
}
?>

<?php
if (isset($error)) {
    echo "<span>" . $error . "</span>";
}
?>

<form action="" method="POST">
    <table class="tblone">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" placeholder="Enter your name"></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" placeholder="Enter your E-mail"></td>
        </tr>
        <tr>
            <td>Skill</td>
            <td><input type="text" name="skill" placeholder="Enter your skill"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Submit">
                <input type="reset" value="Cancle">
            </td>
        </tr>
    </table>
</form>
<a href="index.php">Go Back to Home</a>
<?php include 'inc/footer.php'; ?>