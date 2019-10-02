<?php
//=========================== DELETE==================
$deleteComand=filter_input(INPUT_GET,'delcom');
if (isset($deleteComand)&& $deleteComand==1){
    $id=filter_input(INPUT_GET,'id');
    deletePatient($id);
}

//=========================== INSERT ======================
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    $Medical_Record = filter_input(INPUT_POST, 'txtMedical_Record');
    $Citizen_ID = filter_input(INPUT_POST, 'txtCitizen_ID');
    $Name = filter_input(INPUT_POST, 'txtName');
    $Address = filter_input(INPUT_POST, 'txtAddress');
    $Birth_Place = filter_input(INPUT_POST, 'txtBirth_Place');
    $Birth_Date = filter_input(INPUT_POST, 'txtBirth_Date');
    $Name_Class = filter_input(INPUT_POST, 'Name_Class');
    addPatient($Medical_Record,$Citizen_ID,$Name,$Address,$Birth_Place,$Birth_Date,$Name_Class);
}
?>

<form action="" method="POST">

    <table>
        <tr>
            <td>New Medical Record Number:</td>
            <td><input type="text" id="txtNameIdx" name="txtMedical_Record" placeholder="A-000000" autofocus required
                       class="form-input"><br></td>
        </tr>
        <tr>
            <td>New Citizen Id Number :</td>
            <td> <input type="text" id="txtNameIdx" name="txtCitizen_ID" placeholder="Citizen_ID" autofocus required
                        class="form-input"><br></td>

        </tr>
        <tr>
            <td>New Name :</td>
            <td><input type="text" id="txtNameIdx" name="txtName" placeholder="Name" autofocus required
                       class="form-input"><br></td>
        </tr>
        <tr>
            <td>New Address :</td>
            <td><input type="text" id="txtNameIdx" name="txtAddress" placeholder="Address" autofocus required
                       class="form-input"><br></td>
        </tr>
        <tr>
            <td>New Birth Place :</td>
            <td><input type="text" name="txtBirth_Place" autofocus required placeholder="Birth Place"><br></td>
        </tr>
        <tr>
            <td>New Birth Date :</td>
            <td>
                <input type="date" id="txtNameIdx" name="txtBirth_Date" placeholder="Birth_Date" autofocus required
                       class="form-input">
                <br/></td>
        </tr>
        <tr>
            <td>Name_Clash :</td>
            <td>
                <select name="Name_Class" id="">
                    <?php
                    $insurances = getAllInsurance();
                    foreach ($insurances as $insurance) {
                        echo '<option value="'.$insurance['id'].'">' . $insurance['name_class'] . '</option>';
                    }
                    ?>
                </select>
                <br/></td>
        </tr>

        <tr>
            <td></td>
            <td>
            <td><input type="submit" name="btnSubmit"></td>
            </td>
        </tr>

    </table>
</form>



<table id="myTable" class="display">
    <thead>
    <tr>
        <th>Medical Record</th>
        <th>Citizen ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Birth Place</th>
        <th>Birth Date</th>
        <th>Insurance Name</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $patients = getAllPatient();
        foreach ($patients as $patient) {
            $isidelete=$patient['med_record_number'];
            echo '<tr>';
            echo '<td>' . $patient['med_record_number'] . '</td>';
            echo '<td>' . $patient['citizen_id_number'] . '</td>';
            echo '<td>' . $patient['name'] . '</td>';
            echo '<td>' . $patient['address'] . '</td>';
            echo '<td>' . $patient['birth_place'] . '</td>';
            echo '<td>' .
                DateTime::createFromFormat('Y-m-d', $patient['birth_date'])->format('d M Y')
                . '</td>';

            echo '<td>' . $patient['name_class'] . '</td>';
            echo '<td><button onclick="deletePatient(\''.$patient['med_record_number'].'\')">Delete</button><button onclick="updatePatient(\'' . $patient['med_record_number'] .'\')">Edit</button></td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>