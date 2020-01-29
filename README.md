# Xàldiga web
New website for Xàldiga Taller de Festes.

# Working

## Generating webpack files
To pack React files, CSS files, ... execute the next line in the console:
```
yarn encore dev
```

# Uploading to server

## Generating SQL script
Open bash console from C:\ProgramFiles\git\bin\bash.exe and execute 
```
php bin/console doctrine:schema:create --dump-sql > statement.sql
```
to generate a SQL script. This script can be uploaded to the server to create the tables inside the database.
