// show3d.fs
//
// spit out 4 levels of 3D texture

uniform sampler3D sampler0;

void main(void)
{
    if (gl_TexCoord[0].t >= 0.5)
    {
        if (gl_TexCoord[0].s < 0.5)
        {
            // top left: level 0
            gl_FragColor = texture3D(sampler0, 
                vec3(2.0 * (gl_TexCoord[0].st - vec2(0, 0.5)), 0.125));
        }
        else
        {
            // top right: level 1
            gl_FragColor = texture3D(sampler0, 
                vec3(2.0 * (gl_TexCoord[0].st - vec2(0.5, 0.5)), 0.375));
        }
    }
    else
    {
        if (gl_TexCoord[0].s < 0.5)
        {
            // bottom left: level 2
            gl_FragColor = texture3D(sampler0, 
                vec3(2.0 * gl_TexCoord[0].st, 0.625));
        }
        else
        {
            // bottom right: level 3
            gl_FragColor = texture3D(sampler0, 
                vec3(2.0 * (gl_TexCoord[0].st - vec2(0.5, 0.0)), 0.875));
        }
    }
}
