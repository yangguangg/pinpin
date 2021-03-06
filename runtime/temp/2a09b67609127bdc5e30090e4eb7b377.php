<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:94:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/notification/config.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
    #notification-index {
        font-family: Source Han Sans SC;
        color: #666;
        background: #fff;
        border-radius: 6px;
        padding: 0 20px 20px;
        font-size: 14px;
        overflow: auto;
    }

    /* .fans-body {
        height: calc(100vh - 280px);
    } */

    .common-btn {
        background: #7536D0;
        color: #fff;
        text-align: center;
        border-radius: 4px;
        width: 88px;
        cursor: pointer;
    }

    /* title */
    .title-tip {
        font-weight: 600;
        padding: 18px 0;
    }

    .title-opt {
        display: flex;
        justify-content: space-between;
        padding-bottom: 20px;
    }

    .title-opt .el-input__inner,
    .title-opt .el-input {
        height: 30px;
        line-height: 30px;
        width: 236px;
    }

    .title-opt .el-input__icon {
        line-height: 30px;
    }

    .sync-btn {
        width: 100px;
        height: 32px;
        line-height: 32px;
        font-size: 12px;
    }

    .view-btn {
        color: #7536D0;
        cursor: pointer;
    }

    .avatar-img {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 1px solid #E6E6E6;
    }

    .sex-img {
        width: 15px;
        height: 15px;
        margin: 0 20px;
    }

    /* footer */
    .fans-footer {
        padding-top: 20px;
        display: flex;
        justify-content: flex-end;
    }

    .el-pager li.active,
    .el-pager li:hover,
    .el-select-dropdown__item.selected {
        color: #7536D0;
    }

    .el-input__inner:hover,
    .el-input__inner:focus,
    .el-select .el-input.is-focus .el-input__inner,
    .el-select .el-input.is-hover .el-input__inner,
    .el-pagination__sizes .el-input .el-input__inner:hover {
        border-color: #7536D0;
    }

    /* table */
    .el-table td,
    .el-table th {
        border-right: none;
    }

    .el-table th {
        background: #F9F9F9;
        height: 40px;
        padding: 8px 0;
    }

    .el-table td {
        padding: 8px 0 9px;
    }

    .el-table .cell {
        padding-left: 20px !important;
        font-size: 13px;
        color: #444;
        font-weight: 500;
        text-align: center;
    }

    .table-head-tip {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .table-head-tip img {
        margin-right: 12px;
    }

    .tips {
        padding: 16px;
        border-radius: 5px;
        background-color: #F1EBFA;
        position: relative;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .tip-close {
        color: #7536D0;
        position: absolute;
        top: 16px;
        right: 16px;
    }

    .notification-btn {
        justify-content: flex-end;
        display: flex;
    }

    .notification-btn-1 {
        color: #7438D5;
        /* float: right; */
        line-height: 36px;
        background: #fff;
    }

    .notification-btn-2 {
        width: 90px;
        height: 36px;
        background: #7438D5;
        border-radius: 4px;
        font-size: 16px;
        color: #fff;
        line-height: 36px;
        border-radius: 18px;
        /* float: right; */
    }

    .add-btn {
        border: 1px solid #7438D5;
        border-radius: 4px;
        color: #7438D5;
        height: 32px;
        line-height: 30px;
        background: #fff;
        cursor: pointer;
    }

    .add-btn i {
        margin-right: 5px;
        color: #7438D5;
    }

    .notification-items {
        display: flex;
        align-items: center;
    }

    .div-body {
        /* border: 1px solid#E6E6E6; */
        border-bottom: none;
        margin: 20px 0 14px;
        max-height: 355px;
        overflow: auto;
    }
    .div-body-item{
        display: flex;align-items: center;height: 59px;
    }
    .first-item{
        width: 102px;
    }

    .table-item-with {
        width: 186px;
    }

    .el-dialog {
        width: 600px;
        height: 602px;
        border-radius:10px;
    }

    .display-flex {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .item-btn {
        border-radius: 4px;
        height: 32px;
        display: flex;
        width: 180px;
        
    }

    .wx-config {
        width: 80px;
        line-height: 32px;
        background: #04C261;
        text-align: center;
        color: #fff;
        cursor: pointer;
        border-radius: 4px 0 0 4px;
    }

    .wx-send {
        width: 130px;
        line-height: 32px;
        background: #EAFAF2;
        color: #04C261;
        text-align: center;
        font-size: 12px;
        border-radius: 0 4px 4px 0;
    }
    .wxmin-config{
        background: #6D74F0;
    }
    .wxmin-send{
        background: #ECEDFD;
        color: #6D74F0;
    }
    .note-config{
        background: #7536D0;
    }
    .note-send{
        background: #EDE5F9;
        color: #7536D0;
    }
    .email-config{
        background: #328AF7;
    }
    .email-send{
        background: #DEECFE;
        color: #328AF7;
    }
    .notification-titles{
        margin-right: 40px;
    }
    .el-dialog__title{
        font-size: 14px;
    }
    .el-dialog__body{
        font-size: 13px;
    }
    .el-dialog__headerbtn .el-dialog__close{
        font-size: 18px;
    }
    .el-dialog__headerbtn .el-dialog__close:hover{
        color: #7438D5;
    }
    .del-btn-field{
        width: 18px;
        height: 18px;
        margin-left: 14px;
        background: rgb(255, 89, 89);
        color: rgb(255, 255, 255);
        text-align: center;
        font-size: 12px;
        border-radius: 50%;
    }

    .div-body::-webkit-scrollbar{width:6px;}
    .div-body::-webkit-scrollbar-thumb{
        width:6px;
        background: #e6e6e6;
        height: 20px;
        border-radius: 3px;
    }

    .email-bodys::-webkit-scrollbar{width:6px;}
    .email-bodys::-webkit-scrollbar-thumb{
        width:6px;
        background: #e6e6e6;
        height: 20px;
        border-radius: 3px;
    }
    .email-bodys{
        overflow: auto;
        max-height: 420px;
        padding: 0 20px 20px;
    }
    .flex-1{
        flex: 1;
    }
    
    [v-cloak] {
        display: none
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<div id="notification-index" v-cloak>
    <div class="title">
        <div class="title-tip">
            模板消息
        </div>
        <div class="activity-tip color-444" v-if="tipCloseFlag">
            <div class="tips">
                <p><strong>使用说明</strong></p>
                <p>消息通知仅用于向用户发送重要的服务通知，只能用于符合其要求的服务场景中，如拼团成功通知，商品发货通知等。不支持广告等营销类消息以及其它所有可能对用户造成骚扰的消息。
                </p>
                <i class="el-icon-close tip-close" @click="tipClose"></i>
            </div>
        </div>
    </div>
    <div class="fans-body">
        <el-table :data="notificationData" border style="width: 100%">
            <el-table-column prop="name" label="消息类别" min-width="120">
            </el-table-column>
            <el-table-column min-width="340">
                <template slot="header" slot-scope="scope">
                    <div class="table-head-tip">
                        <img src="/assets/addons/shopro/img/notification/wxOfficialAccount.png">
                        <span>微信公众号</span>
                    </div>
                </template>
                <template slot-scope="scope">
                    <div class="notification-item-box display-flex">
                        <div class="item-btn">
                            <div class="wx-config" @click="edit(scope.$index,'wxOfficialAccount')">
                                编辑配置
                            </div>
                            <div class="wx-send">
                                已发送{{scope.row.wxOfficialAccount.sendnum}}次
                            </div>
                        </div>
                        <div class="display-flex">
                            <el-switch v-model="scope.row.wxOfficialAccount.status" active-color="#7536D0" inactive-color="#E6E6E6" :active-value="1" :inactive-value="0"
                                style="margin: 0 14px 0 20px;" @change="changeStatua(scope.row.wxOfficialAccount.platform,scope.row.wxOfficialAccount.event,scope.row.wxOfficialAccount.name,scope.row.wxOfficialAccount.status)">
                            </el-switch>
                            <div>
                                启用
                            </div>
                        </div>
                    </div>
                </template>
            </el-table-column>
            <el-table-column min-width="340">
                <template slot="header" slot-scope="scope">
                    <div class="table-head-tip">
                        <img src="/assets/addons/shopro/img/notification/wxMiniProgram.png">
                        <span>微信小程序</span>
                    </div>
                </template>
                <template slot-scope="scope">
                    <div class="notification-item-box display-flex">
                        <div class="item-btn">
                            <div class="wx-config wxmin-config" @click="edit(scope.$index,'wxMiniProgram')">
                                编辑配置
                            </div>
                            <div class="wx-send wxmin-send">
                                已发送{{scope.row.wxMiniProgram.sendnum}}次
                            </div>
                        </div>
                        <div class="display-flex">
                            <el-switch v-model="scope.row.wxMiniProgram.status" active-color="#7536D0" inactive-color="#E6E6E6" :active-value="1" :inactive-value="0"
                                style="margin: 0 14px 0 20px;" @change="changeStatua(scope.row.wxMiniProgram.platform,scope.row.wxMiniProgram.event,scope.row.wxMiniProgram.name,scope.row.wxMiniProgram.status)">
                            </el-switch>
                            <div>
                                启用
                            </div>
                        </div>
                    </div>
                </template>
            </el-table-column>
            <el-table-column min-width="340">
                <template slot="header" slot-scope="scope">
                    <div class="table-head-tip">
                        <img src="/assets/addons/shopro/img/notification/note.png">
                        <span>短信通知</span>
                    </div>
                </template>
                <template slot-scope="scope">
                    <div class="notification-item-box display-flex">
                        <div class="item-btn">
                            <div class="wx-config note-config" @click="edit(scope.$index,'sms')">
                                编辑配置
                            </div>
                            <div class="wx-send note-send">
                                已发送{{scope.row.sms.sendnum}}次
                            </div>
                        </div>
                        <div class="display-flex">
                            <el-switch v-model="scope.row.sms.status" active-color="#7536D0" inactive-color="#E6E6E6" :active-value="1" :inactive-value="0"
                                style="margin: 0 14px 0 20px;" @change="changeStatua(scope.row.sms.platform,scope.row.sms.event,scope.row.sms.name,scope.row.sms.status)">
                            </el-switch>
                            <div>
                                启用
                            </div>
                        </div>
                    </div>
                </template>
            </el-table-column>
            <el-table-column min-width="340">
                <template slot="header" slot-scope="scope">
                    <div class="table-head-tip">
                        <img src="/assets/addons/shopro/img/notification/email.png">
                        <span>邮件通知</span>
                    </div>
                </template>
                <template slot-scope="scope">
                    <div class="notification-item-box display-flex">
                        <div class="item-btn">
                            <div class="wx-config email-config" @click="edit(scope.$index,'email')">
                                编辑配置
                            </div>
                            <div class="wx-send email-send">
                                已发送{{scope.row.email.sendnum}}次
                            </div>
                        </div>
                        <div class="display-flex">
                            <el-switch v-model="scope.row.email.status" active-color="#7536D0" inactive-color="#E6E6E6" :active-value="1" :inactive-value="0"
                                style="margin: 0 14px 0 20px;" @change="changeStatua(scope.row.email.platform,scope.row.email.event,scope.row.email.name,scope.row.email.status)">
                            </el-switch>
                            <div>
                                启用
                            </div>
                        </div>
                    </div>
                </template>
            </el-table-column>
        </el-table>
    </div>
    <el-dialog title="配置" :visible.sync="notificationDialog" :before-close="notificationClose"
        width="600" :close-on-click-modal="false">
        <div class="notification-bodys">
            <div v-if="editPlatform!='email'">
                <div class="notification-items">
                    <div class="notification-titles">模板消息ID：</div>
                    <el-input type="text" style="width:436px" placeholder="请输入模板消息ID" v-model="notificationForm.template_id"
                        >
                    </el-input>
                </div>
                <div class="dialog-table-body">
                    <div class="div-body">
                        <div v-for="(item,index) in notificationForm.fields" class="div-body-item">
                            <div class="first-item">
                                <span v-if="item.field">{{item.name}}</span>
                                <el-input v-else v-model="item.name" placeholder="请输入名称"></el-input>
                            </div>
                            <div class="table-item-with" style="margin: 0 28px;">
                                <el-input v-model="item.template_field" placeholder="请输入模板字段"></el-input>
                            </div>
                            <div class="table-item-with">
                                <el-input v-model="item.value" placeholder="请输入默认值"></el-input>
                            </div>
                            <div v-if="!item.field" class="del-btn-field" @click.stop="fieldDel(index)">
                                <i class="fa fa-close"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="notification-items notification-footer">
                    <div class="common-btn add-btn" @click="addfield">
                        <i class="el-icon-plus"></i>添加
                    </div>
                </div>
            </div>
            <div class="email-bodys" v-if="editPlatform=='email'">
                
                <div v-for="(item,index) in notificationForm.fields" class="div-body-item">
                    <div class="first-item">
                        <span v-if="item.field">{{item.name}}</span>
                        <el-input v-else v-model="item.name" placeholder="请输入名称"></el-input>
                    </div>
                    <!-- <div class="table-item-with" style="margin: 0 28px;">
                        <el-input v-model="item.value" placeholder="请输入内容"></el-input>
                    </div> -->
                    <div class="table-item-with flex-1">
                        <el-input v-model="item.field" placeholder="请输入模板字段" readonly></el-input>
                    </div>
                    <div v-if="!item.field" class="del-btn-field" @click.stop="fieldDel(index)">
                        <i class="fa fa-close"></i>
                    </div>
                </div>
                <div style="color:#FF5959;margin-bottom:10px">请按照如下格式在文档中插入要显示的字段 p:{字段名}</div>
                <form id="add-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">
                    <div class="display-flex" style="align-items: flex-start;">
                        <div style="flex: 1;">
                            <textarea id="c-content" class="form-control editor" rows="5" name="row[content]" cols="50"></textarea>
                        </div>
                    </div>
                </form>

            </div>
            <div class="notification-items notification-btn">
                <div @click="notificationClose" class="common-btn notification-btn-1">取消</div>
                <div @click="notificationClose('yes')" class="common-btn notification-btn-2">确定</div>
            </div>
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
