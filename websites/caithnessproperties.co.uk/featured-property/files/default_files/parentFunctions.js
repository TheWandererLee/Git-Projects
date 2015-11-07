function pushHeight(url) {
    var height = $(document.body).height() + 100;
    //alert(height);
    if(updateProxyFrame)
        updateProxyFrame(url,height);
}

function updateProxyFrame(baseurl,result) {

    //The name of the frame
    var id = "proxyframe";

    //Look for existing frame with name "proxyframe"
    var proxy = frames[id];

    //Set URL and querystring
    var url = "http://" + baseurl + "?height=" + result;
    

    //If the proxy iframe has already been created
    if (proxy) {

        //Redirect to the new URL
        proxy.location.href = url;

    } else {

        //Create the proxy iframe element.
        var iframe = document.createElement("iframe");
        iframe.id = id;
        iframe.name = id;
        iframe.src = url;
        iframe.style.display = "none";
        document.body.appendChild(iframe);

    }
}
