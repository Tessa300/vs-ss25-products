<h1><? echo $product['name']?></h1>

<br>
<br>


<form method="POST" action="<? echo site_url('products/update/'.$product['product_type_id']) ?>" >

    name: <input type="text" name="name" value="<? echo $product['name']?>">
    <br>
    preis: <input type="text" name="price_per_unit" value="<? echo $product['price_per_unit'] ?>">
    <? echo isset($errors['price_per_unit']) ? $errors['price_per_unit'] : '' ?>

    <button type="submit">LOS</button>

</form>


<?php if(isset($product)) : ?>
<h3>Zutaten</h3>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Zutat</th>
        <th scope="col">Anzahl</th>
    </tr>
    </thead>
    <tbody>
    <? if(isset($product_ingredients)) : foreach($product_ingredients as $product_ingredient): ?>
        <tr id="pro_ingr_<?= $product_ingredient['product_type_id_sub'] ?>">
            <form action="<?=site_url('products/updateingredient/'.$product['product_type_id'])?>" method="POST">
            <th scope="row">
                <input type="hidden" name="product_type_id_sub" value="<?= $product_ingredient['product_type_id_sub'] ?>" disabled>
                <?= $product_ingredient['name'] ?>
            </th>
            <td>
                <input type="number" class="form-control d-inline" style="width: 90%" name="amount" step="0.1" min="0.1" value="<?= $product_ingredient['amount'] ?>" disabled><?= $product_ingredient['unit_symbol'] ?>
            </td>
            <td>
                <button class="btn" type="button" onclick="enableForm('pro_ingr_<?= $product_ingredient['product_type_id_sub'] ?>')">Bearbeiten</button>
                <button class="btn" type="submit" disabled>Speichern</button>
            </td>
            </form>
        </tr>
    <? endforeach; endif; ?>
    </tbody>
</table>

<?php endif; ?>




<script>
    <? if(isset($product)): ?>
    enableForm('product_form');

    function enableForm(parentEle_id) {
        var parentEle = document.getElementById(parentEle_id);
        parentEle.querySelectorAll('input, select, button[type=submit], a').forEach((ele) => {
            ele.disabled = !ele.disabled;
        });
        parentEle.querySelectorAll("button[type=button]").forEach((ele) => {
            if(ele.innerHTML == "Bearbeiten") {
                ele.innerHTML = "Abbrechen";
            }else {
                ele.innerHTML = "Bearbeiten";
                parentEle.reset();
            }
        });

    }
    <? endif; ?>
</script>
