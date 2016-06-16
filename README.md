# WordPress site plugin boilerplate

A boilerplate for site custom plugin. Custom post types, taxonomies, shortcodes and functionality should be defined in a custom plugin. This repo is a plugin that you can enable, but no functionality is defined by it. This plugin is a template and should be used as such.

For information on how plugins work, visit the 'Writing a Plugin' page in the codex: [http://codex.wordpress.org/Writing_a_Plugin](http://codex.wordpress.org/Writing_a_Plugin).

The contents of this directory should be placed in your plugins directory (usually `wp-content/plugins`). Once cloned this directory should no longer be a repo (remove the `.git` directory).

## Function reference

Please refer to this project's function reference documentation: [nathansh.github.io/penguinpress-plugin](http://nathansh.github.io/penguinpress-plugin/docs)

## sitename.php

This is the main plugin file. From here all other files are included. The meta info at the top needs to be set with all instances of `SITE NAME` & `sitename` replaced with your project's name.

## Instantiation/dependency management

I'm slowly moving my boilerplates to be a bit more object oriented. I've moved most script loading into a class so we can have some light dependency management. Dependencies can be passed in, and if not met this plugin will display a helpful message and deactivate itself.

This plugin instantiates its class as such:

```php
require_once 'includes/class-penguinpress-site-plugin.php';
add_action( 'plugins_loaded', function() {
	$penguinpress_site_plugin = new PenguinPress_Site_Plugin( __FILE__ );
} );
```

An `$args` array can be supplied as a second argument, passing in an array of dependencies in the following format:

```php
$args = array(
	'dependencies' => array(
		'penguinpress-utils/penguinpress-utils.php' => array(
			'title' => 'PenguinPress - Utils',
			'url' => 'https://github.com/nathansh/penguinpress-utils',
			'repo' => 'https://github.com/nathansh/penguinpress-utils.git'
		)
	)
);

$penguinpress_site_plugin = new PenguinPress_Site_Plugin( __FILE__, $args );
```

## Custom Post Types.
**Location:** `posttypes/postype-TYPE.php`

Each custom post type is defined in its own file in the `/posttypes` directory. `template.posttype-TYPE.php` is a template for creating custom post types. Post type files should be named posttype-TYPENAME.php. Each of these files gets automatically included. Each instance of TYPENAME should be replaced with the desired slug.

More information about custom post types: [http://codex.wordpress.org/Function_Reference/register_post_type](http://codex.wordpress.org/Function_Reference/register_post_type)

## Custom Taxonomies
**Location:** `taxonomies/taxonomy-TERM.php`

Each custom taxonomy is defined in its own file in the `/taxonomies` directory. `template.taxonomy-TAX.php` is a template for creating custom post types. Post type files should be named taxonomy-TAX.php. Each of these files gets automatically included. Each instance of TAX should be replaced with the desired slug.

## Utilities
Utility functions have been moved to [a separate utilities plugin](https://github.com/nathansh/penguinpress-utils) for ubiquity between plugins and themes.


## Includes Folder

#### ACF Options Pages ([documentation](http://www.advancedcustomfields.com/resources/acf_add_options_page))

**Location:** `includes/options.php`

Options Pages create new menu items called “Options” which can hold advanced custom field groups (just like any other edit page). You can also register multiple options pages.

**WARNING:** When using the 'position' parameter, if two menu items use the same position attribute, one of the items will be overwritten. You can use a decimal instead of integer values to fix this.

**e.g.** '63.3' instead of 63 (*Note: You must use quotes when using decimals*).

**Default Menu Items & Postions**

- 2 - Dashboard
- 4 - Separator
- 5 - Posts
- 10 - Media
- 15 - Links
- 20 - Pages
- 25 - Comments
- 59 - Separator
- 60 - Appearance
- 65 - Plugins
- 70 - Users
- 75 - Tools
- 80 - Settings
- 99 - Separator﻿
