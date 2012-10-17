Kitpages Cms Edition
========================

This document contains information on how to install KitpagesCms Edition.
KitpagesCms Edition is based on Symfony Standard edition with additional the bundle to use the kitpages Cms
A backup of a site demo is also available

    Kitpages bundles added
    - KitpagesCmsBundle
    - KitpagesFileBundle
    - KitpagesCacheControlBundle
    - KitpagesSimpleCacheBundle
    - KitpagesRedirectBundle
    - KitpagesUtilBundle

    Other bundles
    - DoctrineExtensions
    - DoctrineExtensionsBundle
    - FOSUserBundle

1) Installation
---------------

a) Install the Vendor Libraries
    * Install Composer and run the following command:
        php composer.phar create-project kitpages/kitpages-cms-edition path/ v2.1.0

b) Modify parameters.ini

    * edit parameters.ini
        modify the database information
        modify base_url

c) import database

    * You must create the database.
    * run the command:
        php app/console kitCmsDemo:importDatabase
        answers to questions


2) publish all
-----------------------
    * type the following URL
        http://example.com/cms/nav/publishAll

    * Sign in
        login:admin
        pass:admin


Your website should be accessible on  http://example.com

