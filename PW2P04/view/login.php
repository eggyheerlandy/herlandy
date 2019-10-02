
<?php
$loginPressed = filter_input(INPUT_POST,'btnLogin');
if(isset($loginPressed)){
    $usnm = filter_input(INPUT_POST,'txtUsername');
    $pwd = filter_input(INPUT_POST,'txtPassword');
    $user = login($usnm ,md5($pwd));
    if ($user != null && $user['username'] == $usnm){
        $_SESSION['user_logged'] = true;
        $_SESSION['name'] = $user['name'];
        $_SESSION['user'] = $user;
        header("location:index.php");
    }else{
        $errMsg = "invalid username or password";
    }
}
if (isset($errMsg)){
    echo '<div class="err-msg">'.$errMsg. '</div>';
}
?>

<form method="post">
<fieldset>
    <table>
        <tr>
    <td>
        <label>
        <h1>Login Form</h1>
        <label for="txtUsernameIdx">Username :</label>
        <input id="txtUsernameIdx" name="txtUsername" type="text" autofokus required
               placeholder="YourUsername" class="form-input">
        </label>
    </td>
        </tr>


        <tr>
    <td>
        <label for="txtPasswordIdx">Password :</label>
    <input id="txtPasswordIdx" name="txtPassword" type="password" required
           placeholder="YourPassword" class="form-input">
    <input type="submit" name="btnLogin"
           value="Login" class="button button-primary">
    </td>
        </tr>


    </table>
</fieldset>
</form>
