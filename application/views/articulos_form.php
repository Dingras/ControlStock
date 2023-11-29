<div class="card w-75 mt-5 mx-auto">
	<div class="card-body text-white bg-dark">
        <form method="post" action=<?php echo site_url('articulos/guardar')?>>
            <div class="row">
                <div class="col-2">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre producto">
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" name="precio_unidad" placeholder="Precio unitario">
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="cantidad" placeholder="Cantidad en stock">
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="min_cantidad" placeholder="Cantidad minima en stock para aviso">
                </div>
                <span class="col">
                    <button class="btn btn-success" type="submit">Cargar</button>
                </span>
            </div>
        </form>
    </div>
</div>