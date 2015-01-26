AGLDev
=======================

Basic
------------
This is a "<b>User Auth</b>", "<b>Permissions Manager</b>", "<b>Multi DB</b>" module based on ZF2 skeleton application.

Installation
------------
execute <b>composer update</b> after clone the project:
```sh
php composer.phar update
```

rename `*.dist` and configure then in `config/autoload/` folder.

Import `data/mysql.sql` to your mysql database.

How to manage
------------
Access http://<b>localhost</b>/register to create new user.

Access http://<b>localhost</b>/admin/usr to manager users.

Access http://<b>localhost</b>//auth to authenticate.

Access http://<b>localhost</b>//auth/logout to logout current session.

Access http://<b>localhost</b>/admin/acl to manager roles/privileges and permissions.

Change <b>localhost</b> to you app link.

How to use
------------
<b>Not finished.</b>

Needs (goals)
------------
1 DB for Module AGLBase (for authentication and permissions).

1 DB for Module AGLLOG (only logs here).

1 DB for Module AGLCOX (a MSSQL DB).

Need change orm_default to orm_aglbase (all authentication will be use this).

Need use orm_default in AGLCOX (after orm_aglbase already working for auth).

Show Multi DB queries in ZendDeveloperTools@toolbar.

Show Auth informations in ZendDeveloperTools@toolbar.

