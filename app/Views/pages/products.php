<div class="row">
    <h2 class="col-auto">Alle Produkte </h2>
    <a class="btn col-auto" href="<?=site_url('products/new')?>">+</a>
</div>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Preis</th>
        <th scope="col">Typ</th>
        <th scope="col">Zutaten</th>
        <th scope="col">Vorrat</th>
        <th scope="col">Aktionen</th>
    </tr>
    </thead>
    <tbody>
    <? foreach($products as $product): ?>
        <tr>
            <th scope="row"><?= $product['product_type_id'] ?></th>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price_per_unit'] ?>€/<?= $product['unit_symbol'] ?></td>
            <td><?= $product['is_meal'] ? 'Gericht' : 'Zutat' ?></td>
            <td><?= (isset($product['ingredients'])) ? $product['ingredients'] : "" ?></td>
            <td><?= (isset($product['in_stock'])) ? $product['in_stock'].$product['unit_symbol'] : "" ?></td>
            <td>
                <a class="btn" href="<?=site_url('products/'.$product['product_type_id'])?>">Anzeigen</a>
            </td>
        </tr>
    <? endforeach ?>
    </tbody>
</table>
