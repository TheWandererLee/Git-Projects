<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>

<script type="text/javascript">
String.prototype.ltrim=function(){return this.replace(/^\s+/,'');};
String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g, '');};
if (!Array.prototype.indexOf) { // Be sure indexOf is established for arrays
    Array.prototype.indexOf = function (searchElement /*, fromIndex */ ) {
        "use strict";
        if (this == null) {
            throw new TypeError();
        }
        var t = Object(this);
        var len = t.length >>> 0;
        if (len === 0) {
            return -1;
        }
        var n = 0;
        if (arguments.length > 1) {
            n = Number(arguments[1]);
            if (n != n) { // shortcut for verifying if it's NaN
                n = 0;
            } else if (n != 0 && n != Infinity && n != -Infinity) {
                n = (n > 0 || -1) * Math.floor(Math.abs(n));
            }
        }
        if (n >= len) {
            return -1;
        }
        var k = n >= 0 ? n : Math.max(len - Math.abs(n), 0);
        for (; k < len; k++) {
            if (k in t && t[k] === searchElement) {
                return k;
            }
        }
        return -1;
    }
}

window.addEventListener("load", dtgenInit, false);
function dtgenInit() { // ALL THESE ID'S (e.g. option_oc[ID]) MUST BE CORRECTLY ASSOCIATED WITH THE NAME OF ITS INPUT OR SCRIPT WILL FAIL
    if (document.getElementsByName('option_oc[255]') && document.getElementsByName('option_oc[255]').length == 1) { // Double tag IDs
      // Below are 2 multi-dimensional arrays storing all possible tag metal and silencer types for the DOUBLE TAG product page.
      // These should all be .png files and stored in the same folder. If the ID becomes disassociated, it can be fixed here.
      var dtgenIDs = []; // Silencer IDs
      dtgenIDs[0] = [157,156,155,44,52,141,140,43,42,41,40,39,45,46,47];
      dtgenIDs[1] = ['si_black','si_blue','si_blue_gitd','si_blue_camo','si_desert_camo','si_army_camo','si_clear','si_olive_green','si_green_gitd','si_orange','si_pink','si_purple','si_red','si_white','si_yellow'];
      
      var dtgenIDm = []; // Metal IDs
      dtgenIDm[0] = [139,54];
      dtgenIDm[1] = ['dt_shiny','dt_dull'];
      
      var dtgenIDt = ['option_oc[255]','option_oc[256]','option_oc[257]','option_oc[258]','option_oc[259]','option_oc[271]','option_oc[272]','option_oc[273]','option_oc[274]','option_oc[275]']; // Textbox IDs
      
      var dtgenDoubleTag = true;
      var dtgenMName = 'option_oc[267]'; var dtgenSName = 'option_oc[265]';
    }
    else if (document.getElementsByName('option_oc[227]') && document.getElementsByName('option_oc[227]').length == 1) { // Single tag IDs
      // Below are 2 multi-dimensional arrays storing all possible tag metal and silencer types for the SINGLE TAG product page.
      // These should all be .png files and stored in the same folder. If the ID becomes disassociated, it can be fixed here.
      var dtgenIDs = []; // Silencer IDs
      dtgenIDs[0] = [187,186,185,184,31,30,29,32,35,36,34,33,17,191,190];
      dtgenIDs[1] = ['si_black','si_blue','si_blue_gitd','si_blue_camo','si_desert_camo','si_army_camo','si_clear','si_olive_green','si_green_gitd','si_orange','si_pink','si_purple','si_red','si_white','si_yellow'];
      
      var dtgenIDm = []; // Metal IDs
      dtgenIDm[0] = [37,38];
      dtgenIDm[1] = ['dt_shiny','dt_dull'];
      
      var dtgenIDt = ['option_oc[227]','option_oc[228]','option_oc[229]','option_oc[230]','option_oc[231]']; // Textbox IDs
      
      var dtgenDoubleTag = false;
      var dtgenMName = 'option_oc[246]'; var dtgenSName = 'option_oc[236]';
      
    }
    else if (document.getElementsByName('option_oc[291]') && document.getElementsByName('option_oc[291]').length == 1) { // Keyring AKA BRAIN DRAIN
      // Below are 2 multi-dimensional arrays storing all possible tag metal and silencer types for the KEYRING product page.
      // These should all be .png files and stored in the same folder. If the ID becomes disassociated, it can be fixed here.
      var dtgenIDs = [];
      dtgenIDs[0] = [166,165,164,88,89,90,91,92,93,94,95,97,163,162,87];
      dtgenIDs[1] = ['si_black','si_blue','si_blue_gitd','si_clear','si_olive_green','si_green_gitd','si_orange','si_pink','si_purple','si_red','si_white','si_yellow','si_blue_camo','si_desert_camo','si_army_camo'];
      
      var dtgenIDm = []; // Metal IDs
      dtgenIDm[0] = [85];
      dtgenIDm[1] = ['dt_shiny'];
      
      var dtgenIDt = ['option_oc[291]','option_oc[292]','option_oc[293]','option_oc[294]','option_oc[295]']; // Textbox IDs
      
      var dtgenDoubleTag = false;
      var dtgenMName = 'option_oc[287]'; var dtgenSName = 'option_oc[289]';
    }
    else if (document.getElementsByName('option_oc[281]') && document.getElementsByName('option_oc[281]').length == 1) { // Mix it up AKA THE BLENDER
      // Below are 2 multi-dimensional arrays storing all possible tag metal and silencer types for the MIX IT UP product page.
      // These should all be .png files and stored in the same folder. If the ID becomes disassociated, it can be fixed here.
      var dtgenIDs = [];
      dtgenIDs[0] = [177,176,175,83,72,73,74,75,76,77,78,180,174,173,84];
      dtgenIDs[1] = ['si_black','si_blue','si_blue_gitd','si_clear','si_olive_green','si_green_gitd','si_orange','si_pink','si_purple','si_red','si_white','si_yellow','si_blue_camo','si_desert_camo','si_army_camo'];
      
      var dtgenIDm = []; // Metal IDs
      dtgenIDm[0] = [85];
      dtgenIDm[1] = ['dt_shiny'];
      
      var dtgenIDt = ['option_oc[281]','option_oc[282]','option_oc[283]','option_oc[284]','option_oc[285]']; // Textbox IDs
      
      var dtgenDoubleTag = false;
      var dtgenMName = 'option_oc[277]'; var dtgenSName = 'option_oc[279]'; // Name of the Metal & Silencer arrays
    } else { return false; } // Neither page.
    
    function tag1Changed() {
      document.getElementById('dtgen1Text').innerHTML = parseText(document.getElementsByName(dtgenIDt[0])[0].value) +
      '<br>' + parseText(document.getElementsByName(dtgenIDt[1])[0].value) +
      '<br>' + parseText(document.getElementsByName(dtgenIDt[2])[0].value) +
      '<br>' + parseText(document.getElementsByName(dtgenIDt[3])[0].value) +
      '<br>' + parseText(document.getElementsByName(dtgenIDt[4])[0].value);
    }
    
    function tag2Changed() {
      document.getElementById('dtgen2Text').innerHTML = parseText(document.getElementsByName(dtgenIDt[5])[0].value) +
      '<br>' + parseText(document.getElementsByName(dtgenIDt[6])[0].value) +
      '<br>' + parseText(document.getElementsByName(dtgenIDt[7])[0].value) +
      '<br>' + parseText(document.getElementsByName(dtgenIDt[8])[0].value) +
      '<br>' + parseText(document.getElementsByName(dtgenIDt[9])[0].value);
    }
    
    function tagSiChanged() {
      for (var i=0;i<document.getElementsByName(dtgenSName).length;i++) {
        var tagS = "si_none";
        if (document.getElementsByName(dtgenSName)[i].checked) {
          var tmp = dtgenIDs[1][dtgenIDs[0].indexOf(Number(document.getElementsByName(dtgenSName)[i].value))];
          if (typeof tmp != 'undefined') { tagS = tmp; }
          
          if (tagS == "si_none") {
            document.getElementById('dtgen1Silencer').style.visibility = "hidden";
            if (dtgenDoubleTag) { // If double-tags
              document.getElementById('dtgen2Silencer').style.visibility = "hidden";
            }
          } else {
            document.getElementById('dtgen1Silencer').style.visibility = "visible";
            document.getElementById('dtgen1Silencer').src = "../../../../../../../../../images/get-your-tags/imported/"+tagS+".png";
            if (dtgenDoubleTag) { // If double-tags
              document.getElementById('dtgen2Silencer').style.visibility = "visible";
              document.getElementById('dtgen2Silencer').src = "../../../../../../../../../images/get-your-tags/imported/"+tagS+".png";
            }
          }
          break;
        }
      }
    }
    function tagMetalChanged() {
      for (var i=0;i<document.getElementsByName(dtgenMName).length;i++) {
        var tagM = "dt_dull";
        if (document.getElementsByName(dtgenMName)[i].checked) {
          // 139: Shiny, 54: Dull
          var debugVar = Number(document.getElementsByName(dtgenMName)[i].value);
          var tmp = dtgenIDm[1][dtgenIDm[0].indexOf(Number(document.getElementsByName(dtgenMName)[i].value))];
          if (typeof tmp != 'undefined') { tagM = tmp; }
          
          document.getElementById('dtgen1Metal').src = "../../../../../../../../../images/get-your-tags/imported/"+tagM+".png";
          if (dtgenDoubleTag) { // If double-tags
            document.getElementById('dtgen2Metal').src = "../../../../../../../../../images/get-your-tags/imported/"+tagM+".png";
          }
          break;
        }
      }
    }
    
    function dtgenInputAdjust() {
      document.getElementsByName(dtgenIDt[0])[0].value = document.getElementsByName(dtgenIDt[0])[0].value.replace(/ /g,"_");
      document.getElementsByName(dtgenIDt[1])[0].value = document.getElementsByName(dtgenIDt[1])[0].value.replace(/ /g,"_");
      document.getElementsByName(dtgenIDt[2])[0].value = document.getElementsByName(dtgenIDt[2])[0].value.replace(/ /g,"_");
      document.getElementsByName(dtgenIDt[3])[0].value = document.getElementsByName(dtgenIDt[3])[0].value.replace(/ /g,"_");
      document.getElementsByName(dtgenIDt[4])[0].value = document.getElementsByName(dtgenIDt[4])[0].value.replace(/ /g,"_");
      
      if (dtgenDoubleTag) {
        document.getElementsByName(dtgenIDt[5])[0].value = document.getElementsByName(dtgenIDt[5])[0].value.replace(/ /g,"_");
        document.getElementsByName(dtgenIDt[6])[0].value = document.getElementsByName(dtgenIDt[6])[0].value.replace(/ /g,"_");
        document.getElementsByName(dtgenIDt[7])[0].value = document.getElementsByName(dtgenIDt[7])[0].value.replace(/ /g,"_");
        document.getElementsByName(dtgenIDt[8])[0].value = document.getElementsByName(dtgenIDt[8])[0].value.replace(/ /g,"_");
        document.getElementsByName(dtgenIDt[9])[0].value = document.getElementsByName(dtgenIDt[9])[0].value.replace(/ /g,"_");
      }
    }
    function dtgenInputReady() {
      document.getElementsByName(dtgenIDt[0])[0].value = document.getElementsByName(dtgenIDt[0])[0].value.replace(/_/g," ");
      document.getElementsByName(dtgenIDt[1])[0].value = document.getElementsByName(dtgenIDt[1])[0].value.replace(/_/g," ");
      document.getElementsByName(dtgenIDt[2])[0].value = document.getElementsByName(dtgenIDt[2])[0].value.replace(/_/g," ");
      document.getElementsByName(dtgenIDt[3])[0].value = document.getElementsByName(dtgenIDt[3])[0].value.replace(/_/g," ");
      document.getElementsByName(dtgenIDt[4])[0].value = document.getElementsByName(dtgenIDt[4])[0].value.replace(/_/g," ");
      
      if (dtgenDoubleTag) {
        document.getElementsByName(dtgenIDt[5])[0].value = document.getElementsByName(dtgenIDt[5])[0].value.replace(/_/g," ");
        document.getElementsByName(dtgenIDt[6])[0].value = document.getElementsByName(dtgenIDt[6])[0].value.replace(/_/g," ");
        document.getElementsByName(dtgenIDt[7])[0].value = document.getElementsByName(dtgenIDt[7])[0].value.replace(/_/g," ");
        document.getElementsByName(dtgenIDt[8])[0].value = document.getElementsByName(dtgenIDt[8])[0].value.replace(/_/g," ");
        document.getElementsByName(dtgenIDt[9])[0].value = document.getElementsByName(dtgenIDt[9])[0].value.replace(/_/g," ");
      }
    }
    
    document.getElementById('button-cart').addEventListener("mousedown", dtgenInputAdjust, false);
    document.getElementById('button-cart').addEventListener("click", dtgenInputReady, false);
    
    document.getElementsByName(dtgenIDt[0])[0].addEventListener("keyup", tag1Changed, false);
    document.getElementsByName(dtgenIDt[1])[0].addEventListener("keyup", tag1Changed, false);
    document.getElementsByName(dtgenIDt[2])[0].addEventListener("keyup", tag1Changed, false);
    document.getElementsByName(dtgenIDt[3])[0].addEventListener("keyup", tag1Changed, false);
    document.getElementsByName(dtgenIDt[4])[0].addEventListener("keyup", tag1Changed, false);
    
    document.getElementsByName(dtgenIDt[0])[0].addEventListener("change", tag1Changed, false);
    document.getElementsByName(dtgenIDt[1])[0].addEventListener("change", tag1Changed, false);
    document.getElementsByName(dtgenIDt[2])[0].addEventListener("change", tag1Changed, false);
    document.getElementsByName(dtgenIDt[3])[0].addEventListener("change", tag1Changed, false);
    document.getElementsByName(dtgenIDt[4])[0].addEventListener("change", tag1Changed, false);
    /*
    document.getElementById('dtgen1BtnLeft').addEventListener("click", function(){tagAction(1,'left');}, false);
    document.getElementById('dtgen1BtnCenter').addEventListener("click", function(){tagAction(1,'center');}, false);
    document.getElementById('dtgen1BtnClear').addEventListener("click", function(){tagAction(1,'clear');}, false);
    document.getElementById('dtgen1BtnCopy').addEventListener("click", function(){tagAction(1,'copy');}, false);
    */
    if (dtgenDoubleTag) {
      document.getElementsByName(dtgenIDt[5])[0].addEventListener("change", tag2Changed, false);
      document.getElementsByName(dtgenIDt[6])[0].addEventListener("change", tag2Changed, false);
      document.getElementsByName(dtgenIDt[7])[0].addEventListener("change", tag2Changed, false);
      document.getElementsByName(dtgenIDt[8])[0].addEventListener("change", tag2Changed, false);
      document.getElementsByName(dtgenIDt[9])[0].addEventListener("change", tag2Changed, false);
      
      document.getElementsByName(dtgenIDt[5])[0].addEventListener("keyup", tag2Changed, false);
      document.getElementsByName(dtgenIDt[6])[0].addEventListener("keyup", tag2Changed, false);
      document.getElementsByName(dtgenIDt[7])[0].addEventListener("keyup", tag2Changed, false);
      document.getElementsByName(dtgenIDt[8])[0].addEventListener("keyup", tag2Changed, false);
      document.getElementsByName(dtgenIDt[9])[0].addEventListener("keyup", tag2Changed, false);
      /*
      document.getElementById('dtgen2BtnLeft').addEventListener("click", function(){tagAction(2,'left');}, false);
      document.getElementById('dtgen2BtnCenter').addEventListener("click", function(){tagAction(2,'center');}, false);
      document.getElementById('dtgen2BtnClear').addEventListener("click", function(){tagAction(2,'clear');}, false);
      document.getElementById('dtgen2BtnCopy').addEventListener("click", function(){tagAction(2,'copy');}, false);
      */
    } else {
      //document.getElementById('dtgen1BtnCopy').style.visibility = "hidden";
    }
    
    for (var i=0;i<document.getElementsByName(dtgenSName).length;i++) {
      document.getElementsByName(dtgenSName)[i].addEventListener("change", tagSiChanged, false);
    }
    
    for (var i=0;i<document.getElementsByName(dtgenMName).length;i++) {
      document.getElementsByName(dtgenMName)[i].addEventListener("change", tagMetalChanged, false);
    }
    
    function parseText(input,replaceSpaces) {
        var ret = input.replace(/[^a-z0-9\s@&',.\-\/()*\+\~!\?":]/gi,'');
        
        if (typeof replaceSpaces == 'undefined') replaceSpaces = true;
        if (replaceSpaces) {
            ret = ret.toUpperCase();
            ret = ret.replace(/&/g,'&amp;');
            ret = ret.replace(/\s/g,'&nbsp;');
            
        }
        return ret;
    }
    /*
    function tagAction(tag,action) {
      var dtgenlimit = (tag-1)*5; // Sets lower limit for textbox array. Will scan 0-4 or 5-9
        switch (action) {
            case 'left':
                for (var i=dtgenlimit;i<=dtgenlimit+4;i++) {
                    document.getElementsByName(dtgenIDt[i])[0].value = document.getElementsByName(dtgenIDt[i])[0].value.ltrim();
                }
                break;
            case 'center':
                for (var i=dtgenlimit;i<=dtgenlimit+4;i++) {
                    document.getElementsByName(dtgenIDt[i])[0].value = document.getElementsByName(dtgenIDt[i])[0].value.trim();
                    var tmp = document.getElementsByName(dtgenIDt[i])[0].value;
                    
                    // The below formula modified to accompany full 14 character ensemble for every line of text
                    //document.getElementsByName(dtgenIDt[i])[0].value = Array(Math.floor(((i==1||i==5?15:16)-tmp.length)/2)).join(' ') + tmp;
                    document.getElementsByName(dtgenIDt[i])[0].value = Array(Math.floor(((16)-tmp.length)/2)).join(' ') + tmp;
                }
                break;
            case 'clear':
                for (var i=dtgenlimit;i<=dtgenlimit+4;i++) {
                    document.getElementsByName(dtgenIDt[i])[0].value = '';
                }
                break;
            case 'copy':
                if (!dtgenDoubleTag) return false; // There has to be 2 tags obviously
                for (var i=dtgenlimit;i<=dtgenlimit+4;i++) {
                    document.getElementsByName(dtgenIDt[(tag==1?i+5:i-5)])[0].value = document.getElementsByName(dtgenIDt[i])[0].value;
                }
                tag = tag==1?2:1;
                break;
            default:
                break;
        }
        if (tag==1) tag1Changed(); else tag2Changed();
    }
    */
};
</script>
PRODUCT 36
<div id="content"><?php echo $content_top; ?>
  <div class="shop-product-box">
  <div class="shop-header"><?php echo $heading_title; ?></div>
  <div class="shop-box-content">
  <div class="product-info">
    <?php if ($thumb || $images) { ?>
    <div class="xxleft">
      <?php if ($thumb) { ?>

      <?php } ?>
      <?php if ($images) { ?>
      <div class="image-additional">
        <?php foreach ($images as $image) { ?>
        <a href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>" class="colorbox" rel="colorbox"><img src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a>
        <?php } ?>
      </div>
      <?php } ?>
    </div>
    <?php } ?>

    
    
    
        <?php if ($manufacturer) { ?>
        <span><?php echo $text_manufacturer; ?></span> <a href="<?php echo $manufacturers; ?>"><?php echo $manufacturer; ?></a><br />
        <?php } ?>
       
        <?php if ($reward) { ?>
        <span><?php echo $text_reward; ?></span> <?php echo $reward; ?><br />
        <?php } ?>
      <?php if ($price) { ?>
       <div class="shop-price">FROM JUST
        <?php if (!$special) { ?>
        <?php echo $price; ?> <?php echo $text_stock; ?> <?php echo $stock; ?></div>
        <?php } else { ?>
        <span class="price-old"><?php echo $price; ?></span> <span class="price-new"><?php echo $special; ?></span>
        <?php } ?>
        
        <?php if ($points) { ?>
        <span class="reward"><small><?php echo $text_points; ?> <?php echo $points; ?></small></span><br />
        <?php } ?>
        <?php if ($discounts) { ?>
        <br />
        <div class="discount">
          <?php foreach ($discounts as $discount) { ?>
          <?php echo sprintf($text_discount, $discount['quantity'], $discount['price']); ?><br />
          <?php } ?>
        </div>
        <?php } ?>
      <?php } ?>
     <div class="shop-description">    <?php echo MijoShop::get('base')->triggerContentPlg($description); ?>
</div>
  
      <?php if ($options) { ?>
      <div class="options">
       
        <?php foreach ($options as $option) { ?>
        <?php if ($option['type'] == 'select') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <div class="shop-required">*Required</div>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <select name="option_oc[<?php echo $option['product_option_id']; ?>]">
            <option value=""><?php echo $text_select; ?></option>
            <?php foreach ($option['option_value'] as $option_value) { ?>
            <option value="<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
            </option>
            <?php } ?>
          </select>
        </div>
        
        <?php } ?>
        <?php if ($option['type'] == 'radio') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <div class="shop-required">*Required</div>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <?php foreach ($option['option_value'] as $option_value) { ?>
          <input type="radio" name="option_oc[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
          <label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
          </label>
         
          <?php } ?>
        </div>
        
        <?php } ?>
        <?php if ($option['type'] == 'checkbox') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <div class="shop-required">*Required</div>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <?php foreach ($option['option_value'] as $option_value) { ?>
          <input type="checkbox" name="option_oc[<?php echo $option['product_option_id']; ?>][]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
          <label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
          </label>
         
          <?php } ?>
        </div>
        
        <?php } ?>
        <?php if ($option['type'] == 'image') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <div class="shop-required">*Required</div>
          <?php } ?>
         
       <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top">
            <?php foreach ($option['option_value'] as $option_value) { ?>
              <table class="option-image-css"  width="100" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><div class="shop-choice-image"><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><img src="<?php echo $option_value['image']; ?>" alt="<?php echo $option_value['name'] . ($option_value['price'] ? ' ' . $option_value['price_prefix'] . $option_value['price'] : ''); ?>" /></label></div></td>
  </tr>
  <tr>
    <td align="center" valign="top"><div class="shop-option-text">
    <input type="radio" name="option_oc[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
    
    
    
    <label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><div class="product-options"><?php echo $option_value['name']; ?></div>
                  
                </label></div></td>
  </tr>
  <tr>
    <td align="center" valign="top"><div class="product-options">
    <?php if ($option_value['price']) { ?>
                  <div class="shop-options-price"><?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?></div>
                  <?php } ?></div></td>
  </tr>
</table>
            <?php } ?>
           </td>
  </tr>
</table>
                
        </div>
       
        <?php } ?>
        
        <?php if ($option['type'] == 'text') { ?>
        
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <div class="shop-required">*Required</div>
          <?php } ?>
          
          
          <div class="product-left-align">
          <b><?php echo $option['name']; ?>:</b>
          <input name="option_oc[<?php echo $option['product_option_id']; ?>]" type="text" value="<?php echo $option['option_value']; ?>" size="30" maxlength="14" />
        </div></div>
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'textarea') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <div class="shop-required">*Required</div>
          <?php } ?>
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><img src="<?php echo $option['option_value']; ?>" /></td>
  </tr>
</table>
        </div>
        <br />
        <?php } ?>
        <?php if ($option['type'] == 'file') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <div class="shop-required">*Required</div>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <input type="button" value="<?php echo $button_upload; ?>" id="button-option-<?php echo $option['product_option_id']; ?>" class="shop-button">
          <input type="hidden" name="option_oc[<?php echo $option['product_option_id']; ?>]" value="" />
        </div>
        
        <?php } ?>
        <?php if ($option['type'] == 'date') { ?>
        
          <?php if ($option['required']) { ?>
          <div class="shop-required">*Required</div>
          <?php } ?>
          <div class="title-css"><?php echo $option['name']; ?>:</div>
         
        
        <?php } ?>
    
    
    
    
    <?php if ($option['type'] == 'datetime') {
      if (!isset($dtgenInc)) { $dtgenInc = 1; } else { $dtgenInc += 1; }
      ?>
      <div id="dtgenDisplay" style="position:relative;display:block;height:320px;width:280px;float:left">
        <img id="dtgen<?php echo $dtgenInc; ?>Metal" style="position:absolute; left:18px; top:0;" src="../../../../../../../../../images/get-your-tags/imported/dt_shiny.png" />
        <img id="dtgen<?php echo $dtgenInc; ?>Silencer" style="position:absolute; left:19px; top:1px; visibility: hidden;" src="../../../../../../../../../images/get-your-tags/imported/si_army_camo.png" />
        <img style="position:absolute; left:-58px; top:25px" src="../../../../../../../../../images/get-your-tags/imported/cs_steel.png" />
        <span id="dtgen<?php echo $dtgenInc; ?>Text" style="position:absolute; left:78px; top: 39px; font-weight: bold; color: #BBB; font-family: Courier New, Courier, sans-serif; text-shadow: #222 -1px 1px 1px, #FFF 1px -1px 1px"><!--Default<br>Text<br>Line3<br>Line4<br>Text--></span>
        
        <!--<div style="position: absolute; left: 96px; top: 160px; width: 118px; height: 31px;">
            <img style="cursor: pointer;" src="../../../../../../../../../images/get-your-tags/imported/btnAlignleft.gif" title="Left Align" alt="Left Align" id="dtgen<?php echo $dtgenInc; ?>BtnLeft" />
            <img style="cursor: pointer;" src="../../../../../../../../../images/get-your-tags/imported/btnAligncenter.gif" title="Center Align" alt="Center Align" id="dtgen<?php echo $dtgenInc; ?>BtnCenter" />
            <img style="cursor: pointer;" src="../../../../../../../../../images/get-your-tags/imported/btnClear.gif" title="Clear" alt="Clear" id="dtgen<?php echo $dtgenInc; ?>BtnClear" />
            <img style="cursor: pointer;" src="../../../../../../../../../images/get-your-tags/imported/btnRight.gif" title="Copy to Other Tag" alt="Copy to Other Tag" id="dtgen<?php echo $dtgenInc; ?>BtnCopy" />
        </div>-->
      </div>
<?php } ?>
    
    
    
    
        <?php if ($option['type'] == 'time') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <div class="shop-required">*Required</div>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <input type="text" name="option_oc[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="time" />
        </div>
        <br />
        <?php } ?>
        <?php } ?>
      </div>
      <?php } ?>
    <div class="cart">
        <div><?php echo $text_qty; ?>
          <input type="text" name="quantity" size="2" value="<?php echo $minimum; ?>" />
          <input type="hidden" name="product_id" size="2" value="<?php echo $product_id; ?>" />
          &nbsp;
          <input type="button" value="<?php echo $button_cart; ?>" id="button-cart" class="shop-button" />
        </div>
      
        
        <?php if ($minimum > 1) { ?>
        <div class="minimum"><?php echo $text_minimum; ?></div>
        <?php } ?>
      </div>
      <?php if ($review_status) { ?>
      <div class="review">
    
        <div class="share"><!-- AddThis Button BEGIN -->
          <div class="addthis_default_style"><a class="addthis_button_compact"><?php echo $text_share; ?></a> <a class="addthis_button_email"></a><a class="addthis_button_print"></a> <a class="addthis_button_facebook"></a> <a class="addthis_button_twitter"></a></div>
          <script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js"></script> 
          <!-- AddThis Button END --> 
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  

    
  </div>
  
  

  <?php if ($products) { ?>
  <div id="tab-related" class="shop-related-tab">
  
  RELATED PRODUCTS
  
    <div class="xxxbox-product">
      <?php foreach ($products as $product) { ?>
      <div>
        <?php if ($product['thumb']) { ?>
        <div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a></div>
        <?php } ?>
        <div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
        <?php if ($product['price']) { ?>
        <div class="price">
          <?php if (!$product['special']) { ?>
          <?php echo $product['price']; ?>
          <?php } else { ?>
          <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
          <?php } ?>
        </div>
        <?php } ?>
        <?php if ($product['rating']) { ?>
        <div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
        <?php } ?>
        <a onclick="addToCart('<?php echo $product['product_id']; ?>');" class="button"><?php echo $button_cart; ?></a></div>
      <?php } ?>
    </div>
  </div>
  <?php } ?>
  <?php if ($tags) { ?>
  <div class="tags"><b><?php echo $text_tags; ?></b>
    <?php for ($i = 0; $i < count($tags); $i++) { ?>
    <?php if ($i < (count($tags) - 1)) { ?>
    <a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>,
    <?php } else { ?>
    <a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>
    <?php } ?>
    <?php } ?>
  </div>
  <?php } ?>
  </div>
  </div>
  <?php echo $content_bottom; ?></div>
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.colorbox').colorbox({
		overlayClose: true,
		opacity: 0.5,
		rel: "colorbox"
	});
});
//--></script> 
<script type="text/javascript"><!--
$('#button-cart').bind('click', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: $('.product-info input[type=\'text\'], .product-info input[type=\'hidden\'], .product-info input[type=\'radio\']:checked, .product-info input[type=\'checkbox\']:checked, .product-info select, .product-info textarea'),
		dataType: 'json',
		success: function(json) {
			$('.success, .warning, .attention, information, .error').remove();
			
			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						$('#option-' + i).after('<span class="error">' + json['error']['option'][i] + '</span>');
					}
				}
			} 
			
			if (json['success']) {
				$('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
					
				$('.success').fadeIn('slow');
					
				$('#cart-total').html(json['total']);

                updateMijocartModule();
				
				$('html, body').animate({ scrollTop: 0 }, 'slow'); 
			}	
		}
	});
});
//--></script>
<?php if ($options) { ?>

<?php foreach ($options as $option) { ?>
<?php if ($option['type'] == 'file') { ?>
<script type="text/javascript"><!--
new AjaxUpload('#button-option-<?php echo $option['product_option_id']; ?>', {
	action: 'index.php?route=product/product/upload',
	name: 'file',
	autoSubmit: true,
	responseType: 'json',
	onSubmit: function(file, extension) {
		$('#button-option-<?php echo $option['product_option_id']; ?>').after('<img src="catalog/view/theme/default/image/loading.gif" class="loading" style="padding-left: 5px;" />');
		$('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', true);
	},
	onComplete: function(file, json) {
		$('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', false);
		
		$('.error').remove();
		
		if (json['success']) {
			alert(json['success']);
			
			$('input[name=\'option_oc[<?php echo $option['product_option_id']; ?>]\']').attr('value', json['file']);
		}
		
		if (json['error']) {
			$('#option-<?php echo $option['product_option_id']; ?>').after('<span class="error">' + json['error'] + '</span>');
		}
		
		$('.loading').remove();	
	}
});
//--></script>
<?php } ?>
<?php } ?>
<?php } ?>
<script type="text/javascript"><!--
$('#review .pagination a').live('click', function() {
	$('#review').fadeOut('slow');
		
	$('#review').load(this.href);
	
	$('#review').fadeIn('slow');
	
	return false;
});			

$('#review').load('index.php?route=product/product/review&product_id=<?php echo $product_id; ?>');

$('#button-review').bind('click', function() {
	$.ajax({
		url: 'index.php?route=product/product/write&product_id=<?php echo $product_id; ?>',
		type: 'post',
		dataType: 'json',
		data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val()) + '&rating=' + encodeURIComponent($('input[name=\'rating\']:checked').val() ? $('input[name=\'rating\']:checked').val() : '') + '&captcha=' + encodeURIComponent($('input[name=\'captcha\']').val()),
		beforeSend: function() {
			$('.success, .warning').remove();
			$('#button-review').attr('disabled', true);
			$('#review-title').after('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
		
			document.getElementById('captcha').src = 'index.php?route=product/product/captcha&' + (Math.floor(Math.random()*1000) + 1);
		},
		complete: function() {
			$('#button-review').attr('disabled', false);
			$('.attention').remove();
		},
		success: function(data) {
			if (data['error']) {
				$('#review-title').after('<div class="warning">' + data['error'] + '</div>');
			}
			
			if (data['success']) {
				$('#review-title').after('<div class="success">' + data['success'] + '</div>');
								
				$('input[name=\'name\']').val('');
				$('textarea[name=\'text\']').val('');
				$('input[name=\'rating\']:checked').attr('checked', '');
				$('input[name=\'captcha\']').val('');
			}
		}
	});
});
//--></script> 
<script type="text/javascript"><!--
$('#tabs a').tabs();
//--></script> 

<script type="text/javascript"><!--
$(document).ready(function() {
  	if ($.browser.msie && $.browser.version == 6) {
		$('.date, .datetime, .time').bgIframe();
	}

	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
	$('.datetime').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'h:m'
	});
	$('.time').timepicker({timeFormat: 'h:m'});
	
        try {
	document.getElementById('captcha').src = 'index.php?route=product/product/captcha&' + (Math.floor(Math.random()*1000) + 1);
        } catch(err) { } // This is halting script execution
        
        
});
//--></script> 
<?php echo $footer; ?>