<?php

namespace Drupal\copyright_info\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\copyright_info\CopyrightInfoSalutation;

/**
* Copyright Info Salutation block.
 *
 * @Block(
 *  id = "copyright_info_salutation_block",
 *  admin_label = @Translation("Copyright info text"),
 * )
 */
class CopyrightInfoSalutationBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The salutation service.
   *
   * @var \Drupal\copyright_info\CopyrightInfoSalutation
   */
  protected $salutation;

  /**
  * Constructs a CopyrightInfoSalutationBlock.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, CopyrightInfoSalutation $salutation) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->salutation = $salutation;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('copyright_info.salutation')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->salutation->getSalutation(),
    ];
  }

}
