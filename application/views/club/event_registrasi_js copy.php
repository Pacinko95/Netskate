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

</script>