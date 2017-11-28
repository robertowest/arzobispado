<?php $corte = 0; ?>


<table class="table table-hover">
    <?php
    foreach ($contadores as $registro):
        if ($corte <> $registro->año)
        {
            echo "<tr><td colspan=2><b><center>Numeración ".$registro->año."</center></b></td></tr>";
            $corte = $registro->año;
        }
    ?>
    <tr>
        <td><?= $registro->tipo ?></td>
        <td><?= $registro->contador ?></td>
    </tr>
    <?php endforeach; ?>
</table>
