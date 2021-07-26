jQuery(document).ready(function(){

    var scripts = document.getElementsByTagName("script");

    var jsFolder = "";

    for (var i= 0; i< scripts.length; i++)

    {

        if( scripts[i].src && scripts[i].src.match(/initslider-1\.js/i))

            jsFolder = scripts[i].src.substr(0, scripts[i].src.lastIndexOf("/") + 1);

    }

    jQuery("#amazingslider-1").amazingslider({

        sliderid:1,

        jsfolder:jsFolder,

        width:400,

        height:400,

        skinsfoldername:"",

        loadimageondemand:false,

        videohidecontrols:false,

        watermarktextcss: "font:12px Arial,Tahoma,Helvetica,sans-serif;color:#333;padding:2px 4px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:#fff;opacity:0.9;filter:alpha(opacity=90);",

        watermarkstyle:"text",

        playmutedandinlinewhenautoplay:false,

        donotresize:false,

        enabletouchswipe:true,

        fullscreen:false,

        autoplayvideo:false,

        addmargin:true,

        watermarklinkcss:"text-decoration:none;font:12px Arial,Tahoma,Helvetica,sans-serif;color:#333;",

        watermarktext:"amazingslider.com",

        watermarklink:"http://amazingslider.com?source=watermark",

        transitiononfirstslide:false,

        forceflash:false,

        isresponsive:true,

        forceflashonie11:true,

        forceflashonie10:true,

        pauseonmouseover:true,

        playvideoonclickthumb:true,

        showwatermark:false,

        slideinterval:5000,

        watermarkpositioncss:"display:block;position:absolute;bottom:4px;right:4px;",

        watermarkimage:"",

        fullwidth:false,

        randomplay:false,

        watermarktarget:"_blank",

        scalemode:"fill",

        loop:0,

        autoplay:false,

        navplayvideoimage:"play-32-32-0.png",

        navpreviewheight:60,

        timerheight:2,

        descriptioncssresponsive:"font-size:12px;",

        shownumbering:false,

        navthumbresponsivemode:"samecolumn",

        skin:"Events",

        textautohide:true,

        lightboxshowtwitter:true,

        addgooglefonts:false,

        navshowplaypause:true,

        initsocial:false,

        navshowplayvideo:true,

        navshowplaypausestandalonemarginx:8,

        navshowplaypausestandalonemarginy:8,

        navbuttonradius:0,

        navthumbcolumn:5,

        navthumbnavigationarrowimageheight:32,

        navradius:0,

        navthumbsmallcolumn:3,

        lightboxshownavigation:false,

        showshadow:false,

        navfeaturedarrowimagewidth:16,

        lightboxshowsocial:false,

        navpreviewwidth:120,

        googlefonts:"Inder",

        navborderhighlightcolor:"#045762",

        navcolor:"#999999",

        lightboxdescriptionbottomcss:"{color:#333; font-size:12px; overflow:hidden; text-align:left; margin:4px 0px 0px; padding: 0px;}",

        lightboxthumbwidth:80,

        navthumbnavigationarrowimagewidth:32,

        navthumbtitlehovercss:"text-decoration:underline;",

        navthumbmediumheight:64,

        texteffectresponsivesize:600,

        arrowwidth:32,

        texteffecteasing:"easeOutCubic",

        texteffect:"slide",

        lightboxthumbheight:60,

        navspacing:4,

        navarrowimage:"navarrows-28-28-0.png",

        ribbonimage:"ribbon_topleft-0.png",

        navwidth:90,

        navheight:90,

        arrowimage:"arrows-32-32-4.png",

        timeropacity:0.6,

        titlecssresponsive:"font-size:1.2rem;",

        navthumbnavigationarrowimage:"carouselarrows-32-32-3.png",

        navshowplaypausestandalone:true,

        texteffect1:"slide",

        navpreviewbordercolor:"#ffffff",

        texteffect2:"slide",

        customcss:"",

        ribbonposition:"topleft",

        navthumbdescriptioncss:"display:block;position:relative;padding:2px 4px;text-align:left;font:normal 12px Arial,Helvetica,sans-serif;color:#333;",

        lightboxtitlebottomcss:"{color:#333; font-size:14px; overflow:hidden; text-align:left;}",

        arrowstyle:"mouseover",

        navthumbmediumsize:800,

        navthumbtitleheight:20,

        navpreviewarrowheight:8,

        textpositionmargintop:24,

        navshowbuttons:false,

        buttoncssresponsive:"",

        texteffectdelay:500,

        navswitchonmouseover:false,

        playvideoimage:"playvideo-64-64-0.png",

        arrowtop:50,

        textstyle:"static",

        playvideoimageheight:64,

        navfonthighlightcolor:"#666666",

        showbackgroundimage:true,

        showpinterest:true,

        navpreviewborder:4,

        navshowplaypausestandaloneheight:48,

        navdirection:"horizontal",

        navbuttonshowbgimage:true,

        navbuttonbgimage:"navbuttonbgimage-28-28-0.png",

        textbgcss:"display:block; position:absolute; top:0px; left:0px; width:100%; height:100%; background-color:#333333; opacity:0.6; filter:alpha(opacity=60);",

        playvideoimagewidth:64,

        buttoncss:"display:block; position:relative; margin-top:8px;",

        navborder:2,

        navshowpreviewontouch:false,

        bottomshadowimagewidth:96,

        showtimer:true,

        navmultirows:false,

        navshowpreview:false,

        navmarginy:16,

        navmarginx:16,

        navfeaturedarrowimage:"featuredarrow-16-8-0.png",

        texteffectslidedirection1:"right",

        showribbon:false,

        navstyle:"thumbnails",

        textpositionmarginleft:24,

        descriptioncss:"display:block; position:relative;font-size:1.3rem;font-style: italic;",

        navplaypauseimage:"navplaypause-48-48-0.png",

        backgroundimagetop:-10,

        timercolor:"#ffffff",

        numberingformat:"%NUM/%TOTAL ",

        navthumbmediumwidth:64,

        navfontsize:12,

        navhighlightcolor:"#333333",

        texteffectdelay1:1000,

        navimage:"bullet-24-24-5.png",

        texteffectdelay2:1500,

        texteffectduration1:600,

        navshowplaypausestandaloneautohide:true,

        texteffectduration2:600,

        navbuttoncolor:"",

        navshowarrow:false,

        texteffectslidedirection:"left",

        navshowfeaturedarrow:true,

        lightboxbarheight:64,

        showfacebook:true,

        titlecss:"display:block; position:relative;font-size:1.4rem",

        ribbonimagey:0,

        ribbonimagex:0,

        texteffectresponsive:true,

        navthumbsmallheight:48,

        texteffectslidedistance1:120,

        texteffectslidedistance2:120,

        navrowspacing:8,

        navshowplaypausestandaloneposition:"bottomright",

        lightboxshowpinterest:true,

        lightboxthumbbottommargin:8,

        lightboxthumbtopmargin:12,

        arrowhideonmouseleave:1000,

        navshowplaypausestandalonewidth:48,

        showsocial:false,

        navthumbresponsive:true,

        navfeaturedarrowimageheight:8,

        navopacity:0.8,

        textpositionmarginright:24,

        backgroundimagewidth:120,

        bordercolor:"#dee2e6",

        border:1,

        navthumbtitlewidth:120,

        navpreviewposition:"top",

        texteffectseparate:false,

        arrowheight:32,

        arrowmargin:4,

        texteffectduration:600,

        bottomshadowimage:"bottomshadow-110-95-4.png",

        lightboxshowfacebook:true,

        lightboxshowdescription:false,

        timerposition:"bottom",

        navfontcolor:"#333333",

        navthumbnavigationstyle:"arrow",

        borderradius:0,

        navbuttonhighlightcolor:"",

        textpositionstatic:"bottom",

        texteffecteasing2:"easeOutCubic",

        navthumbstyle:"imageonly",

        texteffecteasing1:"easeOutCubic",

        textcss:"display:block; padding:6px 10px; text-align:left;color:#333",

        navthumbsmallwidth:48,

        navbordercolor:"#dee2e6",

        navthumbmediumcolumn:4,

        navpreviewarrowimage:"previewarrow-16-8-0.png",

        showbottomshadow:false,

        texteffectslidedistance:30,

        shadowcolor:"#aaaaaa",

        showtwitter:true,

        textpositionmarginstatic:0,

        backgroundimage:"",

        navposition:"bottom",

        navthumbsmallsize:480,

        navpreviewarrowwidth:16,

        textformat:"Bottom bar",

        texteffectslidedirection2:"right",

        bottomshadowimagetop:98,

        textpositiondynamic:"bottomleft",

        shadowsize:5,

        navthumbtitlecss:"display:block;position:relative;padding:2px 4px;text-align:center;",

        textpositionmarginbottom:24,

        lightboxshowtitle:true,

        socialmode:"mouseover",

        cssslide: {

            duration:700,

            easing:"ease",

            checked:true

        },

        transition:"cssslide",

        scalemode:"fit",

        isfullscreen:false,

        textformat: {


        }

    });

});