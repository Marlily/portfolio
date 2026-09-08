<?php

class QORT_Nav_Walker extends Walker_Nav_Menu {

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes  = (array) $item->classes;
        $is_btn   = in_array( 'btn', $classes );
        $is_current = in_array( 'current-menu-item', $classes );

        $link_classes = $is_btn
            ? 'inline-flex items-center px-6 py-[0.69rem] bg-orange-500 text-white font-normal text-[1.0625rem] leading-[1.5] tracking-[-0.34px] whitespace-nowrap rounded-full transition-opacity hover:opacity-90'
            : 'inline-flex items-center px-2 py-2 font-normal text-[1.0625rem] leading-[1.5] tracking-[-0.34px] whitespace-nowrap transition-opacity ' . ( $is_current ? 'text-orange-500' : 'text-white hover:text-orange-500' );

        $li_classes = ( $is_current && ! $is_btn ) ? 'shrink-0 border-b-2 border-orange-500 font-normal' : 'shrink-0';

        $output .= '<li class="' . esc_attr( $li_classes ) . '">';
        $output .= '<a href="' . esc_url( $item->url ) . '" class="' . esc_attr( $link_classes ) . '">';
        $output .= esc_html( $item->title );
        $output .= '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

class QORT_Mobile_Walker extends Walker_Nav_Menu {

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes    = (array) $item->classes;
        $is_btn     = in_array( 'btn', $classes );
        $is_current = in_array( 'current-menu-item', $classes );

        $output .= '<li>';

        if ( $is_btn ) {
            $output .= '<a href="' . esc_url( $item->url ) . '" class="inline-flex items-center mt-6 px-7 py-3 bg-orange-500 text-white font-normal text-[1.125rem] rounded-full transition-opacity hover:opacity-90">';
        } else {
            $text = $is_current ? 'text-orange-500' : 'text-white normal hover:text-orange-400';
            $output .= '<a href="' . esc_url( $item->url ) . '" class="block font-gabarito text-[1.8rem]/[1.2] tracking-[-0.05rem] py-1 ' . $text . ' transition-colors">';
        }

        $output .= esc_html( $item->title );
        $output .= '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

class QORT_Footer_Walker extends Walker_Nav_Menu {

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $output .= '<li>';
        $output .= '<a href="' . esc_url( $item->url ) . '" class="text-[1.0625rem]/[1.5] tracking-[-0.02125rem] text-white/50 hover:text-white transition-colors">';
        $output .= esc_html( $item->title );
        $output .= '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}
