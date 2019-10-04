<script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/js/plugins/bootstrap/bootstrap-datepicker.js"></script>  
<script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/js/plugins/bootstrap/bootstrap-select.js"></script>  
<script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/js/plugins/bootstrap/bootstrap-file-input.js"></script>  
        
<script type="text/javascript">
$(document).ready(function(){


   
});

   


    function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        var image_x = document.getElementById('img');
        image_x.parentNode.removeChild(image_x);
        
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" style="height: 150px;width: 200px"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>