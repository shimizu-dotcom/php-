<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Calender extends Db {
    private $table = 'calender';
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    public function Calender() {
    $err = [];

    if(!$date = filter_input(INPUT_POST,'date')) {
      $err['date'] = '日付を選択してください';
    }

    if(!$body = filter_input(INPUT_POST,'body')) {
      $err['body'] = '予算を記入してください';
    }

    if(count($err) > 0) {
      $_SESSION = $err;
      header('Location: calender.php');
      return;
    }

    if (count($err) === 0) {
      $hasCreated = self::createCalender($_POST);

      if(!$hasCreated) {
        $err = "sippai";
      }

    }
  }
  public function createCalender($calenderData) {
    $result = false;

    $sql = "INSERT INTO  calender (date, body) VALUES (?, ?)";

    $arr = [];
    $arr[] = $calenderData['date'];
    $arr[] = $calenderData['body'];

    try {
      $sth = $this->dbh->prepare($sql);
      $result = $sth->execute($arr);
      return $result;
    } catch (Exception $e) {
      return $result;
    }
  }

  public function findAll():Array {
      $display = 'id, date, body';
      $sql = 'SELECT ' .$display. ' FROM ' . $this->table;
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;
  }

}
