<?php

/**
 * @file
 * Contains cc_views_field\cc_views_field.views.inc..
 * Provide a custom views field data that isn't tied to any other module. */


/**
* Implements hook_views_data().
*/
function cc_views_field_views_data() {

    $data['views']['table']['group'] = t('Custom Global');
    $data['views']['table']['join'] = [
      // #global is a special flag which allows a table to appear all the time.
      '#global' => [],
    ];

    $data['views']['cost_calculator_views_field'] = [
        'title' => t('Cost calculator views field'),
        'help' => t('Creates a cost calculator-estimator field'),
        'field' => [
            'id' => 'cost_calculator_views_field',
        ],
    ];
    return $data;
}
