<?php

/**
 * +-------------+------------------+------+-----+---------+----------------+
 * | Field       | Type             | Null | Key | Default | Extra          |
 * +-------------+------------------+------+-----+---------+----------------+
 * | IDService   | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
 * | ServiceDesc | char(30)         | NO   |     | NULL    |                |
 * | Price       | float(6,2)       | YES  |     | NULL    |                |
 * +-------------+------------------+------+-----+---------+----------------+
 */

 class ServiceType{
    
    private $IDService;
    private $ServiceDesc;
    private $Price;

    function getIDService(){
        return $this->IDService;
    }

    function getServiceDesc(){
        return $this->ServiceDesc;
    }

    function getPrice(){
        return $this->Price;
    }

    function setIDService($IDService){
        $this->IDService = $IDService;
    }

    function setServiceDesc($ServiceDesc){
        $this->ServiceDesc = $ServiceDesc;
    }

    function setPrice($Price){
        $this->Price = $Price;
    }
 }
?>