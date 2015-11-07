package _20null
{
    import flash.events.*;

    public class RemoteWebcamEvent extends Event
    {
        public var params:Object;
        public static const >":String = "fmsConnected";
        public static const +-:String = "fmsErrored";
        public static const >,:String = "fmsStatus";
        public static const 52:String = "remoteSharedObjectActivate";
        public static const @;:String = "remoteSharedObjectAsyncError";
        public static const 37:String = "remoteSharedObjectDeActivate";
        public static const [#:String = "remoteSharedObjectError";
        public static const ->:String = "remoteSharedObjectNetStatus";
        public static const `6:String = "remoteSharedObjectSync";

        public function RemoteWebcamEvent(param1:String, param2:Object, param3:Boolean = false, param4:Boolean = false)
        {
            ;
            param2 = -false;
            param3 = true;
            var _loc_5:* = null ^ null / (null * (null - param4));
            var _loc_6:String = null;
            ;
            param4++;
            _loc_2--;
            _loc_5--;
            _loc_5--;
            if (_loc_6 instanceof param3 || new activation >>> param3)
            {
                do
                {
                    
                    return;
                    
                    this.params = _loc_2;
                    ;
                    param3--;
                    param3--;
                    _loc_4++;
                    param3++;
                }
            }while (true)
            super(param1, param3, _loc_4);
            return;
        }// end function

        override public function clone() : Event
        {
            ;
            _loc_3 = _loc_2;
            return new new activation.RemoteWebcamEvent(type, this.params, bubbles, cancelable);
            return;
        }// end function

        override public function toString() : String
        {
            ;
            with ()
            {
                return false.formatToString("RemoteWebcamEvent", "type", "params", "bubbles", "cancelable", "eventPhase");
                return;
        }// end function

        var _loc_1:Boolean = true;
        ;
        var _loc_2:* = -_loc_2;
        if (!(_loc_2 && _loc_2))
        {
            do
            {
                
                
            }while (true)
            
            ;
            _loc_2 = _loc_1 == _loc_1 == undefined;
            if (!(-((RemoteWebcamEvent * (_loc_1 - 1) ^ RemoteWebcamEvent in false) >= false)))
            {
            }
            if (_loc_2)
            {
                do
                {
                    
                }
                do
                {
                    
                }
            }while (true)
            
        }while (true)
        
        do
        {
            
            ;
            _loc_3 = null >> null + null >= null[RemoteWebcamEvent];
            continue;
            
        }while (true)
    }
}
