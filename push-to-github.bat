@echo off
echo ==============================================
echo  TUTU Bakery - Auto Push ke GitHub
echo ==============================================
echo.

git status
echo.

set /p commit_msg="Masukkan pesan update (atau tekan Enter untuk pesan default): "
if "%commit_msg%"=="" set commit_msg="Update data dan fitur TUTU Bakery"

git add .
git commit -m "%commit_msg%"
git push origin main

echo.
echo ==============================================
echo  Selesai! Render akan otomatis deploy update ini.
echo ==============================================
pause
