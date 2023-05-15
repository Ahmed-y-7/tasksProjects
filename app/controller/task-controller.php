<?php

namespace App\Controller;


use App\Core\Request;
use App\Database\queryBuilder;




class taskcontroller 

{

    public function index()
    {

        $comp = Request::get('comp');
        if ($comp != null) {
            $tasks = queryBuilder::get('tasks', ['comp', '=', $comp]);
        } else {
            $tasks = queryBuilder::get('tasks');
        }

        view('index', ['tasks' => $tasks]);   // ربطناه مع دالة الموجوده في ملف helps

    }

    public function create()
    {

        $des = Request::get('description');
        queryBuilder::insert('tasks', ['des' => $des, 'comp' => 0]);

        back();   //ربطناه مع دالة في صفحة helps
    }

    public function update()
    {
        $id = Request::get('id');
        $comp = Request::get('comp');

        if ($id && $comp != null) {
            queryBuilder::update('tasks', $id, ['comp' => $comp]);

        }
        back();
    }


    public function delete()
    {

        if ($id = Request::get('id')) {
            queryBuilder::delete('tasks', $id);
        }
        back();
    }
}








?>