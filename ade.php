<?php

function separateTexts($text) {
    return explode(', ', $text);
  }
  
  // Example usage
  $concatenatedText = 'Hello, world, PHP';
  $result = separateTexts($concatenatedText);
  echo ($result);
                            

                              ?>