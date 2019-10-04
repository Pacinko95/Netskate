<script>
    $(document).ready(function(){
        var idprov   = "<?= @$data->idprovinsi ?>";
        var idkab    = "<?= @$data->idkabupaten?>";
        var idkec    = "<?= @$data->idkecamatan?>";
        var idkel    = "<?= @$data->idkelurahan?>";

        getkabupaten(idprov, idkab);
        getkecamatan(idkab, idkec);
        getkelurahan(idkec, idkel);

        $("#id_provinsi").change(function(){
            var provinsi_id     = $('#id_provinsi option:Selected').val();
            $.ajax({
                type  : 'GET',
                url   : "<?= base_url('Athlete/getKabupaten/')?>"+provinsi_id ,
                async : false,
                dataType : 'json',
                success : function(data){
                  if(data.length === 0){
                    $('#id_city').append("<option value='0'>Select City</option>");
                }else{
                    $('#id_city').empty();
                    $('#id_subdistrict').empty(); 
                    $('#id_urbanvillage').empty();
                    $.each(data, function(i, value) {
                        $('#id_city').append("<option value='" + value.idkabupaten + "'>" + value.name + "</option>");
                    });
                }                                    
            }
        });            
        });       

        $("#id_city").change(function(){
          var id_city     = $('#id_city option:Selected').val();
          $.ajax({
            type  : 'GET',
            url   : "<?= base_url('Athlete/getKecamatan/')?>"+id_city ,
            async : false,
            dataType : 'json',
            success : function(data){
              if(data.length === 0){
               console.log(data);
               $('#id_subdistrict').append("<option value='0'>Select District</option>");
           }else{
            $('#id_subdistrict').empty()
            $('#id_urbanvillage').empty();
            $.each(data, function(i, value) {
                $('#id_subdistrict').append("<option value='" + value.idkecamatan + "'>" + value.name + "</option>");
            });
        }

    }
});            
      });  

        $("#id_subdistrict").change(function(){
          var id_subdistrict     = $('#id_subdistrict option:Selected').val();     	  
          $.ajax({
            type  : 'GET',
            url   : "<?= base_url('Athlete/getKelurahan/')?>"+id_subdistrict ,
            async : false,
            dataType : 'json',
            success : function(data){
              if(data.length === 0){
                $('#id_urbanvillage').append("<option value='0'>Select Urban Village</option>");
            }else{
                $('#id_urbanvillage').empty();
                $.each(data, function(i, value) {
                    $('#id_urbanvillage').append("<option value='" + value.idkelurahan + "'>" + value.name + "</option>");
                });
            }                                     
        }
    });            
      }); 
    });
    function getkabupaten(provinsi_id, idkab){
        $.ajax({
            type  : 'GET',
            url   : "<?= base_url('Athlete/getKabupaten/')?>"+provinsi_id ,
            async : false,
            dataType : 'json',
            success : function(data){
              if(data.length === 0){
               console.log(data);
               $('#id_city').append("<option value='0'>- Select City</option>");
           }else{
               $.each(data, function(i, value) {
                if(value.idkabupaten == idkab){
                    $('#id_city').append("<option value='" + value.idkabupaten + "' selected='selected' >" + value.name + "</option>");
                }else{
                    $('#id_city').append("<option value='" + value.idkabupaten + "'  >" + value.name + "</option>");
                }
            });
           }
           
       }
   });            
    }



    function getkecamatan(kabupaten_id, idkec){
        $.ajax({
            type  : 'GET',
            url   : "<?= base_url('Athlete/getKecamatan/')?>"+kabupaten_id ,
            async : false,
            dataType : 'json',
            success : function(data){
              if(data.length === 0){
                $('#id_subdistrict').append("<option value='0'>- Select District</option>");
            }else{
               $.each(data, function(i, value) {
                if(value.idkecamatan == idkec){
                    $('#id_subdistrict').append("<option value='" + value.idkecamatan + "' selected='selected'>" + value.name + "</option>");
                }else{
                    $('#id_subdistrict').append("<option value='"+ value.idkecamatan +"'>" + value.name + "</option>");
                }
            });
           }                                    
       }
   });           
    }

    function getkelurahan(kecamatan_id, idkel){
        $.ajax({
            type  : 'GET',
            url   : "<?= base_url('Athlete/getKelurahan/')?>"+kecamatan_id ,
            async : false,
            dataType : 'json',
            success : function(data){
              if(data.length === 0){
                $('#id_urbanvillage').append("<option value='0'>- Select Village</option>");
            }else{
               $.each(data, function(i, value) {
                if(value.idkelurahan == idkel){
                    $('#id_urbanvillage').append("<option value='" + value.idkelurahan + "' selected='selected'>" + value.name + "</option>");
                }else {
                    $('#id_urbanvillage').append("<option value='"+ value.idkelurahan + "'>" + value.name + "</option>");
                }
            });
           }                                    
       }
   });            
    }

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
                    document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" style="height: 200px;width: 200px"/>';
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }

    function setEditableprov(prov){
        if(prov!="0"){
            document.getElementById("id_provinsi").disabled=true;
        }else{
         document.getElementById("id_provinsi").disabled=false;
     }
 }

 function setEditablekab(kab){
    if(kab!="0"){
        document.getElementById("id_city").disabled=true;
    }else{
        document.getElementById("id_city").disabled=false;
    }
}

function setEditablekec(kec){
    if(kec!="0"){
        document.getElementById("id_subdistrict").disabled=true;
    }else{
        document.getElementById("id_subdistrict").disabled=false;
    }
}
function setEditablekel(kel){
    if(kel!="0"){
        document.getElementById("id_urbanvillage").disabled=true;
    }else{
        document.getElementById("id_urbanvillage").disabled=false;
    }
}
</script>