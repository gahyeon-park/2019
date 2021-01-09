<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" indent="yes" encoding="utf-8"/>
	<xsl:template match="/attributeExample">
		<html lang="ko">
			<head>
				<meta charset="utf-8"/>
			</head>
			<body>
				<img>
					<xsl:attribute name="src">
						<xsl:value-of select="image/src"/>
					</xsl:attribute>
					<xsl:attribute name="width">
						<xsl:value-of select="image/width"/>
					</xsl:attribute>
					<xsl:attribute name="height">
						<xsl:value-of select="image/height"/>
					</xsl:attribute>
					<xsl:attribute name="alt">
						<xsl:value-of select="image/alt"/>
					</xsl:attribute>
				</img>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>
