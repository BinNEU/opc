//结果映射集
const resultNames = {1: "等待重判", 4:"通过",5: "格式错误",6: "答案错误",7: "时间超限",8: "内存超限",
9: "输出超限", 10:"运行错误", 11:"编译错误",13: "运行完成"};
const resultColors = {4:'#44DD44', 5:"#BB0000", 6:'#DD4444', 7:"#FF9900", 8:"#00CCCC",
9:"#0088CC", 10:'#FFAA00', 11:'#DDAA22'};
resultNameToColor = {};
for(let result in resultNames){resultNameToColor[resultNames[result]]=resultColors[result]}

//基础数据json化
classes = [];
clcs = classConfig.split(/[\n;]/g);
for(let i=0; i<clcs.length; i++){
    let regrst = /([^\[]+)[\[]([^\]]+)[\]]/i.exec(clcs[i]);
    if(regrst!=null){
        let unit = {name: regrst[1], students: regrst[2].split(/\s*,\s*/g)};
        classes.push(unit);
    }
}

pdoData = pdoData.replace(/\t/g, "\\t");
pdoData = pdoData.replace(/\n/g, "\\n");
pdoData = pdoData.replace(/\f/g, "\\f");
//console.log(pdoData);
pdoResult = JSON.parse(pdoData);

Data = Data.replace(/\t/g, "\\t");
Data = Data.replace(/\n/g, "\\n");
Data = Data.replace(/\f/g, "\\f");
//console.log(Data);
newpdoResult = JSON.parse(Data);

Data2 = Data2.replace(/\t/g, "\\t");
Data2 = Data2.replace(/\n/g, "\\n");
Data2 = Data2.replace(/\f/g, "\\f");
//console.log(Data);
newpdoResult2 = JSON.parse(Data2);

Data3 = Data3.replace(/\t/g, "\\t");
Data3 = Data3.replace(/\n/g, "\\n");
Data3 = Data3.replace(/\f/g, "\\f");
//console.log(Data);
newpdoResult3 = JSON.parse(Data3);

LDData = LDData.replace(/\t/g, "\\t");
LDData = LDData.replace(/\n/g, "\\n");
LDData = LDData.replace(/\f/g, "\\f");
//console.log(Data);
LDpdoResult = JSON.parse(LDData);
//数据处理
//样例反馈取出样例，将WA反馈信息的样例取出来
for(let i=0; i<pdoResult.length; i++){
    if(pdoResult[i].result != 6)continue;
    pdoResult[i].simpleError = "";
    if(pdoResult[i].error == null) continue;
    let lines = pdoResult[i].error.split("\n");
    let scanned = false;
    //兼容旧形式的代码
    if(/========[[][\w|\.]+[\]]=========/.test(lines[0]))
    {
        pdoResult[i].simpleError = /========[[]([\w|\.]+)[\]]=========/.exec(lines[0])[1];
    }
    //经过修改的新形式
    for(let j=0; j<lines.length; j++){
        if(/Your first failed sample input/.test(lines[j])){
            scanned = true;
        }
        else if(scanned){
            if(/Your memory and time usage/.test(lines[j])) break;
            pdoResult[i].simpleError += lines[j] + '\n';
        }
    }
    pdoResult[i].simpleError =
    pdoResult[i].simpleError.substring(0, pdoResult[i].simpleError.length);
}

//整理一套按用户排布的数据
let pdoResultByUser = {}
for(let i=0; i<pdoResult.length; i++){
    let result = pdoResult[i];
    if(pdoResultByUser[result.user_id]==undefined){
        pdoResultByUser[result.user_id]=[];
    }
    pdoResultByUser[result.user_id].push(result);
}

//整理一套按班级排布的数据
let pdoResultByClass = {}
for(let i in classes){
    let cls = classes[i];
    pdoResultByClass[cls.name] = {}
    for(let i in cls.students){
        let usr = cls.students[i];
        if(pdoResultByUser[usr]==undefined){
            pdoResultByClass[cls.name][usr] = [];
        }
        else{
            pdoResultByClass[cls.name][usr] = (pdoResultByUser[usr]);
        }
    }
}

//console.log(pdoResultByClass)
//总览
{
    //const colors = {4:"#00FF00"}
    //按提交的提交饼图
   {	 let targetDiv = document.getElementById("overall-typepie1");
     let chart = echarts.init(targetDiv);
let category = [];
let lineData = [];
let barData = [];

for (let i=0; i<pdoResult.length; i++) {
	let date = new Date(pdoResult[i].md-0);
    category.push([
        date.getFullYear(),
        date.getMonth()+1,
        date.getDate()
    ].join('-'));
	
    let b = pdoResult[i].final;
    let d = pdoResult[i].final;
    barData.push(b)
    lineData.push(d);
}


option = {
    title: {
        text: '排名趋势'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data: ['排名']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: category
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name: '排名',
            type: 'line',
            data: barData
        }
    ]
};

// option

chart.setOption(option);
            window.addEventListener("resize", function () {

          chart.resize();

        });

}
	// Generate data
{	 let targetDiv = document.getElementById("echarts");
     let chart = echarts.init(targetDiv);
let category = [];
let category2 = [];
let lineData = [];
let barData = [];

for (let i=0; i<newpdoResult.length; i++) {
    let date = new Date(newpdoResult[i].md-0);
    category.push([
        date.getFullYear(),
        date.getMonth()+1,
        date.getDate()
    ].join('-'));
    let b = newpdoResult[i].shuliandu;
    barData.push(b);
}
for (let i=0; i<newpdoResult2.length; i++) {
    let date2 = new Date(newpdoResult2[i].md-0);
    category2.push([
        date2.getFullYear(),
        date2.getMonth()+1,
        date2.getDate()
    ].join('-'));
    let d = newpdoResult2[i].shuliandu;
    lineData.push(d);
}
option = {
    title: {
        text: '编程熟练度'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data: ['熟练度']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: category
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name: '你的熟练度',
            type: 'line',
            data: barData
        },
		        {
            name: '平均熟练度',
            type: 'line',
            data: lineData
        }
    ]
};

// option

chart.setOption(option);
            window.addEventListener("resize", function () {

          chart.resize();

        });

}
{
    let targetDiv = document.getElementById("leida");
    let chart = echarts.init(targetDiv);
let category = [];
let datas = [];
let barData = [];

for (let i=0; i<LDpdoResult.length; i++) {
	let datalist = [];
    let date = new Date(LDpdoResult[i].md-0);
	let time=[];
	time=[
        date.getFullYear(),
        date.getMonth()+1,
        date.getDate()
    ].join('-');
    category.push(time);
	datalist.push(LDpdoResult[i].point,time,LDpdoResult[i].c);
	datas.push(datalist);
	if(LDpdoResult[i].point!='基本语法')
	datas.push(['基本语法',time,LDpdoResult[i].c],['数据类型、运算符、表达式',time,LDpdoResult[i].c]);
	
}	


var days = ['基本语法', '数据类型、运算符、表达式', '循环控制',
        '顺序、分支结构', '数组', '函数', '指针', '结构体', '对象和类', '其它'];

var data = [['基本语法',0,1]];

data = data.map(function (item) {
    return [item[1], item[0], item[2] || '-'];
});
datas = datas.map(function (item) {
    return [item[1], item[0], item[2] || '-'];
});
option = {
	    title: {
        text: '知识点热力图'
    },
    tooltip: {
        position: 'top',
		formatter:"{c0}"
    },
    grid: {
        height: '50%',
        top: '15%',
		left:'15%'
    },
    xAxis: {
        type: 'category',
        data: category,
        splitArea: {
            show: true
        }
    },
    yAxis: {
        type: 'category',
        data: days,
        splitArea: {
            show: true
        }
    },
    visualMap: {
        min: 0,
        max: 20,
        calculable: true,
        orient: 'horizontal',
        left: 'center',
        bottom: '15%'
    },
    series: [{
        name: '答题次数',
        type: 'heatmap',
        data: datas,
        label: {
            show: false
        },
        emphasis: {
            itemStyle: {
                shadowBlur: 20,
                shadowColor: 'rgba(0, 0, 0, 0.5)'
            }
        }
    }]
};




    chart.setOption(option);
            window.addEventListener("resize", function () {

          chart.resize();

        });
}
{
    let targetDiv = document.getElementById("leida2");
    let chart = echarts.init(targetDiv);
	let score=newpdoResult3[0].score/200;
	if (score>1) score=1;
option = {
    series: [{
        type: 'gauge',
        startAngle: 180,
        endAngle: 0,
        min: 0,
        max: 1,
        splitNumber: 8,
        axisLine: {
            lineStyle: {
                width: 6,
                color: [
                    [0.25, '#FF6E76'],
                    [0.5, '#FDDD60'],
                    [0.75, '#58D9F9'],
                    [1, '#7CFFB2']
                ]
            }
        },
        pointer: {
            icon: 'path://M12.8,0.7l12,40.1H0.7L12.8,0.7z',
            length: '25%',
            width: 5,
            offsetCenter: [0, '-60%'],
            itemStyle: {
                color: 'auto'
            }
        },
        axisTick: {
            length: 12,
            lineStyle: {
                color: 'auto',
                width: 2
            }
        },
        splitLine: {
            length: 20,
            lineStyle: {
                color: 'auto',
                width: 5
            }
        },
        axisLabel: {
            color: '#464646',
            fontSize: 20,
            distance: -60,
            formatter: function (value) {
                if (value === 0.875) {
                    return '优';
                }
                else if (value === 0.625) {
                    return '良';
                }
                else if (value === 0.375) {
                    return '中';
                }
                else if (value === 0.125) {
                    return '差';
                }
            }
        },
        title: {
            offsetCenter: [0, '120%'],
            fontSize: 15
        },
        detail: {
            fontSize: 50,
            offsetCenter: [0, '50%'],
            valueAnimation: true,
            formatter: function (value) {
                return Math.round(value * 100) + '分';
            },
            color: 'auto'
        },
        data: [{
            value: score,
			name:'本成绩由AI综合得出，仅供参考'
        }]
    }]
};




    chart.setOption(option);
            window.addEventListener("resize", function () {

          chart.resize();

        });
}
    //按人头的提交
    {
        let targetDiv = document.getElementById("overall-typepie2");
        let chart = echarts.init(targetDiv);
        //统计
        let counts = {};
        for(let user in pdoResultByUser){
            let lastResult = 0;
            for(let i in pdoResultByUser[user]){
                lastResult = pdoResultByUser[user][i].result;
                if(lastResult==4)break;
            }
            if(counts[lastResult]==undefined){
                counts[lastResult]=0;
            }
            counts[lastResult] += 1;
        }   
        let options = {
            title: {
                text: '提交结果（按人头）'
            },
            tooltip: {formatter:(params)=>{
                if(params.data.name=='通过'){
                    return '通过了: '+params.value;
                }
                return "最后一次尝试为"+params.name+": "+params.value;
            }},
            series: [{
                name: '提交',
                type: 'pie',
                data: [],
                radius: ['0%', '60%'],
            }]
        }
        for(let type in counts){
            let count = counts[type];
            let color = "#666666";
            if(resultColors[type]!=undefined)color = resultColors[type];
            if(resultNames[type]!=undefined){
                type = resultNames[type];
            }
            else{
                console.log("缺失结果映射 "+type);
            }
            options.series[0].data.push({value: count, name:type, itemStyle:{color:color}})
        }
        chart.setOption(options);
    }
    //时间占用分布表（按人头）
    {
        let targetDiv = document.getElementById('overall-timeline');
        let chart = echarts.init(targetDiv);
        //筛选数据，按人头筛选，选取每个用户最快的一个AC提交
        let selectedPdo=[];
        for(let user in pdoResultByUser){
            //找出最快的AC
            let selectedRow = null;
            for(let i in pdoResultByUser[user]){
                let row = pdoResultByUser[user][i];
                if(row.result == 4){//AC
                    if(selectedRow==null || selectedRow.time > row.time){
                        selectedRow = row;
                    }
                }
            }
            if(selectedRow){
                selectedPdo.push(selectedRow);
            }
        }
        //数据排序
        selectedPdo.sort((a, b)=>b.time-a.time)

        {
            let option = {
                title: {
                    text: '按用户的时间占用分布'
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
                            return "前"+(obj.value[0]*100).toFixed(1)+"% "+obj.value[1]+"ms"+
                            "\n"+obj.value[2].user_id;
                        }
                    },
                    data: []
                }]
            };

            for(let i=0; i<selectedPdo.length; i++){
                let value = [(selectedPdo.length-i-1)/selectedPdo.length, selectedPdo[i].time, selectedPdo[i]];

                option.series[0].data.push(value);
            }

            chart.on('click', function (params) {
                window.open("../adminshowsource.php?id="+params.value[2].solution_id);
            })
            chart.setOption(option);
        }

        //内存占用分布表（按人头）
        {
            let targetDiv = document.getElementById('overall-memoryline');
            let chart = echarts.init(targetDiv);
            //筛选数据，按人头筛选，选取每个用户最快的一个AC提交
            let selectedPdo=[];
            for(let user in pdoResultByUser){
                //找出最快的AC
                let selectedRow = null;
                for(let i in pdoResultByUser[user]){
                    let row = pdoResultByUser[user][i];
                    if(row.result == 4){//AC
                        if(selectedRow==null || selectedRow.memory > row.memory){
                            selectedRow = row;
                        }
                    }
                }
                if(selectedRow){
                    selectedPdo.push(selectedRow);
                }
            }
            //数据排序
            selectedPdo.sort((a, b)=>b.memory-a.memory)

            {
                let option = {
                    title: {
                        text: '按用户的内存占用分布'
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
                        name: '时间',
                        type: 'line',
                        tooltip :{
                            formatter(obj){
                                return "前"+(obj.value[0]*100).toFixed(1)+"% "+memoryFormatter(obj.value[1])+
                                "\n"+obj.value[2].user_id;
                            }
                        },
                        data: []
                    }]
                };

                for(let i=0; i<selectedPdo.length; i++){
                    let value = [(selectedPdo.length-i-1)/selectedPdo.length, selectedPdo[i].memory, selectedPdo[i]];

                    option.series[0].data.push(value);
                }

                chart.on('click', function (params) {
                    window.open("../adminshowsource.php?id="+params.value[2].solution_id);
                })
                chart.setOption(option);
            }
        }
    }
}
//图分析
{
    
    let targetDiv = document.getElementById("graph_analysis");
    let chart = echarts.init(targetDiv);
    //首先统计节点和边的数据
    let nodes = {"开始":0, "放弃":0};
    let edges = {};
    for(let user in pdoResultByUser){
        let lastNode = "开始";
        nodes[lastNode]+=1;
        for(let i=0; i<pdoResultByUser[user].length; i++){
            //点
            let node = clusterResult(pdoResultByUser[user][i]);
            if(nodes[node]==undefined){
                nodes[node]=0;
            }
            nodes[node] += 1;
            //边
            let edge = lastNode+"=>"+node;
            if(edges[edge]==undefined){
                edges[edge]=0;
            }
            edges[edge]+=1;
            //提交正确了就不再继续看了
            lastNode = node;
            if(pdoResultByUser[user][i].result==4)break;
        }
        if(lastNode!=resultNames[4]){
            nodes['放弃']+=1;
            if(edges[lastNode+"=>放弃"]==undefined)edges[lastNode+"=>放弃"]=0;
            edges[lastNode+"=>放弃"]+=1;
        }
    }

    let options = {
        title: {
            text: '用户提交行为图分析'
        },
        tooltip: {},
        geo: {},
        series: [
            {
                name:'',
                type: 'graph',
                data: [],
                links: [],
                edgeSymbol: ['none', 'arrow'],
                lineStyle: {
                    color: 'target',
                    curveness: -0.2,
                    
                },
                itemStyle:{opacity:1},
                layout:'force',
                force:{repulsion:1000, gravity:0.05, edgeLength:300},
                //label:{show:true},
                edgeLabel:{show:true, formatter:"{c}"},
                //edgeSymbolSize: [100, 100]
            },
            /*{//画自环的
                id: 'lines',
                name:'lines',
                type: 'lines',
                //symbol: ['none', 'arrow'],
                data:[],
                //large: true,
                symbol: ['none', 'arrow'],
                lineStyle: {
                    curveness: -2,
                },
            }*/
        ],
    }
    //向options输送数据
    //统计最大点和最大边
    let maxNodeValue = 0; for(let node in nodes){if(maxNodeValue<nodes[node])maxNodeValue=nodes[node]}
    let maxEdgeValue = 0;
    for(let edge in edges){
        let a = edge.split("=>");if(a[0]==a[1])continue;
        if(maxEdgeValue<edges[edge])maxEdgeValue=edges[edge];
    }
    
    //点
    let ii = 30;
    for(let node in nodes){
        let unit = {name:node, value:nodes[node]};
        unit.itemStyle={};
        //unit.x = ii; unit.y = ii;ii+=30
        if(node=='开始'){
            unit.x = targetDiv.offsetWidth*0.8; unit.y=targetDiv.offsetHeight*0.9; unit.fixed=true;
            unit.itemStyle = {color: '#555555'}; unit.label = {show:true};
        };
        if(node=='放弃'){
            unit.x = targetDiv.offsetWidth*0.05; unit.y=targetDiv.offsetHeight*0.5; unit.fixed=true;
            unit.itemStyle = {color: '#000000'}; unit.label = {show:true};
        };
        if(node=='通过'){
            unit.x = targetDiv.offsetWidth*0.8; unit.y=targetDiv.offsetHeight*0.1; unit.fixed=true;
            unit.label = {show:true};
        };
        if(resultNameToColor[node]!=undefined){unit.itemStyle.color=resultNameToColor[node]}
        unit.symbolSize = 60*Math.sqrt(unit.value/maxNodeValue);
        if(unit.symbolSize>40)unit.label = {show:true};
        options.series[0].data.push(unit);
    }
    //自己进行力引导迭代
    /*
    let maxEdgeLength = 200;
    let minEdgeLength = 100;
    let G = -10;
    let k = -0.2;
    for(let t=0; t<0; t++){
        for(let i in options.series[0].data){
            let node = options.series[0].data[i];
            if(node.fixed)continue;
            let force = [0,0];
            for(let j in options.series[0].data){
                let node2 = options.series[0].data[j];
                let distance = Math.sqrt((node2.x-node.x)*(node2.x-node.x)+(node2.y-node.y)*(node2.y-node.y));
                
                let fx=0; let fy = 0;
                let v1x,v1y;
                if(distance<1){
                    distance=1; v1x=1; v1y=1;
                }
                else{
                    v1x = (node.x-node2.x)/distance; v1y = (node.y-node2.y)/distance; 
                }
                fx-=v1x*G/distance/distance; fy-=v1y*G/distance/distance;

                let el = edges[node.name+"=>"+node2.name];
                if(el!=undefined){
                    let constantLength = (maxEdgeLength-minEdgeLength)*el/maxEdgeValue+minEdgeLength;
                    console.log(constantLength)
                    fx+=v1x*(distance-constantLength)*k;
                    fy+=v1y*(distance-constantLength)*k;
                }
                el = edges[node2.name+"=>"+node.name];
                if(el!=undefined){
                    let constantLength = (maxEdgeLength-minEdgeLength)*el/maxEdgeValue+minEdgeLength;
                    fx+=v1x*(distance-constantLength)*k;
                    fy+=v1y*(distance-constantLength)*k;
                }
                force[0]+=fx; force[1]+=fy;
            }
            console.log(force)
            options.series[0].data[i].x += force[0]; options.series[0].data[i].y+=force[1];
        }
    }*/
    //边
    for(let edge in edges){
        let a = edge.split("=>");
        if(a[0]==a[1]){
            continue;
        }
        let unit = {source:a[0], target:a[1], value:edges[edge]};
        unit.lineStyle= {width:unit.value*15/maxEdgeValue+0.5};
        unit.symbolSize = 10+unit.value*20/maxEdgeValue+0.5;
        //unit.tooltip = {formatter:"{c}"}
        options.series[0].links.push(unit);
    }
    //自环提示
    for(let edge in edges){
        let a = edge.split("=>");
        if(a[0]!=a[1]){continue;}
        let selfLink = edges[edge];
        // let unit = {coords: [[100, 400],[100, 200]],}
        // unit.value = edges[edge];
        for(let i=0; i<options.series[0].data.length; i++){
            if(options.series[0].data[i].name == a[0]){
                // unit.targetNode = options.series[0].data[i];
                //节点上的tooltip
                options.series[0].data[i].tooltip={
                    formatter:(params)=>{
                        if(params.dataType=='edge')return params.name+" : "+params.value;
                        return options.series[0].data[i].name+": "+options.series[0].data[i].value+
                        "\n自环: "+selfLink;
                    }
                }
                break;
            }
        }
        //options.series[1].data.push(unit)
    }
    chart.setOption(options);
}
//教学考勤操作
{
    let classSelection = document.getElementById('class_selection');

    for(let cls in pdoResultByClass){
        let option = document.createElement("option");  
        option.value = cls; 
        option.innerHTML = cls;  
        classSelection.appendChild(option);  
    }

    classSelection.onchange = function(ev){
        if(ev.target.selectedIndex == 0)return;
        refreshTeach(ev.target.value)
    }
}

//教学考勤画图
function refreshTeach(className){
    let pdrThisClass = pdoResultByClass[className];
    //按提交的提交饼图
    {
        let targetDiv = document.getElementById("teach-typepie");
        let chart = echarts.init(targetDiv);
        chart.clear();
        //统计
        let counts = {};
        for(let user in pdrThisClass){
            for(let i in pdrThisClass[user]){
                let row = pdrThisClass[user][i];
                if(counts[row.result]==undefined){
                    counts[row.result]=0;
                }
                counts[row.result] += 1;
            }
        }
        let options = {
            title: {
                text: '学生提交'
            },
            tooltip: {formatter:"{b}: {c}"},
            series: [{
                name: '提交',
                type: 'pie',
                data: [],
                radius: ['0%', '60%'],
            }],
        }
        for(let type in counts){
            let count = counts[type];
            let color="#666666";
            if(resultColors[type]!=undefined)color = resultColors[type];
            if(resultNames[type]!=undefined){
                type = resultNames[type];
            }
            options.series[0].data.push({value: count, name:type, itemStyle:{color:color}})
        }
        chart.setOption(options);
    }
    //按人头的提交
    {
        let targetDiv = document.getElementById("teach-passpie");
        let chart = echarts.init(targetDiv);
        chart.clear();
        //统计
        let counts = {};
        for(let user in pdrThisClass){
            if(pdrThisClass[user].length==0){
                if(counts['没做题']==undefined)counts['没做题']=[];
                counts['没做题'].push(user);continue;
            }
            let lastResult = 0;
            for(let i in pdrThisClass[user]){
                lastResult = pdrThisClass[user][i].result;
                if(lastResult==4)break;
            }
            if(counts[lastResult]==undefined){
                counts[lastResult]=[];
            }
            counts[lastResult].push(user);
        }
        let options = {
            title: {
                text: '通过情况'
            },
            tooltip: {formatter:(params)=>{
                if(params.data.name=='通过'){
                    return '通过了: '+params.value;
                }
                else if(params.data.name=='没做题')
                    return '没做题: '+params.value;
                return "最后一次尝试为"+params.name+": "+params.value;
            }},
            series: [{
                name: '提交',
                type: 'pie',
                data: [],
                radius: ['0%', '60%'],
            }]
        }
        for(let type in counts){
            let count = counts[type];
            let color = "#666666";
            if(resultColors[type]!=undefined)color = resultColors[type];
            if(resultNames[type]!=undefined){
                type = resultNames[type];
            }
            let unit = {value: count.length, students:count, name:type, itemStyle:{color:color}};
            options.series[0].data.push(unit)
        }
        chart.on('click', function (params) {
            let a = document.getElementById('teach-passa');
            a.innerHTML = params.name+": ";
            for(let i in params.data.students){
                a.innerHTML+=" "+params.data.students[i];
            }
        })
        chart.setOption(options);
    }
    document.getElementById('teach-passa').innerHTML = "点击通过情况上的项目可以查看具体学生";
    //用户提交图
    {
        let targetDiv = document.getElementById("teach-submission");
        let chart = echarts.init(targetDiv);
        chart.clear();
        let options = {
            title: {
                text: '学生提交历史'
            },
            xAxis: {
                data:[''],
                show:false
            },
            yAxis: {},
            series: [],
            tooltip:{
                formatter:(params)=>{
                    let row = params.data.row;
                    return row.user_id+" "+resultNames[row.result];
                }
            }
        }
        for(let user in pdrThisClass){
            //options.xAxis.data.push(user);
            for(let i in pdrThisClass[user]){
                let row = pdrThisClass[user][i];
                let newSeries = {type:'bar'};
                newSeries.stack = user;
                newSeries.data = [{value:1, row:row}];
                newSeries.itemStyle = {
                    color: "#666666"
                }
                if(resultColors[row.result]!=undefined)newSeries.itemStyle.color = resultColors[row.result];
                newSeries.barGap = '5%';
                options.series.push(newSeries);
            }

        }
        chart.on('click', function(params){
            window.open("../adminshowsource.php?id="+params.data.row.solution_id);
        })
        chart.setOption(options);
    }

}


//提交结果分类函数
function clusterResult(row){
    if(row.result!=6){
        if(resultNames[row.result]==undefined){
            console.log("缺失结果映射 "+row.result+" solution_id:"+row.solution_id)
        }
        return resultNames[row.result];
    }
    else{
        //return resultNames[row.result];
        //返回样例
        //console.log(row.error)
        return resultNames[row.result]+row.simpleError;
    }
}
function memoryFormatter(mem){
    if(mem<10240){
        return mem+"KB";
    }
    mem/=1024;
    return mem.toFixed(1)+"MB";
}