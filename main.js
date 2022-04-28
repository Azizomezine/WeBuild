function verif()
{
    if((f.nom.value.charAt(0)<"A") ||  (f.nom.value.charAt(0)>"Z"))
    {
        alert("Nom et Prénom doivent être des lettres et commençant par des majuscules.");
        return false;
            
    }
    else if((f.prenom.value.charAt(0)<"A") ||  (f.prenom.value.charAt(0)>"Z"))
    {
        alert("Nom et Prénom doivent être des lettres et commençant par des majuscules.");
        return false;
            
    }
    
   else if((f.username.value.charAt(0)<"A")||  (f.username.value.charAt(0)>"Z"))
    {
        alert("Username doit être des lettres et commençant par des majuscules.");
        return false;
            
    }

    if (f.email.value.indexOf("@")==-1)
    {
        alert("le champ doit contenir @");
        return false;
    }
    else if (f.email.value.indexOf(".")==-1)
    {
        alert("le champ doit contenir .");
        return false;
    }
    
    
    if (isNaN(f.gsm.value.charAt(0) )==true)
    {
        alert("gsm doit etre numerique");
        return false;

    }


    else if (f.gsm.value.length != 8)
    {
    alert("gsm doit contenir 8 chiffres" );
    return false;
    } 

   
    return false;
}