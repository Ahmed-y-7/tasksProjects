<?php 

use App\App;

// دالة هوم للحصول على عنوان الصفحة الرئيسية 
function home()

{

    return trim(APP::get('config')['app']['home_url'], '/');
}

// هذي الدالة على يرجعه الى رابط معين من خلال دالة لوكيشن
function redirect($to)
{
    header("Location: {$to}");
}


// هذا الدالة عشان يرجعه للصفحة الرئيسية 
function redirect_home()
{
    redirect(home());
}


// هذا معناه يرجعه للصفحة السابقة 
function back()
{
    redirect($_SERVER['HTTP_REFERER'] ?? home());
}


// هذي الدالة معناه يحمل دالة العرض يعرض له البيانات 
function view($name, $data)
{
    extract($data);  //معناه يحول المصفوفة الى متغيرات 
    require "resources/{$name}-view.php";
}




?>