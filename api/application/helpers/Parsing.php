<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/27/16
 * Time: 7:06 PM
 */
class Parsing
{

    /*
{
    "uid": "1",
    "pid": "admin",
    "password": "1",
    "name": "Nhan Cao",
    "phone": null,
    "address": null,
    "type": "0",
    "block": "0",
    "create_date": "2016-05-10 00:45:46",
    "update_date": "2016-05-10 00:45:46",
    "author": "Nhan Cao"
}
     */
    //User
    public static function parsingNewUser($jsonData)
    {
        return Parsing::parsingUser($jsonData);
    }

    private static function parsingUser($jsonData)
    {
        return new MUser($jsonData);
    }

    public static function parsingEditUser($jsonData)
    {
        $user = Parsing::parsingUser($jsonData);
        $user->setUpdateDate(date("Y-m-d H:i:s"));
        return $user;
    }

    //Customer
    public static function parsingNewCustomer($jsonData)
    {
        $user = Parsing::parsingCustomer($jsonData);
        $user->setPid(UidGenerator::GeneratorUidL(8));
        return $user;
    }

    private static function parsingCustomer($jsonData)
    {
        return new MCustomer($jsonData);
    }

    public static function parsingEditCustomer($jsonData)
    {
        $user = Parsing::parsingCustomer($jsonData);
        $user->setUpdateDate(date("Y-m-d H:i:s"));
        return $user;
    }

    //Product
    public static function parsingNewProduct($jsonData)
    {
        $user = Parsing::parsingProduct($jsonData);
        $user->setPid(UidGenerator::GeneratorUidL(8));
        return $user;
    }

    private static function parsingProduct($jsonData)
    {
        return new MProduct($jsonData);
    }

    public static function parsingEditProduct($jsonData)
    {
        $user = Parsing::parsingProduct($jsonData);
        $user->setUpdateDate(date("Y-m-d H:i:s"));
        return $user;
    }

    //Ship
    public static function parsingNewShip($jsonData)
    {
        $user = Parsing::parsingShip($jsonData);
        $user->setPid(UidGenerator::GeneratorUidL(8));
        return $user;
    }

    private static function parsingShip($jsonData)
    {
        return new MShip($jsonData);
    }

    public static function parsingEditShip($jsonData)
    {
        $user = Parsing::parsingShip($jsonData);
        $user->setUpdateDate(date("Y-m-d H:i:s"));
        return $user;
    }

    //Stock
    public static function parsingNewStock($jsonData)
    {
        $user = Parsing::parsingStock($jsonData);
        $user->setPid(UidGenerator::GeneratorUidL(8));
        return $user;
    }

    private static function parsingStock($jsonData)
    {
        return new MStock($jsonData);
    }

    public static function parsingEditStock($jsonData)
    {
        $user = Parsing::parsingStock($jsonData);
        $user->setUpdateDate(date("Y-m-d H:i:s"));
        return $user;
    }

    //Transaction
    public static function parsingNewTransaction($jsonData)
    {
        $user = Parsing::parsingTransaction($jsonData);
        $user->setPid(UidGenerator::GeneratorUidL(8));
        return $user;
    }

    private static function parsingTransaction($jsonData)
    {
        return new MTransaction($jsonData);
    }

    public static function parsingEditTransaction($jsonData)
    {
        $user = Parsing::parsingTransaction($jsonData);
        $user->setUpdateDate(date("Y-m-d H:i:s"));
        return $user;
    }

}