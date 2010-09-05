<html>
	<head>
		<script type="text/javascript" charset="utf-8">
		
			var i = 1;
			
			function reloadIframe() {
				document.getElementById('iframe').setAttribute("src","getDataToDb_iframe.php?i=" + i);
				i++;
				t=setTimeout("reloadIframe()", 10000);
			}
			
		</script>
	</head>
	<body onload="reloadIframe()">
		<iframe id="iframe" src="getDataToDb_iframe.php?i=1" width="80%" height="80%">
	</body>
</html>