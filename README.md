# WP Media Download Button

## Description

Add a download button on media overview and edit screen

## Installation

* Put the plugin file in your plugin directory and activate it in your WP backend.
* Go to your media library

## Screenshots

Screenshot of the admin column
![Screenshot of the admin column](https://raw.github.com/Horttcore/WP-Media-Download-Button/master/screenshot-1.png)

Screenshot of the meta box
![Screenshot of the meta box](https://raw.github.com/Horttcore/WP-Media-Download-Button/master/screenshot-2.png)

## Frequently Asked Questions

### I prefer an icon in the admin column

Use the `wp-media-download-button` hook

```
function my_wp_media_download_button( $button )
{
	return '<img src="path/to/image" alt="' . $button . '">';
}
add_filter('wp-media-download-button', 'my_wp_media_download_button')
```

### I've found a bug, what to do?

* Please report bugs and wishes at github (https://github.com/Horttcore/WP-Media-Download-Button/issues)

## Changelog

### 1.1
* Hook 'wp-media-download-button' added
* Hook 'wp-media-download-file' added

### 1.0
* First release
