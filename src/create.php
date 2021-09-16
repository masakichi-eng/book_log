<?php
require_once __DIR__ . '/lib/mysqli.php';

function createReview($link, $review) {
    $sql = <<<EOT
INSERT INTO reviews (
    title,
    author,
    status,
    score,
    summary
) VALUES (
    "{$review['title']}",
    "{$review['author']}",
    "{$review['status']}",
    "{$review['score']}",
    "{$review['summary']}"
)
EOT;
    $result = mysqli_query($link, $sql);
    if (!$result){
        error_log('Error: fail to create review');
        error_log('Debugging Error:' . mysqli_error($link));
    }
}
//HTTPメソッドがPOSTだったら
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //POSTされた会社情報を変数に格納する
    $review = [
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'status' => $_POST['status'],
        'score' => $_POST['score'],
        'summary' => $_POST['summary']
    ];

    //バリデーションする
    //データベースにデータに接続する
    $link = dbConnect();
    //データベースにデータを登録する
    createReview($link, $review);
    //データベースとの接続を切断する
    mysqli_close($link);
}

header("Location: index.php");
