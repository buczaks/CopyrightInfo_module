<?php

namespace Drupal\copyright_info;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event class to be dispatched from the CopyrightInfoSalutation service.
 */
class SalutationEvent extends Event {

  /**
   * The event name.
   */
   const EVENT = 'copyright_info.salutation_event';

  /**
   * The salutation message.
   *
   * @var string
   */
  protected $message;

  /**
   * Sets the salutation message.
   *
   * @return string
   *   The salutation message.
   */
  public function getValue() {
    return $this->message;
  }

  /**
   * Sets the salutation message.
   *
   * @param mixed $message
   *   The salutation message.
   */
  public function setValue($message) {
    $this->message = $message;
  }

}
