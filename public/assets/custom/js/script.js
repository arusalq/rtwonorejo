var expanded = false;
		function showCheckboxes() {
			var checkboxes = document.getElementById("box");
			if(!expanded) {
				checkboxes.style.display = "block";
				expanded = true;
			}else{
				checkboxes.style.display = "none";
				expanded = false;
			}
		}