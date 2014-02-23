<?php

class SampleTest extends WP_UnitTestCase {
	
	function testxmlenabled(){
		$this->assertFalse(get_option('enable_xmlrpc'));
	}
	
	function testString() {
		$this->assertSame(get_bloginfo("pingback_url","display"), "");
	}
	
	function testisnotUrl(){
		$this->assertFalse((bool)preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', get_bloginfo("pingback_url","display")));
	}
}

