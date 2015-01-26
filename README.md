AGLDev
=======================

Basic
------------
This is a "User Auth", "Permissions Manager", "Multi DB" module based on ZF2 skeleton application.

How to use
------------
Import <b>data/mysql.sql</b> to you mysql database.


Access http://<b>localhost</b>/register to create new user.

Access http://<b>localhost</b>/admin/usr to manager users.

Access http://<b>localhost</b>//auth to authenticate.

Access http://<b>localhost</b>//auth/logout to logout current session.

Access http://<b>localhost</b>/admin/acl to manager roles/privileges and permissions.

Change <b>localhost</b> to you app link.


Needs (goals)
------------
1 DB for Module AGLBase (for authentication and permissions).

1 DB for Module AGLLOG (only logs here).

1 DB for Module AGLCOX (a MSSQL DB).

Need change orm_default to orm_aglbase (all authentication using this).

Need use orm_default in AGLCOX.

