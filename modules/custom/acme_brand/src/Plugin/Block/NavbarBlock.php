<?php

namespace Drupal\acme_brand\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ACME Navbar' Block.
 *
 * @Block(
 *   id = "acme_brand_navbar",
 *   admin_label = @Translation("ACME Navbar"),
 *   category = @Translation("Brand"),
 * )
 */
class NavbarBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#theme' => 'acme_brand_navbar',
    );
  }

}