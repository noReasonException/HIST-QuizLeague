mustreset=true;


function SearchBoxReset(){
    console.log('Cls');
    var SearchBoxObject = document.getElementById('SearchBox');
    if(mustreset || SearchBoxObject.style.color=='red'){
        SearchBoxObject.value='';
        SearchBoxObject.style='color:black;';
        mustreset=false;
    }

}
function SubmitPrecheck(){
    var SearchBoxObject = document.getElementById('SearchBox');
    if(SearchBoxObject.value=='' || SearchBoxObject.value=='Πληκρολογήστε όνομα για αναζήτηση'||
        SearchBoxObject.value.split(' ')>=3){
        SearchBoxObject.value="Πληκρολογήστε ενα σωστό όνομα χρήστη";
        SearchBoxObject.style='color:red;';
    }
    else if(SearchBoxObject.value.split('').length<4){
        SearchBoxObject.value="Η αναζήτηση πρέπει να περιέχει 4 και παραπάνω χαρακτήρες!";
        SearchBoxObject.style='color:red;';
    }
    else{
        var formObject = document.getElementById('SearchForm');
        formObject.submit();
    }
}