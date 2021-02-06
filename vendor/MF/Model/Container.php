<?php
namespace MF\Model;

use src\Connection;

class Container {

  public static function getModel($model) {
    $class = "\\src\\Models\\".ucfirst($model);

    $connection = Connection::getDb();
    return new $class($connection);
  }

}