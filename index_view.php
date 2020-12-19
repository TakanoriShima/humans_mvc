<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <title>会員一覧</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
               <h1 class="col-sm-12 text-center">会員一覧</h1> 
            </div>
            <?php if($message !== ''): ?>
            <div class="row">
                <div class="message col-sm-12 mb-2 text-center"><?= $message ?></div>
            </div>
            <?php endif; ?>
            <div class="row mt-4">
                <a href="new.php" class="col-sm-2 btn btn-primary">新規会員登録</a>
                <form action="search.php" method="GET" class="col-sm-10">
                    <div class="row">
                        <input type="search" name="keyword" class="offset-sm-2 col-sm-4" placeholder="名前を入力">
                        <input type="submit" value="検索" class="btn btn-primary offset-sm-1 col-sm-2">
                        <a href="index.php" class="btn btn-danger offset-sm-1 col-sm-2">リセット</a>
                    </div>
                </form>
                
            </div>
            <?php if(count($humans) !== 0): ?>
            <table class="table table-bordered table-striped mt-5">
                <tr>
                    <th>会員番号</th>
                    <th>登録時刻</th>
                    <th>名前</th>
                    <th>年齢</th>
                    <th>お酒</th>
                    <th>車の運転</th>
                </tr>
                <?php foreach($humans as $human): ?>
                <tr>
                    <td><a href="show.php?id=<?= $human->id ?>"><?= $human->id ?></a></td>
                    <td><?= $human->created_at ?></td>
                    <td><?= $human->name ?></td>
                    <td><?= $human->age ?>歳</td>
                    <td><?= $human->drink() ?></td>
                    <td><?= $human->drive() ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>
    
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>