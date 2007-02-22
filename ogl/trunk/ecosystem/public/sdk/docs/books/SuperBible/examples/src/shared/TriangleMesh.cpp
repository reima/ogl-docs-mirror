/*
 *  TriangleMesh.cpp
 *
 *  Copyright 2007 Richard S. Wright Jr. All rights reserved.
 *
 */

#include "TriangleMesh.h"



CTriangleMesh::CTriangleMesh(void)
    {
    pIndexes = NULL;
    pVerts = NULL;
    pNorms = NULL;
    pTexCoords = NULL;
    
    nMaxIndexes = 0;
    nNumIndexes = 0;
    nNumVerts = 0;
    }
    
CTriangleMesh::~CTriangleMesh(void)
    {
    delete [] pIndexes;
    delete [] pVerts;
    delete [] pNorms;
    delete [] pTexCoords;
    }
    
void CTriangleMesh::BeginMesh(GLuint nMaxVerts)
    {
    // Just in case this gets called more than once...
    delete [] pIndexes;
    delete [] pVerts;
    delete [] pNorms;
    delete [] pTexCoords;
    
    nMaxIndexes = nMaxVerts;
    nNumIndexes = 0;
    nNumVerts = 0;
    
    // Allocate new blocks
    pIndexes = new GLuint[nMaxIndexes];
    pVerts = new M3DVector3f[nMaxIndexes];
    pNorms = new M3DVector3f[nMaxIndexes];
    pTexCoords = new M3DVector2f[nMaxIndexes];
    }
  
void CTriangleMesh::AddTriangle(M3DVector3f verts[3], M3DVector3f vNorms[3], M3DVector2f vTexCoords[3])
    {
    const  float e = 0.000001; // How small a difference to equate

    // Search for match - triangle consists of three verts
    for(GLuint iVertex = 0; iVertex < 3; iVertex++)
        {
        GLuint iMatch = 0;
        for(iMatch = 0; iMatch < nNumVerts; iMatch++)
            {
            // If the vertex positions are the same
            if(m3dCloseEnough(pVerts[iMatch][0], verts[iVertex][0], e) &&
               m3dCloseEnough(pVerts[iMatch][1], verts[iVertex][1], e) &&
               m3dCloseEnough(pVerts[iMatch][2], verts[iVertex][2], e) &&
                   
               // AND the Normal is the same...
               m3dCloseEnough(pNorms[iMatch][0], vNorms[iVertex][0], e) &&
               m3dCloseEnough(pNorms[iMatch][1], vNorms[iVertex][1], e) &&
               m3dCloseEnough(pNorms[iMatch][2], vNorms[iVertex][2], e) &&
                   
                // And Texture is the same...
                m3dCloseEnough(pTexCoords[iMatch][0], vTexCoords[iVertex][0], e) &&
                m3dCloseEnough(pTexCoords[iMatch][1], vTexCoords[iVertex][1], e))
                {
                // Then add the index only
                pIndexes[nNumIndexes] = iMatch;
                nNumIndexes++;
                break;
                }
            }
            
        // No match for this vertex, add to end of list
        if(iMatch == nNumVerts)
            {
            memcpy(pVerts[nNumVerts], verts[iVertex], sizeof(M3DVector3f));
            memcpy(pNorms[nNumVerts], vNorms[iVertex], sizeof(M3DVector3f));
            memcpy(pTexCoords[nNumVerts], &vTexCoords[iVertex], sizeof(M3DVector2f));
            pIndexes[nNumIndexes] = nNumVerts;
            nNumIndexes++; 
            nNumVerts++;
            }   
        }
    }
    


//////////////////////////////////////////////////////////////////
// Compact the data
void CTriangleMesh::EndMesh(void)
    {
    // Allocate smaller arrays
    GLuint *pPackedIndexes = new GLuint[nNumIndexes];
    M3DVector3f *pPackedVerts = new M3DVector3f[nNumVerts];
    M3DVector3f *pPackedNorms = new M3DVector3f[nNumVerts];
    M3DVector2f *pPackedTex = new M3DVector2f[nNumVerts];
    
    // Copy data to smaller arrays
    memcpy(pPackedIndexes, pIndexes, sizeof(GLuint)*nNumIndexes);
    memcpy(pPackedVerts, pVerts, sizeof(M3DVector3f)*nNumVerts);
    memcpy(pPackedNorms, pNorms, sizeof(M3DVector3f)*nNumVerts);
    memcpy(pPackedTex, pTexCoords, sizeof(M3DVector2f)*nNumVerts);
    
    // Free older, larger arrays
    delete [] pIndexes;
    delete [] pVerts;
    delete [] pNorms;
    delete [] pTexCoords;

    // Reasign pointers
    pIndexes = pPackedIndexes;
    pVerts = pPackedVerts;
    pNorms = pPackedNorms;
    pTexCoords = pPackedTex;
    }

