<?php

function get_user_order_count() {
    // Get the current user ID
    $user_id = get_current_user_id();

    // Get the order count for the user
    $order_count = wc_get_customer_order_count( $user_id );


    // echo $order_count;
    // Output the order count
        $total_order = "";
        $output = "";
        $last_order = "";

        $output .= '<div class="wcao-accounts-cont">';

        $total_order.= '<div class="total-orders wcao-inner-section">';
        $order_url = site_url() . '/my-account' . '/orders';
        $total_order.= '<a href="' . $order_url .'">';
        $total_order.='<img src="' . PLUGIN_URL . '/assets/img/ordericon.png' . '" class ="wcao-icon" />';
        $total_order.='<h5>Total Orders</h5>';
        $total_order.='<h2>' . $order_count . '</h2>';
        $total_order.='</a>';
        $total_order.='</div>';

        
        $output .= $total_order;


        $latest_order = wc_get_orders( array(
			'customer' => $user_id,
			'limit'    => 1,
			'orderby'  => 'date',
			'order'    => 'DESC',
		) );
        $last_order .= '<div class="last-order wcao-inner-section">';
        $lastorder_url = site_url() . '/my-account' . '/view-order' . '/' . $latest_order[0]->get_id();
        $last_order .= '<a href="' . $lastorder_url . '">';
        $last_order .= '<img src="' . PLUGIN_URL . '/assets/img/lastorder.png' . '" class ="wcao-icon" />';
        $last_order .= '<h5>Latest Order No.</h5>';

        if ( $latest_order ) {
			$latest_order_id = $latest_order[0]->get_id();
			 // Output the order count
			
			$last_order .= '<h2>#' . $latest_order_id . '</h2>';
		} else {
			$last_order .= '<p>No recent orders.</p>';
		}


        $last_order .= '</a>';
        $last_order .= '</div>';
        $output .= $last_order;


        $itemsinWishlist = "";
        $itemsinWishlist .='<div class="items-in-wishlist wcao-inner-section">';
        $wishlist_url = site_url() . '/my-account' . '/' . 'wishlist/';
        $itemsinWishlist .= '<a href="' . $wishlist_url . '">';

        $itemsinWishlist .= '<img src="' . PLUGIN_URL . '/assets/img/wishlist.png' . '" class ="wcao-icon" />';
        $itemsinWishlist .= '<h5>Items in Wishlist</h5>';
        $itemsinWishlist .= '<h2>' . yith_wcwl_count_products() . '</h2>'; 
        $itemsinWishlist .= '</a>';
        $itemsinWishlist .= '</div>';

        $output .= $itemsinWishlist;
        












        $output .= '</div>';

        echo $output;
}

add_action('woocommerce_account_dashboard','get_user_order_count');