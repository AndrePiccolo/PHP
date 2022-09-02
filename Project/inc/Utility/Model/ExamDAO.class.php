<?php

class ExamDAO
{

    private static $db;

    static function initialize()
    {
        self::$db = new PDOWrapper('Exam');
    }

    static function createExam(Exam $exam)
    {
        // query
        $query = "INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status)
            VALUES (:idPatient, :idUser, :idService, :date, :status)";

        // bind
        try {
            self::$db->query($query);
            self::$db->bind(":idPatient", $exam->getIDPatient());
            self::$db->bind(":idUser", $exam->getIDUser());
            self::$db->bind(":idService", $exam->getIDService());
            self::$db->bind(":date", $exam->getDate());
            self::$db->bind(":status", $exam->getStatus());

            // execute
            self::$db->execute();
            if (self::$db->rowCount() != 1) {
                throw new Exception("Failed to create exam registration");
            }
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return 0;
        }

        return self::$db->rowCount();
    }

    static function getExam(string $date)
    {

        $query = "SELECT p.FirstName AS userfirst, p.LastName AS userlast, u.FirstName AS doctorfirst, u.LastName  AS doctorlast,  s.ServiceDesc, e.*  
        FROM exam e, patient p, servicetype s, user u
        WHERE e.IDPatient=p.IDPatient AND e.IDUser=u.IDUser AND e.IDService=s.IDService AND e.Date = :date";

        try {
            self::$db->query($query);
            self::$db->bind(":date", $date);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        //Exam can return more than one result if it is in the same date
        return self::$db->getSetResult();
    }

    static function updateExam(string $status, string $id)
    {

        $query = "UPDATE exam SET Status = :status
                        WHERE IDExam = :idExam";

        try {
            self::$db->query($query);
            self::$db->bind(":status", $status);
            self::$db->bind(":idExam", $id);

            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }

        return self::$db->rowCount();
    }

    static function getExams()
    {
        $query = "SELECT p.FirstName AS userfirst, p.LastName AS userlast, u.FirstName AS doctorfirst, u.LastName  AS doctorlast,  s.ServiceDesc, e.*  
                    FROM exam e, patient p, servicetype s, user u
                    WHERE e.IDPatient=p.IDPatient AND e.IDUser=u.IDUser AND e.IDService=s.IDService
                    ORDER BY e.Date ASC";

        try {
            self::$db->query($query);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSetResult();
    }

    static function getProfit(string $dateBegin, string $dateEnd)
    {

        $firstDate = "";
        $secondDate = "";

        // If dates are given, then include in search, otherwise will get all the entries
        if ($dateBegin != "notset") {
            $firstDate = " AND e.Date >= :dateBegin ";
        }
        if ($dateEnd != "notset") {
            $secondDate = " AND e.Date <= :dateEnd ";
        }
        $query = "SELECT p.FirstName AS userfirst, p.LastName AS userlast, u.FirstName AS doctorfirst, u.LastName  AS doctorlast,  s.ServiceDesc, s.Price, e.*  
        FROM exam e, patient p, servicetype s, user u
        WHERE e.IDPatient=p.IDPatient AND e.IDUser=u.IDUser AND e.IDService=s.IDService AND e.Status = 'Confirmed'" . $firstDate . $secondDate;
        $query .= " ORDER BY e.Date ASC";

        try {
            self::$db->query($query);
            if ($dateBegin != "notset") {
                self::$db->bind(":dateBegin", $dateBegin);
            }
            if ($dateEnd != "notset") {
                self::$db->bind(":dateEnd", $dateEnd);
            }
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSetResult();
    }

    static function getProfits()
    {
        $query = "SELECT p.FirstName AS userfirst, p.LastName AS userlast, u.FirstName AS doctorfirst, u.LastName  AS doctorlast,  s.ServiceDesc, s.Price, e.*  
                    FROM exam e, patient p, servicetype s, user u
                    WHERE e.IDPatient=p.IDPatient AND e.IDUser=u.IDUser AND e.IDService=s.IDService AND e.Status = 'Confirmed'
                    ORDER BY e.Date ASC";

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
    static function deleteExam($id)
    {
        $query = "DELETE FROM exam WHERE IDExam = :idExam";

        try {
            self::$db->query($query);
            self::$db->bind(":idExam", $id);

            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }

        return self::$db->rowCount();
    }
}
?>