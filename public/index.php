<?php

ini_set('display_errors', 'on');
require_once dirname(__FILE__) . '/../repositories/ListeDeCourses.php';

$products = ListeDeCourses::getProducts();
?>

<h1>Insert</h1>
<form action="./product-add.php" method="post">
    <label for="label">Enter your label Product: </label>
    <input type="text" name="label" id="label" required autofocus>
    <input type="submit" value="Insert!">
</form>
<table>
    <?php
    foreach ($products as $product) {
        echo '<tr>';
        $product->view();
        echo '</tr>';
    }
    ?>
</table>