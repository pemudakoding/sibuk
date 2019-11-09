/**
     * [padDigits Buat bikin pad 0 contoh angka 1 akan menjadi 01]
     * @param  {[Integer]} number [angka yang akan di pad contoh 1 atau 2 dst]
     * @param  {[Integer]} digits [jumlah pad yang diinginkan jika 2 akan menjadi 01 3 akan menjadi 001]
     * @return {[Integer]}        [mengembalikan angka yang telah dipad sebelum 1 akan menjadi 01]
     */
    function padDigits(number, digits) {
      return Array(Math.max(digits - String(number).length + 1, 0)).join(0) + number;
    }