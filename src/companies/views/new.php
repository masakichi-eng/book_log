<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/css/app.css">
    <title>会社情報の登録</title>
</head>
<body>
    <div class= "container">
        <h1 class="h2 text-dark mt-4 mb-4" >会社情報の登録</h1>
        <form action="create.php" method="POST">
            <?php if (count($errors)) : ?>
                <ul class="text-danger">
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="form-group">
                <label for="name">会社名</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $company['name'] ?>">
            </div>
            <div class="form-group">
                <label for="establishment_date">設立日</label>
                <input type="date" name="establishment_date" id="establishment_date" class="form-control" value="<?php echo $company['establishment_date'] ?>">
            </div>
            <div class="form-group">
                <label for="founder">代表者</label>
                <input type="text" name="founder" id="founder" class="form-control" value="<?php echo $company['founder'] ?>">
            </div>
            <button class="btn btn-primary" type="submit">登録する</button>
        </form>
    </div>
</body>
</html>
