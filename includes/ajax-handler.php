<?php 
/**
 * Ajax handling from this plugin
 */

function getCustomForm() {
    if(!class_exists('Forminator_API')) {
        echo 'class hasnt init yet or not exist';
        wp_die();
    }

    $formData = Forminator_API::get_forms($_POST['id']);

    $res = array();
    foreach($formData as $form) {
        $res[$form->id] = $form->settings['thankyou-message'];
    }

    echo json_encode($res);
    wp_die();
}

add_action('wp_ajax_get_custom_form', 'getCustomForm');
add_action('wp_ajax_nopriv_get_custom_form', 'getCustomForm');