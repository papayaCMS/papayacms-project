# Papaya CMS Project Skeleton

This is a project skeleton for your own [papayaCMS](http://www.papaya-cms.com) projects. It allows to use
[Composer](http://getcomposer.org) for project initialization.

It includes a build file for [Phing](http://www.phing.info). It uses
the `composer` and `git` commands so make sure they can be called.

```
composer create-project papaya/cms-project projectname
```

If you like to use the latest development versions use:

```
composer create-project papaya/cms-project projectname -s dev
```

## Using Phive

You can use Phive to install tools for papaya. Tools will be installed into the subdirectory `tools/`.

```
cd projectname
phive install
tools/phing
```

## Manually

Make sure that you can call `phing` and run it.

```
cd projectname
phing
```

## Local Development Server

By default the skeleton is configured to use a SQLite 3 database and
can work with the PHP built-in webserver. 

### Define Build Properties

Copy the file `dist.build.properties` to `build.properties` and modify it. At the
moment it includes to options for database connections. One for the development
and one for the deployment.

### Initialize Git repository (optional)

The skeleton is optimized to be used with Git. Now would be a good point
to initialize the repository.

```
git init
git add *
git commit -m"new project" 
```

### Start the Webserver

You can use build scripts to start the webserver
for your papaya CMS project on port 8080.

```
phing run
```

This will install the dependecies (`composer install`), update the revision file and start the PHP built-in webserver.

Open the browser at `http://localhost:8080/papaya` to continue the setup.

### Update Project Dependencies

Install the dependencies as defined by the repository (composer.lock):

```
phing dependencies-install
```

Update the dependencies (composer.json):

```
phing dependencies-update
```

Because papaya CMS uses composer you can call `composer install` to install the dependencies
defined by the repository or `composer update` to update them. However this will not update 
the revision file (Used to display project and papaya core version in administration interface).

### Cloning An Existing Project

After you clone an existing project you will have to call `composer install` directly.

The main build file is provided by the papaya CMS core. If you clone an existing project repository
the dependencies are not available so neither are the build tasks. Initially the dependencies were
installed by `composer create-project`. So you will have to install them directly once (or if you delete 
the `vendor` directory.

## Modules

Adding additional module packages:

```
composer require papaya/module-domains
```

### Modules inside the project

Project specific modules can be put into the `src/` directory. 

## Themes and Templates

Themes and templates can be composer packages, too.

```
composer require papaya/theme-dynamic
```

Theme package will have a dependency to the template package. You do not need
to require them manually. (But you can.)

### Templates inside the project

Templates are installed into the templates subdirectory. You can add a new
directory to your project and develop/maintain the template there.

### Themes inside the project

Theme are installed into the htdocs/papaya-themes subdirectory. You can add a new
directory to your project and develop/maintain the theme there.

## Export the project for deployment

The `build.properties` (after copied from `dist.build.properties`) contains a 
property `dist.database.uri` that will be used for the configuration file in exports. 

Additionally the exports will make use of Git tags. If the current commit is tagged this
tag will be used for the file/directory name.

```
phing export
```
