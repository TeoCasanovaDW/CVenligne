<?php

namespace Teo\CVenligne\Model;

require_once('Manager.php');

class AdminManager extends ProjectManager
{

	public function getConnexionPage(){
		$db = $this->dbConnect();
		$user = $db->query('SELECT * FROM `admin` WHERE id= 1');

		return $user;
	}

	public function getConnected(){
		$db = $this->dbConnect();
		$userConnect = $db->query('SELECT user, password FROM `admin` WHERE id= 1');
		$userConnected = $userConnect->fetch();

		return $userConnected;
	}

	public function createProject($title, $project_link, $desc, $image){
		$db = $this->dbConnect();
		$post = $db->prepare('INSERT INTO `portfolio`(`title`, `project_link`, `description`, `img`, `creation_date`) VALUES (?, ?, ?, ?, NOW())');
		$createdProject = $post->execute(array($title, $project_link, $desc, $image));

		return $createdProject;
	}

	public function updateProject($title, $project_link, $desc, $image, $project_id){
		$db = $this->dbConnect();
		$project = $db->prepare('UPDATE `portfolio` SET `title`=?, `project_link`=?, `desc`=?, `image`=?, `creation_date`=NOW() WHERE id=?');
		$updateProject = $project->execute(array($title, $project_link, $desc, $image, $project_id));

		return $updateProject;
	}

	public function deleteProject($project_id){
		$db = $this->dbConnect();
		$project = $db->prepare('DELETE FROM `portfolio` WHERE id= ?');
		$deletedProject = $project->execute(array($project_id));

		return $deletedProject;
	}
}