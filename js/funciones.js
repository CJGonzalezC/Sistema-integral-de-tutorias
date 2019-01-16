/* funciones varias parar aprendizaje
 *
 * f*/
function agregatexto(){
    //var aMeta=document.getElementsByTagName('meta');
    var oPrueba=document.getElementById('prueba');
    oPrueba.innerHTML='Existen etiquetas meta';
    oPrueba.style.color='#ff0';
    
}
function creatabla(nrenglon=4,ncolumnas=3){
     var oPrueba=document.getElementById('prueba');
    oPrueba.innerHTML='Existen etiquetas meta';
    oPrueba.style.color='#ff0';
    
    
var ocontenedor=document.getElementById('divTabla');
var tabla = document.createElement('table');
var tblbody = document.createElement('tbody');

for(var i=0;i<nrenglon;i++){
    var registro=document.createElement('tr');
    for(var j=0;j<ncolumnas;j++)
    {
        var columna=document.createElement('td');
        var textocelda=document.createTextNode('R'+(i+1)+',C'+(j+1));
        columna.appendChild(textocelda);
        registro.appendChild(columna);
    }
    tblbody.appendChild(registro);
}
tabla.appendChild(tblbody);
ocontenedor.appendChild(tabla);
tabla.className="datos";
}

function borratabla(){
    var otabla=document.getElementsByTagName('table');
    otabla[0].parentNode.removeChild(otabla[0]);
}