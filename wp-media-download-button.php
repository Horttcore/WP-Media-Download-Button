<?php
/*
Plugin Name: WP Media Download Button
Plugin URI: http://horttcore.de
Description: Add a download button on media overview and edit screen
Version: 1.0
Author: Ralf Hortt
Author URI: http://horttcore.de
License: GPL2
*/


/**
* WP Media Download Button
*/
class WP_Media_Download_Button
{



	/**
	 * Constructor
	 *
	 * @access public
	 * @since v1.0
	 * @author Ralf Hortt
	 */
	public function __construct()
	{
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_filter( 'manage_media_columns', array( $this, 'manage_media_columns' ) );
		add_action( 'manage_media_custom_column', array( $this, 'manage_media_custom_column' ), 10, 2 );
		add_action( 'wp_ajax_force_download', array( $this, 'force_download' ) );
		load_plugin_textdomain( 'wp-media-download-button', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}



	/**
	 * Add meta boxes
	 *
	 * @access public
	 * @since v1.0
	 * @author Ralf Hortt
	 */
	public function add_meta_boxes()
	{
		add_meta_box( 'force-download', __( 'Download', 'wp-media-download-button' ), array( $this, 'meta_box_download' ), 'attachment', 'side' );
	}



	/**
	 * Force a download
	 *
	 * @access public
	 * @since v1.0
	 * @author Ralf Hortt
	 */
	public function force_download()
	{
<<<<<<< HEAD
		if ( !isset( $_REQUEST['nonce'] ) || !wp_verify_nonce( $_REQUEST['nonce'], 'download-' . $_REQUEST['file_id'] ) )
=======
		if ( !isset( $_REQUEST['nonce'] ) || !wp_verify_nonce( $_REQUEST['nonce'], 'download-' . $attachment->ID ) )
>>>>>>> ee191af2fd5878ba2e696c6ce24fce5141127894
			die( __( 'Nonce is incorrect', 'wp-media-download-button' ) );

		$attachment = get_post( intval( $_REQUEST['file_id'] ) );

		if ( 'attachment' != $attachment->post_type )
			die( __( 'No attachment', 'wp-media-download-button' ) );

		$uploads = wp_upload_dir();
		$path = str_replace( $uploads['baseurl'], $uploads['basedir'], $attachment->guid );
		$filename = end( explode( '/', $attachment->guid ) );

		header('Content-type: ' . $attachment->post_mime_type, true, 200);
		header('Content-Disposition: attachment; filename=' . $filename);
		header('Pragma: no-cache');
		header('Expires: 0');
		readfile($path);

		die();
	}



	/**
	 * Add column
	 *
	 * @access public
	 * @param array $columns Columns
	 * @return array Columns
	 * @since v1.0
	 * @author Ralf Hortt
	 */
	public function manage_media_columns( array $columns ){
		$columns['download_button']  = __( 'Download', 'wp-media-download-button' );
		return $columns;
	}



	/**
	 * Populate custom columns
	 *
	 * @access public
	 * @param str $column Column
	 * @param int $post_id Post ID
	 * @since v1.0
	 * @author Ralf Hortt
	 */
	public function manage_media_custom_column( $column, $post_id ){
		global $post;

		switch( $column ) :

			case 'download_button' :
				?><a class="button button-large" href="<?php echo admin_url( 'admin-ajax.php?action=force_download&amp;file_id=' . $post_id . '&amp;nonce=' . wp_create_nonce( 'download-' . $post_id ) ) ?>"><?php _e( 'Download', 'wp-media-download-button' ); ?></a><?php
			break;

		endswitch;
	}



	/**
	 * Meta box download
	 *
	 * @access public
	 * @param obj $post Post object
	 * @since v1.0
	 * @author Ralf Hortt
	 */
	public function meta_box_download( $post )
	{
		?>
		<a class="button button-large" href="<?php echo admin_url( 'admin-ajax.php?action=force_download&amp;file_id=' . $post->ID . '&amp;nonce=' . wp_create_nonce( 'download-' . $post->ID ) ) ?>"><?php echo end( explode( '/', $post->guid ) ) ?></a>
		<?php
	}



}

new WP_Media_Download_Button;