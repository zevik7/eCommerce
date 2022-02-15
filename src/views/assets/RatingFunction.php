<?php

function displayStar($value)
{
    $starValue = $value;
    $starCount = 0;
    while ($starCount < 5) {
        if ($starValue > 0) {
            if ($starValue >= 1) {
                echo '<i class="fas fa-star"></i>';
            } else {
                echo '<i class="fas fa-star-half-alt"></i>';
            }
            $starValue--;
        } else {
            echo '<i class="far fa-star"></i>';
        }
        $starCount++;
    }
}
