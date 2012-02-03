function addComment(id) {

    $.post({
        'url': 'comment.php?id='+id,
        'data': 'body=' + $('#comment_body').val(),
        success: function(msg){
            $('#comments').append(msg);
        }
    });

    
    /*
    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4) {
            if(xhr.status == 200) {
                var e = document.getElementById("comments")
                .innerHTML;
                
                document.getElementById("comments")
                .innerHTML = e + xhr.responseText;
            } else {
                alert('Erreur');
            }
        }
    };
    
    xhr.open("POST", "comment.php?id="+id);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("body="+document.getElementById("comment_body").value);
    */
}
