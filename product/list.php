<?php
$dom = new DOMDocument();
$dom->load('data.xml');
$products = $dom->getElementsByTagName('products')->item(0);
?>
<style>
    .container-fuild {
        text-align: center;
        font-family: "DejaVu Sans Mono", monospace;
        font-size: 20px;
    }

    table {
        margin: auto;
        border-collapse: collapse;
        border: 3px solid black;
        width: 80%;
    }

    th,
    td {
        border: 1px solid grey;
    }

    th {
        background: yellow;
    }

</style>

<body>
    <div class="container-fuild">
        <div class="card">
            <div class="card-header">
                <h2>List products</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Цена</th>
                            <th>Описание</th>
                            <th>Изменить</th>
                            <th>Удалить</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                $i=0;
                $product=$products->getElementsByTagName('product');
                while (is_object($product->item($i++))){
                    ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $product->item($i-1)->getElementsByTagName('name')->item(0)->nodeValue?></td>
                            <td><?php echo $product->item($i-1)->getElementsByTagName('price')->item(0)->nodeValue?></td>
                            <td><?php echo $product->item($i-1)->getElementsByTagName('description')->item(0)->nodeValue?></td>
                            <td><a href="index.php?page_layout=update&id=<?php echo  $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> Изменить </a></td>
                            <td><a onclick="return Del('<?php echo $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue;?>//')" href="index.php?page_layout=delete&id=<?php echo  $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>">Низвести до атомов</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="index.php?page_layout=create">Add</a>
            </div>
        </div>
    </div>
</body>
<script>
    function Del(name) {
        return confirm("Вы уверены, что хотите удалить " + name + " ?");
    }

</script>
