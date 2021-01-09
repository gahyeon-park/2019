<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="text" indent="yes" encoding="UTF-8"/>
	<xsl:template match="/document/a">
		<xsl:value-of select="/document/a"/>
	</xsl:template>
	<xsl:template match="/document/b">
		<xsl:value-of select="/document/b"/>
	</xsl:template>
</xsl:stylesheet>
