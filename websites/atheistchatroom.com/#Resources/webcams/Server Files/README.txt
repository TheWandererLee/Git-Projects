Welcome to the Prochatroom Server files, installation instructions.

Please note, these files have been compiled from their respective systems and allthough
are fully tested, different enviroments have been known to cause issues.


========================================================================================
== ADOBE SERVER INSTRUCTIONS ===========================================================

To setup on a Adobe FMS server, goto the applications folder and create a new folder and
call it prochatrooms.

The structure should now look like:-
[Adobe FMS Root]
   applications
      prochatrooms

There might be other folders in the applications folder, but prochatrooms is the one
that must be there.



========================================================================================
== RED5 SERVER INSTRUCTIONS ============================================================

Copy the required version zip to your Red5 webapps folder and extract the files here, 

You should now have a folder structure like:-
[Red5 Root]
   webapps
      prochatrooms
         WEB-INF
            red5-web.properties
            red5-web.xml
            web.xml

There will be of course several other folders in the webapps folder but prochatrooms is
the required one.  Please note, that any changes you make to the server folder structure
, will require the server to be re-booted.



========================================================================================
== WOWZA SERVER INSTRUCTIONS ===========================================================

Copy the required version zip to your Wowza folder and extract the files here, by doing
this, your Operating System should ask if you wish to overwrite the applications and
conf folders, if this does not happon you might not have unzipped correctly,
please check.

You should now have a folder structure like:-
[Wowza Root]
   applications
   conf

There will be of course several other folders in the Wowza Root folder but the above is
what is required.  Please note, that although you should not need to do it, there have
been known times where the server requires rebooting.