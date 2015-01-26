AGLDev
=======================

Basic
------------
This is a "User Auth", "Permissions Manager" module based on ZF2 skeleton application.

How to use
------------
Import data/mysql.sql to you database!

Access http://yourlink/register to create new user.

Access http://yourlink/admin/usr to manager users.

Access http://yourlink//auth to authenticate.

Access http://yourlink//auth/logout to logout current session.

Access http://yourlink/admin/acl to manager roles/privileges and permissions.


Needs (goals)
------------
1 DB for Module AGLBase (for authentication and permissions).

1 DB for Module AGLLOG (only logs here).

1 DB for Module AGLCOX (a MSSQL DB).

Need change orm_default to orm_aglbase (all authentication using this).

Need use orm_default in AGLCOX.

