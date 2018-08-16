/**
    绉诲姩璁惧鐨勫父鐢↗S鏂规硶
*/

var layers = '';    //寮瑰眰

//鍔犺浇灞�
function Loading(msg){
    layers = layer.open({type: 2,content:msg});
}


//寮瑰眰鎻愮ず
function LayerMsg(msg){
    layers = layer.open({
        content:'<div style="padding:10px 10px;font-size:30px;">'+msg+'</div>'
        ,skin:'msg'
        ,time:4 //2绉掑悗鑷姩鍏抽棴
    });
}


//寮瑰眰鍏虫敞浜岀淮鐮�
function LayerMa(state,img){
    layers = layer.open({
        shadeClose:state,
        content: '<a style="color:#cc2b3e;font-size:25px;">璇峰厛鍏虫敞鎴戜滑鍏紬鍙凤紒闀挎寜鍏虫敞</a><img  style="width:100%;" src="'+img+'"/>',
        style: 'background-color:white; color:#fed770; border:none;text-align:center;',
        //time:10 //2绉掑悗鑷姩鍏抽棴
    });
}


//鍏抽棴寮瑰眰
function CloseLayer(){
    layer.close(layers);
}
