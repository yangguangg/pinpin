<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:90:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/category/select.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
    #categorySelect {
        color: #444;
        background: #fff;
        padding: 0 5px 20px;
    }

    .category-body {
        display: flex;
        flex-wrap: wrap;
        padding-left: 1px;
    }

    .category-item {
        width: 340px;
        height: 40px;

        background: #FFFFFF;
        box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 16px;
        margin-right: 30px;
        margin-bottom: 20px;
    }

    .category-item:hover {
        cursor: pointer;
    }

    .selected-item {
        color: #f00;
    }

    .title-item {
        color: #444;
        font-size: 14px;
        margin-left: 14px;
    }

    .style-item {
        color: #999;
        font-size: 12px;
    }
    .el-cascader-node.in-active-path, .el-cascader-node.is-active, .el-cascader-node.is-selectable.in-checked-path{
        color: #7536D0;
    }
    .el-cascader .el-input .el-input__inner,.el-cascader .el-input .el-input__inner:focus, .el-cascader .el-input.is-focus .el-input__inner{
        width: 300px;
        border: none !important;
        color: rgba(0,0,0,0);
    }
    .category-style-tip{
        color: #DDDDDD;
        margin-left: 6px;
    }

    [v-cloak] {
        display: none
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<div id="categorySelect" v-cloak>
    <div style="height: calc(100vh - 100px);overflow: auto;">
        <div class="category-body">
            <div v-if="form=='link'" class="category-item" v-for="(item,index) in selectedData"
                @click="select(item.id,index)">
                <div class="disply-flex">
                    <el-checkbox v-model="item.id==selectedids"></el-checkbox>
                    <span class="title-item">{{item.name}} </span>
                </div>
                <div class="display-flex">
                <div class="style-item">样式{{filterStyle(item.type)}}</div>
                <el-popover placement="right" title="" width="130" trigger="hover">
                    <div class="popover-img">
                        <img :src="'/assets/addons/shopro/img/category/img-'+item.type+'.png'">
                    </div>
                    <i class="category-style-tip el-icon-question" slot="reference"></i>
                </el-popover>
            </div>
            </div>
            <div v-if="form=='group'" class="display-flex" style="flex-wrap: wrap;">
                <div class="category-item" v-for="(item,index) in selectedData">
                    <div class="display-flex"  style="    position: absolute;width: 260px;justify-content: space-between;z-index: 1000;">
                      <div class="disply-flex" @click="select(item.id,index)">
                        <el-checkbox v-model="item.id==selectedids"></el-checkbox>
                        <span class="title-item">{{item.name}} </span>
                    </div>
                    <div class="style-item">样式{{filterStyle(item.type)}}</div>  
                    </div>
                    <!-- <el-cascader
    :options="options"
    :props="{ checkStrictly: true }"
    clearable></el-cascader> -->
                    <el-cascader placeholder="" :options="item.children" :props="defaultProps" clearable @change="cascaderChange"></el-cascader>
                    <!-- <el-popover placement="bottom-start" trigger="click">
                            
                            <div style="width: 300px;text-align: right;" slot="reference">
                              <i class="el-icon-arrow-up"></i>   
                            </div>
                       
                    </el-popover> -->
                </div>
            </div>
        </div>
    </div>
    <div class="dialog-footer display-flex">
        <div @click="close()" class="dialog-define-btn display-flex-c cursor-pointer">确定</div>
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
