<?php
require "auth/config.php";
$vote=0;
$tid=$_POST['tid'];
session_start();

$sqlcheck = "SELECT * FROM voting WHERE tid=".$tid." AND uid=".$_SESSION['id'].";";
$result = $conn->query($sqlcheck);
if($result->num_rows == 0)
{
    $sqlinsert = "INSERT INTO `voting` (`uid`,`tid`,`upvoted`) VALUES (".$_SESSION['id'].",".$tid.",1)";
    $sqlGetVote = "SELECT vote FROM thread WHERE tid=".$tid.";";
    
    if($conn->query($sqlinsert))
    {
        $resultGetVote = $conn->query($sqlGetVote);
        $row = $resultGetVote->fetch_assoc();
        $vote = $row['vote'];
        $vote = $vote + 1;
        $sqlChangeVote = "UPDATE `thread` SET `vote`=".$vote." WHERE tid=".$tid.";";
        if($conn->query($sqlChangeVote))
        {
            echo $vote;
        }
        else
        {
         $conn->error;
        }
    }
    else
    {
    echo $conn->error;
    }
}
else{
    $row = $result->fetch_assoc();
    if($row['upvoted']==0 && $row['downvoted']==0)
    {
        $sqlinsert = "UPDATE `voting` SET `upvoted`=1 WHERE tid=".$tid." AND uid=".$_SESSION['id']."";
        $sqlGetVote = "SELECT vote FROM thread WHERE tid=".$tid.";";
        
        if($conn->query($sqlinsert))
        {
            $resultGetVote = $conn->query($sqlGetVote);
            $row1 = $resultGetVote->fetch_assoc();
            $vote = $row1['vote'];
            $vote = $vote + 1;
            $sqlChangeVote = "UPDATE `thread` SET `vote`=".$vote." WHERE tid=".$tid.";";
            if($conn->query($sqlChangeVote))
            {
                echo $vote;
            }
            else
            {
            $conn->error;
            }
        }
        else
        {
        echo $conn->error;
        }
    }
    else if($row['upvoted']==1 && $row['downvoted']==0)
    {
        $sqlinsert = "UPDATE `voting` SET `upvoted`=0 WHERE tid=".$tid." AND uid=".$_SESSION['id']."";
        $sqlGetVote = "SELECT vote FROM thread WHERE tid=".$tid.";";
        
        if($conn->query($sqlinsert))
        {
            $resultGetVote = $conn->query($sqlGetVote);
            $row1 = $resultGetVote->fetch_assoc();
            $vote = $row1['vote'];
            $vote = $vote - 1;
            $sqlChangeVote = "UPDATE `thread` SET `vote`=".$vote." WHERE tid=".$tid.";";
            if($conn->query($sqlChangeVote))
            {
                echo $vote;
            }
            else
            {
            $conn->error;
            }
        }
        else
        {
        echo $conn->error;
        }
    }
    else if($row['upvoted']==0 && $row['downvoted']==1)
    {
        $sqlinsert = "UPDATE `voting` SET `upvoted`=1, `downvoted`=0 WHERE tid=".$tid." AND uid=".$_SESSION['id']."";
        $sqlGetVote = "SELECT vote FROM thread WHERE tid=".$tid.";";
        
        if($conn->query($sqlinsert))
        {
            $resultGetVote = $conn->query($sqlGetVote);
            $row1 = $resultGetVote->fetch_assoc();
            $vote = $row1['vote'];
            $vote = $vote + 2;
            $sqlChangeVote = "UPDATE `thread` SET `vote`=".$vote." WHERE tid=".$tid.";";
            if($conn->query($sqlChangeVote))
            {
                echo $vote;
            }
            else
            {
            $conn->error;
            }
        }
        else
        {
        echo $conn->error;
        }
    }
}

?>