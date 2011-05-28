#!gmake

# XSLT processor - other possibilities like Saxon exist
XSLT	= xsltproc --nonet
SED	= sed

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
	    $(SED) 's#http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd#xhtml1-transitional.dtd#g' | \
	    $(SED) 's#</title># - OpenGL 4.1 Reference Pages</title>#g' > $@
	$(RM) $@.tmp

GL_ARB_draw_indirect_entries = \
    glDrawArraysIndirect.xml \
    glDrawElementsIndirect.xml
	
GL_ARB_shader_subroutine_entries = \
    glGetActiveSubroutineName.xml \
    glGetActiveSubroutineUniform.xml \
    glGetActiveSubroutineUniformName.xml \
    glGetProgramStage.xml \
    glGetSubroutineIndex.xml \
    glGetSubroutineUniformLocation.xml \
    glGetUniformSubroutine.xml \
    glUniformSubroutines.xml

GL_ARB_tessellation_shader_entries = \
    glPatchParameter.xml

GL_ARB_transform_feedback2_entries = \
    glBindTransformFeedback.xml \
    glDeleteTransformFeedbacks.xml \
    glGenTransformFeedbacks.xml \
    glIsTransformFeedback.xml \
    glPauseTransformFeedback.xml \
    glResumeTransformFeedback.xml \
    glDrawTransformFeedback.xml

GL_ARB_transform_feedback3_entries = \
    glDrawTransformFeedbackStream.xml \
    glBeginQueryIndexed.xml \
    glGetQueryIndexed.xml

GL_ARB_viewport_array_entries = \
    glDepthRangeArray.xml \
    glDepthRangeIndexed.xml \
    glScissorArray.xml \
    glScissorIndexed.xml \
    glViewportArray.xml \
    glViewportIndexed.xml

GL_ARB_get_program_binary_entries = \
    glGetProgramBinary.xml \
    glProgramBinary.xml \
    glProgramParameter.xml

GL_ARB_ES2_compatibility_entries = \
    glReleaseShaderCompiler.xml \
    glShaderBinary.xml \
    glGetShaderPrecisionFormat.xml

GL_ARB_separate_shader_objects_entries = \
    glUseProgramStages.xml \
    glActiveShaderProgram.xml \
    glCreateShaderProgram.xml \
    glBindProgramPipeline.xml \
    glGenProgramPipelines.xml \
    glDeleteProgramPipelines.xml \
    glIsProgramPipeline.xml \
    glGetProgramPipeline.xml \
    glValidateProgramPipeline.xml \
    glGetProgramPipelineInfoLog.xml \
    glProgramUniform.xml

GL_ARB_sample_shading_entries = \
    glMinSampleShading.xml

MODIFIEDFORGL4XML = \
    glClearDepth.xml \
    glCreateShader.xml \
    glDepthRange.xml \
    glDrawArrays.xml \
    glGetVertexAttrib.xml \
    glVertexAttrib.xml \
    glVertexAttribPointer.xml \

GL4XML = \
    $(GL_ARB_draw_indirect_entries) \
    $(GL_ARB_shader_subroutine_entries) \
    $(GL_ARB_tessellation_shader_entries) \
    $(GL_ARB_transform_feedback2_entries) \
    $(GL_ARB_transform_feedback3_entries) \
    $(GL_ARB_sample_shading_entries)

GL41XML = \
    $(GL_ARB_viewport_array_entries) \
    $(GL_ARB_get_program_binary_entries) \
    $(GL_ARB_ES2_compatibility_entries) \
    $(GL_ARB_separate_shader_objects_entries)

UNMODIFIEDXML = \
    glActiveTexture.xml \
    glAttachShader.xml \
    glBeginConditionalRender.xml \
    glBeginQuery.xml \
    glBeginTransformFeedback.xml \
    glBindAttribLocation.xml \
    glBindBuffer.xml \
    glBindBufferBase.xml \
    glBindBufferRange.xml \
    glBindFragDataLocation.xml \
    glBindFragDataLocationIndexed.xml \
    glBindFramebuffer.xml \
    glBindRenderbuffer.xml \
    glBindSampler.xml \
    glBindTexture.xml \
    glBindVertexArray.xml \
    glBlendColor.xml \
    glBlendEquation.xml \
    glBlendEquationSeparate.xml \
    glBlendFunc.xml \
    glBlendFuncSeparate.xml \
    glBlitFramebuffer.xml \
    glBufferData.xml \
    glBufferSubData.xml \
    glCheckFramebufferStatus.xml \
    glClampColor.xml \
    glClear.xml \
    glClearColor.xml \
    glClearBuffer.xml \
    glClearStencil.xml \
    glClientWaitSync.xml \
    glColorMask.xml \
    glCompileShader.xml \
    glCompressedTexImage1D.xml \
    glCompressedTexImage2D.xml \
    glCompressedTexImage3D.xml \
    glCompressedTexSubImage1D.xml \
    glCompressedTexSubImage2D.xml \
    glCompressedTexSubImage3D.xml \
    glCopyBufferSubData.xml \
    glCopyTexImage1D.xml \
    glCopyTexImage2D.xml \
    glCopyTexSubImage1D.xml \
    glCopyTexSubImage2D.xml \
    glCopyTexSubImage3D.xml \
    glCreateProgram.xml \
    glCreateShader.xml \
    glCullFace.xml \
    glDeleteBuffers.xml \
    glDeleteFramebuffers.xml \
    glDeleteProgram.xml \
    glDeleteQueries.xml \
    glDeleteRenderbuffers.xml \
    glDeleteSamplers.xml \
    glDeleteShader.xml \
    glDeleteSync.xml \
    glDeleteTextures.xml \
    glDeleteVertexArrays.xml \
    glDepthFunc.xml \
    glDepthMask.xml \
    glDetachShader.xml \
    glDisableVertexAttribArray.xml \
    glDrawArrays.xml \
    glDrawArraysInstanced.xml \
    glDrawBuffer.xml \
    glDrawBuffers.xml \
    glDrawElements.xml \
    glDrawElementsBaseVertex.xml \
    glDrawElementsInstanced.xml \
    glDrawElementsInstancedBaseVertex.xml \
    glDrawRangeElements.xml \
    glDrawRangeElementsBaseVertex.xml \
    glEnable.xml \
    glEnableVertexAttribArray.xml \
    glEndQuery.xml \
    glFenceSync.xml \
    glFinish.xml \
    glFlush.xml \
    glFlushMappedBufferRange.xml \
    glFramebufferRenderbuffer.xml \
    glFramebufferTexture.xml \
    glFramebufferTextureLayer.xml \
    glFrontFace.xml \
    glGenBuffers.xml \
    glGenerateMipmap.xml \
    glGenFramebuffers.xml \
    glGenQueries.xml \
    glGenRenderbuffers.xml \
    glGenSamplers.xml \
    glGenTextures.xml \
    glGenVertexArrays.xml \
    glGet.xml \
    glGetActiveAttrib.xml \
    glGetActiveUniform.xml \
    glGetActiveUniformBlock.xml \
    glGetActiveUniformBlockName.xml \
    glGetActiveUniformName.xml \
    glGetActiveUniformsiv.xml \
    glGetAttachedShaders.xml \
    glGetAttribLocation.xml \
    glGetBufferParameter.xml \
    glGetBufferPointerv.xml \
    glGetBufferSubData.xml \
    glGetCompressedTexImage.xml \
    glGetError.xml \
    glGetFragDataIndex.xml \
    glGetFragDataLocation.xml \
    glGetFramebufferAttachmentParameter.xml \
    glGetMultisample.xml \
    glGetProgram.xml \
    glGetProgramInfoLog.xml \
    glGetQueryObject.xml \
    glGetQueryiv.xml \
    glGetRenderbufferParameter.xml \
    glGetSamplerParameter.xml \
    glGetShader.xml \
    glGetShaderInfoLog.xml \
    glGetShaderSource.xml \
    glGetString.xml \
    glGetSync.xml \
    glGetTexImage.xml \
    glGetTexLevelParameter.xml \
    glGetTexParameter.xml \
    glGetTransformFeedbackVarying.xml \
    glGetUniform.xml \
    glGetUniformBlockIndex.xml \
    glGetUniformIndices.xml \
    glGetUniformLocation.xml \
    glGetVertexAttribPointerv.xml \
    glHint.xml \
    glIsBuffer.xml \
    glIsEnabled.xml \
    glIsFramebuffer.xml \
    glIsProgram.xml \
    glIsRenderbuffer.xml \
    glIsQuery.xml \
    glIsSampler.xml \
    glIsShader.xml \
    glIsSync.xml \
    glIsTexture.xml \
    glIsVertexArray.xml \
    glLineWidth.xml \
    glLinkProgram.xml \
    glLogicOp.xml \
    glMapBuffer.xml \
    glMapBufferRange.xml \
    glMultiDrawArrays.xml \
    glMultiDrawElements.xml \
    glMultiDrawElementsBaseVertex.xml \
    glPixelStore.xml \
    glPointParameter.xml \
    glPointSize.xml \
    glPolygonMode.xml \
    glPolygonOffset.xml \
    glPrimitiveRestartIndex.xml \
    glProvokingVertex.xml \
    glQueryCounter.xml \
    glReadBuffer.xml \
    glReadPixels.xml \
    glRenderbufferStorage.xml \
    glRenderbufferStorageMultisample.xml \
    glSampleCoverage.xml \
    glSampleMaski.xml \
    glSamplerParameter.xml \
    glScissor.xml \
    glShaderSource.xml \
    glStencilFunc.xml \
    glStencilFuncSeparate.xml \
    glStencilMask.xml \
    glStencilMaskSeparate.xml \
    glStencilOp.xml \
    glStencilOpSeparate.xml \
    glTexBuffer.xml \
    glTexImage1D.xml \
    glTexImage2D.xml \
    glTexImage2DMultisample.xml \
    glTexImage3D.xml \
    glTexImage3DMultisample.xml \
    glTexParameter.xml \
    glTexSubImage1D.xml \
    glTexSubImage2D.xml \
    glTexSubImage3D.xml \
    glTransformFeedbackVaryings.xml \
    glUniform.xml \
    glUniformBlockBinding.xml \
    glUnmapBuffer.xml \
    glUseProgram.xml \
    glValidateProgram.xml \
    glVertexAttribDivisor.xml \
    glViewport.xml \
    glWaitSync.xml

MODIFIEDXML = \

XML    = $(GL4XML) $(GL41XML) $(MODIFIEDFORGL4XML) $(UNMODIFIEDXML)

default: $(XML)

clean:
	$(RM) $(TEX_FILES) *.log *.aux *.toc *.dvi *.out

clobber: clean
	$(RM) $(XML) $(PDF_FILES)
