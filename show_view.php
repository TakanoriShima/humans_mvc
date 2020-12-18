<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <title>会員詳細</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
               <h1 class="col-sm-12 text-center"><?= $human->name ?>さんの詳細</h1> 
            </div>
            <div class="row mt-4">
                <a href="index.php" class="btn btn-primary">会員一覧へ</a>
            </div>

            <table class="table table-bordered table-striped mt-5">
                <tr>
                    <th>会員番号</th>
                    <th>登録時刻</th>
                    <th>名前</th>
                    <th>年齢</th>
                    <th>お酒</th>
                    <th>車の運転</th>
                </tr>
                <tr>
                    <td><?= $human->id ?></td>
                    <td><?= $human->created_at ?></td>
                    <td><?= $human->name ?></td>
                    <td><?= $human->age ?>歳</td>
                    <td><?= $human->drink() ?></td>
                    <td><?= $human->drive() ?></td>
                </tr>
            </table>
            <div class="row mt-4">
                <a href="edit.php?id=<?= $human-> id ?>" class="offset-sm-1 col-sm-4 btn btn-primary">編集</a>
                <form action="delete.php" method="POST" class="offset-sm-2 col-sm-4 ">
                    <input type="hidden" name="id" value="<?= $human->id ?>">
                    <button type="submit" class="btn btn-primary col-sm-12" onclick="return confirm('本当に削除していいですか？');">削除</button>
                </form>
                <!--<a href="delete.php" class="offset-sm-2 col-sm-4 btn btn-primary" onclick="return confirm('本当に削除していいですか？');">削除</a>-->
            </div>
        </div>
    
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>