<?php

namespace Drupal\dvl_timer\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'DvlTimerBlock' block.
 *
 * @Block(
 *  id = "dvl_timer_block",
 *  admin_label = @Translation("DVL Timer"),
 * )
 */
class DvlTimerBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    global $base_url;
    $modulePath = drupal_get_path('module', 'dvl_timer');


    $build = [
      '#theme' => 'dvl_timer',
      '#data' => [],
      '#module_path' => $modulePath,
      '#base_url' => $base_url,
      '#attached' => [
        'library' => [ 'dvl_timer/dvl_timer' ]
      ],
    ];


    return $build;
  }

}
