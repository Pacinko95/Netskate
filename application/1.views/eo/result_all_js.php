
<script>

$(document).ready(function(){

   
    // tampil_data();   //pemanggilan fungsi tampil barang.
         
    $('#mydata').val();

    $("#klik").mousedown(function tampil_data(){
        var bib = $('#bib').val(); // this.value
        var segment = "<?= $this->uri->segment(3)?>";
       
        
        // alert(urls);
        $.ajax({ 
            url: '<?= base_url()?>'+'eo/result_data/',
            data: { bib: bib, segment : segment },
            type: 'post'
        }).done(function(a) {
            console.log(a);
            // obj = JSON.parse(json_data);
            dat = JSON.parse(a);
            o = dat.data_athlete;
            race = dat.all_race;
           
            // alert(o.sex);
            if(o == null){
                alert('data kosong !');
            }else{
                $("#athlete_name").val(o.name_athlete);
                $("#sex").val(o.sex);
                $("#class").val(o.name_class);
                $("#mku").val(o.name_mku);
                $("#name_club").val(o.name_club);
                $("#code").val(o.code_invoice);
             
                var html = '';
                var i;
                    for(i=0; i<race.length; i++){
                    html += '<tr>'+
                                '<td>'+race[i].name+'</td>'+
                                '<td><input type="time" name="time'+race[i].id_race+'" value="'+race[i].time+'"style="height: 20px;"></td>'+
                                '<td><input type="number" name="rang'+race[i].id_race+'" value="'+race[i].ranking+'" style="height: 20px;"></td>'+
                                '</tr>';
                }
                $('#show_data').html(html);
             }
            
       
        }).fail(function() {
            console.log('');
        });
});

    
$("button").click(function() {
    
    var bib = $(this).val();
        var segment = "<?= $this->uri->segment(3)?>";
       
        
        // alert(urls);
        $.ajax({ 
            url: '<?= base_url()?>'+'eo/result_data/'+segment,
            data: { bib: bib, segment : segment },
            type: 'post'
        }).done(function(a) {
            console.log(a);
            // obj = JSON.parse(json_data);
            dat = JSON.parse(a);
            o = dat.data_athlete;
            race = dat.all_race;

            // alert(o.sex);
            if(o == null){
                alert('data kosong');
            }else{
                $("#bib").val(bib);
                $("#athlete_name").val(o.name_athlete);
                $("#sex").val(o.sex);
                $("#class").val(o.name_class);
                $("#mku").val(o.name_mku);
                $("#name_club").val(o.name_club);
                $("#code").val(o.code_invoice);
                var html = '';
                var i;
                    for(i=0; i<race.length; i++){
                       
                       
                    html += '<tr>'+
                                '<td>'+race[i].name+'</td>'+
                                '<td><input type="time" name="time'+race[i].id_race+'" value="'+race[i].time+'" style="height: 20px;"></td>'+
                                '<td><input type="number" name="rang'+race[i].id_race+'" value="'+race[i].ranking+'" style="height: 20px;"></td>'+
                                '</tr>';
                }
                $('#show_data').html(html);
             }
            
       
        }).fail(function() {
            console.log('');
        });
   
});


});
</script>