function hora(){
var fecha = new Date()
var hora = fecha.getHours()
var minuto = fecha.getMinutes()
var segundo = fecha.getSeconds()
if(hora>=12 && hora<=23)
m="P.M"
else
m="A.M"
if (hora < 10) {hora = "0" + hora}
if (minuto < 10) {minuto = "0" + minuto}
if (segundo < 10) {segundo = "0" + segundo}
var nowhora = "[ " + hora + ":" + minuto + ":" + segundo + " - " + m + " ]"
document.getElementById('hora').firstChild.nodeValue = nowhora
tiempo = setTimeout('hora()',1000)
}