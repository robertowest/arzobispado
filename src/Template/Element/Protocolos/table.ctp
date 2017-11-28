<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Año</th>
        <th>Protocolo</th>
        <th>Tipo</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($registros as $registro): ?>
        <tr>
            <td>
                <?= $this->Number->format($registro->id) ?>
            </td>
            <td>
                <?= h($registro->año) ?>
            </td>
            <td>
                <?= h($registro->protocolo) ?>
            </td>
            <td>
                <?= $registro->has('protocolo_tipo') ? $registro->protocolo_tipo->path : '' ?>
            </td>
            <td class="actions actions-btn1" style="white-space:nowrap">
                <!-- 
                    'class'=>'btn btn-sm btn-primary'
                    'class'=>'btn btn-sm btn-danger'
                    'class'=>'btn btn-sm btn-default' 
                -->

                <?php
                // si tiene documento asociado no se puede modificar la info del protocolo
                if ($registro->documents == [])
                {
                    echo $this->Html->link('<i class="fa fa-pencil fa-lg"></i>', 
                            ['action' => 'edit', $registro->id],
                            ['class'=>'btn-default', 'escape' => false,
                             'rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'editar']);
                }
                else
                {
                    // text-muted
                    echo '<i class="fa fa-pencil fa-lg text-red"></i>';
                }
                ?>

                <?= $this->Form->postLink('<i class="fa fa-trash fa-lg"></i>', 
                    ['action' => 'delete', $registro->id],
                    ['confirm' => '¿Desea borrar el registro?',
                     'class'=>'btn-default', 'escape' => false,
                     'rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'eliminar']) ?>

                <?= '|' ?>
                
                <?php
                    if ($registro->protocolo_designaciones != [])
                    {
                        echo $this->Html->link('<i class="fa fa-file-text-o fa-lg"></i>',
                            ['action' => 'tipo_formulario', $registro->id, $registro->protocolo_designaciones[0]->id],
                            ['class'=>'btn-default', 'escape' => false,
                             'rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'formulario']);
                    }
                    elseif ($registro->tramite_bautismos != [])
                    {
                        echo $this->Html->link('<i class="fa fa-file-text-o fa-lg"></i>',
                            ['action' => 'tipo_formulario', $registro->id, $registro->tramite_bautismos[0]->id],
                            ['class'=>'btn-default', 'escape' => false,
                             'rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'formulario']);
                    }
                    else
                    {
                        echo $this->Html->link('<i class="fa fa-file-o fa-lg"></i>',
                            ['action' => 'tipo_formulario', $registro->id, null],
                            ['class'=>'btn-default', 'escape' => false,
                             'rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'sin formulario']);
                    }
                ?>

                <?php
                    if ($registro->documents == [])
                    {
                        $icons = "class='fa fa-eye fa-lg'";
                        $title = "Vista";
                    }
                    else
                    {
                        $icons = "class='fa fa-file-word-o fa-lg'";
                        $title = "Documentos";
                    }

                    echo $this->Html->link("<i ".$icons."></i>", 
                        ['action' => 'view', $registro->id],
                        ['class'=>'btn-default', 'escape' => false,
                         'rel'=>'tooltip', 'data-placement'=>'top', 'title'=>$title]) 

                    /*
                    echo $this->Html->link('<i class="fa fa-eye fa-lg"></i>', 
                    ['action' => 'view', $registro->id],
                    ['class'=>'btn-default', 'escape' => false,
                     'rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'información']) 
                    */
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
</table>