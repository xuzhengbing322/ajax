<?php

      // 设置请求头，返回JSON数据
      header('Content-type: application/json');

      // 设置请求方式，获取数据库中status=1的数据
      $status = $_POST['status']  // $status = $_GET['status']

      // 连接数据库。host是localhost，用户名是root，密码是空，db是study
      $con = mysqli_connect('localhost', 'root', '', 'study');

      // 设置mysql的字符集
      mysqli_set_charset($con, 'utf8');

      // 获取字符集，选择表js_course中的所有内容，选择status等于post过来的status。
      $res = $con -> query('SELECT * FROM `js_course` WHERE `status` = '.$status);

      // 设置空数组
      $arr = [];

      // 遍历
      while ($rows = $res -> fetch_assoc()) {
            array_push($arr, $rows);
      } 
      // 将arr变成JSON字符串
      echo json_encode($arr)

      // 关闭数据库
      mysqli_close($con)