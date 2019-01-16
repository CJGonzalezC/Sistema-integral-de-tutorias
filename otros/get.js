/* $(document).ready(function(){
                $("#ClaveM").change(function(){
                    
                   
                       // $("#ClaveM option:selected").each(function(){
                    
                    alert('funciona');
                    var val=this.value;
                    
                    var consulta=$.ajax({
                              type:'POST',
                              url:'getClave.php',
                              data:{ClaveMaestro:val},
                              dataType:'JSON'
                              });
                    
               
                              consulta.done(function(data)
                              {
                                        if(data.error!==undefined){
                                                       $('#Nombree').html('ha ocurrido un error'+data.error);
                                                       return false;
                                        }
                                        else{
                                                       $('#Nombree').html('datosguardados');
                                                       return true;
                                        }
                              });
                              consulta.fail(function(data)
                              {
                                             $('#Nombree').html('ha habido un error en el servidor'+data.error);
                                             return false;
                              });
                   
                      //  });
                });
        });
        */
        
/*$(document).ready(function(){
               $("#ClaveM").change(function(){
                       // $('ClaveMaestro').find('option').remove().end.append('<option value="whatever"></option>').val('whatever');
                        $("#ClaveM option:selected").each(function(){
                           ClaveMaestro=$(this).val();
                           $.post('getClave.php',{ClaveMaestro:ClaveMaestro},function(data){$("#Nombretutor").html(data);});    
                        });
               });
});
*/

$(document).ready(function(){
               
});


                             
                      