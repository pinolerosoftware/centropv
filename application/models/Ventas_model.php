<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {

    public function __construct(){
		parent::__construct();
		$this->load->database();
        $this->load->model('productos_model');
	}
    //insertamos venta normal
    public function insertVenta($listaProducto, $companyID, $userCompanyID, $datosIva){
            $total = 0;
            $subTotal = 0;
            $iva = 0;
            $dataSalesDetails = array();
            //echo print_r($listaProducto);
            foreach($listaProducto as $fila) {
                $datosProductos = $this->productos_model->getSingleProduct($fila["ProductID"], $companyID);
                $datosProductos = $datosProductos[0];
                $subTotal = $subTotal + $datosProductos->precio * $fila["cantidad"];
                if($datosProductos->taxFree == "1"){
                    $iva = $iva + ($datosProductos->precio * $fila["cantidad"] * ($datosIva->porcentaje/100));
                    $total = $total + ($datosProductos->precio * $fila["cantidad"]) + ($datosProductos->precio * $fila["cantidad"] * ($datosIva->porcentaje/100));
                }else{
                    $total = $total + ($datosProductos->precio * $fila["cantidad"]);
                }
                $dataSalesDetails[] = array(
                    'saleID' => 0,
                    'companyID' => $companyID,
                    'productID' => $fila["ProductID"],
                    'precio' => $datosProductos->precio,
                    'cantidad'=> $fila["cantidad"],
                    'iva' => ($datosProductos->taxFree == "1")?$datosProductos->precio * $fila["cantidad"] * ($datosIva->porcentaje/100):0.00
                );
            }
            $fecha = getdate();
            $fechaNow = $fecha["year"] . '-' . (($fecha["mon"] < 10)?"0".$fecha["mon"]:$fecha["mon"]) . '-' . (($fecha["mday"] < 10)?"0".$fecha["mday"]:$fecha["mday"]) . ' ' . (($fecha["hours"] < 10) ? "0". $fecha["hours"] : $fecha["hours"]) . ':' . (($fecha["minutes"] < 10) ? "0".$fecha["minutes"] : $fecha["minutes"]) . ':' . (($fecha["seconds"] < 10) ? "0".$fecha["seconds"] : $fecha["seconds"]);
            $dataSales = array(
                'companyID' => $companyID,
                'usercompanyID' => $userCompanyID,
                'fecha' => $fechaNow,
                'subtotal' => $subTotal,
                'iva' => $iva,
                'total' => $total,
                'cancelada' => 1,
                'contado' => 1
            );
            $this->db->trans_start();
            $this->db->insert('sales', $dataSales);
            $id = $this->db->insert_id();
            for($i = 0; $i < sizeof($dataSalesDetails); $i++){
                $dataSalesDetails[$i]["saleID"] = $id;
            }
            $this->db->insert_batch('salesdetails', $dataSalesDetails);
            $this->db->trans_complete();
            return $id;
    }

    //insertamos venta al credito
    public function insertVentaCredito($listaProducto, $companyID, $userCompanyID, $cliente, $datosIva){
            $total = 0;
            $subTotal = 0;
            $iva = 0;
            $dataSalesDetails = array();
             foreach($listaProducto as $fila) {
                $datosProductos = $this->productos_model->getSingleProduct($fila["ProductID"], $companyID);
                $datosProductos = $datosProductos[0];
                $subTotal = $subTotal + $datosProductos->precio * $fila["cantidad"];
                if($datosProductos->taxFree == "1")
                    $iva = $iva + ($datosProductos->precio * $fila["cantidad"] * ($datosIva->porcentaje/100));
                    //$total = $total + ($datosProductos->precio * $fila["cantidad"]) + ($datosProductos->precio * $fila["cantidad"] * ($datosIva->porcentaje/100));
                /*}else{
                    $total = $total + ($datosProductos->precio * $fila["cantidad"]);
                } */
                $dataSalesDetails[] = array(
                    'saleID' => 0,
                    'companyID' => $companyID,
                    'productID' => $fila["ProductID"],
                    'precio' => $datosProductos->precio,
                    'cantidad'=> $fila["cantidad"],
                    'iva' => ($datosProductos->taxFree == "1")?$datosProductos->precio * $fila["cantidad"] * ($datosIva->porcentaje/100):0.00
                );
            }
            $total = $subTotal + $iva;
            $fecha = getdate();
            $fechaNow = $fecha["year"] . '-' . (($fecha["mon"] < 10)?"0".$fecha["mon"]:$fecha["mon"]) . '-' . (($fecha["mday"] < 10)?"0".$fecha["mday"]:$fecha["mday"]) . ' ' . (($fecha["hours"] < 10) ? "0". $fecha["hours"] : $fecha["hours"]) . ':' . (($fecha["minutes"] < 10) ? "0".$fecha["minutes"] : $fecha["minutes"]) . ':' . (($fecha["seconds"] < 10) ? "0".$fecha["seconds"] : $fecha["seconds"]);
            $dataSales = array(
                'companyID' => $companyID,
                'usercompanyID' => $userCompanyID,
                'fecha' => $fechaNow,
                'subtotal' => $subTotal,
                'iva' => $iva,
                'total' => $total,
                'customerID' => $cliente["customerID"],
                'cancelada' => 0,
                'contado' => 0
            );
            $this->db->trans_start();
            $this->db->insert('sales', $dataSales);
            $id = $this->db->insert_id();
            for($i = 0; $i < sizeof($dataSalesDetails); $i++){
                $dataSalesDetails[$i]["saleID"] = $id;
            }
            $this->db->insert_batch('salesdetails', $dataSalesDetails);
            $this->db->query("update customers set saldo = saldo + ". $total ." where companyID = ". $companyID ." and customerID = ". $cliente["customerID"]);
            $this->db->trans_complete();
            return $id;
    }

    //Consulta
    public function ventaDia($companyID){
        $query = $this->db->query('
                                    select
                                            (select sum(Total) from sales where companyID = '.$companyID.' and convert(fecha,date) = convert(now(),date) and sales.contado = 1) as Contado,
                                            (select sum(Total) from sales where companyID = '.$companyID.' and convert(fecha,date) = convert(now(),date) and sales.contado = 0) as Credito
                                  ');
        return $query->result();
    }

    public function ventaDiaDetalle($companyID){
        $query = $this->db->query('
            select products.codigo,products.descripcion,salesdetails.cantidad,salesdetails.precio,salesdetails.iva,(case sales.contado when 1 then salesdetails.cantidad * salesdetails.precio + salesdetails.iva else 0.00 end) as Contado,(case sales.contado when 0 then salesdetails.cantidad * salesdetails.precio + salesdetails.iva else 0.00 end) as Credito
            from sales
            inner join salesdetails on sales.saleID = salesdetails.saleID
            inner join products on salesdetails.productID = products.ProductID
            where salesdetails.companyID = '. $companyID .' and convert(fecha,date) = convert(now(),date)
            order by sales.contado desc
        ');
        return $query->result();
    }

    public function ventaSemana($companyID){
         $query = $this->db->query('
                                    select
                                            (select sum(Total) from sales where companyID = '.$companyID.' and CONVERT(fecha,date) between CONVERT(date_add(now(),interval ( 1 - dayofweek(now()) ) day), DATE) and convert(date_add(now(),interval ( 7 - dayofweek(now()) ) day), date) and sales.contado = 1) as Contado,
                                            (select sum(Total) from sales where companyID = '.$companyID.' and CONVERT(fecha,date) between CONVERT(date_add(now(),interval ( 1 - dayofweek(now()) ) day), DATE) and convert(date_add(now(),interval ( 7 - dayofweek(now()) ) day), date) and sales.contado = 0) as Credito
                                  ');
        return $query->result();
        /*$query = $this->db->query('select sum(Total) as totalSemana from sales where companyID = '.$companyID.' and CONVERT(fecha,date) between CONVERT(date_add(now(),interval ( 1 - dayofweek(now()) ) day), DATE) and convert(date_add(now(),interval ( 7 - dayofweek(now()) ) day), date)');
        return $query->result();*/
    }

    public function ventaSemanaGrafico($companyID){
         $query = $this->db->query('
                                    select 	*,
                                    ifnull((select sum(Total) from sales where companyID = '.$companyID.' and convert(fecha, date)=dia and contado = 1),0) as Contado,
                                    ifnull((select sum(Total) from sales where companyID = '.$companyID.' and convert(fecha, date)=dia and contado = 0),0) as Credito
                                    from
                                    (
                                        select CONVERT(date_add(now(),interval (case date_format(now(),\'%W\') when \'Monday\' then 0 when \'Tuesday\' then -1 when \'Wednesday\' then -2 when \'Thursday\' then -3 when \'Friday\' then -4 when \'Saturday\' then -5 when \'Sunday\' then -6 end) day), DATE) as Dia
                                        union
                                        select CONVERT(date_add(now(),interval (case date_format(now(),\'%W\') when \'Monday\' then 1 when \'Tuesday\' then 0 when \'Wednesday\' then -1 when \'Thursday\' then -2 when \'Friday\' then -3 when \'Saturday\' then -4 when \'Sunday\' then -5 end) day), DATE) as Dia
                                        union
                                        select CONVERT(date_add(now(),interval (case date_format(now(),\'%W\') when \'Monday\' then 2 when \'Tuesday\' then 1 when \'Wednesday\' then 0 when \'Thursday\' then -1 when \'Friday\' then -2 when \'Saturday\' then -3 when \'Sunday\' then -4 end) day), DATE)  as Dia
                                        union
                                        select CONVERT(date_add(now(),interval (case date_format(now(),\'%W\') when \'Monday\' then 3 when \'Tuesday\' then 2 when \'Wednesday\' then 1 when \'Thursday\' then 0 when \'Friday\' then -1 when \'Saturday\' then -2 when \'Sunday\' then -3 end) day), DATE)     as Dia
                                        union
                                        select CONVERT(date_add(now(),interval (case date_format(now(),\'%W\') when \'Monday\' then 4 when \'Tuesday\' then 3 when \'Wednesday\' then 2 when \'Thursday\' then 1 when \'Friday\' then 0 when \'Saturday\' then -1 when \'Sunday\' then -2 end) day), DATE)     as Dia
                                        union
                                        select CONVERT(date_add(now(),interval (case date_format(now(),\'%W\') when \'Monday\' then 5 when \'Tuesday\' then 4 when \'Wednesday\' then 3 when \'Thursday\' then 2 when \'Friday\' then 1 when \'Saturday\' then 0 when \'Sunday\' then -1 end) day), DATE)     as Dia
                                        union
                                        select CONVERT(date_add(now(),interval (case date_format(now(),\'%W\') when \'Monday\' then 6 when \'Tuesday\' then 5 when \'Wednesday\' then 4 when \'Thursday\' then 3 when \'Friday\' then 2 when \'Saturday\' then 1 when \'Sunday\' then 0 end) day), DATE)     as Dia
                                    ) as Semana
                                    order by Dia asc
                                  ');
        return $query->result();
        /*$query = $this->db->query('select sum(Total) as totalSemana from sales where companyID = '.$companyID.' and CONVERT(fecha,date) between CONVERT(date_add(now(),interval ( 1 - dayofweek(now()) ) day), DATE) and convert(date_add(now(),interval ( 7 - dayofweek(now()) ) day), date)');
        return $query->result();*/
    }

    public function ventaSemanaDetalle($companyID){
        $query = $this->db->query('
            select products.codigo,products.descripcion,salesdetails.cantidad,salesdetails.precio,salesdetails.iva,(case sales.contado when 1 then salesdetails.cantidad * salesdetails.precio + salesdetails.iva else 0.00 end) as Contado,(case sales.contado when 0 then salesdetails.cantidad * salesdetails.precio + salesdetails.iva else 0.00 end) as Credito
            from sales
            inner join salesdetails on sales.saleID = salesdetails.saleID
            inner join products on salesdetails.productID = products.ProductID
            where sales.companyID = '. $companyID .' and CONVERT(sales.fecha,date) between CONVERT(date_add(now(),interval ( 1 - dayofweek(now()) ) day), DATE) and convert(date_add(now(),interval ( 7 - dayofweek(now()) ) day), date)
            order by sales.contado desc
        ');
        return $query->result();
    }

    public function ventaMes($companyID){
        $query = $this->db->query('
                                    select
                                            (select sum(Total) from sales where companyID = '.$companyID.' and month(fecha) = month(now()) and sales.contado = 1) as Contado,
                                            (select sum(Total) from sales where companyID = '.$companyID.' and month(fecha) = month(now()) and sales.contado = 0) as Credito
                                  ');
        return $query->result();
    }

    public function ventaMesDetalle($companyID){
        $query = $this->db->query('
            select products.codigo,products.descripcion,salesdetails.cantidad,salesdetails.precio,salesdetails.iva,(case sales.contado when 1 then salesdetails.cantidad * salesdetails.precio + salesdetails.iva else 0.00 end) as Contado,(case sales.contado when 0 then salesdetails.cantidad * salesdetails.precio + salesdetails.iva else 0.00 end) as Credito
            from sales
            inner join salesdetails on sales.saleID = salesdetails.saleID
            inner join products on salesdetails.productID = products.ProductID
            where sales.companyID = '.$companyID.' and month(sales.fecha) = month(now())
            order by sales.contado desc
        ');
        return $query->result();
    }

    public function topProductosMesMonto($companyID){
        $query = $this->db->query('
            select descripcion,sum(monto) as monto
            from
            (
                select p.descripcion,sd.cantidad,sd.precio,sd.cantidad * sd.precio as monto
                from salesdetails as sd
                inner join sales as s on sd.saleID = s.saleID
                inner join products as p on sd.productID = p.ProductID
                where s.companyID = '.$companyID.' and month(s.fecha) = month(now())
            ) as R
            group by descripcion
            order by monto desc
            limit 10
        ');
        return $query->result();
    }

     public function topProductosMesCantidad($companyID){
        $query = $this->db->query('
            select descripcion,sum(cantidad) as cantidad
            from
            (
                select p.descripcion,sd.cantidad,sd.precio,sd.cantidad * sd.precio as monto
                from salesdetails as sd
                inner join sales as s on sd.saleID = s.saleID
                inner join products as p on sd.productID = p.ProductID
                where s.companyID = '.$companyID.' and month(s.fecha) = month(now())
            ) as R
            group by descripcion
            order by cantidad desc
            limit 10
        ');
        return $query->result();
    }

    //Obtener consulta para reporte del tab venta
    public function reporteVenta($fechaInicio, $fechaFinal, $companyID){
        $query = $this->db->query("
            select (case ifnull(s.customerID,'') when '' then 'Concurrente' else concat(c.firstname,' ' ,c.lastname) end) as cliente,s.subtotal,s.iva,s.total,(case s.cancelada when 1 then 'Si' else 'No' end) as cancelada
            from sales as s
            left join customers as c on s.customerID = c.customerID and s.companyID = c.companyID
            where s.companyID = $companyID and convert(s.fecha,date) >= convert('$fechaInicio',date) and convert(s.fecha,date) <= convert('$fechaFinal',date)
        ");
        return $query->result();
    }

    //Obtener consulta para reporte del tab productos
    public function reporteVentaProductos($fechaInicio, $fechaFinal, $companyID){
        $query = $this->db->query("
            select descripcion,sum(cantidad) as cantidad,sum(monto) as monto
            from
            (
                select p.descripcion,sd.cantidad,sd.precio,sd.iva,(sd.cantidad * sd.precio + sd.iva) as monto
                from salesdetails as sd
                inner join sales as s on sd.saleID = s.saleID and sd.companyID = s.companyID
                inner join products as p on sd.productID = p.productID and p.companyID = sd.companyID
                where s.companyID = $companyID and convert(s.fecha,date) >= convert('$fechaInicio',date) and convert(s.fecha,date) <= convert('$fechaFinal',date)
            ) as A
            group by a.descripcion
        ");
        return $query->result();
    }

    //Obtener consulta para reporte del tab Uuarios
    public function reporteVentaUsuarios($fechaInicio, $fechaFinal, $companyID){
        $query = $this->db->query("
            select s.usercompanyID,concat(u.firstname, ' ', u.lastname) as usuario,count(s.saleID) as cantidad,sum(total) as monto
            from sales as s
            inner join users_company as u on s.usercompanyID = u.usercompanyID and s.companyID = u.companyID
            where s.companyID = $companyID and convert(s.fecha,date) >= convert('$fechaInicio',date) and convert(s.fecha,date) <= convert('$fechaFinal',date)
            group by s.usercompanyID,u.firstname,u.lastname
        ");
        return $query->result();
    }

    //Obtener consulta para reporte del tab Clientes
    public function reporteVentaClientes($fechaInicio, $fechaFinal, $companyID){
        $query = $this->db->query("
            select (case ifnull(s.customerID,'') when '' then 'Concurrente' else concat(c.firstname,' ' ,c.lastname) end) as cliente,sum(s.subtotal) as subtotal,sum(s.iva) as iva,sum(s.total) as total
            from sales as s
            left join customers as c on s.customerID = c.customerID and s.companyID = c.companyID
            where s.companyID = $companyID and convert(s.fecha,date) >= convert('$fechaInicio',date) and convert(s.fecha,date) <= convert('$fechaFinal',date)
            group by s.customerID,c.firstname,c.lastname
        ");
        return $query->result();
    }
}
