<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:96:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/activity/activity/add.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
    #activityDetail {
        background: #fff;
        padding: 0 20px 30px;
        font-size: 14px;
        font-family: Source Han Sans SC;
        font-weight: 500;
    }
    .el-form-item__label {
        color: #666;
        font-weight: 500;
    }
    .el-input,.el-input__inner{
        height: 34px !important;
        line-height: 34px !important;
    }
    .el-input-group__append{
        line-height: 32px;
    }
    .el-table td, .el-table th{
        padding: 12px 0;
    }
    .choose-activity-method {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
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
    .dialog-submit {
        width: 88px;
        height: 36px;
        background: #F3EFFB;
        border: 1px solid #7536d0;
        color: #7536d0;
        position: absolute;
        right: 0px;
        border-radius: 20px;
        text-align: center;
        line-height: 36px;
    }

    .dialog-submit-gray {
        color: #999;
        border: 1px solid #999;
        background: #fff;
    }
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
    [v-cloak] {
        display: none;
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<div id="activityDetail" v-cloak>
    <el-form ref="activityForm" :model="activityForm" label-width="130px" :rules="rules">
        <div class="activityForm-auto">
            <el-form-item label="活动名称：" prop="title">
                <el-input v-model="activityForm.title" placeholder="请输入活动名称" :disabled="disabledFlag" size="medium"></el-input>
            </el-form-item>
            <el-form-item label="活动类型：" prop="type">
                <el-radio-group v-model="activityForm.type" :disabled="disabledFlag">
                    <el-radio label="seckill">秒杀活动</el-radio>
                    <el-radio label="groupon">拼团活动</el-radio>
                </el-radio-group>
            </el-form-item>
            <el-form-item label="活动时间：" prop="dateTime">
                <el-date-picker v-model="activityForm.dateTime" type="datetimerange" @input="changeDateTime" size="medium"
                    start-placeholder="开始日期" end-placeholder="结束日期" :disabled="disabledFlag" value-format="yyyy-MM-dd HH:mm:ss"  format="yyyy-MM-dd HH:mm:ss">
                </el-date-picker>
            </el-form-item>
            <div v-if="activityForm.type=='groupon'">
                <el-form-item label="成团人数：" prop="team_num">
                    <el-input type='number' v-model.number="activityForm.team_num" placeholder="请输入成团人的数量"
                        :disabled="disabledFlag" size="medium">
                        <template slot="append">人</template>
                    </el-input>
                </el-form-item>
                <div class="switch-flex">
                    <el-form-item label="单独购买：" prop="is_alone">
                        <el-switch v-model="activityForm.is_alone" active-color="#7536D0" inactive-color="#e9ebef"
                            :disabled="disabledFlag" active-value="1" inactive-value="0">
                        </el-switch>
                        <span class="switch-tip">允许</span>
                    </el-form-item>
                    <el-form-item label="虚拟成团：" prop="is_fictitious">
                        <el-switch v-model="activityForm.is_fictitious" active-color="#7536D0"
                            inactive-color="#e9ebef" :disabled="disabledFlag" active-value="1" inactive-value="0">
                        </el-switch>
                        <span class="switch-tip">允许</span>
                        <el-popover class="popover-item" width="240" trigger="hover"
                            content="开启虚拟成团后，在拼团有效期内人数不够的团，系统会虚拟用户凑满人数，使拼团成功。虚拟的用户不生成订单，只需对真实买家发货。(请在资料管理中添加足够数量的虚拟用户，否则虚拟成团不会成功)">
                            <i slot="reference" class="el-icon-question"></i>
                        </el-popover>
                    </el-form-item>
                </div>
                <el-form-item label="参团卡显示：" prop="team_card">
                    <el-switch v-model="activityForm.team_card" active-color="#7536D0" inactive-color="#e9ebef"
                        :disabled="disabledFlag" active-value="1" inactive-value="0">
                    </el-switch>
                    <span class="switch-tip">允许</span>
                    <el-popover class="popover-item" width="240" trigger="hover"
                        content="开启参团卡显示后，商品详情页显示未成团的团列表，买家可以直接选择一个参团。">
                        <i slot="reference" class="el-icon-question"></i>
                    </el-popover>
                </el-form-item>
                <el-form-item label="最多虚拟人数：" prop="fictitious_num" v-if="activityForm.is_fictitious=='1'">
                    <el-input type='number' v-model.number="activityForm.fictitious_num"
                        placeholder="单团最多虚拟人数的名额限制，不填时，不限制名额" :disabled="disabledFlag" size="medium"></el-input>
                </el-form-item>
                <el-form-item label="组团有效时间：" prop="valid_time">
                    <el-input type='number' v-model.number="activityForm.valid_time" placeholder="申请组团的有效时间,默认不限制"
                        :disabled="disabledFlag" size="medium"><template slot="append">小时</template></el-input>
                </el-form-item>
            </div>
            <el-form-item label="每人限购件数：" prop="limit_buy">
                <el-input type='number' v-model.number="activityForm.limit_buy" placeholder="请输入限购件数"
                    :disabled="disabledFlag" size="medium"><template slot="append">件</template></el-input>
            </el-form-item>
            <el-form-item label="订单关闭时间：" prop="order_auto_close">
                <el-input v-model="activityForm.order_auto_close" placeholder="未支付订单，订单将自动关闭并退出活动"
                    :disabled="disabledFlag" size="medium"><template slot="append">分钟</template></el-input>
            </el-form-item>
            <el-form-item label="活动下架时间：" prop="activity_auto_close">
                <el-input v-model="activityForm.activity_auto_close" placeholder="活动结束后，将自动进入历史活动"
                    :disabled="disabledFlag" size="medium"><template slot="append">分钟</template></el-input>
            </el-form-item>
            <el-form-item label="活动说明：" prop="richtext_id">
                <div class="display-flex" style="align-items: center;line-height: 34px;">
                    <el-input style="display: none;" v-model="activityForm.richtext_id" id="richtext_id"
                        placeholder="请选择活动说明" disabled size="medium">
                    </el-input>
                    <el-input v-model="activityForm.richtext_title" id="richtext_title" placeholder="请选择活动说明" size="medium">
                    </el-input>
                    <el-button class="choose-activity-method" :disabled="disabledFlag" @click="chooseMethod" size="medium">选择活动说明
                    </el-button>
                </div>
            </el-form-item>
            <el-form-item label="选择商品：" prop="goods_list">
                <el-input style="display: none;" v-model="activityForm.goods_list" size="medium"></el-input>
                <el-button class="choose-activity-goods" :disabled="disabledFlag" @click="chooseGoods('activity')">
                    商品选择</el-button>
            </el-form-item>
            <el-form-item style="margin-bottom: 20px;">
                <el-table :data="activityForm.goods_list" style="width: 100%"
                    v-if="activityForm.goods_list.length>0">
                    <el-table-column label="商品信息" width="320">
                        <template slot-scope="scope">
                            <div style="display: flex;">
                                <img style="width: 46px;height: 46px;margin-right: 15px;"
                                    :src="Fast.api.cdnurl(scope.row.image)" alt="" srcset="">
                                <span style="width:200px;">{{scope.row.title}}</span>
                            </div>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" min-width="100">
                        <template slot-scope="scope">
                            <span class="table-good-status cursor-pointer" v-if="optType!='view'"
                                :class="scope.row.opt?'table-good-status-1':''"
                                @click="chooseActivityPrice(scope.row.id,scope.$index,encodeURI(scope.row.actSkuPrice))">{{scope.row.opt === 0 ? "设置价格" : "修改价格"}}</span>
                            <span class="table-good-status cursor-pointer" v-if="optType=='view'"
                                @click="chooseActivityPrice(scope.row.id,scope.$index,encodeURI(scope.row.actSkuPrice))">查看详情</span>
                            <span class="table-good-status-delete cursor-pointer" v-if="optType!='view'"
                                @click="selectDelete(scope.$index)">移除</span>
                        </template>
                    </el-table-column>
                </el-table>
            </el-form-item>
        </div>
        <el-form-item>
            <div v-if="optType!='view' && formSubFlag" class="dialog-submit cursor-pointer" type="primary"
                @click="submitForm('activityForm')">确认
            </div>
            <div v-if="optType!='view' && !formSubFlag" class="dialog-submit dialog-submit-gray"
                type="primary">确认</div>
        </el-form-item>
    </el-form>
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
