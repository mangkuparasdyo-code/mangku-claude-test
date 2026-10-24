<?php
/**
 * Plugin Name:       Pasukan Pemadam Hutan
 * Description:       Game simulasi kebakaran hutan bergaya kartun. Tampilkan dengan shortcode [pemadam_hutan].
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      7.0
 * License:           GPL-2.0-or-later
 * Text Domain:       pemadam-hutan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PEMADAM_HUTAN_VERSION', '1.0.0' );

/**
 * Hanya izinkan karakter yang aman untuk nilai CSS panjang (mis. "760px", "min(85vh,760px)", "100%").
 */
function pemadam_hutan_css_len( $value, $fallback ) {
	$value = trim( (string) $value );
	if ( '' === $value || ! preg_match( '/^[0-9a-z.,()%\s]+$/i', $value ) ) {
		return $fallback;
	}
	return $value;
}

/**
 * [pemadam_hutan tinggi="min(85vh,760px)" lebar="1200px" tautan="ya"]
 *
 * Game dimuat dalam iframe agar CSS game (body tinggi penuh, overflow tersembunyi)
 * tidak bentrok dengan tema, dan tema tidak mengubah tampilan game.
 */
function pemadam_hutan_shortcode( $atts ) {
	$a = shortcode_atts(
		array(
			'tinggi' => 'min(85vh,760px)',
			'lebar'  => '1200px',
			'tautan' => 'ya',
		),
		$atts,
		'pemadam_hutan'
	);

	$src    = add_query_arg( 'v', PEMADAM_HUTAN_VERSION, plugins_url( 'game/index.html', __FILE__ ) );
	$tinggi = pemadam_hutan_css_len( $a['tinggi'], 'min(85vh,760px)' );
	$lebar  = pemadam_hutan_css_len( $a['lebar'], '1200px' );

	$html  = '<div class="pemadam-hutan" style="max-width:' . esc_attr( $lebar ) . ';margin:0 auto 1.5em">';
	$html .= '<iframe src="' . esc_url( $src ) . '" title="' . esc_attr__( 'Pasukan Pemadam Hutan', 'pemadam-hutan' ) . '"';
	$html .= ' style="width:100%;height:' . esc_attr( $tinggi ) . ';min-height:520px;border:0;border-radius:16px;display:block"';
	$html .= ' loading="lazy" allow="fullscreen"></iframe>';
	if ( 'tidak' !== strtolower( $a['tautan'] ) ) {
		$html .= '<p style="text-align:center;margin:8px 0 0"><a href="' . esc_url( $src ) . '" target="_blank" rel="noopener">'
			. esc_html__( 'Main di layar penuh ↗', 'pemadam-hutan' ) . '</a></p>';
	}
	$html .= '</div>';

	return $html;
}
add_shortcode( 'pemadam_hutan', 'pemadam_hutan_shortcode' );
