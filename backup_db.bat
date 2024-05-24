@echo off
REM 
set USER=root
set PASSWORD=
set DATABASE=pruebas
set BACKUP_DIR=C:\Users\Usuario\Desktop\prueba\backup_db
set MYSQLDUMP_PATH="C:\xampp\mysql\bin\mysqldump.exe"

REM 
for /f "tokens=2-4 delims=/ " %%a in ('date /t') do set DATE=%%a%%b%%c
for /f "tokens=1-2 delims=: " %%a in ('time /t') do set TIME=%%a%%b
set BACKUP_FILE=%BACKUP_DIR%\%DATABASE%_%DATE%_%TIME%.sql

REM 
if not exist %BACKUP_DIR% mkdir %BACKUP_DIR%



REM Realizar la copia de seguridad
if "%PASSWORD%"=="" (
    %MYSQLDUMP_PATH% -u %USER% %DATABASE% > %BACKUP_FILE%
) else (
    %MYSQLDUMP_PATH% -u %USER% -p%PASSWORD% %DATABASE% > %BACKUP_FILE%
)

REM Verificar si mysqldump se ejecutó correctamente
if %ERRORLEVEL% neq 0 (
    echo Error al realizar la copia de seguridad
) else (
    echo Copia de seguridad realizada y almacenada en %BACKUP_FILE%
)

REM 
exit
