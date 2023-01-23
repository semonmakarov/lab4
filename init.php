<?php
$products = array(
        array(
            'id'=>1,
            'name'=> 'Молочный улун',
            'price'=>  500,
            'description'=>'Ароматный китайский чай, наполняющий энергией'
        ),
        array(
            'id'=>2,
            'name'=> 'Зеленый с жасмином',
            'price'=>  600,
            'description'=>'Терпкий приятный насыщенный вкус листового чая с нотками жасмина'
        ),
        array(
            'id'=>3,
            'name'=> 'Пуэр',
            'price'=>  666,
            'description'=>'Древнейший чай, выращиваемый по древней технологии'
        ),
    );
$xml =new DOMDocument('1.0','UTF-8');

$root = $xml->createElement('products');
$xml->appendChild($root);

foreach ($products as $value ){
    $product = $xml->createElement('product');
    foreach ($value as $key=>$value){
        $node = $xml->createElement($key,$value);
        $product->appendChild($node);
    }
    $root->appendChild($product);

}
$xml->formatOutput = true;
$xml->save('data.xml')or die('Error');
