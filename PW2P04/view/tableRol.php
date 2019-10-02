<?php
//=========================== DELETE==================
$deleteComand=filter_input(INPUT_GET,'delcom');
if (isset($deleteComand)&& $deleteComand==1){
$id=filter_input(INPUT_GET,'id');
deletePatient($id);
}
?>


<table id="myTable" class="display">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Nama Role</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $roles = getAllUser();
    foreach ($roles as $role) {
        echo '<tr>';
        echo '<td>' . $role['id'] . '</td>';
        echo '<td>' . $role['username'] . '</td>';
        echo '<td>' . $role['role'] . '</td>';
        echo '<td><button onclick="deleteUser(\'' . $role['id'] . '\')">Delete</button>
                <button onclick="updateUser(\'' . $role['id'] . '\')">Update</button></td>';
        echo '<tr>';
    }
    ?>
    </tbody>
</table>