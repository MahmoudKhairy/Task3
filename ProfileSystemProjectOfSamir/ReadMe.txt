in php code :
-first i convert the html extention of the design files to php
-there is a three pages :-1- Login   2-register   3-sign Up

in the LOGIN PAGE i am used validation method to validte that the username and the password was already found in the database,
if they are found , we will go directly to the profile page , if it is not found , an error messege appear said that 
you have to sign up if you havn't email.


in the REGISTER PAGE i am used another validation method to all fields , but in the username and the email i do two validation 
one to be sure that they are valid charater , and the second on is to be sure that this username and email not found yet in
the database because it's wrong to have two username are the same or two email are the same.
if all is accepted we will go to the profile page.


in the PROFILE PAGE i used session to be able to know who are this person who opend the profile , also i used session in the last
two page , then i display in each field the database of the users 

finaly i want to say that this is declearation to my code but you may see that the code doesn't run good beacuse there
a problems faced me and i don't know why this happen.

THANKS!  