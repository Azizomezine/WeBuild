<!-- (A) LOAD LIKE/DISLIKE BUTTON -->
<link rel="stylesheet" href="lidi.css"/>
<script src="lidi.js"></script>

<!-- (B) RENDER LIKE/DISLIKE BUTTON HERE -->
<div id="demowrap">
  <img src="raspberry.jpg"/>
  <div id="demo"></div>
</div>
<!-- (C) PHP GET REACTIONS -->
<?php
require "2-reactions.php";
$id = 900; // POST/PRODUCT/WHATEVER ID
$uid = 1; // USER ID, USE $_SESSION IN YOUR PROJECT
$reacts = $_REACT->get($id, $uid);
?>
 
<!-- (D) GENERATE LIKE/DISLIKE BUTTON -->
<script>
lidi.create({
  // (D1) LIKE/DISLIKE BUTTON SETTINGS
  hWrap : document.getElementById("demo"),
  status : <?=$reacts["user"]?>,
  count : [<?=$reacts["react"][0]?>, <?=$reacts["react"][1]?>],
 
  // (D2) UPDATE SERVER ON REACTION CHANGE
  onChange : (status, recount) => {
    // FORM DATA
    var data = new FormData();
    data.append("id", <?=$id?>);
    data.append("react", status);
 
    // FETCH
    fetch("4-ajax.php", { method: "POST", body: data })
    .then(res => res.json())
    .then((res) => {
      if (res.error) { alert(res.error); }
      else { recount(res); }
    })
    .catch((err) => { console.error(err); });
  }
});
</script>