<!DOCTYPE html>
<html>
<head>
	<title>Website Builder</title>
</head>
<link rel="stylesheet" type="text/css" href="css/grapes.min.css">
<link rel="stylesheet" type="text/css" href="css/grapesjs-preset-webpage.min.css">
<style type="text/css">
	body{
		margin :  0px;
		height:  100%;
	}
	.button_export{
		background-color: yellow;
		color: black;
	}
	.button_export:after{
		content: "Export Website";
		font-family: arial;
		font-size: 14px;
	}

</style>
<body>
<div id="canvas"></div>

<script type="text/javascript" src="js/grapes.min.js"></script>
<script type="text/javascript" src="js/grapesjs-preset-webpage.min.js"></script>
<script type="text/javascript">
	
	//disini area inisialisasi kode javascript

	var editor = grapesjs.init({
		container : '#canvas',
		plugins : ['gjs-preset-webpage']
	})

	//membuat tombol export desain
	var panelManager = editor.Panels;
	var button_export = panelManager.addButton('devices-c', {
		id : "button_export",
		className : "button_export",
		command : function(editor){
			export_website(editor.getHtml(), editor.getCss());
		},
		attributes : {title : "Website Builder"},
		togglable : 0
	})

	function export_website(html, css){
		var formData = new FormData();
		formData.append("html", html);
		formData.append("css", css);
		var xmlHttp = new XMLHttpRequest();
		xmlHttp.onreadystatechange = function(){
			if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
				window.open("export/build.zip", "_blank");
			}
		}
		xmlHttp.open("post", "build_html.php");
		xmlHttp.send(formData);
	}

</script>
</body>
</html>