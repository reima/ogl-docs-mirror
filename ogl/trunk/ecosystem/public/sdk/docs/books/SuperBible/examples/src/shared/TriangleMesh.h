/*
 *  TriangleMesh.h
 *  OpenGL SuperBible
 *
 *  Copyright 2007 Richard S. Wright Jr.. All rights reserved.
 *
 */
#include "gltools.h"
#include "math3d.h"


class CTriangleMesh
    {
    public:
        CTriangleMesh(void);
        ~CTriangleMesh(void);
        
        void BeginMesh(GLuint nMaxVerts);
        void AddTriangle(M3DVector3f verts[3], M3DVector3f vNorms[3], M3DVector2f vTexCoords[3]);
        void EndMesh(void);

        inline GLuint GetIndexCount(void) { return nNumIndexes; }
        inline GLuint GetVertexCount(void) { return nNumVerts; }
        
        void Scale(GLfloat fScaleValue) {
            for(int i = 0; i < nNumVerts; i++)
                m3dScaleVector3(pVerts[i], fScaleValue);
                }
        
        void Draw(void) {
                // Here's where the data is now
            glVertexPointer(3, GL_FLOAT,0, pVerts);
            glNormalPointer(GL_FLOAT, 0, pNorms);
            glTexCoordPointer(2, GL_FLOAT, 0, pTexCoords);

            // Draw them
            glDrawElements(GL_TRIANGLES, nNumIndexes, GL_UNSIGNED_INT, pIndexes);
            }
        
    protected:
        GLuint  *pIndexes;
        M3DVector3f *pVerts;
        M3DVector3f *pNorms;
        M3DVector2f *pTexCoords;
        
        GLuint nMaxIndexes;
        GLuint nNumIndexes;
        GLuint nNumVerts;
    };
