<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="utf-8"/>

    <xsl:template match="list">
        <xsl:choose>
            <xsl:when test="//name">
                <xsl:for-each select="users/user">
                    <tr>
                        <td>
                            <xsl:value-of select="name" />
                        </td>
                        <td>
                            <xsl:value-of select="email" />
                        </td>
                        <td>
                            <xsl:value-of select="address" />
                        </td>
                        <td>
                            <xsl:value-of select="phone_number" />
                        </td>
                        <td>
                            <xsl:value-of select="role_level" />
                        </td>
                        <td>
                            <xsl:value-of select="email_verified_at" />
                        </td>
                    </tr>
                </xsl:for-each>
            </xsl:when>
            <xsl:otherwise>
                <div class="col text-center mt-5">
                    <h3>
                        <b>User Not Found</b>
                    </h3>
                </div>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

</xsl:stylesheet>
