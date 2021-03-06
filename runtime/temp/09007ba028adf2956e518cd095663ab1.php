<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:97:"D:\phpstudy_pro\WWW\waibao\pinpin\public/../application/admin\view\shopro\order\order\detail.html";i:1613822978;s:76:"D:\phpstudy_pro\WWW\waibao\pinpin\application\admin\view\layout\default.html";i:1611580234;s:73:"D:\phpstudy_pro\WWW\waibao\pinpin\application\admin\view\common\meta.html";i:1611580234;s:75:"D:\phpstudy_pro\WWW\waibao\pinpin\application\admin\view\common\script.html";i:1611580234;}*/ ?>
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
                                <link rel="stylesheet" href="/assets/addons/shopro/libs/element/element.css">
<style>
    #orderDetail {
        font-size: 12px;
        font-family: Source Han Sans SC;
        font-weight: 400;
    }

    .more-ellipsis {
        position: relative;
        width: 280px;
        font-size: 13px;
        color: #868789;
        line-height: 18px;
        text-align: left;
        overflow: hidden;
    }

    .more-ellipsis-after:after {
        content: "...";
        position: absolute;
        bottom: 0;
        right: 5px;
        background: #F8F8F8;
    }

    .theme-color {
        color: #7536D0;
    }

    .theme-red {
        color: #FF5000;
        margin-left: 14px;
    }

    .color-333 {
        color: #333;
    }

    .color-444 {
        color: #444;
    }

    .color-666 {
        color: #666;
    }

    .color-888 {
        color: #888;
    }

    .color-999 {
        color: #999;
    }

    .display-flex {
        display: flex;
        align-items: center;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .common-btn-box {
        display: flex;
        /* flex-direction: column; */
        align-items: center;
        justify-content: center;
    }

    .common-btn {
        width: 88px;
        text-align: center;
        height: 30px;
        line-height: 30px;
        color: #fff;
        border-radius: 4px;
        background: #753ECD;
        cursor: pointer;
    }

    .order-msg-btn {
        display: flex;
    }

    .order-msg-btn-1 {
        width: 100px;
        height: 26px;
        line-height: 24px;
        background: rgba(243, 239, 251, 1);
        border: 1px solid rgba(117, 62, 205, 1);
        border-radius: 13px;
        margin: 14px 14px 11px 0;
        color: #7536D0;
        text-align: center;
    }

    .order-msg-btn-2 {
        width: 100px;
        height: 26px;
        line-height: 24px;
        background: rgba(243, 239, 251, 1);
        border: 1px solid #F56C6C;
        border-radius: 13px;
        margin: 14px 14px 11px 0;
        color: #F56C6C;
        text-align: center;
    }

    .order-title {
        height: 40px;
        line-height: 40px;
    }

    .el-popover {
        min-width: 86px;
        text-align: center;
    }

    .order-title-time {
        margin: 0 25px 0 19px;
    }

    .order-platform {
        margin-right: 10px;
    }

    .order-detail {
        border: 2px solid rgba(240, 240, 240, 1);
    }

    .order-msg {
        border-bottom: 1px solid rgba(240, 240, 240, 1);
    }

    .order-msg-left {
        padding: 28px 12px 0 31px;
        height: 100%;
    }

    .order-status-tip {
        font-size: 20px;
        margin-bottom: 18px;
        font-weight: 900;
    }

    .order-status-describe {
        margin-bottom: 12px;
    }

    .order-add-memo {
        margin-top: 8px;
    }

    .order-msg-center {
        padding: 42px 62px;
        border-left: 1px solid #F0F0F0;
        border-right: 1px solid #F0F0F0;
    }

    .order-msg-right {
        flex-direction: column;
        align-items: center;
        padding: 50px 0 0;
    }

    .order-msg-right-item {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        width: 100%;
        padding-left: 30px;
    }

    .order-msg-right-item span:first-child {
        display: block;
        width: 54px;
        margin-right: 58px;
    }

    .order-msg-right-money {
        font-size: 20px;
        color: #FF5000;
        margin-left: -20px;
    }

    .order-detail-tip {
        font-weight: 400;
        padding: 10px 20px 0;
    }

    .order-detail-tip-title {
        color: #FFB333;
        /* width: 88px; */
    }

    .order-detail-remark {
        color: #7438D5;
    }

    .delivery-msg {
        background: #F8F8F8;
        border: 2px solid #F0F0F0;
        margin: 14px 0 12px 0;
    }

    .delivery-msg-item {
        padding: 20px 0 0 20px;
        height: 134px;
    }

    .delivery-msg-item .el-input--mini .el-input__inner {
        height: 20px;
        line-height: 20px;
    }

    .delivery-msg-item-title {
        margin-bottom: 10px;
    }

    .delivery-msg-item-msg {
        margin-bottom: 5px;
    }

    .delivery-margin-left {
        margin-left: 12px;
        max-width: 280px;
    }

    .delivery-margin-left .el-input {
        max-width: 100%;
    }

    /* table */
    .el-table thead {
        color: #444;
    }

    .el-table th {
        background: #F9F9F9;
    }

    .table-img {
        width: 50px;
        height: 50px;
        margin-right: 14px;
        border: 1px solid #e6e6e6;
    }

    .goods-title {
        width: 526px;
    }

    .goods-title-ellipsis {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .el-table_1_column_1 {
        border-left: 1px solid #eee;
    }

    .el-table_1_column_13 {
        border-right: 1px solid #eee;
    }

    .el-step__head.is-process {
        color: #eee;
        border-color: #eee;
    }

    .el-step__title.is-wait {
        color: #999;
        font-size: 14px;
    }

    .order-detail .el-step__title.is-process {
        color: #444;
        font-size: 14px;
        line-height: 14px;
        margin: 15px 0 10px 0;
        font-weight: 500;
    }

    .el-step__description.is-process {
        color: #999;

    }

    .el-step__icon {
        width: 38px;
        height: 38px;
    }

    .el-step__head.is-finish {
        color: #7536D0;
        border-color: #7536D0;
    }

    .el-step__head.is-success {
        color: #7536D0;
        border-color: #7536D0;
    }

    .el-step__title.is-success {
        color: #444;
    }

    .el-step__description.is-success {
        color: #999;
    }

    .el-step__icon.is-text {
        background: #eee;
        border: 4px solid #fff;

    }

    .el-step__head.is-success .el-step__icon.is-text {
        background: #7536D0;
    }

    .el-step__icon-inner {
        color: #fff;
    }

    .el-step.is-horizontal .el-step__line {
        top: 18px;
    }

    .package-con {
        height: 192px;
        margin: 10px 0;
        border: 1px solid #eee;
        border-top: none;
        color: #666;
    }

    .package-item-delivery {
        height: 122px;
        overflow: auto;
        padding-left: 20px;
    }

    .package-item-delivery-status {
        margin-bottom: 10px;
    }

    .package-item {
        padding-left: 20px;
    }

    .package-item-time {
        margin: 10px 0 20px;
    }

    .package-item-goods {
        width: 144px;
    }

    .package-item-goods-title {
        width: 81px;
    }


    .package-con .el-step__icon {
        width: 8px;
        height: 8px;
        background: #eee;
        border-color: #eee;
    }

    .package-con .is-process .el-step__icon {
        width: 8px;
        height: 8px;
        background: #FFB333;
        border-color: #FFB333;
    }

    .package-con .el-step__icon-inner {
        display: none;
    }

    .package-con .el-step.is-vertical .el-step__line {
        top: 14px;
        left: 3px;
    }

    .package-con .el-step.is-vertical .el-step__head {
        width: 15px;
    }

    .package-con .el-step__title.is-finish,
    .package-con .el-step__description.is-finish {
        color: #666;
    }

    .package-con .el-step__title.is-process {
        color: #666;
        font-weight: 500;
    }

    .title-span-width {
        width: 54px;
        display: block;
        text-align: justify;
        text-align-last: justify;
    }

    /*.order-dialog*/
    .el-dialog {
        width: 600px;
        border-radius: 6px;
    }

    .order-dialog .cell {
        font-size: 12px;
        color: #666;
        font-weight: 400;
    }

    .el-dialog__body {
        padding-top: 0;
        padding-bottom: 20px;
    }

    .order-dialog .el-form--inline {
        padding-left: 10px;
    }

    .order-dialog .el-dialog__title,
    .el-table thead,
    .has-gutter,
    .order-dialog .el-table,
    .el-form-item__label {
        color: #666;
        font-weight: 400;
    }

    .order-dialog .el-table td {
        border-bottom: 1px solid #EBEEF5;
    }

    .order-dialog .el-table_2_column_11 {
        border-left: 1px solid #EBEEF5;
    }

    .order-dialog .el-table_2_column_11 .cell {
        text-align: left;
    }

    .order-dialog .el-table_2_column_15 {
        border-right: 1px solid #EBEEF5;

    }

    .order-dialog .el-radio {
        color: #999;
    }

    .el-dialog__footer {
        display: flex;
        justify-content: flex-end;
    }

    .dialog-footer-btn {
        width: 88px;
        height: 36px;
        line-height: 36px;
        background: #fff;
        border: 1px solid #999;
        border-radius: 4px;
        color: #999;
        display: flex;
        align-items: center;
        padding: 0;
        justify-content: center;
    }

    .el-button--primary.is-disabled {
        color: #999;
        background: #fff;
        border: 1px solid #999;
    }

    .el-button--primary.is-disabled:hover {
        color: #999;
        background: #fff;
        border: 1px solid #999;
    }

    .el-button--primary:hover {
        color: #753ECD;
        border: 1px solid rgba(117, 62, 205, 1);
        background: #F3EFFB;
    }

    .dialog-footer-btn-active {
        background: #753ECD;
        color: #fff;
        border: none;
        line-height: 36px;
    }

    .el-table_2_column_13 {
        border-left: 1px solid #f6f6f6;
    }

    .el-table_2_column_14 {
        border-right: 1px solid #f6f6f6;
    }

    .cell {
        text-align: center;
    }

    .el-table_1_column_1 .cell {
        text-align: left;
    }

    .el-table_2_column_13 .cell {
        text-align: left;
    }

    /* refund-box */
    .refund-box .el-dialog {
        width: 400px;
    }

    .refund-item {
        padding: 20px;
        display: flex;
        margin-bottom: 10px;
    }

    .refund-item-tip {
        width: 90px;
        line-height: 40px;
    }

    .refund-item-btn {
        flex-direction: row-reverse;
        margin-bottom: 0;
        padding: 0 20px;
    }

    .refund-cancel {
        color: #999;
        background: none;
        border: none;
        margin-right: 20px;
    }

    .memo-item .el-input {
        width: 120px;
        margin-right: 14px;
    }

    .memo-item-cancel {
        margin-left: 14px;
    }

    .popover-item {
        height: 24px;
    }

    .popover-item i {
        font-size: 24px;
        margin-left: 10px;
        color: #ccc;
    }

    .el-dialog__title {
        font-size: 14px;
    }

    .el-table {
        font-size: 12px;
    }

    .el-table th {
        font-size: 13px;
    }

    .el-dialog__body .el-table th {
        padding: 5px 0;
        font-size: 13px;
    }

    .el-dialog .el-input__inner {
        font-size: 13px;
    }

    .el-checkbox__input.is-checked .el-checkbox__inner,
    .el-checkbox__input.is-indeterminate .el-checkbox__inner {
        background-color: #7536d0;
        border-color: #7536d0;
    }

    .el-checkbox__inner:hover {
        border-color: #7536d0;
    }

    .order-main-btn {
        margin-right: 20px;
    }

    .el-table th.is-leaf {
        border-bottom: none;
    }

    .el-tabs__item.is-active,
    .el-tabs__item:hover {
        color: #7536D0;
    }

    .el-table--border td,
    .el-table--border th,
    .el-table__body-wrapper .el-table--border.is-scrolling-left~.el-table__fixed {
        border-right: none;
    }

    .el-select-dropdown__item.selected {
        color: #7536D0;
    }

    [v-cloak] {
        display: none
    }

    .package-log {
        position: relative;
    }

    .log-btn {
        position: absolute;
        right: 0;
        top: 0;
    }

    .order-refresh {
        width: 34px;
        height: 32px;
        border: 1px solid #E6E6E6;
        border-radius: 4px;
        color: #666;
        justify-content: center;
        font-size: 16px;
        cursor: pointer;
    }

    .order-log {
        width: 88px;
        height: 32px;
        border: 1px solid #E6E6E6;
        border-radius: 4px;
        justify-content: center;
        font-size: 13px;
        margin: 0 14px;
        cursor: pointer;
    }

    .log-tip {
        font-size: 26px;
        color: #ccc;
    }

    .tip-container {
        display: flex;
        margin-bottom: 10px;
    }

    .flex-1 {
        flex: 1;
    }

    .popover-tip {
        color: #999;
        width: 56px;
        text-align: justify;
        text-align-last: justify;
    }

    /* select分页 */
    .select-page-container {
        position: relative;
    }

    .select-option-container {
        display: flex;
        align-items: center;
    }

    .select-option-container .option-id {
        width: 100px;
        text-align: left;
    }

    .select-option-container .option-code {
        width: 180px;
        text-align: left;
    }

    .select-option-container .option-name {
        flex: 1;
    }

    .select-pagination {
        position: sticky;
        background: #fff;
        height: 28px;
        top: 0;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 10px;
    }

    .select-pagination .pagination {
        margin: 0;
    }

    .select-pagination .el-pagination__sizes {
        display: none !important;
    }

    .select-pagination-jumper {
        cursor: pointer;
        color: #7438D5;
        margin-left: 8px;
    }

    .immediately-choice-text {
        margin-right: 20px;
        color: #7438D5;
        cursor: pointer;
    }

    .all-refund-money-text {
        color: #FF5959;
        cursor: pointer;
    }
    .el-input--small{
        height: 32px !important;
        line-height: 32px !important;
    }

    @media only screen and (max-width:991px) {
        .hidden-sm-and-down {
            display: none !important
        }
    }

    @media only screen and (min-width:992px) {
        .hidden-md-and-up {
            display: none !important
        }
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<script src="/assets/addons/shopro/libs/clipboard.min.js"></script>
<div id="orderDetail" v-cloak>
    <div class="order-title display-flex color-666" style="justify-content: space-between;">
        <div class="order-title display-flex">
            <span>订单号:{{orderDetail.order_sn}}</span>
            <span
                class="order-title-time">下单时间:{{moment(orderDetail.createtime*1000).format("YYYY-MM-DD HH:mm:ss")}}</span>
            <div class="display-flex"><span v-if="orderDetail.platform_text" class="order-platform">订单来源:</span>
                <el-popover style="min-width: 86px;" placement="top" trigger="hover"
                    :content="orderDetail.platform_text">
                    <img v-if="orderDetail.platform_text" slot="reference"
                        :src="'/assets/addons/shopro/img/order/'+orderDetail.platform+'.png'">
                </el-popover>
            </div>
        </div>
    </div>
    <div class="order-detail">
        <div class="order-msg">
            <el-row>
                <el-col :xs="12" :sm="12" :md="6" :lg="6" :xl="6">
                    <div class="order-msg-left">
                        <div>
                            <div class="order-status-tip color-333">{{orderDetail.status_name}}</div>
                            <div class="order-status-describe color-999">{{orderDetail.status_desc}}</div>
                        </div>
                        <div class="display-flex ">
                            <!-- <div class="common-btn" @click="cancelOrder(orderDetail.id)">取消订单</div> -->
                            <div class="common-btn order-main-btn" @click="openDialog('express')"
                                v-if="orderDetail.btns && orderDetail.btns.indexOf('send')!=-1">立即发货</div>
                            <div class="immediately-choice-text" @click="openDialog('send_store',orderDetail.id,null)"
                                v-if="orderDetail.btns && orderDetail.btns.indexOf('send_store')!=-1">立即备货</div>
                            <div class="all-refund-money-text" @click="openDialog('refund',orderDetail.id,null)"
                                v-if="orderDetail.btns && orderDetail.btns.indexOf('refund')!=-1">全部退款</div>
                        </div>

                        <div class="order-add-memo">
                            <div v-if="!addMemoFlag">
                                <span>{{(orderDetail.memo!=null && orderDetail.memo.length>42)?orderDetail.memo.substr(0,42)+'...':orderDetail.memo}}</span>
                                <span v-if="orderDetail.memo" class="theme-color cursor-pointer"
                                    @click="addMemo('add')">修改备注</span>
                                <span v-else class="theme-color cursor-pointer" @click="addMemo('add')">添加备注</span>
                            </div>
                            <div v-if="addMemoFlag" class="display-flex memo-item">
                                <el-input size="mini" v-model="orderDetail.memo" placeholder="请输入备注"></el-input>
                                <span class="theme-color cursor-pointer" @click="addMemoreq(orderDetail.id)">确定</span>
                                <span class="theme-color cursor-pointer memo-item-cancel"
                                    @click="addMemo('cancel')">取消</span>
                            </div>
                        </div>
                    </div>
                </el-col>
                <el-col class="hidden-md-and-up" :xs="12" :sm="12" :md="4" :lg="4" :xl="4">
                    <div class="order-msg-right display-flex">
                        <div class="order-msg-right-item"><span
                                class="title-span-width">商品总价:</span><span>￥{{orderDetail.goods_amount}}</span>
                        </div>
                        <div class="order-msg-right-item"><span
                                class="title-span-width">配送费:</span><span>￥{{orderDetail.dispatch_amount}}</span>
                        </div>
                        <div v-if="orderDetail.discount_fee>0" class="order-msg-right-item">
                            <span class="title-span-width">优惠:</span><span>-￥{{orderDetail.discount_fee}}</span>
                        </div>
                        <div v-if="orderDetail.type=='score'" class="order-msg-right-item">
                            <span class="title-span-width">积分:</span><span
                                style="padding-left: 4px;">+{{orderDetail.score_amount}}</span>
                        </div>
                        <div class="order-msg-right-item"><span
                                class="order-msg-right-title color-444 title-span-width">订单金额:</span><span
                                class="order-msg-right-money">￥{{orderDetail.pay_fee}}</span></div>
                    </div>
                </el-col>
                <el-col :xs="24" :sm="24" :md="14" :lg="14" :xl="14">
                    <div class="order-msg-center">
                        <el-steps :active="stepActive" align-center finish-status="success">
                            <el-step title="买家下单"
                                :description='moment(orderDetail.createtime*1000).format("YYYY-MM-DD HH:mm:ss")'>
                            </el-step>
                            <el-step title="买家付款" :description="orderDetail.status>0?orderDetail.paytime_text:''">
                            </el-step>
                            <el-step title="商家发货"
                                :description='(orderDetail.ext_arr && orderDetail.ext_arr.send_time)?moment(orderDetail.ext_arr.send_time*1000).format("YYYY-MM-DD HH:mm:ss"):""'>
                            </el-step>
                            <el-step title="交易完成"
                                :description="(orderDetail.ext_arr && orderDetail.ext_arr.finish_time)?moment(orderDetail.ext_arr.finish_time*1000).format('YYYY-MM-DD HH:mm:ss'):''">
                            </el-step>
                        </el-steps>
                    </div>
                </el-col>
                <el-col class="hidden-sm-and-down" :xs="12" :sm="12" :md="4" :lg="4" :xl="4">
                    <div class="order-msg-right display-flex">
                        <div class="order-msg-right-item">
                            <span class="title-span-width">商品总价:</span><span>￥{{orderDetail.goods_amount}}</span>
                        </div>
                        <div class="order-msg-right-item">
                            <span class="title-span-width">配送费:</span><span>￥{{orderDetail.dispatch_amount}}</span>
                        </div>
                        <div v-if="orderDetail.discount_fee>0" class="order-msg-right-item">
                            <span class="title-span-width">优惠:</span><span>-￥{{orderDetail.discount_fee}}</span>
                        </div>
                        <div v-if="orderDetail.type=='score'" class="order-msg-right-item">
                            <span class="title-span-width">积分:</span><span>+{{orderDetail.score_amount}}</span>
                        </div>
                        <div class="order-msg-right-item">
                            <span class="order-msg-right-title color-444 title-span-width">订单金额:</span>
                            <span class="order-msg-right-money">￥{{orderDetail.pay_fee}}</span>
                        </div>
                    </div>
                </el-col>
            </el-row>
        </div>
        <div class="order-detail-tip">
            <el-row :gutter="60">
                <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12" class="tip-container">
                    <div class="order-detail-tip-title">温馨提示：</div>
                    <div class="flex-1"><span v-if="orderDetail.status==0"
                            class="color-999">请务必等待订单状态变更为“买家已付款，等待卖家发货”后再进行发货</span>
                        <span v-if="orderDetail.status==1"
                            class="color-999">1、如果无法发货，请及时与买家联系并说明情况后进行退款；2、买家申请退款后，须征得买家同意后发货，否则买家有权拒收货物</span>
                        <span v-if="orderDetail.status==2" class="color-999">交易完成，若买家提出售后要求，请积极与买家协商。</span>
                        <span v-if="orderDetail.status==-1" class="color-999">买家已取消</span>
                        <span v-if="orderDetail.status==-2" class="color-999">买家未在规定时间内付款，交易自动关闭</span></div>

                </el-col>
                <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12" class="tip-container">
                    <div class="order-detail-remark">买家留言：</div>
                    <div class="color-999 flex-1" v-if="orderDetail.remark">{{orderDetail.remark}}</div>
                    <div class="color-999 flex-1" v-if="!orderDetail.remark">无</div>
                </el-col>
            </el-row>

        </div>
    </div>
    <div class="package-con" v-if="packageList.length>0">
        <div class="package-log">
            <el-tabs v-model="activeName" type="card">
                <el-tab-pane v-for="(item,index) in packageList" :label="'包裹'+(index+1)" :name="index+1"></el-tab-pane>
            </el-tabs>
            <div class="log-btn display-flex">
                <div class="order-refresh display-flex">
                    <i class="el-icon-refresh" @click="subscribe(packageList[activeName-1].id,'search')"></i>
                </div>
                <div class="order-log display-flex" @click="subscribe(packageList[activeName-1].id,'subscribe')">
                    重新订阅
                </div>
                <div class="log-tip">
                    <el-popover placement="bottom-end" title="" width="200" trigger="hover"
                        content="如果长时间物流状态没有更新，可以尝试刷新一下。如果没有物流信息，可以尝试重新订阅一下！">
                        <i class="el-icon-question" slot="reference"></i>
                    </el-popover>
                </div>
            </div>
        </div>

        <el-row style="overflow: auto;height: 136px;background: #fff;">
            <el-col :span="10">
                <div class="package-item">
                    <div><span>快递公司：</span><span>{{packageList[activeName-1].express_name}}</span></div>
                    <div class="package-item-time">
                        <span>快递单号：</span><span>{{packageList[activeName-1].express_no}}</span>
                    </div>
                    <div style="display: flex;flex-wrap: wrap;">
                        <div class="display-flex package-item-goods" v-for="it in packageList[activeName-1].item">
                            <img class="table-img" :src="Fast.api.cdnurl(it.goods_image)">
                            <div>
                                <div class="goods-title package-item-goods-title goods-title-ellipsis color-999">
                                    {{it.goods_title}}</div>
                                <div class="color-999"><span>数量：</span><span>{{it.goods_num}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </el-col>
            <el-col :span="14">
                <div class="package-item-delivery">
                    <div class="package-item-delivery-status"><span>物流状态:</span>
                        <span class="theme-color cursor-pointer"
                            @click="openDialog('express',packageList[activeName-1].id)"
                            v-if="packageList[activeName-1].log.length==0">修改物流</span></div>
                    <div style="height: 300px;padding-left: 10px;">
                        <el-steps direction="vertical" :active="deliveryActive">
                            <el-step v-for="i in packageList[activeName-1].log" :title="i.changedate"
                                :description="i.content">
                            </el-step>
                        </el-steps>
                    </div>
                </div>
            </el-col>
        </el-row>
    </div>
    <div class="delivery-msg color-888">
        <el-row>
            <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12" v-if="orderDetail.consignee && orderDetail.phone">
                <div class="delivery-msg-item">
                    <div class="display-flex delivery-msg-item-title">
                        <div class="color-333">收货信息</div>
                        <div class="delivery-margin-left theme-color cursor-pointer" v-if='!deliveryEditFlag'
                            @click="deliveryEdit">修改</div>
                        <div class="delivery-margin-left theme-color cursor-pointer" v-if='deliveryEditFlag'
                            @click="deliveryDefine">
                            确定</div>
                        <div class="delivery-margin-left theme-color cursor-pointer copy-msg" v-if='!deliveryEditFlag'
                            :data-clipboard-text="'收货人:'+orderDetail.consignee+';联系电话:'+orderDetail.phone+';收货地址:'+ orderDetail.province_name+orderDetail.city_name+orderDetail.area_name+orderDetail.address"
                            @click="copyMsg">复制</div>
                    </div>
                    <div class="display-flex delivery-msg-item-msg">
                        <div class="title-span-width">收货人:</div>
                        <div class="delivery-margin-left" v-if='!deliveryEditFlag'>{{orderDetail.consignee}}</div>
                        <div class="delivery-margin-left" v-if='deliveryEditFlag'>
                            <el-input size="mini" v-model="orderDetail.consignee">
                            </el-input>
                        </div>
                    </div>
                    <div class="display-flex delivery-msg-item-msg">
                        <div class="title-span-width">联系电话:</div>
                        <div class="delivery-margin-left" v-if='!deliveryEditFlag'>{{orderDetail.phone}}</div>
                        <div class="delivery-margin-left" v-if='deliveryEditFlag'>
                            <el-input size="mini" v-model="orderDetail.phone">
                            </el-input>
                        </div>
                    </div>
                    <div class="display-flex delivery-msg-item-msg">
                        <div class="title-span-width">收货地址:</div>
                        <div class="delivery-margin-left" v-if="!deliveryEditFlag">
                            {{orderDetail.province_name}}{{orderDetail.city_name}}{{orderDetail.area_name}}{{orderDetail.address}}
                        </div>
                        <div class="delivery-margin-left" v-if='deliveryEditFlag'
                            style="align-items: center;    display: flex;">
                            <el-col :xs="17" :sm="17" :md="17" :lg="17" :xl="17">
                                <el-cascader size="mini" v-model="receivingAddress" :options="areaList"
                                    :props="{value: 'id'}" @change="changeAddress"></el-cascader>
                            </el-col>
                            <el-col :xs="7" :sm="7" :md="7" :lg="7" :xl="7">
                                <el-input size="mini" v-model="orderDetail.address">
                                </el-input>
                            </el-col>
                        </div>
                    </div>
                </div>
            </el-col>
            <!-- <el-col :xs="12" :sm="12" :md="6" :lg="6" :xl="6">
                <div class="delivery-msg-item">
                    <div class="display-flex delivery-msg-item-title">
                        <div class="color-333">配送信息</div>
                    </div>
                    <div class="display-flex delivery-msg-item-msg">
                        <div class="title-span-width">配送方式:</div>
                        <div class="delivery-margin-left" v-if="itemList[0]">{{itemList[0].dispatch_type_text}}</div>
                    </div>
                    <div class="display-flex delivery-msg-item-msg">
                        <div class="title-span-width">买家留言:</div>
                        <div class="delivery-margin-left more-ellipsis">{{orderDetail.remark}}</div>
                    </div>
                    <div class="display-flex delivery-msg-item-msg" style="height: 18px;"></div>
                </div>
            </el-col> -->
            <el-col :xs="12" :sm="12" :md="6" :lg="6" :xl="6">
                <div class="delivery-msg-item">
                    <div class="display-flex delivery-msg-item-title">
                        <div class="color-333">付款信息</div>
                    </div>
                    <div v-if="orderDetail.status>0">
                        <div class="display-flex delivery-msg-item-msg">
                            <div class="title-span-width">实付金额:</div>
                            <div class="delivery-margin-left">{{orderDetail.pay_fee}}</div>
                        </div>
                        <div class="display-flex delivery-msg-item-msg">
                            <div class="title-span-width">付款方式:</div>
                            <div class="delivery-margin-left">{{orderDetail.pay_type_text}}</div>
                        </div>
                        <div class="display-flex delivery-msg-item-msg">
                            <div class="title-span-width">付款时间:</div>
                            <div class="delivery-margin-left">{{orderDetail.paytime_text}}</div>
                        </div>
                    </div>
                    <div v-else class="display-flex delivery-msg-item-msg">
                        <div class="title-span-width">付款状态:</div>
                        <div class="delivery-margin-left">{{orderDetail.status_text}}</div>
                    </div>
                </div>
            </el-col>
            <el-col :xs="12" :sm="12" :md="6" :lg="6" :xl="6">
                <div class="delivery-msg-item">
                    <div class="display-flex delivery-msg-item-title">
                        <div class="color-333">下单用户</div>
                    </div>
                    <div v-if="orderDetail.user" class="display-flex delivery-msg-item-msg">
                        <img style="width:54px;
                        height:54px;
                        border-radius:50%;margin-right:20px" :src="Fast.api.cdnurl(orderDetail.user.avatar)">
                        <div>
                            <div class="display-flex delivery-msg-item-msg">
                                <div class="title-span-width">ID :</div>
                                <div class="delivery-margin-left theme-color cursor-pointer"
                                    style="text-decoration:underline" @click="goUserDetail(orderDetail.user.id)">
                                    {{orderDetail.user.id}}</div>
                            </div>
                            <div class="display-flex delivery-msg-item-msg">
                                <div class="title-span-width">昵称:</div>
                                <div class="delivery-margin-left">{{orderDetail.user.nickname}}</div>
                            </div>
                            <div class="display-flex delivery-msg-item-msg">
                                <div class="title-span-width">联系方式:</div>
                                <div class="delivery-margin-left">{{orderDetail.user.mobile}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </el-col>
        </el-row>
    </div>
    <div class="good-msg">
        <el-table :data="goodsList" style="width: 100%">
            <el-table-column min-width="370" label="商品">
                <template slot-scope="scope">
                    <div class="display-flex">
                        <img class="table-img" :src="Fast.api.cdnurl(scope.row.goods_image)">
                        <div>
                            <div class="goods-title goods-title-ellipsis">{{scope.row.goods_title}}</div>
                            <div class="color-999"><span>规格：{{scope.row.goods_sku_text}}</span>
                            </div>
                        </div>
                    </div>
                </template>
            </el-table-column>
            <el-table-column width="120" label="单价(元)">
                <template slot-scope="scope">
                    <span class="color-666">￥{{scope.row.goods_price}}
                    </span>
                </template>
            </el-table-column>
            <el-table-column width="110" label="数量">
                <template slot-scope="scope">
                    <span class="color-666">{{scope.row.goods_num}}</span>
                </template>
            </el-table-column>
            <el-table-column width="120" label="优惠(元)">
                <template slot-scope="scope">
                    <span class="color-666">￥{{scope.row.discount_fee}}</span>
                </template>
            </el-table-column>
            <el-table-column width="110" label="小计(元)">
                <template slot-scope="scope">
                    <div v-if="orderDetail.type=='score'">
                        <div class="color-666">￥{{(scope.row.goods_price*scope.row.goods_num).toFixed(2)}}</div>
                        <div class="color-666">
                            <span>+{{orderDetail.score_amount}}积分</span>
                        </div>
                    </div>
                    <div v-else>
                        <div class="color-666">
                            ￥{{(scope.row.goods_price*scope.row.goods_num-scope.row.discount_fee).toFixed(2)}}</div>
                        <div class="color-666">
                            <del>￥{{(scope.row.goods_price*scope.row.goods_num).toFixed(2)}}</del>
                        </div>
                    </div>
                </template>
            </el-table-column>
            <el-table-column label="订单类型" width="110">
                <template slot-scope="scope">
                    <span class="color-666">{{orderDetail.type_text}}</span>
                </template>
            </el-table-column>
            <el-table-column label="配送方式" width="100">
                <template slot-scope="scope">
                    <span class="color-666">{{scope.row.dispatch_type_text}}</span>
                </template>
            </el-table-column>
            <el-table-column label="发货状态" width="100">
                <template slot-scope="scope">
                    <span class="color-666" v-if="orderDetail.status>0">
                        <span v-if="scope.row.dispatch_type=='express'">{{scope.row.dispatch_status_text}}</span>
                        <span v-else>{{scope.row.status_name}}</span>
                    </span>
                    <span class="color-666" v-else>-</span>
                </template>
            </el-table-column>
            <el-table-column width="100" label="退款状态">
                <template slot-scope="scope">
                    <div class="color-666 common-btn-box" v-if="orderDetail.status>0">
                        <span class="theme-color cursor-pointer"
                            v-if="scope.row.btns && scope.row.btns.indexOf('refund')!=-1"
                            @click="openDialog('refund',scope.row.order_id,scope.row.id)">主动退款</span>
                        <span v-else>{{scope.row.refund_status_text}}</span>
                    </div>
                    <div class="color-666" v-else>-</div>
                </template>
            </el-table-column>
            <el-table-column width="100" label="售后状态">
                <template slot-scope="scope">
                    <div class="color-666 common-btn-box" v-if="orderDetail.status>0">
                        <span class="theme-color cursor-pointer"
                            v-if="scope.row.btns && scope.row.btns.indexOf('aftersale_info')!=-1"
                            @click="viewAftersale(scope.row.ext_arr.aftersale_id)">售后详情</span>
                        <span v-else>{{scope.row.aftersale_status_text}}</span>
                    </div>
                    <div class="color-666" v-else>-</div>
                </template>
            </el-table-column>
            <el-table-column width="100" label="所属门店">
                <template slot-scope="scope">
                    <div class="color-666 common-btn-box" v-if="orderDetail.status>0">
                        <span
                            v-if="scope.row.dispatch_type=='store' || scope.row.dispatch_type=='selfetch'">{{scope.row.store.name}}</span>
                        <span v-else>-</span>
                    </div>
                    <div class="color-666" v-else>-</div>
                </template>
            </el-table-column>
            <el-table-column width="100" label="配送信息">
                <template slot-scope="scope">
                    <div class="color-666 common-btn-box" v-if="orderDetail.status>0">
                        <el-popover placement="bottom" trigger="click" width="220">
                            <div class="popover-container"
                                v-if="scope.row.dispatch_type=='store' || scope.row.dispatch_type=='selfetch'">
                                <div class="display-flex">
                                    <div class="popover-tip">手机号：</div>
                                    <div v-if="scope.row.ext_arr.dispatch_phone">{{scope.row.ext_arr.dispatch_phone}}
                                    </div>
                                    <div v-if="!scope.row.ext_arr.dispatch_phone">-</div>
                                </div>
                                <div class="display-flex">
                                    <div class="popover-tip">日期：</div>
                                    <div v-if="scope.row.ext_arr.dispatch_date">{{scope.row.ext_arr.dispatch_date}}
                                    </div>
                                    <div v-if="!scope.row.ext_arr.dispatch_date">-</div>
                                </div>
                            </div>
                            <div class="popover-container" v-if="scope.row.dispatch_type=='autosend'">
                                <div>
                                    <span class="popover-tip">发货内容：</span>
                                    <span v-if="scope.row.ext_arr.autosend_content">
                                        <template v-if="scope.row.ext_arr.autosend_type=='text'">
                                            {{scope.row.ext_arr.autosend_content}}
                                        </template>
                                        <template v-if="scope.row.ext_arr.autosend_type=='params'"
                                            v-for="it in scope.row.ext_arr.autosend_content">
                                            {{it.name}}-{{it.value}}
                                        </template>
                                    </span>
                                    <div v-if="!scope.row.ext_arr.autosend_content">-</div>
                                </div>
                            </div>
                            <div class="ellipsis-item cursor-pointer theme-color" slot="reference"
                                v-if="scope.row.dispatch_type!='express'">
                                查看详情
                            </div>
                        </el-popover>
                        <div v-if="scope.row.dispatch_type=='express'">-</div>
                    </div>
                    <div class="color-666" v-else>-</div>
                </template>
            </el-table-column>
            <el-table-column width="100" label="评价状态">
                <template slot-scope="scope">
                    <div class="color-666 common-btn-box" v-if="orderDetail.status>0">
                        <span v-if="scope.row.comment_status==0">{{scope.row.comment_status_text}}</span>
                        <div class="theme-color cursor-pointer" v-if="scope.row.comment_status>=1"
                            @click="viewEvaluation(scope.row.id)">查看评价</div>
                    </div>
                    <div class="color-666" v-else>-</div>
                </template>
            </el-table-column>
        </el-table>
    </div>

    <!-- 发货 -->
    <el-dialog class="order-dialog" title="订单发货" :visible.sync="express_dialog" :before-close="expressFuc">
        <el-table ref="multipleTable" :data="express_id?refundList:nosendList" tooltip-effect="dark" style="width: 100%"
            @selection-change="deliverSelectionChange" border>
            <el-table-column type="selection" width="40">
            </el-table-column>
            <el-table-column label="商品" width="280">
                <template slot-scope="scope">
                    <div class="border-right">
                        <div class="display-flex">
                            <img class="table-img" :src="Fast.api.cdnurl(scope.row.goods_image)">
                            <div style="width:196px">
                                <div style="width:196px;text-align: left;" class="goods-title-ellipsis font-size-14">
                                    {{scope.row.goods_title}}
                                </div>
                                <div class="color-999 font-size-14" style="text-align: left;padding-left: 2px;">
                                    <span>规格:</span><span>{{scope.row.goods_sku_text}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </el-table-column>
            <el-table-column prop="goods_num" label="数量" width="70">
            </el-table-column>
            <el-table-column label="状态" width="70">
                <template slot-scope="scope">
                    <span v-if="scope.row.dispatch_status==0"
                        class="theme-color">{{scope.row.dispatch_status_text}}</span>
                    <span v-if="scope.row.dispatch_status>0">{{scope.row.dispatch_status_text}}</span>
                </template>
            </el-table-column>
            <el-table-column prop="express_no" label="快递单号">
                <template slot-scope="scope">
                    <span v-if="scope.row.express_no">{{scope.row.express_no}}</span>
                    <span v-else>-</span>
                </template>
            </el-table-column>
        </el-table>
        <div style="padding-top: 40px;">
            <el-form ref="form" :model="deliverForm" label-width="80px">
                <el-form-item label="配送信息">
                    <div>
                        <span>配送方式: </span>
                        <span v-if="itemList">{{itemList[0]?itemList[0].dispatch_type_text:''}}</span>
                    </div>
                    <div>
                        <span>收货人: </span>
                        <span>
                            <span>{{orderDetail.consignee}}</span>
                            <span>{{orderDetail.phone}}</span>
                        </span>
                    </div>
                    <div>
                        <span>收货地址: </span>
                        <span>{{orderDetail.city_name}}{{orderDetail.area_name}}{{orderDetail.address}}</span>
                    </div>
                </el-form-item>
            </el-form>
            <el-form :inline="true" :model="deliverForm" class="demo-form-inline">
                <el-form-item label="快递公司">
                    <!-- <el-select v-model="deliverForm.express_name" filterable placeholder="请选择快递公司">
                        <el-option v-for="item in expressListname" :key="item.name" :label="item.name"
                            :value="item.name">
                        </el-option>
                    </el-select> -->
                    <el-select class="select-page-container" v-model="deliverForm.express_name" filterable  size="small"
                        placeholder="" :filter-method="selectFilter">
                        <el-option v-for="item in expressCompany" :key="item" :label="item.name" :value="item.name">
                            <div class="select-option-container">
                                <div class="option-id">{{ item.id }}</div>
                                <div class="option-code">{{ item.code }}</div>
                                <div class="option-name">{{ item.name }}</div>
                            </div>
                        </el-option>
                        <div class="select-pagination">
                            <el-pagination class="pagination" :page-sizes="[6]" :current-page="selectCurrentPage"
                                :total="selectTotalPage" layout="total, sizes, prev, pager,next, jumper" pager-count="5"
                                @size-change.stop="selectSizeChange" @current-change="selectCurrentChange" />
                            </el-pagination>
                            <div class="select-pagination-jumper" @click="getExpressCompany">跳转</div>
                        </div>
                    </el-select>

                </el-form-item>
                <el-form-item label="快递单号">
                    <el-input size="small" v-model="deliverForm.express_no" placeholder="请输入内容"></el-input>
                </el-form-item>
            </el-form>
        </div>
        <span slot="footer" class="dialog-footer">
            <div class="dialog-footer-btn" :disabled=true v-if="!disabledBtn">立即发货</div>
            <div class="dialog-footer-btn dialog-footer-btn-active cursor-pointer" v-if="disabledBtn"
                @click="expressFuc('yes')">立即发货</div>
        </span>
    </el-dialog>
    <!-- 退款 -->
    <div class="refund-box">
        <el-dialog class="refund-box" title="退款处理" :visible.sync="refund_dialog" :before-close="refundFunc">
            <div>
                <div class="refund-item">
                    <div class="refund-item-tip">退款金额</div>
                    <el-input v-model="refund_money" placeholder="请输入退款金额"></el-input>
                </div>
                <div class="refund-item refund-item-btn">
                    <div class="common-btn" @click="refundFunc('yes')">确认</div>
                    <div class="common-btn refund-cancel" @click="refundFunc">取消</div>
                </div>
            </div>
        </el-dialog>
    </div>
    <!-- 备货 -->
    <el-dialog :visible.sync="choice_dialog" :before-close="choiceFunc">
        <div slot="title">
            备货商品<span style="color: #FFB333;">(请尽快通知该门店处理)</span>
        </div>
        <div>
            <div class="refund-item">
                <el-table :data="choice_list" style="width: 100%" @selection-change="choiceSelectionChange" border>
                    <el-table-column type="selection" width="40">
                    </el-table-column>
                    <el-table-column label="商品" width="280">
                        <template slot-scope="scope">
                            <div class="border-right">
                                <div class="display-flex">
                                    <img class="table-img" :src="Fast.api.cdnurl(scope.row.goods_image)">
                                    <div style="width:196px">
                                        <div style="width:196px;text-align: left;"
                                            class="goods-title-ellipsis font-size-14">
                                            {{scope.row.goods_title}}
                                        </div>
                                        <div class="color-999 font-size-14" style="text-align: left;padding-left: 2px;">
                                            <span>规格:</span><span>{{scope.row.goods_sku_text}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </el-table-column>
                    <el-table-column prop="goods_num" label="数量" min-width="70">
                    </el-table-column>
                    <el-table-column label="状态" width="70">
                        <template slot-scope="scope">
                            <span v-if="scope.row.dispatch_status==0"
                                class="theme-color">{{scope.row.dispatch_status_text}}</span>
                            <span v-if="scope.row.dispatch_status>0">{{scope.row.dispatch_status_text}}</span>
                        </template>
                    </el-table-column>
                </el-table>
            </div>
            <div class="refund-item refund-item-btn">
                <div class="common-btn" @click="choiceFunc('yes')">确认</div>
                <div class="common-btn refund-cancel" @click="choiceFunc">取消</div>
            </div>
        </div>
    </el-dialog>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>
    </body>
</html>
