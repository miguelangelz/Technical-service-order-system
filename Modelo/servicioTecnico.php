<?php

require_once("Database.php");
require_once("ISerTec.php");

class ServicioTecnico implements ISerTec {

    private $con;
    /* variables de la cabezera */
    private $id;
    private $idCliente;
    private $idEquipoCliente;
    private $numero;
    private $cliente;
    private $cedula;
    private $correo;
    private $direccion;
    private $telefono;
    private $celular;
    private $fecha;
    private $idTecnico;
    private $tecnico;
    private $total;
    private $articulo;
    private $defecto;
    private $diagnostico;
    private $estado;
    private $marca;
    private $modelo;
    private $numero_serie;
    private $observacion;
    private $tipo;
    private $subtotal;
    private $iva;
    private $garantia;
    private $software;
    private $marcaAda;
    private $capaAda;
    private $serieAda;
    private $marcaBat;
    private $capaBat;
    private $serieBat;
    private $marcaDis;
    private $capaDis;
    private $serieDis;
    private $marcaMem;
    private $capaMem;
    private $serieMem;
    private $equipo;
    private $accesorio;
    private $trabajado;
    private $reparado;
    private $repuestos;
    /* garantia */
    private $lugar;
    private $numeroFactura;
    private $serieCargador;
    private $vendedor;
    private $transportista;
    private $proveedor;
    private $facturaEmpresa;
    private $numeroGuia;

    public function __construct(Database $db) {
        $this->con = new $db;
    }

    /* funciones publicas de la cabezera */

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setIdEquipoCliente($idEquipoCliente) {
        $this->idEquipoCliente = $idEquipoCliente;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setLugar($lugar) {
        $this->lugar = $lugar;
    }

    public function setNumeroFactura($numeroFactura) {
        $this->numeroFactura = $numeroFactura;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setIdTecnico($idTecnico) {
        $this->idTecnico = $idTecnico;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setTecnico($tecnico) {
        $this->tecnico = $tecnico;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    /* funciones publicas del detalle */

    public function setArticulo($articulo) {
        $this->articulo = $articulo;
    }

    public function setDefecto($defecto) {
        $this->defecto = $defecto;
    }

    public function setDiagnostico($diagnostico) {
        $this->diagnostico = $diagnostico;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setNumeroSerie($numero_serie) {
        $this->numero_serie = $numero_serie;
    }

    public function setSerieCargador($serieCargador) {
        $this->serieCargador = $serieCargador;
    }

    public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    public function setIva($iva) {
        $this->iva = $iva;
    }

    public function setGarantia($garantia) {
        $this->garantia = $garantia;
    }

    public function setSoftware($software) {
        $this->software = $software;
    }

    public function setMarcaAda($marcaAda) {
        $this->marcaAda = $marcaAda;
    }

    public function setCapaAda($capaAda) {
        $this->capaAda = $capaAda;
    }

    public function setSerieAda($serieAda) {
        $this->serieAda = $serieAda;
    }

    public function setMarcaBat($marcaBat) {
        $this->marcaBat = $marcaBat;
    }

    public function setCapaBat($capaBat) {
        $this->capaBat = $capaBat;
    }

    public function setSerieBat($serieBat) {
        $this->serieBat = $serieBat;
    }

    public function setMarcaDis($marcaDis) {
        $this->marcaDis = $marcaDis;
    }

    public function setCapaDis($capaDis) {
        $this->capaDis = $capaDis;
    }

    public function setSerieDis($serieDis) {
        $this->serieDis = $serieDis;
    }

    public function setMarcaMem($marcaMem) {
        $this->marcaMem = $marcaMem;
    }

    public function setCapaMem($capaMem) {
        $this->capaMem = $capaMem;
    }

    public function setSerieMem($serieMem) {
        $this->serieMem = $serieMem;
    }

    public function setAccesorio($accesorio) {
        $this->accesorio = $accesorio;
    }

    public function setTrabajado($trabajado) {
        $this->trabajado = $trabajado;
    }

    public function setReparado($reparado) {
        $this->reparado = $reparado;
    }

    public function setRepuestos($repuestos) {
        $this->repuestos = $repuestos;
    }

    public function setEquipo($equipo) {
        $this->equipo = $equipo;
    }

    public function setVendedor($vendedor) {
        $this->vendedor = $vendedor;
    }

    public function setTransportista($transportista) {
        $this->transportista = $transportista;
    }

    public function setProveedor($proveedor) {
        $this->proveedor = $proveedor;
    }

    public function setFacturaEmpresa($facturaEmpresa) {
        $this->facturaEmpresa = $facturaEmpresa;
    }

    public function setNumeroGuia($numeroGuia) {
        $this->numeroGuia = $numeroGuia;
    }

    public function guardarOrdenLocal() {

        try {
            $query = $this->con->prepare(' INSERT INTO orden_local (cli_id,orl_numero,orl_cliente,orl_direccion,orl_telefono,orl_celular,orl_fecha_entrega,usu_id,orl_total,orl_articulo, orl_defecto, orl_diagnostico,orl_marca,orl_modelo,orl_numero_Serie,orl_observacion,orl_tipo,orl_subtotal,orl_iva,orl_garantia,orl_software,orl_adam,orl_adac,orl_adas,orl_batm,orl_batc,orl_bats,orl_dism,orl_disc,orl_diss,orl_memm,orl_memc,orl_mems,orl_accesorios,orl_trabajado,orl_reparado,orl_repuestos) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $query->bindParam(1, $this->idCliente, PDO::PARAM_STR);
            $query->bindParam(2, $this->numero, PDO::PARAM_STR);
            $query->bindParam(3, $this->cliente, PDO::PARAM_STR);
            $query->bindParam(4, $this->direccion, PDO::PARAM_STR);
            $query->bindParam(5, $this->telefono, PDO::PARAM_STR);
            $query->bindParam(6, $this->celular, PDO::PARAM_STR);
            $query->bindParam(7, $this->fecha, PDO::PARAM_STR);
            $query->bindParam(8, $this->idTecnico, PDO::PARAM_INT);
            $query->bindParam(9, $this->total, PDO::PARAM_INT);
            $query->bindParam(10, $this->articulo, PDO::PARAM_STR);
            $query->bindParam(11, $this->defecto, PDO::PARAM_STR);
            $query->bindParam(12, $this->diagnostico, PDO::PARAM_STR);
            $query->bindParam(13, $this->marca, PDO::PARAM_STR);
            $query->bindParam(14, $this->modelo, PDO::PARAM_STR);
            $query->bindParam(15, $this->numero_serie, PDO::PARAM_STR);
            $query->bindParam(16, $this->observacion, PDO::PARAM_STR);
            $query->bindParam(17, $this->tipo, PDO::PARAM_STR);
            $query->bindParam(18, $this->subtotal, PDO::PARAM_INT);
            $query->bindParam(19, $this->iva, PDO::PARAM_INT);
            $query->bindParam(20, $this->garantia, PDO::PARAM_STR);
            $query->bindParam(21, $this->software, PDO::PARAM_STR);
            $query->bindParam(22, $this->marcaAda, PDO::PARAM_STR);
            $query->bindParam(23, $this->capaAda, PDO::PARAM_STR);
            $query->bindParam(24, $this->serieAda, PDO::PARAM_STR);
            $query->bindParam(25, $this->marcaBat, PDO::PARAM_STR);
            $query->bindParam(26, $this->capaBat, PDO::PARAM_STR);
            $query->bindParam(27, $this->serieBat, PDO::PARAM_STR);
            $query->bindParam(28, $this->marcaDis, PDO::PARAM_STR);
            $query->bindParam(29, $this->capaDis, PDO::PARAM_STR);
            $query->bindParam(30, $this->serieDis, PDO::PARAM_STR);
            $query->bindParam(31, $this->marcaMem, PDO::PARAM_STR);
            $query->bindParam(32, $this->capaMem, PDO::PARAM_STR);
            $query->bindParam(33, $this->serieMem, PDO::PARAM_STR);
            $query->bindParam(34, $this->accesorio, PDO::PARAM_STR);
            $query->bindParam(35, $this->trabajado, PDO::PARAM_STR);
            $query->bindParam(36, $this->reparado, PDO::PARAM_STR);
            $query->bindParam(37, $this->repuestos, PDO::PARAM_STR);
            $query->execute();

            $query1 = $this->con->prepare(' INSERT INTO equipo_cliente (cli_id,ecl_marca,ecl_modelo,ecl_numero_serie) VALUES (?,?,?,?)');
            $query1->bindParam(1, $this->idCliente, PDO::PARAM_INT);
            $query1->bindParam(2, $this->marca, PDO::PARAM_STR);
            $query1->bindParam(3, $this->modelo, PDO::PARAM_STR);
            $query1->bindParam(4, $this->numero_serie, PDO::PARAM_STR);
            $query1->execute();

            $this->con->close();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function guardarOrdenGarantia() {

        try {
            $query = $this->con->prepare(' INSERT INTO orden_garantia (cli_id,usu_id,org_numero,org_lugar,org_num_factura,org_cedula,org_cliente,org_direccion,org_telefono,org_celular,org_mail,org_equipo,org_marca,org_serie_equipo,org_serie_cargador,org_danio,org_observaciones,org_dism,org_disc,org_diss,org_batm,org_batc,org_bats,org_memm,org_memc,org_mems,org_adam,org_adac,org_adas,org_otros,org_diagnostico,org_vendedor,org_garantia,org_transportista,org_proveedor,org_fac_empresa,org_numero_guia) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $query->bindParam(1, $this->idCliente, PDO::PARAM_INT);
            $query->bindParam(2, $this->idTecnico, PDO::PARAM_INT);
            $query->bindParam(3, $this->numero, PDO::PARAM_STR);
            $query->bindParam(4, $this->lugar, PDO::PARAM_STR);
            $query->bindParam(5, $this->numeroFactura, PDO::PARAM_STR);
            $query->bindParam(6, $this->cedula, PDO::PARAM_STR);
            $query->bindParam(7, $this->cliente, PDO::PARAM_STR);
            $query->bindParam(8, $this->direccion, PDO::PARAM_STR);
            $query->bindParam(9, $this->telefono, PDO::PARAM_INT);
            $query->bindParam(10, $this->celular, PDO::PARAM_STR);
            $query->bindParam(11, $this->correo, PDO::PARAM_STR);
            $query->bindParam(12, $this->equipo, PDO::PARAM_STR);
            $query->bindParam(13, $this->marca, PDO::PARAM_STR);
            $query->bindParam(14, $this->numero_serie, PDO::PARAM_STR);
            $query->bindParam(15, $this->serieCargador, PDO::PARAM_STR);
            $query->bindParam(16, $this->defecto, PDO::PARAM_STR);
            $query->bindParam(17, $this->observacion, PDO::PARAM_STR);
            $query->bindParam(18, $this->marcaDis, PDO::PARAM_STR);
            $query->bindParam(19, $this->capaDis, PDO::PARAM_STR);
            $query->bindParam(20, $this->serieDis, PDO::PARAM_STR);
            $query->bindParam(21, $this->marcaBat, PDO::PARAM_STR);
            $query->bindParam(22, $this->capaBat, PDO::PARAM_STR);
            $query->bindParam(23, $this->serieBat, PDO::PARAM_STR);
            $query->bindParam(24, $this->marcaMem, PDO::PARAM_STR);
            $query->bindParam(25, $this->capaMem, PDO::PARAM_STR);
            $query->bindParam(26, $this->serieMem, PDO::PARAM_STR);
            $query->bindParam(27, $this->marcaAda, PDO::PARAM_STR);
            $query->bindParam(28, $this->capaAda, PDO::PARAM_STR);
            $query->bindParam(29, $this->serieAda, PDO::PARAM_STR);
            $query->bindParam(30, $this->articulo, PDO::PARAM_STR);
            $query->bindParam(31, $this->diagnostico, PDO::PARAM_STR);
            $query->bindParam(32, $this->vendedor, PDO::PARAM_STR);
            $query->bindParam(33, $this->garantia, PDO::PARAM_STR);
            $query->bindParam(34, $this->transportista, PDO::PARAM_STR);
            $query->bindParam(35, $this->proveedor, PDO::PARAM_STR);
            $query->bindParam(36, $this->facturaEmpresa, PDO::PARAM_STR);
            $query->bindParam(37, $this->numeroGuia, PDO::PARAM_STR);
            $query->execute();

            $this->con->close();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function guardarOrdenDomicilio() {


        try {
            $query = $this->con->prepare(' INSERT INTO orden_domicilio (cli_id,'
                    . 'usu_id,ord_numero,ord_cliente,ord_tecnico,ord_direccion,ord_telefono,'
                    . 'ord_defecto,ord_total,ord_subtotal) '
                    . 'VALUES (?,?,?,?,?,?,?,?,?,?)');
            $query->bindParam(1, $this->idCliente, PDO::PARAM_INT);
            $query->bindParam(2, $this->idTecnico, PDO::PARAM_INT);
            $query->bindParam(3, $this->numero, PDO::PARAM_STR);
            $query->bindParam(4, $this->cliente, PDO::PARAM_STR);
            $query->bindParam(5, $this->tecnico, PDO::PARAM_STR);
            $query->bindParam(6, $this->direccion, PDO::PARAM_STR);
            $query->bindParam(7, $this->telefono, PDO::PARAM_INT);
            $query->bindParam(8, $this->defecto, PDO::PARAM_STR);
            $query->bindParam(9, $this->total, PDO::PARAM_INT);
            $query->bindParam(10, $this->subtotal, PDO::PARAM_INT);

            $query->execute();
            $this->con->close();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function guardaEquipo() {

        try {
            $query2 = $this->con->prepare(' INSERT INTO equipo (equ_nombre) VALUES (?)');
            $query2->bindParam(1, $this->equipo, PDO::PARAM_STR);
            $query2->execute();
            $this->con->close();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getEquipo() {
        try {
            if (is_int($this->idEquipoCliente)) {
                $query = $this->con->prepare('SELECT * FROM equipo WHERE equ_id = ?');
                $query->bindParam(1, $this->idEquipoCliente, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetch(PDO::FETCH_OBJ);
            } else {
                $query = $this->con->prepare('SELECT * FROM equipo');
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function get() {
        try {
            if (is_int($this->id)) {
                $query = $this->con->prepare('SELECT * FROM orden_local WHERE orl_id = ? ORDER BY orl_fecha DESC');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetch(PDO::FETCH_OBJ);
            } else {
                $query = $this->con->prepare('SELECT * FROM orden_local ORDER BY orl_fecha DESC');
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getOrden() {
        try {
            if (is_int($this->idTecnico)) {
                $query = $this->con->prepare('SELECT * FROM orden_local WHERE usu_id = ?');
                $query->bindParam(1, $this->idTecnico, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetch(PDO::FETCH_OBJ);
            } else {
                $query = $this->con->prepare('SELECT * FROM orden_local');
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update() {

        try {
            $query = $this->con->prepare('UPDATE orden_local SET orl_estado = ?,
                orl_observacion = ?,
                orl_subtotal = ?,
                orl_total = ?  WHERE orl_id = ? ');
            $query->bindParam(1, $this->estado, PDO::PARAM_STR);
            $query->bindParam(2, $this->observacion, PDO::PARAM_STR);
            $query->bindParam(3, $this->subtotal, PDO::PARAM_STR);
            $query->bindParam(4, $this->total, PDO::PARAM_STR);
            $query->bindParam(5, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateEstado() {

        try {
            $query = $this->con->prepare('UPDATE orden_local SET orl_estado = ?,
                    orl_trabajado = ?,
                    orl_reparado = ?,
                    orl_repuestos = ? WHERE orl_id = ? ');
            $query->bindParam(1, $this->estado, PDO::PARAM_STR);
            $query->bindParam(2, $this->trabajado, PDO::PARAM_STR);
            $query->bindParam(3, $this->reparado, PDO::PARAM_STR);
            $query->bindParam(4, $this->repuestos, PDO::PARAM_STR);
            $query->bindParam(5, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function baseurl() {
        return stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/STO/";
    }

    public function checkUser($ordenes) {
        if (!$ordenes) {
            header("Location:" . ServicioTecnico::baseurl() . "Vista/listaOrdenLocal.php");
        }
    }

}
