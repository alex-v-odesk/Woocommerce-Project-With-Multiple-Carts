<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php global $woocommerce;?>
<?php $rp_current_user_id=get_current_user_id();?>
<div class="dashboard">
    <h1 class="rptitle">Account Settings</h1>
    <p>Edit your user name, password or addresses to keep your account up-to-date.</p>
    <hr style="margin-top:10px;">
<div class="row">
    <div class="col-md-6 col-sm-6">
        <h1 class="rpsubtitle">Login Information</h1>
        <table>
            <tr>
                <th class="rp-table-side-heading">Email:</th>
                <td><?php echo $woocommerce->customer->get_email();?></td>
            </tr>
            <tr>
                <th class="rp-table-side-heading">Password:</th>
                <td>****************</td>
            </tr>
        </table>
      
    </div>
    <div class="col-md-6 col-sm-6">
       <h1 class="rpsubtitle">Company Information</h1>
   
        <table class="company-info">
            <tr>
                <th colspan="2"><?php if(get_field('additional_company_name','user_'.$rp_current_user_id)){the_field('additional_company_name','user_'.$rp_current_user_id);}?></th>
                
            </tr>
            <tr>
                <td colspan="2"><?php if(get_field('additional_company_fname','user_'.$rp_current_user_id)){the_field('additional_company_fname','user_'.$rp_current_user_id);}?>
        <?php if(get_field('additional_company_lname','user_'.$rp_current_user_id)){the_field('additional_company_lname','user_'.$rp_current_user_id);}?></td>
               
            </tr>
            <tr>
                <td class="rp-table-side-heading">Phone:</td>
                <td><?php if(get_field('additional_company_phone','user_'.$rp_current_user_id)){the_field('additional_company_phone','user_'.$rp_current_user_id);}?></td>
            </tr>
            <tr>
                <td class="rp-table-side-heading">Fax:</td>
                <td><?php if(get_field('additional_fax','user_'.$rp_current_user_id)){the_field('additional_fax','user_'.$rp_current_user_id);}?></td>
            </tr>
            <tr>
                <td class="rp-table-side-heading">Tax Id:</td>
                <td><?php if(get_field('additional_tax_id','user_'.$rp_current_user_id)){the_field('additional_tax_id','user_'.$rp_current_user_id);}?></td>
            </tr>
        </table>
        
       
    </div>
    <div class="col-md-12">
        <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account' ) );?>" class="btn rpbutton">Edit</a>
    </div>
</div>
    <div class="clearfix" style="margin-top: 50px;"></div>
<h1 class="rptitle">My Addresses</h1>
   <!--
    <p>The following address will be used by default on the checkout page.</p>
    <hr style="margin-top:10px;">
<div class="row">
    <div class="col-md-6 col-sm-6">
        <h1 class="rpsubtitle">Billing Address</h1>
        <p><b><?php echo $woocommerce->customer->get_billing_first_name();?>
        <?php echo " ".$woocommerce->customer->get_billing_last_name();?></b></p>
        <p><?php echo $woocommerce->customer->get_billing_address_1();?>
        <?php if($woocommerce->customer->get_billing_address_2()){echo " ".$woocommerce->customer->get_billing_address_2();}echo ",";?></p>
        <p><?php echo $woocommerce->customer->get_billing_city().",";?>
        <?php echo $woocommerce->customer->get_billing_state();?>
        <?php echo $woocommerce->customer->get_billing_postcode();?>
        </p>
      
    </div>
    <div class="col-md-6 col-sm-6">
       <h1 class="rpsubtitle">Shiping Address</h1>
        <p style="font-style:italic;color:#ccc;">Address Nickname</p>
        <p><b>Company Name Here</b></p>
        <p>Sherry Thorson</p>
        <p>Sherry Thorson</p>       
    </div>
    <div class="col-md-12">
        <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address' ) );?>" class="btn rpbutton">Edit</a>
    </div>
</div>
-->

<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<!--
<p><?php
	/* translators: 1: user display name 2: logout url */
	printf(
		__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) )
	);
?></p>

<p><?php
	printf(
		__( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a> and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' ),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) )
	);
?></p>
-->
<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
?>
</div>


<!--My account popup start-->
<div id="myaccountpop" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/cross-icon.png"></button>
            <div class="modal-body">
                <div class="pop-header">
                    <h1 class="text-uppercase">My account</h1>                   
                </div>

                <div class="contnet">
                    <p>
                        <b>Welcome to your account dashboard!</b> From here, you can peruse your wishlists, check in on orders, manage your account information and contact your very own personal representative. We're here to help if you need us.
    
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function(){
        if (window.matchMedia('(max-width: 480px)').matches)
        {
           jQuery("#myaccountpop").modal('show');

        }
        
    });
</script>
<!--My account popup end-->
