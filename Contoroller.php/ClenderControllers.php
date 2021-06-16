<?php
require_once(ROOT_PATH . '/Models/Calender.php');

class CalenderController {
    private $request;   // リクエストパラメータ(GET,POST)
    private $Calender;  //クラスを表している


    public function __construct() {

        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;


        $this->Calender = new Calender(); //

    }

    public function calender() {
      $cal = $this->Calender->Calender();
    }

    public function index() {
        $cals = $this->Calender->findAll();
         //変数playersがplayerというクラスのfindAll（引数＄page）という関数を動かす
        $params = [  //$paramsという配列の定義
            'calender' => $cals,    //連想配列として'pages' => $customers_count / 10
        ];
        return $params;
    }
}
