##############################
############ PERHATIAN !!! ###

Hallo,

ada sedikit infomasi bagi anda yang menginstall APLIKASI SISTEM INFOMASI BUKU INDUK.
Akan ada beberapa masalah yang akan anda temui jika anda menginstallnya tanpa melihat.
File Readme ini.
 Yaitu:

 - gambar default-avatar tidak muncul atau hilang
   cara memperbaiki. silahkan ke folder asset/js/ 
   buka file all_validation.js &  form.js
   silahkan ubah
   var url = "http://localhost/sibuk/"; 
   menjadi 
   var url = "domain_kamu.com";

- silahkan buka folder core dan buka file base_url.php
  anda akan melihar $root = $_SERVER['DOCUMENT_ROOT']; 
  Itu artinya mengambil Folder root hosting yang anda gunakan hosting saya menggunakan /var/html/www/
  karna saya membuat folder sendiri untuk web ini yaitu folder sibuk jadi saya menambahkan /sibuk pada pemanggilan
  function di init.php
  example $root.'/sibuk/inc/koneksi.php'; "sibuk" adalah nama folder tempat saya menyimpan web.
  jika anda tidak menaruh web ini didalam folder tertentu atau langsung di folder root/public_html silahkan
  ganti menjadi $root.'/inc/koneksi.php';

- Silahkan ganti $url = 'http://localhost/sibuk' pada base_url.php di folder core
  menjadi $url = 'domain_kamu.com' 


  hanya itu masalah yang saya temui sampai saat ini. jika anda menemukan masalah lain silahkan hubungi saya
  FACEBOOK: Stiven Trizky Katuuk
  WHATSAPP: 082271516330