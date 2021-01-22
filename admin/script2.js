var tab = [];

var add_plat = document.getElementById("ajout_plat");


add_plat.addEventListener("click", function(event){
    event.preventDefault();

    var popup = document.getElementsByClassName("popup")[0];
    popup.style.display = "table";
});


var sup_plat = document.getElementById("suppression_plat");


sup_plat.addEventListener("click", function(event){
    event.preventDefault();

    var popup = document.getElementsByClassName("popup")[1];
    popup.style.display = "table";
});

let checker3 = document.getElementById("checker3");

checker3.addEventListener('click',function(event){
    
    event.stopPropagation();
    let popup = document.getElementsByClassName('popup')[0];
    popup.style.display= "none";


});

let checker2 = document.getElementById("checker2");

checker2.addEventListener('click',function(event){
    
    event.stopPropagation();
    let popup = document.getElementsByClassName('popup')[1];
    popup.style.display= "none";


});


var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };


  function trans_action(val,resert="on",table=tab){
    var echor = document.getElementById("medic"+val);
    // selection
    let boole = false;
    let index=0;
    if (val != 0) {
        for(var i=0; i<table.length; i++) {
            if(val == table[i]) {
                boole=true;
                index = i;
            }
        }
    
        if(boole){
            table.splice(index, 1);
            echor.style.display = "none";
        }else{
            table.push(val);
            echor.style.display = "block";   
        } 
    }else{

        for(var i=0; i<table.length; i++) {
            var echor = document.getElementById("medic"+table[i][0]);
            echor.style.display = "none";

        }
        tab=[];
        table=[];
    }
}


document.getElementById("confirmer_suo").addEventListener("click", function(event){

    event.preventDefault();

        // console.log(JSON.stringify(table));
        data = JSON.stringify(tab);
    

        // traitement 
    
    
        var xhr = new XMLHttpRequest();
    
        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.response);
                document.location.href="menu.php";
    
            }else if(this.readyState== 4){
    
    
            }
        };
    
        xhr.open("POST", "../php_acces/supp_plat.php", true);
        // xhr.responseType ="json";
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("var="+data);
    


});