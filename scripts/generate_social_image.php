<?php

declare(strict_types=1);

/** Generate the share-card and PNG fallback favicon from the site's cake artwork. */
function color(GdImage $image, int $red, int $green, int $blue, int $alpha = 0): int
{
    return imagecolorallocatealpha($image, $red, $green, $blue, $alpha);
}

$width = 1200;
$height = 630;
$image = imagecreatetruecolor($width, $height);
imagealphablending($image, true);

for ($y = 0; $y < $height; $y++) {
    $progress = $y / ($height - 1);
    imagefilledrectangle($image, 0, $y, $width, $y, color($image, (int) (255 - (8 * $progress)), 241 - (int) (22 * $progress), 242 - (int) (8 * $progress)));
}

imagefilledellipse($image, 130, 100, 360, 360, color($image, 255, 255, 255, 55));
imagefilledellipse($image, 1090, 570, 470, 470, color($image, 253, 164, 175, 70));

foreach ([[140, 200], [230, 390], [330, 130], [865, 120], [1040, 190], [1090, 395], [790, 470], [410, 515]] as [$x, $y]) {
    $pink = color($image, 244, 114, 182);
    imagefilledellipse($image, $x, $y, 12, 12, $pink);
    imagefilledellipse($image, $x, $y, 36, 6, $pink);
    imagefilledellipse($image, $x, $y, 6, 36, $pink);
}

imagefilledellipse($image, 600, 545, 570, 60, color($image, 190, 24, 93));
imagefilledellipse($image, 600, 535, 545, 55, color($image, 255, 255, 255));
imagefilledrectangle($image, 400, 345, 800, 500, color($image, 225, 29, 72));
imagefilledellipse($image, 600, 500, 400, 54, color($image, 190, 24, 93));
imagefilledrectangle($image, 440, 260, 760, 365, color($image, 251, 113, 133));
imagefilledellipse($image, 600, 365, 320, 48, color($image, 225, 29, 72));

$icing = color($image, 255, 228, 230);
imagefilledellipse($image, 600, 262, 326, 56, $icing);
foreach ([[455, 282, 24, 64], [520, 278, 24, 44], [600, 280, 26, 62], [682, 278, 24, 42], [742, 282, 24, 64]] as [$x, $y, $w, $h]) imagefilledellipse($image, $x, $y, $w, $h, $icing);
imagefilledellipse($image, 600, 346, 404, 58, $icing);
foreach ([[425, 360, 25, 68], [500, 356, 25, 48], [575, 360, 27, 72], [655, 356, 25, 50], [740, 360, 25, 68]] as [$x, $y, $w, $h]) imagefilledellipse($image, $x, $y, $w, $h, $icing);
foreach ([[500, 300], [560, 320], [640, 300], [700, 320], [470, 400], [535, 430], [610, 400], [685, 430], [745, 400]] as [$x, $y]) imagefilledellipse($image, $x, $y, 16, 16, color($image, 253, 230, 138));

foreach ([[520, 180, [14, 165, 233]], [600, 155, [244, 114, 182]], [680, 180, [167, 139, 250]]] as [$x, $y, $rgb]) {
    imagefilledrectangle($image, $x - 10, $y, $x + 10, 258, color($image, ...$rgb));
    imagefilledellipse($image, $x, $y - 18, 24, 38, color($image, 251, 191, 36));
    imagefilledellipse($image, $x, $y - 18, 10, 20, color($image, 255, 255, 255));
}

imagepng($image, __DIR__.'/../public/og-cake.png', 6);
$favicon = imagecreatetruecolor(512, 512);
imagealphablending($favicon, true);
imagecopyresampled($favicon, $image, 0, 0, 250, 100, 512, 512, 700, 530);
imagepng($favicon, __DIR__.'/../public/favicon.png', 6);
imagedestroy($favicon);
imagedestroy($image);
