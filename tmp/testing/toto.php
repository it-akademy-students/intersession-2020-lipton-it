<?php
setcookie("nom_du_cookie", "données personnelles stockées", time()+3600);
if(isset($_GET['prenom']) && !empty($_GET['prenom'])){
    // On ne protège pas l'accès aux données
    $prenom = $_GET['prenom'];
}
?>

<form method="get">
    <input type="text" name="prenom">
    <button>Valider</button>
</form>

<?php
    // On affiche la saisie du formulaire
    if(isset($prenom)){
        echo $prenom;
    };
