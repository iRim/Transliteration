<?php

// Default transliteration for UA: https://pasport.org.ua/vazhlivo/transliteratsiya

namespace irim\transliteration;

//use yii\helpers\ArrayHelper;

class Transliteration
{

    static private $ua = [
            'а','б','в','г','ґ','д','е','є','ж','з','и','і','ї','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ю','я',
            'ь','\'' // not used
        ],
        $latin = [
            'a','b','v','h','g','d','e','ie','zh','z','y','i','i','i','k','l','m','n','o','p','r','s','t','u','f','kh','ts','ch','sh','shch','іu','ia',
            '',''
        ],
        $beginning = [
            'зг'=>'zgh','є'=>'ye','ї'=>'yi','й'=>'y','ю'=>'yu','я'=>'ya',
        ];

    static public function toLatin($text,$divider = '-'){
        $arr = array_combine(self::$ua,self::$latin);
        $arr = array_merge(self::$beginning,$arr);
        return self::getResult($text,$arr);
    }

    static private function getResult($text,$combine){
//        $arr_change = array_merge(self::$beginning_ua,$combine);
        return strtr($text,$combine);
    }

    
}


/*

function str2url($str,$lower=TRUE,$rus = TRUE,$symbol = '-') {
    if($rus){$str = rus2translit($str);}
    $str = preg_replace('/[^a-zа-яё0-9-_]+/u',$symbol,($lower?mb_strtolower($str,'UTF-8'):iconv('UTF-8','UTF-8',$str)));
    $str = trim($str,$symbol);
    return $str;
}

if (!empty($_SERVER["HTTP_REFERER"]) and preg_match('/https:\/\/((www|dev).servicebox.ru|servicebox.local)\//iu',$_SERVER["HTTP_REFERER"]) and !empty($_GET["word"]) and strlen($_GET["word"])>0) {
    $str = str_replace("+", " ", $_GET["word"]);
    $str = str_replace("\"", "", $str);
    $str = str_replace("\\", "", $str);
    print rus2translit($str);
}

*/
