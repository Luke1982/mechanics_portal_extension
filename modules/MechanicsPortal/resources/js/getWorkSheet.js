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

function getWorkSheetPDF() {
	var pdfButton = document.getElementById("create_worksheet_pdf");
	var crmid = document.getElementsByName("record")[0].value;

	pdfButton.addEventListener("click", function(e){
		e.preventDefault();
		// var filename  = document.getElementById("report_filename").innerHTML;		

		var r = new XMLHttpRequest();
		r.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = JSON.parse(r.response);
				presentFile(response.download_loc);
				setTimeout(function(){
					deleteFile(response.delete_loc);
				},2000);				
			}
		}
		r.open("GET", "index.php?module=MechanicsPortal&action=MechanicsPortalAjax&file=getWorkSheetPDF&soid=" + crmid, true);
		r.send();		
	});
}

function deleteFile(file) {
	var r = new XMLHttpRequest();
	r.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log(r.response);
		}
	}
	r.open("GET", "index.php?module=ServiceJob&action=ServiceJobAjax&file=getReportPDF&pdfaction=delete&filetodelete=" + file, true);
	r.send();	
}

function presentFile(url) {
	var a = document.createElement("a");
	a.href = url;
	a.download = url.substr(url.lastIndexOf('/') + 1);
	document.body.appendChild(a);
	a.click();
	document.body.removeChild(a);
}

function initWorkSheet() {
	getWorkSheet();
	getWorkSheetPDF();
}

window.addEventListener("load", initWorkSheet);