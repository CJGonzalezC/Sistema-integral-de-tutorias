$(document).ready(function(){
    $('#ValidaPassword').bootstrapValidator({
        live:'enabled', //se activa el key press con enabled
        submitButtons:'button[id="Cambiar"]',//esta por default type submit
        message: 'Este no es un valor valido',
        feedbackIcons:{valid:'fa fa-check',invalid:'fa fa-close',validating:'fa fa-refresh'},
        fields:{
            password:{
                validators:{
                    notEmpty:{
                        message: 'Es obligatorio'
                    },
                    regexp:{
                        regexp:
                        /^\S{4,20}$/,
                        message:'puede contener de 4 a 20 caracteres'
                    }
                }
            },
            confirmar:{
                validators:{
                    notEmpty:{
                        message: 'Es obligatorio'
                    },
                    identical:{
                        field:'password',
                        message:'El password debe de ser igual'
                    }
                }
            }
        }
        
        });//.on('success.form.bv',function(){
        //$('#password').val(sha1($('#password').val()));
        //});
    });