<?php
session_start();
if (isset($_POST["orden_id"])) {
    require_once "../../Modelo/Database.php";
    $db = new Database;
    $link = new Database;
    $query = $link->query("SELECT * FROM orden_local WHERE orl_id = '" . $_POST["orden_id"] . "'");
    ?>
    <form action="../../Controlador/Ordenes/updateOrdenLocalU.php" method="POST" name="submit">
        <fieldset>
            <div class="form-group">

                <label>Estado del equipo</label>
                <select class="form-control" name="estado">
                    <?php
                    foreach ($query as $row) {
                        if ($row['orl_estado'] == "POR ENTREGAR") {
                            ?>
                            <option value="<?php echo $row['orl_estado'] ?>"><?php echo $row['orl_estado'] ?></option>
                            <option value="SIN REPARO">SIN REPARO</option>
                            <option value="ENTREGADO">ENTREGADO</option>
                        <?php } else if ($row['orl_estado'] == "PENDIENTE") { ?>
                            <option value="<?php echo $row['orl_estado'] ?>"><?php echo $row['orl_estado'] ?></option>
                            <option value="SIN REPARO">SIN REPARO</option>
                            <option value="ENTREGADO">ENTREGADO</option>
                        <?php }
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label>TRABAJO REALIZADO</label>
                <input class="form-control" name="trabajado" style='text-transform:uppercase' type="text">
            </div>
            <div class="form-group">
                <label>REPARADO</label>
                <input class="form-control" name="reparado" style='text-transform:uppercase' type="text">
            </div>
            <div class="form-group">
                <label>REPUESTOS UTILIZADOS</label>
                <input class="form-control" name="repuestos" style='text-transform:uppercase' type="text">
            </div>
            <input type="hidden" name="id" value="<?php echo $row['orl_id'] ?>" />
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar Cliente">
            </div>
        </fieldset>
    </form>
<?php
} 