##AGLDev

###About
This is a "<b>User Authentication</b>", "<b>Permissions Manager</b>", "<b>Multi DB</b>" module based on ZF2 skeleton application using Doctrine 2.

###Installation
execute <b>composer update</b> after clone the project:
```sh
php composer.phar update
```

rename `*.dist` and configure then in `config/autoload/` folder.

Import `data/mysql.sql` to your mysql database.

###How to manage
Access http://<b>localhost</b>/register to create new user.

Access http://<b>localhost</b>/admin/usr to manager users.

Access http://<b>localhost</b>//auth to authenticate.

Access http://<b>localhost</b>//auth/logout to logout current session.

Access http://<b>localhost</b>/admin/acl to manager roles/privileges and permissions.

Change <b>localhost</b> to you app link.

###How to use
<b>Not finished.</b>

After finish the initial databases config, will introduce here, how to verificate indentity and permissions! 

###The Objective
Use an separeted MySQL DB for Authentication and Permissions;

Another MySQL DB to Logs only;

Another DB for the rest of project using `orm_default` (MSSQL or another MySQL, just for now!).

###The final project show like this:
1 MySQL DB for Module AGLBase (for authentication and permissions).

1 MySQL DB for Module AGLLOG (only logs here).

1 MSSQL/MySQL DB for other Modules including AGLCOX.

###Whats Done
I make use of 2 databases, one for `AGLCOX` Module and another for all project using `orm_default`, but can't move of de `orm_default` from module `AGLBase`.

###TO DO
Need to change `orm_default` to `orm_aglbase` (all authentication will be use this).

Need to use `orm_default` in `AGLCOX` (after `orm_aglbase` already working for auth).

Need to configure a separeted database for Logs (`orm_agllog`).

Show Multi DB queries in `ZendDeveloperTools@toolbar`.

Show Auth informations in `ZendDeveloperTools@toolbar`.

Separate Modules `AGLBase` and `AGLLOG` from main project!