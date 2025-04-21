<?php
/**
 * PHPUnit bootstrap file
 *
 * @package MediaFolders
 */

$_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $_tests_dir/includes/functions.php\n";
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/media-folders.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';

// Add Mockery setup for WordPress functions
require_once dirname( __DIR__ ) . '/vendor/autoload.php';
\Brain\Monkey\setUp();

// Add teardown for Mockery
add_action('teardown', function() {
    \Brain\Monkey\tearDown();
    Mockery::close();
});

// WordPress function mocks for testing
global $wp_mock_functions;
$wp_mock_functions = [];

if (!function_exists('wp_get_attachment_metadata')) {
    function wp_get_attachment_metadata($attachment_id) {
        global $wp_mock_functions;
        return isset($wp_mock_functions['wp_get_attachment_metadata']) 
            ? $wp_mock_functions['wp_get_attachment_metadata']($attachment_id)
            : false;
    }
}