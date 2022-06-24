function insertCont(){
    let cont = '15:00';
    document.getElementById("cont").textContent = cont;
}

let sec = 0;
let min = 15;
function contRegressive() {
     setInterval(watch,1000)
}
function watch(){
    if(sec == 00 && min == 0){
     }else{
        if(sec == 0){
            min--;
            sec = 60;
        }
        sec--;
    }
    document.getElementById('cont').textContent = addZero(min) + ':'+ addZero(sec);
}
addZero = (a) => {
    if(a < 10){
        return "0" + a;
    }else {
        return a.toString();
    } 
}
$(document).ready(function(){
    $('#botao-pix').click(function(){    
        $('#botao-pix').hide()
    })
});
