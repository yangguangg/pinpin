<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:96:"D:\phpstudy_pro\WWW\waibao\pinpin\public/../application/admin\view\shopro\order\order\index.html";i:1613822978;s:76:"D:\phpstudy_pro\WWW\waibao\pinpin\application\admin\view\layout\default.html";i:1611580234;s:73:"D:\phpstudy_pro\WWW\waibao\pinpin\application\admin\view\common\meta.html";i:1611580234;s:75:"D:\phpstudy_pro\WWW\waibao\pinpin\application\admin\view\common\script.html";i:1611580234;}*/ ?>
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
    .font-size-14 {
        font-size: 14px;
    }

    .font-size-12 {
        font-size: 12px;
    }

    .background-white {
        background: #fff;
    }

    .background-7536D0 {
        background: #7536D0;
    }

    .color-666 {
        color: #666;
    }

    .color-444 {
        color: #444;
    }

    .color-999 {
        color: #999;
    }

    .color-active {
        color: #7536D0;
    }

    .color-active-1 {
        color: #FFB333;
    }

    .margin-left-10 {
        margin-left: 10px;
    }

    .margin-right-20 {
        margin-right: 20px;
    }

    .display-flex {
        display: flex;
        align-items: center;
    }

    .display-flex-c {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .display-flex-column {
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .common-btn {
        width: 80px;
        line-height: 28px;
        height: 30px;
        border: 1px solid #DCDFE6;
        border-radius: 4px;
        color: #666;
        text-align: center;
        cursor: pointer;
    }

    .common-btn-active {
        color: #fff;
        background: #7536D0;
        border: 1px solid #7536D0;
    }



    .border-bottom {
        border-bottom: 1px solid #E6E6E6;

    }

    .cursor-pointer {
        cursor: pointer;
    }

    label {
        margin: 0;
    }

    /* 选择 */
    .screen {
        border-radius: 6px;
        padding: 10px 20px;
        margin-bottom: 10px;
    }

    .screen-title {
        justify-content: space-between;
        width: 100%;
    }

    .screen-con {
        display: flex;
        flex-wrap: wrap;
        /* margin-top: 20px; */
    }

    .header-select-item,
    .header-input-item,
    .header-button-item {
        margin-right: 30px;
        margin-bottom: 14px;
        width: 242px;
    }

    .header-select-item .el-select {
        width: 100px;
    }

    .header-input-item .header-input-tip {
        margin-right: 14px;
    }

    .header-input-item .el-input {
        width: 176px;
    }

    .order-time {
        padding: 0 6px;
        height: 32px;
        border: 1px solid #DCDFE6;
        border-radius: 4px 0px 0px 4px;
        border-right: none;
    }

    .header-button-select {
        background: #7536D0;
        color: #fff;
        margin-left: 20px;
    }

    .order-refresh {
        width: 32px;
        height: 32px;
        border: 1px solid #E6E6E6;
        border-radius: 4px;
        margin-right: 14px;
        justify-content: center;
    }

    .order-refresh i {
        /* animation-name:go; */
        animation-duration: 2s;
        animation-iteration-count: infinite
    }

    .order-refresh .focusi {
        animation-name: go;

    }

    @keyframes go {
        0% {
            transform: rotateZ(0);
        }

        100% {
            transform: rotateZ(360deg);
        }
    }

    /* table */
    .order-table {
        padding: 20px 20px 30px;
        margin-top: 10px;

    }

    .item-box {
        margin-bottom: 8px;
        color: #444;
        width: 100%;
    }

    .expand-item-container {
        /* flex: 1; */
    }

    .expand-item {
        width: 104px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-right: 1px solid #E6E6E6;
        border-bottom: 1px solid #E6E6E6;
    }

    .expand-item-1 {
        width: 630px;
        border-left: 1px solid #E6E6E6;
    }

    .item-box-item-1-row {
        width: 100%;
        height: 80px;
        padding: 16px 14px 14px;
    }

    .expand-item-4 {
        width: 136px;
    }

    .expand-item-5 {
        width: 94px;
    }

    .expand-item-9 {
        flex-direction: column;
        flex: 1;
    }

    .expand-item-opt {
        flex: 1;
    }

    .item-box-item-more-margin {
        margin-bottom: 4px;
    }

    .item-box-item-name {
        flex-direction: column;
    }

    .item-box-item-name .el-button {
        padding: 0;
        color: #444;
    }

    .item-box-item-name .popover-item {
        margin-bottom: 13px;
    }

    .popover-item-1 {
        height: 30px;
    }

    .item-box-item-detail {
        flex: 1;
        min-width: 80px;
        text-align: center;
    }

    .table-img {
        width: 50px;
        height: 50px;
        margin-right: 14px;
    }

    .goods-title {
        width: 526px;
    }

    .goods-title-ellipsis {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        margin-bottom: 12px;
        text-align: left;
    }


    .el-collapse-item__header {
        border: none;
    }

    .el-date-editor--daterange.el-input__inner {
        width: 400px
    }

    .el-date-editor .el-range-input {
        width: 45%;
    }

    .screen .el-input__inner {
        height: 30px;
        display: flex;
        align-items: center;
        padding: 0 10px;
        border-radius: 0px 4px 4px 0px;
    }

    .custom-search .el-input__inner {
        border-radius: 4px;
    }

    .el-range-editor.el-input__inner {
        padding: 0 10px;
    }

    .el-date-editor .el-range__icon,
    .el-icon-search {
        line-height: 28px;
    }

    .el-date-editor .el-range-separator {
        line-height: 28px;
        width: 10%;
    }

    .el-collapse-item__content {
        padding-bottom: 0;
    }

    .el-radio-button__inner:hover {
        color: #666;
    }

    .el-table__expanded-cell[class*=cell] {
        padding: 0;
    }

    .el-table__fixed-right {
        height: 161px;
    }

    tr {
        margin-bottom: 8px;
    }

    .order-table .el-table__row {
        background: #F9F9F9 !important;
        height: 30px !important;
    }

    .order-table .el-table--enable-row-hover .el-table__body tr:hover>td {
        background: none;
    }

    .order-table .el-table td {
        padding: 0;
        border-top: 1px solid #E6E6E6;

    }

    .el-table::before {
        height: 0;
    }

    .el-table_1_column_2 .cell {
        text-align: left;
        padding: 0;
    }

    .el-table__fixed-right::before,
    .el-table__fixed::before {

        height: 0;

    }

    .el-pager li.active,
    .el-pager li:hover {
        color: #7536d0;
    }

    .el-checkbox__input.is-checked .el-checkbox__inner,
    .el-checkbox__input.is-indeterminate .el-checkbox__inner {
        background-color: #7536d0;
        border-color: #7536d0;
    }

    .el-checkbox__inner:hover {
        border-color: #7536d0;
    }

    .cell {
        text-align: center;
    }

    .operation-btn {
        width: 26px;
        height: 26px;
        padding: 0;
    }

    .el-table td,
    .el-table th.is-leaf {
        border-bottom: none;
    }

    .delete-btn {
        width: 90px;
        height: 32px;
        line-height: 32px;
        border: 1px solid #F56C6C;
        border-radius: 4px;
        color: #F56C6C;
        text-align: center;
        float: left;
    }

    .pay-type {
        padding: 0 5px;
        height: 20px;
        background: #E9E2F5;
        border-radius: 4px;
        display: block;
        color: #8A44FC;
        border: 1px solid #B698E7;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .type-alipay {
        border-color: #94BEFB;
        background: #E0EAF9;
        color: #3096FF;
    }

    .type-wechat {
        border-color: #A2E8C4;
        background: #E4F5EC;
        color: #4AD88E;
    }

    .type-score {
        border-color: #F8DCAE;
        background: #FDF5E8;
        color: #F2BA5E;
    }

    .see-detail {
        width: 70px;
        height: 30px;
        line-height: 30px;
        background: rgba(243, 239, 251, 1);
        border: 1px solid rgba(117, 62, 205, 1);
        border-radius: 18px;
    }

    .popover-item-left {
        width: 50px;
        display: block;
    }

    /*.order-dialog*/
    .order-dialog .cell {
        font-size: 12px;
        color: #666;
        font-weight: 400;
    }

    .el-dialog__body {
        padding-top: 0;
        padding-bottom: 0px;
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

    .order-dialog .el-table th {
        background: #F3F3F3;
    }

    .order-dialog .el-table td {
        border-bottom: 1px solid #EBEEF5;
        height: 75px;
        padding: 5px 0;
    }

    .order-dialog .el-table td .cell {
        height: 65px !important;
        justify-content: center;
    }

    .order-dialog .el-table_2_column_16 {
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
        text-align: center;
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

    .el-button--primary:hover,
    .dialog-footer-btn-active:hover {
        background: #753ECD;
        border: none;
        color: #fff;
    }

    .dialog-footer-btn-active {
        background: #753ECD;
        line-height: 36px;
        border: none;
        color: #fff;
        cursor: pointer;

    }

    .el-form-item {
        margin-bottom: 10px;
    }

    .skill-item,
    .groupon-item {
        /* width: 40px; */
        height: 20px;
        line-height: 20px;
        text-align: center;
        background: rgba(254, 147, 135, 1);
        border-radius: 4px;
        font-size: 12px;
        color: #fff;
        padding: 0 10px;
    }

    .groupon-item {
        background: #A17BDF;
        cursor: pointer;
    }

    .groupon-item-alone {
        cursor: auto;
    }

    .opt-box .el-table th {
        padding: 5px 0;
    }

    .opt-box .el-dialog__body {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .opt-box .el-dialog {
        width: 600px;
    }

    .opt-box .el-table .cell {
        justify-content: center;
    }

    .opt-box .el-table td,
    .opt-box .el-table th.is-leaf {
        border-bottom: 1px solid #e6e6e6;
    }

    .opt-box .el-table--border td,
    .opt-box .el-table--border th {
        border-right: none;
    }

    /* .el-dialog__header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    } */

    .el-dialog__body .el-table th {
        padding: 5px 0;
    }

    .el-dialog {
        border-radius: 6px;
    }

    .el-radio-button__inner {
        font-size: 12px;
        padding: 9px 20px;
        ;
    }

    .el-input__inner {
        font-size: 12px;
        height: 32px;
        line-height: 32px;
    }

    .el-input__icon {
        line-height: 32px;
    }

    .margin-right-5 {
        margin-right: 5px;
    }

    .el-dialog__title {
        font-size: 14px;
    }

    .el-dialog .el-input__inner {
        height: 34px;
        line-height: 34px;
        font-size: 13px;
    }

    .el-form-item__label,
    .el-radio__label,
    .el-form-item__content,
    .el-select-dropdown__item,
    .el-table,
    .el-dialog__body {
        font-size: 13px;
    }

    .el-form-item {
        margin-bottom: 10px;
    }

    .page-container {
        justify-content: flex-end;
        margin-top: 30px;
    }

    .el-select-dropdown__item.selected {
        color: #7536D0;
    }

    .el-dialog {
        width: 800px !important;
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

    .el-table td .cell {
        height: 30px;
        display: flex;
        align-items: center;

    }

    .custom-header {
        line-height: 32px;
        padding: 0 20px;
        background: #FFFFFF;
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.06);
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .custom-header-show {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        padding-bottom: 14px;
    }

    .custom-header-left,
    .custom-header-right {
        margin-top: 14px;
        flex-wrap: nowrap;
    }

    .custom-header-right .el-input__inner {
        border-radius: 0 4px 4px 0;
    }

    .arrow-close i {
        animation-iteration-count: infinite;
        transform: rotateZ(-90deg);
    }

    .arrow-close {
        width: 36px;
        height: 32px;
        margin-left: 20px;
        background: #7438D5;
        border-radius: 4px;
        color: #fff;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .arrow-open {
        width: 36px;
        height: 32px;
        margin-left: 20px;
        background: #fff;
        border-radius: 4px;
        color: #7438D5;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #7438D5;

    }

    .arrow-close .arrow-container {
        transform: rotateZ(0deg);
        transition: transform .25s linear;
    }

    .arrow-open .arrow-container {
        transform: rotateZ(90deg);
        transition: transform .25s linear;
    }

    .el-table__empty-block {
        border: 1px solid #e6e6e6;
    }

    .border-right {
        border-right: 1px solid #E6E6E6;

    }

    .border-bottom {
        border-bottom: 1px solid #E6E6E6;

    }

    /* table */
    .order-table {
        padding: 20px 20px 30px;

    }

    .item-box {
        margin-bottom: 8px;
        color: #444;
    }

    .item-box-item {
        height: 80px;
        width: 104px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .item-box-item-1 {
        width: 643px;
        border-left: 1px solid #E6E6E6;
    }

    .item-box-item-1-box {
        height: 80px;
        border-bottom: 1px solid #E6E6E6;
        padding: 16px 14px 14px;
    }

    .item-box-item-more-margin {
        margin-bottom: 4px;
    }

    .item-box-item-name {
        flex-direction: column;
    }

    .item-box-item-name .el-button {
        padding: 0;
        color: #444;
    }

    .item-box-item-name .popover-item {
        margin-bottom: 13px;
    }

    .popover-item-1 {
        height: 30px;
    }

    .item-box-item-detail {
        flex: 1;
        min-width: 80px;
        text-align: center;
    }

    .order-table .el-table--border {
        border-left: none;
    }

    .el-table--border td,
    .el-table--border th,
    .el-table__body-wrapper .el-table--border.is-scrolling-left~.el-table__fixed {
        border-left: none;
        border-right: none;
    }

    .el-table_1_column_1 {
        border-left: 1px solid #e6e6e6 !important;
    }

    .el-table_1_column_11 {
        border-right: 1px solid #e6e6e6 !important;
    }

    .ellipsis-item {
        max-width: 80px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        -o-text-overflow: ellipsis;
    }

    .choice-item-button {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .choice-item-cancel {
        height: 32px;
        line-height: 32px;
        width: 88px;
        text-align: center;
        color: #999;
        cursor: pointer;
    }

    .choice-item-confirm {
        height: 32px;
        line-height: 32px;
        width: 88px;
        text-align: center;
        color: #fff;
        background: #7438D5;
        border-radius: 4px;
        cursor: pointer;
    }
    .ellipsis-1 {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.el-input--small,.el-input__inner{
    height: 32px !important;
    line-height: 32px !important;
}

    [v-cloak] {
        display: none
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<div id="orderIndex" v-cloak>
    <div class="custom-header">
        <div class="custom-header-show">
            <div class="custom-header-left display-flex">
                <div class="order-refresh display-flex" @click="goOrderRefresh">
                    <i class="el-icon-refresh" :class="focusi?'focusi':''"></i>
                </div>
                <el-radio-group v-model="searchForm.status" fill="#7536D0" @change="reqOrderList(0,10)">
                    <el-radio-button label="all">全部</el-radio-button>
                    <el-radio-button label="cancel">已取消</el-radio-button>
                    <el-radio-button label="invalid">交易关闭</el-radio-button>
                    <el-radio-button label="nopay">待付款</el-radio-button>
                    <el-radio-button label="payed">已支付</el-radio-button>
                    <el-radio-button label="nosend">待发货</el-radio-button>
                    <el-radio-button label="noget">已发货</el-radio-button>
                    <el-radio-button label="finish">已完成</el-radio-button>
                    <el-radio-button label="aftersale">售后</el-radio-button>
                    <el-radio-button label="refund">退款</el-radio-button>
                </el-radio-group>
            </div>
            <div class="custom-header-right display-flex">
                <div class="display-flex margin-right-20">
                    <div class="color-666 order-time">下单时间</div>
                    <el-date-picker v-model="searchForm.createtime" type="daterange" value-format="yyyy-MM-dd HH:mm:ss"
                        format="yyyy-MM-dd HH:mm:ss" range-separator="至" start-placeholder="开始日期" end-placeholder="结束日期"
                        @change="reqOrderList(0,10)">
                    </el-date-picker>
                </div>
                <div class="common-btn cursor-pointer" @click="goExport">订单导出</div>
                <div :class="screenType?'arrow-open':'arrow-close'" @click="changeSwitch">
                    <div class="arrow-container">
                        <i class="el-icon-d-arrow-left"></i>
                    </div>
                </div>
            </div>
        </div>
        <el-collapse-transition>
            <div class="screen-con" v-if="screenType">
                <div class="display-flex header-select-item">
                    <el-input placeholder="请输入内容" v-model="searchForm.form_1_value" class="input-with-select">
                        <el-select v-model="searchForm.form_1_key" slot="prepend" placeholder="请选择">
                            <el-option label="订单编号" value="order_sn"></el-option>
                            <el-option label="订单ID" value="id"></el-option>
                            <el-option label="售后订单" value="aftersale_sn"></el-option>
                            <el-option label="支付单号" value="transaction_id"></el-option>
                        </el-select>
                    </el-input>
                </div>
                <div class="display-flex header-select-item">
                    <el-input placeholder="请输入内容" v-model="searchForm.form_2_value" class="input-with-select">
                        <el-select v-model="searchForm.form_2_key" slot="prepend" placeholder="请选择">
                            <el-option label="会员ID" value="user_id"></el-option>
                            <el-option label="会员昵称" value="nickname"></el-option>
                            <el-option label="手机号" value="user_phone"></el-option>
                            <el-option label="收货人" value="consignee"></el-option>
                            <el-option label="收货人手机号" value="phone"></el-option>
                        </el-select>
                    </el-input>
                </div>
                <div class="display-flex header-input-item">
                    <div class="header-input-tip">订单来源</div>
                    <el-select v-model="searchForm.platform" placeholder="请选择订单来源">
                        <el-option :label="platform.name" :value="platform.type"
                            v-for="platform in orderScreenList.platform">
                        </el-option>
                    </el-select>
                </div>
                <div class="display-flex header-input-item">
                    <div class="header-input-tip">配送方式</div>
                    <el-select v-model="searchForm.dispatch_type" placeholder="请选择配送方式">
                        <el-option :label="dispatch.name" :value="dispatch.type"
                            v-for="dispatch in orderScreenList.dispatch_type">
                        </el-option>
                    </el-select>
                </div>
                <div class="display-flex header-input-item">
                    <div class="header-input-tip">订单类型</div>
                    <el-select v-model="searchForm.type" placeholder="请选择订单类型">
                        <el-option :label="type.name" :value="type.type" v-for="type in orderScreenList.type">
                        </el-option>
                    </el-select>
                </div>
                <div class="display-flex header-input-item">
                    <div class="header-input-tip">支付方式</div>
                    <el-select v-model="searchForm.pay_type" placeholder="请选择支付方式">
                        <el-option :label="pay.name" :value="pay.type" v-for="pay in orderScreenList.pay_type">
                        </el-option>
                    </el-select>
                </div>
                <div class="display-flex header-input-item">
                    <div class="header-input-tip">营销活动</div>
                    <el-select v-model="searchForm.activity_type" placeholder="请选择营销活动">
                        <el-option :label="activity.name" :value="activity.type"
                            v-for="activity in orderScreenList.activity_type">
                        </el-option>
                    </el-select>
                </div>
                <div class="display-flex header-input-item">
                    <div class="header-input-tip">商品类型</div>
                    <el-select v-model="searchForm.goods_type" placeholder="请选择商品类型">
                        <el-option :label="goods.name" :value="goods.type" v-for="goods in orderScreenList.goods_type">
                        </el-option>
                    </el-select>
                </div>
                <div class="display-flex header-input-item" style="width: 380px;">
                    <div class="header-input-tip">门店订单</div>
                    <div class="display-flex">
                        <el-switch
                        @change="changeStoreId"
                        v-model="store_id_switch"
                        active-color="#7536D0"
                        inactive-color="#eee">
                        </el-switch>
                        <div class="display-flex" v-if="store_id_switch">
                            <div style="margin: 0 14px 0 30px;">选择门店</div>
                            <el-select style="position: relative;" v-model="searchForm.store_id" filterable
                            placeholder="请选择门店" :filter-method="dataFilter">
                            <el-option v-for="item in selectStoreList" :key="item.name" :label="item.name" :value="item.id+''">
                                <div class="display-flex" style="width: 300px;">
                                    <span style="width: 60px;text-align: center;flex-shrink: 0;">{{ item.id }}</span>
                                    <div class="ellipsis-1" style="width: 80px;flex-shrink: 0;">{{ item.name }}</div>
                                    <div class="ellipsis-1" style="width: 140px;">
                                        {{item.province_name}}{{item.city_name}}{{item.area_name}}{{item.address}}
                                    </div>
                                </div>
                            </el-option>
                        </el-select>
                        </div>
                        
                    </div>
                </div>
                <div class="display-flex header-input-item">
                    <div class="header-input-tip">商品名称</div>
                    <el-input placeholder="请输入商品名称" v-model="searchForm.goods_title"></el-input>
                </div>
                <div class="header-button-item display-flex">
                    <div class="common-btn" @click="screenEmpty">重置</div>
                    <div class="common-btn header-button-select" @click="reqOrderList(0,10)">筛选</div>
                </div>
            </div>
        </el-collapse-transition>
    </div>
    <div class="order-table background-white color-666">
        <el-table :data="orderList" style="width: 100%" ref="multipleTable" tooltip-effect="dark" border
            default-expand-all="true" @selection-change="handleSelectionChange">
            <el-table-column type="expand">
                <template slot-scope="props">
                    <div class="item-box display-flex">
                        <div class="item-box-item-1 border-right" style="flex-direction: column;">
                            <div class="display-flex item-box-item-1-box" v-for="(item,index) in props.row.item">
                                <img class="table-img" :src="Fast.api.cdnurl(item.goods_image)">
                                <div>
                                    <div class="display-flex">
                                        <div class="goods-title goods-title-ellipsis">{{item.goods_title}}</div>
                                    </div>
                                    <div class="color-999 display-flex">
                                        <span>规格：{{item.goods_sku_text}}</span>
                                        <span class="margin-left-10">单价：{{item.goods_price}}元</span>
                                        <span class="margin-left-10">数量：{{item.goods_num}}</span>
                                        <div v-if="item.activity_type">
                                            <!-- 拼团 -->
                                            <div v-if="props.row.btns && props.row.btns.indexOf('groupon')!='-1'"
                                                class="margin-left-10 groupon-item"
                                                @click="goGroupon(item.activity_type,props.row.ext_arr.groupon_id)">
                                                {{item.activity_type_text}}</div>
                                            <!-- 拼团单独购买 -->
                                            <div v-if="props.row.btns && props.row.btns.indexOf('groupon_alone')!='-1'"
                                                class="margin-left-10 groupon-item groupon-item-alone">拼团-单独购买</div>
                                            <!-- 秒杀 -->
                                            <div v-if="item.activity_type=='seckill'" class="margin-left-10 skill-item">
                                                {{item.activity_type_text}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-right" style="flex-direction: column;">
                            <div class="item-box-item display-flex-column border-bottom"
                                v-for="(item,index) in props.row.item" style="height: 80px;">
                                <div v-if="props.row.status>0">
                                    <div class="color-active cursor-pointer" @click="openDialog(props.row,index)"
                                        v-if="item.btns && item.btns.indexOf('send')!='-1'">去发货</div>
                                    <div class="color-active cursor-pointer" @click="openDialogchoice(props.row,index)"
                                        v-else-if="item.btns && item.btns.indexOf('send_store')!='-1'">去备货</div>
                                    <div v-else>
                                        <span
                                            v-if="item.dispatch_type=='express'">{{item.dispatch_status_text?item.dispatch_status_text:'-'}}</span>
                                        <span v-else>{{item.status_name}}</span>
                                    </div>
                                </div>
                                <div v-if="props.row.status<=0">-</div>
                            </div>
                        </div>
                        <div class="border-right" style="flex-direction: column;">
                            <div class="item-box-item display-flex-column border-bottom"
                                v-for="(item,index) in props.row.item" style="height: 80px;width:104px">
                                <div v-if="props.row.status>0">
                                    <div :style="{color:item.refund_status<2?'#999':''}">{{item.refund_status_text}}
                                    </div>
                                </div>
                                <div v-else>-</div>
                            </div>
                        </div>
                        <div class="border-right" style="flex-direction: column;">
                            <div class="item-box-item display-flex-column border-bottom"
                                v-for="(item,index) in props.row.item" style="height: 80px;width:136px">
                                <div v-if="props.row.status>0">
                                    <div style="color: #999;margin-bottom: 10px;">{{item.aftersale_status_text}}</div>
                                    <span v-if="item.btns && item.btns.indexOf('aftersale_info')!=-1"
                                        style="color: #7536D0;cursor: pointer"
                                        @click="viewAftersale(item.ext_arr.aftersale_id)">售后详情</span>
                                </div>
                                <div v-else>-</div>
                            </div>
                        </div>
                        <div class="item-box-item border-bottom border-right"
                            :class="props.row.status<0?'color-999':'color-444'"
                            :style="{'height': props.row.item.length*80+'px'}" style="width: 94px;">
                            {{props.row.status_text}}
                        </div>
                        <div class="item-box-item border-bottom border-right"
                            :style="{'height': props.row.item.length*80+'px'}">
                            <div v-if="props.row.user">
                                <el-popover placement="bottom" width="200" height="80" trigger="hover">
                                    <div class="popover-item-1 display-flex">
                                        <span class="popover-item-left">头像</span><span>:</span>
                                        <img class="margin-left-10" style="width:26px;
                                height:26px;
                                border-radius:50%;" :src="Fast.api.cdnurl(props.row.user.avatar)">
                                    </div>
                                    <div class="popover-item-1 display-flex">
                                        <span class="popover-item-left">ID</span><span>:</span>
                                        <span style="border-bottom: 1px solid #7438D5;height: 24px;
                                        line-height: 24px;cursor: pointer;color: #7438D5;" class="margin-left-10"
                                            @click="goOrderUser(props.row.user.id)">{{props.row.user?props.row.user.id:''}}</span>
                                    </div>
                                    <div v-if="props.row.user && props.row.user.mobile"
                                        class="popover-item-1 display-flex"><span
                                            class="popover-item-left">手机号</span><span>:</span><span
                                            class="margin-left-10">
                                            {{props.row.user.mobile}}</span>
                                    </div>
                                    <el-button type="text" slot="reference">
                                        <div class="color-666 ellipsis-item" style="border-bottom: 1px solid #7438D5;color: #7438D5;height: 30px;
                                        line-height: 30px;" v-if="props.row.user && props.row.user.nickname"
                                            @click="goOrderUser(props.row.user.id)">
                                            {{props.row.user.nickname}}
                                        </div>
                                    </el-button>
                                </el-popover>
                            </div>
                            <div style="color: #F56C6C;" v-else>-</div>
                        </div>
                        <div class="item-box-item item-box-item-name border-bottom border-right"
                            :style="{'height': props.row.item.length*80+'px'}">
                            <el-popover placement="bottom" width="200" height="80" trigger="hover">
                                <div class="popover-item">
                                    <span>收货信息:</span>
                                </div>
                                <div class="popover-item">
                                    {{props.row.city_name}}{{props.row.area_name}}{{props.row.address}}
                                </div>
                                <el-button type="text" slot="reference" v-if="props.row.consignee">
                                    <div class="popover-item color-666">
                                        {{props.row.consignee.length>4?props.row.consignee.substr(0,4)+'...':props.row.consignee}}
                                    </div>
                                    <div class="color-666">{{props.row.phone}}</div>
                                </el-button>
                            </el-popover>
                            <div v-if="!props.row.consignee">-</div>
                        </div>
                        <div class="border-right" style="flex-direction: column;">
                            <div class="item-box-item display-flex-column border-bottom"
                                v-for="(item,index) in props.row.item" style="height: 80px;width:104px">
                                {{item.dispatch_type_text}}
                            </div>
                            <!-- {{props.row.item[0].dispatch_type_text?props.row.item[0].dispatch_type_text:props.row.item[0].dispatch_type}} -->
                        </div>
                        <div class="item-box-item display-flex-column border-bottom border-right"
                            :style="{'height': props.row.item.length*80+'px'}" style="width: 136px;">
                            <div class="item-box-item-more-margin">{{props.row.pay_fee}}元</div>
                            <div v-if="props.row.score_amount>0" class="item-box-item-more-margin">
                                +{{props.row.score_amount}}积分</div>
                            <div class="color-active-1" v-if="props.row.item[0].dispatch_fee>0">
                                (含运费:{{props.row.item[0].dispatch_fee}}元)</div>
                        </div>
                        <div class="item-box-item item-box-item-detail border-bottom border-right"
                            :style="{'height': props.row.item.length*80+'px'}">
                            <div class="color-active cursor-pointer btn-addtabs" @click.stop="goDetail(props.row.id)">
                                查看详情
                            </div>
                        </div>
                    </div>
                </template>
            </el-table-column>
            <el-table-column width="585" label="商品信息">
                <template slot-scope="scope">
                    <div class="display-flex">
                        <span class="font-size-12 color-444 margin-left-10">ID:{{scope.row.id}}</span>
                        <span class="font-size-12 color-999 margin-left-10">订单号:{{scope.row.order_sn}}<span
                                class="font-size-12 color-999 margin-left-10"
                                v-if="scope.row.createtime">下单时间:{{moment(scope.row.createtime*1000).format('YYYY-MM-DD HH:mm:ss')}}</span></span>
                        <span class="font-size-12 color-active margin-left-10"><span
                                v-if="scope.row.platform_text">{{scope.row.platform_text}}-</span>{{scope.row.type_text}}
                    </div>
                </template>
            </el-table-column>
            <el-table-column width="104" label="发货状态">
                <template slot-scope="scope">
                    <span v-if="scope.row.pay_type=='wallet'"
                        class="font-size-12 margin-left-10 pay-type">{{scope.row.pay_type_text}}</span>
                    <span v-if="scope.row.pay_type=='alipay'"
                        class="font-size-12 margin-left-10 pay-type type-alipay">支付宝支付</span>
                    <span v-if="scope.row.pay_type=='wechat'"
                        class="font-size-12 margin-left-10 pay-type type-wechat">{{scope.row.pay_type_text}}</span>
                    <span v-if="scope.row.pay_type=='score'"
                        class="font-size-12 margin-left-10 pay-type type-score">{{scope.row.pay_type_text}}</span>
                </template>
            </el-table-column>
            <el-table-column width="104" label="退款状态">
            </el-table-column>
            <el-table-column width="136" label="售后状态">
            </el-table-column>
            <el-table-column width="94" label="订单状态">

            </el-table-column>
            <el-table-column width="104" label="下单用户">
            </el-table-column>
            <el-table-column width="104" label="收货信息">
                <template slot-scope="scope"></template>
            </el-table-column>
            <el-table-column width="104" label="配送方式">
                <template slot-scope="scope"></template>
            </el-table-column>
            <el-table-column width="136" label="支付金额(元)">
                <template slot-scope="scope"></template>
            </el-table-column>
            <el-table-column fixed="right" label="操作">
                <template slot-scope="scope">
                    <div style="width: 100%;display: flex;align-items: center;justify-content: center;"
                        class="color-active cursor-pointer" @click="optRecord(scope.row.id)">操作日志</div>
                </template>
            </el-table-column>
        </el-table>
        <div class="page-container display-flex">
            <el-pagination style="float: right;" @size-change="handleSizeChange" @current-change="handleCurrentChange"
                :current-page="currentPage" :page-sizes="[10, 20, 30, 40]" :page-size="10"
                layout="total, sizes, prev, pager, next, jumper" :total="totalPage">
            </el-pagination>
        </div>
    </div>
    <el-dialog class="order-dialog" title="订单发货" :visible.sync="express_dialog" width="50%" :before-close="handleClose">
        <el-table ref="multipleTable" :data="dispatchListItem" tooltip-effect="dark" style="width: 100%" border
            @selection-change="deliverSelectionChange">
            <el-table-column type="selection" width="55">
            </el-table-column>
            <el-table-column label="商品" width="287">
                <template slot-scope="scope">
                    <div style="width: 287px;">
                        <div class="display-flex">
                            <img class="table-img" :src="Fast.api.cdnurl(scope.row.goods_image)">
                            <div style="width:196px">
                                <div style="width:196px" class="goods-title-ellipsis font-size-12">
                                    {{scope.row.goods_title}}
                                </div>
                                <div class="color-999 font-size-12" style="text-align: left;padding-left: 2px;">
                                    <span>规格:</span><span>{{scope.row.goods_sku_text}}</span></div>
                            </div>
                        </div>
                    </div>
                </template>
            </el-table-column>
            <el-table-column prop="goods_num" label="数量" width="70">
            </el-table-column>
            <el-table-column prop="dispatch_status_text" label="状态" width="70">
                <template slot-scope="scope">
                    <span v-if="scope.row.dispatch_status"><span v-if="scope.row.dispatch_status==0"
                            class="color-active">{{scope.row.dispatch_status_text}}</span>
                        <span v-if="scope.row.dispatch_status>0">{{scope.row.dispatch_status_text}}</span></span>
                    <span v-else>-</span>
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
                        <span>配送方式：</span>
                        <span>{{dispatchList.item?dispatchList.item[0].dispatch_type_text:''}}</span>
                    </div>
                    <div>
                        <span>收货人：</span>
                        <span><span>{{dispatchList.consignee}}</span>
                            <span>{{dispatchList.phone}}</span></span>
                    </div>
                    <div>
                        <span>收货地址:</span>
                        <span>{{dispatchList.city_name}}{{dispatchList.area_name}}{{dispatchList.address}}</span>
                    </div>
                </el-form-item>
            </el-form>
            <el-form :inline="true" :model="deliverForm" class="demo-form-inline">
                <el-form-item label="快递公司">
                    <el-select class="select-page-container" v-model="deliverForm.express_name" filterable
                        placeholder="" :filter-method="selectFilter"  size="small">
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
                    <el-input size="small" style="width: 215px;" v-model="deliverForm.express_no" placeholder="请输入内容">
                    </el-input>
                </el-form-item>
            </el-form>
        </div>
        <span slot="footer" class="dialog-footer">
            <div class="dialog-footer-btn" :disabled=true v-if="!disabledBtn">立即发货</div>
            <div class="dialog-footer-btn dialog-footer-btn-active" @click="expressFunc('yes')" v-if="disabledBtn">立即发货
            </div>
        </span>
    </el-dialog>
    <!-- 操作日志 -->
    <div class="opt-box">
        <el-dialog title="操作日志" :visible.sync="optRecordDialog" width="400" style="padding-bottom: 20px;">
            <el-table :data="optList" border>
                <el-table-column property="remark" label="事件"></el-table-column>
                <el-table-column property="oper.name" label="员工" width="100"></el-table-column>
                <el-table-column property="createtime" width="200" label="时间">
                    <template slot-scope="scope">
                        <span>{{moment(scope.row.createtime*1000).format("YYYY-MM-DD HH:mm:ss")}}</span>
                    </template>
                </el-table-column>
            </el-table>
        </el-dialog>
    </div>
    <!-- 备货 -->
    <el-dialog class="order-dialog" :visible.sync="choice_dialog" width="50%" :before-close="choiceFunc">
        <div slot="title">
            备货商品<span style="color: #FFB333;">(请尽快通知该门店处理)</span>
        </div>
        <div>
            <el-table :data="choice_list" style="width: 100%" border>
                <el-table-column label="商品" width="287">
                    <template slot-scope="scope">
                        <div style="width: 287px;">
                            <div class="display-flex">
                                <img class="table-img" :src="Fast.api.cdnurl(scope.row.goods_image)">
                                <div style="width:196px">
                                    <div style="width:196px" class="goods-title-ellipsis font-size-12">
                                        {{scope.row.goods_title}}
                                    </div>
                                    <div class="color-999 font-size-12" style="text-align: left;padding-left: 2px;">
                                        <span>规格:</span><span>{{scope.row.goods_sku_text}}</span></div>
                                </div>
                            </div>
                        </div>
                    </template>
                </el-table-column>
                <el-table-column prop="goods_num" label="数量" width="70">
                </el-table-column>
                <el-table-column prop="dispatch_status_text" label="状态" min-width="70">
                    <template slot-scope="scope">
                        <span v-if="scope.row.dispatch_status"><span v-if="scope.row.dispatch_status==0"
                                class="color-active">{{scope.row.dispatch_status_text}}</span>
                            <span v-if="scope.row.dispatch_status>0">{{scope.row.dispatch_status_text}}</span></span>
                        <span v-else>-</span>
                    </template>
                </el-table-column>
            </el-table>
        </div>
        <div slot="footer" class="choice-item-button">
            <div class="choice-item-cancel" @click="choiceFunc">取消</div>
            <div class="choice-item-confirm" @click="choiceFunc('yes')">确认</div>
        </div>
    </el-dialog>
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
