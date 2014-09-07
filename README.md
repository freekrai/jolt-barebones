# Twilio Barebones Application built on the Jolt framework

Use this barebones application to quickly setup and start working on a new Jolt application. This application uses the latest Jolt repositories.

This barebones application was built for Composer. This makes setting up a new Twilio application quick and easy.

## Install Composer

If you have not installed Composer, do that now. I prefer to install Composer globally in `/usr/local/bin`, but you may also install Composer locally in your current working directory. For this tutorial, I assume you have installed Composer locally.

<http://getcomposer.org/doc/00-intro.md#installation>

## Install the Application

After you install Composer, run this command from the directory in which you want to install your new Jolt Framework application.

    php composer.phar create-project freekrai/jolt-barebones [my-app-name]

Replace <code>[my-app-name]</code> with the desired directory name for your new application. You'll want to point your virtual host document root to your new application's directory.

Edit config.ini with your configuration settings, and that's it! Now go build something cool.

## Built-in server

With PHP 5.4 and up, we have a built-in web server, this is handy for local development.

You can run your new app locally using the following command in the terminal:

	php -S 127.0.0.1:8888 server.php
	
This will route all processes through the server.php file, which whill then treat this the same as if it was on a web server. This lets you handle local development nicely.