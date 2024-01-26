<div class="container card mt-2  ">
    <div class="row">
        <div class="col-12 text-center  ">
            <h2>Resumen de pedidos</h2>
        </div>
    </div>
    <div class="row mt-3 border-bottom border-black  ">
        <div class="col-2 text-center  ">
            <h5>Id</h5>
        </div>
        <div class="col-2 text-center  ">
            <h5>Fecha</h5>
        </div>
        <div class="col-2 text-center  ">
            <h5>Producto</h5>
        </div>
        <div class="col-2 text-center  ">
            <h5>Cantidad</h5>
        </div>
        <div class="col-2 text-center  ">
            <h5>Precio</h5>
        </div>
        <div class="col-2 text-center  ">
            <h5>Factura</h5>
        </div>

    </div>
    <?php
    foreach ($pedidos as $key => $value) {
        $producto = getProducto($value['cod_producto']);
        echo '
                   <div class="row mt-3 border-bottom border-black">
                    <div class="col-2 text-center  ">
                        <h5>' . $value['Id'] . '</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>' . $value['fecha'] . '</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>';
        echo $producto['titulo'];
        echo '</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>' . $value['cantidad'] . '</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>' . $value['total'] . '</h5>
                    </div>
                    <div class="col-2 text-center  ">
                    <form action="" method="post">
                    <button name="factura" class="btn btn-warning mb-2">Factura</button>
                    <input type="hidden" name="id" value="' . $value['Id'] . '">
                    </form>
                    </div>

                </div>
                   ';
    }
    ?>
    <script>
        let total = document.getElementById('total');
        let precio = <?php echo $producto['precio'] ?>;
        let cantidad = document.getElementById('cantidad');
        let suma = document.getElementById('suma');
        let iva = document.getElementById('iva');
        iva.innerHTML = ((precio * cantidad.value) * 0.21).toFixed(2);
        total.innerHTML = precio.toFixed(2);
        cantidad.addEventListener('change', () => {
            total.innerHTML = ((precio * cantidad.value)).toFixed(2);
            suma.innerHTML = ((precio * cantidad.value)).toFixed(2);
            iva.innerHTML = ((precio * cantidad.value) * 0.21).toFixed(2);
        });
    </script>