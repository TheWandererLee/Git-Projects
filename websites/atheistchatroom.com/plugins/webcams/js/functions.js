/*
* init ajax object
*
*/

//Define XmlHttpRequest
var updateUserWebcams = getXmlHttpRequestObject();

/*
* show broadcast cam
*
*/

function showCam()
{
	if(groupCams == 0)
	{
		return false;	
	}

	// if div does not exist
	if(!document.getElementById("broadcastDiv"))
	{
		// create div
		var ni = document.getElementById('userContainer');
		var newdiv = document.createElement('div');

		newdiv.setAttribute("id","broadcastDiv");
		newdiv.className = "";
		newdiv.innerHTML = '<div id="broadcastCam" class="roomheader" onclick="toggleHeader(\'broadcastDiv\');"><img style="vertical-align:middle;" src="plugins/webcams/images/mini.gif">&nbsp;My Webcam</div>';
		newdiv.innerHTML += '<div id="me"></div>';

		ni.appendChild(newdiv);
	}

	// if div does not exist
	if(!document.getElementById("myCam"))
	{
		// create div

		var ni = document.getElementById('me');
		var newdiv = document.createElement('iframe');

		newdiv.setAttribute("id","myCam");
		newdiv.src = "plugins/webcams/BroadcastCam.php";
		newdiv.height="165";
		newdiv.width="220";
		newdiv.frameBorder="0";

		ni.appendChild(newdiv);

	}

}

/*
* show view cam
*
*/

var setZIndex = 1;

function viewCam(divPName,divToName,uStreamUID,uUID)
{
	setZIndex += 1;

	// to user
	if(divToName!=userName)
	{
		var pTitle = divToName;
	}
	else
	{
		var pTitle = divPName;
	}

	// div name
	divPName = "cam_"+uUID;

	// if div exists
	if(!document.getElementById(divPName))
	{
		// create div
		var ni = document.getElementById("pWin"); 

		var newdiv = document.createElement('div');
		newdiv.setAttribute("id",divPName);
		newdiv.className = "webcamTab";
		newdiv.zIndex = setZIndex;

		// title
		newdiv.innerHTML = "<div onmousedown='dragStart(event,\""+divPName+"\");doFocus(\""+divPName+"\")' id='"+divPName+"' class='webcamTitle' style='cursor:move;' onclick=doFocus(\""+divPName+"\")><span style='float:left;'><img style='vertical-align:middle;' src='plugins/webcams/images/mini.gif'>"+decodeURI(pTitle)+"</span><span style='float:right;'><span style='cursor:pointer;' onclick='deleteWebcamDiv(\""+divPName+"\",\"pWin\",\""+uUID+"\")'><img src='images/close.gif'></span>&nbsp;&nbsp;</span></div>";

		// content
		newdiv.innerHTML += "<div id='resizeDiv_"+divPName+"' class='webcamContainer'></div>";
		newdiv.innerHTML += "<div class='selectSizeDiv'>Resize:&nbsp;<select id='selectSize_"+divPName+"' class='selectSize' onchange='resizeWebcam(this.value,\""+divPName+"\");'></select></div>";

		ni.appendChild(newdiv);

		// focus window
		doFocus(divPName);

	}

	// if div does not exist
	if(!document.getElementById("viewCam_"+divPName))
	{
		// create div

		var ni = document.getElementById("resizeDiv_"+divPName);
		var newdiv = document.createElement('iframe');

		newdiv.setAttribute("id","viewCam_"+divPName);
		newdiv.src = "plugins/webcams/ReceiveCam.php?sID="+uStreamUID;

		newdiv.height = "165";
		newdiv.width = "220";

		newdiv.frameBorder="0";

		ni.appendChild(newdiv);

	}

	createSelectSize(divPName);

	// send to DB, user is watching
	watchingWebcam('yes',uUID);

}

/*
* create select size options
*
*/

function createSelectSize(id)
{
	var sel = document.getElementById('selectSize_'+id);
	var size=0;
	var i=1;
	for (i=1;i<=3;i++)
	{
		size += 100;

		if(!document.getElementById("size_"+size))
		{
			var opt = document.createElement("option");
			opt.setAttribute("id","chooseSize_"+size);
			opt.value = size;
			opt.text = size + "%";

  			try 
			{
				// standards compliant; doesn't work in IE
    			sel.add(opt, null); 
  			}
  			catch(ex)
			{
				// IE only
    			sel.add(opt);
  			}

		}

	}

}

/*
* resize web cam 
*
*/

function resizeWebcam(value,div)
{
	switch(value)
	{
		case "100":
			document.getElementById(div).style.width = '220px';
			document.getElementById(div).style.height = '165px';
			document.getElementById("viewCam_"+div).style.width = '220px';
			document.getElementById("viewCam_"+div).style.height = '165px';
			break;
                    
		case "200":
			document.getElementById(div).style.width = '440px';
			document.getElementById(div).style.height = '330px';
			document.getElementById("viewCam_"+div).style.width = '440px';
			document.getElementById("viewCam_"+div).style.height = '330px';
			break;

		case "300":
			document.getElementById(div).style.width = '660px';
			document.getElementById(div).style.height = '495px';
			document.getElementById("viewCam_"+div).style.width = '660px';
			document.getElementById("viewCam_"+div).style.height = '495px';
			break;
                    
		default:
	}
}

/*
* update webcam status
*
*/

function webcamStatus(wid)
{
    // modified 16:40 - 05-02-11 by Paul
    /*if(wid != true)
	{
		// webcam off
		wid = 'off';
	}
	else
	{
		// webcam on
		wid = 'on';
	}*/
    
    switch(wid)
    {
        case true:
        case 'on':
        wid = 'on';
        break;
        
        default:
        wid = 'off';
    }

	var param = '?';
	param +='&myWebcamIs='+wid;

	// if ready to send message to DB
	if (updateUserWebcams.readyState == 4 || updateUserWebcams.readyState == 0)
	{
		updateUserWebcams.open("POST", '../../includes/sendData.php?rnd='+ Math.random(), true);
		updateUserWebcams.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		updateUserWebcams.onreadystatechange = handleSendBlock;
		updateUserWebcams.send(param);
	}

}

function handleSendBlock()
{
	// empty
}

/*
* init webcam request
*
*/

function requestViewWebcam(requestName)
{
	var param = '?';
	param += '&uid='+encodeURI(uID);
	param += '&umid=chatContainer';
	param += '&uname=' + encodeURI(userName);
	param += '&toname=' + encodeURI(requestName);
	param += '&umessage=../avatars/webcam.gif|#000000|12px|Verdana|WEBCAM_REQUEST|0';
	param += '&uroom=0';
	param += '&usfx=0';

	// if ready to send message to DB
	if (sendReq.readyState == 4 || sendReq.readyState == 0) 
	{
		sendReq.open("POST", 'includes/sendData.php?rnd='+ Math.random(), true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = handleSendChat;
		sendReq.send(param);

		showInfoBox("system","200","300","200","","Your webcam request has been sent to "+decodeURI(requestName));

	}

}

/*
* accept webcam request
*
*/

function acceptViewWebcam(acceptName)
{
	var param = '?';
	param += '&uid='+encodeURI(uID);
	param += '&umid=chatContainer';
	param += '&uname=' + encodeURI(userName);
	param += '&toname=' + encodeURI(acceptName);
	param += '&umessage=WEBCAM_ACCEPT';
	param += '&uroom=0';
	param += '&usfx=0';

	// if ready to send message to DB
	if (sendReq.readyState == 4 || sendReq.readyState == 0) 
	{
		sendReq.open("POST", 'includes/sendData.php?rnd='+ Math.random(), true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = handleSendChat;
		sendReq.send(param);
	}

}

/*
* delete div
* 
*/

function deleteWebcamDiv(divID,divContainer,id)
{
	// send to DB, user no longer watching
	watchingWebcam('no',id);

	// if div exists
	if(document.getElementById(divID))
	{
		// remove div
		var d = document.getElementById(divContainer);
		var olddiv = document.getElementById(divID);
		d.removeChild(olddiv);
	}

}

/*
* accept webcam request
*
*/

var watchingCam = '';

function watchingWebcam(a,id)
{
	if(a == 'yes')
	{
		// user is watching webcam
		watchingCam = watchingCam + "|"+id+"|";
	}
	else
	{
		// user has closed webcam
		watchingCam = watchingCam.replace(id,"");
	}

	var param = '?';
	param += '&watching='+watchingCam;

	// if ready to send message to DB
	if (sendReq.readyState == 4 || sendReq.readyState == 0) 
	{
		sendReq.open("POST", 'includes/sendData.php?rnd='+ Math.random(), true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = handleSendChat;
		sendReq.send(param);
	}

}