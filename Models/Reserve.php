<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Reserve extends Db {
    private $table = 'reserve_contents';
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    public function Reserve() {
    $err = [];

    if(!$name = filter_input(INPUT_POST,'name')) {
      $err['name'] = '名前を記入してください';
    }

    if(!$tel = filter_input(INPUT_POST,'tel')) {
      $err['tel'] = '電話番号を記入してください';
    }

    if(!$people = filter_input(INPUT_POST,'people')) {
      $err['people'] = '人数を記入してください';
    }

    if(!$budget = filter_input(INPUT_POST,'budget')) {
      $err['budget'] = '予算を記入してください';
    }

    if(!$date = filter_input(INPUT_POST,'date')) {
      $err['date'] = '日付を選択してください';
    }

    if(!$time = filter_input(INPUT_POST,'time')) {
      $err['time'] = '時間を選択してください';
    }



    if(count($err) > 0) {
      $_SESSION = $err;
      header('Location: reserve.php');
      return;
    }

    if (count($err) === 0) {
      $hasCreated = self::createReserve($_POST);

      if(!$hasCreated) {
        $err = "sippai";
      }

    }
  }
  public function createReserve($reserverData) {
    $result = false;

    $sql = "INSERT INTO  reserve_contents (name, tel, date, people, budget, time) VALUES (?, ?, ?, ?, ?, ?)";

    $arr = [];
    $arr[] = $reserverData['name'];
    $arr[] = $reserverData['tel'];
    $arr[] = $reserverData['date'];
    $arr[] = $reserverData['people'];
    $arr[] = $reserverData['budget'];
    $arr[] = $reserverData['time'];

    try {
      $sth = $this->dbh->prepare($sql);
      $result = $sth->execute($arr);
      return $result;
    } catch (Exception $e) {
      return $result;
    }

  }

  public function findAll($page = 0):Array {
      $display = 'reserve_contents.id, reserve_contents.name, reserve_contents.tel, reserve_contents.date, reserve_contents.people, reserve_contents.budget, reserve_contents.time';
      $sql = 'SELECT ' .$display. ' FROM ' . $this->table;
      $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;
  }

  public function countAll():Int {
      $sql = 'SELECT count(*) as count FROM reserve_contents';
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $count = $sth->fetchColumn();
      return $count;
  }
}
