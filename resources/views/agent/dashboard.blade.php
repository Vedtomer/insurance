@extends('agent.layout.agentmain')
@section('section')

<link rel="stylesheet" href="">

{{-- <script src="{{ asset('table.js') }}"></script> --}}
<style>
    .btns {
        float: right;
        margin-bottom: 8px;
    }

    .btn {
        border-radius: 0px;
    }

    td {
        /* border: 1px solid black; */
        height: 80px;
        width: 100px;

    }

    th {
        /* border: 1px solid black; */
        height: 2px;
        width: 10px;

        /* text-align: center; */

    }

    input {
        height: 50px;
        width: 50px;
    }

    tr {
        /* border: 1px solid black; */
    }
    .black-a{
        color: rgb(255, 255, 255);
        background-color: rgb(0, 0, 0);
    }
    .caltable{
        margin-bottom: 0px;
        padding-bottom: 0px;

    }

    .buttons{
        margin-top: 0px;
        padding-top: 0px;
        display: flex;
        text-align: center;
        justify-content: center;
        margin: 5px;
        padding: 10px;

    }
    .bb{
        /* margin: 20px; */
        margin-left: 20px;
        padding: 5px;
        font-size: 20px;
    }

    .QTY{
        border: 1px solid black;
        text-align: center;
    }
    /* input {
        height: 50px;
        width: 150px; 
    } */
</style>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="add" style="display: flex; align-items: center;">
                {{-- <h5 class="card-title">TRANSACTION</h5> --}}

                <div style="display: flex; ">
                    <ul style="list-style: none; " class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" style="margin-right: 300px; padding: 5px;">
                            Date:
                        </button>

                        <button type="button" class="btn btn-secondary" style="margin-right: 350px; padding: 5px;">
                            CURRENT TIME:
                        </button>

                        <button type="button" class="btn btn-secondary" style="margin-right: 350px; padding: 5px;">
                            REMAINING TIME:
                        </button>

                        <button type="button" class="btn btn-secondary" style="padding: 5px;">
                            DRAW TIME:
                        </button>

                    </ul>
                </div>

                <div class="btns" style="margin-left: auto;">

                </div>
            </div>


            <div class="">


                <table border="0">
                    <tbody>
                        {{-- <tr> --}}
                            {{-- <td align="left"> --}}
                                <table style="">
                                    <tbody>
                                        {{-- <tr> --}}
                                            {{-- <td align="center"> --}}
                                                <table class="timetable" width="99%">
                                                    <tbody>

                                                        <table
                                                            style="border: 0px currentColor; border-image: none; width: 100%;">
                                                            <tbody>

                                                            </tbody>
                                                        </table>



                                                        <table>
                                                            <tbody>

                                                              

                                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                                            </tbody>
                                                        </table>


                                                    </tbody>
                                                </table>

                                                <table class="caltable" width="99%">
                                                    <tbody>




                                                    </tbody>
                                                </table>
                                                <table class="caltable">
                                                    <thead>
                                                        <tr>

                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th><input readonly type="text" value="B"
                                                                    style="text-align: center; background-color:black;color:white;">
                                                            </th>
                                                            <th><input readonly type="text" value="B"
                                                                    style="text-align: center; background-color:black;color:white;">
                                                            </th>
                                                            <th><input readonly type="text" value="B"
                                                                    style="text-align: center; background-color:black;color:white;">
                                                            </th>
                                                            <th><input readonly type="text" value="B"
                                                                    style="text-align: center; background-color:black;color:white;">
                                                            </th>
                                                            <th><input readonly type="text" value="B"
                                                                    style="text-align: center; background-color:black;color:white;">
                                                            </th>
                                                            <th><input readonly type="text" value="B"
                                                                    style="text-align: center; background-color:black;color:white;">
                                                            </th>
                                                            <th><input readonly type="text" value="B"
                                                                    style="text-align: center; background-color:black;color:white;">
                                                            </th>
                                                            <th><input readonly type="text" value="B"
                                                                    style="text-align: center; background-color:black;color:white;">
                                                            </th>
                                                            <th><input readonly type="text" value="B"
                                                                    style="text-align: center; background-color:black;color:white;">
                                                            </th>
                                                            <th><input readonly type="text" value="B"
                                                                    style="text-align: center; background-color:black;color:white;">
                                                            </th>





                                                        </tr>
                                                    </thead>
                                                    <tbody>



                                                        <td></td>
                                                        <td></td>

                                                        <td><span id="Span16"></span></span></td>
                                                        <td> <span id="Span17"></span>
<input name="t_c1" class="b" id="t_c1" style=" visibility: visible;"
                                                                onkeyup="javascript:jodiCArrowkey(1,event);javascript:jodiCCalc(1);"
                                                                maxlength="4" max="9999" oninput="updateValues('b1',this.value)"  >
                                                                <span id="m_1"
                                                                style="visibility: hidden;">Qty</span></td>
                                                        <td> <span id="Span17"></span>
<input name="t_c1" class="" id="t_c1" style=" visibility: visible;"
                                                                onkeyup="javascript:jodiCArrowkey(1,event);javascript:jodiCCalc(1);"
                                                                maxlength="4" max="9999" oninput="updateValues('b2',this.value)" >
                                                                <span id="m_1"
                                                                style="visibility: hidden;">Qty</span></td>
                                                        <td><span id="Span18"></span>
 <input name="t_c2" class="" id="t_c2" style=" visibility: visible;"
                                                                onkeyup="javascript:jodiCArrowkey(2,event);javascript:jodiCCalc(2);"
                                                                maxlength="4" max="9999" oninput="updateValues('b3',this.value)" >
                                                                <span id="m_2"
                                                                style="visibility: hidden;">Nos</span></td>
                                                        <td><span id="Span19"></span>
 <input name="t_c3" class="" id="t_c3" style=" visibility: visible;"
                                                                onkeyup="javascript:jodiCArrowkey(3,event);javascript:jodiCCalc(3);"
                                                                maxlength="4" max="9999"oninput="updateValues('b4',this.value)">
                                                                <span id="m_3"
                                                                style="visibility: hidden;">Qty</span></td>
                                                        <td> <span id="Span20"></span>
<input name="t_c4" class="" id="t_c4" style=" visibility: visible;"
                                                                onkeyup="javascript:jodiCArrowkey(4,event);javascript:jodiCCalc(4);"
                                                                maxlength="4" max="9999" oninput="updateValues('b5',this.value)"><span id="m_4"
                                                                style="visibility: hidden;">Nos</span></td>
                                                        <td> <span id="Span21"></span>
<input name="t_c5" class=""  id="t_c5" style=" visibility: visible;"
                                                                onkeyup="javascript:jodiCArrowkey(5,event);javascript:jodiCCalc(5);"
                                                                maxlength="4" max="9999" oninput="updateValues('b6',this.value)">
                                                                <span id="m_5"
                                                                style="visibility: hidden;">Qty</span></td>
                                                        <td> <span id="Span22"></span>
<input name="t_c6" class="" id="t_c6" style=" visibility: visible;"
                                                                onkeyup="javascript:jodiCArrowkey(6,event);javascript:jodiCCalc(6);"
                                                                maxlength="4" max="9999" oninput="updateValues('b7',this.value)">
                                                                <span id="m_6"
                                                                style="visibility: hidden;">Nos</span></td>
                                                        <td> <span id="Span23"></span>
<input name="t_c7" class="" id="t_c7" style=" visibility: visible;"
                                                                onkeyup="javascript:jodiCArrowkey(7,event);javascript:jodiCCalc(7);"
                                                                maxlength="4" max="9999"
                                                                oninput="updateValues('b8',this.value)">
                                                                <span id="m_7"
                                                                style="visibility: hidden;">Qty</span></td>
                                                        <td> <span id="Span24"></span>
<input name="t_c8" class="" id="t_c8" style=" visibility: visible;"
                                                                onkeyup="javascript:jodiCArrowkey(8,event);javascript:jodiCCalc(8);"
                                                                maxlength="4" max="9999"    oninput="updateValues('b9',this.value)">
                                                                <span id="m_8"
                                                                style="visibility: hidden;">Nos</span></td>
                                                        <td> <span id="Span25"></span>
<input name="t_c9" class=""  id="t_c9" style=" visibility: visible;"
                                                                onkeyup="javascript:jodiCArrowkey(9,event);javascript:jodiCCalc(9);"
                                                                maxlength="4" max="9999" oninput="updateValues('b10',this.value)">
                                                                <span id="m_9"
                                                                style="visibility: hidden;">Qty</span></td>
                                                        <td style="font-weight: bold; " class="QTY">
                                                            QTY.
                                                        </td>
                                                        <td style="font-weight: bold;" class="QTY">
                                                            PTS.
                                                        </td>
                                                        <td style="font-weight: bold;">



                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">

                                                <span id="lbl_g0">60</span> <label name="chkgname" id="chkgname1"
                                                    onclick="selectSjodi(1);" type="checkbox">

                                            </td>
                                          
                                            <td style="font-weight: bold;">
                                                <span id="Span15"></span><br>

                                                <input name="t_r0" readonly type="tel" min="0" class="black-a" id="t_r0" value="A"
                                                    style="text-align: center;" maxlength="4" max="9999">
                                            </td>
                                            <td style="font-weight: bold;">
                                                <span id="Span15"></span><br>
                                           
<input type="text" name="initialValue"  min="0" class="initialValue a" id="initialValue"
                                                    style="visibility: visible;"
                                                    onkeyup="javascript:jodiRArrowkey(0,event);javascript:jodiRCalc(0); updateOtherInputs();"
                                                    maxlength="4" max="9999" required oninput="updateValues('a1',this.value)">
                                            </td>
                                            <td><b>
                                                <span id="s_0" style="visibility: visible;">6000</span></b><br>

<input name="input2" type="text"  min="0" class="a1 b1" id="input2"
                                                    onkeyup="javascript:jodiCalc(0);javascript:jodiArrowkey(0,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"  ></td>
                                            <td><b>
                                                <span id="s_1" style="visibility: visible;">6001</span></b><br>
<input name="input3" type="text" min="0" class="a1 b2" id="input3"
                                                    onkeyup="javascript:jodiCalc(1);javascript:jodiArrowkey(1,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;" ></td>
                                            <td><b>
                                                <span id="s_2" style="visibility: visible;">6002</span></b><br>
<input name="input4" type="text" min="0" class="a1 b3" id="input4"
                                                    onkeyup="javascript:jodiCalc(2);javascript:jodiArrowkey(2,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;" ></td>
                                            <td><b><span id="s_3" style="visibility: visible;">6003</span></b><br>
 <input name="input5" type="text" min="0" class="a1 b4" id="input5"
                                                    onkeyup="javascript:jodiCalc(3);javascript:jodiArrowkey(3,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;" ></td>
                                            <td><b><span id="s_4" style="visibility: visible;">6004</span></b><br>
<input name="input6" type="text" min="0" class="a1 b5" id="input6"
                                                    onkeyup="javascript:jodiCalc(4);javascript:jodiArrowkey(4,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;" ></td>
                                            <td><b><span id="s_5" style="visibility: visible;">6005</span></b><br>
<input name="input7" type="text" min="0" class="a1 b6" id="input7"
                                                    onkeyup="javascript:jodiCalc(5);javascript:jodiArrowkey(5,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;" ></td>
                                            <td><b><span id="s_6" style="visibility: visible;">6006</span></b><br>
<input name="input8" type="text" min="0" class="a1 b7" id="input8"
                                                    onkeyup="javascript:jodiCalc(6);javascript:jodiArrowkey(6,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;" ></td>
                                            <td><b><span id="s_7" style="visibility: visible;">6007</span></b><br>
<input name="input9" type="text" min="0" class="a1 b8" id="input9"
                                                    onkeyup="javascript:jodiCalc(7);javascript:jodiArrowkey(7,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;" ></td>
                                            <td><b><span id="s_8" style="visibility: visible;">6008</span></b><br>
<input name="input10" type="text" min="0" class="a1 b9" id="input10"
                                                    onkeyup="javascript:jodiCalc(8);javascript:jodiArrowkey(8,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;" ></td>
                                            <td><b><span id="s_9" style="visibility: visible;">6009</span></b><br>
<input name="input11" type="text" min="0" class="a1 b10" id="input11"
                                                    onkeyup="javascript:jodiCalc(9);javascript:jodiArrowkey(9,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;" ></td>
                                            <td style="font-weight: bold;" class="QTY">
                                                <span id="lbl_jdqty1" style="width: 0px; text-align:left">0</span>
                                            </td>
                                            <td style="font-weight: bold;" class="QTY">
                                                <span id="lbl_jdamt1"
                                                    style="width: 80px; display: inline-block;">0.00</span>
                                            </td>


                                            <td>
                                                <span class="result" id="ts04"> </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">

                                                <span id="lbl_g1">70</span name="chkgnames" id="chkgname2"
                                                    onclick="selectSjodi(2);" type="checkbox">

                                            </td>
                                            <span></span>
                                            <td style="font-weight: bold;">
                                                <span id="Span7"></span><br>
 {{-- <input type="text" id="initialValue" name="initialValue" required oninput="updateValues()"> --}}
 <input readonly name="t_r1" class="black-a" id="t_r1" value="A"
                                                    style="text-align: center;" maxlength="4" max="9999">
                                            </td>
                                            <td style="font-weight: bold;">
                                                <span id="Span7"></span><br>
    <input name="t_r1"  id="t_r1" style=" visibility: visible;"
                                                    onkeyup="javascript:jodiRArrowkey(1,event);javascript:jodiRCalc(1);"
                                                    maxlength="4" max="9999"  oninput="updateValues('a2',this.value)" >
                                            </td>
                                            <td><b><span id="s_10"
                                                        style="visibility: visible;">6010</span></b><br><input
                                                    name="t_10"  type="tel" min="0" class="a2 b1" id="t_10"
                                                    onkeyup="javascript:jodiCalc(10);javascript:jodiArrowkey(10,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_11"
                                                        style="visibility: visible;">6011</span></b><br><input
                                                    name="t_11" type="tel" min="0" class="a2 b2" id="t_11"
                                                    onkeyup="javascript:jodiCalc(11);javascript:jodiArrowkey(11,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_12"
                                                        style="visibility: visible;">6012</span></b><br><input
                                                    name="t_12" type="tel" min="0" class="a2 b3" id="t_12"
                                                    onkeyup="javascript:jodiCalc(12);javascript:jodiArrowkey(12,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_13" style="visibility: visible;">6013</span><br><input
                                                        name="t_13" type="tel" min="0" class="a2 b4" id="t_13"
                                                        onkeyup="javascript:jodiCalc(13);javascript:jodiArrowkey(13,even visibility: visible;"></b>
                                            </td>
                                            <td><b><span id="s_14"
                                                        style="visibility: visible;">6014</span></b><br><input
                                                    name="t_14" type="tel" min="0" class="a2 b5" id="t_14"
                                                    onkeyup="javascript:jodiCalc(14);javascript:jodiArrowkey(14,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_15"
                                                        style="visibility: visible;">6015</span></b><br><input
                                                    name="t_15" type="tel" min="0" class="a2 b6" id="t_15"
                                                    onkeyup="javascript:jodiCalc(15);javascript:jodiArrowkey(15,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_16"
                                                        style="visibility: visible;">6016</span></b><br><input
                                                    name="t_16" type="tel" min="0" class="a2 b7" id="t_16"
                                                    onkeyup="javascript:jodiCalc(16);javascript:jodiArrowkey(16,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_17"
                                                        style="visibility: visible;">6017</span></b><br><input
                                                    name="t_17" type="tel" min="0" class="a2 b8" id="t_17"
                                                    onkeyup="javascript:jodiCalc(17);javascript:jodiArrowkey(17,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_18"
                                                        style="visibility: visible;">6018</span></b><br><input
                                                    name="t_18" type="tel" min="0" class="a2 b9" id="t_18"
                                                    onkeyup="javascript:jodiCalc(18);javascript:jodiArrowkey(18,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_19"
                                                        style="visibility: visible;">6019</span></b><br><input
                                                    name="t_19" type="tel" min="0" class="a2 b10" id="t_19"
                                                    onkeyup="javascript:jodiCalc(19);javascript:jodiArrowkey(19,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td style="font-weight: bold;" class="QTY">
                                                <span id="lbl_jdqty2">0</span>
                                            </td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdamt2">0.00</span>
                                            </td>
                                            {{-- <td><span class="result" id="lbl_r2">19:15 </span></td>
                                            <td>
                                                <span class="result" id="ts11">6030</span>
                                            </td>
                                            <td>
                                                <span class="result" id="ts12">7022</span>
                                            </td> --}}

                                            <td>
                                                <span class="result" id="ts14"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; ">

                                                {{-- <span id="lbl_g2"><b>Mix</b> </span> --}}
                                                {{-- <input name="chkgnames" id="chkgname4" onclick="selectSjodi(4);"
                                                    type="checkbox"> --}}


                                            </td>

                                            <td style="font-weight: bold;">
                                                <span id="Span7"></span><br>
                                                <input readonly name="t_r1" class="black-a" id="t_r1" value="A"
                                                    style="text-align: center;" maxlength="4" max="9999">
                                            </td>
                                            <td style="font-weight: bold;">
                                                <span id="Span6"></span><br>
                                                <input name="t_r2" class="" id="t_r2" style=" visibility: visible;"
                                                    onkeyup="javascript:jodiRArrowkey(2,event);javascript:jodiRCalc(2);"
                                                    maxlength="4" max="9999"  oninput="updateValues('a3',this.value)">
                                            </td>
                                            <td><b><span id="s_20"
                                                        style="visibility: visible;">6020</span></b><br><input
                                                    name="t_20" type="tel" min="0" class="a3 b1" id="t_20"
                                                    onkeyup="javascript:jodiCalc(20);javascript:jodiArrowkey(20,event);"
                                                    maxlength="4" max="9999"
                                                    style="background-color: rgb(237, 227, 166 visibility: visible;">
                                            </td>
                                            <td><b><span id="s_21"
                                                        style="visibility: visible;">6021</span></b><br><input namet_21"
                                                    type="tel" min="0" class="a3 b2" id="t_21"
                                                    onkeyup="javascript:jodiCalc(21);javascript:jodiArrowkey(21,event);"
                                                    maxlength="4" max="9999"
                                                    style="background-color: rgb(237, 227, 166 visibility: visible;">
                                            </td>
                                            <td><b><span id="s_22"
                                                        style="visibility: visible;">6022</span></b><br><input
                                                    name="t_22" type="tel" min="0" class="a3 b3" id="t_22"
                                                    onkeyup="javascript:jodiCalc(22);javascript:jodiArrowkey(22,event);"
                                                    maxlength="4" max="9999"
                                                    style="background-color: rgb(237, 227, 166 visibility: visible;">
                                            </td>
                                            <td><b><span id="s_23"
                                                        style="visibility: visible;">6023</span></b><br><input
                                                    name="t_23" type="tel" min="0" class="a3 b4" id="t_23"
                                                    onkeyup="javascript:jodiCalc(23);javascript:jodiArrowkey(23,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_24"
                                                        style="visibility: visible;">6024</span></b><br><input
                                                    name="t_24" type="tel" min="0" class="a3 b5" id="t_24"
                                                    onkeyup="javascript:jodiCalc(24);javascript:jodiArrowkey(24,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_25"
                                                        style="visibility: visible;">6025</span></b><br><input
                                                    name="t_25" type="tel" min="0" class="a3 b6" id="t_25"
                                                    onkeyup="javascript:jodiCalc(25);javascript:jodiArrowkey(25,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_26"
                                                        style="visibility: visible;">6026</span></b><br><input
                                                    name="t_26" type="tel" min="0" class="a3 b7" id="t_26"
                                                    onkeyup="javascript:jodiCalc(26);javascript:jodiArrowkey(26,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_27"
                                                        style="visibility: visible;">6027</span></b><br><input
                                                    name="t_27" type="tel" min="0" class="a3 b8" id="t_27"
                                                    onkeyup="javascript:jodiCalc(27);javascript:jodiArrowkey(27,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_28"
                                                        style="visibility: visible;">6028</span></b><br><input
                                                    name="t_28" type="tel" min="0" class="a3 b9" id="t_28"
                                                    onkeyup="javascript:jodiCalc(28);javascript:jodiArrowkey(28,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_29"
                                                        style="visibility: visible;">6029</span></b><br><input
                                                    name="t_29" type="tel" min="0" class="a3 b10" id="t_29"
                                                    onkeyup="javascript:jodiCalc(29);javascript:jodiArrowkey(29,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdqty4">0</span>
                                            </td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdamt4">0.00</span>
                                            </td>
                                            {{-- <td><span class="result" id="lbl_r3">19:00 </span></td>
                                            <td>
                                                <span class="result" id="ts21">6012</span>
                                            </td>
                                            <td>
                                                <span class="result" id="ts22">7039</span>
                                            </td> --}}

                                            <td>
                                                <span class="result" id="ts24"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">

                                                <span id="lbl_g3"></span>
                                                <input name="chkgnames" id="chkgname3" style="display:none"
                                                    onclick="selectSjodi(3);" type="checkbox">
                                            </td>

                                            <td style="font-weight: bold;">
                                                <span id="Span7"></span><br>
                                                <input readonly name="t_r1" class="black-a" id="t_r1" value="A"
                                                    style="text-align: center;" maxlength="4" max="9999">
                                            </td>
                                            <td style="font-weight: bold;">
                                                <span id="Span8"></span><br>
 <input name="t_r3" class="" type="tel" min="0" id="t_r3"
                                                    style="visibility: visible;"
                                                    onkeyup="javascript:jodiRArrowkey(3,event);javascript:jodiRCalc(3);"
                                                    maxlength="4" max="9999"  oninput="updateValues('a4',this.value)"     >
                                            </td>
                                            <td><b><span id="s_30"
                                                        style="visibility: visible;">6030</span></b><br><input
                                                    name="t_30" type="tel" min="0" class="a4 b1" id="t_30"
                                                    onkeyup="javascript:jodiCalc(30);javascript:jodiArrowkey(30,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_31"
                                                        style="visibility: visible;">6031</span></b><br><input
                                                    name="t_31" type="tel" min="0" class="a4 b2" id="t_31"
                                                    onkeyup="javascript:jodiCalc(31);javascript:jodiArrowkey(31,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_32"
                                                        style="visibility: visible;">6032</span></b><br><input
                                                    name="t_32" type="tel" min="0" class="a4 b3" id="t_32"
                                                    onkeyup="javascript:jodiCalc(32);javascript:jodiArrowkey(32,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_33"
                                                        style="visibility: visible;">6033</span></b><br><input
                                                    name="t_33" type="tel" min="0" class="a4 b4" id="t_33"
                                                    onkeyup="javascript:jodiCalc(33);javascript:jodiArrowkey(33,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_34"
                                                        style="visibility: visible;">6034</span></b><br><input
                                                    name="t_34" type="tel" min="0" class="a4 b5" id="t_34"
                                                    onkeyup="javascript:jodiCalc(34);javascript:jodiArrowkey(34,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_35"
                                                        style="visibility: visible;">6035</span></b><br><input
                                                    name="t_35" type="tel" min="0" class="a4 b6" id="t_35"
                                                    onkeyup="javascript:jodiCalc(35);javascript:jodiArrowkey(35,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_36"
                                                        style="visibility: visible;">6036</span></b><br><input
                                                    name="t_36" type="tel" min="0" class="a4 b7" id="t_36"
                                                    onkeyup="javascript:jodiCalc(36);javascript:jodiArrowkey(36,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_37"
                                                        style="visibility: visible;">6037</span></b><br><input
                                                    name="t_37" class="a4 b8" id="t_37"
                                                    onkeyup="javascript:jodiCalc(37);javascript:jodiArrowkey(37,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_38"
                                                        style="visibility: visible;">6038</span></b><br><input
                                                    name="t_38" type="tel" min="0" class="a4 b9" id="t_38"
                                                    onkeyup="javascript:jodiCalc(38);javascript:jodiArrowkey(38,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_39"
                                                        style="visibility: visible;">6039</span></b><br><input
                                                    name="t_39" type="tel" min="0" class="a4 b10" id="t_39"
                                                    onkeyup="javascript:jodiCalc(39);javascript:jodiArrowkey(39,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdqty3">0</span>
                                            </td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdamt3">0.00</span>
                                            </td>
                                            {{-- <td><span class="result" id="lbl_r4">18:45 </span></td>
                                            <td>
                                                <span class="result" id="ts31">6092</span>
                                            </td>
                                            <td>
                                                <span class="result" id="ts32">7091</span>
                                            </td>
                                            --}}
                                            <td>
                                                <span class="result" id="ts34"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; ">
                                                <input name="chkgnames" id="chkgname5" style="display:none"
                                                    onclick="selectSjodi(5);" type="checkbox">
                                                <span id="lbl_g4"><b class="ugamename" <="" span="">
                                                    </b></span>
                                            </td>
                                            <td style="font-weight: bold;">
                                                <span id="Span7"></span><br>
                                                <input readonly name="t_r1" class="black-a" id="t_r1" value="A"
                                                    style="text-align: center;" maxlength="4" max="9999">
                                            </td>

                                            <td style="font-weight: bold;">
                                                <span id="Span9"></span><br>
 <input name="t_r4" class="" type="tel" min="0" id="t_r4"
                                                    style=" visibility: visible;"
                                                    onkeyup="javascript:jodiRArrowkey(4,event);javascript:jodiRCalc(4);"
                                                    maxlength="4" max="9999"  oninput="updateValues('a5',this.value)"  >
                                            </td>
                                            <td>
                                                <b><span id="s_40"
                                                        style="visibility: visible;">6040</span></b><br><input
                                                    name="t_40" type="tel" min="0" class="a5 b1" id="t_40"
                                                    onkeyup="javascript:jodiCalc(40);javascript:jodiArrowkey(40,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;">
                                                <span id="cpnum1" style="visibility: hidden;"></span>
                                            </td>

                                            <td>
                                                <b><span id="s_41"
                                                        style="visibility: visible;">6041</span></b><br><input
                                                    name="t_41" type="tel" min="0" class="a5 b2" id="t_41"
                                                    onkeyup="javascript:jodiCalc(41);javascript:jodiArrowkey(41,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;">
                                                <span id="cpnum2" style="visibility: hidden;"></span>
                                            </td>
                                            <td>
                                                <b><span id="s_42"
                                                        style="visibility: visible;">6042</span></b><br><input
                                                    name="t_42" type="tel" min="0" class="a5 b3" id="t_42"
                                                    onkeyup="javascript:jodiCalc(42);javascript:jodiArrowkey(42,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;">
                                                <span id="cpnum3" style="visibility: hidden;"></span>
                                            </td>
                                            <td>
                                                <b><span id="s_43"
                                                        style="visibility: visible;">6043</span></b><br><input
                                                    name="t_43" type="tel" min="0" class="a5 b4" id="t_43"
                                                    onkeyup="javascript:jodiCalc(43);javascript:jodiArrowkey(43,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;">
                                                <span id="cpnum4" style="visibility: hidden;"></span>
                                            </td>
                                            <td>
                                                <b><span id="s_44"
                                                        style="visibility: visible;">6044</span></b><br><input
                                                    name="t_44" type="tel" min="0" class="a5 b5" id="t_44"
                                                    onkeyup="javascript:jodiCalc(44);javascript:jodiArrowkey(44,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;">
                                                <span id="cpnum5" style="visibility: hidden;"></span>
                                            </td>
                                            <td>
                                                <b><span id="s_45"
                                                        style="visibility: visible;">6045</span></b><br><input
                                                    name="t_45" type="tel" min="0" class="a5 b6" id="t_45"
                                                    onkeyup="javascript:jodiCalc(45);javascript:jodiArrowkey(45,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;">
                                                <span id="cpnum6" style="visibility: hidden;"></span>
                                            </td>
                                            <td>
                                                <b><span id="s_46"
                                                        style="visibility: visible;">6046</span></b><br><input
                                                    name="t_46" type="tel" min="0" class="a5 b7" id="t_46"
                                                    onkeyup="javascript:jodiCalc(46);javascript:jodiArrowkey(46,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;">
                                                <span id="cpnum7" |="|" style="visibility: hidden;"></span>
                                            </td>
                                            <td>
                                                <b><span id="s_47"
                                                        style="visibility: visible;">6047</span></b><br><input
                                                    name="t_47" type="tel" min="0" class="a5 b8" id="t_47"
                                                    onkeyup="javascript:jodiCalc(47);javascript:jodiArrowkey(47,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;">
                                                <span id="cpnum8" style="visibility: hidden;"></span>
                                            </td>
                                            <td>
                                                <b><span id="s_48"
                                                        style="visibility: visible;">6048</span></b><br><input
                                                    name="t_48" type="tel" min="0" class="a5 b9" id="t_48"
                                                    onkeyup="javascript:jodiCalc(48);javascript:jodiArrowkey(48,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;">
                                                <span id="cpnum9" style="visibility: hidden;"></span>
                                            </td>
                                            <td>
                                                <b><span id="s_49"
                                                        style="visibility: visible;">6049</span></b><br><input
                                                    name="t_49" type="tel" min="0" class="a5 b10" id="t_49"
                                                    onkeyup="javascript:jodiCalc(49);javascript:jodiArrowkey(49,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;">
                                                <span id="cpnum10" style="visibility: hidden;"></span>
                                            </td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdqty5">0</span>
                                            </td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdamt5">0</span>
                                            </td>
                                            {{-- <td><span class="result" id="lbl_r5">18:30 </span></td>
                                            <td>
                                                <span class="result" id="ts41">6025</span>
                                            </td>
                                            <td>
                                                <span class="result" id="ts42">7027</span>
                                            </td> --}}

                                            <td>
                                                <span class="result" id="ts44"></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-weight: bold; ">
                                                <table id="td1" style="display:none">
                                                    <tbody>
                                                        <tr>
                                                            <td><b><span id="Span1">OPEN</span></b><br><input
                                                                    name="t_50" type="tel" min" id="op1"
                                                                    onkeyup="javascript:SangamPannaArrowkey(0,event);"
                                                                    maxlength="4" max="9999"></td>
                                                            <td><b><span id="Span2">CLOSE</span></b><br><input
                                                                    name="t_51" type="tel" min="0" class="" id="op2"
                                                                    onkeyup="javascript:SangamPannaArrowkey(1,event);"
                                                                    maxlength="4" max="9999"></td>
                                                            <td><b><span id="Span3">QTY</span></b><br><input name="t_52"
                                                                    type="tel" min="0" class="" id="op3"
                                                                    onkeyup="javascript:jodiCalc(0);javascript:SangamPannaArrowkey(3,event);"
                                                                    maxlength="4" max="9999"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table id="td2" style="display:none">
                                                    <tbody>
                                                        <tr>
                                                            <td><b><span id="Span4">PAIR</span></b><br><input
                                                                    name="t_50" type="tel" min="0" class="" id="pair1"
                                                                    onkeyup="javascript:CPPannaArrowkey(0,event);"
                                                                    maxlength="4" max="9999"></td>
                                                            <td><b><span id="Span5">QTY</span></b><br><input name="t_51"
                                                                    type="tel" min="0" class="" id="pair2"
                                                                    onkeyup="javascript:CPPannaArrowkey(1,event);"
                                                                    maxlength="4" max="9999"></td>
                                                            <td><b><input type="button" onclick="jodiCalc(0);"
                                                                        value="OK"> </b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <input name="chkgnames" id="chkgname6" style="display:none"
                                                    onclick="selectSjodi(6);" type="checkbox">
                                                <span id="lbl_g5"><b class="ugamename"> </b></span>
                                            </td>

                                            <td style="font-weight: bold;">
                                                <span id="Span7"></span><br>
                                                <input readonly name="t_r1" class="black-a" id="t_r1" value="A"
                                                    style="text-align: center;" maxlength="4" max="9999">
                                            </td>
                                            <td style="font-weight: bold;">
                                                <span id="Span10"></span><br>
<input name="t_r5" class="" type="tel" min="0" id="t_r5"
                                                    style=" visibility: visible;"
                                                    onkeyup="javascript:jodiRArrowkey(5,event);javascript:jodiRCalc(5);"
                                                    maxlength="4" max="9999"   oninput="updateValues('a6',this.value)" >
                                            </td>
                                            <td><b><span id="s_50"
                                                        style="visibility: visible;">6050</span></b><br><input
                                                    name="t_50" type="tel" min="0" class="a6 b1" id="t_50"
                                                    onkeyup="javascript:jodiCalc(50);javascript:jodiArrowkey(50,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_51"
                                                        style="visibility: visible;">6051</span></b><br><input
                                                    name="t_51" type="tel" min="0" class="a6 b2" id="t_51"
                                                    onkeyup="javascript:jodiCalc(51);javascript:jodiArrowkey(51,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_52"
                                                        style="visibility: visible;">6052</span></b><br><input
                                                    name="t_52" type="tel" min="0" class="a6 b3" id="t_52"
                                                    onkeyup="javascript:jodiCalc(52);javascript:jodiArrowkey(52,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_53"
                                                        style="visibility: visible;">6053</span></b><br><input
                                                    name="t_53" type="tel" min="0" class="a6 b4" id="t_53"
                                                    onkeyup="javascript:jodiCalc(53);javascript:jodiArrowkey(53,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_54"
                                                        style="visibility: visible;">6054</span></b><br><input
                                                    name="t_54" type="tel" min="0" class="a6 b5" id="t_54"
                                                    onkeyup="javascript:jodiCalc(54);javascript:jodiArrowkey(54,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_55"
                                                        style="visibility: visible;">6055</span></b><br><input
                                                    name="t_55" type="tel" min="0" class="a6 b6" id="t_55"
                                                    onkeyup="javascript:jodiCalc(55);javascript:jodiArrowkey(55,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_56"
                                                        style="visibility: visible;">6056</span></b><br><input
                                                    name="t_56" type="tel" min="0" class="a6 b7" id="t_56"
                                                    onkeyup="javascript:jodiCalc(56);javascript:jodiArrowkey(56,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_57"
                                                        style="visibility: visible;">6057</span></b><br><input
                                                    name="t_57" type="tel" min="0" class="a6 b8" id="t_57"
                                                    onkeyup="javascript:jodiCalc(57);javascript:jodiArrowkey(57,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_58"
                                                        style="visibility: visible;">6058</span></b><br><input
                                                    name="t_58" type="tel" min="0" class="a6 b9" id="t_58"
                                                    onkeyup="javascript:jodiCalc(58);javascript:jodiArrowkey(58,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_59"
                                                        style="visibility: visible;">6059</span></b><br><input
                                                    name="t_59" type="tel" min="0" class="a6 b10" id="t_59"
                                                    onkeyup="javascript:jodiCalc(59);javascript:jodiArrowkey(59,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdqty6">0</span>
                                            </td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdamt6">0</span>
                                            </td>
                                            {{-- <td><span class="result" id="lbl_r6">18:15 </span></td>
                                            <td>
                                                <span class="result" id="ts51">6069</span>
                                            </td>
                                            <td>
                                                <span class="result" id="ts52">7037</span>
                                            </td> --}}

                                            <td>
                                                <span class="result" id="ts54"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; ">

                                                <input name="chkgnames" id="chkgname7" style="display:none"
                                                    onclick="selectSjodi(7);" type="checkbox">
                                                <span id="lbl_g6"><b class="ugamename"> </b></span>
                                            </td>

                                            <td style="font-weight: bold;">
                                                <span id="Span7"></span><br>
                                                <input readonly name="t_r1" class="black-a" id="t_r1" value="A"
                                                    style="text-align: center;" maxlength="4" max="9999">
                                            </td>
                                            <td style="font-weight: bold;">
                                                <span id="Span11"></span><br>
                                                <input name="t_r6" type="tel" min="0" class="" id="t_r6"
                                                    style="visibility: visible;"
                                                    onkeyup="javascript:jodiRArrowkey(6,event);javascript:jodiRCalc(6);"
                                                    maxlength="4" max="9999"   oninput="updateValues('a7',this.value)" >
                                            </td>
                                            <td><b><span id="s_60"
                                                        style="visibility: visible;">6060</span></b><br><input
                                                    name="t_60" type="tel" min="0" class="a7 b1" id="t_60"
                                                    onkeyup="javascript:jodiCalc(60);javascript:jodiArrowkey(60,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_61"
                                                        style="visibility: visible;">6061</span></b><br><input
                                                    name="t_61" type="tel" min="0" class="a7 b2" id="t_61"
                                                    onkeyup="javascript:jodiCalc(61);javascript:jodiArrowkey(61,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_62"
                                                        style="visibility: visible;">6062</span></b><br><input
                                                    name="t_62" type="tel" min="0" class="a7 b3" id="t_62"
                                                    onkeyup="javascript:jodiCalc(62);javascript:jodiArrowkey(62,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_63"
                                                        style="visibility: visible;">6063</span></b><br><input
                                                    name="t_63" type="tel" min="0" class="a7 b4" id="t_63"
                                                    onkeyup="javascript:jodiCalc(63);javascript:jodiArrowkey(63,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_64"
                                                        style="visibility: visible;">6064</span></b><br><input
                                                    name="t_64" type="tel" min="0" class="a7 b5" id="t_64"
                                                    onkeyup="javascript:jodiCalc(64);javascript:jodiArrowkey(64,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_65"
                                                        style="visibility: visible;">6065</span></b><br><input
                                                    name="t_65" type="tel" min="0" class="a7 b6" id="t_65"
                                                    onkeyup="javascript:jodiCalc(65);javascript:jodiArrowkey(65,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_66"
                                                        style="visibility: visible;">6066</span></b><br><input
                                                    name="t_66" type="tel" min="0" class="a7 b7" id="t_66"
                                                    onkeyup="javascript:jodiCalc(66);javascript:jodiArrowkey(66,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_67"
                                                        style="visibility: visible;">6067</span></b><br><input
                                                    name="t_67" type="tel" min="0" class="a7 b8" id="t_67"
                                                    onkeyup="javascript:jodiCalc(67);javascript:jodiArrowkey(67,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_68"
                                                        style="visibility: visible;">6068</span></b><br><input
                                                    name="t_68" type="tel" min="0" class="a7 b9" id="t_68"
                                                    onkeyup="javascript:jodiCalc(68);javascript:jodiArrowkey(68,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_69"
                                                        style="visibility: visible;">6069</span></b><br><input
                                                    name="t_69" type="tel" min="0" class="a7 b10" id="t_69"
                                                    onkeyup="javascript:jodiCalc(69);javascript:jodiArrowkey(69,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td style="font-weight: bold; " class="QTY">

                                                <span id="lbl_jdamt7">0</span>
                                            </td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdamt7">0</span>
                                            </td>
                                            {{-- <td><span class="result" id="lbl_r7">18:00 </span></td>
                                            <td>
                                                <span class="result" id="ts61">6040</span>
                                            </td>
                                            <td>
                                                <span class="result" id="ts62">7045</span>
                                            </td> --}}

                                            <td>
                                                <span class="result" id="ts64"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; " class="">
                                                <input name="chkgnames" id="chkgname8" style="display:none"
                                                    onclick="selectSjodi(8);" type="checkbox">
                                                <span id="lbl_g7"><b class="ugamename"> </b></span>
                                            </td>
                                            <td style="font-weight: bold;" class="">
                                                <span id="Span7"></span><br>
                                                <input readonly name="t_r1" class="black-a" id="t_r1" value="A"
                                                    style="text-align: center;" maxlength="4" max="9999">
                                            </td>

                                            <td style="font-weight: bold;" class="">
                                                <span id="Span12"></span><br>
                                                <input name="t_r7" class="" type="tel" min="0" id="t_r7"
                                                    style=" visibility: visible;"
                                                    onkeyup="javascript:jodiRArrowkey(7,event);javascript:jodiRCalc(7);"
                                                    maxlength="4" max="9999"   oninput="updateValues('a8',this.value)" >
                                            </td>
                                            <td><b><span id="s_70"
                                                        style="visibility: visible;">6070</span></b><br><input
                                                    name="t_70" type="tel" min="0" class="a8 b1" id="t_70"
                                                    onkeyup="javascript:jodiCalc(70);javascript:jodiArrowkey(70,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_71"
                                                        style="visibility: visible;">6071</span></b><br><input
                                                    name="t_71" type="tel" min="0" class="a8 b2" id="t_71"
                                                    onkeyup="javascript:jodiCalc(71);javascript:jodiArrowkey(71,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_72"
                                                        style="visibility: visible;">6072</span></b><br><input
                                                    name="t_72" type="tel" min="0" class="a8 b3" id="t_72"
                                                    onkeyup="javascript:jodiCalc(72);javascript:jodiArrowkey(72,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_73"
                                                        style="visibility: visible;">6073</span></b><br><input
                                                    name="t_73" type="tel" min="0" class="a8 b4" id="t_73"
                                                    onkeyup="javascript:jodiCalc(73);javascript:jodiArrowkey(73,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_74"
                                                        style="visibility: visible;">6074</span></b><br><input
                                                    name="t_74" type="tel" min="0" class="a8 b5" id="t_74"
                                                    onkeyup="javascript:jodiCalc(74);javascript:jodiArrowkey(74,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_75"
                                                        style="visibility: visible;">6075</span></b><br><input
                                                    name="t_75" type="tel" min="0" class="a8 b6" id="t_75"
                                                    onkeyup="javascript:jodiCalc(75);javascript:jodiArrowkey(75,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_76"
                                                        style="visibility: visible;">6076</span></b><br><input
                                                    name="t_76" type="tel" min="0" class="a8 b7" id="t_76"
                                                    onkeyup="javascript:jodiCalc(76);javascript:jodiArrowkey(76,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_77"
                                                        style="visibility: visible;">6077</span></b><br><input
                                                    name="t_77" type="tel" min="0" class="a8 b8" id="t_77"
                                                    onkeyup="javascript:jodiCalc(77);javascript:jodiArrowkey(77,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_78"
                                                        style="visibility: visible;">6078</span></b><br><input
                                                    name="t_78" type="tel" min="0" class="a8 b9" id="t_78"
                                                    onkeyup="javascript:jodiCalc(78);javascript:jodiArrowkey(78,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_79"
                                                        style="visibility: visible;">6079</span></b><br><input
                                                    name="t_79" type="tel" min="0" class="a8 b10" id="t_79"
                                                    onkeyup="javascript:jodiCalc(79);javascript:jodiArrowkey(79,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdqty8">0</span>
                                            </td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdamt8">0</span>
                                            </td>
                                            {{-- <td><span class="result" id="lbl_r8">17:45 </span></td>
                                            <td>
                                                <span class="result" id="ts71">6051</span>
                                            </td>
                                            <td>
                                                <span class="result" id="ts72">7030</span>
                                            </td>
                                            --}}
                                            <td>
                                                <span class="result" id="ts74"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; ">
                                                <input name="chkgnames" id="chkgname9" style="display:none"
                                                    onclick="selectSjodi(9);" type="checkbox">
                                                <span id="lbl_g8"><b class="ugamename"> </b></span>
                                            </td>

                                            <td style="font-weight: bold;">
                                                <span id="Span7"></span><br>
                                                <input readonly name="t_r1" class="black-a" id="t_r1" value="A"
                                                    style="text-align: center;" maxlength="4" max="9999">
                                            </td>
                                            <td style="font-weight: bold;">
                                                <span id="Span13"></span><br>
                                                <input name="t_r8" class="" type="tel" min="0" id="t_r8"
                                                    style=" visibility: visible;"
                                                    onkeyup="javascript:jodiRArrowkey(8,event);javascript:jodiRCalc(8);"
                                                    maxlength="4" max="9999"   oninput="updateValues('a9',this.value)" >
                                            </td>
                                            <td><b><span id="s_80"
                                                        style="visibility: visible;">6080</span></b><br><input
                                                    name="t_80" type="tel" min="0" class="a9 b1" id="t_80"
                                                    onkeyup="javascript:jodiCalc(80);javascript:jodiArrowkey(80,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_81"
                                                        style="visibility: visible;">6081</span></b><br><input
                                                    name="t_81" type="tel" min="0" class="a9 b2" id="t_81"
                                                    onkeyup="javascript:jodiCalc(81);javascript:jodiArrowkey(81,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_82"
                                                        style="visibility: visible;">6082</span></b><br><input
                                                    name="t_82" type="tel" min="0" class="a9 b3" id="t_82"
                                                    onkeyup="javascript:jodiCalc(82);javascript:jodiArrowkey(82,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_83"
                                                        style="visibility: visible;">6083</span></b><br><input
                                                    name="t_83" type="tel" min="0" class="a9 b4" id="t_83"
                                                    onkeyup="javascript:jodiCalc(83);javascript:jodiArrowkey(83,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_84"
                                                        style="visibility: visible;">6084</span></b><br><input
                                                    name="t_84" type="tel" min="0" class="a9 b5" id="t_84"
                                                    onkeyup="javascript:jodiCalc(84);javascript:jodiArrowkey(84,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_85"
                                                        style="visibility: visible;">6085</span></b><br><input
                                                    name="t_85" type="tel" min="0" class="a9 b6" id="t_85"
                                                    onkeyup="javascript:jodiCalc(85);javascript:jodiArrowkey(85,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_86"
                                                        style="visibility: visible;">6086</span></b><br><input
                                                    name="t_86" type="tel" min="0" class="a9 b7" id="t_86"
                                                    onkeyup="javascript:jodiCalc(86);javascript:jodiArrowkey(86,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_87"
                                                        style="visibility: visible;">6087</span></b><br><input
                                                    name="t_87" type="tel" min="0" class="a9 b8" id="t_87"
                                                    onkeyup="javascript:jodiCalc(87);javascript:jodiArrowkey(87,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_88"
                                                        style="visibility: visible;">6088</span></b><br><input
                                                    name="t_88" type="tel" min="0" class="a9 b9" id="t_88"
                                                    onkeyup="javascript:jodiCalc(88);javascript:jodiArrowkey(88,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_89"
                                                        style="visibility: visible;">6089</span></b><br><input
                                                    name="t_89" type="tel" min="0" class="a9 b10" id="t_89"
                                                    onkeyup="javascript:jodiCalc(89);javascript:jodiArrowkey(89,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdqty9">0</span>
                                            </td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdamt9">0</span>
                                            </td>
                                            {{-- <td style="font-weight: bold;"><span class="result" id="lbl_r9">17:30
                                                </span></td> --}}
                                            {{-- <td>
                                                <span class="result" id="ts81">6050</span>
                                            </td>
                                            <td>
                                                <span class="result" id="ts82">7079</span>
                                            </td>
                                            --}}
                                            <td>
                                                <span class="result" id="ts84"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; ">
                                                <span name="chkgnames" id="chkgname10" style="display:none"
                                                    onclick="selectSjodi(10);" type="checkbox">
                                                    <span id="lbl_g9"><b class="ugamename"> </b></span>
                                            </td>
                                            <td style="font-weight: bold;">
                                                <span id="Span7"></span><br>
                                                <input readonly name="t_r1" class="black-a" id="t_r1" value="A"
                                                    style="text-align: center;" maxlength="4" max="9999">
                                            </td>

                                            <td style="font-weight: bold;">
                                                <span id="Span14"></span><br>
                                                <input name="t_r9" class="" type="tel" min="0" id="t_r9"
                                                    style=" visibility: visible;"
                                                    onkeyup="javascript:jodiRArrowkey(9,event);javascript:jodiRCalc(9);"
                                                    maxlength="4" max="9999"   oninput="updateValues('a10',this.value)" >
                                            </td>
                                            <td><b><span id="s_90"
                                                        style="visibility: visible;">6090</span></b><br><input
                                                    name="t_90" type="tel" min="0" class="a10 b1" id="t_90"
                                                    onkeyup="javascript:jodiCalc(90);javascript:jodiArrowkey(90,event);"
                                                    maxlength="4" max="9999" style=" visibility: visible;"></td>
                                            <td><b><span id="s_91"
                                                        style="visibility: visible;">6091</span></b><br><input
                                                    name="t_91" class="a10 b2" id="t_91"
                                                    onkeyup="javascript:jodiCalc(91);javascript:jodiArrowkey(91,event);"
                                                    type="tel" min="0" maxlength="4" max="9999"
                                                    style=" visibility: visible;"></td>
                                            <td><b><span id="s_92"
                                                        style="visibility: visible;">6092</span></b><br><input
                                                    name="t_92" class="a10 b3" id="t_92"
                                                    onkeyup="javascript:jodiCalc(92);javascript:jodiArrowkey(92,event);"
                                                    type="tel" min="0" maxlength="4" max="9999"
                                                    style=" visibility: visible;"></td>
                                            <td><b><span id="s_93"
                                                        style="visibility: visible;">6093</span></b><br><input
                                                    name="t_93" class="a10 b4" id="t_93"
                                                    onkeyup="javascript:jodiCalc(93);javascript:jodiArrowkey(93,event);"
                                                    type="tel" min="0" maxlength="4" max="9999"
                                                    style=" visibility: visible;"></td>
                                            <td><b><span id="s_94"
                                                        style="visibility: visible;">6094</span></b><br><input
                                                    name="t_94" class="a10 b5" id="t_94"
                                                    onkeyup="javascript:jodiCalc(94);javascript:jodiArrowkey(94,event);"
                                                    type="tel" min="0" maxlength="4" max="9999"
                                                    style=" visibility: visible;"></td>
                                            <td><b><span id="s_95"
                                                        style="visibility: visible;">6095</span></b><br><input
                                                    name="t_95" class="a10 b6" id="t_95"
                                                    onkeyup="javascript:jodiCalc(95);javascript:jodiArrowkey(95,event);"
                                                    type="tel" min="0" maxlength="4" max="9999"
                                                    style=" visibility: visible;"></td>
                                            <td><b><span id="s_96"
                                                        style="visibility: visible;">6096</span></b><br><input
                                                    name="t_96" class="a10 b7" id="t_96"
                                                    onkeyup="javascript:jodiCalc(96);javascript:jodiArrowkey(96,event);"
                                                    type="tel" min="0" maxlength="4" max="9999"
                                                    style=" visibility: visible;"></td>
                                            <td><b><span id="s_97"
                                                        style="visibility: visible;">6097</span></b><br><input
                                                    name="t_97" class="a10 b8" id="t_97"
                                                    onkeyup="javascript:jodiCalc(97);javascript:jodiArrowkey(97,event);"
                                                    type="tel" min="0" maxlength="4" max="9999"
                                                    style=" visibility: visible;"></td>
                                            <td><b><span id="s_98"
                                                        style="visibility: visible;">6098</span></b><br><input
                                                    name="t_98" class="a10 b9" id="t_98"
                                                    onkeyup="javascript:jodiCalc(98);javascript:jodiArrowkey(98,event);"
                                                    type="tel" min="0" maxlength="4" max="9999"
                                                    style=" visibility: visible;"></td>
                                            <td><b><span id="s_99"
                                                        style="visibility: visible;">6099</span></b><br><input
                                                    name="t_99" class="a10 b10" id="t_99"
                                                    onkeyup="javascript:jodiCalc(99);javascript:jodiArrowkey(99,event);"
                                                    type="tel" min="0" maxlength="4" max="9999"
                                                    style=" visibility: visible;"></td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdqty10">0</span>
                                            </td>
                                            <td style="font-weight: bold; " class="QTY">
                                                <span id="lbl_jdamt10">0</span>
                                            </td>
                                            {{-- <td style="font-weight: bold;"><span class="result" id="lbl_r10">17:15
                                                </span></td>

                                            <td>
                                                <span class="result" id="ts91">6057</span>
                                            </td>
                                            <td>
                                                <span class="result" id="ts92">7009</span>
                                            </td> --}}

                                            <td>
                                                <span class="result" id="ts94"></span>
                                            </td>
                                        </tr>
                                        <tr style="height: 40px; text-align:center;">
  {{-- <td colspan="11">                                        {{-- <td colspan="11" style="text-align:center"> --}}

</td>   
{{-- 
    
                                                <button name="bt_clear" id="Button3" onclick="Result();"
                                                    value="Clear">Result(F8)</button> --}}
                                                {{-- <button name="bt_report" id="Button2" onclick="Report();"
                                                    value="Report">Report(F4)</button> --}}


                                                {{-- <button name="bt_cancel" id="bt_cancel" onclick="Cancel();"
                                                    value="Login">Cancel(F10)</button> --}}
                                                {{-- <button name="bt_cancel" id="Button5" onclick="Reprint();" value="Login"
                                                    style="display: none;">Reprint(F2)</button> --}}
                                            
                                                {{-- <button name="bt_change" id="btnchange" onclick="Changepass();"
                                                    value="Submit">Password</button> --}}
                                            {{-- </td> --}}
                                            {{-- <td style="text-align: right; font-weight: bold;">Total
                                            </td>

                                            <td style="font-weight: bold;">
                                                <span id="lbl_jdqty">0</span>
                                            </td>
                                            <td style="font-weight: bold;">
                                                <span id="lbl_jdamt">0.00</span>
                                            </td> --}}

                                          
                                            {{-- <td colspan="3"> <input name="t_claim" id="t_claim"
                                                    style=" font-weight: bold; font-size: 12px; width: 120px; display: none;"
                                                    onkeyup="claimnew();" type="tel" min="0"></td> --}}
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                </table>
                <div class="buttons" >

                    <button name="bt_clear" id="Button1" class="btn bb btn-secondary" onclick="Clear();"
                    value="Clear">Clear</button>
                
                
                <button name="bt_sub" id="btnsubmit"class="btn bb btn-primary" onclick="calladdticketmulti();"
                value="Submit">Submit</button>
                
                <button name="bt_view" class="btn  bb btn-info" id="Button4" onclick="View();"
                value="Clear">View(F9)</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function updateValues(classval, value) {

   var elementsA = document.getElementsByClassName(classval);


   var elementB = document.getElementById("t_c1");
   console.log(elementB.value);

 
   for (var i = 0; i < elementsA.length; i++) {
    
       var currentValue = elementsA[i].value;

       currentValue = isNaN(parseFloat(currentValue)) ? 0 : parseFloat(currentValue);

     
       value = isNaN(parseFloat(value)) ? 0 : parseFloat(value);

   
       elementsA[i].value = currentValue + value;

     
   }
}


updateValues("tum", "NayiValue");

</script>

@endsection