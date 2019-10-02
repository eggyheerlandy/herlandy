
<?php
//Block below for delete
$id=filter_input(INPUT_GET,'id');
if (isset($id)){
    $insurance=getAllUser($id);

}
//Block below for insert
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    header("Location: index.php?menu=in");
    $name = filter_input(INPUT_POST, 'txtName');
    $psw = filter_input(INPUT_POST, 'txtPassword');
    updateInsurance($id,$name);
}
?>
<form method="post">
    <fieldset>
        <legend>Update user</legend>
        <label for="txtNameIdx" class="form-label">Name</label>
        <input type="text" id="txtNameIdx" name="txtName" autofocus required
               class="form-input" value="<?php echo $user['']; ?>">
        <legend>Komfirmasi Password</legend>
        <input type="text" id="txtPasswordIdx" name="txtPassword" autofocus required
               class="form-input" value="<?php echo $user['password']; ?>">

        <input  type="submit" name="btnSubmit" value="Update Insurance" class="button button-primary">

    </fieldset>
</form>