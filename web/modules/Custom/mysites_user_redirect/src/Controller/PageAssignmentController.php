<?php

namespace Drupal\mysites_user_redirect\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;
use Drupal\page_access\Entity\PageAccess;


class PageAssignmentController extends ControllerBase{

	public function userRedirect(){

		$current_user = User::load(\Drupal::currentUser()->id());
		$logged_uid= $current_user->get('uid')->value; 				// 'user_id' of the current Logged-In user



		$registered_users = [];		// Array to hold registered users for the node page.
		$pages_nid = [7, 38];		// 'nid' of the concerned pages



		foreach($pages_nid as $nid){

			$page_access_entity = PageAccess::loadByNid($nid);

			foreach($page_access_entity->value->users as $array){

				foreach($array as $key => $value){

					if($key == 'edit_permission'){

						continue;

					}   
					array_push($registered_users, $value);
				}

			}

			if(in_array($logged_uid, $registered_users)){

				$alias = \Drupal::service('path.alias_manager')->getAliasByPath('/node/'.$nid);
				$path = $alias;
				$response = new RedirectResponse($path);
				$response->send();
			}

		}

		$path = '/system/403';
		$response = new RedirectResponse($path); // 'Access Denied', if logged in user doesn't have Specific Extranet Pg.
		$response->send();


	}

}