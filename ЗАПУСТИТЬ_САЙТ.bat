@echo off
chcp 65001 > nul
title Запуск сайта Sky
echo ======================================================
echo          ВЛАДИМИРСКИЙ АСК ДОСААФ РОССИИ
echo ======================================================
echo.
echo Перед запуском проверьте:
echo [ ] Запущен ли Apache в XAMPP?
echo [ ] Запущен ли MySQL в XAMPP?
echo [ ] Импортирована ли база данных ask_dosaaf_db?
echo.
echo Нажмите любую клавишу, чтобы открыть сайт...
pause > nul
echo.
echo Открываю http://localhost/Sky/ ...
start http://localhost/Sky/
exit
