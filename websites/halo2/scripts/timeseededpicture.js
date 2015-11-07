<!--
myDate = new Date();

var m = myDate.getUTCMinutes();

if(m>=0 && m<=4) {
picNumber=4;
}
if(m>=5 && m<8) {
picNumber=1;
}
if(m>=8 && m<13) {
picNumber=0;
}
if(m>=13 && m<17) {
picNumber=11;
}
if(m>=17 && m<22) {
picNumber=13;
}
if(m>=22 && m<27) {
picNumber=3;
}
if(m>=27 && m<32) {
picNumber=9;
}
if(m>=32 && m<36) {
picNumber=2;
}
if(m>=36 && m<42) {
picNumber=14;
}
if(m>=42 && m<45) {
picNumber=10;
}
if(m>=45 && m<49) {
picNumber=12;
}
if(m>=49 && m<51) {
picNumber=8;
}
if(m>=51 && m<54) {
picNumber=6;
}
if(m>=54 && m<58) {
picNumber=5;
}
if(m>=58 && m<=60) {
picNumber=7;
}

var pic = new Array(14);
pic[0] = '8-track';
pic[1] = 'actionreplay';
pic[2] = 'barcode';
pic[3] = 'battle';
pic[4] = 'cheaters';
pic[5] = 'china';
pic[6] = 'elvis';
pic[7] = 'football';
pic[8] = 'games';
pic[9] = 'garage';
pic[10] = 'lasko';
pic[11] = 'me';
pic[12] = 'suicidegame';
pic[13] = 'suicidemanjaro';
pic[14] = 'thewandererlee';

document.write('This picture is seeded to Universal Time ('+myDate.getUTCHours()+':'+myDate.getUTCMinutes()+':'+myDate.getUTCSeconds()+')<br>');
document.write('<center><img src="images/secretcam/'+pic[picNumber]+'.jpg"></center>');
//-->