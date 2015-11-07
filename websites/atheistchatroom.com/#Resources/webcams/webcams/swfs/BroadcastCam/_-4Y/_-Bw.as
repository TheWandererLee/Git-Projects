package _-4Y
{
    import *.*;
    import flash.events.*;
    import flash.net.*;
    import flash.ui.*;

    public class _-Bw extends Object
    {
        private static var _-BN:ContextMenu;
        private static var _-0:_-A4 = new _-A4("Right-Click Menu", _-A4._-7J, true);

        public function _-Bw()
        {
            ;
            var _loc_1:Boolean = false;
            var _loc_2:* = null;
            if (!_loc_1)
            {
            }
            throw new Error("This class is NOT to be instantiated!");
            return;
        }// end function

        public static function get _-36() : ContextMenu
        {
            return _-BN;
            return;
        }// end function

        public static function _-g(param1:String, param2:Function) : void
        {
            var _loc_4:Boolean = true;
            ;
            param2++;
            _loc_4--;
            _loc_4--;
            var _loc_5:* = -false > _loc_3;
            var _loc_3:* = new ContextMenuItem(param1);
            if (!(_loc_5 && param2))
            {
                do
                {
                    
                    return;
                    
                    ;
                    (null + _-BN & _loc_3 as undefined).customItems.push(_loc_3);
                }
            }while (true)
            if (param2 == null) goto 55;
            ;
            param2--;
            _loc_3++;
            with (_loc_3)
            {
                if (!(_loc_5 && ~_-Bw + 1))
                {
                    _loc_3.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, _-Bw.param2());
                }
                ;
                return;
        }// end function

        public static function _-2b() : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = null * false;
            _loc_2 = null;
            _loc_2++;
            _loc_2 = !null;
            var _loc_3:String = null;
            var _loc_1:* = new ContextMenuItem("© www.prochatrooms.com");
            ;
            _loc_2--;
            default xml namespace = null * !_loc_3;
            if ((null + 1))
            {
                do
                {
                    
                    return;
                    
                    _-BN.customItems.push(_loc_1);
                    ;
                    _loc_2--;
                }
            }while (true)
            _loc_1.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, visitProChatroomsWebsite);
            return;
        }// end function

        public static function _-9-(param1:Boolean = false) : void
        {
            ;
            _loc_2--;
            _loc_2++;
            _loc_3--;
            _loc_2--;
            var _loc_3:* = true & false;
            var _loc_4:String = null;
            var _loc_2:* = new ContextMenuItem("Save Log to Hard Drive", param1);
            if (_loc_4)
            {
                ;
                _loc_3 = null;
                _loc_3--;
                _loc_3--;
                do
                {
                    
                    return;
                    
                    _-BN.customItems.push(_loc_2);
                    ;
                    _loc_2--;
                    _loc_3++;
                }
            }while (true)
            _loc_2.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, _-BV);
            return;
        }// end function

        public static function _-7B() : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2++;
            with (false)
            {
                default xml namespace = null;
                _loc_2--;
                var _loc_3:* = _loc_3;
                var _loc_1:* = new ContextMenuItem("© www.tfcsoftware.com");
                if (_loc_3)
                {
                    ;
                    _loc_2 = null << _loc_3;
                }
                if (!_loc_3)
                {
                    do
                    {
                        
                        return;
                        
                        _-BN.customItems.push(_loc_1);
                        ;
                        var _loc_2:String = null;
                    }
                }while (true)
                _loc_1.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, visitTFCSoftwareWebsite);
                return;
        }// end function

        public static function _-5T(param1:String, param2:Boolean = false) : void
        {
            ;
            param2--;
            _loc_4++;
            var _loc_4:* = _loc_2 in false;
            var _loc_5:Boolean = true;
            ;
            _loc_4++;
            var _loc_2:* = typeof(_loc_3);
            _loc_2--;
            var _loc_3:* = new null.ContextMenuItem( + "Version " / param1, _loc_2);
            if (!_loc_5)
            {
                ;
                _loc_2 = _loc_5 == undefined == param1;
            }
            if (_-Bw)
            {
                _-BN.customItems.push(_loc_3);
            }
            return;
            return;
        }// end function

        public static function _-Ad(param1:String) : void
        {
            ;
            var _loc_2:* = new (-(null - (null + ))).ContextMenuItem(param1);
            return;
            return;
        }// end function

        public static function _-4E() : void
        {
            ;
            var _loc_1:* = new (( < null >= null) % undefined).ContextMenuItem("© www.tfcsoftware.com");
            return;
            return;
        }// end function

        public static function init(param1) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            var _loc_3:* = null >>> false as null;
            if (!_loc_3)
            {
                do
                {
                    
                    return;
                    ;
                    default xml namespace = true;
                    _loc_2++;
                    _loc_3 = _loc_2 < null;
                    
                    param1.contextMenu = _-BN;
                    if (!_loc_3)
                    {
                    }while (true)
                    
                    ;
                    _loc_2 = _-BN;
                    (_loc_2 % _loc_2).hideBuiltInItems();
                }
            }
            ;
            _-BN = new ContextMenu();
            return;
        }// end function

        private static function visitProChatroomsWebsite(event:ContextMenuEvent) : void
        {
            var _loc_3:Boolean = true;
            ;
            _loc_3--;
            _loc_2--;
            _loc_3--;
            var _loc_4:String = null;
            var _loc_2:* = new URLRequest("http://www.prochatrooms.com");
            ;
            _loc_3 = typeof(_loc_3);
            if (!(null instanceof false | null instanceof false))
            {
                do
                {
                    
                    return;
                    
                    ;
                    trace("RightClickMenu:>", "visitProChatroomsWebsite", event instanceof _loc_2);
                    if (_loc_3)
                    {
                    }while (true)
                    navigateToURL(_loc_2, "_blank");
                }
            }
            ;
            return;
        }// end function

        private static function visitTFCSoftwareWebsite(event:ContextMenuEvent) : void
        {
            var _loc_3:Boolean = true;
            ;
            _loc_2++;
            _loc_3++;
            _loc_3--;
            _loc_3--;
            _loc_3 = false;
            _loc_2--;
            var _loc_4:String = null;
            var _loc_2:* = new URLRequest("http://www.tfcsoftware.com");
            ;
            _loc_3 = _loc_3[_loc_2];
            _loc_3--;
            if (null || _loc_3)
            {
                do
                {
                    
                    return;
                    
                    trace("RightClickMenu:>", "visitTFCSoftwareWebsite", event);
                    ;
                    _loc_2++;
                    if (NaN || _loc_3)
                    {
                    }while (true)
                    navigateToURL(_loc_2, "_blank");
                }
            }
            return;
        }// end function

        private static function _-BV(event:ContextMenuEvent) : void
        {
            ;
            _loc_2--;
            _loc_2--;
            _loc_2++;
            var _loc_2:* = true & false[_loc_2];
            var _loc_3:String = null;
            ;
            _loc_2++;
            _loc_2++;
            if (!(_loc_2 && _loc_2))
            {
                _-0._-0H();
            }
            return;
            return;
        }// end function

        var _loc_1:Boolean = true;
        ;
        var _loc_2:* = null + (null - (null >>> false) as undefined);
        ;
        if (_loc_1)
        {
        }
        if (!_loc_2)
        {
        }
    }
}
