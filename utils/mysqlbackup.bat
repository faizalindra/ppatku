@echo off
cd /d "c:\xampp\mysql\bin"
set timestamp=%date:~6,4%%date:~3,2%%date:~0,2%
set archive="C:\Program Files\7-Zip\7z.exe"
set backupDir="D:\backup"
mysqldump.exe -u root -p -hlocalhost ppatku> %backupDir%\ppatku.sql
%archive% a -tgzip %backupDir%\%timestamp%_ppatku.zip %backupDir%\ppatku.sql
del %backupDir%\ppatku.sql
pause