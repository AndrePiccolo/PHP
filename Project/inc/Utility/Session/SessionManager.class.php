<?php

class SessionManager
{
    static function logout()
    {
        unset($_SESSION['loggedin']);
        session_destroy();
        header("Location: TeamNumber05.php");
    }

    static function isUserAdmin()
    {
        UserDAO::initialize();
        $user = UserDAO::getUserByEmail($_SESSION['loggedin']);
        if ($user->getPermissionLevel() == "Admin") {
            return true;
        }
        return false;
    }

    static function verifySession()
    {
        if (session_id() == "" || !isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION['loggedin'])) {
            return true;
        } else {
            self::logout();
            header("Location: TeamNumber05.php");
            return false;
        }
    }
}
?>