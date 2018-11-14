# senkomdevelopment

Cara Kerja:

clone repository:
git clone "link github ekstensi.git"

cek remote status:
git remote -v

add repository ke remote pribadi:
git remote add origin "link github ekstensi.git"

ambil semua nama branch yang ada:
git fetch

lihat status branch yg ada:
git branch

pindah branch utama (saat ini adalah branch dev/1.0):
git checkout dev/1.0

lakukan checking branch:
git branch

lihat apakah anda berada di branch dev/1.0

setelah itu, fetch dan pull:
git fetch
lalu
git pull

check branch yang ada:
git branch

pindah ke branch yang akan anda kerjakan:
git checkout -b namabranch

cek apakah sudah di sub branch yang akan anda kerjakan:
git branch

lakukan pulling:
git pull

maka local anda akan up to date, lalu selanjutnya commit utk pertama kali:
git add *
git commit -m "keterangan"
git push

setelah menyelesaikan bug fixing: lakukan PR (pull request) sebelah pojok kanan atas di github
lalu klik, lalu masukan reviewer, masukan dea aprizal saya sebagai reviewer
lalu klik create pull request

tunggu sampai saya accept, lalu progress anda akan di merge ke dev/1.0
lalu setelah semua selesai akan di merge ke master
Selamat bekerja!
