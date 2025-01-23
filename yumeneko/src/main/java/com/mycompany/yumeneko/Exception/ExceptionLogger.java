/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.yumeneko.Exception;

/**
 *
 * @author devil
 */
import com.mycompany.yumeneko.Config.JWT;

public class ExceptionLogger {
    private Class actualClass;
    
    public ExceptionLogger(Class actualClass){
        this.actualClass=actualClass;
    }
    
    /**
     * User this for JWT class
     */
    public void errorLog(Exception ex){
        StackTraceElement[] stackTraceElements = ex.getStackTrace();
        if(stackTraceElements.length>0){
            StackTraceElement element = stackTraceElements[0];
            for(StackTraceElement actualElement : stackTraceElements){
                if(actualElement.getClassName().contains(this.actualClass.getName())){
                    element = actualElement;
                    break;
                }
            }
            System.err.println(
            "\n---------------------------------Exception---------------------------------\n"
            +"\nStatus: JWT class exception"
            +"\nStatus Code:500"
            +"\nExeption message:"+ex.getMessage()
            +"\nException Class:"+ex.getClass().getName()
            +"\nFile:"+element.getFileName()
            +"\nFunction:"+element.getMethodName()+"()"
            +"\nLine:"+element.getLineNumber()
            +"\nClass loader name:"+element.getClassLoaderName()
            +"\nClass name:" +element.getClassName()
            +"\nModule name:"+element.getModuleName()
            +"\nVersion name" +element.getModuleVersion()
            +"\n---------------------------------Exception---------------------------------\n"

                    
            );
            
            
        }
    }
}
