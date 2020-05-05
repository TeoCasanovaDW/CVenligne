<?php

session_start();

use \Teo\CVenligne\controller\Controller;

require_once('controller/controller.php');

$controller = new Controller();

try{

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'home') {
            $controller->displayHomePage();
        }
        elseif ($_GET['action'] == 'formation') {
        	$controller->displayFormationPage();
        }
        elseif ($_GET['action'] == 'portfolio') {
        	$controller->displayPortfolioPage();
        }
        elseif ($_GET['action'] == 'contact') {
        	$controller->displayContactPage();
        }
        elseif ($_GET['action'] == 'project') {
            if ($_GET['p_id'] && $_GET['p_id'] > 0) {
                $controller->displayTheProject();
            }
            else{
                throw new Exception('Mauvais id de projet');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if ($_GET['p_id'] && $_GET['p_id'] > 0) {
                if(!empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['content'])){
                    $controller->addComment($_GET['p_id'], $_POST['name'], $_POST['firstname'], $_POST['content']);
                }
                else{
                    throw new Exception('Vous n\'avez pas rempli correctement tout les champs');
                }
            }
            else{
                throw new Exception('Mauvais identifiant de projet');
            }
        }
        elseif($_GET['action'] == 'report'){
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0){
                $controller->reportComment();
            }
            else{
                throw new Exception('pas d\'id de commentaire');
            }
        }
        elseif ($_GET['action'] == 'mail') {
            if ($_POST['nom'] && $_POST['objet'] && $_POST['message']) {
                $controller->sendAMail();
            }
            else{
                throw new Exception('Vous n\'avez pas rempli tout les champs');
            }
        }
        elseif($_GET['action'] == 'connexionPage'){
            $controller->displayConnexionPage();
        }
        elseif($_GET['action'] == 'adminConnect'){
            if ($_POST['user'] && $_POST['password']) {
                $controller->getConnected();
            }
            else{
                throw new Exception('Veuillez renseigner un identifiant et un mot de passe');
            }
        }

        /* ADMIN */

        elseif (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {

            if ($_GET['action'] == 'adminPage') {
                $controller->displayAdminPage();
            }
            elseif ($_GET['action'] == 'deconnexion') {
                $_SESSION['isLoggedIn'] = false;
                $controller->displayHomePage();
            }
            elseif ($_GET['action'] == 'createPost') {
                if (!empty($_POST['titleCreated']) && !empty($_POST['project_link']) && !empty($_POST['desc']) && !empty($_POST['image'])) {
                    $controller->createProject();
                }
                else{
                    throw new Exception('Veuillez renseigner tout les champs disponibles');
                }
            }
            elseif ($_GET['action'] == 'adminUpdatePage') {
                if (isset($_GET['p_id'])) {
                    $controller->displayProjectToUpdate();
                }
                else{
                    throw new Exception('pas d\'identifiant de billet');
                }
            }
            elseif ($_GET['action'] == 'updateProject'){
                if (!empty($_POST['titleUpdated']) && !empty($_POST['project_linkUpdated']) && !empty($_POST['descUpdated']) && !empty($_POST['imageUpdated'])) {
                    if (isset($_GET['p_id'])) {
                        $controller->updateProject();
                    }
                    else{
                        throw new Exception('pas d\'identifiant de billet');
                    }
                }
                else{
                    throw new Exception('Veuillez renseigner un titre et un contenu');
                }
            }
            elseif ($_GET['action'] == 'deleteProject') {
                if (isset($_GET['p_id'])) {
                    $controller->deleteProject();
                }
                else{
                    throw new Exception('pas d\'identifiant de billet détecté');
                }
            }
            elseif ($_GET['action'] == 'commentEditor') {
                if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                    $controller->displayCommentEditor();
                }
                else{
                    throw new Exception('pas d\'identifiant de commentaire');
                }
            }
            elseif ($_GET['action'] == 'editComment') {
                if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                    if (!empty($_POST['newComment'])) {
                        $controller->editComment($_POST['newComment']);
                    }
                    else{
                        throw new Exception('aucun nouveau commentaire détecté');
                    }
                }
                else{
                    throw new Exception('aucun identifiant de commentaire envoyé');
                }
            }
            elseif ($_GET['action'] == 'removeReport') {
                if($_GET['comment_id']){
                    $controller->removeReport();
                }
                else{
                    throw new Exception('impossible d\'enlever le report');
                }
            }
            elseif ($_GET['action'] == 'deleteComment') {
                $controller->deleteComment();
            }
            else{
                throw new Exception('Cette page n\'existe pas');
            }

        }


        
        else{
        	throw new Exception('Page indisponible');
        }
    }
    else{
        $controller->displayHomePage();
    }
        
}
catch(Exception $e){
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}