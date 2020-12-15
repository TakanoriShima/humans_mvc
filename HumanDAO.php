<?php
// 外部ファイルの読み込み
require_once 'Const.php';
require_once 'Human.php';

// データベースとやり取りを行う便利なクラス
class HumanDAO{
    
    // データベースと接続を行うメソッド
    private static function get_connection(){
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // 失敗したら例外を投げる
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,   //デフォルトのフェッチモードはクラス
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',   //MySQL サーバーへの接続時に実行するコマンド
          );
        $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $options);
        return $pdo;
    }
    
    // データベースとの切断を行うメソッド
    private static function close_connection($pdo, $stmp){
        $pdo = null;
        $stmp = null;
    }
    
    // 全会員情報を取得するメソッド
    public static function get_all_humans(){
        $pdo = self::get_connection();
        $stmt = $pdo->query('SELECT * FROM humans');
        // フェッチの結果を、Humanクラスのインスタンスにマッピングする
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Human');
        $humans = $stmt->fetchAll();
        self::close_connection($pdo, $stmp);
        // Humanクラスのインスタンスの配列を返す
        return $humans;
    }


    // 会員を1件登録するメソッド
    public static function insert($human){
        try{
            $pdo = self::get_connection();
            $stmt = $pdo -> prepare("INSERT INTO humans (name, age) VALUES (:name, :age)");
            // バインド処理
            $stmt->bindParam(':name', $human->name, PDO::PARAM_STR);
            $stmt->bindParam(':age', $human->age, PDO::PARAM_INT);
            $stmt->execute();

            return "会員登録が完了しました";
            
        }catch(PDOException $e){
            return "問題が発生しました<br>" . $e->getMessage();
        }finally{
           self::close_connection($pdo, $stmp); 
        }
    }

}
