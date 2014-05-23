= Theme Directory

This is the base directory the themes. You can create a subdirectory
for your project specific theme here.

Themes contain the CSS and Javascript files and layout images for a
project. Basically the files the browser needs to access directly.

== Use Theme Packages

If you add a theme package to your composer.json it will be installed here.

Example:

    "require": {
      "papaya/theme-dynamic": "*"
    }

Be aware the this can trigger the installation of a template package, too.