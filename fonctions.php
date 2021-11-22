<?php
session_start();
require './requete.php';

function inscription()
{
    $verif_nom_util = req_list_util($_POST['login']);
    if ($_POST['password1'] != $_POST['password2']) {
        echo 'Les mot de passes ne correspondent pas';
        return;
    }
    if (isset($verif_nom_util[0]['login'])) {
        echo "L'utilisateur existe déjà";
        return;
    }
    if ($_POST['login'] != '' && $_POST['password1'] != '') {
        ins_util($_POST['login'], $_POST['password1']);
        echo 'Utilisateur enregistré, redirection vers la page de connexion...';
        header('Refresh:2 ; URL=connexion.php');;
        return;
    } else {
        if (!empty($_POST)) {
            echo 'Le login/mot de passe ne doit pas être vide';
            return;
        }
    }
}
function connexion()
{
    $req = req_log_util($_POST['username'], $_POST['password']);
    if (!empty($_POST)) {
        if ($req[0]['login'] == $_POST['username'] && $req[0]['password'] == $_POST['password']) {
            $_SESSION['user'] = $_POST['username'];
            $_SESSION['id'] = $req[0]['id'];
            echo 'Bonjour ' . ucfirst($_POST['username']) . ', redirection en cours...';
            header('location:index.php');;
        } else {
            echo 'Mot de passe/login faux';
            return;
        }
    }
}

function estconnect()
{
    if (isset($_SESSION['user'])) {
        $conn = true;
        return $conn;
    }
}

function redirect_nonconnecte()
{
    $conn = estconnect();
    if ($conn != TRUE) {
        header('location:inscription.php');
    }
}

function modif_profil($login)
{
    $list_util = req_list_util_profil($login);
    foreach ($list_util as $element) {
        foreach ($element as $element2) {
            if (isset($_POST['login']) && $element2 == $_POST['login']) {
                echo 'Cet utilsateur existe déjà';
                return;
            }
        }
    }
    if ($_POST['password1'] != $_POST['password2']) {
        echo 'Les mots de passes ne sont pas identiques.';
        return;
    }
    if ($_POST['login'] != '' && $_POST['password1'] != '') {
        modif_util($_POST['login'], $_POST['password1']);
        echo 'Utilisateur modifié..';
        header('Refresh:1');;
        return;
    } else {
        if (!empty($_POST)) {
            echo 'Le login/mot de passe ne doit pas être vide';
            return;
        }
    }
}

function deconnection()
{
    if (isset($_POST['deconn'])) {
        session_destroy();
        header('location: ./connexion.php');
    }
    if (isset($_POST['conn'])) {
        header('location: ./connexion.php');
    }
}

function ins_commentaire($commentaire)
{
    if (isset($commentaire)) {
        if (strlen(str_replace(' ', '', $commentaire)) <= 8) {
            echo 'Il faut 8 charactères minimum (espace non compris)';
            return;
        }
        else {
            req_ins_commentaire($commentaire,$_SESSION['id']);
            echo 'Commentaire envoyé';
            header('Refresh:2');
        }
        
    }
}

function affiche_commentaire() {
    $commentaire = req_commentaire();
    return $commentaire;
}
