<?php

class IndexController
{
	public function indexAction()
	{
			$view = new View;
			$view->setView("default/index.html");
	}
}
