<?php

    function get_scheme($element) {
        $dom = new DOMDocument;
        $dom->loadHTML($element);
        $tags = [];
        foreach ($dom->getElementsByTagName("*") as $tag) {
            foreach ($tag->attributes as $attribName => $attribNodeVal)
            {
                if (substr($attribName, 0, 3) == "sc-")
                {
                    array_push($tags, substr($attribName,3));
                }
            }
        }

        return json_encode($tags);
    }

    // echo get_scheme("<div><div sc-rootbear title='Oh My'>Hello <i sc-org>World</i></div></div>");

    function get_scheme_challenge($get) {
        $tags = [];
        for ($i=0; $i < $get->length; $i++) {
            if($get->item($i)->hasAttributes())
            {
                $attr = [];
                foreach ($get->item($i)->attributes as $attribName => $attribNodeVal)
                {
                    if (substr($attribName, 0, 3) == "sc-")
                    {
                        $attr[$attribName] = $attribNodeVal->value;
                    }
                }
                
                array_push($tags, $attr);
                if($get->item($i)->childNodes->length > 0)
                {
                    array_push($tags, array_filter(get_scheme_challenge($get->item($i)->childNodes))  );
                }
            }
        }

        return $tags;
    }

    $dom = new DOMDocument;
    $dom->loadHTML("<i sc-root='Hello'>World</i>");
    // $dom->loadHTML("<div class='asd' sc-prop sc-alias='' sc-type='Organization'>
    //     <div sc-name='Alice'>
    //         Hello <i sc-name='Wonderland'>World</i>
    //     </div>
    // </div>");

    $xpath = new DOMXPath($dom);
    $get = $xpath->query("//html/body/*");
    echo json_encode(array_filter(get_scheme_challenge($get)));

?>