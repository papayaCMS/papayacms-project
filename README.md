# Papaya CMS Project Skeleton

This is a project skeleton for your own [papayaCMS](http://www.papaya-cms.com) projects. It allows to use
[Composer](http://getcomposer.org) for project initialization.

```
composer create-project papaya/cms-project projectname
```

If you like to use the latest development versions use:

```
composer create-project papaya/cms-project projectname -s dev
```

## Local Development Server

```
cd projectname
phing
```

The Skeleton includes a build file for [Phing](http://www.phing.info). It uses
the `composer` and `git` commands so make sure they can be called.

By default the skeleton is configured to use a SQLite 3 database and
can work with the PHP built-in webserver. 

### Define Build Properties

Copy the file `dist.build.properties` to `build.properties` and modify it. At the
moment it includes to options for database connections. One for the development
and one for the deployment.

### Start the Webserver

You can use included shell scripts (`server.sh`, `sever.bat`) to start the webserver
for your papaya CMS project on port 8080.

```
server
```

This calls `php -S localhost:8080 -t ./htdocs server.php`.

Open the browser at `http://localhost:8080/papaya` to continue the setup.

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

The `dist.build.properties`/`build.properties` contains a property `dist.database.uri`
that will be used for the configuration file in exports. 

Additionally the exports will make use of Git tags. If the current commit is tagged this
tag will be used for the file/directory name.

As directory:

```
phing export-directory
```

As zip:

```
phing export-zip
```

As tar gzip:

```
phing export-tgz
```



