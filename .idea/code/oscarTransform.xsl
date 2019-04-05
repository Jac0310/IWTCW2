<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:param name="year"></xsl:param>
    <xsl:param name="category"></xsl:param>
    <xsl:param name="info"></xsl:param>
    <xsl:param name="nominee"></xsl:param>
    <xsl:param name="won"></xsl:param>
    <xsl:template match="Oscars">
        <html>
            <table>
                <tr>
                    <th>Year</th>
                    <th>Category</th>
                    <th>Nominee</th>
                    <th>Info</th>
                    <th>Won?</th>
                </tr>
                <xsl:for-each select="Nomination">
                    <xsl:if test="./Year[contains(., $year)] and ./Category[contains(., $category)] and ./Info[contains(., $info)] and ./Won[contains(., $won)] and ./Nominee[contains(., $nominee)] ">
                        <tr>
                            <td>
                                <xsl:value-of select="Year"/>
                            </td>
                            <td>
                                <xsl:value-of select="Category"/>
                            </td>
                            <td>
                                <xsl:value-of select="Nominee"/>
                            </td>
                            <td>
                                <xsl:value-of select="Info"/>
                            </td>
                            <td>
                                <xsl:value-of select="Won"/>
                            </td>
                        </tr>
                    </xsl:if>
                </xsl:for-each>
            </table>
        </html>
    </xsl:template>
</xsl:stylesheet>


