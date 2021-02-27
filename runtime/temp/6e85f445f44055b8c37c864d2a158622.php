<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:94:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/app/score_shop/edit.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
    .skuChildrenBox {
        display: flex;
        padding: 0 15px;
        flex-wrap: wrap;
    }

    .skuChildren {
        margin-right: 10px;
        margin-top: 10px;
        width: 50px;
        height: 24px;
        line-height: 24px;
        color: rgba(80, 80, 80, 1);
        border-radius: 2px;
        font-size: 12px;
        text-align: center;
        border: 1px solid rgba(231, 231, 231, 1);
        position: relative;
    }

    .skuChildrenSelect {
        border: 1px solid rgba(212, 48, 48, 1)
    }

    .skuChildren-close {
        position: absolute;
        background: rgba(212, 48, 48, 1);
        color: #fff;
        border-radius: 50%;
        width: 12px;
        height: 12px;
        top: -6px;
        right: -6px;
        font-style: 12px;
        -webkit-transform: scale(0.8);
    }

    .status {
        border: none;
        cursor: pointer;
        color: #7438D5;
        font-size: 14px;
    }

    .status-s {
        color: #FF5959;
    }

    #skuPrice {
        background: #fff;
        padding: 10px;
        color: #444;
    }

    .display-flex {
        display: flex;
        align-items: center;
    }

    .goods-message {
        height: 70px;
        border: 1px solid #E6E6E6;
        padding: 10px;
        margin-bottom: 20px;
    }

    .goods-container {
        height: 100%;
        width: 100%;
        background: #F9F9F9;
        padding: 0 10px;
    }

    .goods_img {
        width: 34px;
        height: 34px;
        margin-right: 14px;
    }

    .table {
        border: 1px solid #E6E6E6;
        border-bottom: none;
    }

    .table>thead {
        background: #F9F9F9
    }

    .table>thead>tr>th {
        padding: 9px;
        border-bottom: 1px solid #E6E6E6;
        text-align: center;
        vertical-align: middle;
    }

    .table>tbody>tr>td {
        padding: 9px;
        border-bottom: 1px solid #E6E6E6;
        text-align: center;
        vertical-align: middle;
    }

    .page-footer {
        justify-content: flex-end;
    }

    .sub-btn {
        width: 88px;
        height: 36px;
        background: #7438D5;
        border-radius: 4px;
        font-size: 14px;
        color: #fff;
        justify-content: center;
        cursor: pointer;
    }

    .el-input__inner {
        height: 32px;
        line-height: 32px;
        padding: 0 4px;
    }

    .all-edit {
        margin-left: 6px;
        color: #7438D5;
        font-size: 14px;
    }
    .popover-btn-container{
        text-align: right; margin-top: 10px
    }

    [v-cloak] {
        display: none
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<div id="deatailPage" v-cloak>
    <div class="goods-message display-flex">
        <div class="goods-container display-flex">
            <img class="goods_img" :src="Fast.api.cdnurl(goodsDetail.image)">
            <div>{{goodsDetail.title}}</div>
        </div>
    </div>
    <div class="widget-body no-padding">
        <table class="table" id="skuPrce" v-cloak>
            <thead>
                <tr>
                    <th v-for="(item, i) in skuList" :key="i">
                        {{item.name}}
                    </th>
                    <th width="80">库存</th>
                    <th width="80">价格</th>
                    <th width="80">活动销量</th>
                    <th width="100">
                        <div>活动库存
                            <el-popover placement="top" width="160" v-model="allEditPopover.stock">
                                <el-input type="number" v-model="allEditDatas" placeholder="请输入内容"></el-input>
                                <div class="popover-btn-container">
                                    <el-button size="mini" type="text" @click="allEditData('stock','cancel')">取消
                                    </el-button>
                                    <el-button type="primary" size="mini" @click="allEditData('stock','define')">确定
                                    </el-button>
                                </div>
                                <i slot="reference" class="el-icon-edit-outline all-edit"></i>
                            </el-popover>
                        </div>
                    </th>
                    <th width="120">
                        <div class="display: flex;align-items: center;">
                         兑换积分
                         <el-popover
                            placement="top"
                            width="240"
                            trigger="hover"
                            content="积分产品退款后积分不予退还">
                            <i class="el-icon-question" style="font-size:16px;color: #999;" slot="reference"></i>
                        </el-popover>
                         <el-popover placement="top" width="160" v-model="allEditPopover.score">
                            <el-input type="number" v-model="allEditDatas" placeholder="请输入内容"></el-input>
                            <div class="popover-btn-container">
                                <el-button size="mini" type="text" @click="allEditData('score','cancel')">取消</el-button>
                                <el-button type="primary" size="mini" @click="allEditData('score','define')">确定
                                </el-button>
                            </div>
                            <i slot="reference" class="el-icon-edit-outline all-edit"></i>
                        </el-popover>   
                        </div>
                        
                    </th>
                    <th width="100">兑换价格<el-popover placement="top" width="160" v-model="allEditPopover.price">
                            <el-input type="number" v-model="allEditDatas" placeholder="请输入内容"></el-input>
                            <div class="popover-btn-container">
                                <el-button size="mini" type="text" @click="allEditData('price','cancel')">取消</el-button>
                                <el-button type="primary" size="mini" @click="allEditData('price','define')">确定
                                </el-button>
                            </div>
                            <i slot="reference" class="el-icon-edit-outline all-edit"></i>
                        </el-popover>
                    </th>
                    <th width="80">操作</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, i) in skuPrice" :key="i">
                    <td v-for="(v, j) in item.goods_sku_text" :key="j">
                        {{v}}
                    </td>
                    <td width="80">{{item.stock}}</td>
                    <td width="80">{{item.price}}</td>
                    <td width="80">{{activitySkuPrice[i].sales}}</td>
                    <td width="100">
                        <el-input v-show="activitySkuPrice[i].status=='up'" type="number" v-model="activitySkuPrice[i].stock">
                        </el-input>
                    </td>
                    <td width="120">
                        <el-input v-show="activitySkuPrice[i].status=='up'" type="number" v-model="activitySkuPrice[i].score">
                        </el-input>
                    </td>
                    <td width="100">
                        <el-input v-show="activitySkuPrice[i].status=='up'" type="number" v-model="activitySkuPrice[i].price">
                        </el-input>
                    </td>
                    <td width="80"><span class="input-sm form-control status"
                            :class="activitySkuPrice[i].status=='up'?'status-s':''"
                            @click="goJoin(i)">{{activitySkuPrice[i].status=='up'?'取消':'参与'}}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="page-footer display-flex">
        <div class="sub-btn display-flex" @click="submitForm">
            确定
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
