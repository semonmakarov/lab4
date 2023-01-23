<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Makarov Semyon lab4</title>
</head>

<body>
    <?php
    if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']){
            case 'list':
                require_once 'product/list.php';
                break;
            case 'create':
                require_once 'product/create.php';
                break;
            case 'update':
                require_once 'product/update.php';
                break;
            case 'delete':
                require_once 'product/delete.php';
                break;
        }
    }else{
        require_once 'product/list.php';
    }
?>
</body>

</html>
