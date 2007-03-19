// combine.fs
//
// take incoming textures and
// add them together, then
// tonemap the result

uniform sampler2D sampler0;
uniform sampler2D sampler1;
uniform sampler2D sampler2;
uniform sampler2D sampler3;
uniform sampler2D sampler4;

void main(void)
{
    vec4 temp;

    temp = texture2D(sampler0, gl_TexCoord[0].st);
    temp += texture2D(sampler1, gl_TexCoord[0].st);
    temp += texture2D(sampler2, gl_TexCoord[0].st);
    temp += texture2D(sampler3, gl_TexCoord[0].st);
    temp += texture2D(sampler4, gl_TexCoord[0].st);

    gl_FragColor = temp;
}
