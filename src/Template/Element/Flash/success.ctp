<section class="content-header">
    <div class="alert alert-success alert-dismissible">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <!--
        <h4><i class="icon fa fa-2x fa-check"></i> ¡Correcto!</h4>
        <?= h($message) ?>
        -->
        <table>
            <tr>
                <td rowspan="2"><i class="icon fa fa-3x fa-check"></i></td>
                <td><h4>¡Correcto!</h4></td>
            </tr>
            <tr>
                <td><?= h($message) ?></td>
            </tr>
        </table>
    </div>
</section>