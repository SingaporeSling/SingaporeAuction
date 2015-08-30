1. Download WAMP - http://www.wampserver.com/en/

	1.1. Run the .exe file to start the installation. Install in C:, not in ProgramFiles.
	1.2. If you are using Skype - check Tools/Settings/Advanced/Connection then remove the tick from Port 80 and 443. Restart Skype.
	1.3. Put WAMP online - you simply need to click on the icon with the left button of the mouse, choose Restart All Services and wait untill the icon turns green.
	1.4 Now you can load localhost in your browser to see if WAMP works correctly. You should see the starting page of WAMP.
		- enter the www folder, which is located in the wamp folder. 
		- in www create your folder - singapore-sling. Then create (click right button -> create new text file and change .txt with .php) index.php file. 
		- if you are not sure how to open it - you can use SublimeText, NotePad++ or just NotePad. 
		- in index.php write:

		<?php echo 1;>

		- save the file and load localhost/singapore-sling
		- now you should see 1 in your browser
		- delete index.php

2. Download Composer - https://getcomposer.org/download/ - don't be frightened - just use Windows Installer.
	- at some point the installer will ask you about php.exe
	- you will find it in wamp/bin/php/php5.5.12/php.exe

3. Make Laravel work
	- the last thing you need to do before loading the project on your computer is setting up Laravel
	- in the github repository I have left all of the Laravel's files, so that you do not need to configure it for yourself - it is already configured, so don't wory!
	- enter Windows/System32/drivers/etc/hosts - you can load it with SublimeText, NotePad++ or NotePad - it doesn't matter
	- add that 

		127.0.0.1       singapore-sling.dev

	... on the last line and do not delete anything from the file
	- your last two lines should look like that: 

		127.0.0.1       localhost
		127.0.0.1       singapore-sling.dev

4. Ready to go
	- if you followed the steps carefully, then you're ready to load the project.
	- pull all the files from the repo and place them in the singapore-sling folder. 
	- do not put the files you pulled in a folder - this will not work!
	- open your command prompt, enter the singapore-sling folder with it and write 

		composer update

	- if there are no errors in the command prompt - everything is ok
	- load in your browser singapore-sling.dev

5. What's next
	5.1. What do we have here?
		5.1.1. How to create an account:
			- load: singapore-slin.dev/register
					- you can test the form to see if it works properly on your browser. Try registering - use a real email adress in order to receive a mail with a link for activating your account. The input fields are validated so that you will see an error message if you try to put invalid data in it.

					you will find the html files for registration and the mail that is sent in the views/users folder. 

					- enter the email you used for registering. If you haven't received an email yet, don't worry, it is the Mailgun service and sooner or later you will receive an email. 
					- when you click on the link - it should redirect you to a page (excuse me if I've forgoten to remove the offensive message)

					you will find the html file in views/users

					- after 4 seconds you will be redirected from that page to the login form so that you can try logging

					you will find the html file in views/users

			- you can reach the login form only by loading: singapore-sling/login

		5.1.2. How to add a product:
			- load: singapore-sling.dev/create-product
				- you can try add an item
				- the form is protected so that it won't send your request if you're not logged in and an error message will appear.
				- for the moment, there is a bug and you cannot send a picture of the product. In theory, when you choose the picture/pictures, they are automatically send to the server so there is no button.
				- to add your product - simply use the add button.
				- you will be send to another html file, which should be the all products view.

				 you will find the html files in views/products

		5.1.3. The rest is still not done, but when it is ready - I will add it to that document.

	5.2. How to work with all that?

		- Probably this looks quite intimidating. Don't worry, it isn't.

			5.2.1. Where to put styles and scripts?
				- you need to put your files in the public folder. If you have scipts - you simply put them in the js folder. If you have bootstrap, css or other type of style - put it in styles folder.
				- to make them work, uncomment @yield('styles') and above it put: 

				{{ HTML::script('folder/file.js') }}
				{{ HTML::style(folder/file.js) }}

				- if you don't want to mess with the php - do not put or create anything in the other folders.

			5.2.2. Where is the data base?
				- to see the database - go to singapore-sling.dev/phpmyadmin
				- from singapore-sling you can choose a table to see
				- in browse - you will see the data you have put in - for example, your registration or the products you have added
				- if you want to empty the database - do not do it from phpmyadmin - it will clear it, but only locally; in order to do that, write in the command prompt:

					php artisan migrate:reset

				- the cmd will ask you if you're sure - answer with:

					y

				- then write again:

					php artisan migrate

				- you will be asked again whther you're sure about it - answer again with:

					y
	
	5.3. Why do we need all those files and folders?
		- Laravel uses MVC pattern, which stands for Model - View - Controller
		- In the models folder you will find the classes, which we will use.
				for example, we need user - so we create class User, which inherits a built in the library class
		- Then, there are controllers - we make a controller, which uses the instance of that class
				for example, we create UsersController, that uses the class User. 

				- in that controller we write all the methods that are concerned with the user somehow 

					 saveUser(), register(), ets.

		- Finally, there are the view. 

			- In the route.php we put the way we make the request, the url to which the request leads and the method it uses

				for example, Route:: get('register', 'UsersController@register')

					- the contrsoction Route::get() means that we are using a class and a stattic method :

						Class::staticMethod()

					- you din't need to know that, bu if you understand it - it is easier to remember it, and if you need - to use it.

			- There is a master.blade.php - this is the main view! Everything you do there, will be inherited by the other views. Don't worry - blade is just like Handlebars.js. Put your html there

				- You will see users and products folder - they are containing all the views needed and they extend the master view so everything you put in master.blade.php will be inherited by them


Basically, that's it! If you have any questions - you can reach me anytime:

skype: ronivel
phone: 0888 13 00 49

Good luck!

P.S. Open the cmd - write: 

		php artisan migrate

		y

		php artisan db:seed










