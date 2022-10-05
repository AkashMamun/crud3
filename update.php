<?php
include 'inc/header.php';
include 'database.php';
include 'config.php';
?>

<?php
$db = new database();
$id = $_GET['id'];
$query = "SELECT * FROM tbl_user WHERE id=$id";
$getData = $db->select($query)->fetch_assoc();
?>
<?php
$db = new database();

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
    if ($name == '' || $email == '' || $skill == '') {
        echo "Field must not be empty!";
    } else {
        $query = "UPDATE tbl_user SET name='$name',email='$email',skill='$skill' WHERE id=$id ";
        $update = $db->update($query);
    }
}
?>

<?php
if (isset($error)) {
    echo "<span style='color:green'>" . $error . "</span>";
}
?>

<form action="update.php?id='<?php echo $id ?>'" method="POST">
    <table class="tblone">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $getData['name']; ?>"></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" value="<?php echo $getData['email']; ?>"></td>
        </tr>
        <tr>
            <td>Skill</td>
            <td><input type="text" name="skill" value="<?php echo $getData['skill']; ?>"></td>
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