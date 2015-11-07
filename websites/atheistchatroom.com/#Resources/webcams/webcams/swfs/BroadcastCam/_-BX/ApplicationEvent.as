package _-BX
{
    import flash.events.*;

    public class ApplicationEvent extends Event
    {
        public var params:Object;
        public static const COMPLETE:String = "complete";
        public static const _-57:String = "preInitialize";
        public static const _-3O:String = "assetsLoaded";
        public static const _-9V:String = "domainError";
        public static const _-4A:String = "licenceError";
        public static const _-B1:String = "licenceLoaded";
        public static const _-m:String = "licenceSecurityError";
        public static const _-38:String = "licenceError";
        public static const _-BI:String = "licenceLoaded";
        public static const _-4y:String = "licenceSecurityError";

        public function ApplicationEvent(param1:String, param2:Object, param3:Boolean = false, param4:Boolean = false)
        {
            ;
            param4--;
            var _loc_5:Boolean = false;
            _loc_5++;
            _loc_5 = null & true == true;
            var _loc_6:String = null;
            ;
            param3++;
            param4--;
            _loc_3--;
            if (this in _loc_6 || false)
            {
                do
                {
                    
                    return;
                    
                    this.params = param2;
                    ;
                    param2--;
                    _loc_3--;
                    param2 = null;
                    param2 = null;
                }
            }while (true)
            super(param1, _loc_3, param4);
            return;
        }// end function

        override public function clone() : Event
        {
            ;
            return new (null & null).ApplicationEvent(type, this.params, bubbles, cancelable);
            return;
        }// end function

        override public function toString() : String
        {
            ;
            return (null * (null is ( + 1))).formatToString("ApplicationEvent", "type", "params", "bubbles", "cancelable", "eventPhase");
            return;
        }// end function

        var _loc_1:Boolean = true;
        ;
        var _loc_2:* = null is (null % (null - !false) & false);
        do
        {
            
            
            if (!(_loc_2 && _loc_2))
            {
            }while (true)
            
        }
        do
        {
            
            ;
            if (!(null << ((null === _loc_2 < null) instanceof _loc_3) && _loc_1))
            {
                do
                {
                    
                }
                if (!(_loc_2 && ApplicationEvent))
                {
                }while (true)
                
            }
        }while (true)
        
        if (_loc_1)
        {
            do
            {
                
                do
                {
                    
                    ;
                    _loc_3 = null << null < null;
                }while (true)
                
            }while (true)
        }
    }
}
