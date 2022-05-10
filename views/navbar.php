<link rel="stylesheet"  href="navbar.css">
<div class="navbar">
    <img src="LOGO.png" class="logo">
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">carpool</a></li>
        <li><a href="#">transport</a></li>
        <li><a href="#">Car rental</a></li>
        <li><a id="r" href="#">reclamation</a></li>
        <li><a href="#">sign in</a></li>
        <script>document.getElementById("r")
        .addEventListener("click", function() {
  document.getElementById("wrap").hidden = false;
  document.getElementById("bulle").hidden = true;
  document.getElementById("emojis").style.visibility = "hidden";

}, false);</script>
    
    </ul>
</div>
