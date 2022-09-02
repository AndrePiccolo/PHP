<?php

class UserDAO
{

    private static $db;

    static function initialize()
    {
        self::$db = new PDOWrapper('User');
    }

    static function createUser(User $user)
    {
        // query
        $query = "INSERT INTO user (FirstName, LastName, Email, password, PermissionLevel, Description)
        VALUES (:firstName, :lastName, :email, :password, :permissionLevel, :description)";

        // bind
        try {
            self::$db->query($query);
            self::$db->bind(":firstName", $user->getFirstName());
            self::$db->bind(":lastName", $user->getLastName());
            self::$db->bind(":email", $user->getEmail());
            self::$db->bind(":password", $user->getpassword());
            self::$db->bind(":permissionLevel", $user->getPermissionLevel());
            self::$db->bind(":description", $user->getDescription());

            // execute
            self::$db->execute();
            if (self::$db->rowCount() != 1) {
                throw new Exception("Failed to register an user");
            }
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return 0;
        }

        return self::$db->rowCount();
    }

    static function getUser(string $id)
    {

        $query = "SELECT * FROM user WHERE user.IDUser = :id";

        try {
            self::$db->query($query);
            self::$db->bind(":id", $id);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSingleResult();
    }

    static function getUserByEmail(string $email)
    {

        $query = "SELECT * FROM user WHERE user.Email = :email";

        try {
            self::$db->query($query);
            self::$db->bind(":email", $email);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSingleResult();
    }

    // email and password will not be updatable
    static function updateUser(User $user)
    {

        $query = "UPDATE user SET FirstName = :firstName,
                                LastName = :lastName,
                                PermissionLevel = :permissionLevel,
                                Description = :description
                    WHERE IDUser = :idUser";

        try {
            self::$db->query($query);
            self::$db->bind(":firstName", $user->getFirstName());
            self::$db->bind(":lastName", $user->getLastName());
            self::$db->bind(":permissionLevel", $user->getPermissionLevel());
            self::$db->bind(":description", $user->getDescription());
            self::$db->bind(":idUser", $user->getIDUser());

            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }

        return self::$db->rowCount();
    }

    static function getUsers()
    {
        $query = "SELECT * FROM user";

        try {
            self::$db->query($query);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSetResult();
    }

    static function getUserByDescription(string $description)
    {

        $query = "SELECT * FROM user WHERE user.Description = :description";

        try {
            self::$db->query($query);
            self::$db->bind(":description", $description);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSetResult();
    }

    static function getDoctors()
    {
        $query = "SELECT * FROM user WHERE Description = 'Doctor'";

        try {
            self::$db->query($query);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSetResult();
    }

    // Delete is included but never used.
    // All data need to be keeped in order to have all the actions in database.
    static function deleteUser($id)
    {
        $query = "DELETE FROM user WHERE IDUser = :idUser";

        try {
            self::$db->query($query);
            self::$db->bind(":idUser", $id);

            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }

        return self::$db->rowCount();
    }
}
?>