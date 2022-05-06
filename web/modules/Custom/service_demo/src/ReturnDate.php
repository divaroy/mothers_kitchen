<?php


namespace Drupal\service_demo;

use Drupal\Core\Session\AccountProxy;


class ReturnDate{

	public $current_user;

	public function getDate(){

		print "Date is: " .  date("Y/m/d");
	}

	public function __construct(AccountProxy $currentUser){

		$this->current_user = $currentUser;

	}


	public function getCurrentUser(){

		print $this->current_user->getDisplayName();
	}


}