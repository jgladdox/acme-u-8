<?php

namespace Drupal\acme_siteinfo\Form;

use Drupal\Component\Utility\Unicode;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Configure Google_Analytics settings for this site.
 */
class InfoForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'acme_siteinfo_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['acme_siteinfo.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('acme_siteinfo.settings');

    $form['intro'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $this->t('The information below may be used in the footer, header, or other functional areas of your site'),
    ];
    $form['address1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Address Line 1 / Building and Room'),
      '#description' => $this->t("Often a building and/or room number" ),
      '#default_value' => $config->get('address1'),
      '#required' => FALSE,
      '#size' => 30,
    ];
    $form['address2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Address Line 2 / Street Address'),
      '#description' => $this->t("Usually a full street address" ),
      '#default_value' => $config->get('address2'),
      '#required' => FALSE,
      '#size' => 30,
    ];
    $form['city'] = [
      '#type' => 'textfield',
      '#title' => $this->t('City'),
      '#description' => $this->t("Name of the city" ),
      '#default_value' => $config->get('city'),
      '#required' => FALSE,
      '#size' => 15,
    ];
    $form['state'] = [
      '#type' => 'textfield',
      '#title' => $this->t('State'),
      '#description' => $this->t("Two letter code for state or province" ),
      '#default_value' => $config->get('city'),
      '#required' => FALSE,
      '#size' => 2,
    ];
    $form['postal'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Postal/Zip Code'),
      '#description' => $this->t("5 character zip code" ),
      '#default_value' => $config->get('postal'),
      '#required' => FALSE,
      '#size' => 10,
    ];
    $form['phone'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Phone'),
      '#description' => "Full phone number <br>Example: 614-555-5555",
      '#default_value' => $config->get('phone'),
      '#required' => FALSE,
      '#size' => 15,
    ];
    $form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Email Address (Public)'),
      '#description' => "A public email address that can be displayed prominently on the site",
      '#default_value' => $config->get('email'),
      '#required' => FALSE,
      '#size' => 30,
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('acme_siteinfo.settings');
    $config
      ->set('address1', $form_state->getValue('address1'))
      ->set('address2', $form_state->getValue('address2'))
      ->set('city', $form_state->getValue('city'))
      ->set('state', $form_state->getValue('state'))
      ->set('postal', $form_state->getValue('postal'))
      ->set('phone', $form_state->getValue('phone'))
      ->set('email', $form_state->getValue('email'))
      ->save();

    parent::submitForm($form, $form_state);

  }

}
