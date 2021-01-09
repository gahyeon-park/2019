<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:output method="html" encoding="UTF-8"/>
	<xsl:template match="/">
		<html>
			<body bgcolor="pink">
				<b>
					<font size="4" color="black" face="서울들국화">
						<xsl:for-each select="movieTable/movie">
							<hr color="white"/>
							<p>제목 : <xsl:value-of select="title"/></p>
							<p>----------별점--------</p>
							<p>관람객 : <xsl:value-of select="assessment/spectator"/></p>
							<p>평론가 : <xsl:value-of select="assessment/critic">
							<p>----------------------</p>
							<p></p>
							
						</xsl:for-each>
					</font>
				</b>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>
