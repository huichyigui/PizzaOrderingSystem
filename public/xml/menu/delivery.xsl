<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="utf-8"/>

        <xsl:template match="list">
            <xsl:choose>
                <xsl:when test="//location">
                    <xsl:for-each select="records/record">
                        <tr>
                            <td>
                                <xsl:value-of select="location" />
                            </td>
                            <td>
                                <xsl:value-of select="startTime" />
                            </td>
                            <td>
                                <xsl:value-of select="endTime" />
                            </td>
                            <td>
                                <xsl:value-of select="status" />
                            </td>
                        </tr>
                    </xsl:for-each>
                </xsl:when>
                <xsl:otherwise>
                    <div class="col text-center mt-5">
                        <h3>
                            <b>Record Not Found</b>
                        </h3>
                    </div>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:template>

    </xsl:stylesheet>
