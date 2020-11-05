<?php
require("dbconnect.php");
function addJob($jobProfile){
    #check the  $jobProfile data
    #insert into DB with $jobProfile
    #return T/F
    

}

function cancelJob($jobID){
    #check the  $jobID data
    #sol1. delete the job with $jobID from DB
    #sol2. update the job's status to canceled
    #return T/F

}

function updateJob($jobID,$jobProfile){
    #check the  $jobProfile data
    #insert into DB with $jobProfile
    #return T/F

}

function getJobList($bossMode){
    global $conn; #取得DBconnect.php中定義的連線參數
    if ($bossMode) { #判斷權限
        $sql = "select *, TIME_TO_SEC(TIMEDIFF(NOW(), addTime)) diff from todo order by status, urgent desc;";
    } else {
        $sql = "select *, TIME_TO_SEC(TIMEDIFF(NOW(), addTime)) diff from todo where status = 0;";
    }
    $result= mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
    return $result;
}

function setJobFinished($jobID){
    global $conn; #取得DBconnect.php中定義的連線參數
    $sql = "update todo set status = 1, finishTime=NOW() where id=$jobID and status = 0;"; 
    #工作結束時間=NOW() 現在的系統時間 且只有未完成的工作(status=0)能設成已完成
    return mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL

}

function rejectJob(){

}

function setClosed(){

}

