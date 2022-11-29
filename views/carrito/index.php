<h1>Carrito de compras</h1>

<?php   if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1 ):?>
<table>
    <tr>
        <th></th>
        <th>Articulo</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th></th>
    </tr>
    <?php 
  
        foreach($carrito as $indice =>  $elemento) :
        $producto = $elemento['producto'];
    ?>
    <tr>
        <td>
            <?php if ($producto->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito" alt="Camiseta">
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" alt="Camiseta">
            <?php endif; ?>
        </td>
        <td>
            <a href="<?= base_url ?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
        </td>
        <td><?=$producto->precio?></td>
        <td>
            <?=$elemento['unidades']?>
            <div class="updown-unidades">
                <a href="<?= base_url ?>carrito/up&index=<?=$indice?>" class="button">+</a>
                <a href="<?= base_url ?>carrito/down&index=<?=$indice?>" class="button">-</a>
            </div>
        </td>
        <td>
            <a href="<?= base_url ?>carrito/delete&index=<?=$indice?>" class="button button-carrito button-red">Quitar Producto</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<br/>

<div class="delete-carrito">
<a href="<?= base_url ?>carrito/delete_all" class="button button-delete button-red">Vacíar Carrito</a>
</div>
<div class="total-carrito">
    <?php $stats = Utils::statsCarrito(); ?>
    <h3>Total: <?=$stats['total']?> L</h3>
    <a href="<?= base_url ?>pedido/hacer" class="button button-pedido">Hacer Pedido</a>
</div>
<?php else: ?>
<p>El carrito está vacío, añade algún producto</p>
<?php endif; ?>