function validerform() {
   
  
    var t= document.getElementById("TitreQ").value;
    var c = document.getElementById("Category").value;
    var d = document.getElementsByName("DesQ").value;
    var errort = document.getElementById('errort');
    var errorc = document.getElementById('errorc');
    var errord = document.getElementById('errord');

    if (t == "") {
        errort.innerHTML = "Veuillez entrer TitreQ";
        return false;
    }
 /* if(c==""){
      errorc.innerHTML="Veuillez Entrer Category"
  }
  if (d="")
  {
    errord.innerHTML="Veuillez Entrer Description"
  }*/

}
/*const Filter=require("bad-words");
const filter=new Filter();
filter.addwords("aziz","iheb");
filter.clean("");*/

           
