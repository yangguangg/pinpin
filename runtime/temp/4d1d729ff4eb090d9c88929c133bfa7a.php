<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:98:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/activity/activity/index.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
    #activity-index {
        background: #fff;
        padding: 0 20px 30px;
        font-size: 14px;
        font-family: Source Han Sans SC;
        font-weight: 500;
    }

    label {
        margin: 0;
    }

    .color-444 {
        color: #444;
    }

    .color-666 {
        color: #444;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .activity-title {
        height: 50px;
        font-weight: 600;
    }

    .tips {
        padding: 16px;
        border-radius: 5px;
        background-color: #F1EBFA;
        position: relative;
        margin-bottom: 20px;
        font-size: 12px;
    }

    .tip-a,
    .tip-a:hover {
        color: #7536D0;
    }

    .tip-close {
        color: #7536D0;
        position: absolute;
        top: 16px;
        right: 16px;
    }

    .select-con {
        justify-content: space-between;
        font-size: 12px;
        margin-bottom: 14px;
    }

    .select-item {
        margin-right: 14px;
    }

    .recycle-activity {
        width: 98px;
        height: 32px;
        border-radius: 4px;
        border: 1px solid #444;
        color: #444;
        cursor: pointer;
        justify-content: center;
    }

    .recycle-activity i {
        margin-right: 8px;
        font-size: 16px;
    }

    .found-activity {
        width: 98px;
        height: 32px;
        background: #7536D0;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
        text-align: center;
        line-height: 32px;
        margin-left: 40px;
    }

    .choose-activity-goods,
    .choose-activity-method {
        background: #7536D0;
        border: none;
        color: #fff;
        height: 34px;
        line-height: 34px;
        padding: 0 20px;
        font-size: 13px;
    }

    .el-button:hover {
        background: #7536D0;
        border: none;
        color: #fff;
    }

    .el-button.is-disabled {
        border: 1px solid #EBEEF5;
    }

    .table-edit-btn {
        color: #7536D0;
        margin-right: 16px;
    }

    .table-view-btn {
        color: #7536D0;
        margin-right: 16px;
    }

    .table-delete-btn {
        color: #F54747;
    }

    .table-edit-btn:hover {
        color: #7536D0;
    }

    .table-view-btn:hover {
        color: #7536D0;
    }

    .table-delete-btn:hover {
        color: #F54747;
    }


    .el-table,
    .el-table thead {
        color: #444;
    }

    .el-table,
    .el-table thead .cell {
        font-weight: 500;

    }

    .el-table th {
        background: #F9F9F9;
    }

    .cell {
        text-align: center;
    }

    .el-select {
        width: 114px;
    }

    /* el-dialog */
    .table-good-status {
        color: #7536D0;
        margin-right: 14px;
    }

    .table-good-status-1 {
        color: #21D7AE;
    }

    .table-good-status-delete {
        color: #F54747;
    }

    .switch-flex {
        display: flex;
        align-items: center;
    }

    .switch-tip {
        margin: 0 16px;
    }

    .el-icon-question {
        font-size: 24px;
        color: #d5d5d5;

    }

    .popover-item {
        line-height: 42px;
        position: relative;
        top: 5px;
    }

    .dialog-submit {
        width: 88px;
        height: 36px;
        background: #F3EFFB;
        border: 1px solid #7536d0;
        color: #7536d0;
        position: absolute;
        right: 56px;
        border-radius: 20px;
        text-align: center;
        line-height: 36px;
    }

    .dialog-submit-gray {
        color: #999;
        border: 1px solid #999;
        background: #fff;
    }

    .el-radio-button__orig-radio:checked+.el-radio-button__inner {
        background-color: #7536d0;
        border-color: #7536d0;
        -webkit-box-shadow: -1px 0 0 0 #7536d0;
        box-shadow: -1px 0 0 0 #7536d0;
    }

    .el-radio-button__inner:hover {
        color: #666;
    }

    .el-input,
    .el-textarea,
    .el-date-editor--datetimerange.el-input,
    .el-date-editor--datetimerange.el-input__inner {
        max-width: 460px;
    }

    .el-date-editor--datetimerange.el-input__inner {
        width: 100%;
    }

    .el-dialog {
        width: 740px;
        margin-top: 10vh !important;
    }

    .el-dialog .cell {
        text-align: left;
    }

    .el-dialog__body {
        padding: 30px 52px 40px 52px;
    }

    .el-dialog .el-radio__input.is-checked+.el-radio__label {
        color: #7536d0;
    }

    .el-dialog .el-radio__input.is-checked .el-radio__inner {
        border-color: #7536d0;
        background: #7536d0;
    }

    .el-form-item__label {
        color: #666;
        font-weight: 500;
    }

    .el-dialog__header {
        padding: 16px 20px 16px;
        border-bottom: #D5D5D5 1px solid;
    }

    .el-input__inner::-webkit-input-placeholder,
    .el-input__inner::-moz-input-placeholder,
    .el-input__inner::-ms-input-placeholder {
        color: #C0C4CF;
    }

    .el-pager li.active,
    .el-pager li:hover {
        color: #7536d0;
    }

    .display-flex {
        display: flex;
        align-items: center;
    }

    .el-form-item__content .el-input__inner {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        /* border-right: 0; */
    }

    .el-form-item__content .choose-activity-method {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .el-form-item__content .el-button.is-disabled {
        background: #F5F7FA;
        color: #909399;
        border: 1px solid #DCDFE6;
    }

    .activityForm-auto {
        /* height: 592px;
        overflow: auto;*/
        padding-right: 44px;
    }

    .activityForm-auto::-webkit-scrollbar-track-piece {
        background-color: #f8f8f8;
    }

    .activityForm-auto::-webkit-scrollbar {
        width: 9px;
        height: 9px;
    }

    .activityForm-auto::-webkit-scrollbar-thumb {
        background-color: #dddddd;
        background-clip: padding-box;
        min-height: 28px;

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
    .el-table {
        font-size: 13px;
    }

    .el-table_1_column_1,
    .el-table_1_column_2,
    .el-table_1_column_3,
    .el-table_1_column_4,
    .el-table_1_column_5,
    .el-table_1_column_6,
    .el-table_1_column_7,
    .el-table_1_column_8 {
        border-right: none !important;
    }

    .el-table__fixed-right::before,
    .el-table__fixed::before {
        height: 0 !important;
    }

    .el-date-editor .el-range__icon,
    .el-date-editor .el-range-separator {
        line-height: 28px;
    }

    .page-container {
        justify-content: flex-end;
        margin-top: 30px;
    }

    .expand-item-commission-describe-image {
        width: 36px;
        height: 36px;
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 8px;
        border: 1px solid #e6e6e6;
    }

    .el-image,
    .image-slot {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .shopro-container-scrollbar::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    .shopro-container-scrollbar::-webkit-scrollbar-thumb {
        width: 6px;
        background: #ccc;
        height: 6px;
        border-radius: 3px;
    }
    .el-form-item__content {
        line-height: normal;
    }
    [v-cloak] {
        display: none;
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<div id="activity-index" v-cloak>
    <div class="activity-title color-444 display-flex">营销活动</div>
    <div class="activity-tip color-444" v-if="tipCloseFlag">
        <div class="tips">
            <p><strong>活动说明</strong></p>
            <p>1、为确保活动的可靠性，请务必配置 Redis <a class="tip-a" href="https://doc.fastadmin.net/shopro" target="_blank">查看文档</a>
            </p>
            <p>2、活动订单自动关闭时间 是为当前活动订单专门设置的超时未支付自动关闭时间，如果未设置，将使用系统订单自动关闭时间</p>
            <p>3、活动自动关闭时间 是当前活动结束后多长时间自动关闭，关闭的活动请在历史活动查看</p>
            <p>4、每人限购 不设置或者设置为 0 将不限制购买数量</p>
            <i class="el-icon-close tip-close" @click="tipClose"></i>
        </div>
    </div>
    <div class="activity-con">
        <div class="select-con display-flex">
            <div class="display-flex">
                <el-select class="select-item" v-model="activityName" placeholder="请选择" @change="selectChange">
                    <el-option v-for="item in activityOptions" :key="item.value" :label="item.label"
                        :value="item.value">
                    </el-option>
                </el-select>
                <el-radio-group v-model="statusName" @change="radioChange">
                    <el-radio-button label="全部"></el-radio-button>
                    <el-radio-button label="未开始"></el-radio-button>
                    <el-radio-button label="进行中"></el-radio-button>
                    <el-radio-button label="已结束"></el-radio-button>
                </el-radio-group>
                <div class="found-activity" @click="handleClick(null,'add')"><i class="el-icon-plus margin-right-5"></i>新建活动</div>
            </div>
            <div class="recycle-activity display-flex" @click="goRecycle">历史活动</div>
        </div>
        <div>
            <el-table :data="activityData" style="width: 100%" border>
                <el-table-column prop="id" label="ID" width="80">
                </el-table-column>
                <el-table-column prop="title" label="活动名称" width="140">
                </el-table-column>
                <el-table-column prop="goods_ids" label="商品组" min-width="200">
                    <template slot-scope="scope">
                        <div class="display-flex shopro-container-scrollbar" style="overflow: auto;">
                            <div v-for="(ite,gindex) in scope.row.goods">
                                <el-popover placement="bottom" trigger="hover" width="240">
                                    <div class="popover-container">
                                        <div class="display-flex" style="align-items: flex-start;">
                                            <div class="display-flex">
                                                <div class="popover-tip">商品ID</div>：
                                            </div>
                                            <div>{{ite.id}}</div>
                                        </div>
                                        <div class="display-flex" style="align-items: flex-start;">
                                            <div class="display-flex" style="flex-shrink: 0;">
                                                <div class="popover-tip">商品标题</div>：
                                            </div>
                                            <div>{{ite.title}}</div>
                                        </div>
                                    </div>
                                    <div class="expand-item-commission-describe-image" slot="reference"
                                        :style="{marginRight:gindex!=scope.row.goods.length-1?'6px':''}">
                                        <el-image :src="Fast.api.cdnurl(ite.image)" fit="contain">
                                            <div slot="error" class="image-slot">
                                                <i class="el-icon-picture-outline"></i>
                                            </div>
                                        </el-image>
                                    </div>
                                </el-popover>
                            </div>
                        </div>
                    </template>
                </el-table-column>
                <el-table-column prop="type" label="类型" width="160">
                    <template slot-scope="scope">
                        <span>{{filterActivityType(scope.row.type)}}</span>
                    </template>
                </el-table-column>
                <el-table-column prop="starttime_text" label="开始时间" width="200">
                </el-table-column>
                <el-table-column prop="endtime_text" label="结束时间" width="200">
                </el-table-column>
                <el-table-column prop="createtime" label="创建时间" width="200">
                    <template slot-scope="scope">
                        <span>{{moment(scope.row.createtime*1000).format('YYYY-MM-DD HH:mm:ss')}}</span>
                    </template>
                </el-table-column>
                <el-table-column prop="richtext_id" label="活动说明" width="80">
                </el-table-column>
                <el-table-column fixed="right" label="操作" width="100">
                    <template slot-scope="scope">
                        <span v-if="scope.row.status!='nostart'" class="table-view-btn cursor-pointer"
                            @click="handleClick(scope.row,'view')">查看
                        </span>
                        <span v-if="scope.row.status=='nostart'" class="table-edit-btn cursor-pointer"
                            @click="handleClick(scope.row,'edit')">编辑</span>
                        <span class="table-delete-btn cursor-pointer" @click="handleClick(scope.row,'delete')">删除</span>
                    </template>
                </el-table-column>
            </el-table>
        </div>
    </div>
    <div class="page-container display-flex">
        <el-pagination @size-change="handleSizeChange" @current-change="handleCurrentChange" :current-page="currentPage"
            :page-sizes="[10, 20, 30, 40]" :page-size="10" layout="total, sizes, prev, pager, next, jumper"
            :total="totalPage">
        </el-pagination>
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
