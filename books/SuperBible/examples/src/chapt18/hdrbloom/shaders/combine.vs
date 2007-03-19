// combine.vs
//
// Generic vertex transformation,
// pass through texture coordinate 

varying vec2 TC;

void main(void)
{ 
    // no transform
    gl_Position = gl_Vertex;

    // map object-space position onto unit sphere
    TC = gl_MultiTexCoord0.xy;
}