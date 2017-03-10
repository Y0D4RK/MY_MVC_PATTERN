<?php

class View
{
	protected $data = [];
	protected $view;
	protected $template;

	public function setView($view, $layout = "template.html")
	{
		$path_view = "views/".$view.".php";
		$path_template = "views/".$layout.".php";

		if (file_exists($path_view))
		{
			$this->view = $path_view;
			if (file_exists($path_template))
			{
				$this->template = $path_template;
			}
			else
			{
				die("le template n'existe pas");
			}
		}
		else
        {
			die("erreur template, la vue n'existe pas");
		}
	}

	public function createForm($form, $errors)
    {
		global $errors_msg;
		include "views/form/form.html.php";
	}

	public function assign($key, $value)
	{
		$this->data[$key] = $value;
	}

	public function __destruct()
	{
		extract($this->data);
		include $this->template;
	}

}