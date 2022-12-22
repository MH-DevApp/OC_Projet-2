<?php

/**
 * Theme Demo Import.
 *
 * @package Ona
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/**
* Demo import.
*/
function ona_import_files()
{
    $import_url = 'https://ona.deothemes.com/import';
    $demos = array(
        array(
        'import_file_name'         => 'Main',
        'import_file_url'          => $import_url . '/main/demo-content.xml',
        'import_preview_image_url' => $import_url . '/main/preview.jpg',
        'preview_url'              => 'https://ona.deothemes.com',
    ),
        array(
        'import_file_name'         => 'Minimal',
        'import_file_url'          => $import_url . '/minimal/demo-content.xml',
        'import_preview_image_url' => $import_url . '/minimal/preview.jpg',
        'preview_url'              => 'https://ona.deothemes.com/minimal',
    ),
        array(
        'import_file_name'         => 'Creative',
        'import_file_url'          => $import_url . '/creative/demo-content.xml',
        'import_preview_image_url' => $import_url . '/creative/preview.jpg',
        'preview_url'              => 'https://ona.deothemes.com/creative',
    ),
        array(
        'import_file_name'         => 'Travel',
        'import_file_url'          => $import_url . '/travel/demo-content.xml',
        'import_preview_image_url' => $import_url . '/travel/preview.jpg',
        'preview_url'              => 'https://ona.deothemes.com/travel',
    ),
        array(
        'import_file_name'         => 'Environmental',
        'import_file_url'          => $import_url . '/environmental/demo-content.xml',
        'import_preview_image_url' => $import_url . '/environmental/preview.jpg',
        'preview_url'              => 'https://ona.deothemes.com/environmental',
    )
    );
    return $demos;
}

/**
* Assign menus and front page after demo import
*
* @param array $selected_import array with demo import data
*/
function ona_after_import( $selected_import )
{
    // Assign logo
    switch ( $selected_import ) {
        // Environmental
        case 4:
            update_option( 'site_logo', 99 );
            break;
            // Magazine
        // Magazine
        case 5:
            update_option( 'site_logo', 296 );
            break;
            // Online Store
        // Online Store
        case 6:
            if ( class_exists( 'WooCommerce' ) ) {
                ona_update_woo_attributes();
            }
            break;
            // Coffee Shop
        // Coffee Shop
        case 9:
            if ( class_exists( 'WooCommerce' ) ) {
                ona_update_woo_attributes();
            }
            break;
            // Fashion
        // Fashion
        case 10:
            update_option( 'site_logo', 393 );
            break;
            // Agency
        // Agency
        case 11:
            update_option( 'site_logo', 323 );
            break;
    }
    // Assign front page and blog page based on demo import
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id = get_page_by_title( 'News' );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    
    if ( class_exists( 'WooCommerce' ) ) {
        global  $wpdb ;
        // Delete WooCommerce duplicates
        $pages2 = array(
            'cart',
            'checkout',
            'my-account',
            'wishlist'
        );
        foreach ( $pages2 as $page2 ) {
            $page = get_page_by_path( $page2 . '-2' );
            if ( $page ) {
                wp_delete_post( $page->ID, true );
            }
        }
        $shop2 = get_page_by_path( 'shop-2' );
        
        if ( $shop2 ) {
            $shop1 = get_page_by_path( 'shop' );
            wp_delete_post( $shop1->ID, true );
            wp_update_post( [
                'post_name' => 'shop',
                'ID'        => $shop2->ID,
            ] );
        }
        
        // Assign WooCommerce pages
        $shop = get_page_by_path( 'shop' );
        $cart = get_page_by_path( 'cart' );
        $checkout = get_page_by_path( 'checkout' );
        $wishlist = get_page_by_path( 'wishlist' );
        $myaccount = get_page_by_path( 'my-account' );
        update_option( 'woocommerce_shop_page_id', $shop->ID );
        update_option( 'woocommerce_cart_page_id', $cart->ID );
        update_option( 'woocommerce_checkout_page_id', $checkout->ID );
        update_option( 'woocommerce_myaccount_page_id', $myaccount->ID );
        // Omit installing WooCommerce pages
        delete_option( '_wc_needs_pages' );
        delete_transient( '_wc_activation_redirect' );
        /**
         * Update Woo Attributes
         */
        function ona_update_woo_attributes()
        {
            $table_name = $wpdb->prefix . 'woocommerce_attribute_taxonomies';
            $wpdb->query( "UPDATE `{$table_name}` SET `attribute_type` = 'color' WHERE `attribute_name` = 'color'" );
            $woo_atts_transient = get_transient( 'wc_attribute_taxonomies' );
            $woo_atts_transient[0]->attribute_type = 'color';
            set_transient( 'wc_attribute_taxonomies', $woo_atts_transient );
        }
    
    }

}
