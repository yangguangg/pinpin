<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:99:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/user/user/score_recharge.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
    #recharge {
        color: #444;
        padding: 0 20px 30px;
        background-color: #fff;
    }

    [v-cloak] {
        display: none
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<div id="recharge" v-cloak>
    <el-form :model="rechargeForm" :rules="rules" ref="rechargeForm" label-width="100px" class="demo-rechargeForm">
        <el-form-item v-if="rechargeType=='money'" label="充值余额：" prop="money">
            <el-input type="number" v-model="rechargeForm.money" placeholder="负数则为扣除"></el-input>
        </el-form-item>
        <el-form-item v-if="rechargeType=='score'" label="充值积分：" prop="score">
            <el-input type="number" v-model="rechargeForm.score" placeholder="负数则为扣除"></el-input>
        </el-form-item>
        <el-form-item label="备注：">
            <el-input v-model="rechargeForm.remarks"></el-input>
        </el-form-item>
    </el-form>
    <div class="dialog-footer display-flex">
        <div @click="submitForm" class="dialog-cancel-btn display-flex-c cursor-pointer">取消</div>
        <div @click="submitForm('yes','rechargeForm')" class="dialog-define-btn display-flex-c cursor-pointer">确定
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
