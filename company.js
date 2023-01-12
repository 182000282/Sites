let contador = 1;

setInterval( function(){
    contador++
    
    if (contador>4){
        contador = 1;
    }
    document.getElementById('radioc'+contador).checked = true;
    document.getElementById('radiof'+contador).checked = true;
}, 5000)