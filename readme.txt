=== GeekOnyx Auto RTL Align ===
Contributors: GeekOnyx
Tags: rtl, arabic, alignment, auto-rtl, multi-language
Requires at least: 5.0
Tested up to: 6.9
Stable tag: 1.0.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automatically detects Arabic text in post titles and content to apply RTL (Right-to-Left) alignment, even on LTR sites.

== Description ==

GeekOnyx Auto RTL Align is a lightweight, zero-configuration plugin designed for multi-language websites. It automatically detects if a post title or content is written in Arabic and applies the correct Right-to-Left (RTL) alignment and direction.

This is particularly useful for sites that are primarily in English or French but occasionally host Arabic articles. The plugin ensures that Arabic text is displayed correctly with proper punctuation and alignment without breaking the layout of your LTR theme.

Key Features:
* **Automatic Detection**: Uses Unicode range detection to identify Arabic characters.
* **Safe for Themes**: Uses invisible Unicode control characters for titles to avoid breaking HTML attributes like `aria-label`.
* **Deep Integration**: Adds global CSS classes to the body and post containers for perfect styling.
* **Zero Configuration**: Just activate and it works!
* **Privacy Focused**: This plugin does not collect, store, or transmit any user data or communicate with external servers.

== Installation ==

1. Go to your WordPress Dashboard, navigate to **Plugins > Add New**.
2. Search for **GeekOnyx Auto RTL Align**.
3. Click **Install Now** and then **Activate**.

Alternatively, if you downloaded the ZIP file:
1. Go to **Plugins > Add New > Upload Plugin** in your dashboard.
2. Choose the plugin ZIP file and click **Install Now**.
3. Click **Activate Plugin**.

== Screenshots ==

1. Arabic article title and content automatically aligned to the right on an English site.

== Changelog ==

= 1.0.5 =
* Strip unwanted CSS styles injected by specific shortcodes (.jeg_breadcrumbs, .entry-header).
* Updated stable tag.

= 1.0.4 =
* Added languages folder for future internationalization.
* Updated stable tag.

= 1.0.3 =
* Added readme.txt for better WordPress integration.

= 1.0.2 =
* Added global body class for better single post title alignment.
* Improved CSS selectors for theme compatibility.

= 1.0.1 =
* Switched to Unicode control characters for titles to fix attribute-breaking bugs.
* Added post_class support for alignment.

= 1.0.0 =
* Initial release.
