<?php

class SampleTest extends WP_UnitTestCase {
	
	function testxmlenabled(){
		$this->assertFalse(get_option('enable_xmlrpc'));
	}
	
	function testString() {
		$this->assertSame(get_bloginfo("pingback_url","display"), "");
	}
}

