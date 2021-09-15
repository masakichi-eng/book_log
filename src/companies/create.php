<?php
require_once __DIR__ . '/lib/mysqli.php';

function createCompany($link, $company) {
    $sql = <<<EOT
INSERT INTO companies (
    name,
    establishment_date,
    founder
) VALUES (
    "{$company['name']}",
    "{$company['establishment_date']}",
    "{$company['founder']}"
)
EOT;
    $result = mysqli_query($link, $sql);
    if (!$result){
        error_log('Error: fail to create company');
        error_log('Debugging Error:' . mysqli_error($link));
    }
}
//HTTPメソッドがPOSTだったら
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //POSTされた会社情報を変数に格納する
    $company = [
        'name' => $_POST['name'],
        'establishment_date' => $_POST['establishment_date'],
        'founder' => $_POST['founder']
    ];

    //バリデーションする
    //データベースにデータに接続する
    $link = dbConnect();
    //データベースにデータを登録する
    createCompany($link, $company);
    //データベースとの接続を切断する
    mysqli_close($link);
}

header("Location: index.php");
