@echo off
title TUTU Bakery - Push ke GitHub (kvntrial)
color 0A
echo ========================================================
echo   TUTU Bakery - Auto Push ke GitHub (kvntrial)
echo ========================================================
echo.
echo Akun Git: kvntrial (kvntrial@gmail.com)
echo Target  : https://github.com/kvntrial/TUTU.git
echo.

git status
echo.

set /p commit_msg="Tekan Enter untuk push sekarang (atau ketik pesan update): "
if "%commit_msg%"=="" set commit_msg="Update aplikasi TUTU Bakery"

git add .
git commit -m "%commit_msg%"
echo.
echo Sedang mengunggah ke GitHub...
git push -u origin main

if %ERRORLEVEL% EQU 0 (
    echo.
    echo ========================================================
    echo   BERHASIL! Kode sudah ter-upload ke github.com/kvntrial/TUTU
    echo   Render akan otomatis mendeteksi dan meng-online-kan aplikasi.
    echo ========================================================
) else (
    echo.
    echo ========================================================
    echo   Perhatian: Jika muncul pop-up browser GitHub, 
    echo   silakan klik 'Sign in with your browser' untuk konfirmasi.
    echo ========================================================
)

echo.
pause
