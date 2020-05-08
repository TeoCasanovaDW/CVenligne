<?php

namespace Teo\CVenligne\Model;

require_once('Manager.php');

class ProjectManager extends Manager
{
	public function displayProjects(){
		$db = $this->dbConnect();
        $projects = $db->query('SELECT id, title, img, project_link, description, skills, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%im%ss\') AS creation_date_fr FROM portfolio');

        return $projects;
	}

	public function displayProject($project_id){
		$db = $this->dbConnect();
        $project = $db->prepare('SELECT id, title, project_link, description, img, skills, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%im%ss\') AS creation_date_fr FROM portfolio WHERE id=?');
        $project->execute(array($project_id));

        return $project;
	}

}


