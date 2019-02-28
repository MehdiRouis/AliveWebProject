@echo off
Title Script hybride (BATCH/VBS) pour compter le nombre de lignes dans les fichiers textes contenus dans un dossier
Mode con cols=100 lines=20 & color 0A 
Set LogFile=%Tmp%\%~n0.txt
If Exist %LogFile% Del %LogFile%
echo.
echo         Compter le nombre de lignes dans les fichiers textes contenus dans un dossier
TimeOut /T 3 /NoBreak >Nul
CLS
echo.
for %%X in (*.php) do ( Call :CountLines "%%~fX" && Call :CountLines "%%~fX" >> %LogFile%)
echo.
echo Appuyer sur une touche pour ouvrir le fichier Log 
pause>Nul
Start %LogFile%
Exit /b
::**************************************************************
:CountLines
(echo File="%~1"
echo Wscript.Echo File ^& "   =====>   " ^& CountLines(File^)
echo Function CountLines(File^)
echo Const ForReading = 1
echo Dim fso, f, ra
echo Set fso = CreateObject("Scripting.FileSystemObject"^)
echo Set f = fso.OpenTextFile(File,ForReading^)
echo ra = f.ReadAll
echo CountLines = f.Line
echo f.Close
echo Set f = Nothing
echo Set fso = Nothing
echo End Function
)>"%Tmp%\%~n0.vbs"
cscript.exe /NoLogo "%Tmp%\%~n0.vbs"
del "%Tmp%\%~n0.vbs" >nul
::**************************************************************