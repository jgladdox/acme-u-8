<?php

namespace Drupal\acme_brand\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ACME Footer' Block.
 *
 * @Block(
 *   id = "acme_brand_footer",
 *   admin_label = @Translation("ACME Footer"),
 *   category = @Translation("Brand"),
 * )
 */
class FooterBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#theme' => 'acme_brand_footer',
    );
  }

}