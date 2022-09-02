<?php

require_once('inc/config.inc.php');

//Entity
require_once('inc/Entity/User.class.php');

//db connector
require_once('inc/Utility/PDOWrapper.class.php');

//add db Model
require_once('inc/Utility/Model/UserDAO.class.php');

//add session handler
require_once('inc/Utility/Session/SessionManager.class.php');

//add view
require_once('inc/View/LoginPage.class.php');
require_once('inc/View/HomePage.class.php');

if (isset($_POST['submit'])) {

    UserDAO::initialize();

    $userLogin = $_POST['user'];

    if (trim($userLogin) == "") {
        LoginPage::$notifications = "User or password incorrect. Please, reenter credentials";
    } else {
        $user = UserDAO::getUserByEmail($userLogin);

        if ($user != null) {
            if ($user->verifyPassword($_POST['password'])) {

                session_start();
                $_SESSION['loggedin'] = $user->getEmail();
                header("Location: Menu.php");
            } else {
                LoginPage::$notifications = "User or password incorrect. Please, reenter credentials";
            }
        } else {
            LoginPage::$notifications = "User or password incorrect. Please, reenter credentials";
        }
    }
}
LoginPage::displayHeader();
LoginPage::displayContent();
LoginPage::displayForm();
LoginPage::displayFooter();
?>