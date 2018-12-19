var div = document.createElement("div");
div.innerHTML = `
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Google Photos to Contacts</h2>
    </div>
    <div class="modal-body">
      <p>Would you like to Upload?</p>
      <button id="myBtn">Proceed</button>
    </div>
    <br>
  </div>

</div>
`;
document.body.appendChild(div);

var css = document.createElement('style');
css.type = 'text/css';
var styles = `

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1000; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #009688;
  color: white;
}

.modal-body {padding: 2px 16px;}

`;
if (css.styleSheet) css.styleSheet.cssText = styles;
else css.appendChild(document.createTextNode(styles));

document.getElementsByTagName("head")[0].appendChild(css);

var modal = document.getElementById('myModal');
var span = document.getElementsByClassName("close")[0];

modal.style.display = "block";

span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


var scripts = document.getElementsByTagName('script');
var text = "";
if(scripts.length ==0){
  location.reload();
}
for (i = 0; i < scripts.length; i++) {
    if (scripts[i].innerText.startsWith("AF_initDataCallback")){
        text = scripts[i].innerText.substr(85).slice(0, -4);
    }
}

var peopleArr = JSON.parse(text)[0][0][0][0];

var people = [];
for (i = 0; i < peopleArr.length; i++) {
  if(peopleArr[i][1] != ""){
    people.push({
      name : peopleArr[i][1],
      url : peopleArr[i][2],
    });
  }
}

var form = document.createElement("form");
var element1 = document.createElement("input");
form.method = "POST";
form.action = "https://contactphotos.app/run.php";

element1.value=JSON.stringify(people);
element1.name="data";
form.appendChild(element1);
document.body.appendChild(form);

var btn = document.getElementById("myBtn");
btn.onclick = function() {
  form.submit();
}
