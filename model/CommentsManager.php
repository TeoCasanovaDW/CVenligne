<?php

namespace Teo\CVenligne\Model;

require_once('Manager.php');

class CommentsManager extends Manager
{
    public function getComments($project_id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, project_id, name, firstname, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM comments WHERE project_id = ? ORDER BY creation_date DESC');
        $comments->execute(array($project_id));

        return $comments;
    }

    public function getAllComments(){
        $db = $this->dbConnect();
        $AllComments = $db->query('SELECT id, project_id, name, report, firstname, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments ORDER BY project_id DESC');

        return $AllComments;
    }

    public function postComment($project_id, $name, $firstname, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO `comments`(`project_id`, `name`, `report`, `firstname`, `content`, `creation_date`) VALUES (?, ?, 0, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($project_id, $name, $firstname, $comment));

        return $affectedLines;
    }

    public function reportComment($comment_id){
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE `comments` SET `report`= report+1 WHERE id= ?');
        $reportedComment = $comment->execute(array($comment_id));

        return $reportedComment;
    }

    public function displayCommentEditor($comment_id){
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT content FROM comments WHERE id = ?');
        $comment->execute(array($comment_id));
        $old_comment = $comment->fetch();

        return $old_comment;
    }

    public function modifyComment($newComment, $comment_id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE `comments` SET `content`= ?,`creation_date`=NOW() WHERE id= ?');
        $affectedComments = $comments->execute(array($newComment, $comment_id));

        return $affectedComments;
    }

    public function deleteComment($comment_id){
        $db = $this->dbConnect();
        $comment = $db->prepare('DELETE FROM `comments` WHERE id=?');
        $deleteComment = $comment->execute(array($comment_id));

        return $deleteComment;
    }

    public function removeReport($comment_id){
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE `comments` SET `report`= 0 WHERE id= ?');
        $removeReport = $comment->execute(array($comment_id));

        return $removeReport;
    }
}