var dropbox = $("#dropbox"),
	form = $("#form-upload"),
	progress = $("#progress"),
	results = $("#results"),
	actions = $("#actions"),
	msgbox = $("#msgbox"),
	fileinput = $("#file-input");

if (window.File && window.FileList && window.FileReader) {
	init();
}

function show_page() {
	form.hide();
	progress.hide();
	results.hide();
	actions.hide();
	msgbox.hide();

	for (var i = 0; i < arguments.length; i++)
		arguments[i].show();
}

function show_message(msg, success) {
	msgbox
		.removeClass("alert-error")
		.removeClass("alert-success")
		.addClass(success? "alert-success" : "alert-error")
		.find("p").text(msg).end()
		.show();
}

function init() {
	dropbox.bind("dragover", fileDragHover);
	dropbox.bind("dragleave", fileDragHover);
	dropbox.bind("drop", fileSelectHandler);
	fileinput.bind("change", fileSelectHandler);
}

function fileDragHover(e) {
	e.stopPropagation();
	e.preventDefault();
	dropbox.removeClass("hover").addClass(e.type == "dragover" ? "hover" : "");
}

function fileSelectHandler(e) {
	fileDragHover(e);
	var files = e.originalEvent.target.files || e.originalEvent.dataTransfer.files;

	var file = files[0];
	var xhr = new XMLHttpRequest();

	if (file.type != "image/jpg" && file.type != "image/jpeg" && file.type != "image/png" ) {
		show_message("Please upload only JPG and PNG images.", false);
		return;
	} else if (file.size > 1000000) {
		show_message("Maximum file size is 1 MB!", false);
		return;
	} else if (!xhr.upload) {
		show_message("Your browser does not support XMLHttpRequest.upload. Please upgrade your browser.", false);
		return;
	}

	xhr.onreadystatechange = function(e) {
		if (xhr.readyState == 4 && xhr.status == 200) {
			parse_response(xhr.response);
		}
	}

	//xhr.open("POST", "./binarizationImage/binarizationImage.php", true);


	//2015-07-24 PhucHD Add Start
	//Start the upload
	xhr.open("POST", $("form").attr("action") + "/filetype/" + file.type.replace("image/", ""), true);
	xhr.setRequestHeader("X-FILENAME", file.name);
	//2015-07-24 PhucHD Add End

	xhr.send(file);

	show_page(progress);

	//2015-07-24 PhucHD Add Start
	// show_page(form);
	//show_message(file.name);
	// return;
	//2015-07-24 PhucHD Add eND

}

function parse_response(res) {
	var data = jQuery.parseJSON(res);

	if (data.success == false) {
		show_page(form);
		show_message(data.msg);
		return;
	}

	results
		.find(".source-img").html("").end();

	$.each(data.images, function(i, img) {
		var el = '<img src="binarizationImage/' + img.src + '?r=' + Math.random() + '" alt="" />';
		results.find((i == 0 ? ".source-img" : ".binarizationImage")).append(el);
	})

	results.find(".source-img img").bind('click', function(e) {
		var im = data.images[0];
		var el = '<img src="binarizationImage/' + im.src + '" width="' + im.width + '" height="' + im.height + '" alt="" />';
		$(".lightbox", results).find(".lightbox-content").html(el).end().lightbox("show");
	});

	show_page(results, actions);
}

// Open file dialog 
$("#select-btn").click(function(e) {
	e.preventDefault();
	fileinput.click();
});

// Restart Binarization Image
$("#restart-btn").bind("click", function(e) {
	e.preventDefault();
	show_page(form);
});


