<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:90:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/config/platform.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
    #configPlatform {
        color: #444;
        padding: 0 20px 40px;
        background-color: #fff;
        position: relative;
        height: calc(100vh - 40px);
        overflow-y: auto;
    }

    .wx-type .el-radio {
        margin-bottom: 10px;
        margin-right: 10px;
    }

    .platform-images {
        width: 60px;
        height: 60px;
        border-radius: 4px;
        position: relative;
        border: 1px solid #7438D5;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .el-image {
        width: 100%;
        height: 100%;
        border-radius: 4px;
    }

    .del-image-btn {
        position: absolute;
        width: 14px;
        height: 14px;
        line-height: 14px;
        text-align: center;
        border-radius: 50%;
        font-size: 12px;
        font-weight: 600;
        background: #fff;
        color: #7438D5;
        top: -8px;
        right: -8px;
        font-size: 16px;
    }

    .add-img {
        width: 60px;
        height: 60px;
        border: 1px dashed #E6E6E6;
        border-radius: 4px;
        justify-content: center;
    }

    .form-item-tip {
        color: #999;
    }

    .el-form-item {
        margin-bottom: 10px;
    }

    .el-image__error {
        font-size: 12px
    }

    .divider-title {
        font-weight: 600;
        margin-bottom: 20px;
        color: #666;
    }

    .el-input-group__append,
    .el-input-group__prepend {
        background: #f9f9f9;
    }

    .dialog-footer{
        position: fixed;
        right: 20px;
        bottom: 0px;
        width: 100%;
        background: #fff;
        padding: 30px 10px 30px;
    }
    .el-input-group__append{
        line-height: 30px !important;
    }
    [v-cloak] {
        display: none
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<div id="configPlatform" class="shopro-container-scrollbar" v-cloak>
    <el-form :model="detailForm" ref="detailForm" label-width="148px" class="demo-detailForm">
        <div v-if="type=='shopro'">
            <el-form-item label="商城名称：">
                <el-input v-model="detailForm.name" placeholder="请输入商城名称" size="small"></el-input>
            </el-form-item>
            <el-form-item label="商城域名：">
                <el-input v-model="detailForm.domain" placeholder="请输入商城域名必须填写http(s)://" size="small"></el-input>
            </el-form-item>
            <el-form-item label="版本号：">
                <el-input v-model="detailForm.version" placeholder="请输入版本号" size="small"></el-input>
            </el-form-item>
            <el-form-item label="Logo：">
                <div class="display-flex">
                    <div class="platform-images" v-if="detailForm.logo">
                        <el-image :src="Fast.api.cdnurl(detailForm.logo)" fit="contain"
                            :preview-src-list="detailForm.logo_arr">
                        </el-image>
                        <div class="del-image-btn" @click="delImg('image','logo')">
                            <i class="el-icon-error"></i>
                        </div>
                    </div>
                    <div class="add-img display-flex" @click="addImg('image','logo')" v-if="!detailForm.logo">
                        <i class="el-icon-plus"></i>
                    </div>
                </div>
            </el-form-item>
            <el-form-item label="版权信息：" v-if="detailForm.copyright">
                <el-input v-model="detailForm.copyright[0]" placeholder="请输入版权信息" size="small"></el-input>
                <el-input v-model="detailForm.copyright[1]" placeholder="请输入版权信息" size="small"></el-input>
            </el-form-item>
        </div>
        <div v-if="type=='user'">
            <el-form-item label="默认昵称：">
                <el-input v-model="detailForm.nickname" placeholder="请输入默认昵称" size="small"></el-input>
            </el-form-item>
            <el-form-item label="默认头像：">
                <div class="display-flex">
                    <div class="platform-images" v-if="detailForm.avatar">
                        <el-image :src="Fast.api.cdnurl(detailForm.avatar)" fit="contain"
                            :preview-src-list="detailForm.avatar_arr">
                        </el-image>
                        <div class="del-image-btn" @click="delImg('image','avatar')">
                            <i class="el-icon-error"></i>
                        </div>
                    </div>
                    <div class="add-img display-flex" @click="addImg('image','avatar')" v-if="!detailForm.avatar">
                        <i class="el-icon-plus"></i>
                    </div>
                </div>
            </el-form-item>
            <el-form-item label="默认分组：">
                <el-select v-model="detailForm.group_id" filterable placeholder="请选择默认分组" size="small">
                    <el-option v-for="item in groupList" :key="item.id" :label="item.name" :value="item.id+''">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="默认余额：">
                <el-input v-model="detailForm.money" placeholder="请输入默认余额" size="small"></el-input>
            </el-form-item>
            <el-form-item label="默认积分：">
                <el-input v-model="detailForm.score" placeholder="请输入默认积分" size="small"></el-input>
            </el-form-item>
        </div>
        <div v-if="type=='share'">
            <el-form-item label="分享标题：">
                <el-input v-model="detailForm.title" placeholder="请输入分享标题" size="small"></el-input>
            </el-form-item>
            <el-form-item label="默认分享图片：">
                <div class="display-flex">
                    <div class="platform-images" v-if="detailForm.image">
                        <el-image :src="Fast.api.cdnurl(detailForm.image)" fit="contain"
                            :preview-src-list="detailForm.image_arr">
                        </el-image>
                        <div class="del-image-btn" @click="delImg('image','image')">
                            <i class="el-icon-error"></i>
                        </div>
                    </div>
                    <div class="add-img display-flex" @click="addImg('image','image')" v-if="!detailForm.image">
                        <i class="el-icon-plus"></i>
                    </div>
                </div>
            </el-form-item>
            <el-form-item label="商品分享背景：">
                <div class="display-flex">
                    <div class="platform-images" v-if="detailForm.goods_poster_bg">
                        <el-image :src="Fast.api.cdnurl(detailForm.goods_poster_bg)" fit="contain"
                            :preview-src-list="detailForm.goods_poster_bg_arr">
                        </el-image>
                        <div class="del-image-btn" @click="delImg('image','goods_poster_bg')">
                            <i class="el-icon-error"></i>
                        </div>
                    </div>
                    <div class="add-img display-flex" @click="addImg('image','goods_poster_bg')"
                        v-if="!detailForm.goods_poster_bg">
                        <i class="el-icon-plus"></i>
                    </div>
                </div>
            </el-form-item>
            <el-form-item label="用户分享背景：">
                <div class="display-flex">
                    <div class="platform-images" v-if="detailForm.user_poster_bg">
                        <el-image :src="Fast.api.cdnurl(detailForm.user_poster_bg)" fit="contain"
                            :preview-src-list="detailForm.user_poster_bg_arr">
                        </el-image>
                        <div class="del-image-btn" @click="delImg('image','user_poster_bg')">
                            <i class="el-icon-error"></i>
                        </div>
                    </div>
                    <div class="add-img display-flex" @click="addImg('image','user_poster_bg')"
                        v-if="!detailForm.user_poster_bg">
                        <i class="el-icon-plus"></i>
                    </div>
                </div>
            </el-form-item>
            <el-form-item label="拼团分享背景：">
                <div class="display-flex">
                    <div class="platform-images" v-if="detailForm.groupon_poster_bg">
                        <el-image :src="Fast.api.cdnurl(detailForm.groupon_poster_bg)" fit="contain"
                            :preview-src-list="detailForm.groupon_poster_bg_arr">
                        </el-image>
                        <div class="del-image-btn" @click="delImg('image','groupon_poster_bg')">
                            <i class="el-icon-error"></i>
                        </div>
                    </div>
                    <div class="add-img display-flex" @click="addImg('image','groupon_poster_bg')"
                        v-if="!detailForm.groupon_poster_bg">
                        <i class="el-icon-plus"></i>
                    </div>
                </div>
            </el-form-item>
        </div>
        <div v-if="type=='score'">
            <el-form-item label="每日签到积分：">
                <el-input v-model="detailForm.everyday" placeholder="请输入每日签到积分" size="small"></el-input>
            </el-form-item>
            <el-form-item label="递增天数：">
                <el-input v-model="detailForm.until_day" placeholder="请输入递增天数" size="small"></el-input>
            </el-form-item>
            <el-form-item label="递增数量：">
                <el-input v-model="detailForm.inc_value" placeholder="请输入递增数量" size="small"></el-input>
            </el-form-item>
        </div>
        <div v-if="type=='withdraw'">
            <el-form-item label="手续费：">
                <el-input v-model="detailForm.service_fee" type="number" placeholder="请输入手续费" size="small">
                    <template slot="append">%</template>
                </el-input>
            </el-form-item>
            <el-form-item label="最小提现金额：">
                <el-input v-model="detailForm.min" type="number" placeholder="请输入最小提现金额" size="small">
                    <template slot="append">元</template>
                </el-input>
            </el-form-item>
            <el-form-item label="最大提现金额：">
                <el-input v-model="detailForm.max" type="number" placeholder="请输入最大提现金额" size="small">
                    <template slot="append">元</template>
                </el-input>
            </el-form-item>
        </div>
        <div v-if="type=='order'">
            <el-form-item label="自动关闭时间：">
                <el-input v-model="detailForm.order_auto_close" placeholder="请输入订单自动关闭时间" size="small">
                    <template slot="append">分钟</template>
                </el-input>
            </el-form-item>
            <el-form-item label="自动收货时间：">
                <el-input v-model="detailForm.order_auto_confirm" placeholder="请输入订单自动收货时间" size="small">
                    <template slot="append">天</template>
                </el-input>
            </el-form-item>
            <el-form-item label="自动评价时间：">
                <el-input v-model="detailForm.order_auto_comment" placeholder="请输入订单自动评价时间" size="small">
                    <template slot="append">天</template>
                </el-input>
            </el-form-item>
            <el-form-item label="自动评价内容：">
                <el-input v-model="detailForm.order_comment_content" placeholder="请输入订单自动评价内容" size="small">
                </el-input>
            </el-form-item>
        </div>
        <div v-if="type=='services'">
            <div style="margin-bottom: 40px;" v-if="detailForm.amap">
                <div class="divider-title">高德地图配置</div>
                <el-form-item label="申请的key值：">
                    <el-input v-model="detailForm.amap.appkey" placeholder="请输入申请的key值" size="small">
                    </el-input>
                </el-form-item>
            </div>
            <div class="divider-title">快递鸟配置</div>
            <div v-if="detailForm.express">
                <el-form-item label="用户ID：">
                    <el-input v-model="detailForm.express.ebusiness_id" placeholder="请输入用户ID" size="small">
                    </el-input>
                </el-form-item>
                <el-form-item label="类型：">
                    <el-radio-group v-model="detailForm.express.type">
                        <el-radio label="free">免费版</el-radio>
                        <el-radio label="vip">标准版</el-radio>
                    </el-radio-group>
                    <div class="form-item-tip">免费版只支持 申通、圆通、百世、天天（请以快递鸟免费版说明为准）</div>
                </el-form-item>
                <el-form-item label="API Key：">
                    <el-input v-model="detailForm.express.appkey" placeholder="请输入API Key" size="small">
                    </el-input>
                </el-form-item>
                <el-form-item label="京东青龙配送编码：">
                    <el-input v-model="detailForm.express.jd_code" placeholder="请输入京东青龙配送编码" size="small">
                    </el-input>
                    <div class="form-item-tip">使用京东时需要配置</div>
                </el-form-item>
                <el-form-item label="回调地址：">
                    <el-input disabled v-model="expressAddress" placeholder="请输入回调地址" size="small">
                    </el-input>
                    <div class="form-item-tip">请在快递鸟后台配置此回调地址</div>
                </el-form-item>
            </div>
        </div>
        <div v-if="type=='chat'">
            <el-form-item label="客服类型：">
                <el-radio-group v-model="detailForm.type">
                    <el-radio label="shopro">Shopro 客服</el-radio>
                    <el-radio label="kefu">Workerman 在线客服</el-radio>
                </el-radio-group>
                <div class="form-item-tip">选用 workerman 在线客服，请先安装 Workerman 在线客服插件</div>
            </el-form-item>
            <div v-if="detailForm.type=='shopro'">
                <div class="divider-title">基础配置</div>
                <div v-if="detailForm.basic">
                    <el-form-item label="默认上次客服：">
                        <el-switch v-model="detailForm.basic.last_customer_service" active-color="#7438D5" inactive-color="#eee"
                            :active-value="1" :inactive-value="0">
                        </el-switch>
                        <div class="form-item-tip">是否默认使用上次客服
                        </div>
                    </el-form-item>
                    <el-form-item label="客服分配方式：">
                        <el-radio-group v-model="detailForm.basic.allocate">
                            <el-radio label="busy">忙碌程度</el-radio>
                            <el-radio label="turns">轮流</el-radio>
                            <el-radio label="random">随机</el-radio>
                        </el-radio-group>
                        <div class="form-item-tip">
                            <span v-if="detailForm.basic.allocate == 'busy'">按照客服忙碌度分配给最空闲的客服</span>
                            <span v-if="detailForm.basic.allocate == 'turns'">轮流分配给最长时间没接入客户的客服</span>
                            <span v-if="detailForm.basic.allocate == 'random'">随机分配给在线的客服</span>
                        </div>
                    </el-form-item>
                    <el-form-item label="公告：">
                        <el-input v-model="detailForm.basic.notice" placeholder="请输入公告" size="small">
                        </el-input>
                        <div class="form-item-tip">
                            将会显示在用户端聊天界面
                        </div>
                    </el-form-item>
                </div>
                <div class="divider-title">系统配置</div>
                <div v-if="detailForm.system">
                    <el-form-item label="开启 wss 连接：">
                        <el-switch v-model="detailForm.system.is_ssl" active-color="#7438D5" inactive-color="#eee"
                            :active-value="1" :inactive-value="0">
                        </el-switch>
                    </el-form-item>

                    <div v-if="detailForm.system.is_ssl==1">
                        <el-form-item label="wss 证书：">
                            <el-input v-model="detailForm.system.ssl_cert" placeholder="wss 证书在服务器的绝对路径" size="small">
                            </el-input>
                        </el-form-item>
                        <el-form-item label="wss key：">
                            <el-input v-model="detailForm.system.ssl_key" placeholder="wss key在服务器的绝对路径" size="small">
                            </el-input>
                        </el-form-item>
                    </div>
                    
                    <el-form-item label="gateway 端口：">
                        <el-input v-model="detailForm.system.gateway_port" placeholder="请输入API Key" size="small">
                        </el-input>
                        <div class="form-item-tip"> gateway端口,需要放行服务器端口</div>
                    </el-form-item>

                    <el-form-item label="进程数量：">
                        <el-input v-model="detailForm.system.gateway_num" placeholder="请输入进程数量" size="small">
                        </el-input>
                        <div class="form-item-tip"> gateway进程数量</div>
                    </el-form-item>
                    <el-form-item label="gateway 内部端口：">
                        <el-input v-model="detailForm.system.gateway_start_port" placeholder="请输入内部通讯端口" size="small">
                        </el-input>
                        <div class="form-item-tip">假如gateway进程数量为 4，起始端口为2010，则一般会使用2010 2011 2012 2013 4个端口作为内部通讯端口
                        </div>
                    </el-form-item>
                    <el-form-item label="worker 服务端口：">
                        <el-input v-model="detailForm.system.business_worker_port" placeholder="请输入 business worker 服务注册端口" size="small">
                        </el-input>
                        <div class="form-item-tip">请输入 business worker 服务注册端口</div>
                    </el-form-item>
                    <el-form-item label="worker 进程数量：">
                        <el-input v-model="detailForm.system.business_worker_num" placeholder="请输入 business worker 进程数量" size="small">
                        </el-input>
                        <div class="form-item-tip">business worker 进程数量</div>
                    </el-form-item>
                </div>
            </div>
        </div>
        <div v-if="type=='store'">
            <el-form-item label="门店协议：">
                <el-input v-model="detailForm.protocol" placeholder="请选择门店协议" size="small">
                    <template slot="append">
                        <div class="theme-color cursor-pointer" @click="storefile">选择</div>
                    </template>
                </el-input>
            </el-form-item>
        </div>
        <div v-if="type=='wxOfficialAccount'">
            <el-form-item label="公众号名称：">
                <el-input v-model="detailForm.name" placeholder="请输入公众号名称" size="small"></el-input>
            </el-form-item>
            <el-form-item label="公众号类型：">
                <div class="wx-type">
                    <el-radio-group v-model="detailForm.wx_type">
                        <el-radio label="1">订阅号</el-radio>
                        <el-radio label="2">认证订阅号</el-radio>
                        <el-radio label="3">服务号</el-radio>
                        <el-radio label="4">认证服务号/认证政府订阅号/认证媒体订阅号</el-radio>
                    </el-radio-group>
                </div>

            </el-form-item>
            <el-form-item label="公众号头像：">
                <div class="display-flex">
                    <div class="platform-images" v-if="detailForm.avatar">
                        <el-image :src="Fast.api.cdnurl(detailForm.avatar)" fit="contain"
                            :preview-src-list="detailForm.avatar_arr">
                        </el-image>
                        <div class="del-image-btn" @click="delImg('image','avatar')">
                            <i class="el-icon-error"></i>
                        </div>
                    </div>
                    <div class="add-img display-flex" @click="addImg('image','avatar')" v-if="!detailForm.avatar">
                        <i class="el-icon-plus"></i>
                    </div>
                </div>
            </el-form-item>
            <el-form-item label="公众号二维码：">
                <div class="display-flex">
                    <div class="goods-image-box display-flex" v-if="detailForm.qrcode">
                        <div class="platform-images">
                            <el-image :src="Fast.api.cdnurl(detailForm.qrcode)" fit="contain"
                                :preview-src-list="detailForm.qrcode_arr">
                            </el-image>
                            <div class="del-image-btn" @click="delImg('image','qrcode')">
                                <i class="el-icon-error"></i>
                            </div>
                        </div>
                    </div>
                    <div class="add-img display-flex" @click="addImg('image','qrcode')" v-if="!detailForm.qrcode">
                        <i class="el-icon-plus"></i>
                    </div>
                </div>
            </el-form-item>
            <el-form-item label="开发者ID：">
                <el-input v-model="detailForm.app_id" placeholder="请输入开发者ID(AppID)" size="small"></el-input>
            </el-form-item>
            <el-form-item label="开发者密码：">
                <el-input v-model="detailForm.secret" placeholder="请输入开发者密码(AppSecret)" size="small"></el-input>
            </el-form-item>
            <el-form-item label="服务器地址：">
                <el-input v-model="detailForm.url" disabled placeholder="请输入服务器地址(URL)" size="small"></el-input>
            </el-form-item>
            <el-form-item label="令牌(Token)：">
                <el-input v-model="detailForm.token" placeholder="请输入令牌(Token)" size="small"></el-input>
            </el-form-item>
            <el-form-item label="消息加解密密钥：">
                <el-input v-model="detailForm.aes_key" placeholder="请输入消息加解密密钥(EncodingAESKey)" size="small"></el-input>
            </el-form-item>
            <el-form-item label="网页自动授权登录：">
                <el-switch v-model="detailForm.auto_login" active-color="#7438D5" inactive-color="#eee"
                    active-value="1" inactive-value="0">
                </el-switch>
            </el-form-item>
            <el-form-item label="服务器配置状态：" prop="status">
                <el-radio-group v-model="detailForm.status">
                    <el-radio label="0">未对接</el-radio>
                    <el-radio label="1">已对接</el-radio>
                </el-radio-group>
            </el-form-item>
        </div>
        <div v-if="type=='wxMiniProgram'">
            <el-form-item label="小程序名称：">
                <el-input v-model="detailForm.name" placeholder="请输入小程序名称" size="small"></el-input>
            </el-form-item>
            <el-form-item label="小程序头像：">
                <div class="display-flex">
                    <div class="goods-image-box display-flex" v-if="detailForm.avatar">
                        <div class="platform-images">
                            <el-image :src="Fast.api.cdnurl(detailForm.avatar)" fit="contain"
                                :preview-src-list="detailForm.avatar_arr">
                            </el-image>
                            <div class="del-image-btn" @click="delImg('image','avatar')">
                                <i class="el-icon-error"></i>
                            </div>
                        </div>
                    </div>
                    <div class="add-img display-flex" @click="addImg('image','avatar')" v-if="!detailForm.avatar">
                        <i class="el-icon-plus"></i>
                    </div>
                </div>
            </el-form-item>
            <el-form-item label="小程序码：">
                <div class="display-flex">
                    <div class="goods-image-box display-flex" v-if="detailForm.qrcode">
                        <div class="platform-images">
                            <el-image :src="Fast.api.cdnurl(detailForm.qrcode)" fit="contain"
                                :preview-src-list="detailForm.qrcode_arr">
                            </el-image>
                            <div class="del-image-btn" @click="delImg('image','qrcode')">
                                <i class="el-icon-error"></i>
                            </div>
                        </div>
                    </div>
                    <div class="add-img display-flex" @click="addImg('image','qrcode')" v-if="!detailForm.qrcode">
                        <i class="el-icon-plus"></i>
                    </div>
                </div>
            </el-form-item>
            <el-form-item label="AppID：">
                <el-input v-model="detailForm.app_id" placeholder="请输入AppID" size="small"></el-input>
            </el-form-item>
            <el-form-item label="AppSecret：">
                <el-input v-model="detailForm.secret" placeholder="请输入AppSecret" size="small"></el-input>
            </el-form-item>
            <el-form-item label="小程序自动登录：">
                <div class="display-flex">
                    <el-switch v-model="detailForm.auto_login" active-color="#7438D5" inactive-color="#eee"
                        active-value="1" inactive-value="0">
                    </el-switch>
                    <span style="margin-left: 10px;color: #999;">(建议开启)</span>
                </div>
            </el-form-item>
        </div>
        <div v-if="type=='H5'">
            <el-form-item label="微信AppID：">
                <el-input v-model="detailForm.app_id" placeholder="请输入微信AppID" size="small"></el-input>
                <div class="form-item-tip">用于H5微信支付</div>
            </el-form-item>
            <el-form-item label="微信Secret：">
                <el-input v-model="detailForm.secret" placeholder="请输入微信Secret" size="small"></el-input>
            </el-form-item>
        </div>
        <div v-if="type=='App'">
            <el-form-item label="AppID：">
                <el-input v-model="detailForm.app_id" placeholder="请输入AppID" size="small"></el-input>
            </el-form-item>
            <el-form-item label="AppSecret：">
                <el-input v-model="detailForm.secret" placeholder="请输入AppSecret" size="small"></el-input>
            </el-form-item>
        </div>
        <div v-if="type=='wechat'">
            <el-form-item label="应用平台：" v-if="detailForm.platform">
                <el-checkbox-group v-model="detailForm.platform">
                    <el-checkbox label="wxOfficialAccount">微信公众号</el-checkbox>
                    <el-checkbox label="wxMiniProgram">小程序</el-checkbox>
                    <el-checkbox label="H5">H5</el-checkbox>
                    <el-checkbox label="App">App</el-checkbox>
                </el-checkbox-group>
            </el-form-item>
            <el-form-item label="商户号：">
                <el-input v-model="detailForm.mch_id" placeholder="请输入商户号" size="small"></el-input>
            </el-form-item>
            <el-form-item label="支付密钥：">
                <el-input v-model="detailForm.key" placeholder="请输入支付密钥" size="small"></el-input>
            </el-form-item>
            <el-form-item label="商户证书：">
                <el-input v-model="detailForm.cert_client" placeholder="请选择商户证书" size="small">
                    <template slot="append">
                        <div class="theme-color cursor-pointer" @click="addImg('file','cert_client')">选择</div>
                    </template>
                </el-input>
            </el-form-item>
            <el-form-item label="商户Key证书：">
                <el-input v-model="detailForm.cert_key" placeholder="请选择商户Key证书" size="small">
                    <template slot="append">
                        <div class="theme-color cursor-pointer" @click="addImg('file','cert_key')">选择</div>
                    </template>
                </el-input>
            </el-form-item>
        </div>
        <div v-if="type=='alipay'">
            <el-form-item label="应用平台：" v-if="detailForm.platform">
                <el-checkbox-group v-model="detailForm.platform">
                    <el-checkbox label="wxOfficialAccount">微信公众号</el-checkbox>
                    <el-checkbox label="wxMiniProgram">小程序</el-checkbox>
                    <el-checkbox label="H5">H5</el-checkbox>
                    <el-checkbox label="App">App</el-checkbox>
                </el-checkbox-group>
            </el-form-item>
            <el-form-item label="AppId：">
                <el-input v-model="detailForm.app_id" placeholder="请输入AppId" size="small"></el-input>
            </el-form-item>
            <el-form-item label="支付宝公钥证书：">
                <el-input v-model="detailForm.ali_public_key" placeholder="请选择支付宝公钥证书" size="small">
                    <template slot="append">
                        <div class="theme-color cursor-pointer" @click="addImg('file','ali_public_key')">选择</div>
                    </template>
                </el-input>
                <div class="form-item-tip">alipayCertPublicKey_RSA2.crt</div>
            </el-form-item>
            <el-form-item label="应用公钥证书：">
                <el-input v-model="detailForm.app_cert_public_key" placeholder="请选择商户证书" size="small">
                    <template slot="append">
                        <div class="theme-color cursor-pointer" @click="addImg('file','app_cert_public_key')">选择</div>
                    </template>
                </el-input>
                <div class="form-item-tip">appCertPublicKey_*.crt</div>
            </el-form-item>
            <el-form-item label="支付宝根证书：">
                <el-input v-model="detailForm.alipay_root_cert" placeholder="请选择商户Key证书" size="small">
                    <template slot="append">
                        <div class="theme-color cursor-pointer" @click="addImg('file','alipay_root_cert')">选择</div>
                    </template>
                </el-input>
                <div class="form-item-tip">alipayRootCert.crt</div>
            </el-form-item>
            <el-form-item label="private_key：">
                <el-input v-model="detailForm.private_key" placeholder="请输入private_key" size="small">
                </el-input>
            </el-form-item>
        </div>
        <div v-if="type=='wallet'">
            <el-form-item label="应用平台：">
                <el-checkbox-group v-model="detailForm.platform" v-if="detailForm.platform">
                    <el-checkbox label="wxOfficialAccount">微信公众号</el-checkbox>
                    <el-checkbox label="wxMiniProgram">小程序</el-checkbox>
                    <el-checkbox label="H5">H5</el-checkbox>
                    <el-checkbox label="App">App</el-checkbox>
                </el-checkbox-group>
            </el-form-item>
        </div>
    </el-form>
    <div class="dialog-footer">
        <div @click="submitFrom" class="dialog-cancel-btn display-flex-c cursor-pointer">取消</div>
        <div @click="submitFrom('yes')" class="dialog-define-btn display-flex-c cursor-pointer">确定
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
