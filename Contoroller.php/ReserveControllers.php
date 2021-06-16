<?php
require_once(ROOT_PATH . '/Models/Reserve.php');

class ReserveController {
    private $request;   // リクエストパラメータ(GET,POST)
    private $Reserve;  //クラスを表している


    public function __construct() {

        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;


        $this->Reserve = new Reserve(); //

    }

    public function reserve() {
      $res = $this->Reserve->Reserve();
    }

    public function index() {
        $page = 0;
        if(isset($this->request['get']['page'])) {
            $page = $this->request['get']['page'];
        }

        $reservers = $this->Reserve->findAll($page);
         //変数playersがplayerというクラスのfindAll（引数＄page）という関数を動かす
        $reservers_count = $this->Reserve->countAll();
        $params = [  //$paramsという配列の定義
            'reserver' => $reservers,    //連想配列として定義
            'pages' => $reservers_count / 10
        ];
        return $params;
    }
}
