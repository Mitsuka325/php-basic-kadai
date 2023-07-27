<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PHP11章課題</title>
</head>
<body>
    
</body>
</html>
<p>
    <?php
$local_specialty=[
    '名前'=>'玉ねぎ',
    '値段'=>200,
    '産地'=>'北海道'
];

    foreach($local_specialty as $key=> $value){
        echo"{$key}:{$value}<br>";
    }
    ?>

</p>
</body>
</html>