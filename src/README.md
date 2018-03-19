# Source Directory

This is the base directory for your project specific papaya modules written in PHP.
This directory and the vendor directory are scanned for modules.

## Use Module Packages

If you add a module package to your composer.json it is installed into the
vendor directory.

Example

    "require": {
      "papaya/module-standard": "*"
    }