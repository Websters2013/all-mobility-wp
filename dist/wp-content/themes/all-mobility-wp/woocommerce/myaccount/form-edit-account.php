<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_edit_account_form' ); ?>

<!-- my-account -->
<div class="my-account">

    <h2 class="site__title site__title_3">Edit Account</h2>


    <?php
    global $wp;
    $current_url = home_url(add_query_arg(array(),$wp->request));

    $urls = explode('/',$current_url);
    $count = count($urls)-1;

    if( 'billing' === $urls[$count] ){
        $active_billing = 'active';
    } elseif( 'shipping' === $urls[$count] ){
        $active_shipping = 'active';
    } else {
        $active = 'active';
    }

    ?>

    <div class="my-account__links">
        <a  class="<?= $active ?>" href="<?= esc_url( wc_get_endpoint_url( 'edit-account' ) ) ?>">Account overview</a>
        <a class="<?= $active_billing ?>" href="<?= esc_url( wc_get_endpoint_url( 'edit-address/billing' ) ) ?>">Billing</a>
        <a class="<?= $active_shipping ?>" href="<?= esc_url( wc_get_endpoint_url( 'edit-address/shipping' ) ) ?>">Shipping</a>
    </div>

    <!-- my-account__content -->
    <div class="my-account__content">

        <!-- my-account__edit-data -->
        <div class="my-account__edit-data">

            <h3 class="site__title site__title_10">Account data</h3>

                    <div class="my-account__form">

                        <form class="woocommerce-EditAccountForm edit-account" action="" method="post">

                        <?php do_action( 'woocommerce_edit_account_form_start' ); ?>

                        <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                            <label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                            <label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
                        </p>
                        <div class="clear"></div>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
                            <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
                        </p>

                        <fieldset>
                            <legend><?php _e( 'Password change', 'woocommerce' ); ?></legend>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="password_current"><?php _e( 'Current password', 'woocommerce' ); ?></label>
                                <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" />
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="password_1"><?php _e( 'New password', 'woocommerce' ); ?></label>
                                <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" />
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="password_2"><?php _e( 'Confirm new password', 'woocommerce' ); ?></label>
                                <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" />
                            </p>
                        </fieldset>
                        <div class="clear"></div>

                        <?php do_action( 'woocommerce_edit_account_form' ); ?>

                        <p>
                            <?php wp_nonce_field( 'save_account_details' ); ?>
                            <input type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
                            <input type="hidden" name="action" value="save_account_details" />
                        </p>

                            <?php $email =  esc_attr( $user->user_email );

                            ?>
                            <?php if( $email ):
                                $status = mc_checklist($email);

                            if($status == 'subscribed'):
                                ?>
                            <div class="nice-checkbox">
                                <input type="checkbox" name="newsletters" id="newsletters" checked>
                                <label for="newsletters">
                                    I’m signed up for All Around Mobility newsletters
                                </label>
                            </div>

                            <?php endif;
                                    endif; ?>

                        <?php do_action( 'woocommerce_edit_account_form_end' ); ?>
                    </form>



                        <a href="<?= get_permalink(13) ?>" class="my-account__edit my-account__back">Back to Profile</a>

                    </div>
        </div>
</div>
</div>
