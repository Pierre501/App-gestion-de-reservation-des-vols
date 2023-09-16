function formaterNumeroTelephone(numero) 
{
    let numeroFormatte = "-------------------------";
    if(numero.length > 4)
    {
        // Supprimer tous les caractères non numériques du numéro de téléphone
        const numeroPropre = numero.replace(/\D/g, '');
    
        // Séparer le numéro en groupes avec des espaces
        const groupe1 = numeroPropre.slice(0, 3);
        const groupe2 = numeroPropre.slice(3, 5);
        const groupe3 = numeroPropre.slice(5, 7);
        const groupe4 = numeroPropre.slice(7, 10);
        const groupe5 = numeroPropre.slice(10);
    
        // Retourner le numéro de téléphone formaté
        numeroFormatte = `+${groupe1} ${groupe2} ${groupe3} ${groupe4} ${groupe5}`;
    }
    return numeroFormatte;
}
  