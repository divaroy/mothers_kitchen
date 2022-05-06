<?php


namespace Drupal\featured_dish\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
	/**
	 * block to display 'data'
	 * @Block(
	 * 
	 * 		id="featured_dish_block",
	 *		admin_label = @Translation("Featured Dish Block"),
	 *		category = @Translation("Block to display 'Featured-Dish'"),
	 * )
	 */


	class FeaturedDishBlock extends BlockBase{



		public function build(){

			$nids = \Drupal::entityQuery('node')->condition('type','featured_dish')->execute(); // list the 'node IDS'	
			$active_node = array_rand($nids);  													// select a node in random
			$node = Node::load($nids[$active_node]);			// load the randomly selected node
			
			// Extract node fields.

			$node_description = $node->body->value;		
			$dish_image = file_create_url($node->get('field_dish_pic')->entity->getFileUri());	


			return array(

				'#theme' => 'featured_dish',
				'#node_description' => $node_description,
				'#dish_image' => $dish_image,
				'#title' => 'Featured Dish'

			);


		}
	}