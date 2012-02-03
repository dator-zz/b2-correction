function getXMLHttpRequest() {
   var xhr = null;
   if (window.XMLHttpRequest || window.ActiveXObject) {
      if (window.ActiveXObject) {
         xhr = new ActiveXObject("Msxml2.XMLHTTP");
      } else {
         xhr = new XMLHttpRequest();
      }
   } else {
      alert("Impossible to use AJAX!");
   }
   return xhr;
}

function addComment(id) {
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
}
