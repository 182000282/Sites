let contador = 1;

setInterval( function(){
    contador++
    
    if (contador>4){
        contador = 1;
    }
    document.getElementById('radio'+contador).checked = true;
}, 3000)