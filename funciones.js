//funcion para quitar alumnos de Nueva Liberacion
  function QuitarAlumnosLiberacionN(NoControl){
      var Clave= document.getElementById("ClaveLibera").value;
         $.ajax({
                                        type:'POST',
                                        data:{NoControl:NoControl,Clave:Clave},
                                        url:'./QuitarAlumnoLiberacion.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   
                                                       location.href='./LiberacionAlumnos.php';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   
                                                }
                                            },
                                        error:function(){
                                            alert('Error');
                                        }
                                            
                                    });
    }

//funcion para quitar alumnos de actividad
  function QuitarAlumnosActividadN(NoControl){
      var ClaveActividad= document.getElementById("ClaveActividad").value;
         $.ajax({
                                        type:'POST',
                                        data:{NoControl:NoControl,ClaveActividad:ClaveActividad},
                                        url:'./QuitarAlumnoActividad.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   
                                                       location.href='./ActividadAlumnos.php';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   
                                                }
                                            },
                                        error:function(){
                                            alert('Error');
                                        }
                                            
                                    });
    }
    
    
    function QuitarAlumnosActividad(NoControl){
      var ClaveActividad= document.getElementById("ClaveActividad").value;
         $.ajax({
                                        type:'POST',
                                        data:{NoControl:NoControl,ClaveActividad:ClaveActividad},
                                        url:'./QuitarAlumnoActividad.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   
                                                       location.href='./ModificarActividad.php?ClaveActividad='+ClaveActividad+'';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   
                                                }
                                            },
                                        error:function(){
                                            alert('Error');
                                        }
                                            
                                    });
    }

//funcion para quitar alumnos de tutoria nueva
  function QuitarAlumnosN(NoControl){
      var ClaveAsignaTutor= document.getElementById("ClaveAsignaTutor").value;
         $.ajax({
                                        type:'POST',
                                        data:{NoControl:NoControl,ClaveAsignaTutor:ClaveAsignaTutor},
                                        url:'./QuitarAlumnoTutoria.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   
                                                       location.href='./NuevoGrupo.php';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   
                                                }
                                            },
                                        error:function(){
                                            alert('Error');
                                        }
                                            
                                    });
    }


//funcion para quitar alumnos de tutoria modificada
  function QuitarAlumnos(NoControl){
      var ClaveAsignaTutor= document.getElementById("ClaveAsignaTutor").value;
         $.ajax({
                                        type:'POST',
                                        data:{NoControl:NoControl,ClaveAsignaTutor:ClaveAsignaTutor},
                                        url:'./QuitarAlumnoTutoria.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   
                                                       location.href='./ModificarAsignacion.php?ClaveAsignacion='+ClaveAsignaTutor+'';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   
                                                }
                                            },
                                        error:function(){
                                            alert('Error');
                                        }
                                            
                                    });
    }
    
    
$(document).ready(function(){
    
    //funcion para agregar alumnos a un grupo de tutoria
    $('#AgregaAlumno').click(function(){
                  var NoControl=document.getElementById("NoControl").value;
                  var ClaveAsignaTutor=document.getElementById("ClaveAsignaTutor").value;
                  document.getElementById("NoControl").innerHTML="10";
                  
            
            $.ajax({
                                        type:'POST',
                                        data:{NoControl:NoControl,ClaveAsignaTutor:ClaveAsignaTutor},
                                        url:'./CargarAlumnosGrupo.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   
                                                       location.href='./ModificarAsignacion.php?ClaveAsignacion='+ClaveAsignaTutor+'';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   
                                                }
                                            },
                                        error:function(){
                                            alert('Error');
                                        }
                                            
                  });
    });
    
    $('#AgregaAlumnoN').click(function(){
                  var NoControl=document.getElementById("NoControl").value;
                  var ClaveAsignaTutor=document.getElementById("ClaveAsignaTutor").value;
               
                 
                  
            
            $.ajax({
                                        type:'POST',
                                        data:{NoControl:NoControl,ClaveAsignaTutor:ClaveAsignaTutor},
                                        url:'./CargarAlumnosGrupo.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   
                                                       location.href='./NuevoGrupo.php';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   
                                                }
                                            },
                                        error:function(){
                                            alert('Error');
                                        }
                                            
                  });
    });
     
    
    //PARA AGREGAR ALUMNOS A ACTIVIDADES
    $('#AgregaAlumnoActividadN').click(function(){
                  var NoControl=document.getElementById("NoControl").value;
                  var ClaveActividad=document.getElementById("ClaveActividad").value;
                
            $.ajax({
                                        type:'POST',
                                        data:{NoControl:NoControl,ClaveActividad:ClaveActividad},
                                        url:'./CargarAlumnosActividad.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   
                                                       location.href='./ActividadAlumnos.php';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   
                                                }
                                            },
                                        error:function(){
                                            alert('Error');
                                        }
                                            
                  });
    });
  
  
  $('#AgregaAlumnoActividad').click(function(){
                  var NoControl=document.getElementById("NoControl").value;
                  var ClaveActividad=document.getElementById("ClaveActividad").value;
                 
            $.ajax({
                                        type:'POST',
                                        data:{NoControl:NoControl,ClaveActividad:ClaveActividad},
                                        url:'./CargarAlumnosActividad.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   
                                                       location.href='./ModificarActividad.php?ClaveActividad='+ClaveActividad+'';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   
                                                }
                                            },
                                        error:function(){
                                            alert('Error');
                                        }
                                            
                  });
    });
  
  
  //PARA AGREGAR ALUMNOS A LIBERACION
    $('#AgregaAlumnoLiberacionN').click(function(){
                  var NoControl=document.getElementById("NoControl").value;
                  Clave=document.getElementById("ClaveLibera").value;
                
            $.ajax({
                                        type:'POST',
                                        data:{NoControl:NoControl,Clave:Clave},
                                        url:'./CargarAlumnosLiberacion.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   
                                                       location.href='./LiberacionAlumnos.php';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   
                                                }
                                            },
                                        error:function(){
                                            alert('Error');
                                        }
                                            
                  });
    });
    
      $('#AgregaAlumnoLiberacion').click(function(){
                  var NoControl=document.getElementById("NoControl").value;
                  var Clave=document.getElementById("ClaveLibera").value;
               
            $.ajax({
                                        type:'POST',
                                        data:{NoControl:NoControl,Clave:Clave},
                                        url:'./CargarAlumnosLiberacion.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   
                                                       location.href='./ModificarLiberacion.php?ClaveLibera='+Clave+'';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   
                                                }
                                            },
                                        error:function(){
                                            alert('Error');
                                        }
                                            
                  });
    });
      
      
    //buscar alumnos 
    $( "#NoControl").autocomplete({
      source: "./buscarAlumno.php",
      minLength: 1
    });

    
    //obtener datos del tutor
    $( "#ClaveMaestro").autocomplete({
      source: "./buscartutor.php",
      minLength: 1
    });
 
    
    
    
     $("#ClaveTutor").change(function(){
                        $("#ClaveTutor option:selected").each(function(){
                                    ClaveTutor=$(this).val();
                                    
                                    $.ajax({
                                             url:'./tutor.php',
                                             type:'POST',
                                             dataType:'json',
                                             data:{ ClaveMaestro:ClaveTutor},
                                             success:function(respuesta)
                                             {
                                                 $("#Nombre").val(respuesta.Nombre);
                                                 $("#RFC").val(respuesta.Rfc);
                                                 //document.getElementById('Nombre').innerHTML=respuesta.Nombre;
                                                 
                                             }
                                    
                                    });
                        });
    });
    
   
   $('#ModificarLiberacion').click(function(){
                            var datos=$('#FormModificarLiberacion').serialize();//crea cadena
                                    
                                     $.ajax({
                                        type:'POST',
                                        data:datos,
                                        url:'./ActualizarLiberacion.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                  
                                                       $('#Success').modal('show');
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                }
                                            },
                                        error:function(){
                                            alert('error');
                                        }
                                            
                                });
                        });
    
    
    //Modificar Actividad
    $('#ModificarActividad').click(function(){
                            var datos=$('#FormModificarActividad').serialize();//crea cadena
                                  
                                     $.ajax({
                                        type:'POST',
                                        data:datos,
                                        url:'./ActualizarActividad.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                  
                                                       $('#Success').modal('show');
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                }
                                            },
                                        error:function(){
                                            alert('error');
                                        }
                                            
                                });
                        });
    
    $('#ModificarAsignacion').click(function(){
                            var datos=$('#FormModificarTutoria').serialize();//crea cadena
                                   
                                     $.ajax({
                                        type:'POST',
                                        data:datos,
                                        url:'./ActualizarTutoria.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                  
                                                       $('#Success').modal('show');
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                }
                                            },
                                        error:function(){
                                            alert('error');
                                        }
                                            
                                });
                        });
    
    
    
    //VENTANAS MODALES
     $('#GuardarActividadComple').click(function(){
                            var datos=$('#FormActividadComple').serialize();//crea cadena
                                 
                                     $.ajax({
                                        type:'POST',
                                        data:datos,
                                        url:'./GuardarActividadComple.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   //$('#alert').modal('show');
                                                   
                                                       $('#NuevoAlumno').modal('hide');
                                                       location.href='./Complementarias.php';
                                                       $('#Success').modal('show');
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   // alert('archivo no creado');
                                                }
                                            },
                                        error:function(){
                                            alert('error');
                                        }
                                            
                                    });
      });
     
     
      $('#ModificarActividadComple').click(function(){
                            var datos=$('#FormModificarActividadComple').serialize();//crea cadena
                                  
                                     $.ajax({
                                        type:'POST',
                                        data:datos,
                                        url:'./ActualizarActividadComple.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                  
                                                       
                                                       location.href='./Complementarias.php';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                }
                                            },
                                        error:function(e){
                                            alert('error'+e);
                                        }
                                            
                                });
                        });
    
    $('#GuardarAlumno').click(function(){
                            var datos=$('#FormAlumno').serialize();//crea cadena
                                   
                                     $.ajax({
                                        type:'POST',
                                        data:datos,
                                        url:'./GuardarAlumno.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   //$('#alert').modal('show');
                                                   
                                                       $('#NuevoAlumno').modal('hide');
                                                       location.href='./Alumnos.php';
                                                       $('#Success').modal('show');
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   // alert('archivo no creado');
                                                }
                                            },
                                        error:function(){
                                            alert('error');
                                        }
                                            
                                    });
      });
    
    
    //Para modificar a un alumno
     $('#ModificarAlumno').click(function(){
                            var datos=$('#FormModificarAlumno').serialize();//crea cadena
                                   
                                     $.ajax({
                                        type:'POST',
                                        data:datos,
                                        url:'./ActualizarAlumno.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                  
                                                       
                                                       location.href='./Alumnos.php';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                }
                                            },
                                        error:function(e){
                                            alert('error'+e);
                                        }
                                            
                                });
                        });
    
     //VENTANAS MODAL Personal
    $('#GuardarPersonal').click(function(){
                            var datos=$('#FormPersonal').serialize();//crea cadena
                                    
                                     $.ajax({
                                        type:'POST',
                                        data:datos,
                                        url:'./GuardarPersonal.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                   //$('#alert').modal('show');
                                                   
                                                       $('#NuevoPersonal').modal('hide');
                                                       location.href='./Personal.php';
                                                       $('#Success').modal('show');
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                   // alert('archivo no creado');
                                                }
                                            },
                                        error:function(){
                                            alert('error');
                                        }
                                            
                                    });
      });
    
    
    //Para modificar a un alumno
     $('#ModificarPersonal').click(function(){
                            var datos=$('#FormModificarPersonal').serialize();//crea cadena
                                  
                                     $.ajax({
                                        type:'POST',
                                        data:datos,
                                        url:'./ActualizarPersonal.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                                if(resultado.exito)
                                                {
                                                  
                                                       
                                                       location.href='./Personal.php';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                }
                                         },
                                        error:function(){
                                            alert('error');
                                        }
                                            
                                });
     });
                        
    $('#CambiarNipButton').click(function(){
                            var password=document.getElementById("password").value;
                           
                                     $.ajax({
                                        type:'POST',
                                        data:{password:password},
                                        url:'./ActualizarNip.php',
                                        dataType:'json',                            
                                        success:function(resultado)
                                        {
                                           if(resultado.exito)
                                                {
                                                   alert('La Contraseña se ha modificado...');
                                                       location.href='./VerificaPassword.php';
                                                      
                                               }
                                                else
                                                {
                                                      $('#Error').modal('show');
                                                }
                                         },
                                        error:function(){
                                            alert('error');
                                        }
                                            
                                });
     });


    //Tablas

    $('#Tabla').DataTable({
            //"order":[[1,asc]] es para ordenar por el nombre
            "language":{
                  "lengthMenu":"Mostrar _MENU_ registros por pagina",
                  "info":"Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty":"No hay registros disponibles",
                        "infoFiltered":"(filtrada de _MAX_ registros)",
                        "loadingRecords":"Cargando....",
                        "processing":"Procesando....",
                        "search":"Buscar:",
                        "zeroRecords":"No se encontraron registros coincidentes",
                        "paginate":{
                              "next":"Siguiente",
                              "previous":"Anterior"
                        },
            }
      });
    
     $('#Tabla1').DataTable({
            //"order":[[1,asc]] es para ordenar por el nombre
            "language":{
                  "lengthMenu":"Mostrar _MENU_ registros por pagina",
                  "info":"Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty":"No hay registros disponibles",
                        "infoFiltered":"(filtrada de _MAX_ registros)",
                        "loadingRecords":"Cargando....",
                        "processing":"Procesando....",
                        "search":"Buscar:",
                        "zeroRecords":"No se encontraron registros coincidentes",
                        "paginate":{
                              "next":"Siguiente",
                              "previous":"Anterior"
                        },
            }
      });
    
    
});


