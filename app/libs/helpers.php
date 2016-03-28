<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 15/11/4
 * Time: 下午7:55
 */



if (! function_exists('_T')) {
    /**
     * Translate the given message.
     *
     * @param  string  $id
     * @param  array   $parameters
     * @param  string  $domain
     * @param  string  $locale
     * @return string
     */
    function _T($id,$pack="lang")
    {
            return app('translator')->trans($pack.".".$id);
    }

}


if (! function_exists('_TIME')) {
    /**
     * Translate the given message.
     *
     * @param  string  $id
     * @param  array   $parameters
     * @param  string  $domain
     * @param  string  $locale
     * @return string
     */
    function _TIME($time,$format)
    {
        return date($format,strtotime($time));
    }

}



/*

if (! function_exists('_IS_PATH')) {

    function _IS_PATH()
    {

        $url_path    =  explode("/",Request::path());
        $nodeNum  = func_num_args();
        $nodeList = func_get_args();
        for($i = 0; $i <$nodeNum; $i++)
        {
            if ($url_path[$i] != $nodeList[$i])
            {
                return false;
            }
        }
        return true;
    }

}
*/

if (! function_exists('_IS_IN_URL')) {

    function _IS_IN_URL()
    {

        $curUrl = "/".Request::path();

        $nodeNum  = func_num_args();
        $nodeList = func_get_args();

        for($i = 0; $i <$nodeNum; $i++)
        {
            if (strncasecmp($curUrl, $nodeList[$i],strlen($nodeList[$i])-1)==0 )
            {
                return true;
            }
        }
        return false;
    }

}


if (! function_exists('_IS_IN_PATH')) {

    function _IS_IN_PATH()
    {
        $url_path    =  explode("/",Request::path());
        $nodeNum  = func_num_args();
        $nodeList = func_get_args();

        for($i = 0; $i <$nodeNum; $i++)
        {
            if (in_array($nodeList[$i],$url_path))
            {
                return true;
            }
        }
        return false;
    }

}



if (! function_exists('_IS_TAIL_PATH')) {

    function _IS_TAIL_PATH($tail,$active="active",$noactive="")
    {
        $url_path    =  explode("/",Request::path());

        return $url_path[count($url_path)-1] == $tail?$active:$noactive;
    }

}



if (! function_exists('_IS_AT_PATH')) {

    function _IS_AT_PATH($pos,$node,$active="active",$noactive="")
    {
        $url_path    =  explode("/",Request::path());
        if ($pos < count($url_path))
        {
            return $url_path[$pos] == $node?$active:$noactive;
        }
        return $active;
    }

}



if (! function_exists('_IS_URL_PATH')) {

    function _IS_URL_PATH($url)
    {
        return 0== strncasecmp("/".Request::path(),$url,strlen($url)-1);

    }

}
if (! function_exists('_ACTIVE_URL')) {

    function _ACTIVE_URL($url)
    {
        $ret = pathinfo(url()->current())['dirname'] ;

        if($url == $ret){
            return 'active';
        }else{
            return "";
        }

    }

}


if(! function_exists('_IS_ACTIVE')){

    function _IS_ACTIVE($url){

        $ret = url()->current();

        if($url == $ret){
            return 'active';
        }else{
            return "";
        }

    }
}
if(! function_exists('_DATE_FORMAT')){

    function _DATE_FORMAT($unixtime){
        $today =  strtotime(date('Y-m-d',time()));

        $diff = $unixtime-$today;

        if($diff>0 and $diff<86400){

            return "今天 ".date('H:i',$unixtime);

        }elseif ($diff<0 and $diff> -86400) {

            return "昨天 ".date('H:i',$unixtime);

        }else{

            return  date('Y-m-d H:i',$unixtime);
        }
    }
}

if (! function_exists('_IS_ACTIVE_PATH')) {
    /**
     * Translate the given message.
     *
     * @param  string  $url
     * @param  array   $active
     * @return string
     */
    function _IS_ACTIVE_PATH($url,$exactly=false,$active="active",$noactive="")
    {
        if ($exactly)
        {
            return  $url =="/".Request::path()?$active:$noactive;
        }

        $ret = stripos("/".Request::path(),$url);

        if ($ret === false)
        {
            return $noactive;
        }
        return $active;
    }

}