<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:90:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/dashboard/index.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<meta name="referrer" content="never">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<?php if(\think\Config::get('fastadmin.adminskin')): ?>
<link href="/assets/css/skins/<?php echo \think\Config::get('fastadmin.adminskin'); ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">
<?php endif; ?>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>

    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !\think\Config::get('fastadmin.multiplenav') && \think\Config::get('fastadmin.breadcrumb')): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <?php if($auth->check('dashboard')): ?>
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                    <?php endif; ?>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <style type="text/css">
    body {
        font-family: Source Han Sans SC;
    }

    .row {
        margin: 0;
    }

    .theme-color-1 {
        color: #333333;
    }

    .theme-color-2 {
        color: #555555;
    }

    .theme-color-3 {
        color: #18BC9C;
    }

    .theme-color-4 {
        color: #627EFC;
    }

    .theme-color-5 {
        color: #666666;
    }

    .theme-color-6 {
        color: #753ECD;
    }

    .margin-20 {
        margin-right: 20px;
    }

    .row-padding {
        padding-left: 29px;
        padding-bottom: 29px;

    }

    /* .#F5F5F5 */
    .header-box {
        width: 100%;
        /* height:236px; */
        background: #fff;
        border-radius: 20px;
        margin-bottom: 10px;
    }

    .header-title,
    .main-title,
    .top5-title {
        height: 78px;
        padding: 0 40px 0 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .main-title,
    .top5-title {
        height: 58px;
    }

    .title-left {
        font-size: 16px;
        font-weight: 500;
    }

    .title-right {
        display: flex;
    }

    .header-con {
        padding: 20px 2.0% 0 0px;
    }

    .header-conBox {
        /* display: flex; */
        background: #FEF6DE;
        padding: 14px 10px 20px 14px;
        border-radius: 20px;
        position: relative;
        height: 120px;
    }

    .header-con-tip {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header-con-tip-left {
        flex: 1;
        display: flex;
        align-items: center;
    }
    .detail{
        cursor: pointer;
    }
    .header-con-tip-i {
        margin-left: 2px;
        
    }

    .img-position {
        position: absolute;
        right: 22px;
        top: 22px;
        display: none;
        border-radius: 50%;
    }

    .header-conBox-back1 {

        background: #FEF6DE;
    }

    .header-conBox-back2 {

        background: #E2F7E9;
    }

    .header-conBox-back3 {

        background: #EBEEFE;
    }

    .header-conBox-back4 {

        background: #FFEDEB;
    }

    .header-conBox-back5 {

        background: #E4F0FF;
    }

    .header-conBox-back6 {

        background: #F6E9FE;
    }

    .header-conBox-back7 {

        background: #FEF6DE;
    }

    .header-conBox-back8 {

        background: #E4F0FF;
    }

    .img-box {
        width: 40px;
        height: 40px;
        background: #fff;
        border-radius: 12px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 12px;
    }

    .header-conBox-active {
        /* background: #E1F6F2; */
        border: 2px solid #18BC9C;
        box-sizing: border-box;
    }

    .header-conBox-active .img-position {
        display: block;
    }

    .header-con-img {
        width: 26px;
        height: 26px;
    }

    .header-con-msg {
        padding-top: 10px;
        width: 100%;
    }

    .header-con-msg-num {
        font-size: 30px;
        font-weight: 600;
        line-height: 30px;
    }

    .header-con-msg-num span {
        margin-left: 8px;
        font-size: 16px;
    }

    .header-con-msg-color1 {
        color: #F0A70A;
    }

    .header-con-msg-color2 {
        color: #38C769;
    }

    .header-con-msg-color3 {
        color: #627EFC;
    }

    .header-con-msg-color4 {
        color: #FF826C;
    }

    .header-con-msg-color5 {
        color: #4498FF;
    }

    .header-con-msg-color6 {
        color: #B052EA;
    }

    .header-con-msg-color7 {
        color: #F0A70A;
    }

    .header-con-msg-color8 {
        color: #4498FF;
    }

    .header-con-msg-tip {
        font-size: 14px;

        font-weight: 400;
        display: flex;
        justify-content: space-between;
        align-items: center;
        justify-content: center;
    }

    .main {
        border-radius: 20px;
        margin-bottom: 10px;
    }
    .main-1{
        position: relative;
    }
    .main-chart-tip-con{
        position: absolute;
        left: 50%;
        top: 50%;
        width: 120px;
        height: 40px;
        margin-top: -20px;
        margin-left: -60px;
    }
    .main-position {
        /* width: 100%; */
        position: absolute;
        top: 10px;
        display: flex;
        justify-content: space-between;
        padding: 0 40px 0 20px;

    }

    .main-position-right {
        display: flex;
        align-items: center;
    }

    .main-refresh {
        display: flex;
        align-items: center;
        /* cursor: pointer; */
    }

    .main-refresh-tip {
        margin: 0 30px 0 8px;
    }

    .main-chart-tip {
        display: flex;
    }

    .main-chart-tip-msg {
        margin: 0 20px 0 4px;
    }

    #main-chart {
        padding: 40px 32px 10px 16px;
        margin-right: 20px;
        background: #fff;
        border-radius: 4px;
        margin-bottom: 10px;

    }

    .main-title .title-right {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header-right-btn {
        display: block;
        width: 50px;
        height: 32px;
        border: 1px solid #E3E2E5;
        color: #666666;
        font-size: 14px;
        border-radius: 4px;
        line-height: 32px;
        text-align: center;
        cursor: pointer;
    }

    .header-right-btn-active {

        border: 1px solid #627EFC;
        color: #627EFC;
    }

    .top5 {
        height: 400px;
        /* background: #fff; */
        border-radius: 20px;
    }

    .top-more {
        color: #999999;
        align-items: center;
        margin-left: 6px;
    }

    .selects {
        padding: 5px 10px;
        display: block;
        border: 1px solid #eee;
    }

    .selects-active {
        border: 1px solid #f00;
    }

    #antv-con {
        background: #f1f4f6;
    }

    .time-position {
        position: relative;
        /* margin-right: 300px; */
    }

    .ranges {
        display: none;
    }

    .col-lg-8,
    .col-lg-4 {
        padding: 0;
    }

    .el-dropdown {
        width: 70px;
        height: 30px;
        border: 1px solid #753ECD;
        border-radius: 4px;
        line-height: 30px;
        text-align: center;
        cursor: pointer;
        color: #753ECD !important;
        margin-right: 14px;
    }

    .el-icon-arrow-right,
    .el-range__icon {
        display: none !important;
    }

    .el-input__inner {
        height: 30px !important;
        line-height: 30px !important;
    }

    .top5-heght {
        height: 100%;
        padding: 0;
        margin-bottom: 20px;
        /* background: #fff;
        border-radius:10px; */
    }

    .top5-right {
        height: 100%;
        background: #fff;
        border-radius: 10px;
        position: relative;
        padding-top: 10px;
    }

    .top5-left {
        height: 100%;
        background: #fff;
        border-radius: 10px;
        /* margin-right: 20px; */
        padding: 10px 26px;
    }

    .top5-left .top5-title {
        padding: 0;
        font-size: 16px;
        /* line-height: 16px;
        height: 16px; */
    }

    #ring-right {
        margin-top: 6px;
    }

    .ring-right-position {
        /* background: #f00; */
        width: 246px;
        height: 246px;
        border: 41px solid rgba(255, 255, 255, 1);
        box-shadow: 0px 10px 30px 0px rgba(73, 111, 253, 0.12);
        border-radius: 50%;
        left: 50%;
        top: 50%;
        margin-top: -123px;
        margin-left: -123px;
        position: absolute;
    }

    .ring-right-position-inner {
        width: 140px;
        height: 140px;
        background: #f3f6fe;
        border-radius: 50%;
        left: 50%;
        top: 50%;
        margin-top: -70px;
        margin-left: -70px;
        position: absolute;
    }

    .position-background {
        width: 90px;
        height: 90px;
        border: 14px solid #fff;
        box-shadow: 0px 8px 20px 0px rgba(117, 62, 205, 0.12);
        border-radius: 50%;
        position: relative;
    }

    .position-background-inner {
        position: absolute;
        width: 62px;
        height: 62px;
        background: #f6f2fc;
        border-radius: 50%;
        left: 50%;
        top: 50%;
        margin-left: -31px;
        margin-top: -31px;
    }

    .top5-center-top {
        height: 190px;
        background: #fff;
        /* display: flex;
        justify-content: space-between; */
        padding: 20px 28px 30px;
        border-radius: 10px;
    }

    .top5-center-top-ring {
        display: flex;
        justify-content: space-between;
    }

    .top5-center-title {
        margin-bottom: 50px;
        font-size: 14px;
        color: #666;
        font-weight: 600;
    }

    .top5-center-num {
        font-size: 24px;

        font-weight: bold;
        margin-top: 10px;
    }

    .top5-center-tip {
        font-size: 14px;
        font-weight: 500;
        color: #666;
    }

    .top5-center {
        margin: 0 18px 0 20px;
    }

    .top5-center-top-margin {
        margin-bottom: 20px;
    }

    .el-table .gray-row {
        background: #F9F9F9;
    }

    .el-table td {
        height: 48px;
        padding: 0 !important;
    }

    .el-table th {
        height: 60px;
        padding: 0 !important;
    }

    .cell {
        text-align: center;

    }

    .el-date-editor .el-range__close-icon {
        display: none !important;
        width: 0 !important;

    }

    .el-range-editor.el-input__inner {
        padding: 3px 0 !important;
    }

    .el-date-editor .el-range-input {
        width: 45% !important;
    }

    .el-date-editor--datetimerange.el-input__inner {
        justify-content: center !important;
        width: 326px !important;
    }

    .el-date-editor .el-range-separator {
        height: 32px !important;
    }
    .popover-item{
        font-size: 24px;
        color: #d5d5d5;
        margin-left: 10px;
        position: relative;
        top: 4px;
    }
    .ellipsis-item {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
}

    @media screen and (max-width: 1430px) {
        .top5-center {
            /* margin-left: 0; */
        }

        #main-chart {
            /* margin-right: 0; */
        }
    }

    @media screen and (max-width: 750px) {
        .main-position {
            padding: 0 20px;
        }

        .refresh-btn {
            display: none;
        }

        .picker-hide {
            display: none !important;
        }

       
        .top5-center {
            margin-right: 0;
            margin-left: 0;
        }

        #main-chart {
            margin-right: 0;
        }
    }

    [v-cloak] {
        display: none
    }
</style>
<link rel="stylesheet" href="/assets/addons/shopro/libs/element/element.css">
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<div id="antv-con" v-cloak v-loading="loading">
    <el-row class="row main">
        <el-col :xs="24" :sm="24" :md="24" :lg="16" :xl="16" class="main-1">
            <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="main-position">
                <div class="main-refresh">
                    <div class="refresh-btn" @click="getDataInfo">
                        <i class="fa fa-refresh"></i>
                        <span class="main-refresh-tip theme-color-1">刷新</span>
                    </div>
                    <div class="main-chart-tip">
                        <div v-for="item in selectInputs">
                            <div v-if="item.checked">
                                <img :src="'/assets/addons/shopro/img/dashboard/icon-'+item.id+'.png'">
                                <span class="main-chart-tip-msg">{{item.title}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-position-right">
                    <el-dropdown>
                        <span class="el-dropdown-link">
                            {{dropdownName}}<i class="fa fa-angle-down theme-color-6 top-more"></i>
                        </span>
                        <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item v-for="(item,index) in dropdownList"
                                @click.native="changeTime(index)">
                                {{item.name}}</el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                    <el-date-picker class="picker-hide" v-model="searchTime" type="datetimerange" range-separator="-"
                        start-placeholder="开始日期" align="center" @change="getDataInfo" end-placeholder="结束日期">
                    </el-date-picker>
                </div>
            </el-col>
            <div id="main-chart"></div>
            <div v-if="selectInputs.length==0" class="main-chart-tip-con">请选择查看数据</div>
            <!-- <div v-else>请选择查看数据</div> -->
        </el-col>
        <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8" style="margin-top: -15px;">
            <el-row>
                <div v-for="(item,index) in dataList" @click="selectLine(index)">
                    <el-col :xs="24" :sm="12" :md="12" :lg="12" :xl="12" class=" header-con">
                        <div class="header-conBox"
                            :class="['header-conBox-back'+item.id,item.checked?'header-conBox-active':'']"
                            :style="{'border-color': item.color}">
                            <div class="header-con-tip" :class="'header-con-msg-color'+item.id">
                                <div class="header-con-tip-left">
                                    <div class="img-box">
                                        <img class="header-con-img"
                                            :src="'/assets/addons/shopro/img/dashboard/'+item.id+'.png'" />
                                    </div>
                                    <div>{{item.title}}<span v-if="item.id==6">(累计)</span></div>
                                </div>
                                
                                <div class="detail" v-if="item.id<5" @click.stop="goDetail(item.id)">详情<i class="fa fa-angle-right header-con-tip-i"></i></div>
                            </div>
                            <div class="header-con-msg" :class="'header-con-msg-color'+item.id">
                                <div class="header-con-msg-tip">
                                    <div class="header-con-msg-num">{{item.num}}<span>{{item.unit}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </el-col>
                </div>
            </el-row>
        </el-col>
    </el-row>
    <div class="row top5">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 top5-heght">
            <div class="top5-left">
                <div class="top5-title">
                    <div class="theme-color-5 title-left">
                        TOP5
                    </div>
                </div>
                <div v-if="tableData.length>0">
                    <el-table :data="tableData" border style="width: 100%" :row-class-name="tableRowClassName">
                        <el-table-column label="排名" width="64">
                            <template slot-scope="scope">
                                　　　　<span>{{scope.$index+1}}</span>
                                　　</template>
                        </el-table-column>
                        <el-table-column label="商品图" width="80">
                            　　<template slot-scope="scope">
                                　　　　<img :src="Fast.api.cdnurl(scope.row.image)" width="34" height="34" />
                                　　</template>
                        </el-table-column>
                        <el-table-column prop="title" label="商品名称"  width="380">

                            <template slot-scope="scope">
                                <div class="ellipsis-item">
                                    {{scope.row.title}}
                                </div>
                                <!-- <el-popover placement="top-start" title="" width="250" trigger="hover" >
                                  <div>{{scope.row.title}}</div>
                                    <span slot="reference">{{ .substr(0,20)+'...' }}</span>
                                </el-popover> -->
                              </template>
                        </el-table-column>
                        <el-table-column prop="sales" label="商品销量" width="100">
                        </el-table-column>
                        <el-table-column prop="sale_total_money" label="销售额(元)" min-width="120">
                        </el-table-column>
                    </el-table>
                </div>
                <div v-else style="text-align: center;height: 320px;
                line-height: 320px;">
                    没有找到任何数据,您可以尝试刷新~
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 top5-heght">
            <div class="top5-center">
                <div class="top5-center-top top5-center-top-margin">
                    <div class="top5-center-top-ring">
                        <div>
                            <div class="top5-center-title">
                                <span>支付单数/总单数</span>
                                <!-- <el-popover class="popover-item" width="240" trigger="hover"
                                content="支付单数/总单数=下单人数/支付人数">
                                    <i slot="reference" class="el-icon-question"></i>
                                </el-popover> -->
                            </div>
                            <div>
                                <div class="top5-center-tip">支付单数</div>
                            </div>
                        </div>
                        <div class="position-background">
                            <div class="position-background-inner"></div>
                            <el-progress
                                style="position: absolute;left: 50%;top: 50%;margin-top: -41px;margin-left: -41px;"
                                type="circle" :percentage="(orderFinish.order_scale*100).toFixed(2)" color="#753ECD" width="82"></el-progress>

                        </div>
                    </div>
                    <div class="top5-center-num theme-color-6">{{orderFinish.order_payed}}人</div>
                </div>
                <div class="top5-center-top">
                    <div class="top5-center-top-ring">
                        <div>
                            <div class="top5-center-title">
                                <span>支付金额/总金额</span>
                                <!-- <el-popover class="popover-item" width="240" trigger="hover"
                                    content="金额比例=下单金额/支付金额">
                                    <i slot="reference" class="el-icon-question"></i>
                                </el-popover> -->
                            </div>
                            <div>
                                <div class="top5-center-tip">支付金额</div>
                            </div>
                        </div>
                        <div class="position-background">
                            <div class="position-background-inner"></div>
                            <el-progress
                                style="position: absolute;left: 50%;top: 50%;margin-top: -41px;margin-left: -41px;"
                                type="circle" :percentage="(payedFinish.payed_scale*100).toFixed(2)" color="#753ECD" width="82"></el-progress>

                        </div>
                    </div>
                    <div class="top5-center-num theme-color-6">{{payedFinish.payed_money}}元</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 top5-heght">
            <div class="top5-right" style="position: relative;">
                <div class="top5-title">
                    <div class="theme-color-5 title-left">
                        支付渠道
                    </div>
                    <!-- <div class="theme-color-1 title-right">
                        查看详情<i class="fa fa-angle-right top-more"></i>
                    </div> -->
                </div>
                <div class="ring-right-position"></div>
                <div class="ring-right-position-inner"></div>
                <div id="ring-right"></div>
            </div>
        </div>
    </div>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>
    </body>
</html>
