<?php
	header('Cache-Control: no-cache');
	header('Pragma: no-cache');
	header("Content-Type: text/javascript; charset=utf-8");
		
	$geoip_array = geoip_record_by_name($_SERVER['HTTP_X_FORWARDED_FOR']);
//	$geoip_array = geoip_record_by_name($_SERVER['REMOTE_ADDR']);

	echo "function geoip_country_code(){ return '$geoip_array[country_code]'; }
	function geoip_country_name(){ return '$geoip_array[country_name]'; }
	function geoip_region(){ return '$geoip_array[region]'; }
	function geoip_city(){ return '$geoip_array[city]'; }
	function geoip_postal_code(){ return '$geoip_array[postal_code]'; }
	function geoip_latitude(){ return '$geoip_array[latitude]'; }
	function geoip_longitude(){ return '$geoip_array[longitude]'; }
	function geoip_city(){ return '$geoip_array[city]'; }";
