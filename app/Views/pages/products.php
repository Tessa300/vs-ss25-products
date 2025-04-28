<h1>Hallo Test</h1>

<?php echo $info; ?>


<table>

<? foreach($products as $product): ?> 

<tr>
    <td>Hii ...</td>
    <td><? echo $product['name'] ?></td>
</tr>

<? endforeach; ?>

</table>