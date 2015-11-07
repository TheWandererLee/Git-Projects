/************************************************************************************************************************


************************************************************************************************************************/
if (agDet) {
    agDet.defaultPage = { "search": 1, "map": 2, "list": 3 };
    agDet.default_dd_radius = '5';
    agDet.default_dd_minprice_sales = '';
    agDet.default_dd_maxprice_sales = '';
    agDet.default_dd_minprice_lettings = '';
    agDet.default_dd_maxprice_lettings = '';
	opts_dd_maxprice_sales = [25000, 50000, 75000, 100000, 125000, 150000, 175000, 225000, 250000, 275000, 300000, 350000, 400000, 450000, 500000, 550000, 600000, 700000, 800000, 900000, 1000000, 2000000, 3000000, 4000000, 5000000];
	
    agDet.propPage = 'properties';
    var propIframe = "http://powering2.expertagent.co.uk/customsearch.aspx?aid={" + agDet.agencyGuid + "}&";
    var dep = parseInt(jQuery.jqURL.get("dep"));
    if (isNaN(dep)) {
        dep = agDet.salesDepts[0];
    }

    jQuery(document).ready(function () {
        LoadSearchPod();
        InitSearchPod();
        LoadIFrame();
    });


    function LoadSearchPod() {
        jQuery(agDet.podDiv).load("/media/expertagent/ea/searchPodTemplate.htm", InitSearchPod);
    }

    function InitSearchPod() {
        jQuery("#tx_placename").autocomplete({
            source: function (request, response) {
                jQuery.ajax({
                    url: "http://gp2.expertagent.co.uk/powering/csplacenames.aspx",
                    dataType: "jsonp",
                    data: {
                        pn: request.term
                    },
                    success: function (data) {
                        response(data.results);
                    }
                });
            },
            minLength: 3,
            select: function (event, ui) {
                event.preventDefault();
                jQuery("#hd_placeid").val(ui.item ?
					ui.item.value :
					"0");
                jQuery("#tx_placename").val(ui.item ?
					ui.item.label :
					"");
            },
            open: function () {
                //jQuery(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function () {
                //jQuery(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
        jQuery(agDet.podDiv + " select").each(function (index) {
            var opts = "opts_" + this.id;
            var defaultVal = "default_" + this.id;
            if (this.id.indexOf("price") != -1) {
                PopulatePriceDropDown(this);
                //SetupPriceDefaults(this);
            }
            else if (typeof (window[opts]) != "undefined") {
                jQuery(this).addOption(window[opts], false);
                jQuery(this).sortOptions();
            }
            if (jQuery.jqURL.qs()) {
                jQuery(this).selectOptions(jQuery.jqURL.get(GetVarFromId(this.id), true));
            } 
            else {
                if (this.id === 'dd_dep') {
                    jQuery(this).selectOptions(dep.toString(), true);
                }
                else {
                    if (typeof (window['agDet'][defaultVal]) != "undefined") {
                        jQuery(this).selectOptions(window['agDet'][defaultVal], true);
                    }
                    else if (jQuery(this).containsOption("")) {
                        jQuery(this).selectOptions("", true);
                    } else {
                        jQuery(this)[0].selectedIndex = 0;
                    }
                }
            }
        });

        if (jQuery.jqURL.qs() && jQuery.jqURL.get("types") != null) {
            jQuery(agDet.podDiv + " #dd_types option").each(function (i, opt) {
                if (i > 0 && jQuery.jqURL.get("types").indexOf(jQuery(opt).val()) != -1) {
                    jQuery(opt).attr("selected", "selected");
                }
            });

            var $allTypesOptions = jQuery(agDet.podDiv + " #dd_types option");
            var allTypesSelected = true;
            $allTypesOptions.each(function (index) {
                if (index > 0) {
                    var selected = jQuery(this).attr("selected");
                    if (!selected) allTypesSelected = false;
                }
            });
            var $firstTypesCheckbox = $allTypesOptions.filter(":first");
            $firstTypesCheckbox.removeAttr("selected");
            if (allTypesSelected) {
                $firstTypesCheckbox.attr("selected", "selected");
            }
        }


        var $selected_types = jQuery(agDet.podDiv + " #dd_types :selected");
        var $types_dropdown = jQuery(agDet.podDiv + " #dd_types");
        if ($selected_types.val() == '' || $selected_types.size() == 0) {
            $types_dropdown.selectOptions(/./, true);
            $types_dropdown.selectOptions("", false);
        }

        $types_dropdown.dropdownchecklist("destroy");
        $types_dropdown.dropdownchecklist(
                {
                    firstItemChecksAll: true,
                    textFormatFunction: function (selectOptions) {
                        var selectedOptions = selectOptions.filter(":selected");
                        var numSelected = selectedOptions.size();
                        var size = selectOptions.size();
                        switch (numSelected) {
                            case 0: return "Please Select..";
                            case 1: return selectedOptions.text();
                            case size: return "All Types";
                            default: return numSelected + " / " + (size - 1) + " Types";
                        }
                    }
                });

        if (jQuery.jqURL.qs() && jQuery.jqURL.get("districts") != null) {
            jQuery(agDet.podDiv + " #dd_districts option").each(function (i, opt) {
                if (i > 0 && jQuery.jqURL.get("districts").indexOf(jQuery(opt).val()) != -1) {
                    jQuery(opt).attr("selected", "selected");
                }
            });

            var $allDistrictsOptions = jQuery(agDet.podDiv + " #dd_districts option");
            var allDistrictsSelected = true;
            $allDistrictsOptions.each(function (index) {
                if (index > 0) {
                    var selected = jQuery(this).attr("selected");
                    if (!selected) allDistrictsSelected = false;
                }
            });
            var $firstDistrictsCheckbox = $allDistrictsOptions.filter(":first");
            $firstDistrictsCheckbox.removeAttr("selected");
            if (allDistrictsSelected) {
                $firstDistrictsCheckbox.attr("selected", "selected");
            }
        }

        var $selected_districts = jQuery(agDet.podDiv + " #dd_districts :selected");
        var $districts_dropdown = jQuery(agDet.podDiv + " #dd_districts");
        if ($selected_districts.val() == '' || $selected_districts.size() == 0) {
            $districts_dropdown.selectOptions(/./, true);
            $districts_dropdown.selectOptions("", false);
        }

        $districts_dropdown.dropdownchecklist("destroy");
        $districts_dropdown.dropdownchecklist(
                {
                    firstItemChecksAll: true,
                    textFormatFunction: function (selectOptions) {
                        var selectedOptions = selectOptions.filter(":selected");
                        var numSelected = selectedOptions.size();
                        var size = selectOptions.size();
                        switch (numSelected) {
                            case 0: return "Please Select..";
                            case 1: return selectedOptions.text();
                            case size: return "All Areas";
                            default: return numSelected + " / " + (size - 1) + " Areas";
                        }
                    }
                });


        jQuery(agDet.podDiv + " #dd_dep").change(function () {
            dep = jQuery(this).val();
            PopulatePriceDropDowns();
        });


        if (jQuery.jqURL.qs() && jQuery.jqURL.get("placename") != null) {
            jQuery('#tx_placename').val(decodeURIComponent(jQuery.jqURL.get("placename")));
        }



        if (jQuery.jqURL.qs()) {
            jQuery(agDet.podDiv + " :checkbox").each(function () {
                if (jQuery.jqURL.get(GetVarFromId(this.id)) == "true") {
                    jQuery(this).attr('checked', true);
                }
            });

            jQuery(agDet.podDiv + " :text").each(function () {
                if (jQuery.jqURL.get(GetVarFromId(this.id)) != null) {
                    jQuery(this).val(decodeURIComponent(jQuery.jqURL.get(GetVarFromId(this.id))));
                }
            });

            jQuery(agDet.podDiv + " :hidden").each(function () {
                if (jQuery.jqURL.get(GetVarFromId(this.id)) != null) {
                    jQuery(this).val(decodeURIComponent(jQuery.jqURL.get(GetVarFromId(this.id))));
                }
            });
        }
    }

    function SetupPriceSlider(isChangedDept) {
        var $sl_price = jQuery(agDet.podDiv + " #sl_price");
        var sl_price_opts = window["opts_sl_price" + GetOptsSuffix()];
        var sl_minprice = sl_price_opts.min - sl_price_opts.step;
        var sl_maxprice = sl_price_opts.max + sl_price_opts.step;

        jQuery(agDet.podDiv + " #lbl_pricerange").html(sl_price_opts.priceText);

        $sl_price.slider({
            range: true,
            slide: function (event, ui) {
                jQuery(agDet.podDiv + " #lbl_minprice").html(((ui.values[0] != (sl_price_opts.min - sl_price_opts.step)) ? agDet.currencySymbol + ui.values[0] : 'No Min'));
                jQuery(agDet.podDiv + " #lbl_maxprice").html(((ui.values[1] != (sl_price_opts.max + sl_price_opts.step)) ? agDet.currencySymbol + ui.values[1] : 'No Max'));
            }
        });

        if (jQuery.jqURL.qs() && !isChangedDept) {
            var minpriceQs = parseInt(jQuery.jqURL.get("minprice"));
            if (!isNaN(minpriceQs)) {
                sl_minprice = minpriceQs;
            }
            var maxpriceQs = parseInt(jQuery.jqURL.get("maxprice"));
            if (!isNaN(maxpriceQs)) {
                sl_maxprice = maxpriceQs;
            }
        } else {
            sl_minprice = sl_price_opts.default_min;
            sl_maxprice = sl_price_opts.default_max;
        }


        $sl_price.slider("option", "step", sl_price_opts.step);
        $sl_price.slider("option", "min", sl_price_opts.min - sl_price_opts.step);
        $sl_price.slider("option", "max", sl_price_opts.max + sl_price_opts.step);
        $sl_price.slider("values", 0, sl_minprice);
        $sl_price.slider("values", 1, sl_maxprice);
        jQuery(agDet.podDiv + " #lbl_minprice").html(((sl_minprice != (sl_price_opts.min - sl_price_opts.step)) ? agDet.currencySymbol + sl_minprice : 'No Min'));
        jQuery(agDet.podDiv + " #lbl_maxprice").html(((sl_maxprice != (sl_price_opts.max + sl_price_opts.step)) ? agDet.currencySymbol + sl_maxprice : 'No Max'));
    }

    function PopulatePriceDropDowns() {
        jQuery(agDet.podDiv + " select[id *= 'price']").each(function () {
            PopulatePriceDropDown(this, dep);
        });
    }

    function PopulatePriceDropDown(dropDown) {
        jQuery(dropDown).removeOption(/./);
        var prices = window["opts_" + dropDown.id + GetOptsSuffix()];
        if (dropDown.id.indexOf("min") != -1) {
            jQuery(agDet.podDiv + " #" + dropDown.id).addOption('', 'No Minimum', false);
        }
        for (var i in prices) {
            if (typeof prices[i] !== 'function') {
                jQuery(agDet.podDiv + " #" + dropDown.id).addOption(prices[i], FormatPrice(prices[i], agDet.currencySymbol), false);
            }
        }
        if (dropDown.id.indexOf("max") != -1) {
            jQuery(agDet.podDiv + " #" + dropDown.id).addOption('', 'No Maximum', false);
        }
        SetupPriceDefaults(dropDown);
    }

    function SetupPriceDefaults(dropDown) {
        var defaultVal = window["agDet"]["default_" + dropDown.id + GetOptsSuffix()].toString();
        jQuery(dropDown).selectOptions(defaultVal, true);
    }

    function FormatPrice(price, currencySymbol) {
        price += '';
        var x = price.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        var formattedPrice = currencySymbol + x1 + x2 + ((IsLettingsDept()) ? agDet.lettingsSuffix : '');
        return jQuery("<div />").html(formattedPrice).text();
    }

    function LoadIFrame() {
        var iframeSrc = propIframe + ((jQuery.jqURL.qs()) ? jQuery.jqURL.qs() : "dep=" + dep);
        jQuery(agDet.propIframeId).attr("src", iframeSrc);
    }

    function Search(defaultPage) {
        var qsParams = {};
        qsParams.DefaultPage = (typeof defaultPage === 'undefined') ? agDet.defaultPage.list : defaultPage;
        jQuery(agDet.podDiv + " #dd_types option:first").removeAttr("selected");
        jQuery(agDet.podDiv + " select").each(function () {
            qsParams[GetVarFromId(this.id)] = jQuery(this).selectedValues();
        });

        jQuery(agDet.podDiv + " input:checked").each(function () {
            qsParams[GetVarFromId(this.id)] = "true";
        });

        jQuery(agDet.podDiv + " input[type=text]").each(function () {
            if (jQuery(this).val().length > 0) {
                qsParams[GetVarFromId(this.id)] = jQuery(this).val();
            }
        });

        jQuery(agDet.podDiv + " input[type=hidden]").each(function () {
            if (jQuery(this).val().length > 0) {
                qsParams[GetVarFromId(this.id)] = jQuery(this).val();
            }
        });

        var url = jQuery.jqURL.set(qsParams, true);
        var qs = url.substr(url.indexOf("?"));
        if (false){//url.indexOf(agDet.propPage) != -1) {//Was originally changing source of #PropertiesFrame
            jQuery(agDet.propIframeId).attr("src", propIframe + qs.substr(1));
        } else {
            jQuery.jqURL.loc(agDet.propPage + qs);
        }
    }



    function GetVarFromId(i) {
        return (i.substr(3));
    }

    function IsLettingsDept() {
        return (jQuery.inArray(parseInt(dep), agDet.lettingsDepts) != -1);
    }

    function GetOptsSuffix() {
        return ((IsLettingsDept()) ? '_lettings' : '_sales');
    }
} else {
    alert("EA Option file not found. This is required for the search pod to function - please contact support.");
}
