<?php
// app/helpers.php

if (!function_exists('extractTextFromADF')) {
    function extractTextFromADF($adf)
    {
        $text = '';
        
        foreach ($adf->content as $content) {
            if ($content->type === 'paragraph') {
                foreach ($content->content as $paragraphContent) {
                    if ($paragraphContent->type === 'text') {
                        $text .= $paragraphContent->text;
                    }
                }
            }
        }
        
        return $text;
    }
}
