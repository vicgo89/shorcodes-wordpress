<?php
//incluir script en archivo functions del theme sin la apertura php
//Agregando checkbox a finalizar compra by victor gomez

// Extra checkbox antes de finalizar compra
 
add_action('woocommerce_review_order_before_submit', 'extra_checkbox_checkout', 9);
  
function extra_checkbox_checkout() {
 
?>
 
<p class="form-row terms">
<input type="checkbox" class="input-checkbox" name="deliverycheck" id="deliverycheck"  />
<label for="deliverycheck" class="checkbox"> Acepto
<a href="/terminos-y-condiciones-de-venta" target=”_blank”><strong> Términos y condiciones</strong></a> y
<a href="/politica-de-privacidad" target=”_blank”> <strong>Política de privacidad.</strong></a> </label>
</p>
</br>
<?php
}
 // Si no acepta la checkbox devuelve mensaje de error
  
add_action('woocommerce_checkout_process', 'extra_checkbox_checkout_error');
 

function extra_checkbox_checkout_error() {
    if ( ! $_POST['deliverycheck'] )
        wc_add_notice( __( 'Debes aceptar nuestro Términos - condiciones y políticas de privacidad' ), 'error' );
}

?>