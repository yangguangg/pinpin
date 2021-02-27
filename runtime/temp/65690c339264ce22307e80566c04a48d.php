<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:89:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/decorate/lists.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
    #decorate-index {
        font-family: Source Han Sans SC;
        color: #fff;
        background: #fff;
        border-radius: 10px 10px 0px 0px;
        padding-bottom: 40px;
    }

    .btn-common {
        width: 100px;
        height: 36px;
        line-height: 36px;
        text-align: center;
        border: 1px solid #fff;
        border-radius: 4px;
        font-size: 12px;
        color: #fff;
        cursor: pointer;
        display: block;
    }

    .title {
        color: #444;
        height: 48px;
        line-height: 48px;
        padding: 0 22px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .temp-item {
        background: #F7F7FA;
        border-radius: 10px;
        padding: 0px 18px 20px 0;
        margin: 0 12px;
        display: flex;
        flex-wrap: wrap;
    }

    .create-item {
        min-width: 260px;
        height: 450px;
        background: #EAE6F6;
        border: 2px dashed #A57FF9;
        border-radius: 4px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        color: #A57FF9;
    }

    .create-item-btn {
        width: 40px;
        height: 40px;
        border: 2px solid #A57FF9;
        border-radius: 10px;
        font-size: 40px;
        line-height: 30px;
        text-align: center;
        margin-bottom: 20px;
        cursor: pointer;
    }

    .foreach-item {
        width: 260px;
        height: 450px;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 4px;
        padding: 0 12px;
        position: relative;
        overflow: hidden;
    }

    .temp-item-margin {
        margin-left: 18px;
        margin-top: 20px;
    }

    .item-mask {
        position: absolute;
        left: 0;
        top: 40px;
        width: 100%;
        min-width: 260px;
        height: 410px;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 4px;
        display: none;
    }

    .item-mask-body {
        height: 410px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0);
        flex-direction: column;
    }

    .foreach-item-title {
        font-size: 14px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .item-title-left {

        color: #444;
        cursor: pointer;
    }

    .item-title-left:hover {
        color: #7438D5;
    }

    .status-release {
        color: #7438D5;
    }

    .status-cancel {
        color: #FF6017;
    }

    .status-norelease {
        color: #666;
    }

    .item-hover:hover .item-mask {
        display: block;
    }

    .item-mask-item {
        margin-bottom: 20px;
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .item-mask-item:hover {
        background: #7438D5;
        border-color: #7438D5;
    }

    .item-mask-item img {
        margin-right: 12px;
    }

    .item-mask-item:last-child {
        margin-bottom: 0;
    }

    .item-mask-buy {
        background: #7438D5;
        border: none;
    }

    .temp-item-img {
        width: 236px;
        /* height: 408px; */
    }
    .temp-item-img img{
        width: 100%;
        height: 100%;
        border: none;
    }

    .temp-item-pla {
        color: #444;
        padding: 10px 0 12px;
        position: absolute;
        bottom: 0;
        width: 236px;
        background: #fff;
    }

    .el-dialog {
        width: 480px;
        height: 280px;
    }

    .el-dialog__header {
        border-radius: 10px 10px 0 0;
    }

    .create-items {
        display: flex;
        align-items: center;
        height: 46px;
    }

    .create-titles {
        width: 92px;
    }

    .create-btn {
        justify-content: flex-end;
    }

    .create-btn-1 {
        color: #7438D5;
    }

    .create-btn-2 {
        width: 88px;
        height: 36px;
        background: #7438D5;
        border-radius: 4px;
        /* font-size: 14px; */
        color: #fff;
    }
    .title-btns{
        display: flex;
        align-items: center;
        padding: 0 22px 20px;
    }

    .recycle-btn,.refresh-btn {
        width: 88px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #7438D5;
        border-radius: 4px;
        color: #7438D5;
    }
    .refresh-btn{
        margin-right: 20px;
        width: 32px;
        height: 32px;
    }
    .refresh-btn i {
        animation-duration:2s;
        animation-iteration-count: infinite
    }
    .refresh-btn .focusi {
        animation-name:go;
    }

    @keyframes go{
    0% {
    transform: rotateZ(0);
    }
    100% {transform: rotateZ(360deg); }
}

.recycle-btn {
    width: 88px;
    color: #444;
    border: #444 1px solid;
    height: 32px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.recycle-btn i {
    margin-right: 6px;
    font-size: 14px;
}

    .el-checkbox__input.is-checked .el-checkbox__inner {
        background-color: #7438D5;
        border-color: #7438D5;
    }

    .el-checkbox__input.is-checked+.el-checkbox__label {
        color: #7438D5;
    }

    .el-checkbox {
        margin-right: 20px;
    }

    .display-flex {
        display: flex;
    }

    .tip {
        display: block;
        width: 68px;
        text-align: justify;
        text-align-last: justify;
    }
    .el-button--primary,.el-button--primary:hover {
        color: #FFF;
        background-color: #7438D5 !important;
        border-color: #7438D5 !important;
    }
    [v-cloak] {
        display: none
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<div id="decorate-index" v-cloak>
    <div class="my-template">
        <div class="title">
            <div>模板管理</div>
        </div>
        <div class="title-btns">
                <div class="btn-common refresh-btn" @click="getTemplate('refresh')">
                    <i class="fa fa-refresh" :class="focusi?'focusi':''"></i>
                </div>
                <div class="btn-common recycle-btn" @click="goRecycle">
                    <i class="fa fa-recycle"></i>
                回收站
                </div>
        </div>
        <div class="temp-item">
            <div class="temp-item-margin">
                <div class="create-item">
                    <div class="create-item-btn" @click="operation('create',null)">+</div>
                    <div>新建模板</div>
                </div>
            </div>
            <div class="temp-item-margin item-hover" v-for="(item,index) in templateList">
                <div class="foreach-item">
                    <div class="foreach-item-title">
                        <div class="item-title-left" @click="operation('edit',item.id)">
                            {{item.name}} </div>
                        <div class="status-release" v-if="item.status=='normal'">
                            已发布
                        </div>
                        <div class="status-norelease" v-if="item.status=='hidden'">
                            未发布
                        </div>
                    </div>
                    <div class="temp-item-img">
                        <img v-if="item.image" :src="Fast.api.cdnurl(item.image)">
                    </div>
                    <div class="temp-item-pla">
                        <div class="display-flex">
                            <span class="tip">支持平台：</span>
                            <div class="display-flex" v-if="item.platform!='preview' && item.platform!=''">
                                <img style="margin-right:5px" v-for="i in item.platform.split(',')"
                                    :src="'/assets/addons/shopro/img/decorate/'+i+'.png'">
                            </div>
                        </div>
                        <div class="display-flex" style="margin-top:6px">
                            <span class="tip">备注：</span><span>{{item.memo}}</span>
                        </div>
                        <div class="display-flex" style="margin-top:6px">
                            <span
                                class="tip">更新时间：</span><span>{{moment(item.createtime*1000).format('YYYY-MM-DD HH:mm:ss')}}</span>
                        </div>
                    </div>
                    <div class="item-mask">
                        <div class="item-mask-body">
                            <div class="btn-common item-mask-item" @click="operation('decorate',item.id)">
                                <img src="/assets/addons/shopro/img/decorate/decorate-btn.png" alt="">装修
                            </div>
                            <div class="btn-common item-mask-item" @click="operation('edit',item.id)">
                                <img src="/assets/addons/shopro/img/decorate/edit-btn.png" alt="">编辑
                            </div>
                            <div class="btn-common item-mask-item" @click="operation('release',item.id)"
                                v-if="item.status!='normal'">
                                <img src="/assets/addons/shopro/img/decorate/release-btn.png" alt="">发布
                            </div>
                            
                            <div class="btn-common item-mask-item" @click="operation('down',item.id)"
                                v-if="item.status=='normal'">
                                <img src="/assets/addons/shopro/img/decorate/down-btn.png" alt="">下架
                            </div>
                            <div class="btn-common item-mask-item" @click="operation('copy',item.id)">
                                <img src="/assets/addons/shopro/img/decorate/copy-btn.png" alt="">复制
                            </div>
                            <div v-if="item.status!='normal'" class="btn-common item-mask-item"
                                @click="operation('delete',item.id)">
                                <img src="/assets/addons/shopro/img/decorate/delete-btn.png" alt="">删除
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 模板创建 -->
    <el-dialog :title="submitId?'编辑模板':'新建模板'" :visible.sync="createDialog" :before-close="createClose">
        <div class="create-bodys">
            <div class="create-items">
                <div class="create-titles">模板名称</div>
                <el-input type="text" placeholder="最多可输入10个字" v-model="templateForm.name" maxlength="10">
                </el-input>
            </div>
            <div class="create-items">
                <div class="create-titles">备注</div>
                <el-input type="text" placeholder="最多可输入12个字" v-model="templateForm.memo" maxlength="12">
                </el-input>
            </div>
            <div class="create-items">
                <div class="create-titles">发布平台</div>
                <el-checkbox-group v-model="templateForm.platform">
                    <el-checkbox label="微信小程序"></el-checkbox>
                    <el-checkbox label="微信公众号"></el-checkbox>
                    <el-checkbox label="H5"></el-checkbox>
                    <el-checkbox label="App"></el-checkbox>
                </el-checkbox-group>
            </div>
            <div class="create-items create-btn">
                <div @click="createClose('no')" class="btn-common create-btn-1">取消</div>
                <div @click="createClose('yes')" class="btn-common create-btn-2">确定</div>
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
