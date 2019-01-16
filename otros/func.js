
    
/* 
$('#botonn').click(function(){
       //var No=document.getElementById("ClaveTutoria").value;
        //var tu=document.getElementById("inp").value;
        alert(10);
        //document.getElementById("ClaveTutoria").innerHTML="10";
        /*
        $.post('cargarAlumnos.php',
               {No:No},
               function(data){$("#Alumnos").html(data);});
        
    });
*/

 /*
    $("#ClaveTutor").change(function(){
                       // $('ClaveMaestro').find('option').remove().end.append('<option value="whatever"></option>').val('whatever');
                        $("#ClaveTutor option:selected").each(function(){
                           ClaveTutor=$(this).val();
                           alert(ClaveTutor);
                           $.post('./getClave.php',{ClaveTutor:ClaveTutor},function(data){$("#NombreTutor").html(data);});
                           $.post('./getRFC.php',{ClaveTutor:ClaveTutor},function(data){$("#RFCTutor").html(data);});
                           //$.post('getboton.php',{ClaveMaestro:ClaveMaestro},function(data){$("#Mostrar").html(data);});  
                        });
    });*/
    
      /*
    
    $('#CargarAlumnosGrupo').click(function(){
        var No=document.getElementById("ClaveTutoria").value;
        //var tu=document.getElementById("inp").value;
        alert(No);
        document.getElementById("NoControl").innerHTML="10";
        
        $.post('./CargarAlumnosGrupo.php',
               {No:No},
               function(data){$("#Tabla").html(data);}); 
    });
    */
    
    
    $("#ClaveTutoria").focusout(function(){
      $.ajax({
        url:'./tutor.php',
          type:'POST',
          dataType:'json',
          data:{ ClaveMaestro:$('#ClaveTutoria').val()}}).done(function(respuesta){
          $("#Nombre").val(respuesta.Nombre);
          $("#RFC").val(respuesta.Rfc);
      });
    });