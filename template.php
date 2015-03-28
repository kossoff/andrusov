<?php

/**
 * Implements template_preprocess_html().
 */
function andrusov_preprocess_html(&$variables) {
}

/**
 * Implements template_preprocess_page.
 */
function andrusov_preprocess_page(&$variables) {
  $variables['linked_site_name'] = '';
  if (!empty($variables['site_name'])) {
    $variables['linked_site_name'] = l( '<i class="fi-first-aid"></i>&nbsp;' . $variables['site_name'], '<front>', array(
      'attributes' => array(
        'rel' => 'home',
        'title' => strip_tags($variables['site_name']) . ' ' . t('Home'),
      ),
      'html' => TRUE,
    ));
  }
}

/**
 * Implements template_preprocess_node.
 */
function andrusov_preprocess_node(&$variables) {
}

function andrusov_form_alter(&$form, &$form_state, $form_id) {
  // drupal_set_message('<pre>' . print_r($form, TRUE) . '</pre>');

  // Your webform id goes here.
  if ($form_id == 'webform_client_form_15') {
    $form['actions']['submit']['#attributes']['class'] = array (
      'button',
      'expand',
      'custom-button-class'
      );
  }
}

function andrusov_links__topbar_main_menu($variables) {
  // We need to fetch the links ourselves because we need the entire tree.
  $links = menu_tree_output(menu_tree_all_data(variable_get('menu_main_links_source', 'main-menu')));
  $output = _zurb_foundation_links($links);
  $variables['attributes']['class'][] = 'right';
  return '<ul' . drupal_attributes($variables['attributes']) . '>' . $output . '</ul>';
}
