//archivo para validar login
window.onload=(function(){
     var oInputs=document.getElementsByTagName('input');
    oInputs[0].focus();
    });
//document.forms[0].usuario.focus();
//Exclusivo para html solo poner en el input autofocus="autofocus"
/*function Validar(){
    var usuario=document.getElementById('usuario').value;
    if(usuario==null||usuario.length==0||/^\s*$/.test(usuario)){
    alert('noo cumple')
    return false;*/
   // }
//}

function Validar(oform){
    var usuario=oform.usuario.value;
    if(usuario==null||usuario.length==0||/^\s*$/.test(usuario)){
    oform.usuario.parentNode.classList.add('has-error');
    oform.usuario.placeholder='error en usuario';
    ofrom.usuario.focus()
    return false;