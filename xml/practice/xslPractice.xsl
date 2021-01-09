<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" indent="yes" encoding="UTF-8"/>
<xsl:template match="/">
<html lang="ko">
	<head>
		<meta charset="utf-8"/>
		<style>
			* { margin: 0px; padding: 0px; font-size: 100%; }
			body { background-color: pink; }
			p { 
				text-align: center;
			       	font-size: 50px;
				color: navy;
			}
		</style>
	</head>
	<body>
			<p><xsl:value-of select="/document"/></p>
	</body>
</html>		
</xsl:template>
</xsl:stylesheet>
