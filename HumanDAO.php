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
        // ref) https://stackoverflow.com/questions/29805097/php-constructing-a-class-with-pdo-warning-missing-argument
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Human', array('name','age'));
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
            return "エラーです";
        }finally{
           self::close_connection($pdo, $stmp); 
        }
    }
    
    // 会員番号から1人の会員を取得するメソッド
    public static function get_human($id){
        try{
            $pdo = self::get_connection();
            $stmt = $pdo -> prepare("SELECT *  FROM humans WHERE id=:id");
            // バインド処理
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Human', array('name','age'));
            
            $human = $stmt->fetch();
            
            return $human;
            
        }catch(PDOException $e){
            return null;
            // return "問題が発生しました<br>" . $e->getMessage();
        }finally{
           self::close_connection($pdo, $stmp); 
        }
    }
    
    // 会員情報を更新するメソッド
    public static function update($human){
        try{
            $pdo = self::get_connection();
            $stmt = $pdo -> prepare("UPDATE humans set name=:name, age=:age WHERE id=:id");
            // バインド処理
            $stmt->bindParam(':name', $human->name, PDO::PARAM_STR);
            $stmt->bindParam(':age', $human->age, PDO::PARAM_INT);
            $stmt->bindParam(':id', $human->id, PDO::PARAM_INT);
            
            $stmt->execute();

            return "会員情報を更新しました";
            
        }catch(PDOException $e){
            return "エラーです";
        }finally{
           self::close_connection($pdo, $stmp); 
        }
    }
    
    // 会員番号から1人の会員を削除するメソッド
    public static function delete($id){
        try{
            $pdo = self::get_connection();
            $stmt = $pdo -> prepare("DELETE FROM humans WHERE id=:id");
            // バインド処理
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            $stmt->execute();
            
        }catch(PDOException $e){
            return null;
        }finally{
           self::close_connection($pdo, $stmp); 
        }
    }
    
    // 名前のあいまい検索
    public static function search_humans_name($keyword){
        try{
            $pdo = self::get_connection();
            $stmt = $pdo -> prepare("SELECT *  FROM humans WHERE name LIKE :keyword");
            // バインド処理
            $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
            
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Human', array('name','age'));
            
            $humans = $stmt->fetchAll();
            
            return $humans;
            
        }catch(PDOException $e){
            return null;
            // return "問題が発生しました<br>" . $e->getMessage();
        }finally{
           self::close_connection($pdo, $stmp); 
        }
    }

}
