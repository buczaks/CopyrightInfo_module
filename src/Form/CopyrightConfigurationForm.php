<?php

namespace Drupal\copyright_info\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configuration form definition for the salutation message.
 */
class CopyrightConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['copyright_info.custom_salutation'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'salutation_configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('copyright_info.custom_salutation');

    $form['salutation'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Copyright info block text'),
	  '#description' => $this->t('Please provide the text you want to use.<br>Leave blank and save to return to the default copyright info text.<br>You may have to clear the cache to show new block text on page after you save this configuration.'),
      '#default_value' => $config->get('salutation'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('copyright_info.custom_salutation')
      ->set('salutation', $form_state->getValue('salutation'))
      ->save();

    parent::submitForm($form, $form_state);

  }
  
  /**
  * {@inheritdoc}
  */
  public function validateForm(array &$form, FormStateInterface
  $form_state) {
  $salutation = $form_state->getValue('salutation');
  if (strlen($salutation) > 125) {
  $form_state->setErrorByName('salutation', $this->t('Text needs to be 125 characters or less. '));
  }
  }

}
