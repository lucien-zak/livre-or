<?php

function connexion_bdd(){
    $db = mysqli_connect("localhost", "root", "root", "lucien-zak_livreor");
    return $db;
}


function req_log_util($log,$pass) {
    $db = connexion_bdd();
    $req = mysqli_query($db, "SELECT * FROM `utilisateurs` WHERE login='$log' AND password='$pass'");
    $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
    return $res;   
}

function req_list_util($log) {
    $db = connexion_bdd();
    $req = mysqli_query($db, "SELECT login FROM `utilisateurs` WHERE login='$log'");
    $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
    return $res;
}

function req_list_util_profil($log) {
    $db = connexion_bdd();
    $req = mysqli_query($db, "SELECT login FROM `utilisateurs` WHERE `login`!='$log'");
    $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
    return $res;
}

function ins_util($log,$mdp){
    $db = connexion_bdd();
    mysqli_query($db, "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('$log','$mdp')");
}

function modif_util($log, $pass){
    $db = connexion_bdd();
    mysqli_query($db, "UPDATE `utilisateurs` SET `login`='$log',`password`='$pass' WHERE login='$log' ");
}

function req_ins_commentaire($comm,$id) {
    $db = connexion_bdd();
    $date = date('d.m.y H:i:s');
    mysqli_query($db, "INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('$comm','$id','$date')");
}

function req_commentaire() {
    $db = connexion_bdd();
    $req = mysqli_query($db, "SELECT `commentaires`.`commentaire` , `commentaires`.`date` , `utilisateurs`.`login` FROM `commentaires` INNER JOIN `utilisateurs` ON `commentaires`.`id_utilisateur` = `utilisateurs`.`id` ORDER BY `date` DESC;");
    $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
    return $res;
}


?>