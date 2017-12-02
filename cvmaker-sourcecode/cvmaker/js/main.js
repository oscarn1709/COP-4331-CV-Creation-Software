// Global by intention.
var builder;

jQuery(document).ready(function($) {
	var form = $("#form");
	builder = new Builder(form);

	$.getJSON("json/schema.json", function(data) {
		builder.init(data);
		reset();
	});

	var preview = $("#preview");
	var iframe = $("#iframe");



	(function() {
		var timer = null;
		form.on("change", function() {
			clearTimeout(timer);
			preview.addClass("loading");
			timer = setTimeout(function() {
				var data = builder.getFormValues();
				form.data("resume", data);
				postResume(data);
			}, 200);
		});
	})();

	function postResume(data) {
		var theme = "flat";
		var hash = window.location.hash;
		if (hash != "") {
			theme = hash.replace("#", "");
		}
		$.ajax({
			type: "POST",
			contentType: "application/json",
			data: JSON.stringify({resume: data}, null, "  "),
			url: "http://themes.jsonresume.org/" + theme,
			success: function(html) {
				iframe.contents().find("body").html(html);
				preview.removeClass("loading");
			}
		});
		(function toggleActive() {
			$("#theme-current").html(theme);
			var active = $("#themes-list .item[href='#" + theme + "']").addClass("active");
			active.siblings().removeClass("active");
		})();
	}

	enableTSEplugin();
	enableCSStransitions();

	$("#export").on("click", function() {
		var data = form.data("resume");
		download(JSON.stringify(data, null, "  "), "resume.json", "text/plain");
	});
	$("#export").tooltip({
		container: "body"
	});

	$("#import").on("click", function() {
		$("input[id='my_file']").click();
	});
	$("#import").tooltip({
		container: "body"
	});


	$("#reset").on("click", function() {
		if (confirm("Are you sure?")) {
			reset();
		}
	});

	$("#clear").on("click", function() {
		if (confirm("Are you sure?")) {
			clear();
		}
	});

	$("#pdf").on("click", function() {
		var pdf = new jsPDF('p', 'pt', 'letter');
		// source can be HTML-formatted string, or a reference
		// to an actual DOM element from which the text will be scraped.
		source = $('#iframe')[0];

		// we support special element handlers. Register them with jQuery-style
		// ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
		// There is no support for any other type of selectors
		// (class, of compound) at this time.
		specialElementHandlers = {
				// element with id of "bypass" - jQuery style selector
				'#bypassme': function (element, renderer) {
						// true = "handled elsewhere, bypass text extraction"
						return true
				}
		};
		margins = {
				top: 80,
				bottom: 60,
				left: 40,
				width: 522
		};
		// all coords and widths are in jsPDF instance's declared units
		// 'inches' in this case
		pdf.fromHTML(
				source, // HTML string or DOM elem ref.
				margins.left, // x coord
				margins.top, { // y coord
						'width': margins.width, // max width of content on PDF
						'elementHandlers': specialElementHandlers
				},

				function (dispose) {
						// dispose: object with X, Y of the last line add to the PDF
						//          this allow the insertion of new lines after html
						pdf.save('Test.pdf');
				}, margins
		);
	});

	var tabs = $("#sidebar .tabs a");
	tabs.on("click", function() {
		var self = $(this);
		self.addClass("active").siblings().removeClass("active");
	});

	(function getThemes() {
		var list = $("#themes-list");
		var item = list.find(".item").remove();
		$.getJSON("http://themes.jsonresume.org/themes.json", function(json) {
			var themes = json.themes;
			if (!themes) {
				return;
			}
			for (var t in themes) {
				var theme = item
					.clone()
					.attr("href", "#" + t)
					.find(".name")
					.html(t)
					.end()
					.find(".version")
					.html(themes[t].versions.shift())
					.end()
					.appendTo(list);
			}
		});
		list.on("click", ".item", function() {
			form.trigger("change");
		});
	})();

	var jsonEditor = $("#json-editor");

	(function() {
		var timer = null;
		jsonEditor.on("keyup", function() {
			clearTimeout(timer);
			timer = setTimeout(function() {
				try {
					var text = jsonEditor.val();
					builder.setFormValues(JSON.parse(text))
				} catch(e) {
					// ..
				}
			}, 200);
		});
	})();

	form.on("change", function() {
		var json = builder.getFormValuesAsJSON();
		if (jsonEditor.val() !== json) {
			jsonEditor.val(json);
		}
	});

	$("#sidebar .view").on("click", "a", function(e) {
		e.preventDefault();
		var self = $(this);
		var type = self.data("type");
		self.addClass("active").siblings().removeClass("active");
		jsonEditor.toggleClass("show", type == "json");
	});
});

function reset() {
	$.getJSON("json/resume.json", function(data) {
		builder.setFormValues(data);
	});
}

function clear() {
	builder.setFormValues({});
}

function enableTSEplugin() {
	var preview = $("#preview");
	var scrollable = $(".tse-scrollable");
	scrollable.TrackpadScrollEmulator();
	scrollable.on("startDrag", function() {
		preview.addClass("scroll");
	});
	scrollable.on("endDrag", function() {
		preview.removeClass("scroll");
	});
}

function enableCSStransitions() {
	setTimeout(function() {
		$("body").removeClass("preload");
	}, 200);
}

function setup() {
                document.getElementById('buttonid').addEventListener('click', openDialog);
                function openDialog() {
                    document.getElementById('fileid').click();
                }
                document.getElementById('fileid').addEventListener('change', submitForm);
                function submitForm() {
                    document.getElementById('formid').submit();
                }
            }
