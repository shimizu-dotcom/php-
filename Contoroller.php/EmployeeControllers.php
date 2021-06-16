<?php
require_once(ROOT_PATH . '/Models/Employee.php');

class EmployeeController {
    private $request;   // リクエストパラメータ(GET,POST)
    private $Customer;  //クラスを表している


    public function __construct() {

        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;


        $this->Employee = new Employee(); //

    }

    public function index() {
        $page = 0;
        if(isset($this->request['get']['page'])) {
            $page = $this->request['get']['page'];
        }

        $employees = $this->Employee->findAll($page);
         //変数playersがplayerというクラスのfindAll（引数＄page）という関数を動かす
        $employees_count = $this->Employee->countAll();
        $params = [  //$paramsという配列の定義
            'employee' => $employees,    //連想配列として定義
            'pages' => $employees_count / 10
        ];
        return $params;
    }

    public function register() {
      $reg = $this->Employee->Register();
    }

    public function log() {
      $log = $this->Employee->login();
    }

    public function token_one() {
      $Token = $this->Employee->setToken_one();
    }

    public function token_two() {
      $Token = $this->Employee->setToken_two();
    }

    public function check() {
      $check = $this->Employee->checkLogin();
    }

    public function delete() {
      $this->Employee->Delete($this->request['get']['id']);
    }


}
