# PHP PhantomJS - Test screenshot as a webservice

## Installation
* Clone repository
* move to repository folder
* download apache server ([get Apache](https://httpd.apache.org/download.cgi))
* ```composer install``` ([get Composer](https://getcomposer.org/))
* ```chown -R www-data:www-data screenshots``` to make writtable by app this folder
### Optional
* ```chmod 755 procedure_capture.partial``` in custom_scripts folder for app reads this file
* ```chown www-data:www-data phantomjs``` to make executable by app phantomjs bin in bin folder

## Utilization
* go to the browser for testing service
* URL Example ```http://localhost/task/screenshotservice.php?id=Bzm9S8QIgD1```
