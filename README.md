What Is DcopyFinder
=======================
DcopyFinder is the program modified by twins in HIT(Junior) which can release teacher's
work on student's Plagiarise. Well, It is not same as moddle-moss(also developed by HIT CMS), and JavaMoss
(developed by twins myself),It is coded all Indenpendently, and run without other's assistant( like moss).

Application Requriement
=======================
This application is written to platform independent, this application use:

1)Any of the most common web servers like apache or IIS

2)No need to any database

3)Php 5.1 or later installed 

4)For file upload we need to Turn off mod_security filtering on server level or application level using .htaccess 
sample of .htaccess is on root application dir.

Quick Install
=============

For the impatient, here is a basic outline of the 
installation process, which normally takes me only 
a few minutes:

1) copy folder content to any folder which is readable by your web server

2) set folder permision for this dir (files)
on windows add everyone group read and write
on linux set to 0775

3) go to index.php and enjoy our application

The Most Important
==============

Ok, twins modified it from mkhoster(http://sourceforge.net/projects/plagiarismcheck/), but not satisified 
with the online check with google check, ok, helped by C language, I make the c as the underlying layer
(Algorithm layer) and viw layer( php). with the origin hope, I want to do it with JRuby and Java, while
the core thought is most important for as. Beacuse of PubMed, the next work should modified by you.
Thanks ~

Good luck and have fun!


