<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?=$this->meta_desc?>">
    <meta name="keywords" content="<?=$this->meta_key?>">
    <title><?=$this->title?></title>
</head>
<body>

    <a href="<?=$this->index?>">Главная</a>
    <a href="<?=$this->cart?>">Корзина</a>

    <p>Список пользователей</p>
    <ul>
        <?php for($i=0; $i < count($this->user_items); $i++) { ?>
            <li><a href="<?=$this->user_items[$i]['link']?>"><?=$this->user_items[$i]['login']?></a></li>
        <?php } ?>
    </ul>


    <?php include "content_".$this->content.".tpl";?>

</body>
</html>