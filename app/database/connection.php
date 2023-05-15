<?php

namespace App\Database;
class DBconn 
{
    private static $pdo;
    public static function make($config)
    {
        try {
            self::$pdo = self::$pdo ?
            :new \PDO("mysql:host={$config['host']};dbname={$config['name']}", $config['user'], $config['password']);
            return self::$pdo;          
          } catch (\PDOException $e) {         
            die($e->getMessage());
            
          }
    }
}
























//هنا حددنا الاتصال مع اسم قاعدة البيانات واسم المستخدم وكلمة المرور حق ماي اسكيول 
//$pdo = new PDO('mysql:host=localhost;dbname=php_test','root','');


// عشان نتاكد انه متصل بملف قاعدة البيانات نعمل هذي الخطوة

//try {
  //$pdo = new PDO('mysql:host=localhost;dbname=php_test','root','');     //هنا حددنا الاتصال مع اسم قاعدة البيانات واسم المستخدم وكلمة المرور حق ماي اسكيول 

//} catch (PDOException $e) {
 //die('cant connect to database.');

  ///  die($e->getMessage());
  
//}

//$query = $pdo -> prepare('SELECT * FROM tasks');       // هنا عملنا عرض للجدول 

//$query->execute();                              // هدي دالة معناه نفذ الطلب

//$tasks = $query->fetchAll(PDO::FETCH_OBJ);                   // هذا الدالة معناته اعرض جميع النتائج

//foreach ($tasks as $task) {
 // echo "{$task->des} <br />";
//}

//echo '<pre>';
//var_dump($tasks);

//echo '<pre>';



















?>
