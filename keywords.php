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

    $list = array();
    foreach ($html->find('.ah_k') as $index => $element) {
        if ($index == 20) break;
        $list[$index + 1] = $element->plaintext;
    }
    $keyword['list'] = $list;

    // return json
    return json_encode($keyword, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT);
}

// getKeywords call
echo getKeywords();