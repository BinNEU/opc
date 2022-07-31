

function memoryFormatter(mem){
    if(mem<10240){
        return mem+"KB";
    }
    mem/=1024;
    return mem.toFixed(1)+"MB";
}

window.onload = function(){
//检测pdoResult是否包含了自身数据
var selfContained = false;
for(var i=0; i<pdoResult.length; i++){
    if(pdoResult[i].sid == myData.sid){
        selfContained=true;
        break;
    }
}
if(!selfContained){
    pdoResult.push(myData);
}
timediv=document.getElementById('timechart');
timediv.style.height = 400;
var timeChart = echarts.init(timediv);
//先根据时间来排序
pdoResult.sort((a, b)=>b.time-a.time!=0?b.time-a.time:(a.sid==myData.sid?1:b.sid==myData.sid?-1:0))

{
    var option = {
        title: {
            text: '其他提交的时间占用'
        },
        tooltip: {},
        legend: {
            data:['时间'],
            formatter: '时间占用(ms)'
        },
        xAxis: {
            type: 'value',
            axisLabel:{formatter(obj){return "前"+(obj*100).toFixed(1)+"%"}},
            inverse: true
        },
        yAxis: {},
        series: [{
            name: '时间',
            type: 'line',
            tooltip :{
                formatter(obj){
                    return "前"+(obj.value[0]*100).toFixed(1)+"% "+obj.value[1]+"ms";
                }
            },
            data: []
        }]
    };

    for(var i=0; i<pdoResult.length; i++){
        var value = [(pdoResult.length-i-1)/pdoResult.length, pdoResult[i].time, pdoResult[i]];
        if(pdoResult[i].sid == myData.sid){
            (pdoResult.length-i-1)/pdoResult.length;
            option.series[0].data.push({
                value: value,
                label:{
                    show:true,
                    formatter(obj){return "你的提交："+obj.value[1]+"ms"}
                },
            });
            document.getElementById("ranktext").innerHTML+=
            "你的提交用时"+pdoResult[i].time+"ms，优于"+(((i+1)/pdoResult.length)*100).toFixed(1)+"%的提交<br>";
        }
        else{
            option.series[0].data.push(value);
        }
    }

    timeChart.on('click', function (params) {
        window.open("showsource.php?id="+params.value[2].sid);
    })
    timeChart.setOption(option);
}

memdiv=document.getElementById('memorychart');
memdiv.style.height = 400;
var memChart = echarts.init(memdiv);
//然后数据按照memory来排序
pdoResult.sort((a,b)=>b.memory-a.memory!=0?b.memory-a.memory:(a.sid==myData.sid?1:b.sid==myData.sid?-1:0))

{
    var option = {
        title: {
            text: '其他提交的内存占用'
        },
        tooltip: {},
        legend: {
            data:['内存'],
            formatter: '内存占用(KB)'
        },
        xAxis: {
            type: 'value',
            axisLabel:{formatter(obj){return "前"+(obj*100).toFixed(1)+"%"}},
            inverse: true
        },
        yAxis: {},
        series: [{
            name: '内存',
            type: 'line',
            tooltip :{
                formatter(obj){
                    return "前"+(obj.value[0]*100).toFixed(1)+"% "+memoryFormatter(obj.value[1]);
                }
            },
            data: []
        }]
    };
    for(var i=0; i<pdoResult.length; i++){
        var value = [(pdoResult.length-i-1)/pdoResult.length, pdoResult[i].memory, pdoResult[i]];
        if(pdoResult[i].sid == myData.sid){
            (pdoResult.length-i-1)/pdoResult.length;
            option.series[0].data.push({
                value: value,
                label:{
                    show:true,
                    formatter(obj){return "你的提交："+memoryFormatter(obj.value[1])}
                },
            });
            document.getElementById("ranktext").innerHTML+=
            "占用内存"+memoryFormatter(pdoResult[i].memory)+"，优于"+(((i+1)/pdoResult.length)*100).toFixed(1)+"%的提交<br>";
        }
        else{
            option.series[0].data.push(value);
        }
    }
    memChart.on('click', function (params) {
        window.open("showsource.php?id="+params.value[2].sid);
    })
    memChart.setOption(option);
}
document.getElementById("ranktext").innerHTML+="单击图表对应位置可查看相应提交的代码<br>";

}