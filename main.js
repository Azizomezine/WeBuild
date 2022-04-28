function verif()
{
    if((f.nom.value.charAt(0)<"A") ||  (f.nom.value.charAt(0)>"Z"))
    {
        alert("Nom et Prénom doivent être des lettres et commençant par des majuscules.");
            
    }
    else if((f.prenom.value.charAt(0)<"A") ||  (f.prenom.value.charAt(0)>"Z"))
    {
        alert("Nom et Prénom doivent être des lettres et commençant par des majuscules.");
            
    }
    
    else if((f.username.value.charAt(0)<"A")||  (f.username.value.charAt(0)>"Z"))
    {
        alert("Username doivent être des lettres et commençant par des majuscules.");
            
    }

    if (f.email.value.indexOf("@")==-1)
    {
        alert("le champ doit contenir @")
    }
    else if (f.email.value.indexOf(".")==-1)
    {
        alert("le champ doit contenir .")
    }
    
    
    if (isNaN(f.gsm.value.charAt(0) )==true)
    {
        alert("gsm doit etre numerique")
    }


    else if (f.gsm.value.length != 8)
    {
    alert("le champ de saisi doit contenir 8 chiffres" );
    } 

}