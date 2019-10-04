<script>
$(document).ready(function () {
$('#dtDynamicVerticalScrollExample').DataTable({
"scrollY": "50vh",
"scrollCollapse": true,
"lengthMenu": [500],
"bPaginate": false,
});
$('.dataTables_length').addClass('bs-select');

});

function updateValues(el) {
  var id_ahlete = '';
  var id_mku = '';
  var id_class = '';
  var form = el.form;
  var v = el.value;

  v = v.replace(/^\[\'|\'\]$/g,'').split("', '");
var vv = v[3];
  vv = vv.replace(/^\[\'|\'\]$/g,'').split(", ");

  $('.'+v[0]+v[1]).show();
  for (i = 0; i < vv.length; i++) {
    $('.'+v[0]+vv[i]).hide();
  }





}

</script>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
