
<!-- Modal Dialog -->
<div class="modal fade" id="confirmLunas" role="dialog" aria-labelledby="confirmLunasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Parmanently</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure about this?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-info" id="confirm">Ya</button>
      </div>
    </div>
  </div>
</div>




<!-- Dialog show event handler -->
<script type="text/javascript">
  $('#confirmLunas').on('show.bs.modal', function (e) {
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });

      //Form confirm (yes/ok) handler, submits form
      $('#confirmLunas').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });
</script>
