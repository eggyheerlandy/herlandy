<?php
session_start();
include_once 'db_function/db_helper.php';
include_once 'db_function/patien_func.php';
include_once 'db_function/insurance_func.php';
include_once 'db_function/user_func.php';


if (!isset($_SESSION['user_logged'])) {
    $_SESSION['user_logged'] = false;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta name="description" content="PHP Navigation and PHP Data Object (PDO)">
    <meta charset="UTF-8">
    <title>Pemrograman Web Lanjut</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>
    <script src="js/insurance.js"></script>
    <script src="js/patient.js"></script>
</head>
<body>
<div class="page">
    <?php
    if ($_SESSION['user_logged']) {
        ?>

    <header>
        <h1>Rumah Sakit</h1>
    </header>
    <nav>
        <ul>
            <li><a href="?menu=hm">Home</a></li>
            <li><a href="?menu=at">About</a></li>
            <li><a href="?menu=in">Insurance</a></li>
            <li><a href="?menu=pt">Patient</a></li>
            <?php if($_SESSION['user']['role_id'] == 1 && 3):?>
            <li><a href="?menu=tr">User</a></li>
            <?php endif ?>
            <li><a href="?menu=out">Logout</a></li>
        </ul>
    </nav>
    <main>
        <?php
        $targetMenu = filter_input(INPUT_GET, 'menu');
        switch ($targetMenu) {
            case 'hm';
                include_once 'view/Home.php';
                break;
            case 'at';
                include_once 'view/About.php';
                break;
            case 'in';
                include_once 'view/Insurance.php';
                break;
            case 'pt';
                include_once 'view/Patient.php';
                break;
            case 'iu';
                include_once 'view/InsuranceUpdate.php';
                break;
            case 'pu';
                include_once 'view/PatientUpdate.php';
                break;
            case 'tr';
                include_once 'view/tableRol.php';
                break;
            case 'out';
                session_destroy();
                header("location:index.php");
                break;
            default;
                include_once 'view/Home.php';
        }
        ?>
    </main>
    <footer>
        Pemrograman Web 2 &copy;2019
    </footer>
    <?php
    } else{
        include_once 'view/login.php';
    }
    ?>

</div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</html>
