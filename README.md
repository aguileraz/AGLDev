AGLDev
=======================

Basic
------------
This is a "User Auth", "Permissions Manager" module based on ZF2 skeleton application.

Needs (goals)
------------
1 DB for Module AGLBase (for authentication and permissions).

1 DB for Module AGLLOG (only logs here).

1 DB for Module AGLCOX (a SQL DB).

Need change orm_default to orm_aglbase (all authentication using this).

Need use orm_default in AGLCOX.
