function getWorkSheet() {
	var crmid = document.getElementsByName("record")[0].value;
	var r = new XMLHttpRequest();
	r.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			// console.log(decodeURIComponent(JSON.parse(r.responseText)));
			document.getElementById("worksheet").innerHTML = decodeURIComponent(r.responseText);
		}
	}
	r.open("GET", "index.php?module=MechanicsPortal&action=MechanicsPortalAjax&file=ajax&function=getWorkSheet&soid=" + crmid, true);
	r.send();
}

window.addEventListener("load", getWorkSheet);