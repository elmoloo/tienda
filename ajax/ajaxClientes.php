<?php
require_once "../controladores/ctrlClientes.php";
require_once "../modelos/mdlClientes.php";

class ajaxClientes{
   public $idClientes;
   public function CargarDatos(){
    $tabla="cliente";
    $parametro="cliemte";
    $id =$this->idClientes;
    $datos = ControladorClientes::ctrlCargarClientes($tabla,$parametro,$id);
    echo json_decode($datos);
   }

}

if(isset ($_POST['idClientes'])){
    $objAjaxClientes = new ajaxClientes();
    $objAjaxClientes->idClientes = $_POST['idClientes'];
    if($_POST['edit']== 'edit'){
        $objAjaxClientes->CargarDatos();
    } else{
        #$objAjaxClientes->eliminarDatos();
    }

}