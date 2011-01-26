#!gmake

# XSLT processor - other possibilities like Saxon exist
XSLT	= xsltproc --nonet
SED	= sed
PERL = perl

# Location of locally customized stylesheet, which imports
# the Docbook modular stylesheets, and specifically the
# stylesheet to convert Docbook+MathML => XHTML+MathML
DB2XHTML = opengl-man.xsl
# ../../mancommon/opengl-man.xsl

.SUFFIXES: .gl .xml .html .xhtml .ck.xhtml .tex .pdf .3G .tar .tar.gz
.PHONY: man html pdf tex

# ../../mancommon/opengl-man.xsl

%.xml: ../%.xml $(DB2XHTML)
	$(XSLT) --xinclude -o $@.tmp $(DB2XHTML) $<
	$(SED) 's/<?xml-stylesheet/<!-- saved from url=(0013)about:internet -->\n<?xml-stylesheet/g' $@.tmp | \
	    $(SED) 's#http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd#xhtml1-transitional.dtd#g' > $@
	$(RM) $@.tmp

Angle_and_Trigonometry_Functions = \
    radians.xml \
    degrees.xml \
    sin.xml \
    cos.xml \
    tan.xml \
    asin.xml \
    acos.xml \
    atan.xml \
    sinh.xml \
    cosh.xml \
    tanh.xml \
    asinh.xml \
    acosh.xml \
    atanh.xml

Exponential_Functions = \
    pow.xml \
    exp.xml \
    log.xml \
    exp2.xml \
    log2.xml \
    sqrt.xml \
    inversesqrt.xml

Common_Functions = \
    abs.xml \
    sign.xml \
    floor.xml \
    trunc.xml \
    round.xml \
    roundEven.xml \
    ceil.xml \
    fract.xml \
    mod.xml \
    modf.xml \
    min.xml \
    max.xml \
    clamp.xml \
    mix.xml \
    step.xml \
    smoothstep.xml \
    isnan.xml \
    isinf.xml \
    floatBitsToInt.xml \
    intBitsToFloat.xml \
    fma.xml \
    frexp.xml \
    ldexp.xml

FloatingPoint_Pack_and_Unpack_Functions = \
    packUnorm2x16.xml \
    unpackUnorm2x16.xml \
    packDouble2x32.xml \
    unpackDouble2x32.xml

Geometric_Functions = \
    length.xml \
    distance.xml \
    dot.xml \
    cross.xml \
    normalize.xml \
    faceforward.xml \
    reflect.xml \
    refract.xml

Matrix_Functions = \
    matrixCompMult.xml \
    outerProduct.xml \
    transpose.xml \
    determinant.xml \
    inverse.xml

Vector_Relational_Functions = \
    lessThan.xml \
    lessThanEqual.xml \
    greaterThan.xml \
    greaterThanEqual.xml \
    equal.xml \
    notEqual.xml \
    any.xml \
    all.xml \
    not.xml

Integer_Functions = \
    uaddCarry.xml \
    usubBorrow.xml \
    umulExtended.xml \
    bitfieldExtract.xml \
    bitfieldInsert.xml \
    bitfieldReverse.xml \
    bitCount.xml \
    findLSB.xml \
    findMSB.xml

GLSLXML = \
    $(Angle_and_Trigonometry_Functions) \
    $(Exponential_Functions) \
    $(Common_Functions) \
    $(FloatingPoint_Pack_and_Unpack_Functions) \
    $(Geometric_Functions) \
    $(Matrix_Functions) \
    $(Vector_Relational_Functions) \
    $(Integer_Functions)

XML    = $(GLSLXML)

default: all

index.html: makeindex.pl $(XML) Makefile
	$(PERL) makeindex.pl $(dir $<) $(dir $<).. > $@

all: $(XML) index.html Makefile

clean:
	$(RM) $(TEX_FILES) *.log *.aux *.toc *.dvi *.out

clobber: clean
	$(RM) $(XML) $(PDF_FILES)
