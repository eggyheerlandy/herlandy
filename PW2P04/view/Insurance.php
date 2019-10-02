<?php
//delete
$deleteComand = filter_input(INPUT_GET, 'delcom');
if (isset($deleteComand) && $deleteComand == 1) {
    $id = filter_input(INPUT_GET, 'id');
    deleteInsurance($id);
}

//insert
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    $name = filter_input(INPUT_POST, 'txtName');
    addInsurance($name);
}
?>
<form method="post">
    <fieldset>
        <legend>New Insurance</legend>
        <label for="txtNameIdx" class="form-label">Name</label>
        <input type="text" id="txtNameIdx" name="txtName" placeholder="Nama Insurance" autofocus required
               class="form-input">
        <input type="submit" name="btnSubmit" value="Add Insurance" class="button button-primary">
    </fieldset>
</form>

<table id="myTable" class="display">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $insurances = getAllInsurance();
    foreach ($insurances as $insurance) {
        echo '<tr>';
        echo '<td>' . $insurance['id'] . '</td>';
        echo '<td>' . $insurance['name_class'] . '</td>';
        echo '<td><button onclick="deleteInsurance(\'' . $insurance['id'] . '\')">Delete</button><button onclick="updateInsurance(\'' . $insurance['id'] . '\')">Edit</button></td>';
        echo '<tr>';
    }
    ?>
    </tbody>
</table>