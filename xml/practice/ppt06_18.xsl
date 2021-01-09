<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="text" version="1.0" encoding="utf-8" indent="no"/>
	<xsl:template match="/">
		<xsl:value-of select="todayNews/news"/>
		<xsl:text>
		</xsl:text>
		<xsl:value-of select="todayNews/news/kind"/>
		<xsl:text>
		</xsl:text>
	</xsl:template>
</xsl:stylesheet>
