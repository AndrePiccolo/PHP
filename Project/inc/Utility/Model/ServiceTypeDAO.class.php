<?php

class ServiceTypeDAO
{

    private static $db;

    static function initialize()
    {
        self::$db = new PDOWrapper('ServiceType');
    }

    static function createServiceType(ServiceType $service)
    {
        // query
        $query = "INSERT INTO servicetype (ServiceDesc, Price)
        VALUES (:serviceDesc, :price)";

        // bind
        try {
            self::$db->query($query);
            self::$db->bind(":serviceDesc", $service->getServiceDesc());
            self::$db->bind(":price", $service->getPrice());

            // execute
            self::$db->execute();
            if (self::$db->rowCount() != 1) {
                throw new Exception("Failed to register a service Type");
            }
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return 0;
        }

        return self::$db->rowCount();
    }

    static function getServiceType(string $desc)
    {

        $query = "SELECT * FROM servicetype WHERE servicetype.ServiceDesc = :serviceDesc";

        try {
            self::$db->query($query);
            self::$db->bind(":serviceDesc", $desc);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSingleResult();
    }

    static function updateServiceType(ServiceType $service)
    {

        $query = "UPDATE servicetype SET ServiceDesc = :serviceDesc,
                                Price = :price
                    WHERE IDService = :idService";

        try {
            self::$db->query($query);
            self::$db->bind(":serviceDesc", $service->getServiceDesc());
            self::$db->bind(":price", $service->getPrice());
            self::$db->bind(":idService", $service->getIDService());

            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }

        return self::$db->rowCount();
    }

    static function getServicesType()
    {
        $query = "SELECT * FROM servicetype";

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
    static function deleteServiceType($id)
    {
        $query = "DELETE FROM servicetype WHERE IDService = :idService";

        try {
            self::$db->query($query);
            self::$db->bind(":idService", $id);

            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }

        return self::$db->rowCount();
    }
}
?>