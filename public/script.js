/*!
 * Bowser - a browser detector
 * https://github.com/ded/bowser
 * MIT License | (c) Dustin Diaz 2015
 */
!function(e,t,n){typeof module!="undefined"&&module.exports?module.exports=n():typeof define=="function"&&define.amd?define(t,n):e[t]=n()}(this,"bowser",function(){function t(t){function n(e){var n=t.match(e);return n&&n.length>1&&n[1]||""}function r(e){var n=t.match(e);return n&&n.length>1&&n[2]||""}function N(e){switch(e){case"NT":return"NT";case"XP":return"XP";case"NT 5.0":return"2000";case"NT 5.1":return"XP";case"NT 5.2":return"2003";case"NT 6.0":return"Vista";case"NT 6.1":return"7";case"NT 6.2":return"8";case"NT 6.3":return"8.1";case"NT 10.0":return"10";default:return undefined}}var i=n(/(ipod|iphone|ipad)/i).toLowerCase(),s=/like android/i.test(t),o=!s&&/android/i.test(t),u=/nexus\s*[0-6]\s*/i.test(t),a=!u&&/nexus\s*[0-9]+/i.test(t),f=/CrOS/.test(t),l=/silk/i.test(t),c=/sailfish/i.test(t),h=/tizen/i.test(t),p=/(web|hpw)os/i.test(t),d=/windows phone/i.test(t),v=/SamsungBrowser/i.test(t),m=!d&&/windows/i.test(t),g=!i&&!l&&/macintosh/i.test(t),y=!o&&!c&&!h&&!p&&/linux/i.test(t),b=r(/edg([ea]|ios)\/(\d+(\.\d+)?)/i),w=n(/version\/(\d+(\.\d+)?)/i),E=/tablet/i.test(t)&&!/tablet pc/i.test(t),S=!E&&/[^-]mobi/i.test(t),x=/xbox/i.test(t),T;/opera/i.test(t)?T={name:"Opera",opera:e,version:w||n(/(?:opera|opr|opios)[\s\/](\d+(\.\d+)?)/i)}:/opr\/|opios/i.test(t)?T={name:"Opera",opera:e,version:n(/(?:opr|opios)[\s\/](\d+(\.\d+)?)/i)||w}:/SamsungBrowser/i.test(t)?T={name:"Samsung Internet for Android",samsungBrowser:e,version:w||n(/(?:SamsungBrowser)[\s\/](\d+(\.\d+)?)/i)}:/coast/i.test(t)?T={name:"Opera Coast",coast:e,version:w||n(/(?:coast)[\s\/](\d+(\.\d+)?)/i)}:/yabrowser/i.test(t)?T={name:"Yandex Browser",yandexbrowser:e,version:w||n(/(?:yabrowser)[\s\/](\d+(\.\d+)?)/i)}:/ucbrowser/i.test(t)?T={name:"UC Browser",ucbrowser:e,version:n(/(?:ucbrowser)[\s\/](\d+(?:\.\d+)+)/i)}:/mxios/i.test(t)?T={name:"Maxthon",maxthon:e,version:n(/(?:mxios)[\s\/](\d+(?:\.\d+)+)/i)}:/epiphany/i.test(t)?T={name:"Epiphany",epiphany:e,version:n(/(?:epiphany)[\s\/](\d+(?:\.\d+)+)/i)}:/puffin/i.test(t)?T={name:"Puffin",puffin:e,version:n(/(?:puffin)[\s\/](\d+(?:\.\d+)?)/i)}:/sleipnir/i.test(t)?T={name:"Sleipnir",sleipnir:e,version:n(/(?:sleipnir)[\s\/](\d+(?:\.\d+)+)/i)}:/k-meleon/i.test(t)?T={name:"K-Meleon",kMeleon:e,version:n(/(?:k-meleon)[\s\/](\d+(?:\.\d+)+)/i)}:d?(T={name:"Windows Phone",osname:"Windows Phone",windowsphone:e},b?(T.msedge=e,T.version=b):(T.msie=e,T.version=n(/iemobile\/(\d+(\.\d+)?)/i))):/msie|trident/i.test(t)?T={name:"Internet Explorer",msie:e,version:n(/(?:msie |rv:)(\d+(\.\d+)?)/i)}:f?T={name:"Chrome",osname:"Chrome OS",chromeos:e,chromeBook:e,chrome:e,version:n(/(?:chrome|crios|crmo)\/(\d+(\.\d+)?)/i)}:/edg([ea]|ios)/i.test(t)?T={name:"Microsoft Edge",msedge:e,version:b}:/vivaldi/i.test(t)?T={name:"Vivaldi",vivaldi:e,version:n(/vivaldi\/(\d+(\.\d+)?)/i)||w}:c?T={name:"Sailfish",osname:"Sailfish OS",sailfish:e,version:n(/sailfish\s?browser\/(\d+(\.\d+)?)/i)}:/seamonkey\//i.test(t)?T={name:"SeaMonkey",seamonkey:e,version:n(/seamonkey\/(\d+(\.\d+)?)/i)}:/firefox|iceweasel|fxios/i.test(t)?(T={name:"Firefox",firefox:e,version:n(/(?:firefox|iceweasel|fxios)[ \/](\d+(\.\d+)?)/i)},/\((mobile|tablet);[^\)]*rv:[\d\.]+\)/i.test(t)&&(T.firefoxos=e,T.osname="Firefox OS")):l?T={name:"Amazon Silk",silk:e,version:n(/silk\/(\d+(\.\d+)?)/i)}:/phantom/i.test(t)?T={name:"PhantomJS",phantom:e,version:n(/phantomjs\/(\d+(\.\d+)?)/i)}:/slimerjs/i.test(t)?T={name:"SlimerJS",slimer:e,version:n(/slimerjs\/(\d+(\.\d+)?)/i)}:/blackberry|\bbb\d+/i.test(t)||/rim\stablet/i.test(t)?T={name:"BlackBerry",osname:"BlackBerry OS",blackberry:e,version:w||n(/blackberry[\d]+\/(\d+(\.\d+)?)/i)}:p?(T={name:"WebOS",osname:"WebOS",webos:e,version:w||n(/w(?:eb)?osbrowser\/(\d+(\.\d+)?)/i)},/touchpad\//i.test(t)&&(T.touchpad=e)):/bada/i.test(t)?T={name:"Bada",osname:"Bada",bada:e,version:n(/dolfin\/(\d+(\.\d+)?)/i)}:h?T={name:"Tizen",osname:"Tizen",tizen:e,version:n(/(?:tizen\s?)?browser\/(\d+(\.\d+)?)/i)||w}:/qupzilla/i.test(t)?T={name:"QupZilla",qupzilla:e,version:n(/(?:qupzilla)[\s\/](\d+(?:\.\d+)+)/i)||w}:/chromium/i.test(t)?T={name:"Chromium",chromium:e,version:n(/(?:chromium)[\s\/](\d+(?:\.\d+)?)/i)||w}:/chrome|crios|crmo/i.test(t)?T={name:"Chrome",chrome:e,version:n(/(?:chrome|crios|crmo)\/(\d+(\.\d+)?)/i)}:o?T={name:"Android",version:w}:/safari|applewebkit/i.test(t)?(T={name:"Safari",safari:e},w&&(T.version=w)):i?(T={name:i=="iphone"?"iPhone":i=="ipad"?"iPad":"iPod"},w&&(T.version=w)):/googlebot/i.test(t)?T={name:"Googlebot",googlebot:e,version:n(/googlebot\/(\d+(\.\d+))/i)||w}:T={name:n(/^(.*)\/(.*) /),version:r(/^(.*)\/(.*) /)},!T.msedge&&/(apple)?webkit/i.test(t)?(/(apple)?webkit\/537\.36/i.test(t)?(T.name=T.name||"Blink",T.blink=e):(T.name=T.name||"Webkit",T.webkit=e),!T.version&&w&&(T.version=w)):!T.opera&&/gecko\//i.test(t)&&(T.name=T.name||"Gecko",T.gecko=e,T.version=T.version||n(/gecko\/(\d+(\.\d+)?)/i)),!T.windowsphone&&(o||T.silk)?(T.android=e,T.osname="Android"):!T.windowsphone&&i?(T[i]=e,T.ios=e,T.osname="iOS"):g?(T.mac=e,T.osname="macOS"):x?(T.xbox=e,T.osname="Xbox"):m?(T.windows=e,T.osname="Windows"):y&&(T.linux=e,T.osname="Linux");var C="";T.windows?C=N(n(/Windows ((NT|XP)( \d\d?.\d)?)/i)):T.windowsphone?C=n(/windows phone (?:os)?\s?(\d+(\.\d+)*)/i):T.mac?(C=n(/Mac OS X (\d+([_\.\s]\d+)*)/i),C=C.replace(/[_\s]/g,".")):i?(C=n(/os (\d+([_\s]\d+)*) like mac os x/i),C=C.replace(/[_\s]/g,".")):o?C=n(/android[ \/-](\d+(\.\d+)*)/i):T.webos?C=n(/(?:web|hpw)os\/(\d+(\.\d+)*)/i):T.blackberry?C=n(/rim\stablet\sos\s(\d+(\.\d+)*)/i):T.bada?C=n(/bada\/(\d+(\.\d+)*)/i):T.tizen&&(C=n(/tizen[\/\s](\d+(\.\d+)*)/i)),C&&(T.osversion=C);var k=!T.windows&&C.split(".")[0];if(E||a||i=="ipad"||o&&(k==3||k>=4&&!S)||T.silk)T.tablet=e;else if(S||i=="iphone"||i=="ipod"||o||u||T.blackberry||T.webos||T.bada)T.mobile=e;return T.msedge||T.msie&&T.version>=10||T.yandexbrowser&&T.version>=15||T.vivaldi&&T.version>=1||T.chrome&&T.version>=20||T.samsungBrowser&&T.version>=4||T.firefox&&T.version>=20||T.safari&&T.version>=6||T.opera&&T.version>=10||T.ios&&T.osversion&&T.osversion.split(".")[0]>=6||T.blackberry&&T.version>=10.1||T.chromium&&T.version>=20?T.a=e:T.msie&&T.version<10||T.chrome&&T.version<20||T.firefox&&T.version<20||T.safari&&T.version<6||T.opera&&T.version<10||T.ios&&T.osversion&&T.osversion.split(".")[0]<6||T.chromium&&T.version<20?T.c=e:T.x=e,T}function r(e){return e.split(".").length}function i(e,t){var n=[],r;if(Array.prototype.map)return Array.prototype.map.call(e,t);for(r=0;r<e.length;r++)n.push(t(e[r]));return n}function s(e){var t=Math.max(r(e[0]),r(e[1])),n=i(e,function(e){var n=t-r(e);return e+=(new Array(n+1)).join(".0"),i(e.split("."),function(e){return(new Array(20-e.length)).join("0")+e}).reverse()});while(--t>=0){if(n[0][t]>n[1][t])return 1;if(n[0][t]!==n[1][t])return-1;if(t===0)return 0}}function o(e,r,i){var o=n;typeof r=="string"&&(i=r,r=void 0),r===void 0&&(r=!1),i&&(o=t(i));var u=""+o.version;for(var a in e)if(e.hasOwnProperty(a)&&o[a]){if(typeof e[a]!="string")throw new Error("Browser version in the minVersion map should be a string: "+a+": "+String(e));return s([u,e[a]])<0}return r}function u(e,t,n){return!o(e,t,n)}var e=!0,n=t(typeof navigator!="undefined"?navigator.userAgent||"":"");return n.test=function(e){for(var t=0;t<e.length;++t){var r=e[t];if(typeof r=="string"&&r in n)return!0}return!1},n.isUnsupportedBrowser=o,n.compareVersions=s,n.check=u,n._detect=t,n.detect=t,n})
/*
 * jQuery Scanner Detection
 *
 * Copyright (c) 2013 Julien Maurel
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 * https://github.com/julien-maurel/jQuery-Scanner-Detection
 *
 * Version: 1.1.2
 *
 */
(function($){
    $.fn.scannerDetection=function(options){

        // If string given, call onComplete callback
        if(typeof options==="string"){
            this.each(function(){
                this.scannerDetectionTest(options);
            });
            return this;
        }

        var defaults={
            onComplete:false, // Callback after detection of a successfull scanning (scanned string in parameter)
            onError:false, // Callback after detection of a unsuccessfull scanning (scanned string in parameter)
            onReceive:false, // Callback after receive a char (scanned char in parameter)
            timeBeforeScanTest:100, // Wait duration (ms) after keypress event to check if scanning is finished
            avgTimeByChar:30, // Average time (ms) between 2 chars. Used to do difference between keyboard typing and scanning
            minLength:6, // Minimum length for a scanning
            endChar:[9,13], // Chars to remove and means end of scanning
            stopPropagation:false, // Stop immediate propagation on keypress event
            preventDefault:false // Prevent default action on keypress event
        };
        if(typeof options==="function"){
            options={onComplete:options}
        }
        if(typeof options!=="object"){
            options=$.extend({},defaults);
        }else{
            options=$.extend({},defaults,options);
        }
        
        this.each(function(){
            var self=this, $self=$(self), firstCharTime=0, lastCharTime=0, stringWriting='', callIsScanner=false, testTimer=false;
            var initScannerDetection=function(){
                firstCharTime=0;
                stringWriting='';
            };
            self.scannerDetectionTest=function(s){
                // If string is given, test it
                if(s){
                    firstCharTime=lastCharTime=0;
                    stringWriting=s;
                }
                // If all condition are good (length, time...), call the callback and re-initialize the plugin for next scanning
                // Else, just re-initialize
                if(stringWriting.length>=options.minLength && lastCharTime-firstCharTime<stringWriting.length*options.avgTimeByChar){
                    if(options.onComplete) options.onComplete.call(self,stringWriting);
                    $self.trigger('scannerDetectionComplete',{string:stringWriting});
                    initScannerDetection();
                    return true;
                }else{
                    if(options.onError) options.onError.call(self,stringWriting);
                    $self.trigger('scannerDetectionError',{string:stringWriting});
                    initScannerDetection();
                    return false;
                }
            }
            $self.data('scannerDetection',{options:options}).unbind('.scannerDetection').bind('keydown.scannerDetection',function(e){
                // Add event on keydown because keypress is not triggered for non character keys (tab, up, down...)
                // So need that to check endChar (that is often tab or enter) and call keypress if necessary
                if(firstCharTime && options.endChar.indexOf(e.which)!==-1){
                    // Clone event, set type and trigger it
                    var e2=jQuery.Event('keypress',e);
                    e2.type='keypress.scannerDetection';
                    $self.triggerHandler(e2);
                    // Cancel default
                    e.preventDefault();
                    e.stopImmediatePropagation();
                }
            }).bind('keypress.scannerDetection',function(e){
                if(options.stopPropagation) e.stopImmediatePropagation();
                if(options.preventDefault) e.preventDefault();

                if(firstCharTime && options.endChar.indexOf(e.which)!==-1){
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    callIsScanner=true;
                }else{
                    stringWriting+=String.fromCharCode(e.which);
                    callIsScanner=false;
                }

                if(!firstCharTime){
                    firstCharTime=e.timeStamp;
                }
                lastCharTime=e.timeStamp;

                if(testTimer) clearTimeout(testTimer);
                if(callIsScanner){
                    self.scannerDetectionTest();
                    testTimer=false;
                }else{
                    testTimer=setTimeout(self.scannerDetectionTest,options.timeBeforeScanTest);
                }
                
                if(options.onReceive) options.onReceive.call(self,e);
                $self.trigger('scannerDetectionReceive',{evt:e});
            });
        });
        return this;
    }
})(jQuery);
function Reprint() {

    var xhr = new XMLHttpRequest();
    var login = localStorage.lastname;
    var pass = localStorage.pass;
    var lname = localStorage.lname;
    var nos = "";
    var amt = "";
    var api_url = "https://shreerashibhavishya.com/play1060api/api/products/getlasttickjodi?login=" + login + "&nos=" + "" + "&amt=" + "" + "&lname=" + lname
    var userid = "";
    var crtime = "";
    var prtContent = document.getElementById("prn_id");

    var i = 0;
    var btrans = "";
    var qty = 0;
    var totamt = 0;
    var ldname = "";





    var ikx = 1;
    var inew = 0;
    var oldxaxis = "";
    var oldxaxis = "";
    var oldyaxis = "";
    var requestid = "";
    $.ajax({
        url: api_url,
        type: 'GET',
        crossOrigin: true,
        dataType: 'json',
        beforeSend: function () {
            $("#loading-overlay").show();
            disableall();
        },
        success: function (data) {
            $.each(data, function (key, item) {

    $("#loading-overlay").hide();
    var btn = document.getElementById("btnsubmit");
    btn.disabled = false;
    enableall();
    if (i == 0) {
    if (parseInt(item.finalamt) <= 0) {
    alert("Inusfficent Points Please Refil Your Account");
    return;
    }
    userid = item.userid;
    requestid = item.requestid;
    btrans = item.bulktransid;
     prtContent.innerHTML= "   <span style='font-size: 8pt; font-weight: bold;margin-left:40px;font-family:verdana;'> For Amusment  Only</span>";
     prtContent.innerHTML=  prtContent.innerHTML+ "</br> <span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "D.D." + gettodaydate(item.drawdate) + "</span>"
     prtContent.innerHTML=  prtContent.innerHTML+ "</br> <span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "D.T :" + zeroPad(item.drhrs,2) + ":" + zeroPad(item.drmins, 2) + "</span>"
    prtContent.innerHTML=  prtContent.innerHTML+ "</br> <span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "C.T.:" + zeroPad(item.crhrs,2) + ":" + zeroPad(item.crmins,2) + ":" + zeroPad(item.crsec,2); +"</span>"
     prtContent.innerHTML=  prtContent.innerHTML+ "</br>  <span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>    Retailer Code.  " + userid ;

        }




        if (i > 0 && btrans != item.bulktransid) {
        prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>Qty. " + qty + "&nbsp;Total Pt. " + totamt.toFixed(2) + "</span>";
         prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold; margin-left:40px;font-family:verdana;'>" +  "G.id :-" + requestid  + "</span>";
         prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>Reprint</span>";
        
                       var bid = "barcode" + inew;

            prtContent.innerHTML = prtContent.innerHTML + "</br><span style='margin-left:20px;'> <svg id=" + bid + "></svg><span>";


            JsBarcode("#barcode" + inew, btrans, {



                format: "CODE128",

                width: 2,
                height: 30,
                displayValue: true

            });

        qty = 0;
        totamt = 0;
           callprint();
         //window.external.AnotherMethod(prtContent.innerHTML);
       //prtContent = prtContent +bcodex.innerHTML+"$";
        btrans = item.bulktransid;
        inew++;
         prtContent.innerHTML= prtContent.innerHTML+ "<span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'> For Amusment  Only</span>";
         prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "D.D." + gettodaydate(item.drawdate) + "</span>"
         prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "D.T :" + zeroPad(item.drhrs,2) + ":" + zeroPad(item.drmins, 2) + "</span>"
         prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "C.T.:" + zeroPad(item.crhrs,2) + ":" + zeroPad(item.crmins,2) + ":" + zeroPad(item.crsec,2); +"</span>"
        prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>  Retailer Code.  " + userid;
            i = 0;

            }
            lprint = "";
            ldx = item.lname;
            if (ldx == "Single") {
            lprint = "SG";
            }
            else if (ldx =="Double") {
            lprint = "DO";
            }
            else if (ldx == "Triple") {
            lprint = "TR";
            }
            if (i == 0) {
            prtContent.innerHTML=  prtContent.innerHTML+ "</br> <span style='font-size: 8pt;font-weight: bold;margin-left:40px; font-family:verdana;'>" + lprint + "</span> ";
            }
            else if (item.lname != ldname) {
            prtContent.innerHTML=  prtContent.innerHTML+ "</br> <span style='font-size: 8pt;font-weight: bold;margin-left:40px; font-family:verdana;'>" + lprint + "</span> ";
            }
            if (item.lname != ldname) {

            ldname = item.lname;
            }
            if ((i % 3) == 0) {
            prtContent.innerHTML=  prtContent.innerHTML+ "</br> <span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana; '>" + spacePad(item.Xaxis,3) + "*" + item.nosplayed  + "" + "</span>";
            }
            else {
             prtContent.innerHTML=  prtContent.innerHTML+ "<span style='font-size: 8pt;font-weight: bold;font-family:verdana;'> &nbsp;&nbsp; " + spacePad(item.Xaxis,3) + "*" + item.nosplayed  + "" + "</span>";
            }

            totamt = parseFloat(item.finalamt) + parseFloat(totamt);


            qty = parseInt(item.nosplayed) + parseInt(qty);
            i++;
            });
             prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>Qty. " + qty + "&nbsp;Total Pt. " + totamt.toFixed(2) + "</span>";
            prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold; margin-left:40px;font-family:verdana;'>" +  "G.id :-" + requestid  + "</span>";
             prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>Reprint</span>";
                           var bid = "barcode" + inew;

            prtContent.innerHTML = prtContent.innerHTML + "</br><span style='margin-left:20px;'> <svg id=" + bid + "></svg><span>";


            JsBarcode("#barcode" + inew, btrans, {



                format: "CODE128",

                width: 2,
                height: 30,
                displayValue: true

            });
                  //  window.external.AnotherMethod(prtContent);
                    //boundAsync.showMessage(prtContent.innerHTML);
                    callprint();

                    newlogin();
                    getTokennew("Reprint", requestid);
                    },
                    error: function (request, message, error) {

                    }
                    });


                 }


                 function Changepass() {
                     if (localStorage.lastname == undefined)
                         return;
                     var login = localStorage.lastname;
                     getTokennew("Changepassword", "");
                     window.location.href = "Changepass.html";
                 }

                 function View() {
                     if (localStorage.lastname == undefined)
                         return;
                     var login = localStorage.lastname;
                     getTokennew("View", "");
                     window.location.href = "lasttransaction.aspx?name=" + login;
                 }

                 function Report() {
                     if (localStorage.lastname == undefined)
                         return;
                     var login = localStorage.lastname;
                     getTokennew("Report", "");
                     window.location.href = "clientprofile.aspx?name=" + login;
                 }
                 function Result() {
                     if (localStorage.lastname == undefined)
                         return;
                     getTokennew("Result", "");
                     window.location.href = "displayresult.aspx";
                 }
  
var initser = "";
var initlocalser = "";
function getlimitnew() {

    var xhr = new XMLHttpRequest();
    var login = document.getElementById("txt_UserName").value;
    var pass = document.getElementById("txt_Password").value;

    var api_url = "https://shreerashibhavishya.com/play1060api/api/products/jodilimit?name=" + login + "&pass=" + pass
 //   selectSjodi(2);

    $.ajax({
        url: api_url,
        type: 'GET',
        crossOrigin: true,
        dataType: 'json',
        success: function (data) {

            $.each(data, function (key, item) {
                
                localStorage.setItem("lastname", login);
                localStorage.setItem("pass", pass);
                document.getElementById("chkindiv").checked = true;
                
                document.getElementById("txt_UserName").disabled = true;
                document.getElementById("txt_Password").disabled = true;
                document.getElementById("tlimit").innerHTML = item.limit;
                document.getElementById("uid").innerHTML = item.UserID;
                initser = item.firstser;
                initlocalser = item.initlocalser;
                setser();
                 Clear();
//                       document.getElementById("chkgname2").checked = true;
//    document.getElementById("chkgname3").checked = false;

//    document.getElementById("chkgname1").checked = false;
               // selectSjodi(2);
//                     for (var i = 1; i <= 10; i++) {
//            document.getElementById("s" + i).style.visibility = "hidden";
//            document.getElementById("chs" + i).style.visibility = "hidden";
//        }
      

                loadshowhide();
                document.getElementById("bt_login").innerHTML = "Logout";
            });





        },
        error: function (request, message, error) {

        }
    });

}

function getlimit() {

    var xhr = new XMLHttpRequest();
    var login = document.getElementById("txt_UserName").value;
    var pass = document.getElementById("txt_Password").value;

    var api_url = "https://shreerashibhavishya.com/play1060api/api/products/jodiLogin?name=" + login + "&pass=" + pass + "&country=" + country + "&city=" + city + "&lat=" + lat + "&lon =" + lon + "&ipinfo  =" + ipinfo


    $.ajax({
        url: api_url,
        type: 'GET',
        crossOrigin: true,
        dataType: 'json',
        success: function (data) {

            $.each(data, function (key, item) {
                localStorage.setItem("lastname", login);
                localStorage.setItem("pass", pass);
                document.getElementById("tlimit").innerHTML = item.limit;
                document.getElementById("bt_login").innerHTML = "Logout";
            });





        },
        error: function (request, message, error) {

        }
    });


}
var isprint = 0;
function getToken() {

    if (document.getElementById("bt_login").innerHTML == "Logout") {
        var login = document.getElementById("txt_UserName").value;
        var pass = document.getElementById("txt_Password").value;

        var api_url = "https://shreerashibhavishya.com/play1060api/api/products/jodiLogoff?name=" + login + "&pass=" + pass

        $.ajax({
            url: api_url,
            type: 'GET',
            crossOrigin: true,
            dataType: 'json',
            success: function (data) {
                document.getElementById("txt_UserName").disabled = false;
                document.getElementById("txt_Password").disabled = false;
                $.each(data, function (key, item) {
                    getTokennew("Logoff", "");

                    window.location = "index.html"
                });





            },
            error: function (request, message, error) {

            }
        });


        localStorage.clear();

        document.getElementById("tlimit").innerHTML = "";
        document.getElementById("bt_login").innerHTML = "Login";
        document.getElementById("txt_UserName").value = "";
        document.getElementById("txt_Password").value = "";
        document.getElementById("uid").innerHTML = "";
        
    }
    var xhr = new XMLHttpRequest();
    var login = document.getElementById("txt_UserName").value;
    var pass = document.getElementById("txt_Password").value;

    var api_url = "https://shreerashibhavishya.com/play1060api/api/products/jodiLogin?name=" + login + "&pass=" + pass + "&country=" + country + "&city=" + city + "&lat=" + lat + "&lon=" + lon + "&ipinfo=" + ipinfo


    $.ajax({
        url: api_url,
        type: 'GET',
        crossOrigin: true,
        dataType: 'json',
        success: function (data) {

            $.each(data, function (key, item) {

                if (item.HQ == "Invalid ID") {
                    alert(item.HQ);
                    return;
                }
                if (item.HQ == "Already Logged in") {
                    alert(item.HQ);
                    return;
                }
                document.getElementById("txt_UserName").disabled = true;
                document.getElementById("txt_Password").disabled = true;
                localStorage.setItem("lastname", login);
                localStorage.setItem("pass", pass);
                document.getElementById("tlimit").innerHTML = item.limit;
                document.getElementById("uid").innerHTML = item.UserID;

                document.getElementById("bt_login").innerHTML = "Logout";
                prints = item.DesigID;
                localStorage.setItem("prints", item.DesigID);
                if (item.DesigID == "True") {

                    isprint = 0;
                }
                else {
                    document.getElementById("Button5").style.display = "none";
                    document.getElementById("t_claim").style.display = "none";
                    isprint = 1;
                }
                initser = item.firstser;
                initlocalser = item.initlocalser;
                setser();
                for (var i = 1; i <= 10; i++) {
                    document.getElementById("s" + i).style.visibility = "hidden";
                    document.getElementById("chs" + i).style.visibility = "hidden";
                }
                if (item.s1 == "True") {
                    document.getElementById("s1").style.visibility = "visible";
                    document.getElementById("chs1").style.visibility = "visible";
                }
                if (item.s2 == "True") {
                    document.getElementById("s2").style.visibility = "visible";
                    document.getElementById("chs2").style.visibility = "visible";
                }
                if (item.s3 == "True") {
                    document.getElementById("s3").style.visibility = "visible";
                    document.getElementById("chs3").style.visibility = "visible";
                }
                if (item.s4 == "True") {
                    document.getElementById("s4").style.visibility = "visible";
                    document.getElementById("chs4").style.visibility = "visible";
                }

                if (item.s5 == "True") {
                    document.getElementById("s5").style.visibility = "visible";
                    document.getElementById("chs5").style.visibility = "visible";
                }

                if (item.s6 == "True") {
                    document.getElementById("s6").style.visibility = "visible";
                    document.getElementById("chs6").style.visibility = "visible";
                }

                if (item.s7 == "True") {
                    document.getElementById("s7").style.visibility = "visible";
                    document.getElementById("chs7").style.visibility = "visible";
                }

                if (item.s8 == "True") {
                    document.getElementById("s8").style.visibility = "visible";
                    document.getElementById("chs8").style.visibility = "visible";
                }

                if (item.s9 == "True") {
                    document.getElementById("s9").style.visibility = "visible";
                    document.getElementById("chs9").style.visibility = "visible";
                }
                if (item.s10 == "True") {
                    document.getElementById("s10").style.visibility = "visible";
                    document.getElementById("chs10").style.visibility = "visible";
                }




            });





        },
        error: function (request, message, error) {

        }
    });


}

function Cancel() {

    var xhr = new XMLHttpRequest();
    var login = localStorage.lastname;
    var pass = localStorage.pass;
    var lname = localStorage.lname;
    var nos = "";
    var amt = "";
var token= localStorage.token;
    var api_url = "https://shreerashibhavishya.com/play1060api/api/products/getlastcancel?login=" + login + "&nos=" + "" + "&amt=" + "" + "&lname=" + "" + "&token=" + token
    var userid = "";
    var crtime = "";

    var i = 0;
    var btrans = "";
    var qty = 0;
    var totamt = 0;
    var ldname = "";
    $.ajax({
        url: api_url,
        type: 'GET',
        crossOrigin: true,
        dataType: 'json',
        beforeSend: function () {
            $("#loading-overlay").show();
            disableall();


        },
        success: function (data) {

            $.each(data, function (key, item) {
                $("#loading-overlay").hide();
                enableall();
                if (item.lname != "") {
                    alert(item.lname);
Clear();
                    return;
                }

                else {
                    alert("Ticket  Cancelled " + item.canceltime);
Clear();
                    getTokennew("Cancel", "");
                }

                i++;
            });

            getlimitnew();

        },
        error: function (request, message, error) {

        }
    });
}


function chkrser() {
   
}



function chkser() {
    for (var i = 1; i <= 10; i++) {
        document.getElementById("s" + i).checked = false;
    }
    var rseries = localStorage.series;
    if (rseries == "0") {
        document.getElementById("s1").checked = true;


    }
    else if (rseries == "1") {
        document.getElementById("s2").checked = true;


    }
    else if (rseries == "2") {
        document.getElementById("s3").checked = true;


    }
    else if (rseries == "3") {
        document.getElementById("s4").checked = true;


    }
    else if (rseries == "4") {
        document.getElementById("s5").checked = true;


    }
    else if (rseries == "5") {
        document.getElementById("s6").checked = true;


    }
    else if (rseries == "6") {
        document.getElementById("s7").checked = true;


    }
    else if (rseries == "7") {
        document.getElementById("s8").checked = true;


    }
    else if (rseries == "8") {
        document.getElementById("s9").checked = true;


    }

    else if (rseries == "9") {
        document.getElementById("s10").checked = true;


    }
}

function unchkrser() {
    var rseries = localStorage.rseries;
    if (rseries == "0") {
        document.getElementById("chkgname1").checked = false;


    }
    else if (rseries == "1") {
        document.getElementById("chkgname2").checked = false;


    }
    else if (rseries == "2") {
        document.getElementById("chkgname3").checked = false;


    }
    else if (rseries == "3") {
        document.getElementById("chkgname4").checked = false;


    }
    else if (rseries == "4") {
        document.getElementById("chkgname5").checked = false;


    }
    else if (rseries == "5") {
        document.getElementById("chkgname6").checked = false;


    }
    else if (rseries == "6") {
        document.getElementById("chkgname7").checked = false;


    }
    else if (rseries == "7") {
        document.getElementById("chkgname8").checked = false;


    }
    else if (rseries == "8") {
        document.getElementById("chkgname9").checked = false;


    }

    else if (rseries == "9") {
        document.getElementById("chkgname10").checked = false;


    }
}
function changrser() {
    var fnd = 0;
    for (var tt = 1; tt <= 10; tt++) {
        if (document.getElementById('s' + tt).checked == false) {
            fnd = 1;
        }
    }
    if (fnd == 1) {
        document.getElementById('chkgnameall').checked = false;
    }
    else {
        document.getElementById('chkgnameall').checked = true;
    }

    fnd = 0;
    for (var tt = 1; tt <= 10; tt++) {
        if (document.getElementById('s' + tt).checked == true) {
            fnd = 1;
        }
    }
    if (fnd == 0) {
        document.getElementById('s1').checked = true;

    }
}
function changeseriesa(chser) {
for (var i = 0; i < 10; i++) {
        document.getElementById("t_c" + i).value = "";
    }

    for (var i = 0; i < 10; i++) {
        document.getElementById("t_r" + i).value = "";
document.getElementById("t_c" + i).value = "";
    }
    var chm = parseInt(chser) - 1;
    var chq = parseInt(chser) + 1;
    if (document.getElementById('s' + chq).checked == true) {
    if (document.getElementById('chkindiv').checked == true) {

        if (setindivser != "") {
            if (chser != setindivser) {
//                    alert("Cannot Change Series")
//                    document.getElementById('s' + chq).checked = false;
//                    return;
            }
        }
    }
}
    var tt = parseInt(chser) + 1;
    if (document.getElementById('s' + tt).checked == true) {
    }
    else {
        for (var fnd = 10; fnd >= 1; fnd--) {
            if (document.getElementById('s' + fnd).checked == true) {
                tt = fnd;
                chser = tt - 1;
                break;
            }
        }
    }
    localStorage.setItem("series", chser);
    changeseries(chser);
    changrser();
    if (document.getElementById("chkindiv").checked == true) {
        chkser();
    }

    jodiCalc(0);
    
var fnew=0;
series = localStorage.series;
for(var im=0;im<=9; im++)
{
$.each(storenum1, function (key, item) {
            if (item.num == document.getElementById('t_r' + im).id && item.lname==series && item.tik==lnamesel) {
                fnew = 1;
                document.getElementById('t_r' + im).value = item.qty;
            }


        });
        if (fnew == 0) {
            document.getElementById('t_r' + im).value = "";
        }

    }        
    
fnew=0;
for(var im=0;im<=9; im++)
{
$.each(storenum2, function (key, item) {
            if (item.num == document.getElementById('t_c' + im).id && item.lname==series && item.tik==lnamesel) {
                fnew = 1;
                document.getElementById('t_c' + im).value = item.qty;
            }


        });
        if (fnew == 0) {
            document.getElementById('t_c' + im).value = "";
        }

    }        
    for(var im=0;im<=99; im++){
          if(chser==0)
            {
        document.getElementById('t_' + im).style.backgroundColor = "rgb(237, 227, 166)";
              }
            if(chser==1)
            {
        document.getElementById('t_' + im).style.backgroundColor = "rgb(243, 180, 185)";
             }
               if(chser==2)
            {
        document.getElementById('t_' + im).style.backgroundColor = "rgb(243, 180, 242)";
             }
                    if(chser==3)
            {
        document.getElementById('t_' + im).style.backgroundColor = "rgb(189, 155, 251)";
             }
                 if(chser==4)
            {
        document.getElementById('t_' + im).style.backgroundColor = "rgb(155, 211, 251)";
             }
                   if(chser==5)
            {
        document.getElementById('t_' + im).style.backgroundColor = "rgb(155, 251, 214)";
             }

               if(chser==6)
            {
        document.getElementById('t_' + im).style.backgroundColor = "rgb(211, 251, 155)";
             }
             if(chser==7)
            {
        document.getElementById('t_' + im).style.backgroundColor = "rgb(251, 220, 155)";
             }
               if(chser==8)
            {
        document.getElementById('t_' + im).style.backgroundColor = "rgb(153, 253, 254)";
             }
                  if(chser==9)
            {
        document.getElementById('t_' + im).style.backgroundColor = "rgb(254, 248, 153)";
             }
    }

}

function changeseriesb(chser) {

    localStorage.setItem("rseries", chser);
    changeseries(chser);
}

function newlogin() {
    if (localStorage.lastname == undefined) {
    }
    else {
        document.getElementById("txt_UserName").value = localStorage.lastname;
        document.getElementById("txt_Password").value = localStorage.pass;
        if (localStorage.prints == "True") {

            isprint = 0;
        }
        else {
            document.getElementById("Button5").style.display = "none";
            document.getElementById("t_claim").style.display = "none";
            isprint = 1;
        }
       
        getlimitnew();
    }
}

function addser() {
    var series = localStorage.series;

    var rseries = localStorage.rseries;
    if (parseInt(rseries) < 9) {
      
        rseries = parseInt(rseries) + 1;

        localStorage.setItem("rseries", rseries);
        chkrser();
    }


    var chser = series + rseries;
    changeseries(chser);
     
    jodiCalc(0);
}
function subser() {

    var series = localStorage.series;

    var rseries = localStorage.rseries;
     


    if (parseInt(rseries) > 0) {

        rseries = parseInt(rseries) - 1;

        localStorage.setItem("rseries", rseries);
        chkrser();
        jodiCalc(0);
    }


    var chser = series + rseries;
    changeseries(chser);

}


//arrow

function jodiArrowkey(c, e) {

    var keyCode = e.keyCode;
    if (document.getElementById("chkgname4").checked == true) {
        if ((parseInt(c) % 2) == 0) {
            if (document.getElementById("t_" + c).value.length == 2) {
                keyCode = 39
            }
        }
    }

 
    var x = 0;
    var y = 0;
    var BoxArray = new Array(100);
    var i = 1;
    for (i = 0; i < 100; i++) {
        BoxArray[i] = "t_" + i;
    }
    if (keyCode == 37) {
        c = parseInt(c) - 1;
        if (c >= 0)
            document.getElementById(BoxArray[c]).focus();
        else
            document.getElementById(BoxArray[35]).focus();
    }
    if (keyCode == 38) {
        c = parseInt(c) - 10;
        if (c <= 99)
            document.getElementById(BoxArray[c]).focus();
        else
            document.getElementById(BoxArray[0]).focus();
    }
    //right
    if (keyCode == 39) {
        c = parseInt(c) + 1;
        if (c <= 99)
            document.getElementById(BoxArray[c]).focus();
        if (c == 100)
            document.getElementById(BoxArray[0]).focus();
    }
    if (keyCode == 40) {
        c = parseInt(c) + 10;
        if (c <= 99)
            document.getElementById(BoxArray[c]).focus();
        if (c == 100)
            document.getElementById(BoxArray[0]).focus();
    }
}
function jodiCArrowkey(c, e) {

    var keyCode = (e.which) ? e.which : e.keyCode;
    var x = 0;
    var y = 0;
    var BoxArray = new Array(10);
    var i = 1;
    for (i = 0; i < 10; i++) {
        BoxArray[i] = "t_c" + i;
    }
    //alert(keyCode);
    //left
    if (keyCode == 37) {
        c = parseInt(c) - 1;
        if (c >= 0)
            document.getElementById(BoxArray[c]).focus();
        else
            document.getElementById("t_r0").focus();
    }
    //right
    if (keyCode == 39) {
        c = parseInt(c) + 1;
        if (c <= 9)
            document.getElementById(BoxArray[c]).focus();
        if (c == 10)
            document.getElementById(BoxArray[0]).focus();
    }

}
function jodiRArrowkey(c, e) {

    var keyCode = (e.which) ? e.which : e.keyCode;
    var x = 0;
    var y = 0;
    var BoxArray = new Array(10);
    var i = 1;
    for (i = 0; i < 10; i++) {
        BoxArray[i] = "t_r" + i;
    }
    // alert(keyCode);
    //left
    if (keyCode == 38) {
        c = parseInt(c) - 1;
        if (c >= 0)
            document.getElementById(BoxArray[c]).focus();
        else
            document.getElementById("t_c0").focus();
    }
    //right
    if (keyCode == 40) {
        c = parseInt(c) + 1;
        if (c <= 9)
            document.getElementById(BoxArray[c]).focus();
        if (c == 10)
            document.getElementById(BoxArray[0]).focus();
    }
}



function setser() {

    if (series == undefined) {

        localStorage.setItem("series", initlocalser);
    }
    if (rseries == undefined) {
        localStorage.setItem("lname", document.getElementById('lbl_g0').innerHTML);
        localStorage.setItem("rseries", "0");
    }
    var series = localStorage.series;
    var rseries = localStorage.rseries;
    var chser = series + rseries;
    changeseries(chser);

    if (series == "0") {
        document.getElementById("s1").checked = true;

        localStorage.setItem("series", "0");
    }
    else if (series == "1") {
        document.getElementById("s2").checked = true;

        localStorage.setItem("series", "1");
    }
    else if (series == "2") {
        document.getElementById("s3").checked = true;

        localStorage.setItem("series", 2);
    }
    else if (series == "3") {
        document.getElementById("s4").checked = true;

        localStorage.setItem("series", "3");
    }
    else if (series == "4") {
        document.getElementById("s5").checked = true;

        localStorage.setItem("series", "4");
    }
    else if (series == "50") {
        document.getElementById("s6").checked = true;

        localStorage.setItem("series", "5");
    }
    else if (series == "6") {
        document.getElementById("s7").checked = true;

        localStorage.setItem("series", "6");
    }
    else if (series == "7") {
        document.getElementById("s8").checked = true;

        localStorage.setItem("series", "7");
    }
    else if (series == "8") {
        document.getElementById("s9").checked = true;

        localStorage.setItem("series", "8");
    }

    else if (series == "9") {
        document.getElementById("s10").checked = true;

        localStorage.setItem("series", "9");
    }


    if (rseries == "0") {
        document.getElementById("chkgname1").checked = true;

        localStorage.setItem("rseries", "0");
    }
    else if (rseries == "1") {
        document.getElementById("chkgname2").checked = true;

        localStorage.setItem("rseries", "2");
    }
    else if (rseries == "2") {
        document.getElementById("chkgname3").checked = true;

        localStorage.setItem("rseries", 2);
    }
    else if (rseries == "3") {
        document.getElementById("chkgname4").checked = true;

        localStorage.setItem("rseries", "3");
    }
    else if (rseries == "4") {
        document.getElementById("chkgname5").checked = true;

        localStorage.setItem("rseries", "4");
    }
    else if (rseries == "5") {
        document.getElementById("chkgname6").checked = true;

        localStorage.setItem("rseries", "5");
    }
    else if (rseries == "6") {
        document.getElementById("chkgname7").checked = true;

        localStorage.setItem("rseries", "6");
    }
    else if (rseries == "7") {
        document.getElementById("chkgname8").checked = true;

        localStorage.setItem("rseries", "7");
    }
    else if (rseries == "8") {
        document.getElementById("chkgname9").checked = true;

        localStorage.setItem("rseries", "8");
    }

    else if (rseries == "9") {
        document.getElementById("chkgname10").checked = true;

        localStorage.setItem("rseries", "9");
    }
}


//arrow
$(function () {

    document.getElementById('t_0').focus();
    newlogin();

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    $(document).keydown(function (e) {
   if (e.keyCode == 116) {
   window.location.reload();
   }

        if (e.keyCode == 34) {

           
//                addser();
//                if (document.getElementById("chkindiv").checked == true) {

//                    for (var i = 0; i < 10; i++) {
//                        document.getElementById('t_c' + i).value = "";
//                        document.getElementById('t_r' + i).value = ""; commented 1811
//                    }
//                    ckindivblock();
//                }


            return;
        }
        else if (e.keyCode == 33) {


//              
//                subser();
//  if (document.getElementById("chkindiv").checked == true) {
//                    for (var i = 0; i < 10; i++) {
//                        document.getElementById('t_c' + i).value = "";    commented 1881
//                        document.getElementById('t_r' + i).value = "";
//                    }
//                    ckindivblock();
//                }

            return;
        }

        else if (e.keyCode == 27) {
            Clear();
            return;
        }
        else if (e.keyCode == 115) {
            Report();
            return;
        }

        else if (e.keyCode == 113) {
            Reprint();
            return;
        }
        else if (e.keyCode == 119) {
            Result();
            return;
        }
        else if (e.keyCode == 120) {
            View();
            return;
        }
        else if (e.keyCode == 121) {
            Cancel();
            return;
        }
        isNumber(e);

        if (e.keyCode == 118) {

            calladdticketmulti();
        }
    });
});
var fst1 = 0;
function sortFunction(a, b) {
if (parseInt(a["num"]) === parseInt(b["num"])) {
    return 0;
}
else {
    return (parseInt(a["num"]) < parseInt(b["num"])) ? -1 : 1;
}
}

function callindivprint() {

    if (localStorage.lastname == undefined) {
        alert("Please Login");
        return;
    }
    if (localStorage.lastname == "") {
        alert("Please Login");
        return;
    }
   
    if (parseInt(document.getElementById('lbl_jdamt').innerHTML) > parseInt(document.getElementById('tlimit').innerHTML)) {
        alert("Inusfficent Points Please Refil Your Account");
        return;
    }
    var nos = "";
    var amt = 0;
   var lnamec=document.getElementById('lbl_g1').innerHTML;
   var fst = 0;      
var sorted = storenum.sort(sortFunction);
serallot = "70,60";
storenum = sorted;
$.each(storenum, function (key, item) {


 if (parseInt(item.qty) > 0) {
     if (item.num.toString().length != 4) {
         return;
     }
     var st = serallot.split(',');
     for (var mst = 0; mst < st.length - 1; mst++) {

         if (st[mst] == item.num.toString().substring(0, 1)) {
             fst = 1;
              }
     }
 }


});

$.each(storenum5, function (key, item) {
 fst == 0;

 if (parseInt(item.qty) > 0) {
     if (item.num.toString().length != 2) {
         alert("Invalid Numbering");
         fst = 1;
         fst1 = 1;
         return;
     }
     var st = serallot.split(',');
     for (var mst = 0; mst <= st.length - 1; mst++) {
         if (parseInt( item.num.toString().substring(0, 2))<=99) {
             fst = 1;
             errf = 1;

         }
     }
     if (fst == 0) {
         fst1 = 1;
         alert("Invalid Numbering");
         return;
     }
 }


});

//$.each(storenum, function (key, item) {

                                 
//                                        if (parseInt(item.qty) > 0 && item.lname=="Single") {
//                                            nos = nos + item.lname + "*" +item.num + "*" + item.qty + "$";
//                                            amt = parseFloat(document.getElementById('lbl_jdamt').innerHTML);
//                                        }
//                                    

//                                });

//$.each(storenum, function (key, item) {

//                                     
//                                        if (parseInt(item.qty) > 0 && item.lname=="Double") {
//                                            nos = nos + item.lname + "*" +item.num + "*" + item.qty + "$";
//                                            amt = parseFloat(document.getElementById('lbl_jdamt').innerHTML);
//                                        }
//                                    

//                                });
                            if(document.getElementById("chkgnameall").checked==true)
                        {         
                        for( imx= 0; imx<=9; imx++)
                        {
                                    $.each(storenum, function (key, item) {

                        
//                                                                              //  if (parseInt(item.qty) > 0 && item.lname=="Triple") {
                                                                                nos = nos + item.lname + "*" + imx+(item.num).substr(1) + "*" + item.qty + "$";
                                                                                amt = parseInt(document.getElementById('lbl_jdamt').innerHTML);
                                                                           // }
                                
                                
                                                   });
                                   }

                                   
                                
                                   
                                   

                            }
                               else
                                   {
                                      $.each(storenum, function (key, item) {

                        
                                                                            if (parseInt(item.qty) > 0 ) {
                                                                                nos = nos + item.lname + "*" +  (item.num)  + "*" + item.qty + "$";
                                                                                amt = parseFloat(document.getElementById('lbl_jdamt').innerHTML);
                                                                            }
                                                                            });  
                                                                            }


                                
     
     $.each(storenum5, function (key, item) {
         if (item.familyvalue == false) {
             if (item.allvalue == true) {
                 var tonos = item.num;
                 if (tonos.length == 3) {
                     storenum6.push({ lname: "Triple", num: item.num, qty: item.qty, ivalue: item.ivalue, allvalue: item.allvalue })
                     storenum6.push({ lname: "Double", num: item.num.substr(1), qty: item.qty, ivalue: item.ivalue, allvalue: item.allvalue })
                     storenum6.push({ lname: "Single", num: item.num.substr(2), qty: item.qty, ivalue: item.ivalue, allvalue: item.allvalue })
                 }
                 if (tonos.length == 2) {

                     storenum6.push({ lname: "Double", num: item.num, qty: item.qty, ivalue: item.ivalue, allvalue: item.allvalue })
                     storenum6.push({ lname: "Single", num: item.num.substr(1), qty: item.qty, ivalue: item.ivalue, allvalue: item.allvalue })
                 }
                 if (tonos.length == 1) {


                     storenum6.push({ lname: "Single", num: item.num.substr(1), qty: item.qty, ivalue: item.ivalue, allvalue: item.allvalue })
                 }


             }

             else {
                 
                 
                         storenum6.push({ lname: item.lname, num: "60" + item.num, qty: item.qty, ivalue: item.ivalue, allvalue: item.allvalue })
                  storenum6.push({ lname: item.lname, num: "70" +item.num, qty: item.qty, ivalue: item.ivalue, allvalue: item.allvalue })
             }
         }

         else if (item.familyvalue == true) {
             if (item.allvalue == true) {
                 var tonos = item.num;
                 if (tonos.length == 3) {
                     FamilyFillingnos(item.num, item.qty, item.ivalue, item.allvalue);
                     FamilyFillingnos(item.num.substr(1), item.qty, item.ivalue, item.allvalue);
                 }
                 if (tonos.length == 2) {

                     FamilyFillingnos(item.num, item.qty, item.ivalue, item.allvalue);
                 }
                 if (tonos.length != 4) {



                     errf = 1;
                 //    return;


                 }


             }

             else {
                 if (item.num.length > 1) {
                     FamilyFillingnos(item.num, item.qty, item.ivalue, item.allvalue);
                 }
                 if (item.num.length != 4) {
                     errf = 1;
                     //return;
                 }
             }
         }

     });  
     
                                                   

     if(errf==1)
     {
       
  //      return;
     }
     var sorted1 = storenum6.sort(sortFunction);
     storenum6=sorted1
    $.each(storenum6, function (key, item) {
        if (parseInt(item.qty) > 0 ) {
               nos = nos + item.lname + "*" +  (item.num)  + "*" + item.qty + "$";
                  amt = parseFloat(document.getElementById('lbl_jdamt').innerHTML);
            }
        




    });

//          $.each(storenum6, function (key, item) {
//            if (parseInt(item.qty) > 0 && item.lname=="Double") {
//                   nos = nos + item.lname + "*" +  (item.num)  + "*" + item.qty + "$";
//                      amt = parseFloat(document.getElementById('lbl_jdamt').innerHTML);
//                }
//            




//        });
//      $.each(storenum6, function (key, item) {
//            if (parseInt(item.qty) > 0 && item.lname=="Single") {
//                   nos = nos + item.lname + "*" +  (item.num)  + "*" + item.qty + "$";
//                      amt = parseFloat(document.getElementById('lbl_jdamt').innerHTML);
//                }
//            




//        });

                         
    Addmultiticket(nos, amt);
}
function calladdticketmulti() {
    if (document.getElementById("chkindiv").checked == true) {
        callindivprint();
        return;
    }
    if (localStorage.lastname == undefined) {
        alert("Please Login");
        return;
    }
    if (localStorage.lastname == "") {
        alert("Please Login");
        return;
    }
  
   
    if (parseInt(document.getElementById('lbl_jdamt').innerHTML) > parseInt(document.getElementById('tlimit').innerHTML)) {
        alert("Inusfficent Points Please Refil Your Account");
        return;
    }
    var nos = "";
    var amt = 0;
    for (var j = 0; j < 100; ) {
        var tm = document.getElementById('t_' + j).value;

        if (parseInt(tm) > 0) {
            amt = parseInt(amt) + parseInt(document.getElementById('t_' + j).value);
            for (var i = 1; i < 11; i++) {
                var firstser = "";
                var sernos = "";
                if (document.getElementById("chkgname" + i).checked == true) {
                    firstser = document.getElementById('s_' + j).innerHTML.substring(0, 1);
                    var tonos = parseInt(i) - 1;
                    var tochoose = document.getElementById('s_' + j).innerHTML;
                    tochoose = tochoose.substring(2);
                    for (var sm = 1; sm <= 10; sm++) {
                        if (document.getElementById("s" + sm).checked == true) {
                            var lnamec = document.getElementById('lbl_g' + tonos).innerHTML; ;
                            var tosm = sm - 1;
                            sernos = tosm.toString() + tonos + tochoose;
                            nos = nos + lnamec + "*" + sernos + "*" + document.getElementById('t_' + j).value + "$";
                        }
                    }
                }
            }


        }
        j++;
    }
    Addmultiticket(nos, amt);
}

function callprint() {


    // var prtContent = document.getElementById("prn_id");

    //var WinPrint = window.open('', '', 'left=0,top=0,width=400,height=400,toolbar=0,scrollbars=0,status =0');
    var prtContent = document.getElementById("prn_id").innerHTML;
    var x = screen.width / 2 - 200 / 2;
    var y = screen.height / 2 - 200 / 2;
    WinPrint = window.open('', '', ' width=500,height=300,toolbar=0,scrollbars=0,status =0 left=' + x + ',top=' + y);

    WinPrint.document.write(prtContent);
    if (isprint == 0) {
        WinPrint.print();

        WinPrint.close();
    }

}


function callwin() {


    var prtContent = document.getElementById("win_id").innerHTML;
    var x = screen.width / 2 - 200 / 2;
    var y = screen.height / 2 - 200 / 2;
    myWindow = window.open('', '', 'left=0,top=0,width=200,height=200,toolbar=0,scrollbars=0,status =0 left=' + x + ',top=' + y);

    myWindow.document.write(prtContent);
    claimdone();

}

function zeroPad(num, places) {
    var zero = places - num.toString().length + 1;
    return Array(+(zero > 0 && zero)).join("0") + num;
}
var myWindow;

function claimdone() {

    var xhr = new XMLHttpRequest();
    var login = localStorage.lastname;
    var pass = localStorage.pass;
    var lname = localStorage.lname;
    var storeclaim = storeb;
var token= localStorage.token;
    var bcode = document.getElementById("t_claim").value;
    var api_url = "https://shreerashibhavishya.com/play1060api/api/products/claimokjodi?login=" + login + "&nos=" + storeb + "&amt=" + "" + "&lname=" + lname + "&token=" + token
    storeb = "";
    var userid = "";
    var crtime = "";
    var prtContent = document.getElementById("win_id");
    prtContent.innerHTML = "function closeWin() {myWindow.close()}";
    prtContent.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    var i = 0;
    var btrans = "";
    var qty = 0;
    var totamt = 0;
    var ldname = "";
    $.ajax({
        url: api_url,
        type: 'GET',
        crossOrigin: true,
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, item) {


                totamt = totamt + parseInt(item.winamt);




                i++;
            });
            if (totamt > 0) {
                alert("Points Credited " + totamt );
                getlimitnew();
                getTokennew("Claim", storeclaim);
            }
            else {
                alert("Not a winning Ticket");
            }





        },
        error: function (request, message, error) {

        }
    });
}

function claimnew(evt)
{
evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode ==13) {
    
      
         claim();
 }
}


function claim() {

    var xhr = new XMLHttpRequest();
    var login = localStorage.lastname;
    var pass = localStorage.pass;
    var lname = localStorage.lname;
    var bcode = document.getElementById("t_claim").value;
    storeb = bcode;
var token= localStorage.token;
    var api_url = "https://shreerashibhavishya.com/play1060api/api/products/claimjodi?login=" + login + "&nos=" + bcode + "&amt=" + "" + "&lname=" + lname + "&token=" + token
    var userid = "";
    var crtime = "";
    var prtContent = document.getElementById("win_id");
    prtContent.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    var i = 0;
    var btrans = "";
    var qty = 0;
    var totamt = 0;
    var ldname = "";
    var invalid = 0;
    $.ajax({
        url: api_url,
        type: 'GET',
        crossOrigin: true,
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, item) {
                document.getElementById("t_claim").value = "";
                if (item.lname == "Invalid Ticket") {
                    alert("Ticket is not issued from this Terminal");
                    invalid = 1;
                    return;

                }

                if (item.lname == "1") {
                    alert("Result not Declared Yet");
                    invalid = 1;
                    return;

                }
                if (item.lname == "2") {
                    alert("Ticket Already Claimed :-" + item.claimedtime + "- Claimed Amt -" + item.claimamt);
                    invalid = 1;
                    return;

                }
                if (item.lname == "5") {
                    alert("Invalid Barcode");
                    invalid = 1;
                    return;

                }

                if (item.lname == "3") {
                    alert("Ticket Already Canceled :-" + item.canceltime);
                    invalid = 1;
                    return;

                }

                totamt = totamt + parseInt(item.winamt);

                i++;
            });

            prtContent.innerHTML = prtContent.innerHTML + "</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Winnig Point. " + totamt.toFixed(2);


            prtContent.innerHTML = prtContent.innerHTML + "<button name='bt_claim' id='bt_claim' autofocus onclick='self.close();'  value='Report'>Claim</button>";
           
            if (invalid == 0) {
if(totamt.toFixed(2)==0)
{
alert("Not a Winning Ticket")
return;
}
               // alert("Winnig Point. " + totamt.toFixed(2));
                claimdone();
            }

        },
        error: function (request, message, error) {

        }
    });
}


function Addticket(nos, amt) {

    var xhr = new XMLHttpRequest();
    var login = localStorage.lastname;
    var pass = localStorage.pass;
    var lname = localStorage.lname;
    var api_url = "https://shreerashibhavishya.com/play1060apitest/api/products/Addticketjodi?login=" + login + "&nos=" + nos + "&amt=" + amt + "&lname=" + lname
    var userid = "";
    var crtime = "";
    var prtContent = document.getElementById("prn_id");
    prtContent.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    var i = 0;
    var btrans = "";
    var qty = 0;
    var totamt = 0;
    var ldname = "";
    $.ajax({
        url: api_url,
        type: 'GET',
        crossOrigin: true,
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, item) {
                if (i == 0) {
                    if (parseFloat(item.finalamt) <= 0) {
                        alert("Inusfficent Points Please Refil Your Account");
                        return;
                    }


                    userid = item.userid;
                    prtContent.innerHTML = prtContent.innerHTML + "</br><span style='font-size: 10pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "D.D." + gettodaydate(item.drawdate) + "</span>"
                    prtContent.innerHTML = prtContent.innerHTML + "</br><span style='font-size: 10pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "D.T :" + zeroPad(item.drhrs, 2) + ":" + zeroPad(item.drmins, 2) + "</span>"
                    prtContent.innerHTML = prtContent.innerHTML + "</br><span style='font-size: 10pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "C.T.:" + zeroPad(item.crhrs, 2) + ":" + zeroPad(item.crmins, 2) + ":" + zeroPad(item.crsec, 2); +"</span>"
                    prtContent.innerHTML = prtContent.innerHTML + "</br><span style='font-size: 10pt;font-weight: bold;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Retailer Code.  " + userid; +"</span>"
                    prtContent.innerHTML = prtContent.innerHTML + "</br><span style='font-size: 10pt;font-weight: bold;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qty &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qty " + "</span>"
                }

                if (ldx == "Single") {
                    lprint = "SG";
                }
                else if (ldx == "Double") {
                    lprint = "DO";
                }
                else if (ldx == "Triple") {
                    lprint = "TR";
                }
                if (i == 0) {
                    prtContent.innerHTML = prtContent.innerHTML + "</br> <span style='font-size: 9pt;font-weight: bold;margin-left:40px; font-family:verdana;'>" + lprint + "</span> ";
                }
                else if (item.lname != ldname) {
                    prtContent.innerHTML = prtContent.innerHTML + "</br> <span style='font-size: 9pt;font-weight: bold;margin-left:40px; font-family:verdana;'>" + lprint + "</span> ";
                }
                if (item.lname != ldname) {

                    ldname = item.lname;
                }
                if ((i % 2) == 0) {
                    prtContent.innerHTML = prtContent.innerHTML + "</br> <span style='font-size: 10pt;font-weight: bold;'>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " + spacePad(item.Xaxis, 3) + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;" + item.nosplayed + "" + "</span>";
                }
                else {
                    prtContent.innerHTML = prtContent.innerHTML + "<span style='font-size: 10pt;font-weight: bold;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " + spacePad(item.Xaxis, 3) + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;" + item.nosplayed + "" + "</span>";
                }

                totamt = parseFloat(item.finalamt) + parseFloat(totamt);
                btrans = item.bulktransid;
                qty = parseInt(item.nosplayed) + parseInt(qty);

                i++;
            });

            prtContent.innerHTML = prtContent.innerHTML + "</br><span style='font-size: 10pt;font-weight: bold;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Point. " + totamt.toFixed(2) + "</span>";
            prtContent.innerHTML = prtContent.innerHTML + "</br><span style='font-size: 10pt;font-weight: bold;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Qty. " + qty + "</span>";

            prtContent.innerHTML = prtContent.innerHTML + "</br></br></br><svg id='barcode'></svg>";
            prtContent.innerHTML = prtContent.innerHTML + "</br><span style='font-size: 10pt;font-weight: bold;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp For Amusment Purpose Only" + "</span>";

            JsBarcode("#barcode", btrans, {



                height: 20,
                fontOptions: "bold"

            });

            callprint();

            newlogin();
        },
        error: function (request, message, error) {

        }
    });
}


var storenum=[];
var storenum1=[];

var storenum2=[];
var storenum5=[];
var storenum6=[];
function Addmultiticket(nos, amt) {
if(parseInt(lbl_jdqty)<10)
{
alert("Playing Point Should be Equal to or More than 11");

        return;
}
if (fst1 == 1) {
 

   return;
}
    if (document.getElementById('RemainTime').innerHTML == "00:00:05") {
        alert("Timeout- Draw Time Over");
        resetdraw();
Clear();
        return;
    }
    if (document.getElementById('RemainTime').innerHTML == "00:00:04") {
        alert("Timeout- Draw Time Over");
        resetdraw();
Clear();
        return;
    }
    if (document.getElementById('RemainTime').innerHTML == "00:00:03") {
        resetdraw();
Clear();
        alert("Timeout- Draw Time Over");
        return;
    }
    if (document.getElementById('RemainTime').innerHTML == "00:00:02") {
        resetdraw();
Clear();
        alert("Timeout- Draw Time Over");
        return;
    }
    if (document.getElementById('RemainTime').innerHTML == "00:00:01") {
Clear();
        resetdraw();
        alert("Timeout- Draw Time Over");
        return;
    }
    if (document.getElementById('RemainTime').innerHTML == "00:00:00") {
        alert("Timeout- Draw Time Over");
Clear();
        resetdraw();
        return;

    }
    if (seldraw == "Drawover") {
        alert("Draw Over Good Night");
    }
    var bt = "";
    var xhr = new XMLHttpRequest();
    var login = localStorage.lastname;
    var pass = localStorage.pass;
    var lname = localStorage.lname;
    var draws = document.getElementById("ms").value;
    var obj1 = [];
    var objprint = [];
    var requestid = "";
    var token = localStorage.token;
    obj1.push({ login: login, nos: nos, amt: amt, lname: lname, seldraw: seldraw, token: token })

    //var api_url = "http://metro3card.com/api/api/products/Addticketjodinew?login=" + login + "&nos=" + nos + "&amt=" + amt + "&lname=" + lname + "&drs=" + seldraw
    var userid = "";
    var crtime = "";
    var prtContent = document.getElementById("prn_id");
    var btn = document.getElementById("btnsubmit");
    btn.disabled = true;
    var url1 = "https://shreerashibhavishya.com/play1060apitest/api/products/Addticketjodinewpost";
    prtContent.innerHTML = "";
    var i = 0;
    var btrans = "";
    var qty = 0;
    var totamt = 0;
    var ldname = "";
    var ikx = 1;
    var inew = 0;
    var oldxaxis = "";
    var oldyaxis = "";
    var op = JSON.stringify(obj1)
    var Windis;
    var tamt = document.getElementById('lbl_jdamt').innerHTML;
    var totqty = document.getElementById('lbl_jdqty').innerHTML;
            $.ajax({
        url: url1,
        type: 'POST',
        data: op,
        contentType: 'application/json',
        datatype: 'json',
        timeout: 200000,
        beforeSend: function () {

            $("#loading-overlay").show();
            disableall();
            //  $("#loading-overlay").dialog("open"); 
        },

        success: function (data) {
            storenum = [];
            Clear();
            newlogin();
            $("#loading-overlay").hide();
            enableall();
            document.getElementById("chkindiv").checked = true;
            $.each(data, function (key, item) {

                document.getElementById("chkindiv").disabled = false;
                if (item.lname == "In Request Past Draw Time Included So Full Request Can not  Proceed ") {
                    alert(item.lname)
                    return;
                }


                var btn = document.getElementById("btnsubmit");
                btn.disabled = false;
                if (i == 0) {
                    if (parseFloat(item.finalamt) <= 0) {
                        alert("Inusfficent Points Please Refil Your Account");
                        return;
                    }
                    userid = item.userid;
                    requestid = item.requestid;
                    btrans = item.bulktransid;

                     prtContent.innerHTML = "<span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'> For Amusment  Only</span>";
                     prtContent.innerHTML =  prtContent.innerHTML + "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "D.D." + gettodaydate(item.drawdate) + "</span>"
                     prtContent.innerHTML =  prtContent.innerHTML + "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "D.T :" + zeroPad(item.drhrs, 2) + ":" + zeroPad(item.drmins, 2) + "</span>"
                     prtContent.innerHTML =  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "C.T.:" + zeroPad(item.crhrs, 2) + ":" + zeroPad(item.crmins, 2) + ":" + zeroPad(item.crsec, 2); +"</span>"
                     prtContent.innerHTML =  prtContent.innerHTML + "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>Retailer Code.  " + userid;




                }




                if (i > 0 && btrans != item.bulktransid) {
                     prtContent.innerHTML =  prtContent.innerHTML + "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>Qty. " + qty + "&nbsp;Total Pt. " + totamt.toFixed(2) + "</span>";
                     prtContent.innerHTML =  prtContent.innerHTML + "</br><span style='font-size: 8pt;font-weight: bold; margin-left:40px;font-family:verdana;'>" + "G.id :-" + requestid + "</span>";



                                    var bid = "barcode" + inew;

            prtContent.innerHTML = prtContent.innerHTML + "</br><span style='margin-left:20px;'> <svg id=" + bid + "></svg><span>";


            JsBarcode("#barcode" + inew, btrans, {



                format: "CODE128",

                width: 2,
                height: 30,
                displayValue: true

            });
                    qty = 0;
                    totamt = 0;
                    if (isprint == 0) {
                        callprint();
                        //window.external.AnotherMethod(prtContent.innerHTML);
                    }
                   // prtContent = prtContent + bcodex.innerHTML + "$";
                    btrans = item.bulktransid;
                    inew++;

                     prtContent.innerHTML=  prtContent.innerHTML+ "<span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'> For Amusment  Only</span>";
                     prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "D.D." + gettodaydate(item.drawdate) + "</span>"
                     prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "D.T :" + zeroPad(item.drhrs, 2) + ":" + zeroPad(item.drmins, 2) + "</span>"
                     prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>" + "C.T.:" + zeroPad(item.crhrs, 2) + ":" + zeroPad(item.crmins, 2) + ":" + zeroPad(item.crsec, 2); +"</span>"
                     prtContent.innerHTML=  prtContent.innerHTML+ "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>Retailer Code.  " + userid;

                    i = 0;

                }
                lprint = "";
                ldx = item.lname;
                if (ldx == "Single") {
                    lprint = "SG";
                }
                else if (ldx == "Double") {
                    lprint = "DO";
                }
                else if (ldx == "Triple") {
                    lprint = "TR";
                }
                if (i == 0) {
                     prtContent.innerHTML=  prtContent.innerHTML+ "</br> <span style='font-size: 8pt;font-weight: bold;margin-left:40px; font-family:verdana;'>" + lprint + "</span> ";
                }
                else if (item.lname != ldname) {
                     prtContent.innerHTML=  prtContent.innerHTML+ "</br> <span style='font-size: 8pt;font-weight: bold;margin-left:40px; font-family:verdana;'>" + lprint + "</span> ";
                }
                if (item.lname != ldname) {

                    ldname = item.lname;
                }
                if ((i % 3) == 0) {
                     prtContent.innerHTML =  prtContent.innerHTML + "</br> <span style='font-size: 8pt;font-weight: bold;margin-left:40px; font-family:verdana;'>" + spacePad(item.Xaxis, 3) + "*" + spacesPad(item.nosplayed, 3) + "" + "</span>";
                }
                else {
                     prtContent.innerHTML =  prtContent.innerHTML + "<span style='font-size: 8pt;font-weight: bold;font-family:verdana;'> &nbsp;&nbsp; " + spacePad(item.Xaxis, 3) + "*" + spacesPad(item.nosplayed, 3) + "" + "</span>";
                }

                totamt = parseFloat(item.finalamt) + parseFloat(totamt);


                qty = parseInt(item.nosplayed) + parseInt(qty);
                i++;
            });
             prtContent.innerHTML =  prtContent.innerHTML + "</br><span style='font-size: 8pt;font-weight: bold;margin-left:40px;font-family:verdana;'>Qty. " + qty + "&nbsp;Total Pt. " + totamt.toFixed(2) + "</span>";
             prtContent.innerHTML =  prtContent.innerHTML + "</br><span style='font-size: 8pt;font-weight: bold; margin-left:40px;font-family:verdana;'>" + "G.id :-" + requestid + "</span>";

                          var bid = "barcode" + inew;

            prtContent.innerHTML = prtContent.innerHTML + "</br><span style='margin-left:20px;'> <svg id=" + bid + "></svg><span>";


            JsBarcode("#barcode" + inew, btrans, {



                format: "CODE128",

                width: 2,
                height: 30,
                displayValue: true

            });

            if (isprint == 0) {
                 callprint();
             //   window.external.AnotherMethod(prtContent);
                //boundAsync.showMessage(prtContent.innerHTML);  
            }
            else {
                alert("your Request has been proccessed :- G.ID :-" + requestid + " Total Qty:-" + totqty + "- Total Points:-" + tamt);
            }
            newlogin();
            getTokennew("Print", requestid);
        },
        error: function (request, message, error) {

        }
    });
}
function checkt() {
    var t = parseInt(document.getElementById("tcheck").value)
    var select = document.getElementById("ms");
    var selop = "";

    var Values = new Array();


    for (var mt = 0; mt < t; mt++) {



        select.options[i].selected = true;


    }

    //


    $("#ms").trigger('change');

}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function chkallseries()
 {


          if (document.getElementById("chkgnameall").checked == true) {
          if (document.getElementById("chkgname4").checked == true) {
          document.getElementById("chkgnameall").disabled=true;
          return;
          }
                        for (var i = 1; i <= 10; i++) {
                          
           
                               document.getElementById("s" + i).disabled=true;
                                 document.getElementById("s" + i).checked=false;
        
                        }
    }
    else {
        for (var i = 1; i <= 10; i++) {
            document.getElementById("s" + i).disabled=false;
        }
      
        document.getElementById("s1").checked = true;
    }

    jodiCalc(0);
}
function chkindiv() {
    if (parseInt(document.getElementById("lbl_jdqty").innerHTML) > 0)
    {
        document.getElementById("chkindiv").checked = true;
        return;
    }
    document.getElementById("chkindiv").disabled = true;
    document.getElementById("Chkallg").checked =false;
    document.getElementById("chkgnameall").checked = false;
    
     
}
function chkallg1() {
    if (document.getElementById("chkindiv").checked == true) {
        document.getElementById("Chkallg").checked = false;
        return;
    }
    if (document.getElementById("Chkallg").checked == true) {
    //    document.getElementById("chkindiv").checked = false;
        for (var i = 1; i <= 10; i++) {
            document.getElementById("chkgname" + i).checked = true;
            document.getElementById("chkindiv").checked = false;
        }
    }
    else {
        for (var i = 1; i <= 10; i++) {
            document.getElementById("chkgname" + i).checked = false;
        }
     
        var se = localStorage.rseries;
        se = parseInt(se) + 1
        document.getElementById("chkgname" + se).checked = true;
    }

    jodiCalc(0);
}
