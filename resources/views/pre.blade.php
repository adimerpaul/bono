
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--                                         -->
<!--     LANSA for the Web                   -->
<!--     Default Layout                      -->
<!--     Last Modified:  9.1  2001-11-14     -->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>CERTIFICADO NEGATIVO DE ASEGURADO</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <!--                                         -->
    <!--     LANSA for the Web                   -->
    <!--     Default Style                       -->
    <!--     Last Modified: 10.0  2002-05-29     -->

    <style type="text/css">
        body
        {
            margin:5px auto;
            font-size:9pt;
            width:100%;
            background: rgb(229, 238, 247);
        }
        .full {
            display:block;
            vertical-align:middle;
            text-align: center;
            background-color: rgba(0,0,0,0.5);
            width: 100%; height: 100%;
            z-index: 7000;
            filter: alpha(opacity=50);
            position: absolute;
            top: 0px;
            left: 0px;
            bottom: 0px;
            right: 0px;

        }
        .full1 {

            position:absolute;
            top:50%;
            height:50%;
            left:50%;
            width:150px;
            margin-left:-75px;
            margin-top:-75px;
            text-align:center;

        }
        .titulo {
            font-size: 72px;

            background: -webkit-gradient(linear, left top, left bottom, from(blue), to(#eee));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent; }
        .img1:hover
        {
            width:51px;
            height:51px;
        }

        .accessible {
            position: absolute;
            width: 1px !important;
            height: 1px !important;
            overflow: hidden;
            text-indent: -9000em !important;
            z-index: -1;
            left: -9000em !important;
        }
        .contenedor
        {
            width:99%;
            border:1px solid black;
            margin:0px auto;
            -webkit-border-radius: 10px 10px;
            -moz-border-radius: 10px 10px;
            -moz-box-shadow: 5px 10px 20px #829C9E;
            box-shadow: 5px 10px 20px #829C9E;
            background: rgb(229, 238, 247);
            border-radius:  10px 10PX ;
            behavior: url(/images/AFP/PIE.htc);
        }
        .banner
        {
            width:100%;
            height: 80px;
            padding: 2px 0px;
            background: rgb(255, 253, 253);
            -webkit-border-radius: 10px 10px;
            -moz-border-radius: 10px 10px;
            -moz-box-shadow: 5px 10px 20px #829C9E;
            border-radius:  10px 10PX;
            behavior: url(/images/AFP/PIE.htc);
        }
        .cabecera
        {
            height:40px;
            width:100%;
            text-align: center;
            background: rgb(70,118,171);
            background: -moz-linear-gradient( #27DF53);
            background: -webkit-gradient(linear,left bottom,left top,color-stop(0,  #1C23D6),color-stop(1, #0E83F0));
            background: -webkit-linear-gradient(#1C23D6, #0E83F0);
            background: -o-linear-gradient(#1C23D6, #0E83F0);
            background: -ms-linear-gradient(#1C23D6, #0E83F0);
            background: linear-gradient#1C23D6, #0E83F0);
            -moz-border-radius: 10px 10PX 0PX 0PX;
            border-radius:  10px 10PX 0PX 0PX;
            -moz-box-shadow: 0 2px 1px #9c9c9c;
            -webkit-box-shadow: 0 2px 1px #9c9c9c;
            box-shadow: 0 2px 1px #9c9c9c;
            -pie-background: linear-gradient(#1C23D6, #0E83F0);
            behavior: url(/images/AFP/PIE.htc);
        }
        .centro
        {

            width: 100%;
        //height: 550px;
            overflow: auto;
            -webkit-border-radius: 10px 10px;
            -moz-border-radius: 10px 10px;
            -moz-box-shadow: 10px 10px 20px #829C9E;
            background: rgb(229, 238, 247);
            border-radius:  10px 10PX;

            behavior: url(/images/AFP/PIE.htc);
        }
        .cuerpo
        {

            background: rgb(229, 238, 247);
            width:100%;
            -webkit-border-radius: 10px 10px;
            -moz-border-radius: 10px 10px;
            -moz-box-shadow: 10px 10px 20px #829C9E;
            border-radius:  10px 10PX;
            behavior: url(/images/AFP/PIE.htc);
            margin:3px auto;
            padding:0pX;
        }

        .menuV
        {

            text-align: left;
            width:100px;
            --border: 1px solid red;

            -webkit-border-radius: 10px 10px;
            -moz-border-radius: 10px 10px;
            -moz-box-shadow: 10px 10px 20px #829C9E;
            background-color: rgb(229, 238, 239);
            background: rgb(70,118,171);
            background: -moz-linear-gradient( #27DF53);
            background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #1C23D6),color-stop(1,#0E83F0));
            background: -webkit-linear-gradient(#1C23D6, #0E83F0);
            background: -o-linear-gradient(#1C23D6, #0E83F0);
            background: -ms-linear-gradient(#1C23D6, #0E83F0);
            background: linear-gradient(#1C23D6, #0E83F0);
            -moz-border-radius: 10px 10PX 0PX 0PX;
            -moz-box-shadow: 0 2px 1px #9c9c9c;
            -webkit-box-shadow: 0 2px 1px #9c9c9c;
            box-shadow: 0 2px 1px #9c9c9c;
            border-radius:  10px 10PX;

            -pie-background: linear-gradient(#1C23D6, #0E83F0);

            behavior: url(/images/AFP/PIE.htc);
        }



        .pie{

            --text-align:center;
            height:30px;
            color:white;
            font-size:7pt;
            --border: 1px solid rgb(70,118,171);
            background-color: rgb(78,128,192);
            border-radius:  10px 10PX;
            -webkit-border-radius: 5px 10px;
            -moz-border-radius: 5px 10px;
            -moz-box-shadow: 5px 10px 20px #829C9E;

            behavior: url(/images/AFP/PIE.htc);
        }

        /**/
        .menu
        {
            text-align:left;
            height:20px;
            margin: 0;
            padding: 5px 0 0 0;
            padding-left: 100px;
            list-style: none;
            background: rgb(70,118,171);
            background: -moz-linear-gradient( rgb(70,118,171));
            background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #1C23D6),color-stop(1,#0E83F0));
            background: -webkit-linear-gradient(#1C23D6, #0E83F0);
            background: -o-linear-gradient(#1C23D6, #0E83F0);
            background: -ms-linear-gradient(#1C23D6, #0E83F0);
            background: linear-gradient( #1C23D6, #0E83F0 );
            -moz-border-radius: 10px 10PX 10PX 10PX;
            border-radius:  10px 10PX 10PX 10PX;
            -moz-box-shadow: 0 2px 1px #9c9c9c;
            -webkit-box-shadow: 0 2px 1px #9c9c9c;
            box-shadow: 0 2px 1px #9c9c9c;
            -pie-background: linear-gradient(#1C23D6, #0E83F0);
            behavior: url(/images/AFP/PIE.htc);
        }

        #menuR
        {
            float:right;
            text-align:left;
            margin: 0;
            padding: 5px 10px 0 0;
            list-style: none;
        }
        #menuR li
        {
            float: left;
            padding: 0 0 5px 0;
            position: relative;
            line-height: 0;
        }

        #menuR a
        {
            float: left;
            height: 15px;
            padding: 0 10px;
            color: #FFF;
            text-transform: uppercase;
            font: bold 9px/10px Arial, Helvetica;
            text-decoration: none;
            text-shadow: 0 1px 0 #000;
        }

        #menuR li:hover > a
        {
            color: #fafafa;
            color:blue;
        }
        #menu
        {
            float:left;
            text-align:left;
            margin: 0;
            padding: 5px 0 0 0;
            list-style: none;
        }
        #menu li
        {
            float: left;
            padding: 0 0 5px 0;
            position: relative;
            line-height: 0;
        }

        #menu a
        {
            float: left;
            height: 15px;
            padding: 0 10px;
            color: #FFF;
            text-transform: uppercase;
            font: bold 9px/10px Arial, Helvetica;
            text-decoration: none;
            text-shadow: 0 1px 0 #000;
        }

        #menu li:hover > a
        {
            color: #fafafa;
            color:blue;
        }

        *html #menu li a:hover /* IE6 */
        {
            color: #fafafa;
        }

        #menu li:hover > ul
        {
            display: block;
        }

        /* Sub-menu */

        #menu ul
        {
            list-style: none;
            margin: 0;
            padding: 0;
            display: none;
            position: absolute;
            top: 17px;
            left: 0;
            z-index: 99999;
            background: #444;
            background: -moz-linear-gradient(#1C23D6, #0E83F0);
            background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #1C23D6),color-stop(1, #0E83F0));
            background: -webkit-linear-gradient(#1C23D6, #0E83F0);
            background: -o-linear-gradient(#1C23D6, #0E83F0);
            background: -ms-linear-gradient(#1C23D6, #0E83F0);
            background: linear-gradient(#1C23D6, #0E83F0);
            -moz-box-shadow: 0 0 2px rgba(255,255,255,.5);
            -webkit-box-shadow: 0 0 2px rgba(255,255,255,.5);
            box-shadow: 0 0 2px rgba(255,255,255,.5);
            -moz-border-radius: 5px;
            border-radius: 5px;
            -pie-background: linear-gradient(#1C23D6, #0E83F0);
            behavior: url(/images/AFP/PIE.htc);
        }

        #menu ul ul
        {
            top: 0;
            left: 150px;
        }

        #menu ul li
        {
            float: none;
            margin: 0;
            padding: 0;
            display: block;
            -moz-box-shadow: 0 1px 0 #27DF53111, 0 2px 0 #777777;
            -webkit-box-shadow: 0 1px 0 #27DF53111, 0 2px 0 #777777;
            box-shadow: 0 1px 0 #27DF53111, 0 2px 0 #777777;

            behavior: url(/images/AFP/PIE.htc);
        }

        #menu ul li:last-child
        {
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;

            behavior: url(/images/AFP/PIE.htc);
        }

        #menu ul a
        {
            padding: 10px;
            height: 10px;
            width: 130px;
            height: auto;
            line-height: 1;
            display: block;
            white-space: pre-wrap;
            float: none;
            text-transform: none;
        }

        *html #menu ul a /* IE6 */
        {
            height: 10px;
        }

        *:first-child+html #menu ul a /* IE7 */
        {
            height: 10px;
        }

        #menu ul a:hover
        {
            background: #0186ba;
            background: -moz-linear-gradient(#04acec,  #0186ba);
            background: -webkit-gradient(linear, left top, left bottom, from(#04acec), to(#0186ba));
            background: -webkit-linear-gradient(#04acec,  #0186ba);
            background: -o-linear-gradient(#04acec,  #0186ba);
            background: -ms-linear-gradient(#04acec,  #0186ba);
            background: linear-gradient(#04acec,  #0186ba);
            -pie-background: linear-gradient(#0B27CB, #5AB0F2);
            behavior: url(/images/AFP/PIE.htc);
            white-space: pre-wrap;
        }

        #menu ul li:first-child > a
        {
            -moz-border-radius: 5px 5px 0 0;
            border-radius: 5px 5px 0 0;
        }

        #menu ul li:first-child > a:after
        {
            content: '';
            position: absolute;
            left: 30px;
            top: -8px;
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 8px solid #444;
        }

        #menu ul ul li:first-child a:after
        {
            left: -8px;
            top: 12px;
            width: 0;
            height: 0;
            border-left: 0;
            border-bottom: 5px solid transparent;
            border-top: 5px solid transparent;
            border-right: 8px solid #444;
        }

        #menu ul li:first-child a:hover:after
        {
            border-bottom-color: #04acec;
        }

        #menu ul ul li:first-child a:hover:after
        {
            border-right-color: #04acec;
            border-bottom-color: transparent;
        }


        #menu ul li:last-child > a
        {
            -moz-border-radius: 0 0 5px 5px;
            border-radius: 0 0 5px 5px;

            behavior: url(/images/AFP/PIE.htc);
        }

        /* Clear floated elements */
        #menu:after
        {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }

        * html #menu             { zoom: 1; } /* IE6 */
        *:first-child+html #menu { zoom: 1; } /* IE7 */

        .table
        {
            padding: 15px;
            line-height: 2;
            width:80%;
            text-align: left;
            border: 1px solid black;
            margin: 0px auto;
            -webkit-border-radius: 10px 10px;
            -moz-border-radius: 10px 10px;
            -moz-box-shadow: 5px 10px 20px #829C9E;
            box-shadow: 5px 10px 20px #829C9E;
            background: rgb(143, 148, 150);
            border: 5px solid cadetblue;
            border-radius: 10px 10PX;
            background: linear-gradient(#F8F0F0, rgb(143, 148, 150));
            -pie-background: linear-gradient(#F8F0F0, rgb(143, 148, 150));
            behavior: url(/images/AFP/PIE.htc);
        }
        .table input
        {
            -webkit-border-radius: 5px 5px;
            -moz-border-radius: 5px 5px;
            -moz-box-shadow: 5px 10px 20px #829C9E;
            box-shadow: 5px 10px 20px #829C9E;
            /*background: rgb(143, 148, 150); */
            border-radius: 5px 5PX;

            behavior: url(/images/AFP/PIE.htc);
        }
        .table input[type="submit"]
        {
            font-weight: bold;
            padding: 5px;
        }
        .table input[type="submit"]:hover
        {
            color: #91C9C4;
            font-weight: bold;
            padding: 5px;
        }
        .table table > tbody > tr > th > select {
            color: red;
            width:100%;
        }
        .table table
        {
            width:100% !important;
        }

        .menuVC
        {
            color:white;
            WIDTH:100%;
            font-size:20pt;
            border: 0px solid rgb(70,118,171);
            text-align:center;
            border-bottom-width: 1px;

            border-bottom-color:rgb(97,103,112);
            background:transparent;
            margin:0px;
        }
        #menuVCID
        {
            padding: 0px;
            -moz-border-radius: 0px 0PX 10PX 10PX;
            border-radius:  0px 0PX 10PX 10PX;
            -moz-box-shadow: 0 2px 1px #9c9c9c;
            -webkit-box-shadow: 0 2px 1px #9c9c9c;
            box-shadow: 0 2px 1px #9c9c9c;
            list-style-type: none;
            list-style-image: none;
            text-align: left;
            WIDTH:100%;


            -webkit-border-radius: 0px 0px 10px 10px;
            border-radius:  0px 0px 10px 10px;
            margin-top: 0;
        }
        .menuV li
        {
            display: block;
            border-bottom: 1px solid rgb(97, 103, 112);
            border-radius: 0px 0PX 10PX 5PX;
            /* margin: 10px; */

            padding: 10px;
        }
        .menuV li:hover
        {
            background: #04acec;
            background: linear-gradient(#1C23D6, #0E83F0);
            border-bottom: 1px solid rgb(97, 103, 112);
            border-radius: 0px 0PX 10PX 5PX;

        }
        .menuV li:hover >a
        {
            color: blue;
        }
        .menuV li a
        {
            text-decoration: initial;
            text-decoration: none;
            font-size: 11pt;
            /* color: rgb(248, 248, 248); */
            color: #fafafa;
        }
        .menuV ul li:first-child > a:after
        {
            left: -8px;
            top: 12px;
            width: 0;
            height: 0;
            border-left: 0;
            border-bottom: 5px solid transparent;
            border-top: 5px solid transparent;
            border-right: 8px solid #444;
        }

        .AII-FCI-body{
            width:650px;
            margin: 0 auto;
            height:430px;
        }

        .input{
            margin-left: 20px;
            width: 70%
        }

        .table tbody{
            padding: 10px;
        }

        .label{
            width:40%;
        }

        .ofijub-mainbox{
            width: 80%;
            margin: 0 auto;
        }

        .autoNumber1{
            width:52%;
            height: 72px;
        }

        @media (min-width: 900px) {
            .FCI-column {
                float: left;
                width: 43%;
            }
        }
    </style>
    <!--                                         -->
    <!--     LANSA for the Web                   -->
    <!--     Default Scripts                     -->
    <!--     Last Modified: 11.0  2005-03-15     -->

    <script type="text/javascript" language="javascript">
        //<![CDATA[


        function SetSelect(HTMLName, Name,Row,Column,Select)
        {
            document.LANSA._SELECT.value=Select;
            SetNameLocation(Name,Row,Column);
            document.LANSA._CALFLD.value=HTMLName;
        }
        function SetNameLocation(Name,Row,Column)
        {
            document.LANSA._NAME.value=Name;
            document.LANSA._ROW.value=Row;
            document.LANSA._COLUMN.value=Column;
            document.LANSA._CALFLD.value=Name;
        }

        function HandleEvent(Proc,Func)
        {



            document.LANSA._PROCESS.value=Proc;
            document.LANSA._FUNCTION.value=Func;
            document.LANSA.submit();
        }


        function SetFocus()
        {
            var NumElements=document.LANSA.elements.length;

            for (i=0; i<NumElements;i++)
            {
                if (document.LANSA.elements[i].type=="checkbox" ||
                    document.LANSA.elements[i].type=="password" ||
                    document.LANSA.elements[i].type=="radio" ||
                    document.LANSA.elements[i].type=="text" ||
                    document.LANSA.elements[i].type=="textarea")
                {
                    if (document.LANSA.elements[i].value!="")
                        document.LANSA.elements[i].select();
                    document.LANSA.elements[i].focus();
                    break;
                }
            }
        }
        function preload(imgObj,imgSrc)
        {
            if (document.images)
            {
                eval(imgObj+' = new Image()');
                eval(imgObj+'.src = "'+imgSrc+'"');
            }
        }
        function changeImage(layer,imgObj, imgName)
        {
            if (document.images)
            {
                if (document.layers && layer!=null)
                    eval('document.'+layer+'.document.images["'+imgName+'"].src = '+imgObj+'.src');
                else
                    document.images[imgName].src = eval(imgObj+".src");
            }
        }
        function CheckNUpdate(Fld, Value)
        {
            var NumElements=document.LANSA.elements.length;

            for (i=0; i<NumElements;i++)
            {
                if (document.LANSA.elements[i].name==Fld)
                {
                    document.LANSA.elements[i].value=Value;
                    break;
                }
            }
        }
        function FieldExists(Fld)
        {
            var NumElements=document.LANSA.elements.length;

            for (i=0; i<NumElements;i++)
            {
                if (document.LANSA.elements[i].name==Fld)
                    return true;
            }
            return false;
        }
        function SetState(obj, RFld, chkValue, unchkValue)
        {
            var NumElements=document.LANSA.elements.length;

            for (i=0; i<NumElements;i++)
            {
                if (document.LANSA.elements[i].name==RFld)
                {
                    if (obj.checked)
                        document.LANSA.elements[i].value=chkValue;
                    else
                        document.LANSA.elements[i].value=unchkValue;
                    break;
                }
            }
        }
        function GetFieldValue(RFld)
        {
            var NumElements=document.LANSA.elements.length;

            for (i=0; i<NumElements;i++)
            {
                if (document.LANSA.elements[i].name==RFld)
                    return document.LANSA.elements[i].value;
            }
            return null;
        }
        function CallLink(Process, Function, Partition, NewWindow)
        {
            var URL="/CGI-BIN/LANSAWEB?PROCFUN+";

            URL+=Process;
            URL+="+";
            URL+=Function;
            URL+="+";
            URL+=Partition;



            if (FieldExists('ASTDTABFLR'))
            {
                URL+="+FUNCPARMS+STDTABFLR(A004):";
                URL+=document.LANSA.ASTDTABFLR.value;
            }

            if (NewWindow == 'N')
                window.location=URL;
            else
                StartFunction(URL);
        }

        function SetCBState(obj, RFld, CY, CN)
        {
            var NumElements=document.LANSA.elements.length;

            for (i=0; i<NumElements;i++)
            {
                if (document.LANSA.elements[i].name==RFld)
                {
                    if (obj.checked)
                        document.LANSA.elements[i].value=CY;
                    else
                        document.LANSA.elements[i].value=CN;
                    break;
                }
            }
        }
        function StartFunction(URL)
        {
            var win;
            win=window.open("","TESTFNC");
            if (win != null)
                win.location=URL;
            win.focus();
        }
        function ECSelect(proc,fun,ECparm)
        {
            document.LANSA.action += '+FUNCPARMS+ECPARM(A0500):' + ECparm;
            HandleEvent(proc, fun);
        }
        //]]>




        function setCookie(cname,cvalue,exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname+"="+cvalue+"; "+expires;
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        function HandleEventIr(Proc,Func,opcion)
        {
            /*var objEsp = $("#espera");
            if(objEsp)
            {
             objEsp.show();
            }*/
            document.LANSA.elements["AREENTRY  "].value=opcion;
            HandleEvent(Proc,Func);
        }

        function HandleEventIrMenu(Proc,Func,opcion,idM)
        {
            var objEsp = $("#espera");
            if(objEsp)
            {
                objEsp.show();
            }
            document.LANSA.elements["AREENTRY  "].value=opcion;
            document.LANSA.elements["PWITIDI   "].value=idM;
            HandleEvent(Proc,Func);
        }


        function NoAtras()
        {
//history.go(1);
//alert('No utilize el botón atrás puede generar error en los datos, use las opciones del menú.');
        }

        function HandleEventPDF(Proc, Func, archivo)
        {
            var direccion;
            direccion = "https://online.prevision.com.bo/temp/" + archivo;
            //   direccion = "http://165.1.10.101:2005/temp/" + archivo;
            window.open(direccion, '' , 'fullscreen=no, scrollbars=yes, location = no, width=1018px, height=740px, top=0px, left=0px');
            return;
        }


    </script>
</head>

<body bgcolor="white" background="/images/backgrd.gif">
<!-- Process  : SERVEXT    SERVICIOS EXTERNOS                      -->
<!-- Function : CERNASE    CERTIFICADO NEGATIVO DE ASEGURADO       -->
<!-- Page     : 001                                                -->

<!-- Generated by    - LANSA                                       -->
<!-- Created by user - SPADILLA                                    -->
<!-- Time and Date   - 20150925110701                              -->

<!-- RDML function sequence number - 0049                          -->

<!-- This is a *WEBEVENT function                                  -->

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://online.prevision.com.bo/images/SucResp/MenuPrevStyle.css" />
<script src="https://online.prevision.com.bo/images/jquery/SoloLetraNumero.js"></script>

<style type="text/css">
    .control-Ndoc{
        width: 55%;
        margin-right: 10px;
    }

    #msg1 {
        /*background: rgb(221, 221, 221);*/
        font-size: 9pt;
        border-radius: 2px;
        border: 1px solid grey;
        border-style: none;
        padding: 5px;
        width: 436px;
    }
    #msg1 ul{
        padding: 0px;
        padding-left: 10px;
        text-align:left;
        font-size:13px !important;
        font-weight: normal !important;
    }
    #msg1 ul li{
        color: red;
    }

</style>


<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
<script type="text/javascript">
    var byId = function(s) {return document.getElementById(s);};
    $(function(){
        mostrarMesnajeSistema();
        //Para escribir solo letras
        $('#idComp').validCampo(' abcdefghijklmnñopqrstuvwxyzáéiou0123456789');


        //Para escribir solo numeros
        $('#ident').validCampo('0123456789');

        $('#idComp').keyup(function () {
            var valor = $(this).val();
            if (!(valor ==''))
            {
                if ($(this).val().match(/^([0-9]{2}|[1-9]{1}[A-Z Ñ]{1})$/)) {
                    //alert("Correcto");
                    byId('compl').innerHTML ="<ul><li>Alfanumérico del CI es Correcto.</li></ul>";
                    $("#USER1").prop('disabled', false);
                }
                else {
                    //alert("Incorrecto");

                    byId('compl').innerHTML ="<ul><li>Error : Alfanumérico del CI es Incorrecto.</li></ul>";
                    $("#USER1").prop('disabled', true);
                }
            }
            else
            {
                $("#USER1").prop('disabled', false);
            }
        });



        if($("#tipdoc").val() == 'CI'){
            $("#idComp").show();
        }
        else{
            $("#idComp").hide();
            $("#idNumDoc").removeClass("control-Ndoc");
        }

        $("#tipdoc").change(function() {
            if($(this).val() == 'CI'){
                $("#idComp").show();
                $("#idNumDoc").addClass("control-Ndoc");
            }
            else{
                $("#idComp").hide();
                LANSA.elements["ANROCO    "].value = '';
                $("#idNumDoc").removeClass("control-Ndoc");
            }
        });


    });

    function mostrarMesnajeSistema()
    {
        var table= $("#msg1 table th:eq(0)");
        var selec= $("#msg1 table th:eq(1) select");
        var option= $("#msg1 table th:eq(1) select option");

        option.each(function(){
            $(this).replaceWith( "<li>" + $( this ).text() + "</li>" );

        });
        selec.replaceWith( "<ul>" + selec.html() + "</ul>" );
        table.remove();
        $("#msg1").hide();
        if($.trim($("#msg1").html()) == "")
        {
            $("#msg1").hide("slow");
        }
        else
        {
            $("#msg1").show(500 );
            $("#msg1").focus();
        }
    }
</script>

<div class="content-form">
    <form method="post" name="LANSA" action="https://online.prevision.com.bo/CGI-BIN/LANSAWEB?WEBEVENT+L0592BB692476380163CB053+AFP+ENG">

        <input name="_NAME" type="hidden" size="20" maxlength="20" value="&amp;NULL" />
        <input name="_ROW" type="hidden" size="2" maxlength="2" value="01" />
        <input name="_COLUMN" type="hidden" size="2" maxlength="2" value="01" />
        <input name="_SELECT" type="hidden" size="6" maxlength="6" value="00" />
        <input name="_PANEL" type="hidden" value="SERVEXT   CERNASE001" />
        <input name="_BUTTON" type="hidden" value="OK" />
        <input name="_CALFLD" type="hidden" size="20" maxlength="20" value="&amp;NULL" />
        <input name="_PROCESS" type="hidden" size="10" maxlength="10" value="SERVEXT " />
        <input name="_FUNCTION" type="hidden" size="10" maxlength="10" value="CERNASE " />
        <input name="_OPROCESS" type="hidden" size="10" maxlength="10" value="SERVEXT" />
        <input name="_OFUNCTION" type="hidden" size="10" maxlength="10" value="CERNASE" />
        <input name="_PARTITION" type="hidden" size="3" maxlength="3" value="AFP" />
        <input name="_COLORFLD" type="hidden" size="10" maxlength="10" value="" />
        <input name="_LW3TRCID" type="hidden" size="15" maxlength="15" value="" />
        <input name="_EXCHALLBL" type="hidden" size="10" maxlength="10" value="" />
        <input name="AREENTRY  " type="hidden" size="001" maxlength="001" value="" />


        <div class="form-group row" style="text-align: center;">
            <h3>CERTIFICADO NEGATIVO DE ASEGURADO</h3>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-5 col-form-label">Lugar de Residencia:
                <span style="color:red;">*</span>
            </label>
            <div class="col-sm-7">
                <select class="form-control form-control-sm" name="LRESID    " title="Seleccionar Lugar Residencia">
                    <option value="" ></option>
                    <option value="La Paz">La Paz</option>
                    <option value="Oruro" selected="selected">Oruro</option>
                    <option value="Potosí">Potosí</option>
                    <option value="Cochabamba">Cochabamba</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    <option value="Beni">Beni</option>
                    <option value="Pando">Pando</option>
                    <option value="Tarija">Tarija</option>
                    <option value="Chuquisaca">Chuquisaca</option>
                </select>

            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-5 col-form-label">Tipo Identificación:
                <span style="color:red;">*</span>
            </label>
            <div class="col-sm-7">
                <select class="form-control form-control-sm" id="tipdoc" name="LTIPID    ">
                    <option value="CI">CI</option>
                    <option value="RUN">RUN</option>
                    <option value="RIN">RIN</option>
                    <option value="CE">CE</option>
                    <option value="PAS">PAS </option>
                </select>

            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-5 col-form-label">Nro. de Identificación:
                <span style="color:red;">*</span>
            </label>
            <div  class="col-sm-7" style="display: flex;" >
                <input type="text" class="form-control form-control-sm control-Ndoc" id="idNumDoc" name="PNROID    " placeholder="Nro. Identificación" value="0">

                <input id="idComp" name="ANROCO    "   style="width: 45%;"  class="form-control form-control-sm" type="text" placeholder="complemento"
                       title="El dato complemento es para los números que por problemas de duplicidad tienen un agregado alfanumérico" data-toggle="tooltip" data-placement="top"  maxlength="002" value="" />
            </div>
        </div>

        <div class="form-group" style="margin-top: 32px;">

            <div class="row">
                <div class="col-sm-5">
                    <canvas id="myCanvas" width="170"  height="50" style="border-color:#d3d3d3 !important; "  class="imagenC imagenR">
                        Su navegador no soporta HTML5.</canvas>
                </div>
                <div class="col-sm-2" style="padding-top: 15px; padding-bottom: 15px;">
                    <img  alt="Actualizar" style="vertical-align: middle;"  onclick="mensaje('');generar();"  src="https://online.prevision.com.bo/images/act.png" Height="20" width="20">
                </div>
                <div class="col-sm-5">
                    <span style="font-size:11px;color:red;">Ingrese el texto de la imagen</span>
                    <input type="text"  class="form-control form-control-sm" id="texto" value=""/>
                    <div id="val" style="font-size:12px;color:red;"></div>
                </div>
            </div>
            <script>
                var possibleCharacters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                var w=175;
                var h=50;
                var text = '';
                var c=document.getElementById("myCanvas");

                var ctx=c.getContext("2d");
                var gradient=ctx.createLinearGradient(0,0,c.width,0);
                // Fill with gradient
                generar();
                //drawRandomCurve();

                function generar()
                {
                    text = '';
                    c=document.getElementById("myCanvas");
                    ctx=c.getContext("2d");
//ctx.rect(0,0,w+100,h+100);
                    ctx.fillStyle="rgb(255,255,255)";
                    ctx.fillRect(0,0,w,h);
                    ctx.fill();
                    gradient=ctx.createLinearGradient(0,0,c.width,0);
                    gradient.addColorStop("0","rgb(3,63,135)");
                    gradient.addColorStop("0.5","rgb(3,63,135)");
                    gradient.addColorStop("1.0","rgb(3,63,135)");
                    ctx.fillStyle=gradient;
                    ctx.font='bold 27px Arial, cursive, sans-serif';
                    ctx.textAlign="center";
                    ctx.textBaseline="middle";
                    ctx.fillText(generateRandomText(),(w/2),(h/2));
//gradient.addColorStop("0",generateRandomColour());
//gradient.addColorStop("0.5",generateRandomColour());
//gradient.addColorStop("1.0",generateRandomColour());
                    drawRandomCurve();
                    drawRandomCurve();

//drawRandomCurve();
                }
                function mensaje(valor)
                {
                    var val=  document.getElementById("val");
                    val.innerHTML=valor;
                }
                function generateRandomText() {


                    var length = Math.floor((Math.random() * 2) + 4);
                    for (var i = 0; i < length; i++) {
                        text += possibleCharacters.charAt(Math.floor(Math.random() * possibleCharacters.length));
                    }
                    return text
                }

                function generateRandomColour() {
                    return "rgb(" + Math.floor((Math.random() * 255)) + ", " + Math.floor((Math.random() * 255)) + ", " + Math.floor((Math.random() * 255)) + ")";
                }


                function drawRandomCurve() {

                    //var ctx = ctx;
                    var gradient1 = ctx.createLinearGradient(0, 0, w, 0);
                    gradient1.addColorStop(0, Math.random() < 0.5 ?generateRandomColour() : generateRandomColour());
                    gradient1.addColorStop(1, Math.random() < 0.5 ? generateRandomColour() : generateRandomColour());

                    ctx.lineWidth = Math.floor((Math.random() * 2) + 2);
                    ctx.strokeStyle = gradient1;
                    ctx.beginPath();
                    ctx.moveTo(Math.floor((Math.random() * w)), Math.floor((Math.random() * h)));
                    ctx.bezierCurveTo(Math.floor((Math.random() * w)), Math.floor((Math.random() * h)),
                        Math.floor((Math.random() * w)), Math.floor((Math.random() * h)),
                        Math.floor((Math.random() * w)), Math.floor((Math.random() * h)));
                    ctx.stroke();
                }
                function validar()
                {
                    var sw=true;
                    var text1 =document.getElementById("texto").value;

                    if(text===text1)
                    {
                        val.innerHTML="";
                    }
                    else
                    {
                        mensaje("Texto Incorrecto!");
                        sw=false;
                    }
                    generar();
                    document.getElementById("texto").value="";
                    return sw;
                }

            </script>
        </div>
        <div class="form-group row">
        </div>
        <div id="msg1">
        </div>
        <div class="form-group center">
            <input type="button" class="btn btn-primary" name="USER1" value="Verificar" onclick="if(validar()){HandleEventIr('SERVEXT','CERNASE','A');}">
        </div>
    </form>
</div>
</body>
</html>
