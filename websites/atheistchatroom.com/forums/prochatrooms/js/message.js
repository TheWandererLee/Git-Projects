/*
* add message
*
*/

var message;
var isPrivate = '';
var hideAdmins = 1;
var autoApprove = 1;

function addMessage(inputMDiv,displayMDiv)
{
	if(eCredits == '1' && displayMDiv.search(/pcontent_/i) != '-1')
	{

		var eCreditCount = document.getElementById('eCreditsID').innerHTML;

		if(eCreditCount <= 0)
		{
			/* create messages */
			var eCreditMessageA = "You have 0 eCredits left. Please purchase more eCredits to continue this private conversation.";
			var eCreditMessageB = " has 0 eCredits left.";
		
			/* show sender 'you have no ecredits' */
			message = "../images/notice.gif|"+stextColor+"|"+stextSize+"|"+stextFamily+"|"+eCreditMessageA+"|1";
			createMessageDiv('1',uID,displayMDiv,showMessages+1,message,'beep_high.mp3','','');
			
			/* show receiver that 'sender has no ecredits' */			
			message = "../images/notice.gif|"+stextColor+"|"+stextSize+"|"+stextFamily+"|"+eCreditMessageB+"|1";
			
			/* send data */
			sendData(displayMDiv);

			/* clear message input field */
			clrMessageInput(inputMDiv);
			return false;
		}
	}
		
	if(groupChat == 0)
	{
		showInfoBox("system","200","300","200","",lang6);
		return false;		
	}

	if(groupPChat == 0 && document.getElementById('whisperID').value != '')
	{
		showInfoBox("system","200","300","200","",lang6);
		return false;		
	}

	if(isSilenced == 1)
	{
		showInfoBox("system","200","300","200","",lang7+" "+silent+" "+lang8);
		return false;
	}

	if(moderatedChat == 1)
	{
		autoApprove = 0;

		if(admin || moderator || speaker)
		{
			autoApprove = 1;	
		}

		if(autoApprove == 0)
		{
			showInfoBox("system","200","300","200","",lang9);
		}
	}

	// if user is trying to flood the chat room
	if(lastPost < floodChat)
	{
		showInfoBox("system","200","300","200","",lang10);
		return false;
	}
	
	// default sfx
	sfx = 'beep_high.mp3';

	// get user message
	message = document.getElementById(inputMDiv).value;
	
	message = message.replace(/&/gi,"&amp;");
	message = message.replace(/</gi,"&#60;");
	message = message.replace(/>/gi,"&#62;");
	message = message.replace(/`/gi,"&#96;");
	message = message.replace(/'/gi,"&#39;");
	message = message.replace(/"/gi,"&#34;");
	message = message.replace(/%/gi,"&#37;");
	message = message.replace(/\|/gi,"&#127;");
	
	// filter badwords in message
	message = filterBadword(message);	

	// check whisper contains a message
	if(message.replace(/\s/g,"") == "")
	{
		showInfoBox("system","200","300","200","",lang11);
		return false;
	}	

	var mStatus = 0;
	var iRC = '';

	// IRC commands
	ircCommand = message.split(" ");

	// IRC action
	if(ircCommand[0] == '/me')
	{
		message  = " " + message.slice(ircCommand[0].length+1) + " ...";

		iRC = '1';
	}

	// IRC broadcast
	if(ircCommand[0] == '/broadcast')
	{
		if(admin || moderator)
		{
			sfx = 'beep_high.mp3';

			message  = "BROADCAST " + encodeURI(message.slice(ircCommand[0].length));

			iRC = '1';
		}
		else
		{
			showInfoBox("system","200","300","200","",lang45);
			return false;
		}
	}

	// IRC ringbell
	if(ircCommand[0] == '/ringbell')
	{
		sfx = 'ringbell.mp3';

		message  = message.slice(ircCommand[0].length+1) + " "+lang12+" ... ";

		iRC = '1';
	}

	// IRC sfx
	if(ircCommand[0] == '/play')
	{
		// check /play contains a SFX 
		if(!ircCommand[1] || ircCommand[1].replace(/\s/g,"") == "")
		{
			showInfoBox("system","200","300","200","",lang13);
			return false;
		}

		// check the SFX exists
		// convert SFX array to string then search string for match
		if(mySFX.toString().lastIndexOf(ircCommand[1]+".mp3") == -1)
		{
			showInfoBox("system","200","300","200","",lang14);

			// display SFX window
			// now user can choose from list
			createSFX();toggleBox('sFXWin');

			return false;
		}

		sfx = "sfx/"+ircCommand[1]+".mp3";

		message  = "** "+message.slice(ircCommand[0].length+1)+" **";

	}

	// IRC roll dice
	if(ircCommand[0] == '/roll')
	{
		// check /roll contains dice (eg. 2d4) 
		if(!ircCommand[1] || ircCommand[1].replace(/\s/g,"") == "")
		{
			showInfoBox("system","200","300","200","",lang15);
			return false;
		}

		var diceRoll = ircCommand[1].split("d");

		var x = 1;
		var totalRoll = 0;
		var diceScore = 0;
		var diceModifier = '';
		var singleRoll = new Array();

		// roll each dice
		for (x = 1; x <= diceRoll[0]; x++)
		{
			singleRoll[x-1] = Math.floor(Math.random()*diceRoll[1]+1)
		}

		// add total of all dice rolled
		for (x = 0; x < singleRoll.length; x++)
		{
			totalRoll += Math.floor(singleRoll[x]);
		}

		// include dice modifier
		if(Number(ircCommand[2]))
		{
			diceModifier = Number(ircCommand[2]);
		}

		// format result
		diceScore = "( Result: "+singleRoll+", "+diceModifier+" Total: "+Number(totalRoll+diceModifier)+" )";

		message = message +" "+diceScore;

	}

	// add bold font
	if(mBold == 1)
	{
		message = "[b]"+message+" [/b]";
	}

	// add italic font
	if(mItalic == 1)
	{
		message = "[i]"+message+" [/i]";
	}

	// add italic font
	if(mUnderline == 1)
	{
		message = "[u]"+message+" [/u]";
	}

	// search message for line breaks
	var addLineBreaks = 0;
	if(message.search(/(\r\n|\n|\r)/gm) != '-1')
	{
		addLineBreaks = 1;
	}

	// IRC whisper
	if(document.getElementById('whisperID').value != '')
	{
		isPrivate = document.getElementById('whisperID').value;

		sfx = 'beep_high.mp3';

		message  = " &#187; " + encodeURI(isPrivate) + ": " + encodeURI(message);

		iRC = '1';
	}

	message = userAvatar+"|"+textColor+"|"+textSize+"|"+textFamily+"|"+message+"|"+iRC+"|"+addLineBreaks;

	// update users text style (cookie)
	createCookie('myTextStyle',encodeURI(mBold+"|"+mItalic+"|"+mUnderline+"|"+textColor+"|"+textSize+"|"+textFamily),30);

	// send data to database
	sendData(displayMDiv);

	// create message
	if(autoApprove)
	{
		createMessageDiv(mStatus, uID, displayMDiv, showMessages+1, message, sfx, userName, '','');
	}

	// clear message input field
	clrMessageInput(inputMDiv);

	// restart flood counter
	lastPost = 1;
	
	// create bot reponse
	if(intelliBot == 1 && Number(intellibotRoomID) == Number(roomID) && displayMDiv == 'chatContainer')
	{
		doIntellibot(message,userName);
	}	

}

/*
* send message to database
*
*/

// define XmlHttpRequest
var sendReq = getXmlHttpRequestObject();

function sendData(displayMDiv)
{
	message = message.replace(/\+/gi,"&#43;");

	var param = '?';

	param += '&uid=' + uID;
	param += '&umid=' + displayMDiv;
	param += '&uroom=' + roomID;
	param += '&uname=' + encodeURI(userName);
	param += '&toname=' + encodeURI(isPrivate);
	param += '&umessage=' + encodeURIComponent(message);
	param += '&usfx=' + escape(sfx);	

	// if ready to send message to DB
	if (sendReq.readyState == 4 || sendReq.readyState == 0) 
	{
		sendReq.open("POST", 'includes/sendData.php?rnd='+ Math.random(), true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = handleSendChat;
		sendReq.send(param);
	}

	// reset isPrivate 
	isPrivate = '';

}

/*
* send avatar to database
*
*/

function sendAvatarData()
{
	var param = '?';

	param += '&uname=' + encodeURI(userName);
	param += '&uavatar=' + escape(userAvatar);	

	// if ready to send message to DB
	if (sendReq.readyState == 4 || sendReq.readyState == 0) 
	{
		sendReq.open("POST", 'includes/sendData.php?rnd='+ Math.random(), true);
		sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		sendReq.onreadystatechange = handleSendChat;
		sendReq.send(param);
	}

}

function handleSendChat()
{
	// empty
}

/*
* get message from database
*
*/

// define XmlHttpRequest
var receiveMesReq = getXmlHttpRequestObject();
var showHistory = 1;

// gets the messages
function getMessages() 
{
	var singleRoom = '';

	if(totalRooms == '1')
	{
		singleRoom = roomID;
	}

	if (receiveMesReq.readyState == 4 || receiveMesReq.readyState == 0) 
	{
		receiveMesReq.open("GET", 'includes/getData.php?roomID='+roomID+'&history='+showHistory+'&last='+lastMessageID+'&s='+singleRoom+'&rnd='+ Math.random(), true);
		receiveMesReq.onreadystatechange = handleMessages; 
		receiveMesReq.send(null);
	}
			
}

// function for handling the messages

var mTimer = setInterval('getMessages();',refreshRate);
var xmlError = 0;
var roomNameStr;
var eCredits = 0;
var moderatedChat = 0;

function handleMessages() 
{
	if (receiveMesReq.readyState == 4) 
	{
		var xmldoc = receiveMesReq.responseXML;

		if(xmldoc == null)
		{
			if(xmlError < 3)
			{
				if(xmlError == 2)
				{
					// if error, alert user and try to reconnect to database
					showInfoBox("system","200","300","200","",lang16);
				}

				// update the error count
				xmlError += 1;

				// lets try and get the data again
				getMessages();
				return false;
			}
			else
			{
				// oops, connection has now failed 3 times
				// this could be for the following reasons,
				// a) incorrect data file name
				// b) database not responding
				// c) server under too much load to respond in time
				showInfoBox("system","200","300","200","",lang17);
				return false;
			}
		}		

		// userroom data
		var allRooms_nodes = xmldoc.getElementsByTagName("userrooms"); 
		totalRooms = allRooms_nodes.length;

		roomNameStr = '';

		for (i = 0; i < totalRooms; i++) 
		{
			var rID_node = allRooms_nodes[i].getElementsByTagName("id");
			var rRoomID_node = allRooms_nodes[i].getElementsByTagName("roomid");
			var rRoomName_node = allRooms_nodes[i].getElementsByTagName("roomname");
			var rRoomOwner_node = allRooms_nodes[i].getElementsByTagName("roomowner");
			var rRoomUsers_node = allRooms_nodes[i].getElementsByTagName("roomusers");
			var rRoomDel_node = allRooms_nodes[i].getElementsByTagName("roomdel");
			var rRoomStream_node = allRooms_nodes[i].getElementsByTagName("roomstream");
			var rRoomStreamer_node = allRooms_nodes[i].getElementsByTagName("roomstreamer");

			// moderated chat
			var rModChat_node = allRooms_nodes[i].getElementsByTagName("moderated");
			moderatedChat = rModChat_node[0].firstChild.nodeValue;

			createSelectRoomdiv(
						rRoomName_node[0].firstChild.nodeValue, 
						rRoomID_node[0].firstChild.nodeValue,
						rRoomDel_node[0].firstChild.nodeValue
					);

			createRoomsdiv(
						rRoomName_node[0].firstChild.nodeValue, 
						rRoomID_node[0].firstChild.nodeValue,
						rRoomDel_node[0].firstChild.nodeValue
					);

			// create room name str
			roomNameStr = roomNameStr + "|" + rRoomName_node[0].firstChild.nodeValue.toLowerCase() + "|";

			// if room is deleted, remove from userlist and select box
			if(rRoomDel_node[0].firstChild.nodeValue == Number(1))
			{
				deleteDiv("select_"+rRoomID_node[0].firstChild.nodeValue,'roomSelect')

				removeRoomsDiv("room_"+rRoomID_node[0].firstChild.nodeValue);

				roomNameStr = roomNameStr.replace("|" + rRoomName_node[0].firstChild.nodeValue.toLowerCase() + "|","");
			}

			// update room users count
			if(document.getElementById("userCount_"+rRoomID_node[0].firstChild.nodeValue))
			{
				document.getElementById("userCount_"+rRoomID_node[0].firstChild.nodeValue).innerHTML = 0;
			}
			
			// update room current webcam stream
			if (roomID == rRoomID_node[0].firstChild.nodeValue) {
				if (currentlyBroadcasting != rRoomStream_node[0].firstChild.nodeValue) { // If nothing has changed, don't change anything else.
					currentlyBroadcasting = rRoomStream_node[0].firstChild.nodeValue;
					currentlyBroadcaster = rRoomStreamer_node[0].firstChild.nodeValue;
					//document.getElementById('debugSpan13').innerHTML = '<u>'+currentlyBroadcasting+'</u>'; // Debug for span on template
					
					// Kill webcam if it is currently being viewed
					if (currentlyBroadcasting == 0 && document.getElementById('viewCam_BC')) {
						//Terminate broadcast
						var d = document.getElementById("pWin");
						var olddiv = document.getElementById("viewCam_BC");
						d.removeChild(olddiv);
					} else if (currentlyBroadcasting != 0) {
						
						var bcStream = currentlyBroadcasting;
						broadcastStartTime = new Date().getTime();
						
						setZIndex += 1;
					
						// div name
						divPName = "viewCam_BC";
					
						if (document.getElementById(divPName)) { document.getElementById("pWin").removeChild(document.getElementById(divPName)); }
						
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
							newdiv.innerHTML = "<div onmousedown='dragStart(event,\""+divPName+"\");doFocus(\""+divPName+"\")' id='"+divPName+"' class='webcamTitle' style='cursor:move;' onclick=doFocus(\""+divPName+"\")><span style='float:left;'><img style='vertical-align:middle;' src='plugins/webcams/images/mini.gif'>"+currentlyBroadcaster+"</span><!--<span style='float:right;'><span style='cursor:pointer;' onclick='deleteWebcamDiv(\""+divPName+"\",\"pWin\",\"0\")'><img src='images/close.gif'></span>&nbsp;&nbsp;</span>--></div>";
					
							// content
							newdiv.innerHTML += "<div id='resizeDiv_"+divPName+"' class='webcamContainer'></div>";
							newdiv.innerHTML += "<div class='selectSizeDiv'>Resize:&nbsp;<select id='selectSize_"+divPName+"' class='selectSize' onchange='resizeWebcam(this.value,\""+divPName+"\");'></select></div>";
					
							ni.appendChild(newdiv);
					
							newdiv.style.left = '238px';
							newdiv.style.top = '80px';
							
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
							newdiv.src = "plugins/webcams/ReceiveCam.php?sID="+bcStream;
					
							newdiv.height = "165";
							newdiv.width = "220";
					
							newdiv.frameBorder="0";
					
							ni.appendChild(newdiv);
					
						}
					
						createSelectSize(divPName);
						
						
						
						
						
						
						//Begin viewing broadcast
						
						
						//if (bcStream == 0) return false; // Stop if there truly is no stream.
						// Make sure broadcasts are not overlapping each other
						
						/*
						var ni = document.getElementById("pWin");
						var newdiv = document.createElement('iframe');
					
						newdiv.setAttribute("id","viewCam_BC");
						newdiv.src = "plugins/webcams/ReceiveCam.php?sID="+bcStream;
					
						newdiv.height = "165";
						newdiv.width = "220";
						newdiv.style.position = "absolute";
						newdiv.style.left = "246px";
						newdiv.style.top ="118px";
					
						newdiv.frameBorder="0";
					
						ni.appendChild(newdiv);
						*/
					}
				}
			}

		}

		// userlist data
		var allUsers_nodes = xmldoc.getElementsByTagName("userlist"); 
		var n_Users = allUsers_nodes.length;

		// intellibot
		if(intelliBot == 1)
		{
			// if single room mode, add intellibot to each room
			if(totalRooms == '1')
			{
				intellibotRoomID = roomID;
			}

			createUsersDiv('-1', '-1', intelliBotName, intelliBotAvi, '0', intellibotRoomID, intellibotRoomID, '1','','','');	
		}

		for (i = 0; i < n_Users; i++) 
		{
			var uID_node = allUsers_nodes[i].getElementsByTagName("id");
			var uUserID_node = allUsers_nodes[i].getElementsByTagName("userid");
			var uUser_node = allUsers_nodes[i].getElementsByTagName("username");
			var uAvatar_node = allUsers_nodes[i].getElementsByTagName("avatar");
			var uWebcam_node = allUsers_nodes[i].getElementsByTagName("webcam");
			var uRoom_node = allUsers_nodes[i].getElementsByTagName("room");
			var uPrevRoom_node = allUsers_nodes[i].getElementsByTagName("prevroom");
			var uAdminID_node = allUsers_nodes[i].getElementsByTagName("admin");
			var uModeratorID_node = allUsers_nodes[i].getElementsByTagName("moderator");
			var uSpeakerID_node = allUsers_nodes[i].getElementsByTagName("speaker");
			var uActivity_node = allUsers_nodes[i].getElementsByTagName("status");
			var uStatus_node = allUsers_nodes[i].getElementsByTagName("ustatus");
			var uWatch_node = allUsers_nodes[i].getElementsByTagName("uwatch");
			var uCreditsOn_node = allUsers_nodes[i].getElementsByTagName("ucreditson");
			var uCreditsTotal_node = allUsers_nodes[i].getElementsByTagName("ucreditstotal");
			var uGroupCams_node = allUsers_nodes[i].getElementsByTagName("ugroupcams");
			var uGroupWatch_node = allUsers_nodes[i].getElementsByTagName("ugroupwatch");
			var uGroupChat_node = allUsers_nodes[i].getElementsByTagName("ugroupchat");
			var uGroupPChat_node = allUsers_nodes[i].getElementsByTagName("ugrouppchat");
			var uGroupRooms_node = allUsers_nodes[i].getElementsByTagName("ugrouprooms");
			var uActive_node = allUsers_nodes[i].getElementsByTagName("uactive");
			var uLastActive_node = allUsers_nodes[i].getElementsByTagName("ulastactive");
			var uLoginIP_node = allUsers_nodes[i].getElementsByTagName("uloginIP");
				
			if(uID == uID_node[0].firstChild.nodeValue)
			{
				groupCams = uGroupCams_node[0].firstChild.nodeValue;
				groupWatch = uGroupWatch_node[0].firstChild.nodeValue;
				groupChat = uGroupChat_node[0].firstChild.nodeValue;
				groupPChat = uGroupPChat_node[0].firstChild.nodeValue;
				groupRooms = uGroupRooms_node[0].firstChild.nodeValue;
			}

			// enable eCredits
			eCredits = uCreditsOn_node[0].firstChild.nodeValue;

			// update eCredits total
			if(document.getElementById("eCreditsID") && uID_node[0].firstChild.nodeValue == uID)
			{
				document.getElementById("eCreditsID").innerHTML = uCreditsTotal_node[0].firstChild.nodeValue;
			}

			if(eCredits == 0)
			{
				document.getElementById("iconeCredits").style.visibility = 'hidden';
			}

			if(uID == uID_node[0].firstChild.nodeValue)
			{
				admin = Number(uAdminID_node[0].firstChild.nodeValue);
				moderator = Number(uModeratorID_node[0].firstChild.nodeValue);
				speaker = Number(uSpeakerID_node[0].firstChild.nodeValue);
			}
			
			// all users
			createUsersDiv(
						uID_node[0].firstChild.nodeValue,
						uUserID_node[0].firstChild.nodeValue,
						uUser_node[0].firstChild.nodeValue,
						uAvatar_node[0].firstChild.nodeValue,
						uWebcam_node[0].firstChild.nodeValue,
						uPrevRoom_node[0].firstChild.nodeValue,
						uRoom_node[0].firstChild.nodeValue,
						uActivity_node[0].firstChild.nodeValue,
						uStatus_node[0].firstChild.nodeValue,
						uWatch_node[0].firstChild.nodeValue,
						uAdminID_node[0].firstChild.nodeValue,
						uModeratorID_node[0].firstChild.nodeValue,
						uSpeakerID_node[0].firstChild.nodeValue,
						uActive_node[0].firstChild.nodeValue,
						uLastActive_node[0].firstChild.nodeValue,
						uLoginIP_node[0].firstChild.nodeValue
				);

		}

		// message data
		var allMessages_nodes = xmldoc.getElementsByTagName("usermessage"); 
		var n_Messages = allMessages_nodes.length;

		for (ii = 0; ii < n_Messages; ii++) 
		{
			var mID_node = allMessages_nodes[ii].getElementsByTagName("id");
			var mUID_node = allMessages_nodes[ii].getElementsByTagName("uid");
			var mMID_node = allMessages_nodes[ii].getElementsByTagName("mid");
			var mUser_node = allMessages_nodes[ii].getElementsByTagName("username");
			var mToUser_node = allMessages_nodes[ii].getElementsByTagName("tousername");
			var mMessage_node = allMessages_nodes[ii].getElementsByTagName("message");
			var mRoom_node = allMessages_nodes[ii].getElementsByTagName("room");
			var mSFX_node = allMessages_nodes[ii].getElementsByTagName("sfx");
			var mTime_node = allMessages_nodes[ii].getElementsByTagName("timestamp");

			// create message 
			createMessageDiv(
						'0', 
						mUID_node[0].firstChild.nodeValue, 
						mMID_node[0].firstChild.nodeValue, 
						showMessages+1, 
						mMessage_node[0].firstChild.nodeValue, 
						mSFX_node[0].firstChild.nodeValue,
						mUser_node[0].firstChild.nodeValue,
						mToUser_node[0].firstChild.nodeValue,
						mTime_node[0].firstChild.nodeValue
					);

			lastMessageID = mID_node[0].firstChild.nodeValue;

		}

		if(showHistory == 1)
		{
			createMessageDiv('0',uID,displayMDiv,-2,'1|'+stextColor+'|'+stextSize+'|'+stextFamily+'|** '+userName+' '+publicEntry,'beep_high.mp3','','');

			showHistory = 0;
		}

	}

}

/*
* whisper user
*
*/

function whisperUser(touserName)
{
	// check if user is whispering to themselves :P
	if(touserName.toLowerCase() == decodeURI(userName.toLowerCase()))
	{
		showInfoBox("system","200","300","200","",lang18);
		return false;
	}

	// set message input
	document.getElementById('whisperID').value = decodeURI(touserName);
}

/*
* ring bell
*
*/

function ringBell(inputMDiv,displayMDiv)
{
	// set message input
	document.getElementById(inputMDiv).value = "/ringbell";

	// send message
	addMessage(inputMDiv,displayMDiv);
}

/*
* clear & focus message input field
*
*/

function clrMessageInput(displayMDiv)
{
	// clear message input
	document.getElementById(displayMDiv).value = '';

	// focus message input
	document.getElementById(displayMDiv).focus();
}


/*
* create message div 
*
*/

var initDoSilence;
var doTextAdverts = 0;

function createMessageDiv(mStatus, mUID, mDiv, mID, message, sfx, mUser, mToUser, mTime)
{
	message	= decodeURI(message);
	
   	if(showHistory && message.search("BROADCAST") != -1)
   	{
      	return false;
   	}

	if(showHistory && message.search("KICK") != -1)
	{
		return false;
	}	

	if(message == 'SILENCE' && mToUser.toLowerCase() == userName.toLowerCase())
	{
		isSilenced = 1;
		showInfoBox("system","200","300","200","",lang7+" "+silent+" "+lang8);
		initDoSilence = setInterval('doSilence()',1000);
		return false;
	}

	if(message == 'SILENCE' && mToUser.toLowerCase() != userName.toLowerCase())
	{
		return false;
	}

	if(message == 'KICK' && mToUser.toLowerCase() == userName.toLowerCase())
	{
		logout('kick');
		return false;
	}

	if(message == 'KICK' && mToUser.toLowerCase() != userName.toLowerCase())
	{
		return false;
	}

	if(message == 'BAN' && mToUser.toLowerCase() == userName.toLowerCase())
	{
		logout('ban');
		return false;
	}

	if(message == 'BAN' && mToUser.toLowerCase() != userName.toLowerCase())
	{
		return false;
	}

	if(mUser && blockedList.indexOf("|"+mUID+"|") != '-1')
	{
		return false;
	}

	// if user has receive PM disabled
	if(mDiv != 'chatContainer' && (userRPM == 'false' || userRPM == false))
	{
		return false;
	}

	// create private window if not open
	pDiv = mDiv.replace("pcontent_","");
	ppDiv = pDiv.split("_");

	// create private chat window if not exists
	if(mUID != uID && mDiv != 'chatContainer' && mToUser.toLowerCase() == userName.toLowerCase())
	{
	
		// if message history is enabled 
		// dont load old private messages
		if(showHistory)
		{
			return false;
		}
	
		// if div isnt created
		if(!document.getElementById(mDiv))
		{
			if(ppDiv[0] != uID)
			{
				// this user is receiver, new PM
				createPChatDiv(userName,mUser,uID,mUID);
			}
			else
			{
				// this user is sender (initilised PM)
				// eg. this user crashed or lost connection
				// catches any closed PM that a receiver still has open
				createPChatDiv(userName,mUser,mUID,uID);
			}

		}
		
	}

	// create new message div
	if(!document.getElementById(mID))
	{
		// create div
		var ni = document.getElementById(mDiv);
		var newdiv = document.createElement('div');
		newdiv.setAttribute("id",mID);

		// normal message
		if(mStatus == 0)
		{
			newdiv.className = 'chatMessage';
		}

		// welcome message
		if(mStatus == 1)
		{
			newdiv.className = 'welcomeMessage';
		}

		// webcam options
		showStreamUID = message.split("||");

		if(showStreamUID[0] == 'WEBCAM_ACCEPT' && mToUser.toLowerCase() == userName.toLowerCase())
		{
			viewCam(mToUser,mUser,showStreamUID[1],mUID);
			return false;
		}

		// add avatar and HTML formatting
      	message = message.replace(/\[b\]/gi, "<b>");
      	message = message.replace(/\[\/b\]/gi, "</b>");
      	message = message.replace(/\[i\]/gi, "<i>");
      	message = message.replace(/\[\/i\]/gi, "</i>");
      	message = message.replace(/\[u\]/gi, "<u>");
      	message = message.replace(/\[\/u\]/gi, "</u>");
		message = message.replace(/\[\[/gi, "<");
		message = message.replace(/\]\]/gi, ">");

		messageArray = message.split("|");

		// assign entry sfx
		if(messageArray[4].indexOf(publicEntry) != -1)
		{
			sfx = 'doorbell.mp3';
		}

		// assign exit sfx
		if(messageArray[4].indexOf(publicExit) != -1)
		{
			sfx = 'door_close.mp3';
		}

		// format smilies in message
		messageArray[4] = addSmilie(messageArray[4]);
		
		// show broadcast message
		var broadcast = messageArray[4];
		    broadcast = broadcast.replace("<b>","");
		    broadcast = broadcast.replace("<u>","");
		    broadcast = broadcast.replace("<i>","");
		    broadcast = broadcast.replace("</b>","");
		    broadcast = broadcast.replace("</u>","");
		    broadcast = broadcast.replace("</i>","");
		    broadcast = broadcast.split(" ");

		if(broadcast[0] == 'BROADCAST')
		{
			showInfoBox("system","200","300","200","",decodeURI(messageArray[4].replace("BROADCAST","")));
			return false;
		}

		// check for emails
		if(enableEmail)
		{
			messageArray[4] = messageArray[4].replace(/([\w.-]+@[\w.-]+\.[\w]+)/gi, "<a href='mailto:$1'>$1</a>");
		}
		
		// enable youtube videos
		// url must contain youtu.be format   
		// eg. http://youtu.be/ctAu4DgSheI
      
		var showYouTube = 0;
		if(messageArray[4].search(/http:\/\/youtu.be\//gi) > -1)
		{
		    messageArray[4] = messageArray[4].replace("<b>","");
		    messageArray[4] = messageArray[4].replace("<u>","");
		    messageArray[4] = messageArray[4].replace("<i>","");
		    messageArray[4] = messageArray[4].replace("</b>","");
		    messageArray[4] = messageArray[4].replace("</u>","");
		    messageArray[4] = messageArray[4].replace("</i>","");				
		
			var getVideoID = messageArray[4].split("/");
			messageArray[4] = '<iframe width="420" height="315" src="http://www.youtube.com/embed/'+getVideoID[3]+'" frameborder="0" allowfullscreen></iframe>';
			showYouTube = 1;
		}		

		// check for urls
		if(enableUrl && !showYouTube)
		{
			messageArray[4] = messageArray[4].replace(/(http[s]?:\/\/[\S]+)/gi, "<a href='$1' target='_blank'>$1</a>");
		}

		var displayName = mUser+" says:&nbsp;";
		var newMessage = "<img style='vertical-align:middle;' src='avatars/"+messageArray[0]+"'>&nbsp;";

		// if user is allowing anyone to view webcam
		if(messageArray[4] == 'WEBCAM_REQUEST' && mToUser.toLowerCase() == userName.toLowerCase() && (userRWebcam == 'true' || userRWebcam == true))
		{
			acceptViewWebcam(encodeURI(mUser));
			return false;
		}

		// if user requires permission to view webcam
		if(messageArray[4] == 'WEBCAM_REQUEST' && mToUser.toLowerCase() == userName.toLowerCase())
		{
			displayName = "";
			messageArray[4] = decodeURI(mUser) + "&nbsp;"+lang19+" <span style='cursor:pointer' onclick='acceptViewWebcam(\""+encodeURI(mUser)+"\");showInfoBox(\"system\",\"200\",\"300\",\"200\",\"\",\""+lang20+" "+mUser+" "+lang21+"\");'>"+lang22+"</span> "+lang23+" <span style='cursor:pointer' onclick='showInfoBox(\"system\",\"200\",\"300\",\"200\",\"\",\""+lang24+" "+mUser+" "+lang21+"\");'>"+lang25+"</span> "+lang26;
		}

		// entry/exit message
		if(messageArray[0]=='1')
		{
			displayName = "";
			newMessage = "";
		}

		// welcome/IRC/whisper message
		if(messageArray[5]=='1')
		{
			displayName = mUser;
		}

		// format messages with line breaks
		if(messageArray[6]=='1')
		{
			messageArray[4] = "<pre style='white-space: pre-wrap;'>"+messageArray[4]+"</pre>";
		}

		newMessage += "<span id='username' style='cursor:pointer;' onclick='whisperUser(\""+mUser+"\")'>"+displayName+"</span>";
		newMessage += "<span style='color:" + messageArray[1] + ";font-size:" + messageArray[2] + ";font-family:" + messageArray[3] + ";'>" + messageArray[4] + "</span>";

		// shout filter
		if(enableShoutFilter)
		{
			newMessage = newMessage.toLowerCase();
		}

		// show message
		newMessage = newMessage.replace(/&#127;/gi,"\|");
		newdiv.innerHTML = decodeURIComponent(newMessage);

		if(ni != null)
		{
			ni.appendChild(newdiv);
		}

		// update div count
		showMessages += 1;
	}

	// trim messages
	countMessages(mDiv);

	// control the auto scroll
	if(document.getElementById(mDiv) && document.getElementById('autoScrollID').checked==true)
	{
		var chat_div = document.getElementById(mDiv);
		chat_div.scrollTop = chat_div.scrollHeight;
	}

	// if private window is minimised, show alert
	if(mDiv != 'chatContainer')
	{
		if(document.getElementById(pDiv) && document.getElementById(pDiv).style.visibility == 'visible')		
		{
			if(mUser.toLowerCase() != userName.toLowerCase() && document.getElementById("psendbox_"+pDiv).style.visibility != 'visible')
			{
				showAlert(pDiv);			
			}
		}
		
		if(document.getElementById(pDiv) && document.getElementById(pDiv).style.visibility != 'visible')
		{
			document.getElementById(pDiv).style.visibility = 'visible';
			document.getElementById("pcontent_"+pDiv).style.visibility = 'visible';
			document.getElementById("pmenuBar_"+pDiv).style.visibility = 'visible';
			document.getElementById("psendbox_"+pDiv).style.visibility = 'visible';
			document.getElementById("pmenuWin_"+pDiv).style.visibility = 'visible';
		}

	}

	// show text adverts
	if(textAdverts && !ppDiv[1])
	{
		if(doTextAdverts == showTextAdverts)
		{
			doTextAdverts = 0;

			var sta = setTimeout('showTextAdvertisement();',2000)
		}
		else
		{
			doTextAdverts += 1;
		}
	}

	// play sound
	var playSounds = 0;

	if(document.getElementById('soundsID').checked==true && sfx == 'beep_high.mp3')
	{
		doSound(sfx);
	}

	if(document.getElementById('entryExitID').checked==true && (sfx == 'doorbell.mp3' || sfx == 'door_close.mp3'))
	{
		doSound(sfx);
	}

	if(document.getElementById('sfxID').checked==true && mySFX.toString().lastIndexOf(sfx) == -1 && (sfx != 'doorbell.mp3' && sfx != 'door_close.mp3' && sfx != 'beep_high.mp3'))
	{
		doSound(sfx);
	}

}

/*
* show text adverts
* 
*/

function showTextAdvertisement()
{
	if(advertDesc[0])
	{
		createMessageDiv('0', '-1', 'chatContainer', showMessages+1, '../images/notice.gif|'+stextColor+'|'+stextSize+'|'+stextFamily+'|'+advertDesc[Math.floor(Math.random()*advertDesc.length)], 'beep_high.mp3', 'AdBot', '', '');	
	}
}

/*
* silence the user
* 
*/

var s = 0;
function doSilence()
{
	s += 1;

	if(s > (silent*60))
	{
		showInfoBox("system","200","300","200","",lang27);

		clearInterval(initDoSilence);

		s = 0;

		isSilenced = 0;
	}
}

/*
* highlight pm title bar (if pm is minimised)
* 
*/

function showAlert(pDiv)
{
	document.getElementById("ptitle_"+pDiv).style.backgroundColor = newPMmin;
}

/*
* trim total messages in chat window
*
*/

function countMessages(pDiv)
{
	if(document.getElementById(pDiv))
	{
		var parentCount = document.getElementById(pDiv);
		var childCount = parentCount.getElementsByTagName('div').length;

		// if message divs greater than total message divs
		if(childCount > totalMessages)
		{
			var trimMessages = document.getElementById(pDiv);
  			trimMessages.removeChild(trimMessages.firstChild);
		}
	}

}

/*
* delete message div 
*
*/

function removeMessageDiv(divID)
{
	// if div exists
	if(document.getElementById(divID))
	{
		// remove div
		var d = document.getElementById('chatContainer');
		var olddiv = document.getElementById(divID);
		d.removeChild(olddiv);
	}

}

/*
* use enter key as submit 
*
*/

function submitenter(myfield,e,inputMDiv,displayMDiv,pChat)
{
	var keycode;
	if (window.event) keycode = window.event.keyCode;
	else if (e) keycode = e.which;
	else return true;

	if (keycode == 13)
	{
		// send message
		isPrivate = pChat;
		addMessage(inputMDiv,displayMDiv);
		return false;
	}
	else return true;
}