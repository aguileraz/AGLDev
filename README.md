##AGLDev

###About
This is a "<b>User Authentication</b>", "<b>Permissions Manager</b>", "<b>Multi DB</b>" module based on ZF2 skeleton application using Doctrine 2.

`AGLBase` - Authentication, mail, permissions, CRUD, and another cool things!

`AGLLOG` - Only for log system!

`AGLCOX` - An example of use MSSQL connection!

`AGLOther` - An example of simple Module!

###Installation
execute <b>composer update</b> after clone the project:
```sh
php composer.phar update
```

rename `*.dist` to `*.php` and configure as necessary in `config/autoload/` folder.

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
Use an separeted <b>MySQL DB</b> for Authentication and Permissions;

Another <b>MySQL DB</b> to `Logs` only;

Another <b>MySQL DB</b> for the rest of project using `orm_default`

An <b>MSSQL DB</b> to `AGLCOX` Module;

###The final project show like this:
1 <b>MySQL DB</b> for Module `AGLBase` (for authentication and permissions).

1 <b>MySQL DB</b> for Module `AGLLOG` (only logs here).

1 <b>MySQL DB</b> for `orm_default` used on entire project.

1 <b>MSSQL DB</b> for `AGLCOX` Module.

###Whats Done
I make use of 2 databases, one for `AGLCOX` Module and another for all project using `orm_default`, but can't move of de `orm_default` from module `AGLBase`.

###TO DO
Need to change `orm_default` to `orm_aglbase` (all authentications will be use this).

Need to configure a separeted database for `AGLCOX` Module (`orm_aglcox`).

Need to configure a separeted database for Logs (`orm_agllog`).

Need to configure a separeted database for entire project (`orm_default`).

Show Multi DB queries in `ZendDeveloperTools@toolbar`.

Show Auth informations in `ZendDeveloperTools@toolbar`.

Separate Modules `AGLBase` and `AGLLOG` from main project!