
function addInput(divName) {
	var newdiv = document.createElement('div');
	newdiv.innerHTML = "User Generated Section" + " <br><label for='sectionName'>Section Title</label><br><input type='text' name='sectionName' id='sectionName'><br><label for='optional'></label><br> <textarea name='optional' placeholder='Enter Section' rows='10' cols='30'></textarea>";
	document.getElementById(divName).appendChild(newdiv);
	
	var myBtn = document.getElementById("newSection"),
	mySpan = document.createElement("span");
	mySpan.innerHTML = myBtn.innerHTML ;
	myBtn.parentNode.replaceChild(mySpan, myBtn);
 
}