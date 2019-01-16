 $(document).ready(function(){
                $("#Estado").change(function(){
                     //  $('ClaveMaestro').find('option').remove().end.append('<option value="whatever"></option>').val('whatever');
             
                        $("#Estado option:selected").each(function(){
                           Estado=$(this).val();
                          
                           $.post('getmunicipio.php',{Estado:Estado},function(data){$("#Municipio").html(data);
                                  });
                            
                        });
                });
 });