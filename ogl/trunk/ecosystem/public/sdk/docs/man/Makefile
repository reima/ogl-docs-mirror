#!gmake

# XSLT processor - other possibilities like Saxon exist
XSLT	= xsltproc

# Location of the Docbook modular stylesheets, and the specific
# stylesheet to convert Docbook+MathML => XHTML+MathML
XSLSS	= /usr/share/sgml/docbook/xsl-stylesheets
DB2XHTML = $(XSLSS)/xhtml/docbook.xsl

.SUFFIXES: .gl .xml .html .xhtml .ck.xhtml .tex .pdf .3G .tar .tar.gz
.PHONY: man html pdf tex

.xml.xhtml:
	$(XSLT) --xinclude -o $@ $(DB2XHTML) $<

# ARB Ecosystem man pages
ARBXML = \
    glBlendEquationSeparate.xml

# SuperBible GL 1.5 man pages
SUPERBIBLEXML = \
    glBeginQuery.xml \
    glBindBuffer.xml \
    glDeleteQueries.xml \
    glGenQueries.xml \
    glGetQueryiv.xml \
    glGetQueryObject.xml \
    glIsQuery.xml

# 3Dlabs GL 2.0 man pages
3DLABSXML = \
    API-Index.xml \
    glAttachShader.xml \
    glBindAttribLocation.xml \
    glCompileShader.xml \
    glCreateProgram.xml \
    glCreateShader.xml \
    glDeleteProgram.xml \
    glDeleteShader.xml \
    glDetachShader.xml \
    glDrawBuffers.xml \
    glEnableVertexAttribArray.xml \
    glGetActiveAttrib.xml \
    glGetActiveUniform.xml \
    glGetAttachedShaders.xml \
    glGetAttribLocation.xml \
    glGetProgramInfoLog.xml \
    glGetProgram.xml \
    glGetShaderInfoLog.xml \
    glGetShaderSource.xml \
    glGetShader.xml \
    glGetUniformLocation.xml \
    glGetUniform.xml \
    glGetVertexAttribPointer.xml \
    glGetVertexAttrib.xml \
    glIsProgram.xml \
    glIsShader.xml \
    glLinkProgram.xml \
    glShaderSource.xml \
    glUniform.xml \
    glUseProgram.xml \
    glValidateProgram.xml \
    glVertexAttribPointer.xml \
    glVertexAttrib.xml \
    ImpDepConstants.xml \
    MigrationGuide.xml

# SGI OpenGL 1.4 man pages
SGIGLXML = \
    glAccum.xml \
    glActiveTexture.xml \
    glAlphaFunc.xml \
    glAreTexturesResident.xml \
    glArrayElement.xml \
    glBegin.xml \
    glBindTexture.xml \
    glBitmap.xml \
    glBlendColor.xml \
    glBlendEquation.xml \
    glBlendFuncSeparate.xml \
    glBlendFunc.xml \
    glCallLists.xml \
    glCallList.xml \
    glClearAccum.xml \
    glClearColor.xml \
    glClearDepth.xml \
    glClearIndex.xml \
    glClearStencil.xml \
    glClear.xml \
    glClientActiveTexture.xml \
    glClipPlane.xml \
    glColorMask.xml \
    glColorMaterial.xml \
    glColorPointer.xml \
    glColorSubTable.xml \
    glColorTableParameter.xml \
    glColorTable.xml \
    glColor.xml \
    glCompressedTexImage1D.xml \
    glCompressedTexImage2D.xml \
    glCompressedTexImage3D.xml \
    glCompressedTexSubImage1D.xml \
    glCompressedTexSubImage2D.xml \
    glCompressedTexSubImage3D.xml \
    glConvolutionFilter1D.xml \
    glConvolutionFilter2D.xml \
    glConvolutionParameter.xml \
    glCopyColorSubTable.xml \
    glCopyColorTable.xml \
    glCopyConvolutionFilter1D.xml \
    glCopyConvolutionFilter2D.xml \
    glCopyPixels.xml \
    glCopyTexImage1D.xml \
    glCopyTexImage2D.xml \
    glCopyTexSubImage1D.xml \
    glCopyTexSubImage2D.xml \
    glCopyTexSubImage3D.xml \
    glCullFace.xml \
    glDeleteLists.xml \
    glDeleteTextures.xml \
    glDepthFunc.xml \
    glDepthMask.xml \
    glDepthRange.xml \
    glDrawArrays.xml \
    glDrawBuffer.xml \
    glDrawElements.xml \
    glDrawPixels.xml \
    glDrawRangeElements.xml \
    glEdgeFlagPointer.xml \
    glEdgeFlag.xml \
    glEnableClientState.xml \
    glEnable.xml \
    glEvalCoord.xml \
    glEvalMesh.xml \
    glEvalPoint.xml \
    glFeedbackBuffer.xml \
    glFinish.xml \
    glFlush.xml \
    glFogCoordPointer.xml \
    glFogCoord.xml \
    glFog.xml \
    glFrontFace.xml \
    glFrustum.xml \
    glGenLists.xml \
    glGenTextures.xml \
    glGetClipPlane.xml \
    glGetColorTableParameter.xml \
    glGetColorTable.xml \
    glGetCompressedTexImage.xml \
    glGetConvolutionFilter.xml \
    glGetConvolutionParameter.xml \
    glGetError.xml \
    glGetHistogramParameter.xml \
    glGetHistogram.xml \
    glGetLight.xml \
    glGetMap.xml \
    glGetMaterial.xml \
    glGetMinmaxParameter.xml \
    glGetMinmax.xml \
    glGetPixelMap.xml \
    glGetPointerv.xml \
    glGetPolygonStipple.xml \
    glGetSeparableFilter.xml \
    glGetString.xml \
    glGetTexEnv.xml \
    glGetTexGen.xml \
    glGetTexImage.xml \
    glGetTexLevelParameter.xml \
    glGetTexParameter.xml \
    glGet.xml \
    glHint.xml \
    glHistogram.xml \
    glIndexMask.xml \
    glIndexPointer.xml \
    glIndex.xml \
    glInitNames.xml \
    glInterleavedArrays.xml \
    glIsEnabled.xml \
    glIsList.xml \
    glIsTexture.xml \
    glLightModel.xml \
    glLight.xml \
    glLineStipple.xml \
    glLineWidth.xml \
    glListBase.xml \
    glLoadIdentity.xml \
    glLoadMatrix.xml \
    glLoadName.xml \
    glLoadTransposeMatrix.xml \
    glLogicOp.xml \
    glMap1.xml \
    glMap2.xml \
    glMapGrid.xml \
    glMaterial.xml \
    glMatrixMode.xml \
    glMinmax.xml \
    glMultiDrawArrays.xml \
    glMultiDrawElements.xml \
    glMultiTexCoord.xml \
    glMultMatrix.xml \
    glMultTransposeMatrix.xml \
    glNewList.xml \
    glNormalPointer.xml \
    glNormal.xml \
    glOrtho.xml \
    glPassThrough.xml \
    glPixelMap.xml \
    glPixelStore.xml \
    glPixelTransfer.xml \
    glPixelZoom.xml \
    glPointParameter.xml \
    glPointSize.xml \
    glPolygonMode.xml \
    glPolygonOffset.xml \
    glPolygonStipple.xml \
    glPrioritizeTextures.xml \
    glPushAttrib.xml \
    glPushClientAttrib.xml \
    glPushMatrix.xml \
    glPushName.xml \
    glRasterPos.xml \
    glReadBuffer.xml \
    glReadPixels.xml \
    glRect.xml \
    glRenderMode.xml \
    glResetHistogram.xml \
    glResetMinmax.xml \
    glRotate.xml \
    glSampleCoverage.xml \
    glScale.xml \
    glScissor.xml \
    glSecondaryColorPointer.xml \
    glSecondaryColor.xml \
    glSelectBuffer.xml \
    glSeparableFilter2D.xml \
    glShadeModel.xml \
    glStencilFunc.xml \
    glStencilMask.xml \
    glStencilOp.xml \
    glTexCoordPointer.xml \
    glTexCoord.xml \
    glTexEnv.xml \
    glTexGen.xml \
    glTexImage1D.xml \
    glTexImage2D.xml \
    glTexImage3D.xml \
    glTexParameter.xml \
    glTexSubImage1D.xml \
    glTexSubImage2D.xml \
    glTexSubImage3D.xml \
    glTranslate.xml \
    glVertexPointer.xml \
    glVertex.xml \
    glViewport.xml \
    glWindowPos.xml

# SGI GLU 1.3 man pages
SGIGLUXML = \
    gluBeginCurve.xml \
    gluBeginPolygon.xml \
    gluBeginSurface.xml \
    gluBeginTrim.xml \
    gluBuild1DMipmapLevels.xml \
    gluBuild1DMipmaps.xml \
    gluBuild2DMipmapLevels.xml \
    gluBuild2DMipmaps.xml \
    gluBuild3DMipmapLevels.xml \
    gluBuild3DMipmaps.xml \
    gluCheckExtension.xml \
    gluCylinder.xml \
    gluDeleteNurbsRenderer.xml \
    gluDeleteQuadric.xml \
    gluDeleteTess.xml \
    gluDisk.xml \
    gluErrorString.xml \
    gluGetNurbsProperty.xml \
    gluGetString.xml \
    gluGetTessProperty.xml \
    gluLoadSamplingMatrices.xml \
    gluLookAt.xml \
    gluNewNurbsRenderer.xml \
    gluNewQuadric.xml \
    gluNewTess.xml \
    gluNextContour.xml \
    gluNurbsCallbackDataEXT.xml \
    gluNurbsCallbackData.xml \
    gluNurbsCallback.xml \
    gluNurbsCurve.xml \
    gluNurbsProperty.xml \
    gluNurbsSurface.xml \
    gluOrtho2D.xml \
    gluPartialDisk.xml \
    gluPerspective.xml \
    gluPickMatrix.xml \
    gluProject.xml \
    gluPwlCurve.xml \
    gluQuadricCallback.xml \
    gluQuadricDrawStyle.xml \
    gluQuadricNormals.xml \
    gluQuadricOrientation.xml \
    gluQuadricTexture.xml \
    gluScaleImage.xml \
    gluSphere.xml \
    gluTessBeginContour.xml \
    gluTessBeginPolygon.xml \
    gluTessCallback.xml \
    gluTessEndPolygon.xml \
    gluTessNormal.xml \
    gluTessProperty.xml \
    gluTessVertex.xml \
    gluUnProject4.xml \
    gluUnProject.xml

# SGI GLX 1.4 man pages
SGIGLXXML = \
    glXChooseFBConfig.xml \
    glXChooseVisual.xml \
    glXCopyContext.xml \
    glXCreateContext.xml \
    glXCreateGLXPixmap.xml \
    glXCreateNewContext.xml \
    glXCreatePbuffer.xml \
    glXCreatePixmap.xml \
    glXCreateWindow.xml \
    glXDestroyContext.xml \
    glXDestroyGLXPixmap.xml \
    glXDestroyPbuffer.xml \
    glXDestroyPixmap.xml \
    glXDestroyWindow.xml \
    glXFreeContextEXT.xml \
    glXGetClientString.xml \
    glXGetConfig.xml \
    glXGetContextIDEXT.xml \
    glXGetCurrentContext.xml \
    glXGetCurrentDisplay.xml \
    glXGetCurrentDrawable.xml \
    glXGetCurrentReadDrawable.xml \
    glXGetFBConfigAttrib.xml \
    glXGetFBConfigs.xml \
    glXGetProcAddress.xml \
    glXGetSelectedEvent.xml \
    glXGetVisualFromFBConfig.xml \
    glXImportContextEXT.xml \
    glXIntro.xml \
    glXIsDirect.xml \
    glXMakeContextCurrent.xml \
    glXMakeCurrent.xml \
    glXQueryContextInfoEXT.xml \
    glXQueryContext.xml \
    glXQueryExtensionsString.xml \
    glXQueryExtension.xml \
    glXQueryServerString.xml \
    glXQueryVersion.xml \
    glXSelectEvent.xml \
    glXSwapBuffers.xml \
    glXUseXFont.xml \
    glXWaitGL.xml \
    glXWaitX.xml

# XML man page source and XHTML targets
GLXML  = $(SGIGLXML) $(3DLABSXML) $(SUPERBIBLEXML) $(ARBXML)
GLUXML = $(SGIGLUXML)
GLXXML = $(SGIGLXXML)
XML    = $(GLXML) $(GLUXML) $(GLXXML)

XHTML	= $(XML:.xml=.xhtml)

default: $(XHTML)

clean:
	$(RM) $(TEX_FILES) *.log *.aux *.toc *.dvi *.out

clobber: clean
	$(RM) $(XHTML) $(PDF_FILES)
