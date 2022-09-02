<?php

class PatientDAO
{

    private static $db;

    static function initialize()
    {
        self::$db = new PDOWrapper('Patient');
    }

    static function createPatient(Patient $patient)
    {
        // query
        $query = "INSERT INTO patient (FirstName, LastName, Email, Phone, Address, City, ZipCode)
        VALUES (:firstName, :lastName, :email, :phone, :address, :city, :zipCode)";

        // bind
        try {
            self::$db->query($query);
            self::$db->bind(":firstName", $patient->getFirstName());
            self::$db->bind(":lastName", $patient->getLastName());
            self::$db->bind(":email", $patient->getEmail());
            self::$db->bind(":phone", $patient->getPhone());
            self::$db->bind(":address", $patient->getAddress());
            self::$db->bind(":city", $patient->getCity());
            self::$db->bind(":zipCode", $patient->getZipCode());

            // execute
            self::$db->execute();
            if (self::$db->rowCount() != 1) {
                throw new Exception("Failed to register a patient");
            }
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return 0;
        }

        return self::$db->rowCount();
    }

    static function getPatient(int $id)
    {

        $query = "SELECT * FROM patient WHERE patient.IDPatient = :id";

        try {
            self::$db->query($query);
            self::$db->bind(":id", $id);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSingleResult();
    }

    static function getPatientByEmail(string $email)
    {

        $query = "SELECT * FROM patient WHERE patient.Email = :email";

        try {
            self::$db->query($query);
            self::$db->bind(":email", $email);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSingleResult();
    }

    static function getPatientLastName(string $LastName)
    {

        $query = "SELECT * FROM patient WHERE patient.LastName = :lastname";

        try {
            self::$db->query($query);
            self::$db->bind(":lastname", $LastName);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSetResult();
    }

    static function updatePatient(Patient $patient)
    {

        $query = "UPDATE patient SET FirstName = :firstName,
                                LastName = :lastName,
                                Email = :email,
                                Phone = :phone,
                                Address = :address,
                                City = :city,
                                ZipCode = :zipCode
                    WHERE IDPatient = :idPatient";

        try {
            self::$db->query($query);
            self::$db->bind(":idPatient", $patient->getIDPatient());
            self::$db->bind(":firstName", $patient->getFirstName());
            self::$db->bind(":lastName", $patient->getLastName());
            self::$db->bind(":email", $patient->getEmail());
            self::$db->bind(":phone", $patient->getPhone());
            self::$db->bind(":address", $patient->getAddress());
            self::$db->bind(":city", $patient->getCity());
            self::$db->bind(":zipCode", $patient->getZipCode());

            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }

        return self::$db->rowCount();
    }

    static function getPatients()
    {
        $query = "SELECT * FROM patient";

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
    static function deletePatient($id)
    {
        $query = "DELETE FROM patient WHERE IDPatient = :idPatient";

        try {
            self::$db->query($query);
            self::$db->bind(":idPatient", $id);

            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }

        return self::$db->rowCount();
    }
}
?>