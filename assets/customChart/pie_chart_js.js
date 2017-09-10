/* <3 
 http://html5.litten.com/graphing-data-in-the-html5-canvas-element-part-iv-simple-pie-charts/
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


var myColor = ["darkred","orangered","#f0c330","darkseagreen","darkgreen"];
//var myData = [80,23,15,7,1];
var myData = [parseInt(document.getElementById('review_val_0').value),parseInt(document.getElementById('review_val_1').value),parseInt(document.getElementById('review_val_2').value),parseInt(document.getElementById('review_val_3').value),parseInt(document.getElementById('review_val_4').value)];
//myData[0]=document.getElementById('review_val_0').value;
console.log(myData);
var myLabel = ["ভালো নয়","মোটামুটি ভালো","ভালো","খুব ভালো","অসাধারণ"];

function getTotal(){
    var myTotal = 0;
    for (var j = 0; j < myData.length; j++) {
        myTotal += (typeof myData[j] == 'number') ? myData[j] : 0;
    }
    return myTotal;
}

function plotData() {
    var canvas;
    var ctx;
    var lastend = 0;
    var myTotal = getTotal();
    var doc;
    canvas = document.getElementById("canvas");
    var x = (canvas.width)/2;
    var y = (canvas.height)/2;
    var r = 100;

    ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, canvas.width, canvas.height);

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