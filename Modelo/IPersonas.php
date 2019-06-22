<?php

interface IPersonas {
    public function guardarCliente();
    public function guardarUsuario();
    public function actualizarCliente();
    public function actualizarUsuario();
    public function mostrarCliente();
    public function mostrarUsuario();
    public function eliminarCliente();
    public function eliminarUsuario();
    public function getOrden();
}
