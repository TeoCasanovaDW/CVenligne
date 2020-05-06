<?php 

namespace Teo\CVenligne\controller;

use \Teo\CVenligne\Model\ProjectManager;
use \Teo\CVenligne\Model\CommentsManager;
use \Teo\CVenligne\Model\AdminManager;

class Controller
{

    /* PAGES */

    public function displayHomePage(){
        require('./view/frontend/homeView.php');
    }

    public function displayPortfolioPage(){
        $projectManager = new ProjectManager();
        $projects = $projectManager->displayProjects();

        require('./view/frontend/portfolioView.php');
    }

    public function displayFormationPage(){
        require('./view/frontend/formation_diplomeView.php');
    }

    public function displayContactPage(){
        require('./view/frontend/contactView.php');
    }

    public function displayTheProject(){
        $projectManager = new ProjectManager();
        $commentManager = new CommentsManager();

        $project = $projectManager->displayProject($_GET['p_id']);


        if($project){
            $comments = $commentManager->getComments($_GET['p_id']);
            require('./view/frontend/projectView.php');
        }
        else{
            throw new \Exception('Mauvais identifiant de projet');
        }
    }

    public function createProject(){
        $adminManager = new AdminManager();
        $createdProject = $adminManager->createProject($_POST['titleCreated'], $_POST['project_link'], $_POST['desc'], $_POST['image']);

        header('Location: index.php?action=adminPage');
    }

    public function displayProjectToUpdate(){
        $adminManager = new AdminManager();
        $display = $adminManager->displayProject($_GET['p_id']);
        $displayProjectToUpdate = $display->fetch();
        if($displayProjectToUpdate){
            require('./view/backend/adminUpdateView.php');
        }
        else{
            throw new \Exception('Le post n\'existe pas');
        }
    }

    public function updateProject(){
        $adminManager = new AdminManager();
        $updateProject = $adminManager->updateProject($_POST['titleUpdated'], $_POST['project_linkUpdated'], $_POST['descUpdated'], $_POST['imageUpdated'], $_GET['p_id']);

        header('Location: index.php?action=adminPage');
    }

    public function deleteProject(){
        $adminManager = new AdminManager();
        $deleteProject = $adminManager->deleteProject($_GET['p_id']);

        header('Location: index.php?action=adminPage');
    }

    public function addComment($project_id, $name, $firstname, $comment){
        $commentManager = new CommentsManager();

        $affectedLines = $commentManager->postComment($project_id, $name, $firstname, $comment);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=project&p_id=' . $project_id);
        }
    }

    public function reportComment(){
        $commentManager = new CommentsManager();

        $reportedComment = $commentManager->reportComment($_GET['comment_id']);

        header('Location: index.php?action=home');
    }

    public function displayCommentEditor(){
        $commentManager = new CommentsManager();

        $old_comment = $commentManager->displayCommentEditor($_GET['comment_id']);

        require('./view/backend/modifyCommentView.php');
    }

    public function editComment($newComment)
    {
        $commentManager = new CommentsManager();

        $affectedComments = $commentManager->modifyComment($newComment, $_GET['comment_id']);

        header('Location: index.php?action=adminPage');
    }

    public function removeReport(){
        $commentManager = new CommentsManager();

        $removedReport = $commentManager->removeReport($_GET['comment_id']);

        header('Location: index.php?action=adminPage');
    }
    
    public function deleteComment(){
        $commentManager = new CommentsManager();
        $deletedComment = $commentManager->deleteComment($_GET['comment_id']);

        if($deletedComment){
            header('Location: index.php?action=adminPage');
        }
        else{
            throw new \Exception('impossible de supprimer le commentaire');
        }
    }

    public function sendAMail(){
        require('./view/frontend/mailView.php');
    }







    public function displayConnexionPage(){
        $adminManager = new AdminManager();
        $adminManager->getConnexionPage();

        require('./view/frontend/connexionAdminView.php');
    }

    public function getConnected(){
        $adminManager = new AdminManager();

        $user = $adminManager->getConnected();

        if($_POST['user'] == $user['user'] && password_verify($_POST['password'], $user['password'])){
            $_SESSION['isLoggedIn'] = true;
            header('Location: index.php?action=adminPage');
        }
        else{
            throw new \Exception('Mauvais identifiants !');
        }
    }

    public function displayAdminPage(){

        $projectManager = new ProjectManager();
        $commentManager = new CommentsManager();   
        $project = $projectManager->displayProjects();
        $AllComments = $commentManager->getAllComments();

        require('./view/backend/adminView.php');
    }

}