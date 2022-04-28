function validateForm() {
    var mat = document.getElementById("matricule").value;
    var mar = document.getElementById("marque").value;
    var pi = document.getElementById("prix").value;
    var errormat = document.getElementById('errorMat');
    var errormar = document.getElementById('errorMar');
    var errorpr = document.getElementById('errorPr');

    if ((mat == "") || (mat.indexOf("TU") == -1)) {
        errormat.innerHTML = "Veuillez entrer une matricule !";
        return false;
    } else if (mar == "") {
        errormar.innerHTML = "Veuillez entrer une marque !";
        return false;
    } else if ((et == "") || (et.indexOf("%") == -1)) {
        erroret.innerHTML = "Veuillez l etat du voiture !";
        return false;
    } else if ((pi == "") || (isNaN(pi) == true)) {
        errorpr.innerHTML = "Veuillez entrer le prix !";
        return false;
    }

}

