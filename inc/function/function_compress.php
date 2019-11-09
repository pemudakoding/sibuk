<?php

    function compressImage($sumberGambar,$destinasi)
    {
        /**
         * GET IMAGE INFORMATION
         */

         
        $informasiGambar['propertyGambar'] = getImageSize($sumberGambar);
        $informasiGambar['ukuran']         = filesize($sumberGambar);
        /**
         * CHECK IMAGE MIME
         */
        if($informasiGambar['propertyGambar']['mime'] == 'image/jpeg'):     $sumber  = imagecreatefromjpeg($sumberGambar);
        elseif($informasiGambar['propertyGambar']['mime'] == 'image/png'):  $sumber  = imagecreatefrompng($sumberGambar);
        endif;

        /**
         * CHECK IMAGE SIZE AND GET THE RESOLUTION
         */
        if($informasiGambar['ukuran'] >= 250000):     $resolusi = 40;
        elseif($informasiGambar['ukuran'] >= 125000): $resolusi = 60;
        elseif($informasiGambar['ukuran'] > 800000):  $resolusi = 80;
        elseif($informasiGambar['ukuran'] > 400000):  $resolusi = 90;
        endif;

        /**
         * CHECK THE FILES SUCCES COMPRESS OR NOT :)
         */
        return imagejpeg($sumber,$destinasi,$resolusi);
    }

?>