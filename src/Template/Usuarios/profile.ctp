<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Perfil de Usuario</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
    <li><a href="#">Usuarios</a></li>
    <li class="active">Listado</li>
  </ol>
</section>

<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Perfil -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <?php echo $this->Html->image('usuarios/foto'.$current_user['id'].'.jpg',
                                        array('class' => 'profile-user-img img-responsive img-circle',
                                              'alt' => 'User profile picture')); ?>

          <h3 class="profile-username text-center"><?= $registro['nombre_completo'] ?></h3>

          <p class="text-muted text-center"><?= $registro['rol'] ?></p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Seguidores</b> <a class="pull-right">250</a>
            </li>
            <li class="list-group-item">
              <b>Siguiendo</b> <a class="pull-right">13</a>
            </li>
            <li class="list-group-item">
              <b>Amigos</b> <a class="pull-right">890</a>
            </li>
          </ul>

          <a href="#" class="btn btn-primary btn-block"><b>Enviar mensaje</b></a>
        </div>
        <!-- /.box-body -->
      </div>

    </div>

    <div class="col-md-9">

      <!-- Solapas -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#info" data-toggle="tab">Información</a></li>
          <li><a href="#settings" data-toggle="tab">Configuración</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="info">
            <strong><i class="fa fa-book margin-r-5"></i> Educación</strong>
            <p class="text-muted">
              Ingeniero Técnico por la Universidad Politécnica de Madrid
            </p>
            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>
            <p class="text-muted">
              Yerba Buena, Tucumán, Argentina
            </p>
            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Habilidades</strong>
            <p>
              <span class="label label-danger">Análisis</span>
              <span class="label label-primary">Diseño</span>
              <span class="label label-success">Desarrollo</span>
              <span class="label label-info">Programación</span>
              <span class="label label-warning">Organización</span>
            </p>
            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notas</strong>
            <p>
              A lo largo de mi carrera tuve la oportunidad de pertenecer a un considerable número
              de empresas dedicadas a negocios diferentes, como así también, a participar en distintos
              tipos de proyectos informáticos lo que me brindó una amplia gama de conocimientos en
              distintas áreas.
            </p>
          </div>

          <div class="tab-pane" id="settings">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputEducacion" class="col-sm-2 control-label">Educación</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEducacion" placeholder="educación">
                </div>
              </div>

              <div class="form-group">
                <label for="inputUbicacion" class="col-sm-2 control-label">Ubicación</label>

                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputUbicacion" placeholder="ubicación">
                </div>
              </div>

              <div class="form-group">
                <label for="inputHabilidades" class="col-sm-2 control-label">Habilidades</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputHabilidades" placeholder="habilidades">
                  <!-- <p class="text-muted">saparados por ;</p> -->
                </div>
              </div>

              <div class="form-group">
                <label for="inputNotas" class="col-sm-2 control-label">Notas</label>

                <div class="col-sm-10">
                  <textarea class="form-control" id="inputNotas" placeholder="notas"></textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Guardar</button>
                </div>
              </div>

            </form>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>
