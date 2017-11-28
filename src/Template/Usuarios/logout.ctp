<?php $this->layout = 'login'; ?>

<section class="content">
    <div class="help-block text-center">
        Sesión terminada ...<br><br>
        <i class="fa fa-5x fa-sign-out"></i><br><br>
        <a href="<?php echo $this->Url->build('/'); ?>" class="logo"> regresar </a>
    </div>
</section>