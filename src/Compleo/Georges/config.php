<?php

namespace  Georges;

Config::write('db.host', '127.0.0.1');
Config::write('db.port', '3306');
Config::write('db.basename', 'georges');
Config::write('db.user', 'root');
Config::write('db.password', '');

class Config
{
    static $confArray;

    public static function read($name)
    {
        return self::$confArray[$name];
    }

    public static function write($name, $value)
    {
        self::$confArray[$name] = $value;
    }

}




/* table format 

CREATE TABLE `georges`.`test` ( `test_id` INT NOT NULL AUTO_INCREMENT , `start_date` TIMESTAMP NOT NULL , `name` VARCHAR(255) NOT NULL , `description` MEDIUMTEXT NOT NULL , `filters` JSON NOT NULL , `trackin_vars` JSON NOT NULL , `discovery_rate` FLOAT NOT NULL , `options` JSON NOT NULL , `statut` ENUM('on','off','pending') NOT NULL , `variations` JSON NOT NULL , `uri_regex` VARCHAR(255) NOT NULL , PRIMARY KEY (`test_id`)) ENGINE = InnoDB;

*/
?>