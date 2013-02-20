Kitpages Cms Edition
========================

This document contains information on how to install KitpagesCms Edition.
KitpagesCms Edition is based on Symfony Standard edition with additional the bundle to use the kitpages Cms

## Installation

### Install the Vendor Libraries

Install Composer and run the following command:

```bash
php composer.phar create-project kitpages/kitpages-cms-edition path/ v2.1.0
```

### Modify parameters.ini

edit parameters.yml

* modify the database information
* modify base_url

### import database

* You must create the database.
* run the command:

```bash
php app/console kitCmsDemo:importDatabase
```

* answer to the questions


## publish all

* type the following URL http://example.com/cms/nav/publishAll

* Sign in

```
login:admin
pass:admin
```

Your website should be accessible on  http://example.com

