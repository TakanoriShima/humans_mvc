<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <title>登録情報更新</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <h1 class="col-sm-12 text-center">登録情報更新</h1>
            </div>
            <?php if(count($errors) !== 0): ?>
            <ul class="row mt-2">
                <?php foreach($errors as $error):?>
                <li class="error_message col-sm-12 mb-2 text-center"><?= $error ?></li>        
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <form action="update.php" method="POST" class="mt-5">
                <!-- 1行 -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">お名前</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="<?= $human->name ?>">
                    </div>
                </div>
            
                <!-- 1行 -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ご年齢</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="age" value="<?= $human->age ?>">
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $human->id ?>">
                <!-- 1行 -->
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary col-sm-12">更新</button>
                    </div>
                </div>
            </form>
             <div class="row mt-5">
                <a href="show.php?id=<?= $human->id ?>" class="btn btn-danger">会員詳細へ</a>
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