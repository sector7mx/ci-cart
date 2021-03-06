<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Shop</title>
	<style type="text/css">
		body {
			font: 13px; Arial;
		}
		#products {
			text-align: center; float: left;			
		}
		#products ul {
			list-style: none; margin: 0px;
		}
		#products li {
			width: 150px; padding: 4px; margin: 8px;
			border: 1px solid #ddd; background-color: #eee;
			-moz-border-radius; 4px; -webkit-border-radius: 4px;
		}
		#products .name {
			font-size: 15px; margin: 5px;
		}
		#products .price {
			margin: 5px;
		}
		#products .option {
			margin: 5px;
		}
		#products .trumb {
			width: 25%;
			height: 25%;
		}
		#cart {
			padding: 4px; margin: 8px; float: left;
			border: 1px solid #ddd; background-color: #eee;
			-moz-border-radius; 4px; -webkit-border-radius: 4px;
		}
		#cart table {
			width: 320; border-collapse: collapse;
			text-align: left;
		}
		#cart th {
			border-bottom:  1px solid #aaa;
		}
		#cart caption {
			font-size: 15px; height: 30px; text-align: left;
		}
		#cart .total {
			height: 40px;
		}
		#cart .remove a {
			color: red;
		}


	</style>
</head>
<body>

<div id="products">
<ul>
	<?php foreach ($products as $product): ?>
	<li>
		<?php echo form_open('shop/add'); ?>
		<div class="name"><?php echo $product->name; ?></div>
		<div class="thumb">
			<?php echo img(array(
				'src' => 'images/' . $product->image,
				'class' => 'trumb',
				'alt' => $product->name
			)); ?>
		</div>
		<div class="price">$<?php echo $product->price; ?></div>
		<div class="option">
			<?php if ($product->option_name):?>
				<?php echo form_label($product->option_name,'option_'.$product->id);?>
				<?php echo form_dropdown(
					$product->option_name,
					$product->option_values,
					NULL,
					'id="option_'. $product->id .' " '
				);?>				
			<?php endif;?>
		</div>

		<?php echo form_hidden('id',$product->id);?>
		<?php $data = array(
              'name'        => 'apartame',
              'id'          => 'apartame',
              'value'       => '',
              'maxlength'   => '5',
              'size'        => '10',
              'style'       => 'width:50%',
            );
            echo form_input($data);?>
		<?php echo form_submit('action','Apartame Ya!'); ?>
		<?php echo form_close(); ?>
	</li>
	<?php endforeach; ?>
</ul>
</div>

<?php if ($cart = $this->cart->contents()): ?>
<div id="cart">

	<table>
		<caption>Carrito Apartame</caption>
		<thead>
			<tr>
				<th>Item</th>
				<th>Opción</th>
				<th>Precio</th>
				<th>Apartame</th>
			</tr>
		</thead>


		<?php foreach ($cart as $item) : ?>
			<tr>
				<td><?php echo $item['name'];?></td>
				<td>
					<?php if ($this->cart->has_options($item['rowid'])) {

						foreach ($this->cart->product_options($item['rowid']) as $option => $value) {
							echo $option . ": <em>" . $value . "</em>";
						}
					}?>					

				</td>
				<td>$<?php echo $item['subtotal']; ?></td>
				<td>$0000.00</td>
				<td class="remove">
					<?php echo anchor('shop/remove/'.$item['rowid'],'X'); ?>
				</td>
				
			</tr>
		<?php endforeach; ?>
			<tr class="total">
				<td colspan="2"><strong>Total</strong></td>
				<td>$<?php echo $this->cart->total(); ?></td>
			</tr>
	</table>
	

	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Confirmar Orden Apartame!
</button>




</div>
<?php endif; ?>


<div>
	<h2>Datos Cliente</h2>
	<form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nombre completo</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Calle">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Telefono de Contacto</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Colonia">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Guardar Datos</button>
    </div>
  </div>
</form>
</div>



<div>
	<h2>Datos de Envio</h2>
	<form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Calle</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Calle">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Colonia</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Colonia">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">C.P.</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="C.P.">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Estado</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Estado">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Activar
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Guardar Datos de Envio</button>
    </div>
  </div>
</form>
</div>


</body>
</html>