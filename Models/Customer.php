<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Customer extends Db {
    private $table = 'customer';
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    public function findAll($page = 0):Array {
        $display = 'customer.id, customer.name, customer.birth, customer.gender, customer.coming';
        $sql = 'SELECT ' .$display. ' FROM customer ORDER BY customer.coming DESC';
        $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findMonth($page = 0):Array {
        $search = addslashes($_POST['month']);
        $display = 'customer.id, customer.name, customer.birth, customer.gender, customer.coming';
        $sql = "SELECT " .$display. " FROM customer WHERE birth LIKE :search";
        $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':search', '%' . addcslashes($search, '\_%') . '%', PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function countAll():Int {
        $sql = 'SELECT count(*) as count FROM customer';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $count = $sth->fetchColumn();
        return $count;
    }

    public function Register() {
    $err = [];

    if(!$name = filter_input(INPUT_POST,'name')) {
      $err['name'] = '名前を記入してください';
    }

    if(!$coming = filter_input(INPUT_POST,'coming')) {
      $err['coming'] = '最終来店日を記入してください';
    }

    if(count($err) > 0) {
      $_SESSION = $err;
      header('Location: reg_cus.php');
      return;
    }

    if (count($err) === 0) {
      $hasCreated = self::createCus($_POST);

      if(!$hasCreated) {
        $err = "sippai";
      }

      echo "success";
    }
  }

  public function createCus($cusData) {
    $result = false;

    $sql = "INSERT INTO customer (name, birth, gender, coming) VALUES (?, ?, ?, ?)";

    $arr = [];
    $arr[] = $cusData['name'];
    $arr[] = $cusData['birth'];
    $arr[] = $cusData['gender'];
    $arr[] = $cusData['coming'];

    try {
      $sth = $this->dbh->prepare($sql);
      $result = $sth->execute($arr);
      return $result;
    } catch (Exception $e) {
      print "DBに接続できませんでした。" . $e->getMessage();
            exit;
    }
  }

  public function updatep($id = 0) {
          $name = $_POST['name'];
          $birth = $_POST['birth'];
          $gender = $_POST['gender'];
          $coming = $_POST['coming'];
          $id = $_POST['id'];

          if(empty($name)) {
            echo "名前を入力してください";
            exit;
          } else if(empty($birth)) {
            echo "誕生日を入力してください";
            exit;
          } else if(empty($gender)) {
            echo "性別を入力してください";
            exit;
          } else if(empty($coming)) {
            echo "最終来店日を入力してください";
            exit;
          } else {
              $sql="UPDATE customer SET name = '".$name."',
                                        birth = '".$birth."',
                                        gender = '".$gender."',
                                        coming = '".$coming."'
                                        WHERE id = :id";
              $sth = $this->dbh->prepare($sql);
              $sth->bindParam(':id',$id,PDO::PARAM_INT);
              $sth->execute();
          }
        }

          public function findByID($id = 0):Array {
              $display = 'customer.id, customer.name, customer.birth, customer.gender, customer.coming';
              $sql = 'SELECT ' .$display. ' FROM ' . $this->table;
              $sql .= ' WHERE id = :id'; //countriesと結合しているのでplayers．を忘れずに
              $sth = $this->dbh->prepare($sql);
              $sth->bindParam(':id', $id, PDO::PARAM_INT);
              $sth->execute();
              $result = $sth->fetchAll(PDO::FETCH_ASSOC);
              return $result;
          }


}
