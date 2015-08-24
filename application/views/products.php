<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Shop</title>
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
		<?php echo form_submit('action','Add to Cart'); ?>
		<?php echo form_close(); ?>
	</li>
	<?php endforeach; ?>
</ul>

</div>

<div id="cart">


</div>



</body>
</html>