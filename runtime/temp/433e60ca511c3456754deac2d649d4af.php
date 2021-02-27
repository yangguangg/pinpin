<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:86:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/link/select.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
<link rel="stylesheet" href="/assets/addons/shopro/libs/common.css">

<style>
    #linkSelect {
        background: #fff;
        overflow: auto;
        color: #444;
        margin: -15px;
    }

    a,
    a:focus,
    a:hover {
        color: #444;
        display: block;
    }

    .el-menu-level {
        margin: 0 20px;
        border: none;
    }

    .el-menu-level .el-menu-item,
    .el-submenu__title,
    .el-menu-item-group__title {
        height: 32px;
        line-height: 32px;
        min-width: 100px !important;
        padding: 0 0 0 20px !important;
        font-size: 12px;
    }

    .el-menu-item.is-active {
        color: #7536D0;
        background: rgba(116, 56, 213, 0.14);
        border-radius: 4px;
    }

    .dialog-left {
        width: 140px;
        border-right: 1px solid #e6e6e6;
        height: 100vh;
        padding-top: 9px;
        overflow: auto;
    }

    .dialog-right {
        height: 100vh;
        flex: 1;
    }

    .dialog-search {
        padding: 9px 20px;
    }

    .dialog-search .el-input {
        width: 240px;

    }

    .dialog-search .el-input__inner {
        background: #F9F9F9;
        border: none;
    }

    .dialog-right-body {
        padding: 0 20px 20px;
        height: calc(100vh - 112px);
        overflow: auto;
    }

    .dialog-footer {
        padding: 15px 20px;
        justify-content: flex-end;
    }

    .operation-button {
        width: 60px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        font-size: 12px;
        margin-left: 10px;
        cursor: pointer;
    }

    .cancel-button {
        border: 1px solid #E6E6E6;
        color: #C4C4C4;
    }

    .define-button {
        background: #6E3DC8;
        color: #fff;
    }

    .dialog-right-body-title {
        height: 50px;
        justify-content: space-between;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .dialog-right-body-title .el-icon-tickets {
        font-size: 13px;
        color: #7438D5;
        margin-right: 10px;
    }

    .select-container {
        flex-wrap: wrap;
    }

    .select-item {
        /* width: 70px; */
        padding: 0 16px;
        height: 32px;
        border: 1px solid #E6E6E6;
        border-radius: 4px;
        color: #444;
        cursor: pointer;
        margin-right: 14px;
        margin-bottom: 14px;
    }

    .custom-select-active,
    .custom-select-active:focus {
        border-color: #7438D5 !important;
        color: #7438D5;
    }
    .dialog-left::-webkit-scrollbar,.dialog-right-body::-webkit-scrollbar {
        width: 6px;
    }

    .dialog-left::-webkit-scrollbar-thumb,.dialog-right-body::-webkit-scrollbar-thumb {
        width: 6px;
        background: #ccc;
        height: 20px;
        border-radius: 3px;
    }

    [v-cloak] {
        display: none
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<div id="linkSelect" v-cloak>
    <div class="dialog-body display-flex">
        <div class="dialog-left">
            <el-menu :default-active="activeIndex" class="el-menu-level" :collapse="false" @select="selected">
                <el-menu-item :index="index" v-for="(item,index) in linkData">
                    <span slot="title">
                        <a :href="'#'+index"></a>
                        {{item.group==''?'其它':item.group}}</span>
                </el-menu-item>
            </el-menu>
        </div>
        <div class="dialog-right">
            <div class="dialog-search display-flex">
                <div>
                    <span v-if="!isAll && multiple=='true'" class="theme-color cursor-pointer"
                        @click="checkedAll(true)">全选</span>
                    <span v-if="isAll && multiple=='true'" class="cursor-pointer" @click="checkedAll(false)">全不选</span>
                </div>
            </div>
            <div class="dialog-right-body">
                <a class="scroll-item" v-for="(group,index) in linkData" :name="index">
                    <div class="dialog-right-body-title display-flex">
                        <div>
                            <i class="el-icon-tickets"></i>
                            <span>{{group.group==''?'其它':group.group}}</span>
                        </div>
                    </div>
                    <div class="select-container display-flex">
                        <div v-for="(item,idx) in group.children" class="select-item display-flex-c"
                            :class="item.selected?'custom-select-active':''"
                            @click="operation('select',item,index,idx)">
                            {{item.name}}</div>
                    </div>
                </a>
            </div>
            <div class="dialog-footer display-flex">
                <div @click="operation('define')" class="operation-button define-button">确定</div>
            </div>
        </div>
    </div>
    <el-dialog title="类型" :visible.sync="dialogVisible" width="30%" :show-close="false">
        <div class="display-flex" style="justify-content: space-between;">
            <div style="width: 40%;border: 1px solid #e6e6e6;display: flex;align-items: center;justify-content: center;height: 40px;cursor: pointer;"
                @click="posterUser">个人海报</div>
            <div style="width: 40%;border: 1px solid #e6e6e6;display: flex;align-items: center;justify-content: center;height: 40px;cursor: pointer;"
                @click="posterGood">商品海报</div>
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
