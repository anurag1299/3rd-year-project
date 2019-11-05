function deletePost(tid){
    //console.log(tid);
    $.ajax({
        url: 'delete.php',
        type: 'post',
        data: {tid:tid},
        success:function(responce){
            window.location.href="./profile.php";
        }
    });
}

function approvePost(tid){
    $.ajax({
        url: 'approve.php',
        type: 'post',
        data: {tid:tid},
        success:function(){
            //selector='"#'+tid+'"';
            $('#' + tid).addClass("approved-post");
            $('#' + tid).removeClass("approve-post");
        }
    });
}

function upvote(tid){
    $.ajax({
        url: 'upvote.php',
        type: 'post',
        data: {tid:tid},
        success:function(responce){
            
            if($('#d'+tid).attr("class")=="downed"){
                $('#d'+tid).addClass('down');
                $('#d'+tid).removeClass('downed');
                $('#u'+tid).addClass('upped');
                $('#u'+tid).removeClass('up');
                //console.log(second);
            }
            
            else if($('#u'+tid).attr("class")=="up"){
            $('#u'+tid).addClass('upped');
            $('#u'+tid).removeClass('up');
            //console.log(first);
            }
            else{
            $('#u'+tid).addClass('up');
            $('#u'+tid).removeClass('upped');
            //console.log(third);    
            }
            //console.log(responce);
            $('#v'+tid).html(responce);
        }
    });
    
}

function downvote(tid){
    $.ajax({
        url: 'downvote.php',
        type: 'post',
        data: {tid:tid},
        success:function(responce){
            if($('#u'+tid).attr('class')=='upped'){
                $('#u'+tid).addClass('up');
                $('#u'+tid).removeClass('upped');
                $('#d'+tid).addClass('downed');
                $('#d'+tid).removeClass('down'); 
            }
            else if($('#d'+tid).attr('class')=='down'){
                $('#d'+tid).addClass('downed');
                $('#d'+tid).removeClass('down');
            }
            else{
                $('#d'+tid).addClass('down');
                $('#d'+tid).removeClass('downed');
            }
            //console.log(responce);
            $('#v'+tid).html(responce);
        }
    });
}



