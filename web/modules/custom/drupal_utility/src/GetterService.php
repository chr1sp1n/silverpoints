<?php

namespace Drupal\drupal_utility;

use Drupal\taxonomy\Entity;

/**
 * Class GetterService.
 */
class GetterService {


  public static function vocabulary($vid){

    $language_code = \Drupal::languageManager()->getCurrentLanguage()->getId();

    if(!$entity = Entity\Vocabulary::load($vid)) return false;
    $entity = \Drupal::service('entity.repository')->getTranslationFromContext($entity, $language_code);
    $vocabulary = new \stdClass();

    $vocabulary->vid = $entity->id();
    $vocabulary->name = $entity->label();
    $vocabulary->terms = [];

    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($entity->id(), 0, NULL, true);
    foreach ($terms as $term) {
      $term = \Drupal::service('entity.repository')->getTranslationFromContext($term, $language_code);
      $vocabulary->terms[] = new \stdClass();
      $vocabulary->terms[count($vocabulary->terms) - 1]->tid = $term->id();
      $vocabulary->terms[count($vocabulary->terms) - 1]->name = $term->getName();
    }

    return $vocabulary;
  }

}
