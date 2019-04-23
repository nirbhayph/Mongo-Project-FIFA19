# GOFifa (Built with PHP)

Demo Links - https://gofifa.herokuapp.com

Hosted through Heroku and Amazon Web Services

## If you're using Ubuntu on your local machine, and you want to install the prerequisites at first and then add the source, follow the following steps:

Instructions to setup the php application

```
Instruction to setup php (apache)

Install Apache
```
1. sudo apt-get update -y #using the -y option will automatically accept the conditions of the source update
2. sudo apt-get install apache2 -y #install apache
3. sudo systemctl start apache2.service #start apache
```

Install PHP
```
1. sudo apt-get install php -y
2. sudo apt-get install -y php-{bcmath,bz2,intl,gd,mbstring,mcrypt,mysql,zip} && sudo apt-get install libapache2-mod-php -y
```

Start Apache on boot
```
1. sudo systemctl enable apache2.service
```

Finally, restart Apache to allow PHP to run.
```
1. systemctl restart apache2.service

```
To know more visit: https://www.vultr.com/docs/how-to-install-apache-mysql-and-php-on-ubuntu-17-04
```

Placing and verifying setup for the client files
```
1. cd /var/www/html
2. mkdir gofifa
3. add the contents of the web folder in the repository to the newly created directory gofifa.
4. run php from web folder
4. visit http://localhost:<YOUR_PORT> in your browser to verify if application has been setup correctly.
```
- Add mongo data folder from your local machine's mongodb path.
- Add the PHP Scripts from the scripts folder in the repository. (Change path to local php scripts for connecting with mongo in gofifa php files).  

## Similarly, you can setup the application on a MAC too.

## Built With:
    - PHP
    - MongoDB
    - Python
    - HTML/Bootstrap4/JS/JQ
    - GitHub
    - Leaflet
    
## License
This project is licensed under the MIT License - see the LICENSE.md file for details

## Developers:
- Nirbhay P - @nirbhayph - https://github.com/nirbhayph 
- Dhiren C - @dhirensc - https://github.com/dhirensc 
- Yash B - @lucifer101 - https://github.com/lucifer101 
- Hemanth K - @hemanthyadav29 - https://github.com/hemanthyadav29 

# PHP - Heroku Connect

A PHP app that makes use of the [Silex](http://silex.sensiolabs.org/) web framework, which can easily be deployed to Heroku.

This application supports the [Getting Started with PHP on Heroku](https://devcenter.heroku.com/articles/getting-started-with-php) article - check it out.

## Deploying

Install the [Heroku Toolbelt](https://toolbelt.heroku.com/).

```sh
$ git clone git@github.com:heroku/php-getting-started.git # or clone your own fork
$ cd php-getting-started
$ heroku create
$ git push heroku master
$ heroku open
```

or

[![Deploy to Heroku](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

## Documentation

For more information about using PHP on Heroku, see these Dev Center articles:

- [Getting Started with PHP on Heroku](https://devcenter.heroku.com/articles/getting-started-with-php)
- [PHP on Heroku](https://devcenter.heroku.com/categories/php)


