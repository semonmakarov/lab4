<?php
$dom = new DOMDocument();
$dom->load('data.xml');
$products = $dom->getElementsByTagName('products')->item(0);
$product=$products->getElementsByTagName('product');
$index = $product->length;
$id=$product[$index-1]->getElementsByTagName('id')->item(0)->nodeValue+1;
if(isset($_POST['sbm'])){
    $prd_name = $_POST['prd_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $new_prd = $dom->createElement('product');

    $node_id = $dom->createElement('id',$id);
    $new_prd->appendChild($node_id);

    $node_name = $dom->createElement('name',$prd_name);
    $new_prd->appendChild($node_name);

    $node_price = $dom->createElement('price',$price);
    $new_prd->appendChild($node_price);

    $node_description = $dom->createElement('description',$description);
    $new_prd->appendChild($node_description);

    $products->appendChild($new_prd);

    $dom->formatOutput=true;
    $dom->save('data.xml')or die('Error');
    header('location: index.php?page_layout=list');
}
?>
<style>
    .container-fuild {
        text-align: center;
        font-family: "DejaVu Sans Mono", monospace;
    }

    table {
        margin: auto;
        border-collapse: collapse;
        border: 3px solid black;
    }

</style>

<div class="container-fuild">
    <div class="card">
        <div class="card-header">
            <h2>Add products</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="prd_name" class="form-control" required></td>
                        <td><input type="number" name="price" class="form-control" required></td>
                        <td><input type="text" name="description" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td colspan="3"><button name="sbm" class="btn btn-success" type="submit">Add</button></td>
                    </tr>
                </table>

            </form>
        </div>
    </div>
</div>
