<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:93:"/www/wwwroot/admin.lexlee.top/public/../application/admin/view/shopro/goods/goods/select.html";i:1613822978;s:72:"/www/wwwroot/admin.lexlee.top/application/admin/view/layout/default.html";i:1611580233;s:69:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/meta.html";i:1611580233;s:71:"/www/wwwroot/admin.lexlee.top/application/admin/view/common/script.html";i:1611580233;}*/ ?>
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
    #goodsSelect {
        background: #fff;
        overflow: auto;
        color: #444;
        margin: -15px;
    }


    .dialog-left {
        width: 220px;
        border-right: 1px solid #e6e6e6;
        height: 100vh;
        padding: 9px 20px;
        overflow: auto;
    }

    .dialog-left::-webkit-scrollbar {
        width: 6px;
    }

    .dialog-left::-webkit-scrollbar-thumb {
        width: 6px;
        background: #e6e6e6;
        height: 20px;
        border-radius: 3px;
    }

    .dialog-right {
        height: 100vh;
        flex: 1;
    }

    .dialog-search {
        /* height: 50px;
        border-bottom: 1px solid #e6e6e6;
        padding-left: 20px; */
        padding: 9px 0;
        justify-content: space-between;
    }

    .dialog-search .el-input {
        width: 240px;

    }

    .dialog-search .el-input__inner {
        background: #F9F9F9;
        border: none;
    }

    .dialog-right-body {
        padding: 0 20px;
        height: calc(100vh - 62px);
        overflow: auto;
    }

    .dialog-footer {
        padding: 15px 20px;
        justify-content: space-between;
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

    .goods-item {
        width: 240px;
        height: 60px;
        background: #FFFFFF;
        border: 1px solid #E6E6E6;
        box-sizing: border-box;
        border-radius: 4px;
        padding: 8px;
        margin-right: 14px;
        margin-bottom: 14px;
        position: relative;
    }

    .goods-item-active {
        border-color: #7438D5;
    }

    .active-icon {
        width: 22px;
        height: 22px;
        position: absolute;
        right: -1px;
        top: -1px;
        display: none;
    }

    .goods-image {
        width: 44px;
        height: 44px;
        border: 1px solid #E6E6E6;
        border-radius: 3px;
        margin-right: 10px;
    }

    .goods-message {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex: 1;
        height: 100%;
    }

    .goods-bodys {
        justify-content: space-between;
        height: 20px;
    }

    .goods-price {
        color: #ED655F;
    }

    .goods-stock {
        color: #999;
    }

    .goods-container {
        flex-wrap: wrap;
        /* padding-top: 20px; */
    }

    .el-pagination.is-background .el-pager li:not(.disabled).active {
        background: #7438D5;
    }

    .el-image {
        height: 100%;
        width: 100%;
    }

    .image-slot {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .level-item-1,
    .level-item-2,
    .level-item-3,
    .level-item-4 {
        height: 26px;
        line-height: 26px;
        display: flex;
        align-items: center;
    }

    .level-item-2 {
        padding-left: 20px;
    }

    .level-item-3 {
        padding-left: 40px;
    }

    .level-item-4 {
        padding-left: 73px;
    }

    .el-icon-arrow-down {
        color: #666;
    }

    .arrow-open {
        transform: rotateZ(90deg);
        transition: transform .25s linear;
    }

    .arrow-selected {
        color: #7438D5;
        background: rgba(116, 56, 213, 0.14);
        border-radius: 4px;
    }

    .item-name {
        cursor: pointer;
        flex: 1;
    }

    .el-icon-caret-right {
        color: #666;
    }

    .i-container {
        /* width: 13px;
        height: 13px; */
        margin-right: 6px;
    }

    [v-cloak] {
        display: none
    }
</style>
<script src="/assets/addons/shopro/libs/vue.js"></script>
<script src="/assets/addons/shopro/libs/element/element.js"></script>
<div id="goodsSelect" v-cloak>
    <div class="dialog-body display-flex">
        <div class="dialog-left">
            <div v-for="(level1,p) in goodsData" :key="p">
                <div class="level-item-1" :class="level1.selected?'arrow-selected':''">
                    <div class="i-container">
                        <i v-if="level1.children && level1.children.length>0" class="el-icon-caret-right"
                            :class="level1.show?'arrow-open':''" @click="showLeft(p, null, null,null)"></i>
                    </div>
                    <span class="item-name" @click="selectCategoryLeft(p, null, null,null)">{{level1.name}}</span>
                </div>
                <el-collapse-transition v-for="(level2,c) in level1.children">
                    <div :key="c" v-show="level1.show">
                        <div class="level-item-2" :class="level2.selected?'arrow-selected':''">
                            <div class="i-container">
                                <i v-if="level2.children && level2.children.length>0" class="el-icon-caret-right"
                                    :class="level2.show?'arrow-open':''" @click="showLeft(p, c, null,null)"></i></div>
                            <span class="item-name" @click="selectCategoryLeft(p, c, null,null)">{{level2.name}}</span>
                        </div>
                        <el-collapse-transition v-for="(level3,a) in level2.children">
                            <div :key="a" v-show="level2.show">
                                <div class="level-item-3" :class="level3.selected?'arrow-selected':''">
                                    <div class="i-container">
                                        <i v-if="level3.children && level3.children.length>0"
                                            class="el-icon-caret-right" :class="level3.show?'arrow-open':''"
                                            @click="showLeft(p, c, a,null)"></i></div>
                                    <span class="item-name"
                                        @click="selectCategoryLeft(p, c, a,null)">{{level3.name}}</span>
                                </div>
                                <el-collapse-transition v-for="(level4,s) in level3.children">
                                    <div :key="s" v-show="level3.show">
                                        <div class="level-item-4" :class="level4.selected?'arrow-selected':''">
                                            <!-- <i class="el-icon-caret-right" @click="showLeft(p, c, a,s)"></i> -->
                                            <span class="item-name"
                                                @click="selectCategoryLeft(p, c, a,s)">{{level4.name}}</span>
                                        </div>
                                    </div>
                                </el-collapse-transition>
                            </div>
                        </el-collapse-transition>
                    </div>
                </el-collapse-transition>
            </div>
        </div>
        <div class="dialog-right">
            <div class="dialog-right-body">
                <div class="dialog-search display-flex">
                    <div>
                        <span v-if="!isAll && multiple=='true'" class="theme-color cursor-pointer"
                            @click="checkedAll(true)">全选</span>
                        <span v-if="isAll && multiple=='true'" class="cursor-pointer"
                            @click="checkedAll(false)">全不选</span>
                    </div>
                    <el-input size="small" placeholder="请输入搜索内容" v-model="searchWhere">
                        <i slot="prefix" class="el-input__icon el-icon-search"></i>
                    </el-input>
                </div>
                <!-- -->
                <div class="goods-container display-flex">
                    <div class="goods-item display-flex" :class="(selectedIdsArr.includes(item.id) || item.id==selectedItem.id)?'goods-item-active':''"
                        v-for="(item,index) in goodsList" @click="selectGoods(item,index)">
                        <div class="goods-image">
                            <el-image :src="Fast.api.cdnurl(item.image)" fit="contain">
                                <div slot="error" class="image-slot">
                                    <i class="el-icon-picture-outline"></i>
                                </div>
                            </el-image>
                        </div>
                        <div class="goods-message">
                            <div class="display-flex">
                                <div style="margin-right:10px">{{item.id}}</div>
                                <div class="goods-title ellipsis-item">{{item.title}}</div>
                            </div>

                            <div class="goods-bodys display-flex">
                                <div v-if="item.activity_type">
                                    <div class="goods-price" v-if="item.activity_type=='seckill'" style="width: 36px;
                                height: 20px;text-align: center;
                                background: rgba(255, 132, 118, 0.1);
                                border: 1px solid rgba(255, 132, 118, 0.5);font-size: 12px;
line-height: 20px;color: #FF8476;border-radius: 4px;">{{item.activity_type_text}}</div>
                                    <div class="goods-price" v-if="item.activity_type=='groupon'" style="width: 36px;
                                height: 20px;text-align: center;
                                background: rgba(162, 104, 255, 0.1);
border: 1px solid rgba(162, 104, 255, 0.5);font-size: 12px;
line-height: 20px;color: #A268FF;border-radius: 4px;">{{item.activity_type_text}}</div>
                                </div>
                                <div v-if="!item.activity_type && item.app_type=='score'" style="width: 36px;
                                height: 20px;text-align: center;
                                background: rgba(251, 175, 61, 0.1);
border: 1px solid rgba(251, 175, 61, 0.5);font-size: 12px;
line-height: 20px;color: #FBAF3D;border-radius: 4px;">{{item.app_type_text}}</div>
                                <div></div>
                                <div class="goods-stock">库存：{{item.stock}}</div>
                            </div>
                        </div>
                        <img :style="{display:(selectedIdsArr.includes(item.id) || item.id==selectedItem.id)?'block':'none'}" class="active-icon"
                            src="/assets/addons/shopro/img/goods/active.png">
                    </div>
                </div>
            </div>
            <div class="dialog-footer display-flex">
                <div>
                    <el-pagination background layout="prev, pager, next" :total="totalPage" pager-count="12"
                        @prev-click="changeClick" @next-click="changeClick" @current-change="changeClick"
                        :current-page="currentPage" page-size="12">
                    </el-pagination>
                </div>
                <div class="display-flex">
                    <div @click="operation('define')" class="operation-button define-button">确定</div>
                </div>
            </div>
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
