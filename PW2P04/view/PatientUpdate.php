<?php
//Block below for delete
$id=filter_input(INPUT_GET,'id');
if (isset($id)){
    $patient=getPatient($id);

}
//Block below for insert
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    header("Location: index.php?menu=pt");
    $Medical_Record = filter_input(INPUT_POST, 'txtMedical_Record');
    $Citizen_ID = filter_input(INPUT_POST, 'txtCitizen_ID');
    $Name = filter_input(INPUT_POST, 'txtName');
    $Address = filter_input(INPUT_POST, 'txtAddress');
    $Birth_Place = filter_input(INPUT_POST, 'txtBirth_Place');
    $Birth_Date = filter_input(INPUT_POST, 'txtBirth_Date');
    $Name_Class = filter_input(INPUT_POST, 'Name_Class');
    updatePatient($id,$Medical_Record,$Citizen_ID,$Name,$Address,$Birth_Place,$Birth_Date,$Name_Class);
}
?>
<form method="post">
    <table>
        <tr>
            <td>New Medical Record Number:</td>
            <td><input type="text" id="txtNameIdx" name="txtMedical_Record" placeholder="Medical_Record" autofocus required
                       class="form-input" view="only" value="<?php echo $patient['med_record_number']; ?>"></td>
        </tr>
        <tr>
            <td>New Citizen Id Number :</td>
            <td>  <input type="text" id="txtNameIdx" name="txtCitizen_ID" placeholder="Citizen_ID" autofocus required
                         class="form-input" value="<?php echo $patient['citizen_id_number']; ?>">

        </tr>

            <td>New Name :</td>
        <td><input type="text" id="txtNameIdx" name="txtName" placeholder="Name" autofocus required
                   class="form-input" value="<?php echo $patient['name']; ?>"></td>
        </tr>
        <tr>
            <td>New Address :</td>
            <td><input type="text" id="txtNameIdx" name="txtAddress" placeholder="Address" autofocus required
                       class="form-input" value="<?php echo $patient['address']; ?>"></td>
        </tr>
        <tr>
            <td>New Birth Place :</td>
            <td><input type="text" id="txtNameIdx" name="txtBirth_Place" placeholder="Birth_Place" autofocus required
                       class="form-input" value="<?php echo $patient['birth_place']; ?>"><br></td>
        </tr>
        <tr>
            <td>New Birth Date :</td>
            <td>
                <input type="date" id="txtNameIdx" name="txtBirth_Date" placeholder="Birth_Date" autofocus required
                       class="form-input" value="<?php echo $patient['birth_date']; ?>">
                <br/></td>
        </tr>
        <tr>
            <td>Name_Clash :</td>
            <td>
                <select name="Name_Class" id="" >
                    <?php
                    $insurances = getAllInsurance();
                    foreach ($insurances as $insurance) {
                        $kondisi=$insurance['id']==$patient['insurance_id']?'selected':'';
                        echo '<option value="'.$insurance['id'].'" '.$kondisi.'>' . $insurance['name_class'] . '</option>';
                    }
                    ?>
                </select>
                <br/></td>
        </tr>



    </fieldset>
    </table>
</form>

<form action="" method="POST">



        <tr>
            <td></td>
            <td>
            <td><input type="submit" name="btnSubmit"></td>
            </td>
        </tr>

    </table>
</form>