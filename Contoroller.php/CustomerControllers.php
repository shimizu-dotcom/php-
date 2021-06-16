<?php
require_once(ROOT_PATH . '/Models/Customer.php');

class CustomerController {
    private $request;   // リクエストパラメータ(GET,POST)
    private $Customer;  //クラスを表している


    public function __construct() {

        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;


        $this->Customer = new Customer(); //

    }

    public function index() {
        $page = 0;
        if(isset($this->request['get']['page'])) {
            $page = $this->request['get']['page'];
        }

        $customers = $this->Customer->findAll($page);
         //変数playersがplayerというクラスのfindAll（引数＄page）という関数を動かす
        $customers_count = $this->Customer->countAll();
        $params = [  //$paramsという配列の定義
            'customer' => $customers,    //連想配列として定義
            'pages' => $customers_count / 10
        ];
        return $params;
    }

    public function search() {
        $page = 0;
        if(isset($this->request['get']['page'])) {
            $page = $this->request['get']['page'];
        }

        $customers = $this->Customer->findMonth($page);
         //変数playersがplayerというクラスのfindAll（引数＄page）という関数を動かす
        $customers_count = $this->Customer->countAll();
        $params = [  //$paramsという配列の定義
            'customer' => $customers,    //連想配列として定義
            'pages' => $customers_count / 10
        ];
        return $params;
    }

    public function register() {
      $cus = $this->Customer->Register();
    }

    public function update() {
      if(empty($this->request['post']['id'])) {
        header("Location:customer.php");
        exit;
      }

      $this->Customer->updatep($this->request['post']['id']);
    }

    public function view() {
        if(empty($this->request['get']['id'])) {
            header("Location:customer.php");
            exit;
        }    //idがないと表示出来ない設定

        $customers = $this->Customer->findByID($this->request['get']['id']);
        //引数としてidを渡してGoalというクラスのgetGoalという関数を動かしている（これを＄goalと定義）
        $params = [
            'customer' => $customers,
            //idと連携している＄goalという変数に格納された値を配列に格納

        ];
        return $params;
    }


}
