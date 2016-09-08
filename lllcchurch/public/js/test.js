var counter = 1;
var limit = 3;
function addInput(divName){
	if (counter == limit){
		alert("You have  reached the limit of adding" + counter + "inputs");

	}
	else{
		var newdiv = document.createElement('div');
		newdiv.innerHTML = "Entry " + (counter + 1) + "<br>
<div class="fileinput fileinput-new input-group" data-provides="fileinput">
         <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                            <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="..." id=""></span>
                             <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>



		";
		document.getElementById(divName).appendChild(newdiv);
		counter++;
	}

}