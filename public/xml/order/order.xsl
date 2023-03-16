<?xml version="1.0" encoding="UTF-8"?>

<!-- Author: Beh Guo Hao-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="utf-8"/>

    <xsl:template match="orders">        
                <xsl:for-each select="order">
                    <div>
                        <div class="order">
                            <div class="items">
                            <div class="item-1"><H2>Item(s)</H2></div>  
                            <div class="item-2"><H2>Quantity</H2></div>  
                            <div class="item-3"><H2>Price</H2></div>
                            </div>  
                                
                            <xsl:for-each select="item">
                            <div class="items">
                                <div class="item-1">
                                <h5>
                                    <img class="order-img">
                                        <xsl:attribute name="src">/img/menu/<xsl:value-of select='image' />
                                        </xsl:attribute>
                                    </img>
                                    <xsl:value-of select="menu_name" /> 
                                </h5>
                                </div>
                                <div class="item-2">
                                    x<xsl:value-of select="quantity" />
                                    </div>                                                                       
                                <div class="item-3">
                                    <h6>
                                        RM <xsl:value-of select='price' />
                                    </h6>
                                </div> 
                            </div>                                   
                            </xsl:for-each>   
                             
                            <div class="detail-box">
                                <div class="detail">
                                    <b>Paid:</b>&#160; RM&#160;<xsl:value-of select="totalPrice" />&#160;by&#160;<xsl:value-of select="paymentMethod" />
                                </div > 
                                <div class="detail">
                                    <b>Name:</b>&#160; <xsl:value-of select="name" />
                                </div> 
                                <div class="detail">
                                    <b>Ordered on:</b>&#160; <xsl:value-of select="time" />
                                </div>
                                <div class="detail">
                                    <b>Address:</b>&#160; <xsl:value-of select="address" />
                                </div>
                            </div>                   
                        </div>
                    </div>
                </xsl:for-each>            
    </xsl:template>

</xsl:stylesheet>
