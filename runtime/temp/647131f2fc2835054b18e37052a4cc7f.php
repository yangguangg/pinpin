<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:92:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/user/user/profile.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
    #userDetail {
        color: #444;
        padding: 0 20px 30px;
        background-color: #fff;
    }

    .el-input__inner,
    .el-input__icon {
        height: 34px;
        line-height: 34px;
    }

    .el-select,
    .el-date-editor.el-input,
    .el-date-editor.el-input__inner {
        width: 100% !important;
    }

    .header-tip {
        height: 50px;
        line-height: 50px;
        font-size: 14px;
    }

    .message-container {
        border: 1px solid #E6E6E6;
        padding: 20px 26px 0;
        margin-bottom: 30px;
    }

    .message-title {
        height: 62px;
        line-height: 62px;
        font-size: 16px;
    }

    .message-item {
        margin-bottom: 14px;
    }

    .message-tip {
        width: 56px;
        /* margin-right: 20px; */
        height: 34px;
        line-height: 34px;
        /* text-align: right; */
        text-align: justify;
        text-align-last: justify;
    }

    .message-tip-right {
        width: 70px;
        /* margin-right: 20px; */
        text-align: justify;
        text-align-last: justify;
    }

    .message-con {
        flex: 1;
        justify-content: space-between;
    }

    .avatar-img {
        width: 50px;
        height: 50px;
        border-radius: 6px;
        margin-right: 20px;
        border: 1px solid #E5E5E5;
    }

    .change-avatar {
        width: 88px;
        height: 32px;
        border: 1px solid #7438D5;
        border-radius: 4px;
        justify-content: center;
        cursor: pointer;
        color: #7438D5;
    }

    .message-money,
    .message-score {
        margin-right: 30px;
    }

    .page-container {
        justify-content: flex-end;
    }

    .table-img {
        width: 16px;
        height: 16px;
    }

    .date-tip {
        margin-left: 20px;
        color: #999;
    }

    .margin-right-20 {
        margin-right: 20px;
    }

    .el-popover {
        left: 46px;
        top: 10px;
        padding: 16px;
    }

    .popover-container>div {
        margin-bottom: 10px;
    }

    .popover-tip {
        width: 56px;
        color: #666;
        text-align: justify;
        text-align-last: justify;
    }

    .el-table th .cell,
    .el-table td .cell {
        display: block;
        line-height: 44px;
    }

    [v-cloak] {
        display: none
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<div id="userDetail" v-cloak>
    <div class="header-tip">
        基本信息
    </div>
    <div class="message-container">
        <el-row :gutter="60" type="flex" align="stretch">
            <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12">
                <div class="">
                    <div class="message-item display-flex">
                        <div class="display-flex margin-right-20">
                            <div class="message-tip">用户头像</div>:
                        </div>
                        <div class="message-date display-flex">
                            <img class="avatar-img" :src="Fast.api.cdnurl(data.avatar)" alt="" srcset="">
                            <div class="display-flex change-avatar" @click="operation('avatar')">更换头像</div>
                        </div>
                    </div>
                    <div class="message-item display-flex">
                        <div class="display-flex margin-right-20">
                            <div class="message-tip">角色分组</div>:
                        </div>
                        <div class="message-con display-flex">
                            <el-select v-model="data.group_id" placeholder="">
                                <el-option v-for="group in groupList" :key="group" :label="group.name"
                                    :value="group.id">
                                </el-option>
                            </el-select>
                        </div>
                    </div>
                    <div class="message-item display-flex">
                        <div class="display-flex margin-right-20">
                            <div class="message-tip">用户昵称</div>:
                        </div>
                        <div class="message-con display-flex">
                            <el-input v-model="data.nickname" placeholder="请输入用户昵称"></el-input>
                        </div>
                    </div>
                    <div class="message-item display-flex">
                        <div class="display-flex margin-right-20">
                            <div class="message-tip">用户等级</div>:
                        </div>
                        <div class="message-con display-flex">
                            <el-input type="number" v-model="data.level"></el-input>
                        </div>
                    </div>
                    <div class="message-item display-flex">
                        <div class="display-flex margin-right-20">
                            <div class="message-tip">生日</div>:
                        </div>
                        <div class="message-con display-flex">
                            <el-date-picker v-model="data.birthday" type="date" placeholder="选择日期" value-format="yyyy-MM-dd" format="yyyy-MM-dd">
                            </el-date-picker>
                        </div>
                    </div>
                    <div class="message-item display-flex">
                        <div class="display-flex margin-right-20">
                            <div class="message-tip">格言</div>:
                        </div>
                        <div class="message-con display-flex">
                            <el-input v-model="data.bio"></el-input>
                        </div>
                    </div>
                    <div class="message-item display-flex">
                        <div class="display-flex margin-right-20">
                            <div class="message-tip">手机号</div>:
                        </div>
                        <div class="message-con display-flex">
                            <el-input v-model="data.mobile" placeholder="未绑定手机号"></el-input>
                        </div>
                    </div>
                    <div class="message-item display-flex">
                        <div class="display-flex margin-right-20">
                            <div class="message-tip">邮箱</div>:
                        </div>
                        <div class="message-con display-flex">
                            <el-input v-model="data.email" placeholder="请输入邮箱"></el-input>
                        </div>
                    </div>
                    <div class="message-item display-flex">
                        <div class="display-flex margin-right-20">
                            <div class="message-tip">密码</div>:
                        </div>
                        <div class="message-con display-flex">
                            <!-- <el-input v-model="data.password" placeholder="不修改密码请留空"></el-input> -->
                            <el-input v-model="upPassword" placeholder="不修改密码请留空"></el-input>
                        </div>
                    </div>
                    <div class="message-item display-flex">
                        <div class="display-flex margin-right-20">
                            <div class="message-tip">状态</div>:
                        </div>
                        <div class="message-con display-flex">
                            <el-radio-group v-model="data.status">
                                <el-radio label="normal">正常</el-radio>
                                <el-radio label="hidden">禁用</el-radio>
                            </el-radio-group>
                        </div>
                    </div>
                    <!-- <div class="message-item display-flex">
                        <div class="message-tip">邀请人:</div>
                        <div class="message-con display-flex">
                            {{data.password}}
                        </div>
                    </div> -->
                </div>
            </el-col>
            <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12">
                <div style="display: flex;flex-direction: column;justify-content: space-between;height: 100%;">
                    <div>
                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">用户名</div>:
                            </div>
                            <div class="message-con display-flex">
                                <div class="message-money">
                                    {{data.username}}
                                </div>
                            </div>
                        </div>
                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">第三方账号</div>:
                            </div>
                            <div class="message-date display-flex">
                                <el-popover placement="bottom" trigger="hover"
                                    :title="operation('platformname',i.platform)" width="360"
                                    v-for="(i,index) in data.third_platform">
                                    <div class="popover-container">
                                        <div class="display-flex">
                                            <div class="display-flex">
                                                <div class="popover-tip">头像</div>：
                                            </div>
                                            <img class="avatar-img" :src="Fast.api.cdnurl(i.headimgurl)">
                                        </div>
                                        <div class="display-flex">
                                            <div class="display-flex">
                                                <div class="popover-tip">性别</div>：
                                            </div>
                                            <div class="color-7536D0">{{i.sex==2?'女':'男'}}</div>
                                        </div>
                                        <div class="display-flex">
                                            <div class="display-flex">
                                                <div class="popover-tip">国家</div>：
                                            </div>
                                            <div class="color-7536D0">{{i.country}}</div>
                                        </div>
                                        <div class="display-flex">
                                            <div class="display-flex">
                                                <div class="popover-tip">省市</div>：
                                            </div>
                                            <div class="color-7536D0">{{i.province}}-{{i.city}}</div>
                                        </div>
                                        <div class="display-flex">
                                            <div class="display-flex">
                                                <div class="popover-tip">OpenId</div>：
                                            </div>
                                            <div class="color-7536D0">{{i.openid}}</div>
                                        </div>
                                        <div class="display-flex">
                                            <div class="display-flex">
                                                <div class="popover-tip">UnionId</div>：
                                            </div>
                                            <div class="color-7536D0">{{i.unionid}}</div>
                                        </div>
                                        <div class="display-flex">
                                            <div class="display-flex">
                                                <div class="popover-tip">创建时间</div>：
                                            </div>
                                            <div class="color-7536D0">
                                                {{moment(i.createtime*1000).format("YYYY-MM-DD HH:mm:ss")}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ellipsis-item cursor-pointer" slot="reference">
                                        <img :style="{'margin-right':index!=data.third_platform.length-1?'5px':''}"
                                            :src="'/assets/addons/shopro/img/decorate/'+i.platform+'.png'">
                                    </div>
                                </el-popover>
                            </div>
                        </div>

                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">用户性别</div>:
                            </div>
                            <div class="message-con display-flex">
                                <el-radio-group v-model="data.gender">
                                    <el-radio :label="0">女</el-radio>
                                    <el-radio :label="1">男</el-radio>
                                </el-radio-group>
                            </div>
                        </div>
                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">账户余额</div>:
                            </div>
                            <div class="message-con display-flex">
                                <div class="message-money">
                                    {{data.money}}
                                </div>
                                <div class="theme-color cursor-pointer" @click="operation('money')">
                                    充值
                                </div>
                            </div>
                        </div>
                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">账户积分</div>:
                            </div>
                            <div class="message-con display-flex">
                                <div class="message-score">
                                    {{data.score}}
                                </div>
                                <div class="theme-color cursor-pointer" @click="operation('score')">
                                    充值
                                </div>
                            </div>
                        </div>
                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">加入IP</div>:
                            </div>
                            <div class="message-con display-flex">
                                {{data.joinip}}
                            </div>
                        </div>
                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">登录时间</div>:
                            </div>
                            <div class="display-flex">
                                {{moment(data.logintime*1000).format("YYYY-MM-DD HH:mm:ss")}}
                            </div>
                        </div>
                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">连续登录</div>:
                            </div>
                            <div class="display-flex">
                                {{data.successions}}
                                <span class="date-tip">天</span>
                            </div>
                        </div>
                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">连续登录</div>:
                            </div>
                            <div class="display-flex">
                                {{data.maxsuccessions}}
                                <span class="date-tip">最多天数</span>
                            </div>
                        </div>
                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">登录失败</div>:
                            </div>
                            <div class="display-flex">
                                {{data.loginfailure}}
                                <span class="date-tip">次</span>
                            </div>
                        </div>
                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">更新时间</div>:
                            </div>
                            <div class="display-flex">
                                {{moment(data.updatetime*1000).format("YYYY-MM-DD HH:mm:ss")}}
                            </div>
                        </div>
                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">上次登录</div>:
                            </div>
                            <div class="display-flex">
                                {{moment(data.prevtime*1000).format("YYYY-MM-DD HH:mm:ss")}}
                            </div>
                        </div>
                        <div class="message-item display-flex">
                            <div class="display-flex margin-right-20">
                                <div class="message-tip-right">加入时间</div>:
                            </div>
                            <div class="display-flex">
                                {{moment(data.jointime*1000).format("YYYY-MM-DD HH:mm:ss")}}
                            </div>
                        </div>
                    </div>
                    <div class="message-item display-flex">
                        <div class="message-con display-flex" style="justify-content: flex-end;">
                            <div class="dialog-cancel-btn" style="color: #999;" @click="operation('reset')">重置
                            </div>
                            <div class="dialog-define-btn" @click="operation('save')">保存</div>
                        </div>
                    </div>
                </div>
            </el-col>
        </el-row>
    </div>
    <div v-if="logList && activeStatus">
        <div class="display-flex">
            <div class="custom-refresh display-flex-c" @click="getListData(activeStatus)">
                <i class="el-icon-refresh"></i>
            </div>
            <div class="flex-1">
                <el-radio-group v-model="activeStatus" fill="#7536D0" @change="radioChange">
                    <?php if($auth->check('shopro/user/user/money_log')): ?>
                    <el-radio-button label="money_log">余额明细</el-radio-button>
                    <?php endif; if($auth->check('shopro/user/user/score_log')): ?>
                    <el-radio-button label="score_log">积分明细</el-radio-button>
                    <?php endif; if($auth->check('shopro/user/user/order_log')): ?>
                    <el-radio-button label="order_log">订单记录</el-radio-button>
                    <?php endif; ?>
                    <!-- <?php if($auth->check('shopro/user/user/login_log')): ?>
                    <el-radio-button label="login_log">登录记录</el-radio-button>
                    <?php endif; ?> -->
                    <?php if($auth->check('shopro/user/user/share_log')): ?>
                    <el-radio-button label="share_log">分享记录</el-radio-button>
                    <?php endif; if($auth->check('shopro/user/user/goods_favorite')): ?>
                    <el-radio-button label="goods_favorite">收藏商品</el-radio-button>
                    <?php endif; if($auth->check('shopro/user/user/goods_view')): ?>
                    <el-radio-button label="goods_view">浏览足迹</el-radio-button>
                    <?php endif; if($auth->check('shopro/user/user/coupon_log')): ?>
                    <el-radio-button label="coupon_log">优惠券</el-radio-button>
                    <?php endif; ?>
                </el-radio-group>
            </div>
        </div>
        <div class="custom-table-body">
            <el-table ref="multipleTable" :data="logList" tooltip-effect="dark" style="width: 100%" border
                :row-class-name="tableRowClassName">
                <template v-for="(item, index) in columns[activeStatus]">
                    <el-table-column :key="index" :fixed="item.fixed" :prop="item.field" :label="item.title"
                        :align="item.align ? item.align : 'center'" :min-width="item.width">
                        <template slot-scope="scope">
                            <div v-if="item.type=='order'" @click="operation('order',scope.row.id)"
                                class="theme-color cursor-pointer">{{scope.row[item.field]}}</div>
                            <div v-if="item.type=='text'"><span
                                    v-if="scope.row[item.field]">{{scope.row[item.field]}}</span>
                            </div>

                            <div class="display-flex-c" style="width: 100%;" v-if="item.type=='htmls'"
                                v-html="item.formatter(scope.row, item)"></div>

                            <div class="display-flex-c" style="width: 100%;height: 44px;"
                                v-if="item.type=='time' || item.type=='image'" v-html="item.formatter(scope.row, item)">
                            </div>
                            <!-- 分享用户 -->
                            <div class="display-flex-c theme-color cursor-pointer" style="width: 100%;"
                                v-if="item.type=='shareUser'" v-html="item.formatter(scope.row, item)"
                                @click="operation('shareUser',scope.row.user.id)"></div>
                            <!-- 商品信息 -->
                            <div class="display-flex-c theme-color cursor-pointer" style="width: 100%;"
                                v-if="item.type=='shareMessage' && scope.row.type=='goods'"
                                v-html="item.formatter(scope.row, item)"
                                @click="operation(scope.row.type,scope.row[scope.row.type].id)"></div>
                            <!-- 收藏商品,浏览商品 -->
                            <div class="display-flex-c theme-color cursor-pointer" style="width: 100%;"
                                v-if="item.type=='goods'" v-html="item.formatter(scope.row, item)"
                                @click="operation('goods',scope.row.goods.id)"></div>

                            <!-- 拼团 -->
                            <div class="display-flex-c theme-color cursor-pointer" style="width: 100%;"
                                v-if="item.type=='shareMessage' && scope.row.type=='groupon'"
                                v-html="item.formatter(scope.row, item)"
                                @click="operation(scope.row.type,scope.row.id)"></div>

                            <!-- 优惠券 -->
                            <div class="display-flex-c" style="width: 100%;"
                                v-if="item.type=='couponStatus'&& item.formatter(scope.row, item)==0">未使用</div>

                            <div class="display-flex-c theme-color cursor-pointer" style="width: 100%;"
                                v-if="item.type=='couponStatus'&& item.formatter(scope.row, item)==1"
                                @click="operation('order',scope.row.use_order_id)">已使用{{scope.row.user_order_id}}</div>

                            <div v-if="item.type=='price'">{{scope.row[item.field]}}元</div>
                        </template>
                    </el-table-column>
                </template>
            </el-table>
        </div>
        <div class="page-container display-flex">
            <el-pagination @size-change="handleSizeChange" @current-change="handleCurrentChange"
                :current-page="currentPage" :page-sizes="[10, 20, 30, 40]" :page-size="limit"
                layout="total, sizes, prev, pager, next, jumper" :total="totalPage">
            </el-pagination>
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
