<html>
	<head>
		<script type="text/javascript" charset="utf-8">
		
			//OBS 446 är sista vi kom till innan vi avbröt
			var i = 446;
			
			function reloadIframe() {
				document.getElementById('iframe').setAttribute("src","getDataToDb_iframe.php?i=" + i);
				i++;
				t=setTimeout("reloadIframe()", 2000);
			}
			
		</script>
	</head>
	<body onload="reloadIframe()">
		<iframe id="iframe" src="getDataToDb_iframe.php?i=1" width="80%" height="80%">
	</body>
</html>