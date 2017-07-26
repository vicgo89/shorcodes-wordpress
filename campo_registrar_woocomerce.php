<?php
//agregar terminos y condiciones en registro de woocomerce
function wooc_add_field_to_registration(){
    wc_get_template( 'checkout/terms.php' );
}
add_action( 'woocommerce_register_form', 'wooc_add_field_to_registration' );
 
 
 function wooc_validation_registration( $errors, $username, $password, $email ){
    if ( empty( $_POST['terms'] ) ) {
        throw new Exception( __( 'Debes aceptar los términos y condiciones', 'woocommerce' ) );
    }
    return $errors;
}
add_action( 'woocommerce_process_registration_errors', 'wooc_validation_registration', 10, 4 );
?>