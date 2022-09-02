<?php
/*
+--------+-----------+-------------------------+
| DeptID | ShortName | LongName                |
+--------+-----------+-------------------------+
|      1 | MAR       | Marketing               |
|      2 | BA        | Business Administration |
|      3 | CSIS      | Computing Studies       |
|      4 | ACCT      | Accounting              |
|      5 | FIN       | Finance                 |
+--------+-----------+-------------------------+
*/
class DepartmentDAO
{

    // Create a class member to store the PDO wrapper object
    private static $db;

    // create the init function to start the PDO wrapper
    static function init()
    {
        self::$db = new PDOWrapper('Department');
    }

    // get user detail
    static function getDepartment(string $deptID)
    {
        // you know the drill
        // return the single result query
        $query = "SELECT * FROM department WHERE department.DeptID = :deptID";

        try {
            self::$db->query($query);
            self::$db->bind(":deptID", $deptID);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSingleResult();
    }

    // get multiple users detail
    // It is not needed in our app, but hey.. more practice is better!
    static function getDepartments()
    {

        // you know the drill
        // return the multiple result query    
        $query = "SELECT * FROM department";

        try {
            self::$db->query($query);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSetResult();
    }
}
