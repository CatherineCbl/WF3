// Déclaration : On crée la fonction
function additionner(nb1, nb2, op ) {
	switch(op) {
    case '+' :
    result = nb1 + nb2
    break;

    case '-' :
    result = nb1 - nb2;
    break;

    case '*' :
    result = nb1 * nb2;
    break;

    case '/' :
    result = nb1 / nb2;
    break;
    }
    document.write("Le résultat est:" + result);
}

additionner(150,5);    
