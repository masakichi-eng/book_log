<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会社情報の登録</title>
</head>
<body>
    <h1>会社情報の登録</h1>
    <form action="create.php" method="POST">
        <?php if (count($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div>
            <label for="name">会社名</label>
            <input type="text" id="name" name="name" value="<?php echo $company['name'] ?>">
        </div>
        <div>
            <label for="establishment_date">設立日</label>
            <input type="date" name="establishment_date" id="establishment_date" value="<?php echo $company['establishment_date'] ?>">
        </div>
        <div>
            <label for="founder">代表者</label>
            <input type="text" name="founder" id="founder" value="<?php echo $company['founder'] ?>">
        </div>
        <button type="submit">登録する</button>
    </form>
</body>
</html>
