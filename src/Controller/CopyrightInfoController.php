<?php

namespace Drupal\copyright_info\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\copyright_info\CopyrightInfoSalutation;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for the salutation message.
 */
class CopyrightInfoController extends ControllerBase {

  /**
   * The salutation service.
   *
   * @var \Drupal\copyright_info\CopyrightInfoSalutation
   */
  protected $salutation;

  /**
   * CopyrightInfoController constructor.
   *
   * @param \Drupal\copyright_info\CopyrightInfoSalutation $salutation
   *   The salutation service.
   */
   public function __construct(CopyrightInfoSalutation $salutation)
   {
    $this->salutation = $salutation;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
	$container->get('copyright_info.salutation')
    );
  }


}
