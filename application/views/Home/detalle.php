<div class="row text-right">
    <a href="<?php echo base_url() ?>home/ExportarCSV/<?php echo $dia ?>" class="btn btn-primary">Exportar a CSV</a>
</div>
<table class="table table-responsive">
    <thead class="thead-default">
        <tr>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Iva</th>
            <th>Contado</th>
            <th>Credito</th>
        </tr>
    </thead>
    <tbody> 
        <?php
            $total = 0.0; 
            $totalCredito = 0.0;
            $totalContado = 0.0;           
            foreach($query as $fila){
                $totalCredito = $totalCredito + $fila->Credito;
                $totalContado = $totalContado + $fila->Contado;                
        ?>
            <tr>    
                <td><?php echo $fila->codigo ?></td>
                <td><?php echo $fila->descripcion ?></td>
                <td><?php echo $fila->cantidad ?></td>
                <td><?php echo number_format($fila->precio,2) ?></td>
                <td><?php echo number_format($fila->iva,2) ?></td>
                <td><?php echo number_format($fila->Contado,2) ?></td>
                <td><?php echo number_format($fila->Credito,2) ?></td>
            </tr>
        <?php
                
            }
        ?>
        <tr>
            <th rowspan="2" colspan="4" class="text-center" style="vertical-align: middle;"><p>Sub totales<p></th>            
            <th>Total Contado</th>
            <th>Total Credito</th>
        </tr>
        <tr>                  
            <td>C$ <?php echo number_format($totalContado,2); ?></td>
            <td>C$ <?php echo number_format($totalCredito,2); ?></td>
        </tr>
        <tr>
            <td colspan="4" class="center">
                <strong>
                    Total
                </strong>                
            </td>
            <td colspan="2" class="text-center">
                <strong>
                    C$ <?php echo number_format($totalContado + $totalCredito,2); ?>
                </strong>
            </td>
        </tr>
    </tbody>
</table>