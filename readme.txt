=== Save The Developers ===
Contributors: transom
Donate: http://1bigidea.com/blog/wp-donate/
Tags: browser, visitor, internet explorer, msie
Requires at least: 2.0.2
Tested up to: 2.5.1
Stable tag: 1.0

Ask your site's visitors using MSIE 6 to upgrade their browser with an subtle javascript banner that disappears after appearing.

== Description ==

All web developers and theme designers struggle with the poor rendering capabilities of Microsoft's Internet Explorer 6. In addition, users of MSIE 6 also tend to be more vulnerable to security issues. The team at http://www.savethedevelopers.com/ have undertaken a campaign to encourage browser users to upgrade to MSIE 7 or other browsers.

The campaign invokes a piece of javascript that presents a discrete panel that drops from the top of the web page to encourage the visitor to upgrade (directing them to the Save The Developers web site for more information.) The panel disappears in a few seconds.

This plugin inserts the javascript for non-logged-in users only. In addition, the panel is only shown once per hour maximum (using a custom cookie.) By default, the javascript is loaded from the http://www.savethedevelopers.com web site. For performance reasons, you may wish to place a copy in the directory of the plugin. The plugin will see the file (must be named as downloaded from the host site) and use it instead.

== Installation ==

1. Upload the enclosing folder (typically savethedevelopers/) to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
Optionally, go to http://www.savethedevelopers.com/ and download the current version of the just.say.no.to.ie6.js and upload it to the folder referenced above.

== Frequently Asked Questions ==

= Why waste your time on a trival exercise like this? =

This started as a personal programming project - a proof of concept. In the end, I learned a lot about programming in a WordPress environment. (And updated another's very popular plugin to work in 2.5+)

= What will visitors not using MSIE6 see? =

Nothing. If they were to examine the source of the first web page they visit, they would see the &lt;script&gt; block.

== Screenshots ==

1. The panel in action - clicking will take you to http://www.savethedevelopers.com/

