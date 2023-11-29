<div class="card w-75 mt-5 mx-auto">
	<div class="card-body text-white text-center bg-dark">
		<table class="table table-dark">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Producto</th>
					<th scope="col">Precio Unidad</th>
					<th scope="col">Cantidad Stock</th>
					<th scope="col">Stock minimo</th>
					<th scope="col">Valor total</th>
					<th scope="col">Ventas</th>
					<th scope="col">Compras</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (isset($articulos)){
					$total_articulos = 0;
					foreach($articulos as $articulo){
						$total_articulos += ($articulo["cantidad"]*$articulo["precio_unidad"]);
						?>
						<tr>
							<th scope="row"><?php echo($articulo["ID"])?></th>
							<td><?php echo($articulo["nombre"])?></td>
							<td>$ <?php echo($articulo["precio_unidad"])?></td>
							<td><?php echo($articulo["cantidad"])?></td>
							<td><?php echo($articulo["min_cantidad"])?></td>
							<td>$ <?php echo($articulo["cantidad"]*$articulo["precio_unidad"])?></td>
							<td>
								<form method="post" class="form-inline d-flex justify-content-center" action="<?php echo site_url("articulos/vender/{$articulo['ID']}"); ?>">
									<input type="text" style="display:none;" name="cantidad" value="<?php echo $articulo["cantidad"];?>">
									<input class="form-control me-4 w-50" type="text" name="cant_venta" oninput="validateInput(this, <?php echo $articulo['cantidad']; ?>)">
									<button type="submit" class="btn btn-warning"><i class="bi bi-shop"> Vender</i></button>
								</form>
							</td>
							<td>
									<?php
									if($articulo["cantidad"]>$articulo["min_cantidad"]){
										echo'<button class="btn btn-success disabled" style="cursor:default;"><i class="bi bi-check-lg">OK</i></button>';
									}else{
										?>
										<form method="post" class="form-inline d-flex justify-content-center" action="<?php echo site_url("articulos/comprar/{$articulo['ID']}"); ?>">
											<input type="text" style="display:none;" name="cantidad" value="<?php echo $articulo["cantidad"];?>">
										<?php
											echo '<button type="submit"class="btn btn-info"><i class="bi bi-bag-fill"> Comprar</i></button>';
										?>
										</form>
										<?php
									}
									?>
							</td>
						</tr>
						<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="card-footer text-center">
		<h3>Valor total de mercaderia: $ <?php echo($total_articulos);?></h3>
	</div>
</div>

<script>
function validateInput(inputElement, availableQuantity) {
    const enteredQuantity = parseInt(inputElement.value);
    if (isNaN(enteredQuantity) || enteredQuantity < 0 || enteredQuantity > availableQuantity) {
        if (inputElement.value.trim() !== '') {
            alert('Error: La cantidad ingresada no es válida.');
        }
        inputElement.value = '';
    }
}
</script>


