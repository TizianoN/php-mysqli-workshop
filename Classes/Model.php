<?php
require_once __DIR__ . '/../Classes/DB.php';
class Model
{
  use DB;
  public function __construct()
  {
  }

  public static function all()
  {
    $mysqli = DB::connect();
    $results = static::make_query($mysqli);
    $data = [];

    if ($results && $results->num_rows > 0) {
      for ($i = 0; $i < $results->num_rows; $i++) {
        array_push(
          $data,

          $results->fetch_object(static::class)
        );
      }
    }
    
    $mysqli->close();
    return $data;
  }

  public static function create(array $data)
  {
    try {
      $mysqli = DB::connect();
    } catch (Exception $e) {
      echo $e->getMessage();
      echo $e->getFile();
      echo ' line:' . $e->getLine();
    }

    $results = static::make_query($mysqli);
    $fields = $results->fetch_fields();
    $columnList = [];

    foreach ($fields as $field) {
      if ($field->name !== 'id') {
        array_push($columnList, $field->name);
      }
    }
    $columns =  "`" . implode('`,`', $columnList) . "`";
    $values = "'" . implode("','", $data) . "'";
    $table_name = static::get_table_name();
    $query = "INSERT INTO $table_name ($columns) VALUES ($values)";
    
    if ($mysqli->query($query) === true) {
      session_start();
      $_SESSION['message'] = "Query successfull $query";
    } else {
      echo $mysqli->error;
    }
  }

  public static function findOne($id)
  {
    $table_name = static::get_table_name();
    $query = "SELECT * FROM `$table_name` WHERE `id` = $id";

    try {
      $mysqli = DB::connect();
    } catch (Exception $e) {
      echo $e->getMessage();
      echo $e->getFile();
      echo ' line:' . $e->getLine();
    }

    $result = $mysqli->query($query);
    $object = $result->fetch_object(static::class);
    
    return $object;
  }

  private static function get_table_name()
  {
    return strtolower(static::class);
  }

  private static function make_query($db)
  {
    $table_name = static::get_table_name();
    return $db->query("SELECT * FROM $table_name ORDER BY `id` DESC");
  }
}