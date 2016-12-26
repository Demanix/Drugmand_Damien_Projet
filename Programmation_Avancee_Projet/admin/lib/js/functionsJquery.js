$(document).ready(function(){
   $('#submit_type').remove();
   
   $('#choix_film').change(function(){
       var param = $(this).attr('name');
       var val = $(this).val();
       var url = 'index.php?' + param + '=' + val + '&submit_type=1';       
       location.href = url;
   });
   
    
    
});