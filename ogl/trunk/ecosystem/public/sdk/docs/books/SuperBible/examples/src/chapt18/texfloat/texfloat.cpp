// texfloat.cpp
// OpenGL SuperBible, Chapter 18
// Demonstrates use of floating-point textures
// Program by Benjamin Lipchak

#include "../../shared/gltools.h"   // OpenGL toolkit
#include <ImfRgbaFile.h>            // OpenEXR headers
#include <ImfArray.h>
#pragma comment (lib, "IlmImf.lib")
#pragma comment (lib, "Imath.lib")
#pragma comment (lib, "zlib.lib")

#include <assert.h>
#include <stdio.h>

GLint windowWidth = 512;            // window size
GLint windowHeight = 512;

GLfloat *fTexels;                    // read back the framebuffer to here

GLfloat fCursorX = 0.0f;            // float cursor position [-1,1]
GLfloat fCursorY = 0.0f;
GLint iCursorX = 0;                 // integer cursor position [0,w/h]
GLint iCursorY = 0;

#define CLAMPED 0
#define TRIVIAL 1
#define FANCY 2
#define TOTAL_SHADERS 3

GLuint fShader[TOTAL_SHADERS], progObj[TOTAL_SHADERS];          // shader object names
GLboolean needsValidation[TOTAL_SHADERS];
char *shaderNames[TOTAL_SHADERS] = {"clamped", "trivial", "fancy"};
int currentShader = TRIVIAL;

GLint textureWidth, textureHeight;  // texture size
GLint maxTexSize;

GLint mainMenu;                     // menu handles
GLint shaderMenu;
GLint textureMenu;

#define MAX_INFO_LOG_SIZE 2048

// Load shader from disk into a null-terminated string
GLchar *LoadShaderText(const char *fileName)
{
    GLchar *shaderText = NULL;
    GLint shaderLength = 0;
    FILE *fp;

    fp = fopen(fileName, "r");
    if (fp != NULL)
    {
        while (fgetc(fp) != EOF)
        {
            shaderLength++;
        }
        rewind(fp);
        shaderText = (GLchar *)malloc(shaderLength+1);
        if (shaderText != NULL)
        {
            fread(shaderText, 1, shaderLength, fp);
        }
        shaderText[shaderLength] = '\0';
        fclose(fp);
    }

    return shaderText;
}

// Compile shaders
void PrepareShader(GLint shaderNum)
{
    char fullFileName[255];
    GLchar *fsString;
    const GLchar *fsStringPtr[1];
    GLint success;

    // Create shader objects and specify shader text
    sprintf(fullFileName, ".\\shaders\\%s.fs", shaderNames[shaderNum]);
    fsString = LoadShaderText(fullFileName);
    if (!fsString)
    {
        fprintf(stderr, "Unable to load \"%s\"\n", fullFileName);
        Sleep(5000);
        exit(0);
    }
    fShader[shaderNum] = glCreateShader(GL_FRAGMENT_SHADER);
    fsStringPtr[0] = fsString;
    glShaderSource(fShader[shaderNum], 1, fsStringPtr, NULL);
    free(fsString);

    // Compile shaders and check for any errors
    glCompileShader(fShader[shaderNum]);
    glGetShaderiv(fShader[shaderNum], GL_COMPILE_STATUS, &success);
    if (!success)
    {
        GLchar infoLog[MAX_INFO_LOG_SIZE];
        glGetShaderInfoLog(fShader[shaderNum], MAX_INFO_LOG_SIZE, NULL, infoLog);
        fprintf(stderr, "Error in fragment shader #%d compilation!\n", shaderNum);
        fprintf(stderr, "Info log: %s\n", infoLog);
        Sleep(10000);
        exit(0);
    } else
    {
        GLchar infoLog[MAX_INFO_LOG_SIZE];
        glGetShaderInfoLog(fShader[shaderNum], MAX_INFO_LOG_SIZE, NULL, infoLog);
        //fprintf(stderr, "Fragment shader #%d compile info log: %s\n", shaderNum, infoLog);
    }

    // Create program object, attach shader, then link
    progObj[shaderNum] = glCreateProgram();
    glAttachShader(progObj[shaderNum], fShader[shaderNum]);

    glLinkProgram(progObj[shaderNum]);
    glGetProgramiv(progObj[shaderNum], GL_LINK_STATUS, &success);
    if (!success)
    {
        GLchar infoLog[MAX_INFO_LOG_SIZE];
        glGetProgramInfoLog(progObj[shaderNum], MAX_INFO_LOG_SIZE, NULL, infoLog);
        fprintf(stderr, "Error in program #%d linkage!\n", shaderNum);
        fprintf(stderr, "Info log: %s\n", infoLog);
        Sleep(10000);
        exit(0);
    }
    else
    {
        GLchar infoLog[MAX_INFO_LOG_SIZE];
        glGetProgramInfoLog(progObj[shaderNum], MAX_INFO_LOG_SIZE, NULL, infoLog);
        //fprintf(stderr, "Program #%d link info log: %s\n", shaderNum, infoLog);
    }

    // Program object has changed, so we should revalidate
    needsValidation[shaderNum] = GL_TRUE;
}

// Called to draw scene
void RenderScene(void)
{
    // Clear the window with current clearing color
    glClear(GL_COLOR_BUFFER_BIT);

    glUseProgram(progObj[currentShader]);

    if (currentShader == FANCY)
    {
        // rough simulation of an iris:
        // find brightest spot in neighborhood (25x25)
        // and map that to 1.0 in shader

        GLfloat maxR = 0.0f;
        GLfloat maxG = 0.0f;
        GLfloat maxB = 0.0f;

        GLfloat *ptr;

        // map cursor location [-1,1] to texel address [0,u/v]
        GLint centerU = (GLint)(((fCursorX + 1.0f) * 0.5f) * (GLfloat)textureWidth);
        GLint centerV = (GLint)(((fCursorY + 1.0f) * 0.5f) * (GLfloat)textureHeight);

        for (int v = centerV - 12; v <= centerV + 12; v++)
        {
            for (int u = centerU - 12; u <= centerU + 12; u++)
            {
                // check for neighborhoods that fall off the texture
                if ((u < 0) || (u >= textureWidth) ||
                    (v < 0) || (v >= textureHeight))
                    continue;

                ptr = fTexels + ((v * textureWidth + u) * 3);

                maxR = (ptr[0] > maxR) ? ptr[0] : maxR;
                maxG = (ptr[1] > maxG) ? ptr[1] : maxG;
                maxB = (ptr[2] > maxB) ? ptr[2] : maxB;
            }
        }

        GLint uniformLoc = glGetUniformLocation(progObj[currentShader], "max");
        if (uniformLoc != -1)
        {
            glUniform3f(uniformLoc, maxR, maxG, maxB);
        }
    }

    // Draw objects in the scene
    glBegin(GL_QUADS);
        glTexCoord2f(0.0f, 0.0f);
        glVertex2f(-1.0f, -1.0f);
        glTexCoord2f(0.0f, 1.0f);
        glVertex2f(-1.0f, 1.0f);
        glTexCoord2f(1.0f, 1.0f);
        glVertex2f(1.0f, 1.0f);
        glTexCoord2f(1.0f, 0.0f);
        glVertex2f(1.0f, -1.0f);
    glEnd();

    glUseProgram(0);

    // Show cursor
    glColor4f(1.0f, 0.0f, 0.0f, 1.0f);
    glBegin(GL_POINTS);
        glVertex2f(fCursorX, fCursorY);
    glEnd();

    if (glGetError() != GL_NO_ERROR)
        fprintf(stderr, "GL Error!\n");

    // Flush drawing commands
    glutSwapBuffers();
}

using namespace Imf;
using namespace Imath;

void SetupTextures(int whichEXR)
{
    Array2D<Rgba> pixels;
    char name[256];

    switch (whichEXR)
    {
    case 0:
        strcpy(name, "openexr-images/GoldenGate.exr");
        break;
    case 1:
        strcpy(name, "openexr-images/Spirals.exr");
        break;
    case 2:
        strcpy(name, "openexr-images/Ocean.exr");
        break;
    }
    RgbaInputFile file(name);
    Box2i dw = file.dataWindow();

    textureWidth = dw.max.x - dw.min.x + 1;
    textureHeight = dw.max.y - dw.min.y + 1;
    pixels.resizeErase(textureHeight, textureWidth);

    if ((textureWidth > maxTexSize) || (textureHeight > maxTexSize))
    {
        fprintf(stderr, "Texture is too big!\n");
        Sleep(2000);
        exit(0);
    }

    file.setFrameBuffer(&pixels[0][0] - dw.min.x - dw.min.y * textureWidth, 1, textureWidth);
    file.readPixels(dw.min.y, dw.max.y);

    // Stick the texels into a GL formatted buffer
    if (fTexels)
        free(fTexels);
    fTexels = (GLfloat*)malloc(textureWidth * textureHeight * 3 * sizeof(GLfloat));
    GLfloat *ptr = fTexels;
    for (int v = textureHeight-1; v >= 0; v--)
    {
        for (int u = 0; u < textureWidth; u++)
        {
            Rgba texel = pixels[v][u];
            ptr[0] = texel.r;
            ptr[1] = texel.g;
            ptr[2] = texel.b;
            ptr += 3;
        }
    }

    glTexParameteri(GL_TEXTURE_2D, GL_GENERATE_MIPMAP, 1);
    glTexImage2D(GL_TEXTURE_2D, 0, GL_RGB16F_ARB, textureWidth, textureHeight, 0, GL_RGB, GL_FLOAT, fTexels);
    glTexParameteri(GL_TEXTURE_2D, GL_TEXTURE_MAG_FILTER, GL_LINEAR);
    glTexParameteri(GL_TEXTURE_2D, GL_TEXTURE_MIN_FILTER, GL_LINEAR_MIPMAP_LINEAR);
    glTexParameteri(GL_TEXTURE_2D, GL_TEXTURE_WRAP_S, GL_CLAMP_TO_EDGE);
    glTexParameteri(GL_TEXTURE_2D, GL_TEXTURE_WRAP_T, GL_CLAMP_TO_EDGE);
}

void SetupShaders(void)
{
    // we'll leave fixed functionality vertex shading in place,
    // but we'll swap between two fragment shaders

    // Load and compile shaders
    for (int i = 0; i < TOTAL_SHADERS; i++)
    {
        PrepareShader(i);
        glUseProgram(progObj[i]);

        // set sampler
        GLint uniformLoc = glGetUniformLocation(progObj[i], "sampler0");
        if (uniformLoc != -1)
        {
            glUniform1i(uniformLoc, 0);
        }
    }

    glUseProgram(0);
}

// This function does any needed initialization on the rendering
// context. 
void SetupRC()
{
//    fprintf(stdout, "Floating-Point Texture Demo\n\n");

    // Make sure required functionality is available!
    if (!GLEE_ARB_texture_float)
    {
        fprintf(stderr, "GL_ARB_texture_float extension is not available!\n");
        Sleep(2000);
        exit(0);
    }

    // Check for minimum resources
    glGetIntegerv(GL_MAX_TEXTURE_SIZE, &maxTexSize);

//    fprintf(stdout, "Controls:\n");
//    fprintf(stdout, "\tRight-click for menu\n\n");
//    fprintf(stdout, "\tc\t\tClamped (no tone mapping)\n\n");
//    fprintf(stdout, "\tt\t\tTrivial tone mapping\n\n");
//    fprintf(stdout, "\tf\t\tFancy tone mapping\n\n");
//    fprintf(stdout, "\tq\t\tExit demo\n\n");
    
    // Clear color
    glClearColor(0.0f, 0.0f, 0.0f, 1.0f );

    // Point size for cursor
    glPointSize(10.0f);

    // Set up textures & shaders
    SetupTextures(0);
    SetupShaders();
}

void ProcessMenu(int value)
{
    switch(value)
    {
    case 1:
        currentShader = CLAMPED;
        break;

    case 2:
        currentShader = TRIVIAL;
        break;

    case 3:
        currentShader = FANCY;
        break;

    case 4:
        SetupTextures(value - 4);
        break;

    case 5:
        SetupTextures(value - 4);
        break;

    case 6:
        SetupTextures(value - 4);
        break;

    default:
        assert(0);
        break;
    }

    // Refresh the Window
    glutPostRedisplay();
}

void KeyPressFunc(unsigned char key, int x, int y)
{
    switch (key)
    {
    case 'c':
    case 'C':
        currentShader = CLAMPED;
        break;
    case 'f':
    case 'F':
        currentShader = FANCY;
        break;
    case 't':
    case 'T':
        currentShader = TRIVIAL;
        break;
    case 'q':
    case 'Q':
    case 27 : /* ESC */
        exit(0);
    }

    // Refresh the Window
    glutPostRedisplay();
}

void ChangeSize(int w, int h)
{
    windowWidth = w;
    windowHeight = h;

    glViewport(0, 0, w, h);
}

void MouseMotion(int x, int y)
{
    iCursorX = x;
    iCursorY = y;

    // first map/clamp to [0,1]
    fCursorX = (GLfloat)x / (GLfloat)(windowWidth-1);
    fCursorY = (GLfloat)y / (GLfloat)(windowHeight-1);
    fCursorX = (fCursorX > 1.0f) ? 1.0f : fCursorX;
    fCursorY = (fCursorY > 1.0f) ? 1.0f : fCursorY;
    fCursorX = (fCursorX < 0.0f) ? 0.0f : fCursorX;
    fCursorY = (fCursorY < 0.0f) ? 0.0f : fCursorY;

    // now map to [-1,1]
    fCursorX = 2.0f * (fCursorX - 0.5f);
    fCursorY = 2.0f * (fCursorY - 0.5f);

    // finally, Y is inverted
    fCursorY *= -1.0f;

    // Refresh the Window
    glutPostRedisplay();
}

void SpecialKeys(int key, int x, int y)
{
    // note that we're using top left origin for the integer cursor,
    // as this is compatible with the input from MouseMotion

    switch (key)
    {
    case GLUT_KEY_UP:
        iCursorY--;
        iCursorY = (iCursorY < 0) ? 0 : iCursorY;
        break;
    case GLUT_KEY_RIGHT:
        iCursorX++;
        iCursorX = (iCursorX >= windowWidth) ? (windowWidth-1) : iCursorX;
        break;
    case GLUT_KEY_DOWN:
        iCursorY++;
        iCursorY = (iCursorY >= windowHeight) ? (windowHeight-1) : iCursorY;
        break;
    case GLUT_KEY_LEFT:
        iCursorX--;
        iCursorX = (iCursorX < 0) ? 0 : iCursorX;
        break;
    default:
        break;
    }

    MouseMotion(iCursorX, iCursorY);
}

int main(int argc, char* argv[])
{
    glutInit(&argc, argv);
    glutInitDisplayMode(GLUT_DOUBLE | GLUT_RGB | GLUT_DEPTH);
    glutInitWindowSize(windowWidth, windowHeight);
    glutCreateWindow("Floating-Point Texture Demo");
    glutReshapeFunc(ChangeSize);
    glutKeyboardFunc(KeyPressFunc);
    glutSpecialFunc(SpecialKeys);
    glutDisplayFunc(RenderScene);
    glutMotionFunc(MouseMotion);

    SetupRC();

    // Create the menus
    shaderMenu = glutCreateMenu(ProcessMenu);
    glutAddMenuEntry("CLAMPED", 1);
    glutAddMenuEntry("TRIVIAL", 2);
    glutAddMenuEntry("FANCY", 3);

    textureMenu = glutCreateMenu(ProcessMenu);
    glutAddMenuEntry("GoldenGate.exr", 4);
    glutAddMenuEntry("Spirals.exr", 5);
    glutAddMenuEntry("Ocean.exr", 6);

    mainMenu = glutCreateMenu(ProcessMenu);
    glutAddSubMenu("Choose tone mapping", shaderMenu);
    glutAddSubMenu("Choose image", textureMenu);
    glutAttachMenu(GLUT_RIGHT_BUTTON);

    glutMainLoop();

    free(fTexels);

    return 0;
}
