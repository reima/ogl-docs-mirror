// combine.fs
//
// take incoming textures and
// add them together, then
// tonemap the result

uniform sampler2D sampler0;
uniform sampler2D sampler1;
uniform sampler3D sampler2;

void main(void)
{
    gl_FragColor = vec4(1.0, 0.0, 0.0, 1.0);
}
