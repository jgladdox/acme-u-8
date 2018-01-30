<?php
/**
 * @file
 * Contains \Drupal\example\Controller\ExampleController.
 */
namespace Drupal\hello_world\Controller;
use Drupal\Core\Controller\ControllerBase;

class HelloWorldStartController {
	public function startAction() {
		return [
			'#markup' => '<h2>Welcome to the start page 1</h2>',
		];
	}
}
