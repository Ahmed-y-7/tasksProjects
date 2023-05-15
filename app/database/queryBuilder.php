<?php
namespace App\Database;
class queryBuilder 
{
     private static $pdo;
     private static $log;

     public static function make(\PDO $pdo, $log = null){
        self::$pdo = $pdo;
        self::$log = $log;
     }


     public static function get($table, $where = null)
     {
                $query = "SELECT * FROM {$table}";

                if(is_array($where)) {
                    $query .= " WHERE " . implode(' ', $where);
                }

                $statement = self::execute($query);     
                return $statement->fetchAll(\PDO::FETCH_OBJ);    
     }

     // طريقة اضافة بيانات جديدة في قاعدة البيانات 

     public static function insert($table, $data)
     {
      //$data = ['POST', 0 ];
      //$query = "INSERT INTO tasks (des, comp) VALUES (? , ?)";    // علامة الاستفهام تعبر عن تعريف للعنصر الجديد الاول ثم الثاني
      //$statement = self::$pdo->prepare($query);
      //$statement->execute($data);

      $fields = array_keys($data);
      $fieldsStr = implode(',', $fields);
      $valuesStr = str_repeat('?,', count($fields) - 1) . '?';
      $query = "INSERT INTO {$table} ({$fieldsStr}) VALUES ({$valuesStr})";
      self::execute($query, array_values($data));
     }
            // هذا الكود في حالة التعديل على شي في قاعدة البيانات 
     public static function update($table , $id , $data)
     {
        $fields = implode(' =? ,', array_keys($data)) . '=?';
                            // =? for des                // for comp
        $values = array_values($data);
      //$query = "UPDATE tasks SET des='updated Task', comp = 4 WHERE id =1";
      $query = "UPDATE {$table} SET {$fields} WHERE id={$id}";
      //$statement = self::$pdo->prepare($query);
      self::execute($query, $values);
     }

         // كود طريقة حذف اي عنصر في قاعدة البيانات 
     public static function delete($table , $id , $column='id' , $operator = "=" )
     {
      $query = "DELETE FROM {$table} WHERE {$column} {$operator} {$id} ";
      //$statement = self::$pdo->prepare($query);
      self::execute($query);
     }


     private static function execute($query, $values = []){
            //هنا يتسجل جميع البيانات الي تمت في الموقع  gueries هذي الخاصية لعمل اي بيانات تتم في الموقع وملف 
        if (self::$log) {
            self::$log->info($query);
        }

        $statement = self::$pdo->prepare($query);
        $statement->execute($values);
        return $statement;
     }
}













?>