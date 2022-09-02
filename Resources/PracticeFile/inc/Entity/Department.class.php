<?php
/*
+-----------+------------+------+-----+---------+----------------+
| Field     | Type       | Null | Key | Default | Extra          |
+-----------+------------+------+-----+---------+----------------+
| DeptID    | tinyint(3) | NO   | PRI | NULL    | auto_increment |
| ShortName | char(5)    | YES  |     | NULL    |                |
| LongName  | tinytext   | YES  |     | NULL    |                |
+-----------+------------+------+-----+---------+----------------+

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
class Department
{
    private $DeptID;
    private $ShortName;
    private $LongName;

    function getDeptID()
    {
        return $this->DeptID;
    }

    function getShortName()
    {
        return $this->ShortName;
    }

    function getLongName()
    {
        return $this->LongName;
    }
}
