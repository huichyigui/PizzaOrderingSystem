<?xml version="1.0" encoding="UTF-8"?>

<!-- Author: Gui Hui Chyi-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="utf-8"/>

    <xsl:template match="menu">
        <xsl:choose>
            <xsl:when test="//name">
                <xsl:for-each select="items/item">
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img>
                                        <xsl:attribute name="src">/img/menu/<xsl:value-of select='image' />
                                        </xsl:attribute>
                                    </img>
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        <xsl:value-of select="name" />
                                    </h5>
                                    <p>
                                        <xsl:value-of select="category" />
                                    </p>
                                    <div class="options">
                                        <h6>
                                            RM <xsl:value-of select='format-number(price, "0.00")' />
                                        </h6>
                                        <div class="text-center">
                                            <xsl:variable name="addToCart" select="concat('window.location.href=&quot;/addToCart/', @menu_id, '&quot;')" />
                                            <button type="button" class="c-white px-3 py-1 btn-dark text-decoration-none focusless" onclick="{$addToCart}">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </xsl:for-each>
            </xsl:when>
            <xsl:otherwise>
                <div class="col text-center mt-5">
                    <label>
                        <h3>
                            <b>Menu Not Found</b>
                        </h3>
                        <h5 class="m-0 pb-3">Sorry, but nothing matched your search terms. Please try again with some different keywords.</h5>
                    </label>
                    <br/>
                    <xsl:variable name="clearFilter" select="concat('window.location.href=&quot;/menu', '&quot;')" />
                    <button type="button" class="ml-3 c-white py-2 btn btn-dark text-decoration-none focusless" onclick="{$clearFilter}">Clear Filter</button>
                </div>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

</xsl:stylesheet>
