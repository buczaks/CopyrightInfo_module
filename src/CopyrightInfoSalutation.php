<?php

namespace Drupal\copyright_info;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * Prepares the salutation to the world.
 */
class CopyrightInfoSalutation {

  use StringTranslationTrait;

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The event dispatcher.
   *
   * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
   */
  protected $eventDispatcher;

  /**
   * CopyrightInfoSalutation constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   * @param \Symfony\Contracts\EventDispatcher\EventDispatcherInterface $eventDispatcher
   *   The event dispatcher.
   */
  public function __construct(ConfigFactoryInterface $config_factory, EventDispatcherInterface $eventDispatcher) {
    $this->configFactory = $config_factory;
    $this->eventDispatcher = $eventDispatcher;
  }

  /**
   * Returns the salutation.
   *
   * @return string
   *   The salutation message.
   */
  public function getSalutation() {
	$config = $this->configFactory->get('copyright_info.custom_salutation');
    $salutation = $config->get('salutation');
    if ($salutation !== "" && $salutation) {
      $event = new SalutationEvent();
      $event->setValue($salutation);
      $event = $this->eventDispatcher->dispatch($event, SalutationEvent::EVENT);
      return $event->getValue();
    }

    $time = new \DateTime();
	$year = $time->format('Y');
	$fqdn = $_SERVER['SERVER_NAME'];
	if ((int) $year && !empty($fqdn)) {
		$output = '<p class="copyrightinfo">&copy; ' . $year . ' '. $fqdn;
		$output .= $this->t(' All rights reserved.</p>');
		return $output;
    } else {
		$config = \Drupal::config('system.site');
		return $this->t('<p>&copy; '. $year .' '. $config->get('name') . ' All rights reserved.</p>');
    }
  }

}
