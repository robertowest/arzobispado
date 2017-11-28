<?php
$this->Html->css(['../js/plugins/datatables/dataTables.bootstrap',],
                 ['block' => 'css']);

$this->Html->script(['plugins/datatables/jquery.dataTables',
                     'plugins/datatables/dataTables.bootstrap.min',],
                    ['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
  <script>
    $(function ()
    {
      $("#example1").DataTable();
      $('#example2').DataTable({
                                 "paging": true,
                                 "lengthChange": false,
                                 "searching": true,
                                 "ordering": true,
                                 "info": true,
                                 "autoWidth": false,
                               });
      $('#example3').DataTable({
                                 "paging": false,
                                 "lengthChange": false,
                                 "searching": false,
                                 "ordering": false,
                                 "info": false,
                                 "autoWidth": false
                               });
      $('#example4').DataTable({
                                 "paging": false,
                                 "lengthChange": false,
                                 "searching": false,
                                 "ordering": true,
                                 "info": false,
                                 "autoWidth": false,
                               });
    });
  </script>
<?php $this->end(); ?>