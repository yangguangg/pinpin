<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:94:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/decorate/dodecorate.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
                                <meta name="referrer" content="never">
<link rel="stylesheet" href="/assets/addons/shopro/libs/element/element.css">
<style>
    #decorateApp {
        font-family: Source Han Sans SC;
        background: #fff;
        height: calc(100vh - 63px);
        padding: 0 20px;
        overflow: hidden;

    }

    button,
    button:focus {
        border-color: #B092E1 !important;
    }

    .component-item {
        /* padding-top: 30px; */
        background: #fff;
        margin: 0 0 5px;
        padding: 0px 10px 0;
        /* border-radius: 10px; */
    }

    .component-item-special {
        margin: 0 0 5px;
        border-radius: 0px;
    }

    .component-item-search {
        margin: 0;
        border-radius: 0px;
        height: 50px;
        padding: 9px 10px;
    }

    .component-item-list {
        background: #eee;
    }

    .selected {
        border: 1px solid #f66161;
    }

    /* .form-horizontal .form-group {
        margin: 0;
    } */

    .btn-common {
        width: 74px;
        height: 30px;
        line-height: 28px;
        background: #EEEAF7;
        border: 1px solid #B092E1;
        border-radius: 4px;
        color: #804ED1;
        font-size: 12px;
        text-align: center;
        box-sizing: border-box;
        cursor: pointer;
    }

    .margin-left-20 {
        margin-left: 20px;
    }



    .app-web::-webkit-scrollbar {
        width: 0px
    }

    .decorate-left::-webkit-scrollbar {
        width: 0px
    }

    .decorate-title {
        height: 66px;
        display: flex;
        justify-content: space-between;

        align-items: center;
        color: #444;
    }

    .title-msg {
        font-style: 14px;
        font-weight: 600;
    }

    .title-btn {
        display: flex;
        align-items: center;
    }

    .title-btn-1,
    .title-btn-2,
    .title-btn-3 {
        width: 88px;
        height: 32px;
        line-height: 30px;
    }

    .title-btn-2 {
        margin: 0 30px;
    }

    .title-btn-3 {
        background: #804ED1;
        color: #fff;
    }

    .decorate-body {
        height: calc(100vh - 129px);
        display: flex;
    }


    .decorate-left {
        width: 260px;
        box-sizing: border-box;
        height: 100%;
        overflow: auto;
    }

    .center-body {
        flex: 1;
        background: #F2F2F6;
        display: flex;
        justify-content: center;
        margin: 0 16px;
        border-radius: 10px 10px 0px 0px;
        padding: 40px 0 64px;
        position: relative;
    }

    .decorate-body-buttom {
        position: absolute;
        bottom: 0;
        height: 54px;
        width: 100%;
        background: rgba(255, 255, 255, 1);
        box-shadow: 0px -6px 4px 0px rgba(25, 25, 25, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .decorate-body-buttom-item {
        margin-right: 10px;
        border: 1px solid #E6E6E6;
        color: #999;
        background: #fff;
    }

    .decorate-body-buttom-item:last-child {
        margin: 0;
    }

    .decorate-body-buttom-item-active {
        color: #fff;
        background: #804ED1;
    }

    .decorate-center-container::-webkit-scrollbar {
        width: 0px
    }

    .decorate-center-container {
        width: 375px;
        height: 100%;
        overflow-y: auto;
        background: #eee;
    }








    .decorate-left-con {
        display: flex;
        flex-wrap: wrap;
        border: 1px solid #eee;
        padding-left: 8px;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    .decorate-left-con:nth-child(3n) {
        margin-right: 0;
    }


    .drog-title {
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 14px;
        font-family: Microsoft YaHei;
        font-weight: 400;
        color: rgba(51, 51, 51, 1);
    }

    .decorate-link {
        text-align: center;
        border-radius: 0;
        color: #444444;
        font-size: 12px;
        padding: 10px 0 10px;
        float: left;
        cursor: pointer;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        position: relative;
        width: 75px;
        height: 75px;
        margin: 8px 8px 8px 0px;
        border: 1px solid #eee;
        background: #F7F7FA;
        border-radius: 4px;
    }

    .decorate-link>img {
        width: 30px;
        height: 30px;
        margin-bottom: 10px;
    }

    .decorate-right {
        height: calc(100vh - 129px);
        overflow: auto;
        overflow-x: hidden;
    }

    .decorate-right-item {
        padding: 20px 16px;
        font-size: 12px;
    }

    .item-title {
        padding: 8px 10px;
    }

    .item-title img {
        width: 34px;
        height: 34px;
        margin-right: 18px;

    }

    .item-title-span {
        font-size: 14px;
        font-family: Microsoft YaHei;
        font-weight: bold;
        color: rgba(51, 51, 51, 1);
    }

    .select-style {
        margin: 10px;
    }

    .select-style .select-img {
        width: 78px;
        height: 38px;
    }

    .select-style .select-imgzheng {
        width: 38px;
        height: 38px;
    }

    .select-style-con {
        background: #F7F7FA;
        border: 1px solid #eee;
        color: #999;
        position: relative;
        padding: 12px 92px 48px;
        border-radius: 4px;
    }

    .select-style-con>img {
        width: 100%;
        height: 100%;
    }



    .select-style-item {
        margin: 16px 0;
        padding-bottom: 15px;
        border: 1px solid #eee;
        border-radius: 4px;
        color: #444;
    }

    .select-style-item-title,
    .select-style-item-box {
        padding-left: 15px;
    }

    .select-style-item-title {
        background: #EFEFEF;
        height: 40px;
        margin: 0;
        line-height: 40px;
    }

    .select-style-item-box {
        height: 38px;
        margin-top: 10px;
    }

    .select-style-item-tip {
        line-height: 38px;
    }

    .select-style-item-select {
        line-height: 38px;
        height: 38px;
        display: flex;
        align-items: center;
    }

    .tip-line {
        line-height: 30px;
    }

    .input-select-inline {
        display: flex;
        align-items: center;
    }

    .input-select-inline .el-input {
        width: 80%;
    }

    .input-select-inline .el-input__inner {
        border-radius: 4px 0px 0px 4px;
        border-right: 0;
    }

    .input-select-inline .input-select-btn {
        width: 50px;
        height: 30px;
        line-height: 26px;
        background: #7536D0;
        border-radius: 0px 4px 4px 0px;
        color: #fff;
    }

    .radio-tip,
    .item-radio-group,
    .search-tip {
        height: 30px;
        line-height: 30px;

    }

    .el-radio {
        line-height: 30px;
    }

    .box-radio {
        margin-bottom: -16px;
    }

    .el-radio__input.is-checked .el-radio__inner {
        background: #804ED1;
        border-color: #804ED1;
    }

    .el-radio__input.is-checked+.el-radio__label {
        color: #804ED1;
    }

    .detele-item {
        font-size: 24px;
        color: #f66161;
        text-align: right;
        padding-right: 8px;
    }




    .chooseAdvPic {
        height: 38px;
        background: #EEEAF7;
        width: 100%;
        border: none;
        color: #804ED1;
        font-size: 16px;
        position: absolute;
        left: 0;
        bottom: 0;
        border-radius: 0px 4px 4px 0px;
        line-height: 38px;
        text-align: center;
        cursor: pointer;
    }



    .item {
        text-align: center;
        position: relative;

    }

    .item img {
        width: 100%;
        height: 100%;
    }

    .item-close {
        position: absolute;
        right: 5px;
        top: 5px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        color: #fff;
        line-height: 20px;
        text-align: center;
        /* background: #f00; */
        z-index: 200;
    }

    .item-close I {
        color: #f66161;
        font-size: 20px;
    }



    .banner-add-btn {
        border: 1px dashed #6b7685;
        line-height: 32px;
        height: 32px;
        border-radius: 4px;
        text-align: center;
        cursor: pointer;
    }


    .right-container-iframe {
        display: flex;
        justify-content: center;
    }

    #preview {
        border: none;
        margin: 0 auto;
        width: 100%;
        height: 100%;
        border-radius: 26px;
    }

    .right-container {
        background: #fff;
        height: calc(100vh - 130px);
        width: 350px;
    }

    .board-item {
        position: relative;
    }

    .hide-item {
        display: none;
    }

    .sortable-ghost {
        height: 50px;
        overflow: hidden;
    }

    .sortable-ghost .hide-item {
        height: 50px;
        z-index: 1000;
        position: absolute;
        background: #fff;
        width: 100%;
        line-height: 50px;
        text-align: center;
        color: #2589ff;
        display: block;

    }

    .hide-item-left {
        position: absolute;
        z-index: 1000;
        height: 70px;
        background: #f00;
        left: 0;
        top: 0;
        display: none;
    }

    .el-dialog {
        width: 700px;
        height: 740px;
        border-radius: 10px;
    }

    .el-dialog__header {
        border-radius: 10px 10px 0 0;
    }

    .el-dialog__body {
        padding: 50px 40px 50px 75px;
    }

    .preview-body {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .web-preview {
        height: 594px;
        width: 300px;
        background: url('/assets/addons/shopro/img/decorate/preview_bg.png');
        padding: 18px;
    }

    .code-preview {
        width: 200px;
        height: 594px;
        padding: 28px 0;
        display: flex;
        /* justify-content: space-between; */
        flex-direction: column;
    }

    .template-title {
        font-size: 18px;
        color: #444;
        margin-bottom: 14px;
    }

    .template-company {
        color: #999;
        font-size: 12px;
    }

    .template-copyright {
        color: #999;
        font-size: 12px;
        margin-bottom: 14px;
    }

    .template-platform {
        color: #FF5306;
        font-size: 14px;
        display: flex;
    }

    .template-platform img {
        margin-right: 5px;
    }

    .wechart-code {
        margin-top: 64px;
    }

    .code-title {
        margin-top: 18px;
        font-size: 12px;
        color: #999;
    }

    .code-item {
        width: 132px;
        height: 132px;
    }

    .code-item-img {
        width: 100%;
        height: 100%;
    }

    /* 底部导航 */
    .select-color {
        display: flex;
        align-items: center;
        border-radius: 5px;
        border: 1px solid #eee;
    }

    .el-color-picker__color-inner {
        border-radius: 0 5px 5px 0;
        border: 1px solid #C0C4CC;
    }

    .select-color .el-input__inner,
    .el-color-picker__trigger,
    .el-color-picker__color {
        border: none;
    }

    .el-color-picker__trigger {
        padding: 0;
    }

    .el-radio {
        margin-right: 12px;
    }

    .tabbar-body-item {
        bottom: 0px;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        background: #fff;
    }

    /* 标题栏 */
    .select-style-block {
        padding-bottom: 0px;
    }

    .title-block-body {
        background: #F6F6F6;
    }

    .title-block-title {
        position: absolute;
        left: 50%;
        top: 5px;
        margin-left: -40px;
        width: 70px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        font-style: 14px;
    }

    .title-block-style {
        width: 100%;
        height: 40px;
        margin-bottom: 8px;
    }

    .title-block-btn {
        /* width: 338px; */
        height: 42px;
        line-height: 42px;
        border-radius: 0px 0px 6px 6px;
        background: #EEEAF7;
        font-style: 16px;
        color: #804ED1;
        text-align: center;
        cursor: pointer;
    }

    .nav-bg {
        width: 100%;
        height: 58px;
        position: relative;
    }

    .el-drawer .rtl {
        width: 338px;
    }

    .one-ellipsis {
        display: block;
        width: 130px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    #float-button {
        position: absolute;
        bottom: 50px;
        right: 25px;
    }

    .gg {
        margin-top: -10000px !important;
        z-index: -1000 !important;
    }

    .el-dialog__title {
        font-size: 16px;
    }

    .el-dialog__headerbtn .el-dialog__close {
        font-size: 18px;
    }

    .el-dialog__headerbtn .el-dialog__close:hover {
        color: #7438D5;
    }

    .save-dialog .el-dialog {
        height: 200px;
    }

    .save-dialog .el-dialog__body {
        padding: 30px 20px;
    }



    /* 轮播图 */
    .el-carousel__button {
        width: 7px;
        height: 7px;
        border-radius: 50%;
    }

    /* adv */
    .adv-box {
        width: auto;
        height: 160px;
    }

    .adv-item-updown {
        flex-direction: column;
    }

    .leftright {
        display: flex;
    }

    .leftright>div {
        width: 50%;
    }

    .adv-1,
    .adv-2,
    .adv-3,
    .adv-4,
    .adv-5,
    .adv-6,
    .adv-7 {
        height: 100%;
        /* width: 100%; */
    }

    .adv-2,
    .adv-3,
    .adv-4,
    .adv-7-item {
        display: flex;
    }

    .adv-2-item,
    .adv-3-item,
    .adv-4-item {
        width: 50%;
    }

    .adv-3-item .height-50,
    .adv-4-item .height-50 {
        height: 50%;
    }

    .adv-5-item,
    .adv-6-item,
    .adv-7-item {
        height: 50%;
    }

    .adv-7-item-top>div {
        width: 50%;
    }

    .adv-7-item-bottom>div {
        width: 33.3%;
    }







    .order-card-box,
    .wallet-card-box {
        width: auto;
    }

    /* 商品 */
    /* .goods-box{
        display: flex;
    } */
    .goods-list-box {
        display: flex;
        flex-wrap: wrap;
        min-height: 280px;
    }

    .goods-list-item {
        border-radius: 10px;
        background: #fff;
        margin-bottom: 5px;
    }

    .goods-list-img {
        background-color: #ccc;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .goods-list-tit {
        font-size: 12px;
        font-family: PingFang SC;
        font-weight: 500;
        line-height: 18px;
        height: 36px;
        margin: 10px 10px 5px;
        text-align: left;
    }

    .goods-list-subtitle {
        text-align: left;
        width: 100%;
        line-height: 28px;
        background: #f6f2ea;
        font-size: 11px;
        font-family: PingFang SC;
        font-weight: 400;
        color: #a8700d;
        padding: 0 10px;
    }

    .ellipsis-more-1 {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
    }

    .ellipsis-more {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .goods-list-price {
        display: flex;
        justify-content: space-between;
        padding: 5px 10px;
    }

    .goods-price {
        color: #e1212b
    }

    .goods-sales {
        color: #999;
    }

    /* menu */
    .menu-box {
        display: flex;
        flex-wrap: wrap;
        padding-bottom: 16px;
    }

    .menu-box-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 0 0;
    }

    /* 优惠券 */
    .coupons-box {
        height: 92px;
        background: #fff;
        margin-bottom: 5px;
    }

    .coupons-box-item {
        display: flex;
        position: relative;
        justify-content: space-between;
        align-items: center;
        height: 76px;
        /* background: url(http://shopro.7wpp.com/imgs/coupon_bg1.png) no-repeat; */
        margin: 10px 15px;
    }

    .coupons-item-1 {
        padding-left: 20px;
    }

    .coupons-item-2 {
        padding-right: 20px;
    }

    .coupons-amount {
        font-size: 27px;
        font-weight: 700;
        color: #4f3a1e;
        line-height: 27px;
    }

    .coupons-enough {
        font-size: 11px;
        color: #a8700d;
        margin-top: 3px;
        text-align: left;
    }

    .coupons-get {
        width: 71px;
        height: 27px;
        line-height: 27px;
        background: -webkit-linear-gradient(left, #2d2211, #543e20);
        background: linear-gradient(90deg, #2d2211, #543e20);
        box-shadow: 0 1px 2px 0 rgba(206, 158, 106, .46);
        border-radius: 13px;
        padding: 0;
        font-size: 12px;
        font-family: PingFang SC;
        font-weight: 500;
        color: #efc582;
    }

    .coupons-stock {
        font-size: 11px;
        font-family: PingFang SC;
        font-weight: 500;
        color: #a8700d;
        margin-top: 7px;
    }

    /* 拼团,秒杀 */
    .activity-box {
        height: 170px;
        overflow: hidden;
    }

    .activity-header {
        display: flex;
        align-items: center;
        height: 50px;
        justify-content: space-between;
        padding: 0 10px;
    }

    .activity-header-tip {
        color: #333;
        font-size: 16px;
        font-weight: 700;
    }

    .activity-more {
        font-size: 14px;
        padding-left: 15px;
        color: #666;
    }

    .activity-body {
        display: flex;
        align-items: center;
        height: 120px;
        overflow: hidden;
    }

    .activity-item {
        width: 25%;
        display: flex;
        flex-direction: column;
        align-items: center;
        flex-shrink: 0;
    }

    .activity-item-img {
        width: 76px;
        position: relative;
        height: 76px;
    }

    .team_num {
        position: absolute;
        left: 0;
        bottom: 0px;
        z-index: 2;
        line-height: 17px;
        background: -webkit-linear-gradient(318deg, #f3dfb1, #f3dfb1, #ecbe60);
        background: linear-gradient(132deg, #f3dfb1, #f3dfb1, #ecbe60);
        border-radius: 0 9px 9px 0;
        padding: 0 5px;
        font-size: 12px;
        font-family: PingFang SC;
        font-weight: 700;
        color: #784f06;
    }

    .activity-price {
        font-size: 15px;
        font-weight: 500;
        color: #e1212b;
    }

    .activity-originalprice {
        font-size: 10px;
        font-weight: 400;
        text-decoration: line-through;
        color: #999;
    }

    /* 小程序 */
    .live-box {
        /* height: 192px; */
        height: 220px;
    }

    .live-body {
        display: flex;
        align-items: center;
    }

    .live-item:nth-child(2n-1) {
        margin-right: 10px;
    }

    .non-existent {
        width: 100%;
        color: #f00;
    }

    .el-image {
        width: 100%;
        height: 100%;
    }

    .el-image__error {
        font-size: 12px;
        width: 100%;
        height: 100%;
    }


    .image-slot {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .decorate-center-container::-webkit-scrollbar {
        width: 6px;
    }

    .decorate-center-container::-webkit-scrollbar-thumb {
        width: 6px;
        background: #ccc;
        height: 20px;
        border-radius: 3px;
    }

    .center-body .el-row {
        width: 100%;
        margin: 0 !important;
    }

    .image-border {
        border: 1px solid #e6e6e6;
    }

    #popupContainer .image-slot {
        font-size: 40px;
        color: #999;
    }

    #float-button-box .image-slot {
        font-size: 16px;
    }

    .home-custom {
        height: calc(100% - 65px);
    }

    .compotent-grid-list-item-tip {
        height: 12px;
        line-height: 12px;
    }

    .el-carousel__indicators--horizontal {
        display: none;
    }

    [v-cloak] {
        display: none
    }

    .left-menu-title {
        font-size: 14px;
        font-family: Microsoft YaHei;
        font-weight: 400;
        color: #333333;
        line-height: 44px;
        height: 44px;
        background: #F7F7FA;
        padding-left: 16px;
        box-sizing: border-box;
        border-top-right-radius: 4px;
        border-top-left-radius: 4px;
    }

    .left-menu-container {
        display: flex;
        flex-wrap: wrap;
        padding: 0 0 8px 8px;
        border: 1px solid #eee;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    .left-menu-container-item {
        text-align: center;
        color: #444444;
        font-size: 12px;
        padding: 10px 0 10px;
        cursor: pointer;
        width: 75px;
        height: 75px;
        margin: 8px 8px 0px 0px;
        border: 1px solid #eee;
        background: #F7F7FA;
        border-radius: 4px;
    }

    .center-body .left-menu-container-item {
        width: 100%;
    }

    .compotent-item-container {
        position: relative;
    }

    .compotent-item-container-item {
        background: #fff;
    }

    .compotent-item-container-item-padding {
        padding: 10px;
    }

    .compotent-item-container-item-margin {
        margin-bottom: 5px;
    }

    .compotent-search {
        width: auto;
        height: 32px;
        background: #f5f5f5;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .compotent-search i {
        margin-right: 10px;
    }

    /* adv */
    .display-flex {
        display: flex;
    }

    .adv-width-100 {
        width: 100%;
    }

    .adv-height-100 {
        height: 100%;
    }

    .adv-width-50 {
        width: 50%;
    }

    .adv-height-50 {
        height: 50%;
    }

    .adv-width-33 {
        width: 33.3%;
    }

    .adv-line-right {
        border-right: 1px solid #fff;
    }

    .adv-line-bottom {
        border-bottom: 1px solid #fff;
    }

    .compotent-adv-1 {
        height: 110px;
    }

    .compotent-adv-2 {
        height: 110px;
        padding: 5px 0;
        display: flex;
    }

    .compotent-adv-3,
    .compotent-adv-4 {
        height: 177px;
        padding: 5px 0;
        display: flex;
    }

    .compotent-adv-5,
    .compotent-adv-6,
    .compotent-adv-7 {
        height: 170px;
        padding: 5px 0;
    }

    /* nav-list-box */

    .compotent-nav-list-item {
        height: 50px;
        padding: 0 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 0.5px solid #f3f3f3;
    }

    .compotent-nav-list-item-left {
        display: flex;
        align-items: center;
        /* width: 42px; */
        height: 42px;
        flex: 1;
    }

    .compotent-nav-list-item .compotent-nav-list-item-image {
        width: 22px;
        height: 22px;
        margin-right: 10px;
    }

    /* compotent-grid-list-item */
    .compotent-grid-list-container {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        padding-bottom: 16px;
        min-height: 72px;
    }

    .compotent-grid-list-item {
        width: 25%;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 0 0;
        height: 58px;
    }

    .compotent-grid-list-item-image {
        width: 44px;
        height: 44px;
        margin-bottom: 14px;
    }

    /* rich-text */
    .compotent-rich-text {
        height: 50px;
        line-height: 50px;
    }

    /* compotent-title-block-container */

    .compotent-title-block-container {
        position: relative;
    }

    .compotent-title-block-title {
        position: absolute;
        left: 50%;
        top: 5px;
        margin-left: -40px;
        width: 80px;
        height: 30px;
        line-height: 30px;
        text-align: center;
    }

    .sortable-ghost {
        background: #fff;
        border-radius: 10px;
    }

    .seat-item {
        display: none;
    }

    .sortable-ghost .seat-item {
        display: flex;
        align-items: center;
        height: 100%;
        justify-content: center;
        background: #EEEAF7;
    }

    .sortable-ghost .compotent-item-container {
        display: none;
    }

    .clone-item {
        /* color: #ff0; */
    }

    .dragin-item {
        background: #ff0;
    }
    .menu-item-tip{
        margin-top: 8px;
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/Sortable.min.js"></script>
<script src="/assets/addons/shopro/libs/vuedraggable.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<script src="/assets/addons/shopro/libs/color-thief.js"></script>
<div id="decorateApp" v-cloak style="height: calc(100vh - 63px);">
    <div class="decorate-title">
        <div class="title-msg">
            店铺装修
        </div>
        <div class="title-btn">
            <div class="btn-common title-btn-2" @click="goPreview()">预览</div>
            <div class="btn-common title-btn-3" @click="goPreserve()">保 存</div>
        </div>
    </div>
    <div class="decorate-body">
        <div class="decorate-left" v-if="isPageType=='home'|| isPageType=='user' || isPageType=='custom'">
            <div v-for="item in toolsBox" :key="item.id">
                <div class="left-menu-title">
                    <span>{{item.name}}</span>
                </div>
                <draggable class="left-menu-container" :list="item.data" v-bind="$attrs" :options="menuOption"
                    :move="menuMove" @start="menuStart" @end="menuEnd">
                    <div v-for="(ite,idx) in item.data" class="left-menu-container-item" :class="ite.type"
                        @click.stop="selectTools(ite.type)">
                        <img :src="Fast.api.cdnurl(ite.image)">
                        <div class="menu-item-tip">{{ite.name}}</div>
                    </div>
                </draggable>
            </div>
        </div>
        <div class="center-body">
            <div class="item decorate-center-container" style="position: relative;"
                v-if="isPageType!='tabbar' && isPageType!='popup'&& isPageType!='float-button'">
                <div style="background: #fff;border-bottom: 1px solid #e6e6e6;"
                    v-if="isPageType=='home' || fromtype=='custom'">
                    <img src="/assets/addons/shopro/img/decorate/tabs-header.png">
                    <div v-if="isPageType=='home' && fromtype!='custom'"
                        style="height: 44px;line-height: 44px;background:#fff;text-align: center;">首页</div>
                    <div v-if="fromtype=='custom'"
                        style="height: 44px;line-height: 44px;background:#fff;text-align: center;">{{customName}}</div>
                </div>
                <div v-if="templateData && templateData.length==0"
                    style="position: absolute;top: 62px;height: calc( 100% - 62px);width:100%;display: flex;justify-content: center;align-items: center;">
                    <img style="width:69px;height:63px;" src="/assets/addons/shopro/img/decorate/zujian.png"></div>
                <draggable :list="templateData" :class="(isPageType=='home' || fromtype=='custom')?'home-custom':''"
                    v-bind="$attrs" class="center-draggable" :options="defaultOption" :move="centerMove" @end="centerEnd">
                    <template v-if="templateData && templateData.length>0">
                        <div class="compotent-item" v-for="(compotent,index) in templateData"
                            @click.stop="compotentShowForm(index)">
                            <div class="seat-item">
                                可放在此处
                            </div>
                            <div class="compotent-item-container">
                                <!-- search -->
                                <div class="compotent-item-container-item compotent-item-container-item-padding"
                                    :class="index==centerSelect?'selected':''" v-if="compotent.type=='search'">
                                    <div class="compotent-search">
                                        <i class="el-icon-search"></i>
                                        <span>{{compotent.content}}</span>
                                    </div>
                                </div>
                                <!-- banner -->
                                <div class="compotent-item-container-item compotent-item-container-item-margin compotent-item-container-item-padding"
                                    :class="index==centerSelect?'selected':''" v-if="compotent.type=='banner' && compotent.content">
                                    <div style="width: auto;height:175px;">
                                        <el-carousel trigger="click" height="175px">
                                            <el-carousel-item v-for="(it,index) in compotent.content.list" :key="it">
                                                <div style="height: 175px;">
                                                    <el-image v-if="it.image" class="label-auto"
                                                        style="width: 100%; height: 175px"
                                                        :src="Fast.api.cdnurl(it.image)" fit="contain">
                                                        <div slot="error" class="image-slot">
                                                            <i class="el-icon-picture-outline"></i>
                                                        </div>
                                                    </el-image>
                                                </div>
                                            </el-carousel-item>
                                        </el-carousel>
                                    </div>
                                </div>
                                <!-- adv -->
                                <div class="compotent-item-container-item compotent-item-container-item-padding"
                                    :class="index==centerSelect?'selected':''" v-if="compotent.type=='adv' && compotent.content">
                                    <!-- 1 -->
                                    <div v-if="compotent.content.style==1" class="compotent-adv-1">
                                        <el-image v-if="compotent.content.list[0].image"
                                            :src="Fast.api.cdnurl(compotent.content.list[0].image)" fit="contain">
                                            <div slot="error" class="image-slot">
                                                <i class="el-icon-picture-outline"></i>
                                            </div>
                                        </el-image>
                                    </div>
                                    <!-- 2 -->
                                    <div v-if="compotent.content.style==2" class="compotent-adv-2">
                                        <div class="adv-width-50 adv-height-100" v-for="it in compotent.content.list">
                                            <el-image v-if="it.image" :src="Fast.api.cdnurl(it.image)" fit="cover">
                                                <div slot="error" class="image-slot">
                                                    <i class="el-icon-picture-outline"></i>
                                                </div>
                                            </el-image>
                                        </div>
                                    </div>
                                    <!-- 3 -->
                                    <div v-if="compotent.content.style==3" class="compotent-adv-3">
                                        <div class="adv-width-50 adv-height-100 adv-line-right">
                                            <el-image v-if="compotent.content.list[0].image"
                                                :src="Fast.api.cdnurl(compotent.content.list[0].image)" fit="cover">
                                                <div slot="error" class="image-slot">
                                                    <i class="el-icon-picture-outline"></i>
                                                </div>
                                            </el-image>
                                        </div>
                                        <div class="adv-width-50 adv-height-100">
                                            <div class="adv-width-100 adv-height-50 adv-line-bottom">
                                                <el-image v-if="compotent.content.list[1].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[1].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                            <div class="adv-width-100 adv-height-50">
                                                <el-image v-if="compotent.content.list[2].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[2].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 4 -->
                                    <div v-if="compotent.content.style==4" class="compotent-adv-4">
                                        <div class="adv-width-50 adv-height-100 adv-line-right">
                                            <div class="adv-width-100 adv-height-50 adv-line-bottom">
                                                <el-image v-if="compotent.content.list[0].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[0].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                            <div class="adv-width-100 adv-height-50">
                                                <el-image v-if="compotent.content.list[1].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[1].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                        </div>
                                        <div class="adv-width-50 adv-height-100">
                                            <el-image v-if="compotent.content.list[2].image"
                                                :src="Fast.api.cdnurl(compotent.content.list[2].image)" fit="cover">
                                                <div slot="error" class="image-slot">
                                                    <i class="el-icon-picture-outline"></i>
                                                </div>
                                            </el-image>
                                        </div>
                                    </div>
                                    <!-- 5 -->
                                    <div v-if="compotent.content.style==5" class="compotent-adv-5">
                                        <div class="adv-width-100 adv-height-50 adv-line-bottom display-flex">
                                            <div class="adv-width-50 adv-height-100 adv-line-right">
                                                <el-image v-if="compotent.content.list[0].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[0].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                            <div class="adv-width-50 adv-height-100">
                                                <el-image v-if="compotent.content.list[1].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[1].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                        </div>
                                        <div class="adv-width-100 adv-height-50">
                                            <el-image v-if="compotent.content.list[2].image"
                                                :src="Fast.api.cdnurl(compotent.content.list[2].image)" fit="cover">
                                                <div slot="error" class="image-slot">
                                                    <i class="el-icon-picture-outline"></i>
                                                </div>
                                            </el-image>
                                        </div>
                                    </div>
                                    <!-- 6 -->
                                    <div v-if="compotent.content.style==6" class="compotent-adv-6">
                                        <div class="adv-width-100 adv-height-50 adv-line-bottom">
                                            <el-image v-if="compotent.content.list[0].image"
                                                :src="Fast.api.cdnurl(compotent.content.list[0].image)" fit="cover">
                                                <div slot="error" class="image-slot">
                                                    <i class="el-icon-picture-outline"></i>
                                                </div>
                                            </el-image>
                                        </div>
                                        <div class="adv-width-100 adv-height-50 display-flex">
                                            <div class="adv-width-50 adv-height-100 adv-line-right">
                                                <el-image v-if="compotent.content.list[1].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[1].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                            <div class="adv-width-50 adv-height-100">
                                                <el-image v-if="compotent.content.list[2].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[2].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 7 -->
                                    <div v-if="compotent.content.style==7" class="compotent-adv-7">
                                        <div class="adv-width-100 adv-height-50 adv-line-bottom display-flex">
                                            <div class="adv-width-50 adv-height-100 adv-line-right">
                                                <el-image v-if="compotent.content.list[0].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[0].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                            <div class="adv-width-50 adv-height-100">
                                                <el-image v-if="compotent.content.list[1].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[1].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                        </div>
                                        <div class="adv-width-100 adv-height-50 display-flex">
                                            <div class="adv-width-33 adv-height-100 adv-line-right">
                                                <el-image v-if="compotent.content.list[2].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[2].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                            <div class="adv-width-33 adv-height-100 adv-line-right">
                                                <el-image v-if="compotent.content.list[3].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[3].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                            <div class="adv-width-33 adv-height-100">
                                                <el-image v-if="compotent.content.list[4].image"
                                                    :src="Fast.api.cdnurl(compotent.content.list[4].image)" fit="cover">
                                                    <div slot="error" class="image-slot">
                                                        <i class="el-icon-picture-outline"></i>
                                                    </div>
                                                </el-image>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 列表导航nav-list -->
                                <div class="compotent-item-container-item" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='nav-list' && compotent.content">
                                    <div class="compotent-nav-list-item" v-for="it in compotent.content.list">
                                        <div class="compotent-nav-list-item-left">
                                            <img v-if="it.image" class="compotent-nav-list-item-image"
                                                :src="Fast.api.cdnurl(it.image)" />
                                            <div v-if="it.name">{{it.name}}</div>
                                        </div>
                                        <div><i class="el-icon-arrow-right"></i></div>
                                    </div>
                                </div>
                                <!-- 宫格列表 grid-list -->
                                <div class="compotent-item-container-item" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='grid-list' && compotent.content">
                                    <div class="compotent-grid-list-container">
                                        <div class="compotent-grid-list-item" v-for="it in compotent.content.list"
                                            style="height: 62px;">
                                            <div class="compotent-grid-list-item-image"
                                                style="width: 22px;height: 22px;margin-bottom: 8px;">
                                                <img v-if="it.image" :src="Fast.api.cdnurl(it.image)" /></div>
                                            <div class="compotent-grid-list-item-tip">{{it.name}}</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 富文本 -->
                                <div class="compotent-item-container-item compotent-item-container-item-padding" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='rich-text' && compotent.content">
                                    <div class="compotent-rich-text" v-if="compotent.content.name">
                                        {{compotent.content.name}}</div>
                                    <el-image v-if="!compotent.content.name"
                                        src="/assets/addons/shopro/img/decorate/rich-text_bg.png" fit="contain">
                                    </el-image>
                                </div>
                                <!-- 标题栏  component-item-special-->
                                <div class="compotent-item-container-item" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='title-block' && compotent.content">
                                    <div class="compotent-title-block-container">
                                        <div style="height: 42px;">
                                            <img v-if="compotent.content.image"
                                                :src="Fast.api.cdnurl(compotent.content.image)" class="label-auto">
                                        </div>
                                        <div class="compotent-title-block-title"
                                            :style="{'color':compotent.content.color}">
                                            {{compotent.content.name}}
                                        </div>
                                    </div>
                                </div>
                                <!-- 订单卡片 -->
                                <div class="compotent-item-container-item compotent-item-container-item-padding" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='order-card'">
                                    <div class="order-card-box">
                                        <img class="label-auto"
                                            src="/assets/addons/shopro/img/decorate/order-card_bg.png">
                                    </div>
                                </div>
                                <!-- 资产卡片 -->
                                <div class="compotent-item-container-item compotent-item-container-item-padding" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='wallet-card'">
                                    <div class="wallet-card-box">
                                        <img class="label-auto"
                                            src="/assets/addons/shopro/img/decorate/wallet-card_bg.png">
                                    </div>
                                </div>
                                <!-- 商品分类 goods-group-->
                                <div class="compotent-item-container-item compotent-item-container-item-padding" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='goods-group' && compotent.content && compotent.content.timeData">
                                    <div v-if="compotent.content.timeData.length>0" class="goods-list-box">
                                        <el-row :gutter="10">
                                            <el-col :span="12" v-for="(it,idx) in compotent.content.timeData">
                                                <div class="goods-list-item">
                                                    <div class="goods-list-img" style="height: 171px;border-radius: 10px 10px 0px 0px;
                                                                overflow: hidden;">
                                                        <el-image :src="Fast.api.cdnurl(it.image)" fit="cover">
                                                            <div slot="error" class="image-slot">
                                                                <i class="el-icon-picture-outline"></i>
                                                            </div>
                                                        </el-image>
                                                    </div>
                                                    <div class="goods-list-subtitle ellipsis-more-1">{{it.subtitle}}
                                                    </div>
                                                    <div class="goods-list-tit ellipsis-more">{{it.title}}</div>
                                                    <div class="goods-list-price">
                                                        <div class="goods-pricer">￥{{it.price}}</div>
                                                        <div class="goods-sales">销量{{it.sales}}件</div>
                                                    </div>
                                                </div>
                                            </el-col>
                                        </el-row>
                                    </div>
                                    <el-image v-if="compotent.content.timeData.length==0"
                                        src="/assets/addons/shopro/img/decorate/goods-group_bg.png" fit="contain">
                                    </el-image>
                                </div>
                                <!-- 自定义商品 -->
                                <div class="compotent-item-container-item compotent-item-container-item-padding" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='goods-list' && compotent.content && compotent.content.timeData">
                                    <div v-if="compotent.content.timeData.length>0" class="goods-list-box">
                                        <el-row :gutter="10">
                                            <el-col :span="12" v-for="it in compotent.content.timeData"
                                                v-if="compotent.content.timeData">
                                                <div class="goods-list-item">
                                                    <div class="goods-list-img" style="height: 171px;border-radius: 10px 10px 0px 0px;
                                                    overflow: hidden;">
                                                        <el-image :src="Fast.api.cdnurl(it.image)" fit="cover">
                                                            <div slot="error" class="image-slot">
                                                                <i class="el-icon-picture-outline"></i>
                                                            </div>
                                                        </el-image>
                                                    </div>
                                                    <div class="goods-list-subtitle ellipsis-more-1">{{it.subtitle}}
                                                    </div>
                                                    <div class="goods-list-tit ellipsis-more">{{it.title}}</div>
                                                    <div class="goods-list-price">
                                                        <div class="goods-pricer">￥{{it.price}}</div>
                                                        <div class="goods-sales">销量{{it.sales}}件</div>
                                                    </div>
                                                </div>
                                            </el-col>
                                        </el-row>
                                    </div>
                                    <el-image v-if="compotent.content.timeData.length==0"
                                        src="/assets/addons/shopro/img/decorate/goods-list_bg.png" fit="contain">
                                    </el-image>
                                </div>
                                <!-- 菜单组 -->
                                <div class="compotent-item-container-item" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='menu' && compotent.content">
                                    <el-carousel trigger="click"
                                        :height="compotent.content.list.length>4?'200px':'100px'" :autoplay="false">
                                        <el-carousel-item
                                            v-for="(it,calindex) in Math.ceil(compotent.content.list.length/(compotent.content.style*2))"
                                            :key="compotent">
                                            <div class="menu-box">
                                                <div class="menu-box-item"
                                                    :style="{width:compotent.content.style==4?'25%':'20%'}"
                                                    v-for="(i,index) in compotent.content.list"
                                                    v-if="(calindex+1)*compotent.content.style*2>=(index+1) && index+1>(calindex)*compotent.content.style*2">
                                                    <div class="compotent-grid-list-item-image">
                                                        <img v-if="i.image" class="compotent-grid-list-item-image"
                                                            :src="Fast.api.cdnurl(i.image)" />
                                                    </div>
                                                    <div v-if="i.name" class="compotent-grid-list-item-tip">{{i.name}}
                                                    </div>
                                                </div>
                                            </div>
                                        </el-carousel-item>
                                    </el-carousel>
                                </div>
                                <!-- 优惠券 -->
                                <div class="compotent-item-container-item compotent-item-container-item-padding" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='coupons' && compotent.content && compotent.content.timeData">
                                    <!-- 有数据 -->
                                    <div class="coupons-box"
                                        v-if="compotent.content.timeData && compotent.content.timeData.length>0">
                                        <el-carousel trigger="click" height="84px" :autoplay="false">
                                            <el-carousel-item v-for="it in compotent.content.timeData" :key="it">
                                                <div class="coupons-box-item" style="position: relative;">
                                                    <img style="position: absolute;z-index: -1;"
                                                        src="/assets/addons/shopro/img/decorate/coupon_bg1.png" alt=""
                                                        srcset="">
                                                    <div class="coupons-item-1">
                                                        <div><span>￥</span><span
                                                                class="coupons-amount">{{it.amount}}</span><span
                                                                class="coupons-name">{{it.name}}</span></div>
                                                        <div class="coupons-enough">满{{it.enough}}可用</div>
                                                    </div>
                                                    <div class="coupons-item-2">
                                                        <div class="coupons-get">立即领取</div>
                                                        <div class="coupons-stock">仅剩{{it.stock}}张</div>
                                                    </div>

                                                </div>
                                            </el-carousel-item>
                                        </el-carousel>
                                    </div>
                                    <!-- 无数据 -->
                                    <el-image v-if="compotent.content.timeData && compotent.content.timeData.length==0"
                                        src="/assets/addons/shopro/img/decorate/coupons_bg.png" fit="contain">
                                    </el-image>
                                </div>
                                <!-- 拼团 -->
                                <div class="compotent-item-container-item compotent-item-container-item-padding" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='groupon' && compotent.content && compotent.content.timeData">
                                    <div class="activity-box"
                                        v-if="compotent.content.timeData && compotent.content.timeData.length>0">
                                        <template>
                                            <div class="activity-header">
                                                <div class="activity-header-tip">
                                                    {{compotent.content.name}}
                                                </div>
                                                <div class="activity-more">更多<i
                                                        class="el-icon-arrow-right activity-more-icon"></i></div>
                                            </div>
                                            <div class="activity-body">
                                                <div class="activity-item" v-for="it in compotent.content.timeData">
                                                    <div class="activity-item-img">
                                                        <img class="label-auto" :src="Fast.api.cdnurl(it.image)">
                                                        <div class="team_num">{{compotent.content.team_num}}人团</div>
                                                    </div>
                                                    <div class="activity-price">
                                                        ￥{{it.price}}
                                                    </div>
                                                    <div class="activity-originalprice">￥{{it.original_price}}</div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                    <el-image v-if="compotent.content.timeData && compotent.content.timeData.length==0"
                                        src="/assets/addons/shopro/img/decorate/groupon_bg.png" fit="contain">
                                    </el-image>
                                </div>
                                <!-- 秒杀 -->
                                <div class="compotent-item-container-item compotent-item-container-item-padding" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='seckill' && compotent.content && compotent.content.timeData">
                                    <div class="activity-box"
                                        v-if="compotent.content.timeData && compotent.content.timeData.length>0">
                                        <template>
                                            <div class="activity-header">
                                                <div class="activity-header-tip">
                                                    {{compotent.content.name}}
                                                </div>
                                                <div class="activity-more">更多<i
                                                        class="el-icon-arrow-right activity-more-icon"></i></div>
                                            </div>
                                            <div class="activity-body">
                                                <div class="activity-item" v-for="it in compotent.content.timeData">
                                                    <div class="activity-item-img">
                                                        <img class="label-auto" :src="Fast.api.cdnurl(it.image)">
                                                    </div>
                                                    <div class="activity-price">
                                                        ￥{{it.price}}
                                                    </div>
                                                    <div class="activity-originalprice">￥{{it.original_price}}</div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                    <el-image v-if="compotent.content.timeData && compotent.content.timeData.length==0"
                                        src="/assets/addons/shopro/img/decorate/secKill_bg.png" fit="contain">
                                    </el-image>
                                </div>
                                <!-- 直播 -->
                                <div class="compotent-item-container-item compotent-item-container-item-padding" :class="index==centerSelect?'selected':''"
                                    v-if="compotent.type=='live' && compotent.content && compotent.content.timeData">
                                    <div class="live-box"
                                        v-if="compotent.content.timeData && compotent.content.timeData.length>0">
                                        <template>
                                            <div class="activity-header">
                                                <div class="activity-header-tip">
                                                    {{compotent.content.name}}
                                                </div>
                                                <div class="activity-more">更多<i
                                                        class="el-icon-arrow-right activity-more-icon"></i></div>
                                            </div>
                                            <div class="live-body">
                                                <div class="live-item" v-for="(it,idx) in compotent.content.timeData"
                                                    v-if="compotent.content.style>idx"
                                                    :style="{width:compotent.content.style==1?'100%':'50%'}">
                                                    <div style="width: 100%;position: relative;height: 140px;border-radius: 10px;
                                                overflow: hidden;">
                                                        <div
                                                            style="position: absolute;background: rgba(0,0,0,0.3);width:70px;border-radius: 10px;height: 20px;line-height: 20px;top:10px;left: 5px;">
                                                            <i class="el-icon-video-play"></i><span
                                                                style="margin-left: 6px;color:#fff">{{it.live_status_text}}</span>
                                                        </div>
                                                        <img class="label-auto" :src="Fast.api.cdnurl(it.share_img)">
                                                        <div class="live-name"
                                                            style="position: absolute;bottom: 20px;left: 20px;color: #fff;">
                                                            {{it.name}}</div>

                                                    </div>
                                                    <div style="height: 30px;
                                            line-height: 30px;text-align:left;padding:0 10px">
                                                        {{it.anchor_name}}
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                    <el-image v-if="compotent.content.timeData && compotent.content.timeData.length==0"
                                        src="/assets/addons/shopro/img/decorate/live_bg.png" fit="contain">
                                    </el-image>
                                </div>
                                <div class="undraggable" :class="index==centerSelect?'selected':''" v-if="compotent.type=='user'">
                                    <div style="position: relative;height: 160px;"
                                        v-if="compotent.content.style==2">
                                        <img style="position: absolute;left:0"
                                            src="/assets/addons/shopro/img/decorate/user_bg.png">
                                        <img v-if="compotent.content.image" :src="Fast.api.cdnurl(compotent.content.image)" />
                                    </div>
                                    <img :style="{background:compotent.content.color}"
                                        src="/assets/addons/shopro/img/decorate/user_bg.png"
                                        v-if="compotent.content.style==1">
                                </div>
                                <div v-if="index==centerSelect && compotent.type!='user'"style="
                                        margin-left: 40px;
                                        color: rgb(255, 0, 0);
                                        cursor: pointer;
                                        position: absolute;
                                        right: 0px;
                                        top: 0px;
                                        width: 24px;
                                        height: 24px;
                                        border-radius: 12px;
                                        background: #eee;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;z-index:1000">
                                  <i class="el-icon-close" @click.stop="centerDel(index)"></i>  
                                </div>
                            </div>
                        </div>
                    </template>
                </draggable>
            </div>
            <div class="item decorate-center-container" :style="{height:isPageType=='tabbar'?'90%':'100%'}"
                v-if="isPageType=='tabbar'">
                <div class="tabbar-body-item" style="height: 60px;justify-content: center;"
                    :style="{background: templateData[0].content.bgcolor}">
                    <div v-for="(item,index) in templateData[0].content.list" :key="item.id"
                        :style="{width:(100/templateData[0].content.list.length)+'%'}"
                        @click.stop="tabbarSelected(index)">
                        <div style="height: 25px;margin-bottom: 6px;display: flex;
                            justify-content: center;
                            align-items: center;" v-if="templateData[0].content.style!=3">
                            <img style="width: 25px;height: 25px;" v-if="item.image && templateData[0].content.style!=3"
                                :src="item.selected?Fast.api.cdnurl(item.activeImage):Fast.api.cdnurl(item.image)" />
                        </div>
                        <div v-if="templateData[0].content.style==1 || templateData[0].content.style==3"
                            :style="{color:item.selected?templateData[0].content.activeColor:templateData[0].content.color}">
                            {{item.name}}</div>
                    </div>
                </div>
            </div>
            <div class="decorate-center-container" id="popupContainer" v-if="isPageType=='popup'">
                <div v-for="(item,index) in templateData" :key="item.id" class="board-item tabbar-body"
                    style="height: 100%;" @click.stop="showForm(index)">
                    <div class="tabbar-body-item" style="height: 100%;background:#999;overflow: hidden;">
                        <div style="position: relative;width: 292px;
                            height: 454px;">
                            <div v-for="(popup,idx) in item.content.list" @click="popupSelect(idx)">
                                <el-image
                                    style="width: 100%;
                                    height: 100%;background: #fff;position: absolute;border: 1px solid #e6e6e6;border-radius: 5px;"
                                    :style="{left:idx*20+'px',top:idx*20+'px','z-index':popupIndex==idx?2000:100}"
                                    :src="Fast.api.cdnurl(popup.image)" fit="contain">
                                    <div slot="error" class="image-slot">
                                        <i class="el-icon-picture-outline"></i>
                                    </div>
                                </el-image>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="decorate-center-container" id="float-button-box"
                style="position: relative;height: calc(100vh - 230px);overflow: hidden;"
                v-if="isPageType=='float-button'">
                <div id="float-button" style="display: flex;flex-direction: column;align-items: flex-end;">
                    <div style="display: flex;flex-direction: column;align-items: flex-end;">
                        <el-image v-for="(float,idx) in templateData[0].content.list" style="width: 30px;
                            height: 30px;border-radius: 15px;margin-bottom: 10px;"
                            :src="Fast.api.cdnurl(float.btnimage)" fit="contain">
                            <div slot="error" class="image-slot">
                                <i class="el-icon-picture-outline"></i>
                            </div>
                        </el-image>
                    </div>
                    <div @click.stop="isfloat = !isfloat">
                        <el-image style="width: 30px;
                                height: 30px;border-radius: 15px;"
                            :src="Fast.api.cdnurl(templateData[0].content.image)" fit="contain">
                            <div slot="error" class="image-slot">
                                <i class="el-icon-picture-outline"></i>
                            </div>
                        </el-image>
                    </div>
                </div>
            </div>
            <div class="decorate-body-buttom" v-if="fromtype=='shop'">
                <div v-for="(item,index) in pageTypeList" class="btn-common decorate-body-buttom-item"
                    :class="item.flag?'decorate-body-buttom-item-active':''" @click="selectType(item.type,index)">
                    {{item.name}}</div>
            </div>
        </div>
        <div class="right-container">
            <div class="decorate-right" v-if="centerSelect!=null">
                <div class="decorate-right-item item-title">
                    <img src="/assets/addons/shopro/img/decorate/search.png" v-if="templateForm.type=='search'" />
                    <img src="/assets/addons/shopro/img/decorate/banner.png" v-if="templateForm.type=='banner'" />
                    <img src="/assets/addons/shopro/img/decorate/menu.png" v-if="templateForm.type=='menu'" />
                    <img src="/assets/addons/shopro/img/decorate/adv.png" v-if="templateForm.type=='adv'" />
                    <img src="/assets/addons/shopro/img/decorate/goods-group.png"
                        v-if="templateForm.type=='goods-group'" />
                    <img src="/assets/addons/shopro/img/decorate/goods-list.png"
                        v-if="templateForm.type=='goods-list'" />
                    <img src="/assets/addons/shopro/img/decorate/coupon.png" v-if="templateForm.type=='coupons'" />
                    <img src="/assets/addons/shopro/img/decorate/groupon.png" v-if="templateForm.type=='groupon'" />
                    <img src="/assets/addons/shopro/img/decorate/secKill.png" v-if="templateForm.type=='seckill'" />
                    <img src="/assets/addons/shopro/img/decorate/live.png" v-if="templateForm.type=='live'" />
                    <img src="/assets/addons/shopro/img/decorate/tabbar.png" v-if="templateForm.type=='tabbar'" />
                    <img src="/assets/addons/shopro/img/decorate/nav-list.png" v-if="templateForm.type=='nav-list'" />
                    <img src="/assets/addons/shopro/img/decorate/grid-list.png" v-if="templateForm.type=='grid-list'" />
                    <img src="/assets/addons/shopro/img/decorate/rich-text.png" v-if="templateForm.type=='rich-text'" />
                    <img src="/assets/addons/shopro/img/decorate/title-block.png"
                        v-if="templateForm.type=='title-block'" />
                    <img src="/assets/addons/shopro/img/decorate/tabbar.png" v-if="templateForm.type=='nav-bg'" />
                    <img src="/assets/addons/shopro/img/decorate/popup.png" v-if="templateForm.type=='popup'" />
                    <img src="/assets/addons/shopro/img/decorate/float-button.png"
                        v-if="templateForm.type=='float-button'" />
                    <img src="/assets/addons/shopro/img/decorate/user.png" v-if="templateForm.type=='user'" />
                    <span class="item-title-span"
                        v-if="templateForm.type!='order-card' && templateForm.type!='wallet-card'">{{templateForm.name}}</span>
                </div>
                <div class="select-style" v-if="templateForm.type=='search'">
                    <el-row class="select-style-item-box">
                        <el-col :xs="6" :sm="6">
                            <div class="select-style-item-tip search-tip">
                                搜索词
                            </div>
                        </el-col>
                        <el-col :xs="16" :sm="16">
                            <div class="select-style-item-select">
                                <el-input v-model="templateForm.content" size="mini" placeholder="最多可输入六个字">
                                </el-input>
                            </div>
                        </el-col>
                    </el-row>

                </div>
                <!-- 轮播图 -->
                <div class="select-style" v-if="templateForm.type=='banner'">
                    <draggable :list="templateForm.content.list" v-bind="$attrs" :options="{animation:100}">
                        <div class="select-style-item" v-for="(item, index) in templateForm.content.list">
                            <el-row class="select-style-item-title">
                                <el-col :xs="12" :sm="12">
                                    <div class="select-style-item-tip">
                                        图片{{index+1}}
                                    </div>
                                </el-col>
                                <el-col :xs="12" :sm="12">
                                    <div class="detele-item">
                                        <i class="el-icon-error" @click.stop="rightDel(index)"></i>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        选择图片
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select input-select-inline">
                                        <img class="select-img image-border" :class="'bannerimg'+index"
                                            crossorigin="anonymous"
                                            :src="item.image?Fast.api.cdnurl(item.image):'/assets/addons/shopro/img/decorate/image-default.png'">
                                        <div class="btn-common margin-left-20 " @click="choosePicture('banner',index)">
                                            {{item.image?'重新选择':'选择图片'}}
                                        </div>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row style="margin: 10px 0;padding-left: 10px;color: #999;">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    建议尺寸:750*350
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        选择链接:
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <el-radio-group class="item-radio-group" v-model="item.path_type"
                                            @change="isweblink('banner',index)">
                                            <el-radio :label="1">系统链接</el-radio>
                                            <el-radio :label="2">外部链接</el-radio>
                                        </el-radio-group>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    <div class="select-style-item-select" v-if="item.path_type==1">
                                        <div class="btn-common choosePath" :data-index="index">
                                            选择链接
                                        </div>
                                        <span class="margin-left-20 one-ellipsis">{{item.path_name}}</span>
                                    </div>
                                    <div class="select-style-item-select" v-if="item.path_type==2">
                                        <el-input v-model="item.path" size="mini" placeholder="http(s)://"></el-input>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        背景颜色
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select input-select-inline">
                                        <el-input v-model="item.bgcolor" size="mini"></el-input>
                                        <el-color-picker v-model="item.bgcolor" size="mini"></el-color-picker>
                                    </div>
                                </el-col>
                            </el-row>
                        </div>
                    </draggable>
                    <div class="select-style-item-tip">
                        <div @click.stop="addForm('banner')" class="btn-common">
                            添加
                        </div>
                    </div>
                </div>
                <!-- 菜单组 -->
                <div class="select-style" v-if="templateForm.type=='menu'">
                    <el-row class="select-style-item-box" style="margin: 0 0 16px;">
                        <el-col :xs="6" :sm="6">
                            <div class="select-style-item-tip radio-tip">
                                样式选择
                            </div>
                        </el-col>
                        <el-col :xs="16" :sm="16">
                            <div class="select-style-item-select">
                                <el-radio-group class="item-radio-group" v-model="templateForm.content.style">
                                    <el-radio :label="4">4列</el-radio>
                                    <el-radio :label="5">5列</el-radio>
                                </el-radio-group>
                            </div>
                        </el-col>
                    </el-row>
                    <draggable :list="templateForm.content.list" v-bind="$attrs" :options="{animation:200}">
                        <div class="select-style-item" v-for="(item, index) in templateForm.content.list">
                            <el-row class="select-style-item-title">
                                <el-col :xs="12" :sm="12">
                                    <div class="select-style-item-tip">
                                        图片{{index+1}}
                                    </div>
                                </el-col>
                                <el-col :xs="12" :sm="12">
                                    <div class="detele-item">
                                        <i class="el-icon-error" @click.stop="rightDel(index)"></i>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        菜单标题
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <el-input placeholder="最多4个文字" size="mini" v-model="item.name" maxlength="4">
                                        </el-input>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        选择图片
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <img class="select-img select-imgzheng image-border"
                                            :src="item.image?Fast.api.cdnurl(item.image):'/assets/addons/shopro/img/decorate/image-default2.png'">
                                        <div class="btn-common margin-left-20 choosePicture" :data-index="index">
                                            {{item.image?'重新选择':'选择图片'}}
                                        </div>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row style="margin: 10px 0;padding-left: 10px;color: #999;">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    建议尺寸:88x88
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        选择链接:
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <el-radio-group class="item-radio-group" v-model="item.path_type"
                                            @change="isweblink('menu',index)">
                                            <el-radio :label="1">系统链接</el-radio>
                                            <el-radio :label="2">外部链接</el-radio>
                                        </el-radio-group>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    <div class="select-style-item-select" v-if="item.path_type==1">
                                        <div class="btn-common choosePath" :data-index="index">
                                            选择链接
                                        </div>
                                        <span class="margin-left-20 one-ellipsis">{{item.path_name}}</span>
                                    </div>
                                    <div class="select-style-item-select" v-if="item.path_type==2">
                                        <el-input v-model="item.path" size="mini" placeholder="http(s)://"></el-input>
                                    </div>
                                </el-col>
                            </el-row>
                        </div>
                    </draggable>
                    <div class="select-style-item-tip">
                        <div @click.stop="addForm('menu')" class="btn-common">
                            添加
                        </div>
                    </div>
                </div>
                <!-- 广告魔方 -->
                <div class="select-style" v-if="templateForm.type=='adv'">
                    <div class="select-style-con">
                        <img :src="advStyleImage[templateForm.content.style - 1].src">
                        <div class="chooseAdvPic" @click.stop="chooseAdvPic">
                            选择风格
                        </div>
                    </div>
                    <div class="select-style-item" v-for="(item, index) in templateForm.content.list">
                        <div class="select-style-item-title">
                            图片{{index+1}}:
                        </div>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    选择图片:
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <img class="select-img image-border"
                                        :src="item.image?Fast.api.cdnurl(item.image):'/assets/addons/shopro/img/decorate/image-default.png'">
                                    <div class="btn-common margin-left-20 choosePicture" :data-index="index">
                                        {{item.image?'重新选择':'选择图片'}}
                                    </div>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    选择链接:
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <el-radio-group class="item-radio-group" v-model="item.path_type"
                                        @change="isweblink('adv',index)">
                                        <el-radio :label="1">系统链接</el-radio>
                                        <el-radio :label="2">外部链接</el-radio>
                                    </el-radio-group>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="16" :sm="16" :offset="6">
                                <div class="select-style-item-select" v-if="item.path_type==1">
                                    <div class="btn-common choosePath" :data-index="index">
                                        选择链接
                                    </div>
                                    <span class="margin-left-20 one-ellipsis">{{item.path_name}}</span>
                                </div>
                                <div class="select-style-item-select" v-if="item.path_type==2">
                                    <el-input v-model="item.path" size="mini" placeholder="http(s)://"></el-input>
                                </div>
                            </el-col>
                        </el-row>
                    </div>
                </div>
                <div class="select-style" v-if="templateForm.type=='goods-group'">
                    <div class="select-style-item">
                        <div class="select-style-item-title">
                            商品分类
                        </div>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip tip-line">
                                    选择分类:
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select input-select-inline">
                                    <el-input size="mini" v-model="templateForm.content.category_name" disabled>
                                    </el-input>
                                    <div class="btn-common input-select-btn" @click="operation('goods-group')">
                                        选择
                                    </div>
                                </div>
                            </el-col>
                        </el-row>
                    </div>
                </div>
                <!-- 自定义菜单 -->
                <div class="select-style" v-if="templateForm.type=='goods-list'">
                    <div class="select-style-item">
                        <div class="select-style-item-title">
                            商品列表
                        </div>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip tip-line">
                                    选择商品:
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select input-select-inline">
                                    <el-input size="mini" v-model="templateForm.content.ids" disabled>
                                    </el-input>
                                    <div class="btn-common input-select-btn" @click="operation('goods-list')">
                                        选择
                                    </div>
                                </div>
                            </el-col>
                        </el-row>
                        <div style="display: flex;flex-wrap: wrap;padding-left: 15px;padding-top: 16px;"
                            v-if="templateData[centerSelect].content.timeData">
                            <draggable style="display: flex;flex-wrap: wrap;"
                                :list="templateData[centerSelect].content.timeData" v-bind="$attrs"
                                :options="{animation:100}">

                                <div style="width: 40px;
                            height: 40px;
                            border-radius: 3px;margin-bottom: 10px;margin-right: 10px;position: relative;"
                                    v-for="(item,index) in templateData[centerSelect].content.timeData">
                                    <el-image class="image-border" style="width: 100%;height: 100%;"
                                        :src="Fast.api.cdnurl(item.image)" fit="contain">
                                        <div slot="error" class="image-slot">
                                            <i class="el-icon-picture-outline"></i>
                                        </div>
                                    </el-image>
                                    <i style="position: absolute;width: 12px;
                            height: 12px;right: -6px;top: -6px;color: #7438D5;" class="el-icon-error"
                                        @click="customList(index)"></i>
                                </div>
                            </draggable>

                        </div>
                    </div>
                </div>
                <div class="select-style" v-if="templateForm.type=='coupons'">
                    <div class="select-style-item">
                        <div class="select-style-item-title">
                            优惠券
                        </div>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip tip-line">
                                    选择优惠券
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select input-select-inline">
                                    <el-input size="mini" v-model="templateForm.content.ids" disabled>
                                    </el-input>
                                    <div class="btn-common input-select-btn" @click="operation('coupons')">
                                        选择
                                    </div>
                                </div>
                            </el-col>
                        </el-row>
                    </div>
                </div>
                <!-- 拼团 -->
                <div class="select-style" v-if="templateForm.type=='groupon'">
                    <div class="select-style-item">
                        <div class="select-style-item-title">
                            拼团
                        </div>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip search-tip">
                                    拼团名称
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <el-input v-model="templateForm.content.name" size="mini"></el-input>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip tip-line">
                                    拼团列表
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select input-select-inline">
                                    <el-input size="mini" v-model="templateForm.content.groupon_name" disabled>
                                    </el-input>
                                    <div class="btn-common input-select-btn" @click="operation('groupon')">
                                        选择
                                    </div>
                                </div>
                            </el-col>
                        </el-row>
                    </div>
                </div>
                <!-- 秒杀 -->
                <div class="select-style" v-if="templateForm.type=='seckill'">
                    <div class="select-style-item">
                        <div class="select-style-item-title">
                            秒杀
                        </div>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip search-tip">
                                    秒杀名称
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <el-input v-model="templateForm.content.name" size="mini"></el-input>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip tip-line">
                                    秒杀列表
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select input-select-inline">
                                    <el-input size="mini" v-model="templateForm.content.seckill_name" disabled>
                                    </el-input>
                                    <div class="btn-common input-select-btn" @click="operation('seckill')">
                                        选择
                                    </div>
                                </div>
                            </el-col>
                        </el-row>
                    </div>
                </div>
                <!-- 直播 -->
                <div class="select-style" v-if="templateForm.type=='live'">
                    <el-row class="select-style-item-box box-radio">
                        <el-col :xs="6" :sm="6">
                            <div class="select-style-item-tip radio-tip">
                                样式选择
                            </div>
                        </el-col>
                        <el-col :xs="16" :sm="16">
                            <div class="select-style-item-select">
                                <el-radio-group class="item-radio-group" v-model="templateForm.content.style">
                                    <el-radio :label="1">1列</el-radio>
                                    <el-radio :label="2">2列</el-radio>
                                </el-radio-group>
                            </div>
                        </el-col>
                    </el-row>
                    <div class="select-style-item">
                        <div class="select-style-item-title">
                            直播
                        </div>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip search-tip">
                                    直播名称
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <el-input v-model="templateForm.content.name" size="mini"></el-input>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip tip-line">
                                    直播列表
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select input-select-inline">
                                    <el-input size="mini" v-model="templateForm.content.ids" disabled>
                                    </el-input>
                                    <div class="btn-common input-select-btn" @click="operation('live')">
                                        选择
                                    </div>
                                </div>
                            </el-col>
                        </el-row>
                    </div>
                </div>
                <!-- 底部导航 -->
                <div class="select-style" v-if="templateForm.type=='tabbar'">
                    <div class="select-style-item">
                        <el-row class="select-style-item-title">
                            <el-col :xs="12" :sm="12">
                                <div class="select-style-item-tip">
                                    样式选择
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    选择样式
                                </div>
                            </el-col>
                            <el-col :xs="18" :sm="18">
                                <div class="select-style-item-select">
                                    <el-radio-group class="item-radio-group" v-model="templateForm.content.style">
                                        <el-radio :label="1">图标+文字</el-radio>
                                        <el-radio :label="2">图标</el-radio>
                                        <el-radio :label="3">文字</el-radio>
                                    </el-radio-group>
                                </div>
                            </el-col>
                        </el-row>
                    </div>
                    <draggable :list="templateForm.content.list" v-bind="$attrs" :options="{animation:100}">
                        <div class="select-style-item" v-for="(item, index) in templateForm.content.list">
                            <el-row class="select-style-item-title">
                                <el-col :xs="12" :sm="12">
                                    <div class="select-style-item-tip">
                                        导航图片{{index+1}}
                                    </div>
                                </el-col>
                                <el-col :xs="12" :sm="12">
                                    <div class="detele-item">
                                        <i class="el-icon-error" @click.stop="rightDel(index)"></i>
                                    </div>
                                </el-col>
                            </el-row>
                            <div v-if="templateForm.content.style!=3">
                                <el-row class="select-style-item-box">
                                    <el-col :xs="6" :sm="6">
                                        <div class="select-style-item-tip">
                                            默认图片
                                        </div>
                                    </el-col>
                                    <el-col :xs="16" :sm="16">
                                        <div class="select-style-item-select">
                                            <img class="select-img select-imgzheng image-border"
                                                :src="item.image?Fast.api.cdnurl(item.image):'/assets/addons/shopro/img/decorate/image-default2.png'">
                                            <div class="btn-common margin-left-20 choosePicture" :data-index="index">
                                                {{item.image?'重新选择':'选择图片'}}
                                            </div>
                                        </div>
                                    </el-col>
                                </el-row>
                                <el-row class="select-style-item-box">
                                    <el-col :xs="6" :sm="6">
                                        <div class="select-style-item-tip">
                                            选中图片
                                        </div>
                                    </el-col>
                                    <el-col :xs="16" :sm="16">
                                        <div class="select-style-item-select">
                                            <img class="select-img select-imgzheng image-border"
                                                :src="item.activeImage?Fast.api.cdnurl(item.activeImage):'/assets/addons/shopro/img/decorate/image-default2.png'">
                                            <div class="btn-common margin-left-20 choosePicture" :data-index="index"
                                                :data-active="'active'">
                                                {{item.activeImage?'重新选择':'选择图片'}}
                                            </div>
                                        </div>
                                    </el-col>
                                </el-row>
                                <el-row style="margin: 10px 0;padding-left: 10px;color: #999;">
                                    <el-col :xs="16" :sm="16" :offset="6">
                                        建议尺寸:46x46
                                    </el-col>
                                </el-row>
                            </div>
                            <el-row class="select-style-item-box" v-if="templateForm.content.style!=2">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        图标名称
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <el-input placeholder="最多4个文字" maxlength="4" size="mini" v-model="item.name">
                                        </el-input>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        选择链接:
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <el-radio-group class="item-radio-group" v-model="item.path_type"
                                            @change="isweblink('tabbar',index)">
                                            <el-radio :label="1">系统链接</el-radio>
                                            <el-radio :label="2">外部链接</el-radio>
                                        </el-radio-group>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    <div class="select-style-item-select" v-if="item.path_type==1">
                                        <div class="btn-common choosePath" :data-index="index">
                                            选择链接
                                        </div>
                                        <span class="margin-left-20 one-ellipsis">{{item.path_name}}</span>
                                    </div>
                                    <div class="select-style-item-select" v-if="item.path_type==2">
                                        <el-input v-model="item.path" size="mini" placeholder="必须填写http(s)://">
                                        </el-input>
                                    </div>
                                </el-col>
                            </el-row>
                        </div>
                    </draggable>
                    <div class="select-style-item-tip" v-if="templateForm.content.list.length<5">
                        <div @click.stop="addForm('tabbar')" class="btn-common">
                            添加
                        </div>
                    </div>
                    <div class="select-style-item" v-if="templateForm.content.style!=2">
                        <el-row class="select-style-item-title">
                            <el-col :xs="12" :sm="12">
                                <div class="select-style-item-tip">
                                    文字颜色
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    默认颜色
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <p class="select-color">
                                        <el-input placeholder="" size="mini" v-model="templateForm.content.color">
                                        </el-input>
                                        <el-color-picker v-model="templateForm.content.color" size="small">
                                        </el-color-picker>
                                    </p>

                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    选中颜色
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <p class="select-color">
                                        <el-input placeholder="" size="mini" v-model="templateForm.content.activeColor">
                                        </el-input>
                                        <el-color-picker v-model="templateForm.content.activeColor" size="small">
                                        </el-color-picker>
                                    </p>
                                </div>
                            </el-col>
                        </el-row>
                    </div>
                    <div class="select-style-item">
                        <el-row class="select-style-item-title">
                            <el-col :xs="12" :sm="12">
                                <div class="select-style-item-tip">
                                    背景颜色
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    默认颜色
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <p class="select-color">
                                        <el-input placeholder="" size="mini" v-model="templateForm.content.bgcolor">
                                        </el-input>
                                        <el-color-picker v-model="templateForm.content.bgcolor" size="small">
                                        </el-color-picker>
                                    </p>

                                </div>
                            </el-col>
                        </el-row>
                    </div>
                </div>
                <!-- 列表导航 -->
                <div class="select-style" v-if="templateForm.type=='nav-list'">
                    <draggable :list="templateForm.content.list" v-bind="$attrs" :options="{animation:100}">
                        <div class="select-style-item" v-for="(item, index) in templateForm.content.list">
                            <el-row class="select-style-item-title">
                                <el-col :xs="12" :sm="12">
                                    <div class="select-style-item-tip">
                                        列表{{index+1}}
                                    </div>
                                </el-col>
                                <el-col :xs="12" :sm="12">
                                    <div class="detele-item">
                                        <i class="el-icon-error" @click.stop="rightDel(index)"></i>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        选择图片
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <img class="select-img select-imgzheng image-border"
                                            :src="item.image?Fast.api.cdnurl(item.image):'/assets/addons/shopro/img/decorate/image-default2.png'">
                                        <div class="btn-common margin-left-20 choosePicture" :data-index="index">
                                            {{item.image?'重新选择':'选择图片'}}
                                        </div>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row style="margin: 10px 0;padding-left: 10px;color: #999;">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    建议尺寸:38x38
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        编辑标题
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <el-input placeholder="最多12个文字" size="mini" v-model="item.name" maxlength="12">
                                        </el-input>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        选择链接:
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <el-radio-group class="item-radio-group" v-model="item.path_type"
                                            @change="isweblink('nav-list',index)">
                                            <el-radio :label="1">系统链接</el-radio>
                                            <el-radio :label="2">外部链接</el-radio>
                                        </el-radio-group>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    <div class="select-style-item-select" v-if="item.path_type==1">
                                        <div class="btn-common choosePath" :data-index="index">
                                            选择链接
                                        </div>
                                        <span class="margin-left-20 one-ellipsis">{{item.path_name}}</span>
                                    </div>
                                    <div class="select-style-item-select" v-if="item.path_type==2">
                                        <el-input v-model="item.path" size="mini" placeholder="http(s)://"></el-input>
                                    </div>
                                </el-col>
                            </el-row>
                        </div>
                    </draggable>
                    <div class="select-style-item-tip">
                        <div @click.stop="addForm('nav-list')" class="btn-common">
                            添加
                        </div>
                    </div>
                </div>
                <!-- 宫格列表 -->
                <div class="select-style" v-if="templateForm.type=='grid-list'">
                    <draggable :list="templateForm.content.list" v-bind="$attrs" :options="{animation:100}">
                        <div class="select-style-item" v-for="(item, index) in templateForm.content.list">
                            <el-row class="select-style-item-title">
                                <el-col :xs="12" :sm="12">
                                    <div class="select-style-item-tip">
                                        列表图片{{index+1}}
                                    </div>
                                </el-col>
                                <el-col :xs="12" :sm="12">
                                    <div class="detele-item">
                                        <i class="el-icon-error" @click.stop="rightDel(index)"></i>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        选择图片
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <img class="select-img select-imgzheng image-border"
                                            :src="item.image?Fast.api.cdnurl(item.image):'/assets/addons/shopro/img/decorate/image-default2.png'">
                                        <div class="btn-common margin-left-20 choosePicture" :data-index="index">
                                            {{item.image?'重新选择':'选择图片'}}
                                        </div>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        编辑标题
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <el-input placeholder="最多4个文字" size="mini" v-model="item.name" maxlength="4">
                                        </el-input>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        选择链接:
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <el-radio-group class="item-radio-group" v-model="item.path_type"
                                            @change="isweblink('grid-list',index)">
                                            <el-radio :label="1">系统链接</el-radio>
                                            <el-radio :label="2">外部链接</el-radio>
                                        </el-radio-group>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    <div class="select-style-item-select" v-if="item.path_type==1">
                                        <div class="btn-common choosePath" :data-index="index">
                                            选择链接
                                        </div>
                                        <span class="margin-left-20 one-ellipsis">{{item.path_name}}</span>
                                    </div>
                                    <div class="select-style-item-select" v-if="item.path_type==2">
                                        <el-input v-model="item.path" size="mini" placeholder="http(s)://"></el-input>
                                    </div>
                                </el-col>
                            </el-row>
                        </div>
                    </draggable>
                    <div class="select-style-item-tip">
                        <div @click.stop="addForm('grid-list')" class="btn-common">
                            添加
                        </div>
                    </div>
                </div>
                <!-- 富文本 -->
                <div class="select-style" v-if="templateForm.type=='rich-text'">
                    <div class="select-style-item">
                        <el-row class="select-style-item-title">
                            <el-col :xs="12" :sm="12">
                                <div class="select-style-item-tip">
                                    富文本
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    点击选择:
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <div class="btn-common chooseRichText">
                                        富文本
                                    </div>
                                    <span class="margin-left-20 one-ellipsis">{{templateForm.content.name}}</span>
                                </div>
                            </el-col>
                        </el-row>
                    </div>
                </div>
                <!-- 标题栏 -->
                <div class="select-style" v-if="templateForm.type=='title-block'">
                    <div class="select-style-item" :class="templateForm.content.style=='2'?'':'select-style-block'">
                        <el-row class="select-style-item-title">
                            <el-col :xs="24" :sm="24">
                                <div class="select-style-item-tip">
                                    装饰<span style="margin: 10px 0;padding-left: 10px;color: #999;">(建议尺寸:710x84)</span>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="title-block-body">
                            <div v-if="templateForm.content.style_type">
                                <div class="compotent-title-block-container">
                                    <div class="title-block-title" :style="{color:templateForm.content.color}">
                                        {{templateForm.content.name}}
                                    </div>
                                    <img class="title-block-style"
                                        :src="titleBlock.data[templateForm.content.style_type-1].src"
                                        :style="{margin:0}">
                                </div>
                                <div class="title-block-btn" @click="selectTitleBlock(null)">
                                    选择样式
                                </div>
                            </div>
                            <div v-else>
                                <div v-if="!templateForm.content.image">
                                    <div v-for="(it,idx) in titleBlock.data" class="compotent-title-block-container"
                                        @click="selectTitleBlock(idx)">
                                        <div class="title-block-title" :style="{color:templateForm.content.color}">
                                            {{templateForm.content.name}}
                                        </div>
                                        <img class="title-block-style image-border" :src="Fast.api.cdnurl(it.src)"
                                            :style="{margin:idx==titleBlock.length-1?'0':''}">
                                    </div>
                                </div>
                                <div v-if="templateForm.content.image">
                                    <div class="compotent-title-block-container">
                                        <div class="title-block-title" :style="{color:templateForm.content.color}">
                                            {{templateForm.content.name}}
                                        </div>
                                        <img class="title-block-style image-border"
                                            :src="Fast.api.cdnurl(templateForm.content.image)">
                                    </div>
                                    <div class="title-block-btn" style="justify-content: space-around;display: flex;">
                                        <span @click="selectTitleBlock(null)">选择样式</span><span class="choosePicture"
                                            data-index="title-block">选择图片</span>
                                    </div>
                                </div>
                            </div>
                        </el-row>
                    </div>
                    <div class="select-style-item">
                        <el-row class="select-style-item-title">
                            <el-col :xs="12" :sm="12">
                                <div class="select-style-item-tip">
                                    文字
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    编辑标题
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <el-input placeholder="最多4个文字" maxlength="4" size="mini"
                                        v-model="templateForm.content.name">
                                    </el-input>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    颜色
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <p class="select-color">
                                        <el-input placeholder="" size="mini" v-model="templateForm.content.color">
                                        </el-input>
                                        <el-color-picker v-model="templateForm.content.color" size="small">
                                        </el-color-picker>
                                    </p>
                                </div>
                            </el-col>
                        </el-row>
                    </div>
                </div>
                <!-- 导航背景色 -->
                <div class="select-style" v-if="templateForm.type=='nav-bg'">
                    <div class="select-style-item">
                        <el-row class="select-style-item-title">
                            <el-col :xs="12" :sm="12">
                                <div class="select-style-item-tip">
                                    导航背景色
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    导航背景
                                </div>
                            </el-col>
                            <el-col :xs="18" :sm="18">
                                <div class="select-style-item-select">
                                    <el-radio-group class="item-radio-group" v-model="templateForm.content.style">
                                        <el-radio :label="1">色块</el-radio>
                                        <el-radio :label="2">图片</el-radio>
                                    </el-radio-group>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box" v-if="templateForm.content.style==1">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    修改颜色
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <p class="select-color">
                                        <el-input placeholder="" size="mini" v-model="templateForm.content.color">
                                        </el-input>
                                        <el-color-picker v-model="templateForm.content.color" size="small">
                                        </el-color-picker>
                                    </p>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box" v-if="templateForm.content.style=='2'">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    选择图片
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <img class="select-img image-border"
                                        :src="templateForm.content.image?Fast.api.cdnurl(templateForm.content.image):'/assets/addons/shopro/img/decorate/image-default.png'">
                                    <div class="btn-common margin-left-20 choosePicture" data-index="image">
                                        {{templateForm.content.image?'重新选择':'选择图片'}}
                                    </div>
                                </div>
                            </el-col>
                        </el-row>
                    </div>
                </div>
                <!-- 弹窗 -->
                <div class="select-style" v-if="templateForm.type=='popup'">
                    <draggable :list="templateForm.content.list" v-bind="$attrs" :options="{animation:100}">
                        <div class="select-style-item select-style-block"
                            v-for="(item, index) in templateForm.content.list">
                            <el-row class="select-style-item-title">
                                <el-col :xs="12" :sm="12">
                                    <div class="select-style-item-tip">
                                        弹窗设置{{index+1}}
                                    </div>
                                </el-col>
                                <el-col :xs="12" :sm="12">
                                    <div class="detele-item">
                                        <i class="el-icon-error" @click.stop="rightDel(index)"></i>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        弹窗图片
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <img class="select-img image-border"
                                            :src="item.image?Fast.api.cdnurl(item.image):'/assets/addons/shopro/img/decorate/image-default.png'">
                                        <div class="btn-common margin-left-20 choosePicture" :data-index="index">
                                            {{item.image?'重新选择':'选择图片'}}
                                        </div>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row style="margin: 10px 0;padding-left: 10px;color: #999;">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    建议尺寸:612x836
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        选择链接:
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <el-radio-group class="item-radio-group" v-model="item.path_type"
                                            @change="isweblink(index)">
                                            <el-radio :label="1">系统链接</el-radio>
                                            <el-radio :label="2">外部链接</el-radio>
                                        </el-radio-group>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    <div class="select-style-item-select" v-if="item.path_type==1">
                                        <div class="btn-common choosePath" :data-index="index">
                                            选择链接
                                        </div>
                                        <span class="margin-left-20 one-ellipsis">{{item.path_name}}</span>
                                    </div>
                                    <div class="select-style-item-select" v-if="item.path_type==2">
                                        <el-input v-model="item.path" size="mini" placeholder="http(s)://"></el-input>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        展示页面
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <div class="btn-common choosePath" :data-index="index" :data-page="'page'"
                                            :data-multiple="true">
                                            选择页面
                                        </div>
                                        <span class="margin-left-20 one-ellipsis">{{item.page.join(',')}}</span>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        显示类型
                                    </div>
                                </el-col>
                                <el-col :xs="18" :sm="18">
                                    <div class="select-style-item-select">
                                        <el-radio-group class="item-radio-group" v-model="item.style">
                                            <el-radio :label="1">仅首次</el-radio>
                                            <el-radio :label="2">多次</el-radio>
                                        </el-radio-group>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row v-if="item.style==1" style="margin: 10px 0;padding-left: 10px;color: #999;">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    进入商城只显示一次广告弹窗，再次进入商城依旧显示一次
                                </el-col>
                            </el-row>
                            <el-row v-if="item.style==2" style="margin: 10px 0;padding-left: 10px;color: #999;">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    每次进入该商城页面显示广告弹窗
                                </el-col>
                            </el-row>

                        </div>
                    </draggable>
                    <div class="select-style-item-tip">
                        <div @click.stop="addForm('popup')" class="btn-common">
                            添加
                        </div>
                    </div>
                </div>
                <!-- 个人中心头部 -->
                <div class="select-style" v-if="templateForm.type=='user'">
                    <div class="select-style-item">
                        <el-row class="select-style-item-title">
                            <el-col :xs="12" :sm="12">
                                <div class="select-style-item-tip">
                                    导航背景色
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    导航背景
                                </div>
                            </el-col>
                            <el-col :xs="18" :sm="18">
                                <div class="select-style-item-select">
                                    <el-radio-group class="item-radio-group" v-model="templateForm.content.style">
                                        <el-radio :label="1">色块</el-radio>
                                        <el-radio :label="2">图片</el-radio>
                                    </el-radio-group>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box" v-if="templateForm.content.style==1">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    修改颜色
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <p class="select-color">
                                        <el-input placeholder="" size="mini" v-model="templateForm.content.color">
                                        </el-input>
                                        <el-color-picker v-model="templateForm.content.color" size="small">
                                        </el-color-picker>
                                    </p>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box" v-if="templateForm.content.style=='2'">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    选择图片
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <img class="select-img image-border"
                                        :src="templateForm.content.image?Fast.api.cdnurl(templateForm.content.image):'/assets/addons/shopro/img/decorate/image-default.png'">
                                    <div class="btn-common margin-left-20 choosePicture" data-index="image">
                                        {{templateForm.content.image?'重新选择':'选择图片'}}
                                    </div>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row style="margin: 10px 0;padding-left: 10px;color: #999;">
                            <el-col :xs="16" :sm="16" :offset="6">
                                建议尺寸:750x320
                            </el-col>
                        </el-row>
                    </div>
                </div>
                <div class="select-style" v-if="templateForm.type=='float-button'">
                    <div class="select-style-item">
                        <el-row class="select-style-item-title">
                            <el-col :xs="12" :sm="12">
                                <div class="select-style-item-tip">
                                    按钮图片
                                </div>
                            </el-col>
                        </el-row>
                        <el-row class="select-style-item-box">
                            <el-col :xs="6" :sm="6">
                                <div class="select-style-item-tip">
                                    按钮图片
                                </div>
                            </el-col>
                            <el-col :xs="16" :sm="16">
                                <div class="select-style-item-select">
                                    <img class="select-img select-imgzheng image-border"
                                        :src="templateForm.content.image?Fast.api.cdnurl(templateForm.content.image):'/assets/addons/shopro/img/decorate/image-default2.png'">
                                    <div class="btn-common margin-left-20 choosePicture" data-index="image">
                                        {{templateForm.content.image?'重新选择':'选择图片'}}
                                    </div>
                                </div>
                            </el-col>
                        </el-row>
                        <el-row style="margin: 10px 0;padding-left: 10px;color: #999;">
                            <el-col :xs="16" :sm="16" :offset="6">
                                建议尺寸:80x80
                            </el-col>
                        </el-row>
                    </div>
                    <draggable :list="templateForm.content.list" v-bind="$attrs" :options="{animation:100}">
                        <div class="select-style-item" v-for="(item, index) in templateForm.content.list">
                            <el-row class="select-style-item-title">
                                <el-col :xs="12" :sm="12">
                                    <div class="select-style-item-tip">
                                        按钮编辑{{index+1}}
                                    </div>
                                </el-col>
                                <el-col :xs="12" :sm="12">
                                    <div class="detele-item">
                                        <i class="el-icon-error" @click.stop="rightDel(index)"></i>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        图标名称
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <el-input placeholder="最多4个文字" size="mini" v-model="item.name" maxlength="4">
                                        </el-input>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        按钮图片
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <img class="select-img select-imgzheng image-border"
                                            :src="item.btnimage?Fast.api.cdnurl(item.btnimage):'/assets/addons/shopro/img/decorate/image-default2.png'">
                                        <div class="btn-common margin-left-20 choosePicture" :data-index="index"
                                            data-type="btn">
                                            {{item.image?'重新选择':'选择图片'}}
                                        </div>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row style="margin: 10px 0;padding-left: 10px;color: #999;">
                                <el-col :xs="16" :sm="16" :offset="6">
                                    建议尺寸:80x80
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        展示页面
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <div class="btn-common choosePath" :data-index="index" :data-page="'page'"
                                            :data-multiple="true">
                                            选择页面
                                        </div>
                                        <span class="margin-left-20 one-ellipsis">{{item.page.join(',')}}</span>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        显示类型
                                    </div>
                                </el-col>
                                <el-col :xs="18" :sm="18">
                                    <div class="select-style-item-select">
                                        <el-radio-group class="item-radio-group" v-model="item.style">
                                            <el-radio :label="1">弹窗样式</el-radio>
                                            <el-radio :label="2">页面链接</el-radio>
                                        </el-radio-group>
                                    </div>
                                </el-col>
                            </el-row>
                            <el-row class="select-style-item-box" v-if="item.style==1">
                                <el-col :xs="6" :sm="6">
                                    <div class="select-style-item-tip">
                                        弹窗图片
                                    </div>
                                </el-col>
                                <el-col :xs="16" :sm="16">
                                    <div class="select-style-item-select">
                                        <img class="select-img image-border"
                                            :src="item.image?Fast.api.cdnurl(item.image):'/assets/addons/shopro/img/decorate/image-default.png'">
                                        <div class="btn-common margin-left-20 choosePicture" :data-index="index">
                                            {{item.image?'重新选择':'选择图片'}}
                                        </div>
                                    </div>
                                </el-col>
                            </el-row>
                            <div v-if="item.style==2">
                                <el-row class="select-style-item-box">
                                    <el-col :xs="6" :sm="6">
                                        <div class="select-style-item-tip">
                                            选择链接:
                                        </div>
                                    </el-col>
                                    <el-col :xs="16" :sm="16">
                                        <div class="select-style-item-select">
                                            <el-radio-group class="item-radio-group" v-model="item.path_type"
                                                @change="isweblink(index)">
                                                <el-radio :label="1">系统链接</el-radio>
                                                <el-radio :label="2">外部链接</el-radio>
                                            </el-radio-group>
                                        </div>
                                    </el-col>
                                </el-row>
                                <el-row class="select-style-item-box">
                                    <el-col :xs="16" :sm="16" :offset="6">
                                        <div class="select-style-item-select" v-if="item.path_type==1">
                                            <div class="btn-common choosePath" :data-index="index">
                                                选择链接
                                            </div>
                                            <span class="margin-left-20 one-ellipsis">{{item.path_name}}</span>
                                        </div>
                                        <div class="select-style-item-select" v-if="item.path_type==2">
                                            <el-input v-model="item.path" size="mini" placeholder="http(s)://">
                                            </el-input>
                                        </div>
                                    </el-col>
                                </el-row>
                            </div>
                        </div>
                    </draggable>
                    <div class="select-style-item-tip">
                        <div @click.stop="addForm('float-button')" class="btn-common">
                            添加
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 预览弹窗 -->
    <el-dialog title="模板预览" :visible="true" :before-close="previewClose" :class="previewDialog?'':'gg'" :modal="false">
        <div class="preview-body">
            <div class="web-preview">
                <iframe id="preview" :src="iframeSrc" frameborder="1" height="600px"></iframe>
            </div>
            <div class="code-preview">
                <div>
                    <div class="template-title">{{iframeTitle}}</div>
                    <div class="template-company">{{iframeCopyright[0]}}</div>
                    <div class="template-copyright">{{iframeCopyright[1]}}</div>
                    <div class="template-platform" v-if="iframePlatform">
                        <img v-for="i in iframePlatform.split(',')"
                            :src="'/assets/addons/shopro/img/decorate/'+i+'.png'">
                    </div>
                </div>
                <div class="wechart-code">
                    <div class="code-item"><img class="code-item-img" :src="Fast.api.cdnurl(qrcodeSrc)" /></div>
                    <div class="code-title">微信扫描二维码即可预览</div>
                </div>
            </div>
        </div>
    </el-dialog>
    <el-drawer title="选择样式" :visible.sync="advdrawer" :with-header="false" size="342px">
        <div style="display: flex;flex-wrap: wrap;padding:15px;">
            <el-row :gutter="10">
                <el-col :xs="12" :sm="12" v-for="(i,index) in advStyleImage">
                    <img style="margin:10px 0;width:154px;height: 100px;" :src="Fast.api.cdnurl(i.src)"
                        @click.stop="changeAdv(index,i.num)">
                </el-col>
            </el-row>
        </div>
    </el-drawer>
    <div class="save-dialog">
        <el-dialog title="保存中" :visible.sync="percentageshow" width="30%" :close-on-click-modal="false"
            :show-close="false">
            <div>
                <el-progress :percentage="percentage" :color="customColors"></el-progress>
            </div>
        </el-dialog>
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
