<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Employee extends Db {
    private $table = 'employee';
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    public function findAll($page = 0):Array {
        $display = 'employee.id, employee.name, employee.birth, employee.password';
        $sql = 'SELECT ' .$display. ' FROM ' . $this->table;
        $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function countAll():Int {
        $sql = 'SELECT count(*) as count FROM employee';
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

      if(!$birth = filter_input(INPUT_POST,'birth')) {
        $err['birth'] = '誕生日を記入してください';
      }

      if(!$password = filter_input(INPUT_POST,'password')) {
        $err['password'] = 'パスワードを記入してください';
      }

      if(count($err) > 0) {
        $_SESSION = $err;
        header('Location: reg_em.php');
        return;
      }

      if (count($err) === 0) {
        $hasCreated = self::createEmp($_POST);

        if(!$hasCreated) {
          $err = "sippai";
        }

        echo "success";
      }
    }

    public function createEmp($empData) {
      $result = false;

      $sql = "INSERT INTO employee (name, birth, password) VALUES (?, ?, ?)";

      $arr = [];
      $arr[] = $empData['name'];
      $arr[] = $empData['birth'];
      $arr[] = password_hash($empData['password'], PASSWORD_DEFAULT);

      try {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($arr);
        return $result;
      } catch (Exception $e) {
        return $result;
      }
    }

    public function login() {

      $err = [];

      $token = filter_input(INPUT_POST,'csrf_token1');
      if(!isset($_SESSION['csrf_token1']) || $token !== $_SESSION['csrf_token1']) {
        header('Location: stafflogin.php');
        return;
      }

      unset($_SESSION['csrf_token1']);

      if(!$name = filter_input(INPUT_POST,'name')) {
        $err['name'] = '名前を記入してください';
      }

      if(!$password = filter_input(INPUT_POST,'password')) {
        $err['password'] = 'パスワードを記入してください';
      }

      if(count($err) > 0) {
        $_SESSION = $err;
        header('Location: stafflogin.php');
        return;
      }
      $result = self::loglog($name, $password);

      if(!$result) {
        header('Location: stafflogin.php');
        return;
      }

      $csrf_token2 = self::setToken_two();
      $user = self::getUserByName($name);


      return $user;

    }

    public function loglog($name, $password) {
      $result = false;
      $user = self::getUserByName($name);

      if(!$user) {
        $_SESSION['msg'] = "名前が一致しません";
        return $result;
      }

      if(password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['login_user'] = $user;
        $result = true;
        return $result;
      }

        $_SESSION['msg'] = "パスワードが一致しません";
        return $result;
    }

    public function getUserByName($name) {
      $sql = 'SELECT * FROM employee WHERE name = ?';
      $arr = [];
      $arr[] = $name;
      try {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($arr);
        $user = $sth->fetch();
        return $user;
      } catch(Exception $e) {
        return $result;
      }
    }

    public function setToken_one() {
      session_start();
      $csrf_token1 = bin2hex(random_bytes(32));
      $_SESSION['csrf_token1'] = $csrf_token1;

      return $csrf_token1;
    }

    public function setToken_two() {
      session_start();
      $csrf_token2 = bin2hex(random_bytes(32));
      $_SESSION['csrf_token2'] = $csrf_token2;

      return $csrf_token2;
    }

    public function checkLogin() {
        if(!isset($_SESSION['csrf_token2'])) {
          header('Location: stafflogin.php');
        }
    }

    public function Delete($id = 0) {
        $sql = "DELETE FROM employee WHERE id = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
    }

}
?>
