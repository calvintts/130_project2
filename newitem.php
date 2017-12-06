<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>New Item</title>
</head>
<body>
<script>
  function newphone(){
    let x= document.getElementById("form_input");
    let content = "<div id = \"box\"><form method=\"post\" action=\"newitem.php\"><div class=\"input-group\"><label>Color</label><input type=\"clr\" name=\"clr\" ></div><div class=\"input-group\"><label>Price</label><input type=\"price\" name=\"price\" ></div><div class=\"input-group\"><label>Camera</label><input type=\"cam\" name=\"cam\" ></div><div class=\"input-group\"><label>Brand</label> <input type=\"brand\" name=\"pbrand\"></div><div class=\"input-group\"><label>Comment</label> <input type=\"cmt\" name=\"pcmt\"></div><div class=\"input-group\"><button type=\"submit\" class=\"btn\" name=\"savephone\">Save Phone</button></div></form></div>";
    x.innerHTML=content;}
  function newcar(){
    let x=document.getElementById("form_input");
    let content = "<div id = \"box\"><form method=\"post\" action=\"newitem.php\"><div class=\"input-group\"><label>Color</label><input type=\"clr\" name=\"clr\" ></div><div class=\"input-group\"><label>Price</label><input type=\"price\" name=\"price\" ></div><div class=\"input-group\"><label>Horsepower</label><input type=\"horsepower\" name=\"hp\" ></div><div class=\"input-group\"><label>Brand</label> <input type=\"brand\" name=\"cbrand\"></div><div class=\"input-group\"><label>Year</label> <input type=\"year\" name=\"year\"></div><div class=\"input-group\"><label>Comment</label> <input type=\"cmt\" name=\"ccmt\"></div><div class=\"input-group\"><button type=\"submit\" class=\"btn\" name=\"savecar\">Save Car</button></div></form></div>";
    x.innerHTML=content;
  }
</script>
<!-- navigation button -->
<section>
<button onclick="newcar()">Add Car</button>
<button onclick="newphone()">Add Phone</button>
<div id="form_input"></div>
</section>

</body>
</html>
