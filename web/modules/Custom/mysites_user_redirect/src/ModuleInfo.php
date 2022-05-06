<?php

	
namespace Drupal\mysites_user_redirect;

use Drupal\Core\Session\AccountProxy;

class ModuleInfo{

	public $name = 'Mysites User Redirect';
	public $type = 'module';
	public $description = 'Carries out page redirect based on user email';
	public $package = 'Custom';
	public $core = '8.x';

	public function __construct(AccountProxy $current_user){

		$this->current_user = $current_user;
	}

	public function getModDetails(){

		return "Name:" . $this->name . "<br/>" . "Type:" . $this->type . "<br/>" . "Description:" . $this->description . "<br/>" . "Package:" . $this->package . "<br/>" ."Core:" . $this->core;

	}

	public function getCurrentUser(){

		return $this->current_user->getDisplayName();
	}

}


