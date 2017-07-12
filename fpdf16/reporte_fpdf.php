<?php
    function imagepgm($image, $filename = null)
    {
        $pgm = "P5 ".imagesx($image)." ".imagesy($image)." 255\n";
        for($y = 0; $y < imagesy($image); $y++)
        {
            for($x = 0; $x < imagesx($image); $x++)
            {
                $colors = imagecolorsforindex($image, imagecolorat($image, $x, $y));
                $pgm .= chr(0.3 * $colors["red"] + 0.59 * $colors["green"] + 0.11 * $colors["blue"]);
            }
        }
        if($filename != null)
        {
            $fp = fopen($filename, "w");
            fwrite($fp, $pgm);
            fclose($fp);
        }
        else
        {
            return $pgm;
        }
    }
?>