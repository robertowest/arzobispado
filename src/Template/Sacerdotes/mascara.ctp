<?php
$date_template = ['formGroup' => '{{label}}{{input}}',
                  'label' => '<label class="  col-md-3" {{attrs}}>{{text}}</label>',
                  'input' => '<div class="input-group col-md-4"><input type="text" name="{{name}}" data-inputmask="&#039;alias&#039;: &#039;dd/mm/yyyy&#039;" data-mask class="col-md-6 form-control" /><div class="input-group-addon"><i class="fa fa-calendar"></i></div></div>',
                  'error' => '<div class="error">{{content}}</div>'];
?>
    <section class="content">
      <div class="row">
        <div class="col-md-6">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Máscara de entrada</h3>
            </div>
            <div class="box-body">

              <div class="form-group">
                <label>Fecha:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
              </div>

              <div class="form-group">
                <label>Teléfono:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                </div>
              </div>

              <div class="form-group">
                <label>IP:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                </div>
              </div>


              <!-- COPIAR ESTE FORMATO PARA FECHAS -->
              <div class="form-group">
                <label class="col-md-3">Fecha Nac.</label>

                <div class="input-group col-md-4">
                  <input type="text" name="fnacimiento" empty="1" class="form-control" data-inputmask="&#039;alias&#039;: &#039;dd/mm/yyyy&#039;" data-mask="" id="fnacimiento" value="12/18/67, 12:00 AM"/>
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                </div>
              </div>


<?= $this->Form->control('campo1', ['templates' => ['formGroup' => '{{label}}{{input}}',
                                                    'label' => '<label class="  col-md-3" {{attrs}}>{{text}}</label>',
                                                    'input' => '<div class="input-group col-md-4"><input type="text" name="{{name}}" data-inputmask="&#039;alias&#039;: &#039;dd/mm/yyyy&#039;" data-mask class="col-md-6 form-control" /><div class="input-group-addon"><i class="fa fa-calendar"></i></div></div>',
                                                    'error' => '<div class="error">{{content}}</div>'],
                                    'type' => 'text',]) ?>

<?= $this->Form->control('campo2', ['templates' => $date_template,
                                    'type' => 'text',]) ?>

<!--


<div class="form-group text">
  <label class="control-label col-md-2" for="fnacimiento">{{label}}</label>
  <div class="col-md-3">
    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
    <input type="text" name="{{name}}" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask {{attrs}} />
  </div>
</div>
-->



            </div>
          </div>
        </div>
      </div>
    </section>

<?php
$this->Html->script(['plugins/input-mask/jquery.inputmask',
                     'plugins/input-mask/jquery.inputmask.date.extensions',
                     'plugins/input-mask/jquery.inputmask.extensions'],
                    ['block' => 'script']);
$this->start('scriptBotton');
?>

<script>
  $(function ()
  {
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();
  });
</script>

<?php $this->end(); ?>
