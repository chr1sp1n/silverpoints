<?php

namespace Drupal\silverpoints_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\drupal_utility\GetterService;


/**
 * Class NewFilmForm.
 */
class NewFilmForm extends FormBase {




  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'new_film_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $vocabulary = \Drupal::service('drupal_utility.getter')::vocabulary('camera_model');


    $form['language'] = [
      '#type' => 'language_select',
      '#title' => $this->t('Language'),
      '#weight' => '0',
    ];
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#maxlength' => 255,
      '#size' => 64,
      '#weight' => '0',
    ];

    $form['camera_model'] = [
      '#type' => 'select',
      '#title' => $vocabulary->name,
      '#options' => []
    ];
    foreach($vocabulary->terms as $term){
      $form['camera_model']['#options'][$term->tid] = $term->name;
    }


    $form['notes'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Notes'),
      '#maxlength' => 2048,
      '#weight' => '0',
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];


    global $base_url;
    return array_merge($form,  [
      '#theme' => $this->getFormId(),
      '#base_url' => $base_url,
      '#attached' => [
        'library' => [
          'silverpoints_forms/new_film'
        ]
      ]
    ]);

  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }
  }



  private function getCameraTypes(){
    $vocabulary = [
      'vid' => $vid,
      'name' => null,
      'terms' => [
        'tid' => null,
        'name' => null,
      ]
    ];

    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vid);
    $options = [];
    foreach ($terms as $term) {
      $term_data[] = array(
        'id' => $term->tid,
        'name' => $term->name
      );
    }
    return $vocabulary;
  }

  private function getFilmTypes(){
    return [];
  }

  private function getDvlDatas(){
    return [
      'baths' => [],
      'time' => [],
      'dilutions' => [],
    ];
  }

  private function getStopTypes(){
    return [];
  }

  private function getFixTypes(){
    return [];
  }


}
