$(document).ready(function () {
    timefunction();
    //setInterval(resultcountfunction, 5000);
    setInterval(timefunction, 5000);
    setInterval("timecountdown()", 1000);
});
var NAVRATNA1;
var NAVRATNA2;
var NAVRATNA3;
var NAVRATNA4;
var RAJARANI1;
var RAJARANI2;

var RAJARANI3;
var RAJARANI4;
var DHANLAXMI1;
var DHANLAXMI2;
var DHANLAXMI3;
var DHANLAXMI4;

var RAJSHREE1;
var RAJSHREE2;

var RAJSHREE3;
var RAJSHREE4;
var MAINSTAR1;
var MAINSTAR2;
var MAINSTAR3;
var MAINSTAR4;
var SHUBLAXMI1;
var SHUBLAXMI2;
var SHUBLAXMI3;
var SHUBLAXMI4;

var myVar;
var LABHLAXMI1;
var LABHLAXMI2;
var LABHLAXMI3;
var LABHLAXMI4;
var GOLDEN1;
var GOLDEN2;
var GOLDEN3;
var GOLDEN4;
var ROYAL1;
var ROYAL2;
var ROYAL3;
var ROYAL4;
var CHETAK1;
var CHETAK2;
var CHETAK3;
var CHETAK4;

function Getdrawres() {

    var series = localStorage.series;

    var api_url = "https://www.goldwinrashi.com/rashi1060api/api/products/getdrawres?ser=" + series



    $.ajax({
        url: api_url,
        type: 'GET',
        crossOrigin: true,
        dataType: 'json',
        success: function (data) {

            $.each(data, function (key, item) {

                document.getElementById("lbl_r1").innerHTML = item.NAVRATNA;
                document.getElementById("lbl_r2").innerHTML = item.ROYAL;
                document.getElementById("lbl_r3").innerHTML = item.RAJARANI;
                document.getElementById("lbl_r4").innerHTML = item.CHETAK;
                document.getElementById("lbl_r5").innerHTML = item.RAJSHREE;
                document.getElementById("lbl_r6").innerHTML = item.GOLDEN;
                document.getElementById("lbl_r7").innerHTML = item.MAINSTAR;
                document.getElementById("lbl_r8").innerHTML = item.SHUBLAXMI;
                document.getElementById("lbl_r9").innerHTML = item.DHANLAXMI;
                document.getElementById("lbl_r10").innerHTML = item.LABHLAXMI;


                document.getElementById("hd_nextime").value = item.drhrs;
            });





        },
        error: function (request, message, error) {

        }
    });

}

function getres() {

    //setting up some sample set sof things we can make a slot machine of
    var numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    var images = ['<img src="images/seven.png">', '<img src="images/banana.png">', '<img src="images/cherries.png">', '<img src="images/lemon.png">', '<img src="images/orange.png">', '<img src="images/plum.png">', '<img src="images/watermelon.png">'];
    var misc = ['!', 'K', '*', '#', '@', '$'];
    var callbackFunction = function (result) {

    }
    var series = localStorage.series;
    var api_url = "https://www.goldwinrashi.com/rashi1060api/api/products/getresult?ser=" + series


    var i = 0;
    $.ajax({
        url: api_url,
        type: 'GET',
        crossOrigin: true,
        dataType: 'json',
        success: function (data) {

            $.each(data, function (key, item) {
                var drd = item.NAVRATNA.split(' ');

                if (item.$id == "1") {
                    NAVRATNA1 = drd[0];
                    NAVRATNA2 = drd[1];
                    NAVRATNA3 = drd[2];


                }


                clearInterval(myVar);
 


            });





        },
        error: function (request, message, error) {

        }
    });

}

function GetDateTime() {
    var series = localStorage.series;
    var api_url = "https://www.goldwinrashi.com/rashi1060api/api/products/getgodres6"

    var td = "";
    var im = 0;
    $.ajax({
        url: api_url,
        type: 'GET',
        crossOrigin: true,
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, item) {
                if (item.lname.toString().substring(8, 9) == "A") {
                    im = im + 1;
                }



            });
            im = im * 10.5;
            td = "<div class='divTable' style='overflow:auto;width:" + im + "%' >"
            td = td + "<div class=divTableBody>";
            td = td + "<div class=divTableRow><div class=divTableCell1> <img src='https://www.goldwinrashi.com//desktoppng/time_1.png'   style='width:60px;height:40px'> </div>"
            var jm = 2;
            $.each(data, function (key, item) {
                if (item.lname.toString().substring(8, 9) == "A") {
                    if (jm >= 6) {
                        jm = 2;
                    }
                    if (jm % 2 == 0) {
                        td = td + "<div class=divTableCell1><div class=container1> <img src='https://www.goldwinrashi.com//desktoppng/time_1.png'   style='width:60px;height:40px'> <div class=centered>" + item.drhrs + ":" + zeroPad(item.drmins, 2) + "</div></div></div>"
                    }
                    else {
                        td = td + "<div class=divTableCell1><div class=container1> <img src='https://www.goldwinrashi.com//desktoppng/time_2.png'   style='width:60px;height:40px'> <div class=centered>" + item.drhrs + ":" + zeroPad(item.drmins, 2) + "</div></div></div>"
                    }
                    jm = jm + 1;

                }




            });
            td = td + "</div><div class=divTableRow><div class=divTableCell1><img src='601.png'  style= 'height:50px;width:50px;background-color:transparent'/></div>"
            $.each(data, function (key, item) {
                if (item.lname.toString().substring(8, 9) == "A") {
                    td = td + "<div class=divTableCell1><div class=container> <img src='https://www.goldwinrashi.com//desktoppng/rnum.png'   style='width:60px;height:40px'> <div class=centered1>" + item.nosplayed + "</div></div></div>"

                }


            });
            td = td + "</div><div class=divTableRow> <div class=divTableCell1> <img src='70gh.png'  style= 'height:50px;width:50px'/> </div>"
            $.each(data, function (key, item) {
                if (item.lname.toString().substring(8, 9) == "B") {
                    td = td + "<div class=divTableCell1><div class=container> <img src='https://www.goldwinrashi.com//desktoppng/rnum.png'   style='width:60px;height:40px'> <div class=centered1>" + item.nosplayed + "</div></div></div>"
                }



            });
            td = td + "</div></div></div>"


            document.getElementById("dispres").innerHTML = td;
        },
        error: function (request, message, error) {

        }
    });
 
}

var timetable = "";


function resultcountfunction() {
    $.ajax({
        type: "POST",
        contentType: "application/json",
        url: "PlayRoom/AjaxHandler.aspx/LastResultCounter",
        dataType: "json",
        success: function (data) {
            var ncount = data.d;
            var lcount = document.getElementById('hd_rocounter').value;
            if (ncount != lcount) {
 
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            // alert(errorThrown);
        }
    });
}
function timefunction() {
    //    $.ajax({
    //        type: "POST",
    //        contentType: "application/json",
    //        url: "PlayRoom/AjaxHandler.aspx/GetServerTime",
    //        dataType: "json",
    //        success: function (data) {
    //            timetable = data.d;
    //            var arr = timetable.split('_');
    //            if (arr.length == 5) {
    //            }
    //            else {
    //                arr[0] = "00:00:00"; arr[1] = "00:00:00"; arr[2] = "00:00:00"; arr[3] = "dd:MM:YYYY"; arr[4] = "00:00:00";
    //            }
    //            document.getElementById('NextDrowTime').innerHTML = arr[0];
    //            document.getElementById('LastDrawTime').innerHTML = arr[1];
    //            document.getElementById('RemainTime').innerHTML = arr[2];
    //            document.getElementById('NowTime').innerHTML = arr[3];
    //            document.getElementById('TodatyDate').innerHTML = arr[4];
    //            var ltime = document.getElementById('hd_nextime').value;
    //            if (arr[0] != ltime) {
    //                location.reload();
    //            }
    //        },
    //        error: function (XMLHttpRequest, textStatus, errorThrown) {
    //            // alert(errorThrown);
    //        }
    //    });

    var api_url = "https://www.goldwinrashi.com/rashi1060api/api/products/GetServerTime"



    $.ajax({
        url: api_url,
        type: 'GET',
        crossOrigin: true,
        dataType: 'json',
        success: function (data) {

            $.each(data, function (key, item) {

                document.getElementById('NextDrowTime').innerHTML = item.NextDrowTime;
                //  document.getElementById('LastDrawTime').innerHTML = item.LastDrawTime;
                document.getElementById('RemainTime').innerHTML = item.RemainTime;
                document.getElementById('NowTime').innerHTML = item.NowTime;
                document.getElementById('TodatyDate').innerHTML = item.TodatyDate;
                var ltime = document.getElementById('hd_nextime').value;

                if (document.getElementById("NowTime").innerHTML == "00") {
                    disableall();
                }
                var select = document.getElementById("ms");
                for (var i = 0; i < tickname.length; i++) {
                    var cur = document.getElementById("NowTime").innerHTML.split(' ');
                    var selcur = tickname[i].split(':');
                    var curt = cur[0].split(':');
                    var curhrs = 0;
                    if (cur[1] == "P.M.") {
                        curhrs = parseInt(curt[0]) + 12;
                    }
                    else {
                        curhrs = curt[0];

                    }

                }


                if (item.RemainTime == "00:04:55") {


                }

                if (item.NextDrowTime != ltime) {
                    GetDateTime();

                }

                if (item.RemainTime == "00:14:00") {

                    Getdrawres();
                }

            })




        },
        error: function (request, message, error) {

        }
    });

}
function timecountdown() {

   
    var time = document.getElementById('RemainTime').innerHTML;
    if (time != "Time Out") {
        var timearr = time.split(':')
        var h = timearr[0].trim();
        var m = timearr[1].trim();
        var s = timearr[2].trim();
        if (parseInt(s) > 0) {
            s = parseInt(s) - 1;
        }
        else {
            if (parseInt(m) > 0) {

                s = 59;
                m = parseInt(m) - 1;
            }
            else {
                if (parseInt(h) > 0) {
                    s = 59;
                    m = 59;
                    h = parseInt(h) - 1;
                }
                else {
 
                }
            }
        }
        if (h.toString().length < 2)
            h = "0" + h;
        if (m.toString().length < 2)
            m = "0" + m;
        if (s.toString().length < 2)
            s = "0" + s;
        document.getElementById('RemainTime').innerHTML = h + ":" + m + ":" + s;

        if (document.getElementById('RemainTime').innerHTML == "00:14:59") {

            //window.location.href = "sample.html";
            GetDateTime();
            //myVar = setInterval(getres, 1000);
        }


        if (document.getElementById('RemainTime').innerHTML == "00:14:00") {

            Getdrawres();
        }
    }
    var time1 = document.getElementById('NowTime').innerHTML;
    var timearr1 = time1.split(':')
    var h1 = timearr1[0].trim();
    var m1 = timearr1[1].trim();
    var s1 = timearr1[2].trim();
    var tsarr = s1.split(' ')
    s1 = tsarr[0].trim();
    var ts = tsarr[1].trim();
    if (parseInt(s1) < 60) {
        s1 = parseInt(s1) + 1;
        // alert(s);
    }
    else {
        if (parseInt(m1) < 59) {
            s1 = 0;
            m1 = parseInt(m1) + 1;
        }
        else {
            s1 = 0;
            m1 = 0;
            h1 = parseInt(h1) + 1;
        }
    }
    if (h1.toString().length < 2)
        h1 = "0" + h1;
    if (m1.toString().length < 2)
        m1 = "0" + m1;
    if (s1.toString().length < 2)
        s1 = "0" + s1;
    document.getElementById('NowTime').innerHTML = h1 + ":" + m1 + ":" + s1 + " " + ts;
}