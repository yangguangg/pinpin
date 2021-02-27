<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:86:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/coupons/add.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
    #pageDetail {
        background: #fff;
        overflow: auto;
        color: #666;
    }
    .msg-tip {
        margin-left: 30px;
        color: #999;
    }

    .select-goods {
        width: 146px;
        height: 50px;
        border: 1px solid #E6E6E6;
        border-radius: 4px;
        margin-right: 10px;
        position: relative;
        margin-bottom: 10px;
    }

    .select-goods-selected {
        border-color: #7438D5;
    }

    .select-goods-img {
        width: 48px;
        height: 48px;
        border-radius: 4px;
    }

    .select-goods div {
        padding: 0 8px;
        line-height: 14px;
        -webkit-line-clamp: 2;
        font-size:12px;
    }

    .delete-goods {
        position: absolute;
        width: 16px;
        height: 16px;
        top: -8px;
        right: -8px;

    }
    .label-auto{
        width: 16px;
        height: 16px;
    }

    .modify-text {
        margin-right: 14px;
    }

    [v-cloak] {
        display: none
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<div id="pageDetail" v-cloak>
    <el-form :model="detailData" :rules="rules" ref="detailData" label-width="108px" class="detail-form">
        <el-form-item label="优惠券名称：" prop="name">
            <div class="display-flex">
                <el-input type="input" v-model="detailData.name" placeholder="请输入优惠券名称"></el-input>
            </div>
        </el-form-item>
        <el-form-item label="优惠类型：" prop="type">
            <el-radio-group v-model="detailData.type">
                <el-radio label="cash">代金券</el-radio>
                <!-- <el-radio label="">折扣券</el-radio> -->
            </el-radio-group>
        </el-form-item>
        <el-form-item label="优惠券描述：">
            <el-input type="input" v-model="detailData.description" placeholder="仅商家端显示，用于区分相似优惠券(最多可输入十个字)"></el-input>
        </el-form-item>
        <el-form-item label="领取时间：" prop="gettime">
            <el-date-picker v-model="detailData.gettime" type="datetimerange" range-separator="至" value-format="yyyy-MM-dd HH:mm:ss" format="yyyy-MM-dd HH:mm:ss"
                start-placeholder="开始日期" end-placeholder="结束日期">
            </el-date-picker>
        </el-form-item>
        <el-form-item label="使用时间：" prop="usetime">
            <el-date-picker v-model="detailData.usetime" type="datetimerange" range-separator="至" value-format="yyyy-MM-dd HH:mm:ss" format="yyyy-MM-dd HH:mm:ss"
                start-placeholder="开始日期" end-placeholder="结束日期">
            </el-date-picker>
        </el-form-item>
        <el-form-item label="发券总量：">
            <div class="display-flex">
                <el-input type="number" v-model="detailData.stock" style="width:170px;" placeholder="请输入发券总量">
                    <template slot="append">张</template>
                </el-input>
                <div class="msg-tip">修改优惠券总量时只能增加不能减少，请谨慎设置</div>
            </div>
        </el-form-item>
        <el-form-item label="每人限领：">
            <div class="display-flex">
                <el-input type="number" v-model="detailData.limit" style="width:170px;" placeholder="请输入每人限领">
                    <template slot="append">张</template>
                </el-input>
            </div>
        </el-form-item>
        <el-form-item label="减免金额：" prop="amount">
            <div class="display-flex">
                <el-input type="number" v-model="detailData.amount" style="width:170px;" placeholder="请输入减免金额">
                    <template slot="append">元</template>
                </el-input>
            </div>
        </el-form-item>
        <el-form-item label="使用门槛：" prop="enough">
            <div class="display-flex">
                <el-input type="number" v-model="detailData.enough" style="width:170px;" placeholder="请输入使用门槛">
                    <template slot="append">元</template>
                </el-input>
            </div>
        </el-form-item>
        <el-form-item label="适用商品：" prop="goods_type">
            <div>
                <el-radio-group v-model="detailData.goods_type">
                    <el-radio label="all">全部商品可用</el-radio>
                    <el-radio label="part">指定商品可用</el-radio>
                </el-radio-group>
                <div class="display-flex" style="flex-wrap: wrap;" v-if="detailData.goods_type=='part'">
                    <div class="select-goods display-flex" :class="item.selected?'select-goods-selected':''"
                        v-for="(item,index) in goods_arr" @click="operation('selectedDel',index)">
                        <img class="select-goods-img" :src="Fast.api.cdnurl(item.image)" alt="" srcset="">
                        <div class="flex-1 ellipsis-item">
                            {{item.title}}
                        </div>
                        <img v-if="item.selected" class="delete-goods label-auto" src="/assets/addons/shopro/img/goods/close.png"  @click="operation('delete',index)">
                    </div>
                </div>
                <div class="display-flex" v-if="detailData.goods_type=='part'">
                    <div class="display-flex">
                        <div class="theme-color cursor-pointer modify-text" @click="operation('selected')">修改已选商品</div>
                        <div class="theme-delete-color cursor-pointer" @click="operation('clear')">清空</div>
                    </div>
                </div>
            </div>
        </el-form-item>
    </el-form>
    <div class="dialog-footer display-flex">
        <div @click="submit" class="dialog-cancel-btn display-flex-c cursor-pointer">取消</div>
        <div @click="submit('yes','detailData')" class="dialog-define-btn display-flex-c cursor-pointer">确定</div>
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
