githubBrowser
=============

Coding task for MobiDev company

This project build using:
1. Simple MVC Framework: http://simplemvcframework.com/
2. php-github-api: https://github.com/KnpLabs/php-github-api
3. Bootstrab: http://getbootstrap.com/

I have not used anything from above as well as GitHub before, so I learned how to use them from it's documentatation.

Installation guide:
1. Download and unzip package.
2. Debloy db/githublikes.sql into MySQL database.
3. Open core/config.php and set your base URL, database credentials and GitHub temporary dir for cache.
4. errorlog.html should be writable.
5. Edit .htaccess file and save the base path. 
   (if the framework is installed in a folder the base path should reflect the folder path /path/to/folder/ otherwise a single / will do.
