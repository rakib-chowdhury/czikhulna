/* <3 
 http://html5.litten.com/graphing-data-in-the-html5-canvas2-element-part-iv-simple-pie-charts/
 */
var finalEnlishToBanglaNumber = {
    '0': '০',
    '1': '১',
    '2': '২',
    '3': '৩',
    '4': '৪',
    '5': '৫',
    '6': '৬',
    '7': '৭',
    '8': '৮',
    '9': '৯'
};
String.prototype.getDigitBanglaFromEnglish = function () {
    var retStr = this;
    for (var x in finalEnlishToBanglaNumber) {
        retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
    }
    return retStr;
};

function get_random_color() {
    function c() {
        var hex = Math.floor(Math.random()*256).toString(16);
        return ("0"+String(hex)).substr(-2); // pad with zero
    }
    return "#"+c()+c()+c();
}


//var myColor = ["#39ca74","#e54d42","#f0c330","#3999d8","#35485d"];
var myColor=[];
//var myData = [80,23,15,7,1];
var myData = [];
//myData[0]=document.getElementById('review_val_0').value;

var myLabel = [];

console.log(course_val);

for(cc=0; cc<course_val.length; cc++){
    var get_clr=get_random_color();
    myColor.push(get_clr);
    var x = document.getElementById('pie_chart_2_li_'+cc);
    x.style.color = get_clr;
    var y = document.getElementById('pie_chart2_2_li_'+cc);
    y.style.color = get_clr;
    myData.push(parseInt(course_val[cc][0]['person']));
    myLabel.push(course_val[cc][1]['name']);
}
console.log(myData);
console.log(myLabel);
function getTotal(){
    var myTotal = 0;
    for (var j = 0; j < myData.length; j++) {
        myTotal += (typeof myData[j] == 'number') ? myData[j] : 0;
    }
    return myTotal;
}

function plotData() {
    var canvas2;
    var ctx;
    var lastend = 0;
    var myTotal = getTotal();
    var doc;
    canvas2 = document.getElementById("canvas2");
    var x = (canvas2.width)/2;
    var y = (canvas2.height)/2;
    var r = 100;

    ctx = canvas2.getContext("2d");
    ctx.clearRect(0, 0, canvas2.width, canvas2.height);

    for (var i = 0; i < myData.length; i++) {
        ctx.fillStyle = myColor[i];
        ctx.beginPath();
        ctx.moveTo(x,y);
        ctx.arc(x,y,r,lastend,lastend+(Math.PI*2*(myData[i]/myTotal)),false);
        ctx.lineTo(x,y);
        ctx.fill();

        // Now the pointers
        ctx.beginPath();
        var start = [];
        var end = [];
        var last = 0;
        var flip = 0;
        var textOffset = 0;
        var precentage = (myData[i]/myTotal)*100;
        start = getPoint(x,y,r-20,(lastend+(Math.PI*2*(myData[i]/myTotal))/2));
        end = getPoint(x,y,r+20,(lastend+(Math.PI*2*(myData[i]/myTotal))/2));
        if(start[0] <= x)
        {
            flip = -1;
            textOffset = -110;
        }
        else
        {
            flip = 1;
            textOffset = 10;
        }
        ctx.moveTo(start[0],start[1]);
        ctx.lineTo(end[0],end[1]);
        ctx.lineTo(end[0]+120*flip,end[1]);
        ctx.strokeStyle = "#bdc3c7";
        ctx.lineWidth   = 2;
        ctx.stroke();
        // The labels
        ctx.font="17px Arial";
        ctx.fillText(precentage.toFixed(2).getDigitBanglaFromEnglish()+"%",end[0]+textOffset,end[1]-4);
        // Increment Loop
        lastend += Math.PI*2*(myData[i]/myTotal);

    }
}
// Find that magical point
function getPoint(c1,c2,radius,angle) {
    return [c1+Math.cos(angle)*radius,c2+Math.sin(angle)*radius];
}
// The drawing
plotData();