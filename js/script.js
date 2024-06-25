function toggleObtenue(id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_obtenue.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Réponse reçue du serveur, vous pouvez mettre à jour l'interface utilisateur si nécessaire
            location.reload(); // Recharge la page pour afficher les mises à jour
        }
    };
    xhr.send("id_pkm=" + id);
}

function editInfo(pkmId, methodName, counter) {
    // Vous pouvez utiliser ici une bibliothèque de modale ou simplement afficher un div pour l'édition
    // Par exemple, vous pouvez utiliser Bootstrap pour une modale
    // Ici, je montre simplement une alerte pour illustrer le concept
    alert("Modifier les informations pour le Pokémon avec l'ID: " + pkmId + "\nMéthode: " + methodName + "\nCompteur: " + counter);
}
