<?php
/*
Plugin Name: Mumbai Meri Jaan
Plugin URI: http://www.kdclabs.com/?p=
Description: This plugin was design as a special feature to grow the WordPress Community in Mumbai.
Author: _KDC-Labs
Version: 1.0
Author URI: http://www.kdclabs.com/
*/

function mumbai_meri_jaan_get_lyric() {
	/** These are the lyrics to Yeh Hai Bombay Meri Jaan */
	$lyrics = "Aye Dil Hai Mushkil Jeena Yahan
Zara Hat Ke Zara Bach Ke, Yeh Hai Bombay Meri Jaan
Ha Haa, Ha Ho Ho, Ho Hi Haa Ha Haa
Hm Hm Hm Hm, Hm Hm Hm, Hm Hm Hm Hm Hm
Kahin Building Kahin Traame, Kahin Motor Kahin Mill
Milta Hai Yahan Sab Kuchh Ik Milta Nahin Dil
Insaan Ka Nahin Kahin Naam-o-nishaan
Zara Hat Ke Zara Bach Ke, Yeh Hai Bombay Meri Jaan
Kahin Satta, Kahin Patta Kahin Chori Kahin Res
Kahin Daaka, Kahin Phaaka Kahin Thokar Kahin Thes
Bekaaro Ke Hain Kai Kaam Yahan
Beghar Ko Aawara Yahan Kehte Has Has
Khud Kaate Gale Sabke Kahe Isko Business
Ik Cheez Ke Hain Kai Naam Yahan
Bura Duniya Woh Hai Kehta Aisa Bhola Tu Na Ban
Jo Hai Karta Woh Hai Bharta Hai Yahan Ka Yeh Chalan
Tadbeer Nahin Chalne Ki Yahan
Yeh Hai Bombay, Yeh Hai Bombay, Yeh Hai Bombay Meri Jaan
Aye Dil Hai Aasaa Jeena Yahan
Suno Mister, Suno Bandhu, Yeh Hai Bombay Meri Jaan";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function mumbai_meri_jaan() {
	$chosen = mumbai_meri_jaan_get_lyric();
	echo "<p id='wphubmmj'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'mumbai_meri_jaan' );

// We need some CSS to position the paragraph
function wphubmmj_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#wphubmmj {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'wphubmmj_css' );

?>