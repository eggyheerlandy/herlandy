<?php
//Block below for delete
$id=filter_input(INPUT_GET,'id');
if (isset($id)){
    $insurance=getInsurance($id);

}
//Block below for insert
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    header("Location: index.php?menu=in");
    $name = filter_input(INPUT_POST, 'txtName');
    updateInsurance($id,$name);
}
?>
<form method="post">
    <fieldset>
        <legend>Update Insurance</legend>
        <label for="txtNameIdx" class="form-label">Name</label>
        <input type="text" id="txtNameIdx" name="txtName" autofocus required
               class="form-input" value="<?php echo $insurance['name_class']; ?>">

        <input  type="submit" name="btnSubmit" value="Update Insurance" class="button button-primary">

    </fieldset>
</form>