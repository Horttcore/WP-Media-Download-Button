=== WP Media Download Button ===
Contributors: Horttcore
Donate link: http://www.horttcore.de
Tags: media, download
Requires at least: 3.6
Tested up to: 3.7
Stable tag: 1.1

Add a download button on media overview and edit screen

== Description ==

Add a download button on media overview and edit screen

== Installation ==

*   Put the plugin file in your plugin directory and activate it in your WP backend.
*   Go to your media library

== Screenshots ==

1. Screenshot of the admin column
1. Screenshot of the meta box

== Frequently Asked Questions ==

= I prefer an icon in the admin column =

Use the `wp-media-download-button` hook

`function my_wp_media_download_button( $button )
{
	return '<img src="path/to/image" alt="' . $button . '">';
}
add_filter('wp-media-download-button', 'my_wp_media_download_button')`


= I've found a bug, what to do? =
*   Please give me a shout over github ( https://github.com/Horttcore/WP-Media-Download-Button/issues )

== Changelog ==

= 1.1 =
*   Hook 'wp-media-download-button' added
*   Hook 'wp-media-download-file' added

= 1.0 =
*   First release
