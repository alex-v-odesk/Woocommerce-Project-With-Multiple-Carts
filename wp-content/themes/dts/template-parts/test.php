<?php
/*
Template name: Test
*/
get_header();
?>
<div class="woocommerce-billing-fields">
<?php
$field = [
        'type' => 'country',
        'label' => 'Country',
        'required' => 1,
        'class' => ['address-field']
];
woocommerce_form_field( 'billing_country', $field, '' );
$field = [
    'type' => 'state',
    'label' => 'State',
    'required' => 1,
    'class' => ['address-field'],
    'validate' => ['state']
];
woocommerce_form_field( 'billing_state', $field, '' );
$field = [
    'type' => 'postcode',
    'label' => 'postcode',
    'required' => 1,
    'class' => ['address-field'],
    'validate' => ['postcode']
];
woocommerce_form_field( 'billing_postcode', $field, '' );
?>
</div>

<?php
$handle = 'wc-country-select';
wp_enqueue_script($handle, get_site_url().'/wp-content/plugins/woocommerce/assets/js/frontend/country-select.min.js', array('jquery'), true);
?>

<?php get_footer();?>