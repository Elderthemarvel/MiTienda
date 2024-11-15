<style type="text/css">
    .centrado {
        text-align: center;
        align-content: center;
    }
    div.contenido {
        border-top: dotted 0.5px;
        border-bottom: dotted 0.5px;
        border-top-color: #000000;
        border-bottom-color: #000000;
    }
</style>
    <div>
        <p class="centrado">
            <span style="font-weight: bold; font-size: 1.2 rem">MI TIENDA</span><br>
        </p>
        <p class="centrado" style="font-size:0.8rem;">
            NIT: 0000000<br>
            <small>Ciudad, Zona 12</small><br>
            Guatemala, Guatemala<br>
            5555-5555
        </p>
        <p style="font-size:0.8rem"> 
            Orden N°:<?=$recibo['numero']?><br>
            <?= date("d-m-Y", strtotime($recibo['fecha_creacion']))?><br>
        </p>
        <div class="contenido">
        <table style="font-size:0.8rem; width:100%">
            <?php foreach (json_decode($recibo['detalle']) as $producto) {?>
            <tr>
                <td class="producto" style="width:70%;"><?=$producto->nombre ?></td>
                <td class="precio" style="width:30%;"></td>
            </tr>
            <tr>
                <td style="font-size:0.7rem;"><?= $producto->cantidad?></td>
                <td style="text-align:right"><?= number_format($producto->subtotal, 2, '.', ' ');?></td>
            </tr>  
            <?php }?>
        </table>
        </div>
        <div class="contenido" >
            <table style="font-size:0.8rem; width:100%;">
                <tr>
                    <td class="producto" style="text-align:left;"><b>TOTAL </b></td>
                    <td class="precio" style="text-align:right"><b>Q <?=$recibo['total']?></b></td>
                </tr>
            </table>
        </div>
        
        <p class="centrado" style="font-size:0.8rem">¡GRACIAS POR SU COMPRA!</p>
    </div>