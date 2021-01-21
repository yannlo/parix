var add_plat = document.getElementById("ajout_plat");


add_plat.addEventListener("click", function(event){
    event.preventDefault();

    var popup = document.getElementsByClassName("popup")[0];
    popup.style.display = "table";
});


let checker3 = document.getElementById("checker3");

checker3.addEventListener('click',function(event){
    
    event.stopPropagation();
    let popup = document.getElementsByClassName('popup')[0];
    popup.style.display= "none";


});


var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };