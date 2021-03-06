<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:101:"D:\phpstudy_pro\WWW\waibao\pinpin\public/../application/admin\view\shopro\activity\groupon\index.html";i:1613822978;s:76:"D:\phpstudy_pro\WWW\waibao\pinpin\application\admin\view\layout\default.html";i:1611580234;s:73:"D:\phpstudy_pro\WWW\waibao\pinpin\application\admin\view\common\meta.html";i:1611580234;s:75:"D:\phpstudy_pro\WWW\waibao\pinpin\application\admin\view\common\script.html";i:1611580234;}*/ ?>
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
    #groupon-index {
        background: #fff;
        padding: 0 20px 30px;
        font-size: 14px;
        font-family: Source Han Sans SC;
        font-weight: 500;
        color: #666;
    }

    label {
        margin-bottom: 0;
    }

    .display-flex {
        display: flex;
        align-items: center;
    }

    .cursor-pointer {
        cursor: pointer;
        color: #7536d0;
    }

    .groupon-title {
        height: 50px;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .groupon-titles {
        font-weight: 600;
        color: #444;
    }

    .groupon-search {
        width: 236px;
    }

    .select-con {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 14px;
    }

    .select-item {
        margin-right: 14px;
    }

    .el-input {
        width: 236px;
    }

    .el-select .el-input__inner {
        width: 152px;
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

    /* table */

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
        padding: 5px 0;
    }

    .el-table th {
        border-right: none;
    }

    .el-table_1_column_8.is-leaf,
    .el-table_1_column_8,
    .el-table_2_column_12.is-leaf,
    .el-table_2_column_12,
    .el-table_3_column_17.is-leaf,
    .el-table_3_column_17 {
        border-right: 1px solid #EBEEF5 !important;
    }

    .cell {
        text-align: center;
    }

    .el-select .el-input {
        width: 152px;
    }

    .team-img {
        width: 30px;
        height: 30px;
        margin-right: 14px;
    }

    .goods-title {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 294px;
        text-align: left;
    }

    .teamer-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        margin-right: 6px;
    }

    .teamer-avatar-num {
        width: 34px;
        height: 34px;
        background: #A17BDF;
        border-radius: 50%;
        font-size: 14px;
        line-height: 34px;
        text-align: center;
        color: #fff;
    }

    .el-pager li.active,
    .el-pager li:hover {
        color: #7536d0;
    }





    #groupon-detail {
        font-size: 14px;
        font-family: Source Han Sans SC;
        color: #444;
    }

    .groupon-good {
        margin-bottom: 12px;
    }

    .good-item {
        display: flex;
    }

    .good-item-img {
        width: 50px;
        height: 50px;
        margin-right: 12px;
    }

    .goods-title-ellipsis {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 320px;
    }

    .good-num {
        color: #999;
        text-align: left;
    }

    .team-img {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        position: relative;
    }

    .refresh-btn {
        font-size: 14px;
        color: #999;
        position: absolute;
        left: 86px;
        top: 22px;
    }

    .btn-box {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .teamed-btn {
        width: 110px;
        height: 30px;
        border: 1px solid #7943D2;
        border-radius: 4px;
        line-height: 30px;
        text-align: center;
        color: #7943D2;
        margin-right: 30px;
        cursor: pointer;
    }

    .dismiss-btn {
        width: 100px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border: 1px solid #F57272;
        border-radius: 4px;
        color: #F57272;
        cursor: pointer;
    }

    .fictitious-define {
        color: #7943D2;
        cursor: pointer;
    }

    .fictitious-cancel {
        color: #F57272;
        margin-left: 10px;
        cursor: pointer;
    }

    .el-table th {
        background: #F9F9F9;
        padding: 5px 0;
    }

    .dialogDetail .el-table td {
        border-right: none
    }

    .dialogDetail .el-dialog {
        width: 800px;
    }

    /* el-dialog */

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
    .el-table,
    .el-dialog__body {
        font-size: 13px;
    }

    .el-form-item {
        margin-bottom: 10px;
    }

    .el-table__fixed-right::before,
    .el-table__fixed::before {
        height: 0 !important;
    }

    .page-container {
        justify-content: flex-end;
        margin-top: 30px;
    }

    [v-cloak] {
        display: none;
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<script src="/assets/addons/shopro/libs/moment.js"></script>
<div id="groupon-index" v-cloak>
    <div class="groupon-title display-flex">
        <div class="groupon-titles">拼团列表</div>
        <div class="groupon-search">
            <el-input placeholder="请输入关键字" suffix-icon="el-icon-search" v-model="searchKey"
                @keyup.enter.native="callSearch(event)">
            </el-input>
        </div>
    </div>
    <div class="groupon-con">
        <div class="select-con">
            <div class="display-flex">
                <el-select class="select-item" v-model="grouponName" placeholder="请选择" @change="selectChange">
                    <el-option v-for="item in grouponOptions" :key="item.value" :label="item.label" :value="item.value">
                    </el-option>
                </el-select>
                <el-radio-group v-model="statusType">
                    <el-radio-button label="all">全部</el-radio-button>
                    <el-radio-button label="ing">拼团中</el-radio-button>
                    <el-radio-button label="finish">已成团</el-radio-button>
                    <el-radio-button label="invalid">解散&退款</el-radio-button>
                </el-radio-group>
            </div>
        </div>
        <div>
            <el-table :data="grouponData" border style="width: 100%" ref="grouponData">
                <el-table-column prop="id" label="ID" width="80">
                </el-table-column>
                <el-table-column label="拼团商品信息" width="400">
                    <template slot-scope="scope">
                        <div class="display-flex">
                            <img class="team-img" :src="Fast.api.cdnurl(scope.row.goods_image)">
                            <div class="goods-title">{{scope.row.goods_title}}</div>
                        </div>
                    </template>
                </el-table-column>
                <el-table-column prop="createtime" label="开团时间" width="180">
                    <template slot-scope="scope">
                        <span>{{moment(scope.row.createtime*1000).format("YYYY-MM-DD HH:mm:ss")}}</span>
                    </template>
                </el-table-column>
                <el-table-column prop="user_nickname" label="团长" width="120">
                    <template slot-scope="scope">
                        <span>{{scope.row.user_nickname}}</span>
                    </template>
                </el-table-column>
                <el-table-column prop="user_avatar" label="参团人" width="420">
                    <template slot-scope="scope">
                        <div class="display-flex" style="justify-content: center;">
                            <img v-for="i in scope.row.arr" class="teamer-avatar" :src="Fast.api.cdnurl(i.user_avatar)">
                            <!-- <div v-if="scope.row.arr" class="teamer-avatar-num">10</div> -->
                        </div>
                    </template>
                </el-table-column>
                <el-table-column prop="countDown" label="组团有效时间" width="180">
                    <template slot-scope="scope">
                        <span v-if="scope.row.status=='ing'" style="color: #FF4732;">{{scope.row.countDown}}</span>
                        <span v-else>-</span>
                    </template>
                </el-table-column>
                <el-table-column prop="status_text" label="拼团状态" width="115">
                </el-table-column>
                <el-table-column prop="name" label="操作" min-width="100" fixed="right">
                    <template slot-scope="scope">
                        <span class="cursor-pointer" @click="goDetail(scope.row.id,scope.row)">查看详情</span>
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
    <div class="dialogDetail">
        <el-dialog title="拼团详情" :visible.sync="dialogTeamDetail" width="800" :before-close="handleTeamDetailClose">
            <div>
                <div class="groupon-good">
                    <el-table :data="grouponGoodsData" style="width: 100%" border>
                        <el-table-column label="拼团商品">
                            <template slot-scope="scope">
                                <div class="good-item">
                                    <img class="good-item-img" :src="Fast.api.cdnurl(scope.row.goods_image)">
                                    <div>
                                        <div class="goods-title-ellipsis">{{scope.row.goods_title}}</div>
                                        <div class="good-num">数量：{{scope.row.current_num}}</div>
                                    </div>
                                </div>
                            </template>
                        </el-table-column>
                        <el-table-column prop="createtime" label="开团时间" width="160">
                            <template slot-scope="scope">
                                <span>{{moment(scope.row.createtime*1000).format("YYYY-MM-DD HH:mm:ss")}}</span>
                            </template>
                        </el-table-column>
                        <el-table-column prop="num" label="成团人数" width="88">
                        </el-table-column>
                        <el-table-column prop="status_text" label="状态" width="86">
                        </el-table-column>
                    </el-table>
                </div>
                <div class="groupon-team">
                    <el-table :data="grouponTeamList" style="width: 100%" border>
                        <el-table-column prop="is_leader" label="身份" width="100">
                            <template slot-scope="scope">
                                <span v-if="scope.row.is_leader">团长</span>
                                <span v-if="!scope.row.is_leader">团员</span>
                            </template>
                        </el-table-column>
                        <el-table-column prop="avatar" label="头像" width="110">
                            <template slot-scope="scope">
                                <img class="team-img" v-if="scope.row.user_avatar"
                                    :src="Fast.api.cdnurl(scope.row.user_avatar)">
                                <i v-if="scope.row.is_define" class="el-icon-refresh refresh-btn"
                                    @click="refreshTeamer(scope.$index)"></i>
                            </template>
                        </el-table-column>
                        <el-table-column prop="user_nickname" label="昵称" width="218">
                        </el-table-column>
                        <el-table-column prop="createtime" label="参团时间">
                            <template slot-scope="scope">
                                <span>{{moment(scope.row.createtime*1000).format("YYYY-MM-DD HH:mm:ss")}}</span>
                            </template>
                        </el-table-column>
                        <el-table-column label="操作" width="100">
                            <template slot-scope="scope">
                                <span v-if="scope.row.is_define" class="fictitious-define"
                                    @click="defineTeamer(scope.$index,scope.row)">确定</span>
                                <span v-if="scope.row.is_define" class="fictitious-cancel"
                                    @click="cancelTeamer(scope.$index)">取消</span>
                                <span v-if="!scope.row.is_define && scope.row.is_fictitious">虚拟</span>
                            </template>
                        </el-table-column>
                    </el-table>
                </div>
                <div class="btn-box"
                    v-if="(grouponGoodsData[0]?grouponGoodsData[0].num:null) > is_define_grouponTeamListLeng && (grouponGoodsData[0]?grouponGoodsData[0].status:null)=='ing'">
                    <div class="teamed-btn" @click="refreshTeamer(null)">添加虚拟人数</div>
                    <div class="dismiss-btn" @click="dismissTeam">解散&拼团</div>
                </div>
            </div>

            <!-- <span slot="footer" class="dialog-footer">
      <el-button @click="dialogVisible = false">取 消</el-button>
      <el-button type="primary" @click="dialogVisible = false">确 定</el-button>
    </span> -->
        </el-dialog>
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
