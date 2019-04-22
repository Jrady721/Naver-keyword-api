<?php
// include simple_html_dom
include 'include/simple_html_dom.php';

// getKeywords Top 20
function getKeywords()
{
    header('Content-Type: application/json');

    // parsing
    $html = file_get_html('http://www.naver.com');

    $keyword = array("status" => '200');

    $keywords = array();
    foreach ($html->find('.ah_k') as $index => $element) {
        if ($index == 20) break;
        $keywords[$index + 1] = $element->plaintext;
    }

    $keyword['keywords'] = $keywords;

    // return json
    return json_encode($keyword, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT);
}

// getKeywords call
echo getKeywords();