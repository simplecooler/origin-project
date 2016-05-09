<!DOCTYPE html>
<html>
<head>
    <title>Attack Map</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="style/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="style/common.css">

    <style type="text/css">
    html, body{
        overflow: hidden;
    }
    body{
        background: url('image/bg.jpg') no-repeat;
        /*background-size: 100% 100%;*/
        background-size: cover;
        min-height: 100vh;
    }
    #topDiv{
        /*background-color: #000;*/
        height: 50px;
        padding: 10px 12px;
        overflow: hidden;
        *zoom: 1;
    }
    #topDiv .left{
        float: left;
    }
    #topDiv .right{
        float: right;
        width: 180px;
    }

    #organization{
        margin: 0;
        color: #fff;
        font-size: 36px;
        text-shadow: 0 0 5px #00c6ff;
    }
    #timeClock{
        color: #fff;
        font-family: 'BebasNeueRegular', Arial, Helvetica, sans-serif;
        font-size: 16px;
        text-shadow: 0 0 5px #00c6ff;
        text-align: right;
    }
    #timeClock .time{
        font-size: 26px;
    }


    /* nav STARTS */
    .navigation{
        width: 220px;
        margin: 0 auto;
    }
    #navList{
        font-family: 'Miscrosoft Yahei';
        margin: 10px 0;
        padding: 0;
        list-style: none;
        overflow: hidden;
        *zoom: 1;
    }
    .view-nav{
        color: #fff;
        cursor: pointer;
        float: left;
        font-size: 20px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        padding: 0 5px;
        min-width: 60px;
    }
    .view-nav.active{
        background-color: #fc0;
        color: #333;
    }
    /* nav ENDS */


    /* monitor STARTS */
    .monitor{
        border: 1px solid #fff;
        border-radius: 5px;
        background-color: rgba(0,0,0,0.5);
        color: #fff;
        font-size: 12px;
    }
    .monitor table{
        width: 100%;
    }
    .monitor-inner{
        height: 100%;
        overflow: hidden;
    }
    .monitor-status{
        border: 1px solid #fff;
        border-radius: 5px;
        background-color: rgba(0,0,0,0.5);
        color: #fff;
        font-size: 14px;
        text-align: center;
        text-decoration: none;
    }
    #sitesDiv{
        position: fixed;
        bottom: 200px;
        right: 0;
        width: 200px;
        height: 250px;
        padding: 6px 10px;
        box-sizing: border-box;
        margin-bottom: -1px;
    }
    #sitesDiv .monitor-status{
        position: absolute;
        top: -1px;
        left: -30px;
        padding: 1em 0.5em;
        width: 1em;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    #attacksDiv{
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 200px;
        padding: 12px 20px;
        box-sizing: border-box;
    }
    #attacksDiv .monitor-status{
        position: absolute;
        top: -32px;
        right: 200px;
        padding: 0.5em 1em;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    /* monitor ENDS */


    .attack-detail{
        background-color: rgba(0,0,0,0.5);
        border: 1px solid #fff;
        border-radius: 4px;
        color: #fff;
        font-size: 13px;
        padding: 4px 6px;
    }
    .attack-detail p{
        margin: 4px;
    }
    </style>
</head>
<body>
    <div id="topDiv">
        <div class="left">
            <h2 id="organization">上海理工大学</h2>
        </div>
        <div class="right">
            <div id="timeClock"></div>
        </div>
        <div class="navigation">
            <ul id="navList">
                <li class="view-nav active J_changeView" data-type="world">世界</li>
                <li class="view-nav J_changeView" data-type="china">中国</li>
                <div id="dynamicNav"></div>
            </ul>
        </div>
    </div>

    <div id="mainContainer">
        <div id="mapChart"></div>
        <input type="hidden" id="orgAdminId" value="${orgAdmin.id}">

        <div class="monitor" id="sitesDiv">
            <div class="monitor-inner">
                <table class="table table-condensed" id="sitesTable">
                    <thead>
                        <tr>
                            <th class="span2">站点名</th>
                            <th class="span2">位置</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#" class="default">南京大学</a></td>
                            <td>南京</td>
                        </tr>
                        <tr>
                            <td><a href="#" class="default">软件学院</a></td>
                            <td>南京</td>
                        </tr>
                        <tr>
                            <td><a href="#" class="default">南京大学苏州研究生院</a></td>
                            <td>苏州</td>
                        </tr>
                        <tr>
                            <td><a href="#" class="default">工程实习中心</a></td>
                            <td>上海</td>
                        </tr>
                        <tr>
                            <td><a href="#" class="default">华北招生中心</a></td>
                            <td>北京</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="javascript:void(0)" class="monitor-status J_changeMonitor" data-orient="right">收起</a>
        </div>

        <div class="monitor" id="attacksDiv">
            <div class="monitor-inner">
                <table class="table table-condensed" id="attacksTable">
                    <thead>
                        <tr>
                            <th class="span2">攻击源IP</th>
                            <th class="span2">攻击源地址</th>
                            <th class="span2">攻击目标IP</th>
                            <th class="span2">攻击目标地址</th>
                            <th class="span2">攻击类型</th>
                            <th class="span2">攻击时间</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <a href="javascript:void(0)" class="monitor-status J_changeMonitor" data-orient="bottom">收起</a>
        </div>
    </div>

    <script type="text/javascript">
        function getClientIpLoaction() {
            return '<?php
                function getIp() {
                if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
                    $ip = getenv("HTTP_CLIENT_IP");
                else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
                    $ip = getenv("HTTP_X_FORWARDED_FOR");
                else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                    $ip = getenv("REMOTE_ADDR");
                else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
                    $ip = $_SERVER['REMOTE_ADDR'];
                else
                    $ip = "unknown";
                return($ip);
                }
                function getCity($ip) {
                    $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
                    $ipinfo=json_decode(file_get_contents($url));
                    if($ipinfo->code=='1'){
                        return false;
                    }
                    $city = $ipinfo->data->city;
                    return $city;
                }
                echo(getCity(getIp()));
            ?>'
        }

        console.log(getClientIpLoaction());
    </script>


    <script type="text/javascript" src="http://cdn.staticfile.org/require.js/2.1.15/require.min.js"></script>
    <script type="text/javascript" src="script/config.js"></script>
    <script type="text/javascript" src="script/app/mainMap.js"></script>
</body>
</html>