This is a Library Management System , In Which there are different books with Different 
Authors and every book is recognized with IBAN number. 
Admin can add a book, users can get the book after apply for a book from admin. 
A book is issued for 1 month period and after one month user will get the email to
return the book or he will be charged fine. 
The fine is auto calculated and incremented after 1 week span. 
The function is placed in Commands.

The functionality could be achieved in many ways ,But i used a single table to 
achieve the functionality.

Also there are no migrations made into the project yet the project is 
complete and working fine.  The sql is attached with the project.


Please Note Some Points for the Project To test run:

Unzip The Project
add database with name "lms" in mysql and import the lms.sql in it.
The admin will be Login with the Email "nauman_08@hotmail.com" with password "asd202020".
The general user can be registered normally ,, the existing general user is Email "jhon@info.com" with password "asd202020"
The admin has basic route address "*url*/admin/dashboard".
Further It is a basic Project to test the functionality and skillset. This project can be expanded according to the requirments.
For the weekly email system ,I have set the laravel scheduler with the command "php artisan day:update"  and the schedular can be registered as a cronjob on the server to auto send emails to the users about the expiry of the assigned book. I have used Mailtrap for the test email ,you can change the mail credentials in the envoirment file accordingly.
