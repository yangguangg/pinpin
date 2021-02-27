define(['vue'], function (Vue) {
    Vue.directive('dialogDrag', {
        bind(el, binding, vnode, oldVnode) {
            const dialogHeaderEl = el.querySelector('.el-dialog__header');
            const dragDom = el.querySelector('.el-dialog');
     
            dialogHeaderEl.style.cssText += ';cursor:move;'
            dragDom.style.cssText += ';top:0px;'
     
            const sty = (() => {
                if (window.document.currentStyle) {
                    return (dom, attr) => dom.currentStyle[attr];
                } else {
                    return (dom, attr) => getComputedStyle(dom, false)[attr];
                }
            })()
            dialogHeaderEl.onmousedown = (e) => {
                document.onselectstart = function () {
                    return false;
                };
                document.ondragstart = function () {
                    return false;
                };
                $(document).find("iframe").css("pointer-events", "none");
                const disX = e.clientX - dialogHeaderEl.offsetLeft;
                const disY = e.clientY - dialogHeaderEl.offsetTop;
     
                const screenWidth = document.body.clientWidth; 
                const screenHeight = document.documentElement.clientHeight;
     
                const dragDomWidth = dragDom.offsetWidth; 
                const dragDomheight = dragDom.offsetHeight; 
                const minDragDomLeft = dragDom.offsetLeft;
                const maxDragDomLeft = screenWidth - dragDom.offsetLeft - dragDomWidth;
     
                const minDragDomTop = dragDom.offsetTop;
                const maxDragDomTop = screenHeight - dragDom.offsetTop - dragDomheight;
                let styL = sty(dragDom, 'left');
                let styT = sty(dragDom, 'top');
                if (styL.includes('%')) {
                    styL = +document.body.clientWidth * (+styL.replace(/\%/g, '') / 100);
                    styT = +document.body.clientHeight * (+styT.replace(/\%/g, '') / 100);
                } else {
                    styL = +styL.replace(/\px/g, '');
                    styT = +styT.replace(/\px/g, '');
                };
                document.onmousemove = function (e) {
                    let left = e.clientX - disX;
                    let top = e.clientY - disY;
                    if (-(left) > minDragDomLeft) {
                        left = -(minDragDomLeft);
                    } else if (left > maxDragDomLeft) {
                        left = maxDragDomLeft;
                    }
                    if (-(top) > minDragDomTop) {
                        top = -(minDragDomTop);
                    } else if (top > maxDragDomTop) {
                        top = maxDragDomTop;
                    }
     
                    dragDom.style.cssText += `;left:${left + styL}px;top:${top + styT}px;`;
                };
                document.onmouseup = function (e) {
                    document.onselectstart = function () {
                        return true;
                    };
                    $(document).find("iframe").css("pointer-events", "auto");
                    document.onmousemove = null;
                    document.onmouseup = null;
                };
            }
        }
    })
    Vue.component('Chat', {
        template: '#chatTemp',
        props: ['passvalue'],
        data() {
            return {
                isButtonShow: false,
                isClick: false,
                dialogVisible: false,
                lineOptions: [{
                    value: 'online',
                    label: '在线',
                    color: '#7438D5',
                }, {
                    value: 'offline',
                    label: '离开',
                    color: '#ED655F',
                }, {
                    value: 'busy',
                    label: '忙碌',
                    color: '#666666',
                }],
                lineStatus: '',
                liaoData: [{
                    title: '会话中',
                    type: 'buyerOnlines',

                }, {
                    title: '排队中',
                    type: 'buyerWaitings',
                }, {
                    title: '历史记录',
                    type: 'buyerHistories',
                }],
                openGroupList: [],
                groupIndex: 0,

                commonWordsvisible: false,
                sendMessage: '',

                specificChatMessage: [],
                last_id: '',
                page: 1,
                per_page: 10,

                emoji_list: [],
                emojivisible: false,

                websocket: null,
                relink: 0,
                max_relink: 0,
                buylist: {
                    buyerHistories: [],
                    buyerOnlines: [],
                    buyerWaitings: [],
                },

                isChatingId: '',

                temporaryObj: {}, //临时消息的id
                user_offline: [], //用户下线
                shoproKefuShake: false,
                shoproChatContainerRefScrollTop: 0,
                scrollHeight: 0,

                message_num: 10,
                adminData: [],
                commonWordsList: [],
                timeInterval: null,
                kefuButtonvisible: false,
                rightShowId: null,
                rightShowPosition: {
                    top: 0,
                    left: 0
                },
                changeKefu: null,

                changeKefuList: [],
                value: '',
                transferAdminList:''
            }
        },
        created() {
            this.adminData = this.passvalue.adminData;
            this.emoji_list = this.passvalue.emoji_list;
            this.commonWordsList = this.passvalue.commonWordsList;
            if ("WebSocket" in window) {
                this.linkWebSocket(this.passvalue.wsUri, this.passvalue.token, this.passvalue.expire_time, this.passvalue.customer_service_id);
            } else {
                this.$notify({
                    title: '警告',
                    message: `浏览器不支持 WebSocket!`,
                    type: 'warning'
                });
            }
        },
        mounted() {
            this.$nextTick(() => {
                if (localStorage.getItem("shopro_kefu_button_position")) {
                    let left = localStorage.getItem("shopro_kefu_button_position").split(',')[0];
                    let top = localStorage.getItem("shopro_kefu_button_position").split(',')[1];
                    this.$refs.shoproKefuButtonRef.style.left = `${left}px`;
                    this.$refs.shoproKefuButtonRef.style.top = `${top}px`
                    this.isButtonShow = true;
                } else {
                    this.isButtonShow = true;
                }
                window.onresize = () => {
                    return (() => {
                        this.dialogVisible = false;
                        this.$refs.shoproKefuButtonRef.style.left = `unset`;
                        this.$refs.shoproKefuButtonRef.style.top = `80%`;
                        this.rightShowId=null;
                    })();
                };
            })
        },
        methods: {
            closerightShowId(){
                this.rightShowId=null;
                this.$forceUpdate();
            },
            show(e, service_id) {
                if (this.groupIndex == 0) {
                    this.rightShowId = service_id;
                    this.rightShowPosition.top = e.clientY + 'px';
                    this.rightShowPosition.left = e.clientX + 'px';
                }
            },
            transferKfu(value) {
                let data = {
                    session_id: this.rightShowId,
                    identify: 'customer_service',
                    type: 'transfer',
                    data: {
                        customer_service_id: value
                    }
                }
                this.websocket.send(JSON.stringify(data));
                this.rightShowId = null;
            },
            getimageload(index) {
                this.$set(this.specificChatMessage[index], 'hidden', true)
            },
            imagerror(index) {
                this.$set(this.specificChatMessage[index], 'hidden', true)
            },
            linkWebSocket(wsUri, token, expire_time, customer_service_id) {
                wsUri = wsUri + '?identify=customer_service&token=' + token + '&expire_time=' + expire_time + '&customer_service_id=' + customer_service_id
                this.websocket = new WebSocket(wsUri);
                this.websocket.onopen = (evt) => {
                    this.relink = 1;
                    setInterval(() => {
                        let data = {
                            type: 'ping',
                        }
                        this.websocket.send(JSON.stringify(data));
                    }, 20000)

                    clearInterval(this.timeInterval);
                };
                this.websocket.onclose = (evt) => {
                    this.relink = 0;
                    this.isChatingId = '';

                    clearInterval(this.timeInterval);

                    this.timeInterval = setInterval(() => {
                        if (this.relink == 0 && this.max_relink < 4) {
                            this.max_relink++;
                            this.websocket = null;
                            if (Config.modulename == 'admin' && Config.controllername == 'index' && Config.actionname == 'index') {
                                this.linkWebSocket(this.passvalue.wsUri, this.passvalue.token, this.passvalue.expire_time, this.passvalue.customer_service_id);
                            }
                        } else {
                            clearInterval(this.timeInterval);
                        }
                    }, 5000);
                };
                this.websocket.onmessage = (evt) => {
                    let result = JSON.parse(evt.data);
                    let data = result.data;
                    if (result.code) {
                        switch (result.type) {
                            case 'nologin': //请先登录管理后台
                                this.$notify({
                                    title: '警告',
                                    message: '请先登录管理后台',
                                    type: 'warning'
                                });
                                break;
                            case 'no_customer_service': //您还不是客服
                                this.$notify({
                                    title: '警告',
                                    message: '您还不是客服',
                                    type: 'warning'
                                });
                                break;
                            case 'init': //链接成功
                                this.lineStatus = data.customer_service.status;
                                this.buylist.buyerHistories = data.histories;
                                this.buylist.buyerOnlines = data.onlines;
                                this.buylist.buyerWaitings = data.waitings;
                                this.openGroupList = this.buylist[this.liaoData[this.groupIndex].type];
                                break;
                            case 'customer_service_update':
                                if(data.customer_services.length>0){
                                    data.customer_services.forEach((i,index)=>{
                                        if(i.id==this.adminData.customer_service.id){
                                            data.customer_services.splice(index,1)
                                        }
                                    })
                                }
                                this.changeKefuList = data.customer_services;
                                break;
                            case 'transfer_success':
                                this.transferAdminList=''
                                this.buylist.buyerOnlines.forEach((i, index) => {
                                    if (i.session_id == data.session_id) {
                                        this.buylist.buyerOnlines.splice(index, 1)
                                    }
                                })
                                break;

                            case 'user_online': //用户上线
                                if (this.user_offline.includes(data.session_id)) {
                                    this.user_offline.splice(this.user_offline.indexOf(data.session_id), 1)
                                }
                                break;
                            case 'user_offline': //用户下线
                                this.user_offline.push(data.session_id);
                                break;
                            case 'user_accessed': //用户被接入 从排队中删除
                                if (this.buylist.buyerWaitings.length > 0) {
                                    this.buylist.buyerWaitings.forEach((i, index) => {
                                        if (i.session_id == data.session_id) {
                                            this.buylist.buyerWaitings.splice(index, 1)
                                        }
                                    })
                                }
                                //切换列表
                                this.changeGroup(0)
                                break;
                            case 'user_access': //用户接入 从排队中删除，放到会话中
                                this.voicePlay();
                                this.rightShowId=null;
                                if (this.buylist.buyerWaitings.length > 0) {
                                    this.buylist.buyerWaitings.forEach((i, index) => {
                                        if (i.session_id == data.session_id) {
                                            this.buylist.buyerWaitings.splice(index, 1)
                                        }
                                    })
                                }
                                let flag = true
                                if (this.buylist.buyerOnlines.length > 0) {
                                    this.buylist.buyerOnlines.forEach(i => {
                                        if (i.session_id == data.session_id) {
                                            flag = false
                                        }
                                    })
                                }
                                if (flag) {
                                    this.buylist.buyerOnlines.push(data.chat_user)
                                }
                                break;
                            case 'receipt': //发送成功
                                this.$refs.shoproChatContainerRef.scrollTop = this.$refs.shoproChatContainerRef.scrollHeight;
                                $(".shopro-send-pre").empty();
                                break;
                            case 'message': //接收到消息
                                this.voicePlay();
                                this.rightShowId=null;
                                this.kefuButtonvisible = true;
                                if (data.message.message_type == 'text') {
                                    data.message.message = this.replaceEmjio(data.message.message);
                                }
                                if (data.message.message_type == 'goods' || data.message.message_type == 'order') {
                                    data.message.message = JSON.parse(data.message.message);
                                }
                                if (this.isChatingId == data.session_id) {
                                    this.specificChatMessage.push(data.message)
                                } else {
                                    this.buylist.buyerOnlines.forEach(k => {
                                        if (k.session_id == data.session_id) {
                                            k.message_unread_num++
                                        }
                                    })
                                }
                                this.buylist.buyerOnlines.forEach(j => {
                                    if (j.session_id == data.session_id) {
                                        j.last_message = data.message
                                    }
                                })
                                this.$forceUpdate();
                                //调整滚动条
                                this.$nextTick(() => {
                                    this.$refs.shoproChatContainerRef.scrollTop = this.$refs.shoproChatContainerRef.scrollHeight;
                                })
                                this.shoproKefuShake = true
                                break;
                            case 'message_list': //接收到的消息列表
                                data.message_list.data.forEach(i => {
                                    if (i.message_type == 'goods' || i.message_type == 'order') {
                                        i.message = JSON.parse(i.message)
                                    }
                                    if (i.message_type == 'text') {
                                        i.message = this.replaceEmjio(i.message);
                                    }
                                });
                                //拿到this.last_id
                                if (this.page == 1 && data.message_list.data.length > 0) {
                                    this.last_id = data.message_list.data[0].id
                                }
                                this.message_num = JSON.parse(JSON.stringify(data.message_list.data)).length

                                this.specificChatMessage = data.message_list.data.reverse().concat(this.specificChatMessage)
                                //滚动条
                                this.$nextTick(() => {
                                    if (this.page == 1) {
                                        this.$refs.shoproChatContainerRef.scrollTop = this.$refs.shoproChatContainerRef.scrollHeight;
                                    } else {
                                        this.$refs.shoproChatContainerRef.scrollTop = this.$refs.shoproChatContainerRef.scrollHeight - this.scrollHeight;
                                    }

                                    //保存原来的滚动条
                                    this.scrollHeight = this.$refs.shoproChatContainerRef.scrollHeight;

                                    this.$refs.shoproChatContainerRef.removeEventListener("scroll", this.listmore, false);
                                    this.$refs.shoproChatContainerRef.addEventListener('scroll', this.listmore, false)
                                })
                                this.shoproKefuShake = false;

                                break;
                            case 'del_success': //接收到的消息列表
                                this.buylist[this.liaoData[this.groupIndex].type].forEach((i, index) => {
                                    if (i.session_id == data.session_id) {
                                        this.buylist[this.liaoData[this.groupIndex].type].splice(index, 1)
                                    }
                                })
                                break;
                        }

                    } else {
                        this.$notify({
                            title: '警告',
                            message: `错误响应：${result.msg}`,
                            type: 'warning'
                        });
                    }
                };
                this.websocket.onerror = (evt) => {

                };
            },
            listmore() {
                let that = this;
                if (that.$refs.shoproChatContainerRef.scrollTop <= 0 && that.message_num == 10) {
                    this.page++;
                    let ChatingData = {
                        identify: 'customer_service',
                        type: 'message_list',
                        session_id: that.isChatingId,
                        data: {
                            page: that.page,
                            per_page: that.per_page,
                            last_id: that.last_id
                        }
                    }
                    that.websocket.send(JSON.stringify(ChatingData));
                }
            },
            //切换在线状态
            changeLineStatus(value) {
                this.lineStatus = value;
                let lineStatusData = {
                    identify: 'customer_service',
                    type: 'switch_status',
                    data: {
                        status: value
                    }
                }
                this.websocket.send(JSON.stringify(lineStatusData));
            },
            //更换左侧列表
            changeGroup(index) {
                this.isChatingId = '';
                this.groupIndex = index;
                this.openGroupList = this.buylist[this.liaoData[this.groupIndex].type];
            },
            //选择聊天
            selectChating(chatid, index, opt) {

                this.rightShowId = null;

                //避免重复请求
                if (chatid == this.isChatingId && opt) {
                    return false;
                }
                this.isChatingId = chatid;
                this.page = 1;
                this.specificChatMessage = [];
                this.message_num = 10;
                this.scrollHeight = 0;

                //清除未读
                this.buylist[this.liaoData[this.groupIndex].type][index].message_unread_num = 0;
                //将排队中的拿过来
                if (this.groupIndex == 1) {
                    this.buylist.buyerWaitings.splice(index, 1);
                    let data = {
                        session_id: chatid,
                        identify: 'customer_service',
                        type: 'access',
                    }
                    this.websocket.send(JSON.stringify(data)); // 
                } else {
                    let ChatingData = {
                        identify: 'customer_service',
                        type: 'message_list',
                        session_id: this.isChatingId,
                        data: {
                            page: this.page,
                            per_page: this.per_page,
                            // last_id: 第一页不用传，以后一直传 第一页的第一条的消息的 id
                        }
                    }
                    this.websocket.send(JSON.stringify(ChatingData));

                    // 监听这个dom的scroll事件
                    this.$refs.shoproChatContainerRef.removeEventListener("scroll", this.listmore, false);

                }
            },
            deleteChating(chatid, index, opt) {
                let data = {
                    identify: 'customer_service',
                    type: 'del_user',
                    data: {
                        session_id: chatid
                    }
                }
                this.websocket.send(JSON.stringify(data));
            },
            selectCommonWords(index) {
                this.commonWordsvisible = false;
                this.doSend('text', this.commonWordsList[index].content)
                this.specificChatMessage.push(this.initSendData('text', this.commonWordsList[index].content));
            },
            selectEmoji(emoji) {
                this.emojivisible = false
                $(".shopro-send-pre").append(`<img class="emoji" src="${'/assets/addons/shopro/img/emoji/'+emoji.file}"/>`)
            },
            selectGoods() {
                let that = this;
                Fast.api.open("shopro/goods/goods/select?multiple=false", "选择商品", {
                    callback: function (data) {
                        that.doSend('goods', {
                            id: data.data.id,
                            title: data.data.title,
                            image: data.data.image,
                            price: data.data.price,
                            stock: data.data.stock
                        })
                        that.specificChatMessage.push(that.initSendData('goods', data.data));
                    }
                });
            },
            openGoods(id) {
                Fast.api.open("shopro/goods/goods/edit/ids/" + id + "?id=" + id + "&type=edit", '查看商品');
            },
            openOrder(id) {
                Fast.api.open('shopro/order/order/detail?id=' + id, '查看订单');
            },
            successMessage(event) {
                if (event) {
                    //enter
                    if (event.keyCode == "13" && !event.ctrlKey) {
                        event.preventDefault();
                        event.cancelBubble = true;
                        let html = $(".shopro-send-pre").html();
                        var reg = new RegExp( '<div><br></div>' , "g" )
                        html = html.replace(reg, '')
                        if (html) {
                            this.doSend('text', html)
                            this.specificChatMessage.push(this.initSendData('text', html));
                        } else {
                            this.$notify({
                                title: '警告',
                                message: '消息不能为空',
                                type: 'warning'
                            });
                            $(".shopro-send-pre").html('')
                            return false;
                        }
                    } else if (event.keyCode == "13" && event.ctrlKey) {
                        $('.shopro-send-pre').html($('.shopro-send-pre').html() + "<div><br/></div>");
                        var send = $('.shopro-send-pre')[0];
                        //兼容问题
                        if (window.getSelection) {
                            send.focus();
                            var move = window.getSelection();
                            move.selectAllChildren(send);
                            move.collapseToEnd();
                        } else if (document.selection) {
                            var move = document.selection.createRange();
                            move.moveToElementText(send);
                            move.collapse(false);
                            move.select();
                        }
                    }
                } else {
                    //发送按钮
                    if ($(".shopro-send-pre").html()) {
                        this.doSend('text', $(".shopro-send-pre").html())
                        this.specificChatMessage.push(this.initSendData('text', $(".shopro-send-pre").html()));
                    } else {
                        this.$notify({
                            title: '警告',
                            message: '消息不能为空',
                            type: 'warning'
                        });
                        return false;
                    }
                }

            },
            handleClose() {
                this.dialogVisible = false;
                this.shoproKefuShake = false;
                this.kefuButtonvisible=false;
                this.rightShowId=null;
            },
            moveKefu(e) {
                this.isClick = false
                let odiv = e.target;
                document.onselectstart = function () {
                    return false;
                };
                document.ondragstart = function () {
                    return false;
                };
                $(document).find("iframe").css("pointer-events", "none");
                let disX = e.clientX - odiv.offsetLeft;
                let disY = e.clientY - odiv.offsetTop;
                document.onmousemove = (e) => {
                    let left = e.clientX - disX;
                    let top = e.clientY - disY;
                    if (Math.abs(left - this.positionY + top - this.positionX) > 6) {
                        this.isClick = true;
                    }
                    this.positionX = top;
                    this.positionY = left;

                    odiv.style.left = left + 'px';
                    odiv.style.top = top + 'px';

                    var shopro_kefu_button_position = [left, top];
                    localStorage.setItem("shopro_kefu_button_position", shopro_kefu_button_position);
                };
                document.onmouseup = (e) => {
                    document.onselectstart = function () {
                        return true;
                    };
                    document.onmousemove = null;
                    document.onmouseup = null;
                    $(document).find("iframe").css("pointer-events", "auto");
                };
            },
            openDialog() {
                if (!this.isClick) {
                    this.dialogVisible = true;
                    this.kefuButtonvisible = false;
                }
            },
            addfile(event) {
                let that = this;
                let formData = new FormData();
                formData.append("file", that.$refs.inputFileRef.files[0]);
                $.ajax({
                    url: 'ajax/upload',
                    /*接口域名地址*/
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        that.doSend('image', res.data.url)
                        that.specificChatMessage.push(that.initSendData('image', res.data.url))
                    },
                    error: function (e) {
                        layer.msg('文件上传失败');
                    },
                    complete: function () {
                        that.$refs.inputFileRef.value = ""
                    }
                })
            },
            voicePlay() {
                new Audio('/assets/addons/shopro/audio/notice.wav').play();
            },
            //发送消息的数据组装
            doSend(type, message, index) {
                var submessage = message
                if (type == 'text') {
                    let reg = /<img class="emoji".*?(?:>|\/>)/gi; // [] img
                    let zhEmojiName = submessage.match(reg);
                    if (zhEmojiName) {
                        zhEmojiName.forEach(item => {
                            let srcReg = /src=[\'\"]?([^\'\"]*)[\'\"]?/i
                            let path = item.match(srcReg)[1]
                            let pathArr = path.split('/');
                            let file = pathArr[pathArr.length - 1];
                            let noimage = {
                                name: '[常用语]'
                            }
                            let emojiItem = this.selEmjioFile('file', file) ? this.selEmjioFile('file', file) : noimage;
                            submessage = submessage.replace(
                                item, `${emojiItem.name}`
                            );
                        });
                    }
                }
                let data = {
                    session_id: this.isChatingId,
                    identify: 'customer_service',
                    type: 'message',
                    message: {
                        message_type: type,
                        message: submessage
                    },
                }
                this.websocket.send(JSON.stringify(data));
            },

            //发送之前处理数据
            initSendData(type, message) {
                return {
                    message: message,
                    message_type: type,
                    sender_identify: "customer_service",
                    identify: this.adminData.customer_service
                }
            },
            timeFilter(datetime) {
                var hour = ("0" + datetime.getHours()).slice(-2),
                    minute = ("0" + datetime.getMinutes()).slice(-2);
                return hour + ":" + minute;
            },

            // 表情地址
            selEmjioFile(type, value) {
                for (let index in this.emoji_list) {
                    if (this.emoji_list[index][type] === value) {
                        return this.emoji_list[index];
                    }
                }
                return false;
            },
            // 替换表情
            replaceEmjio(data) {
                let newData = data;
                let reg = /\[(.+?)\]/g; // [] 中括号
                let zhEmojiName = newData.match(reg);
                if (zhEmojiName) {
                    zhEmojiName.forEach(item => {
                        let emojiItem = this.selEmjioFile('name', item);
                        newData = newData.replace(
                            item,
                            `<img class="emoji" src="${'/assets/addons/shopro/img/emoji/'+emojiItem.file}"/>`
                        );
                    });
                }
                return newData;
            },
        },
    })
})