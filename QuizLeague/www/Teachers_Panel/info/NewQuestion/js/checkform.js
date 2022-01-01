var mustreset=true;
function check(){
    var TextboxObject = document.getElementById('question_mainbody');
    if(TextboxObject.value==='' || TextboxObject.value.split(' ').length <10){
        TextboxObject.style="Color:red;"
        TextboxObject.value="Συμπληρώστε το κείμένο της ερώτησης το οποίο πρέπει να υπερβαίνει τις 10 λέξεις! :) ";
        mustreset=true;
    }
    else if(TextboxObject.style.color=='red'){
        TextboxObject.value="Υποβάλλετε μια σωστή ερώτηση στο σύστημα";
        mustreset=true;
    }
    else{
        document.getElementById("ConfirmButton").submit();
    }

}
function resetstyle(){
    if(mustreset){
        var TextboxObject = document.getElementById('question_mainbody');
        TextboxObject.style="Color:black;"
        TextboxObject.value="";
        mustreset=false;
    }
}

