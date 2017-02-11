function display_error_box(e, r) {
    var t = r.join("<br>");
    $(".alert-box").length || $("#" + e).prepend('<div class="clearfix"></div><div data-alert="" class="alert-box alert"></div>'), $(".alert-box").show(), $(".alert-box").addClass("alert"), $(".alert-box").html(t), $(".alert-box").prepend(close_error_html)
}

function remove_error_box() {
    $(".alert-box").hide()
}

function check_iszero(e) {
    var r = parseInt($(e).val());
    0 == r && $(e).val("")
}

function iszero(e) {
    var r = $(e).val();
    "" == r && $(e).val("0")
}

function displayErrorBoxForField(e, r, t) {
    var a = r.join("<br>");
    $(".alert-box" + t).length || $("#" + e).prepend('<div class="clearfix"></div><div data-alert="" class="alert-box alert-box' + t + " alert" + t + ' alert"></div>'), $(".alert-box" + t).show(), $(".alert-box" + t).addClass("alert");
    var o = '<a href="#" class="alertclose" onclick="javascript:removeErrorBoxForField(this);"><i class="fa fa-times"></i></a>';
    $(".alert-box" + t).html(a), $(".alert-box" + t).prepend(o)
}

function removeErrorBoxForField(e) {
    $(e).parent().hide()
}

function check_isammount(e, r) {
    if (-1 != $.inArray(e.keyCode, [110, 190])) {
        var t = $(r).val(),
            a = t.split(".");
        return "." == t.charAt(0) && $(r).val("0."), (0 == a.length || a.length > 2) && a.length > 2 && (t = a[0] + "." + a[1].substr(0, 2), $(r).val(t)), !1
    }
    var t = $(r).val();
    if (!(-1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || 65 == e.keyCode && e.ctrlKey === !0 || 67 == e.keyCode && e.ctrlKey === !0 || 88 == e.keyCode && e.ctrlKey === !0 || e.keyCode >= 35 && e.keyCode <= 39) && ((e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) || 32 == e.keyCode || t.indexOf(".")))
        for (var o = t.length - 1; o >= 0; o--) {
            var l = t.length,
                i = t.indexOf(".");
            if (i > 0) {
                var n = l + 1 - i;
                if (n > 4) {
                    var s = t.lastIndexOf(t.charAt(o));
                    if (-1 != s) {
                        var c = t.substr(0, s) + t.substr(s + 1);
                        $(r).val(c), t = c
                    }
                }
            }
            if (t = t.split(" ").join(""), 0 == $.isNumeric(t.charAt(o)) && "." != t.charAt(o)) {
                var s = t.lastIndexOf(t.charAt(o));
                if (-1 != s) {
                    var c = t.substr(0, s) + t.substr(s + 1);
                    $(r).val(c), t = c
                }
            }
        }
}

function check_isalphanumeric(e, r) {
    var t = $(r).val();
    if (32 != e.keyCode && !(-1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13]) || 65 == e.keyCode && e.ctrlKey === !0 || 67 == e.keyCode && e.ctrlKey === !0 || 88 == e.keyCode && e.ctrlKey === !0 || e.keyCode >= 35 && e.keyCode <= 39)) {
        var a = /^[a-zA-Z0-9]+$/;
        if ((e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && (e.keyCode < 65 || e.keyCode > 90) && (e.keyCode < 97 || e.keyCode > 122) || 32 == e.keyCode || 110 == e.keyCode || 190 == e.keyCode)
            for (var o = t.length - 1; o >= 0; o--)
                if (t = t.split(" ").join(" "), !a.test(t)) {
                    var l = t.lastIndexOf(t.charAt(o));
                    if (-1 != l) {
                        var i = t.substr(0, l) + t.substr(l + 1);
                        $(r).val(i), t = i
                    }
                }
    }
}

function sanitize_float(e, r) {
    var t = $(r).val();
    "" == t && (t = "0"), "." == t.charAt(parseInt(t.length) - 1) ? (newdata = t + "00", $(r).val(newdata)) : (-1 == t.indexOf(".") || 0 == parseInt(t)) && (check_iszero(r), parseFloat(t) > 0 ? newdata = parseFloat(t).toFixed(2) : newdata = parseFloat("0.00").toFixed(2), $(r).val(newdata))
}

function check_gernalstring(e, r) {
    var t = $(r).val();
    if (!(-1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || 65 == e.keyCode && e.ctrlKey === !0 || 67 == e.keyCode && e.ctrlKey === !0 || 88 == e.keyCode && e.ctrlKey === !0 || e.keyCode >= 35 && e.keyCode <= 39 || 59 != e.keyCode && 54 != e.keyCode))
        for (var a = t.length - 1; a >= 0; a--)
            if (t = t.split(" ").join(" "), ";" == t.charAt(a) || "^" == t.charAt(a)) {
                var o = t.lastIndexOf(t.charAt(a));
                if (-1 != o) {
                    var l = t.substr(0, o) + t.substr(o + 1);
                    $(r).val(l), t = l
                }
            }
}

function check_isnumeric(e, r, t) {
    var a = 1;
    if (a = 1 == t ? 1 : 0, -1 !== $.inArray(e.keyCode, [110, 190])) {
        var o = $(r).val(),
            l = o.split(".");
        if ("1" != a) return "." == o.charAt(0) && (s = "0" + o, $(r).val(s)), (0 == l.length || l.length > 2) && l.length > 2 && (o = l[0] + "." + l[1], $(r).val(o)), !1;
        o = l[0], $(r).val(o)
    } else {
        var o = $(r).val();
        if (-1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || 65 == e.keyCode && e.ctrlKey === !0 || 67 == e.keyCode && e.ctrlKey === !0 || 88 == e.keyCode && e.ctrlKey === !0 || e.keyCode >= 35 && e.keyCode <= 39) return;
        if ((e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) || 32 == e.keyCode)
            for (var i = o.length - 1; i >= 0; i--)
                if (o = o.split(" ").join(""), 0 == $.isNumeric(o.charAt(i)) && "." != o.charAt(i)) {
                    var n = o.lastIndexOf(o.charAt(i));
                    if (-1 != n) {
                        var s = o.substr(0, n) + o.substr(n + 1);
                        $(r).val(s), o = s
                    }
                }
    }
}

function check_ismobile(e, r) {
    var t = $(r).val(),
        a = r.id,
        o = /^[+91]?[0]?[789]\d{9}$/;
    return o.test(t) ? void $("#" + a + "_errorlabel").html("") : ($(r).val(""), $("#" + a + "_errorlabel").html("Please enter valid Mobile"), $("#" + a).focus(), !1)
}

function check_isemail(e, r) {
    var t = $(e).val(),
        a = $(e).attr("id"),
        o = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return o.test(t) ? ($("#" + a + "_errorlabel").html(""), $("button[type=submit]").prop("disabled", !1), !0) : (console.log(a), $("#" + a + "_errorlabel").html("Please enter valid email id"), $("#" + a).focus(), r.preventDefault(), $("button[type=submit]").prop("disabled", !0), !1)
}

function check_ispan(e, r) {
    var t = $(e).val(),
        a = $(e).attr("id"),
        o = /^[A-Z]{5}\d{4}[A-Z]{1}$/;
    return $("#" + a + "_errorlabel").html(""), o.test(t) ? ($("#" + a + "_errorlabel").html(""), $("button[type=submit]").prop("disabled", !1), !0) : (console.log(a), $("#" + a + "_errorlabel").html("Please enter valid Pan number"), $("#" + a).focus(), r.preventDefault(), $("button[type=submit]").prop("disabled", !0), !1)
}

function bulk_isemail(e) {
    var r = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return r.test(e) ? ($("button[type=submit]").prop("disabled", !1), 0) : 1
}

function check_validled() {
    var e = $("#from_ledger").val(),
        r = $("#to_ledger").val();
    return $("#from_ledger_errorlabel").html(""), $("#to_ledger_errorlabel").html(""), "" == r || void 0 == r ? ($("#to_ledger_errorlabel").html("Select Source Ledger"), !1) : "" == e || void 0 == e ? ($("#from_ledger_errorlabel").html("Select Destination Ledger"), !1) : r == e ? ($("#to_ledger_errorlabel").html("Select Diffrent From Destination"), !1) : void 0
}

function defaultFail(e, r) {
    "error" === r && (r = e.statusText);
    var t = "There was a communication error: " + r;
    window.console && console.log(t)
}

function ajaxCall(e, r, t, a, o, l) {
    var i = ("null" != a ? a : defaultSuccess, "null" != r ? r : ""),
        n = [];
    "" != i && $.each(i, function(e, r) {
        var t = new Object;
        t.name = e, t.value = r, n.push(t)
    }), "null" != e && (n = new FormData($("#" + e)[0]));
    var s = array.filter(function(r) {
            return r.name === e
        })[0],
        c = s.value;
    $.ajax({
        url: c,
        method: "POST",
        crossDomain: !0,
        data: n,
        processData: !1,
        contentType: !1,
        dataType: "json",
        beforeSend: function(r) {
            $(".icon" + e).addClass("ace-icon fa fa-spinner fa-spin orange bigger-125"), $(".btn-info").attr("disabled")
        },
        success: function(r) {
            console.log("data"), console.log(r), 1 == r.success ? ($(".icon" + e).removeClass("ace-icon fa fa-spinner fa-spin orange bigger-125"), $(".btn-info").attr("enabled"), $(".alert-box").html('<div class="alert alert-block alert-success">                    <button type="button" class="close" data-dismiss="alert">                        <i class="ace-icon fa fa-times"></i>                    </button>                    <p>                        <strong>                            ' + r.successMsg + "                        </strong>                    </p>                </div>"), $("#" + e)[0].reset(), void 0 != r.redirect && "undefined" != r.redirect && "" != r.redirect && (location.href = r.redirect)) : ($(".icon" + e).removeClass("ace-icon fa fa-spinner fa-spin orange bigger-125"), $(".alert-box").html('<div class="alert alert-block alert-danger">                    <button type="button" class="close" data-dismiss="alert">                        <i class="ace-icon fa fa-times"></i>                    </button>                    <p>                        <strong>                            ' + r.errorMsg + "                        </strong>                    </p>                </div>"))
        },
        error: function(e, r, t) {
            console.log(t)
        }
    })
}

function get_date() {
    var e = new Date,
        r = e.getDate(),
        t = e.getMonth() + 1,
        a = e.getFullYear();
    return 10 > r && (r = "0" + r), 10 > t && (t = "0" + t), e = r + "/" + t + "/" + a
}

function change_format(e) {
    var r = e.split("-"),
        t = r[1] + "/" + r[2] + "/" + r[0];
    return t
}

function commanajaxCall(e, r, t, a, o, l, i) {
    var n = "null" != r ? r : "",
        s = "null" != o ? o : defaultSuccess,
        c = "null" != t ? t : "",
        d = "null" != a ? a : "GET",
        u = "null" != l ? l : defaultFail,
        f = "null" != i ? i : 9e3,
        v = [];
    "" != c && $.each(c, function(e, r) {
        var t = new Object;
        t.name = e, t.value = r, v.push(t)
    }), "null" != e && (v = $("#" + e).serializeArray()), $.ajax({
        url: n,
        type: d,
        data: v,
        async: !1,
        timeout: f,
        success: s,
        error: u,
        beforeSend: function(e) {},
        complete: function() {}
    })
}
$body = $("body"), $(document).bind({
    ajaxStart: function() {
        $body.addClass("loading")
    },
    ajaxStop: function() {
        $body.removeClass("loading")
    }
});
var close_error_html = '<a href="#" class="alertclose" onclick="javascript:remove_error_box();"><i class="fa fa-times"></i></a>';
$(document).ready(function() {
    $("button[type=submit]").click(function(e) {
        var r, t = ($(this).val(), $(this).attr("name"), $(this).closest("form").attr("id"));
        if ("expensemaster" == t || "journalvoucher" == t) {
            var a = check_validled();
            if (0 == a) return !1
        }
        if ("addgroup" == t) {
            $("#lstParentAccount_errorlabel").html("");
            var o = $("#lstParentAccount").val();
            if ("" == o || void 0 == o) return $("#lstParentAccount_errorlabel").html("Select Parent Entity"), !1
        }
        var l = ["frmSocUnitsAdd"],
            i = !1,
            n = "null",
            s = "POST",
            c = "",
            d = "",
            u = "10";
        if (t && $.inArray(t, l)) {
            var f = "",
                v = [],
                m = $("#" + t).find(":input.mandatory-field");
            $("#" + t).find(":input.mandatory-field").each(function(e) {
                return "" == $.trim(m.eq(e).val()) || "0" == $.trim(m.eq(e).val()) ? (r = m.eq(e).attr("id"), !1) : void 0
            }), $("#" + t).find(":input.mandatory-field").each(function(a) {
                var o = "",
                    l = "",
                    n = m.eq(a).attr("id"),
                    s = m.eq(a).attr("name"),
                    c = $("#" + t).find('label[for="' + n + '"]').text();
                if (c) var o = " " + c,
                    l = o.replace("*", "");
                else var o = m.eq(a).attr("placeholder"),
                    l = o.replace("Enter", "");
                if ("" != $.trim(m.eq(a).val()) && (v = m.eq(a).attr("id"), $("#" + v).val(), $("#" + v + "_errorlabel").html("")), "" == $.trim(m.eq(a).val()) || "0" == $.trim(m.eq(a).val())) v = m.eq(a).attr("id"), $("#" + v).val(), $("#" + v + "_errorlabel").html("Please enter" + l.toLowerCase()), i = "true", $("#" + r).focus(), e.preventDefault();
                else if (s.toLowerCase().indexOf("email") > -1 && "" != $.trim(m.eq(a).val())) {
                    var d = check_isemail(m.eq(a));
                    0 == d && (i = "true")
                }
            }), "" != f && (alert("Please fill the following mandatory field(s) \n" + f), $("#" + v[0]).focus(), e.preventDefault()), 0 == i && (e.preventDefault(), ajaxCall(t, n, s, c, d, u))
        }
    }), $(document).on("click", ".delete", function(e) {
        e.preventDefault();
        var r = $(".form").attr("id");
        if ("ledList" == r || "grpList" == r) var t = "Are you sure you want to disabled!";
        else var t = "Are you sure you want to delete!";
        if (confirm(t)) {
            var r = $(".form").attr("id"),
                a = $(this).attr("id");
            if ("accountList" == r || "ledList" == r || "grpList" == r) {
                var o = confirm("Disable Entity may lead to data inconsistancy");
                if (0 == o) return !1
            }
            var l = array.filter(function(e) {
                    return e.name === r
                })[0],
                i = l.value;
            jobject = {
                id: a
            };
            var n = $(this);
            $.ajax({
                url: i,
                method: "POST",
                crossDomain: !0,
                data: jobject,
                dataType: "json",
                beforeSend: function(e) {},
                success: function(e) {
                    0 == e.success || "ledList" == r || "grpList" == r || n.parent().parent().parent().remove(), alert(e.successMsg)
                },
                error: function(e, r, t) {
                    console.log(t)
                }
            })
        }
    });
    var e = 1;
    $(document).on("click", "#add", function(r) {
        r.preventDefault(), e++, $(".files").last().after('<div class="form-group files">                            <label class="col-sm-3 control-label no-padding-right" for=""></label>                            <div class="col-sm-4">                                <input name="vehichleImage' + e + '" type="file" />                                <span class="help-inline col-xs-12 col-sm-7">                                    <span class="middle input-text-error" id="tpermit_exp_errorlabel"></span>                                </span>                            </div>                        </div>')
    })
}), $(document).on("click", ".disabled", function(e) {
    e.preventDefault();
    var r = $(".form").attr("id");
    if ("ledList" == r) var t = "Are you sure you want to disabled Ledger!";
    else var t = "Are you sure you want to disabled Group!";
    if (confirm(t)) {
        var r = $(".form").attr("id"),
            a = $(this).attr("id");
        if ("ledList" == r || "grpList" == r) {
            var o = confirm("Disable Entity may lead to data inconsistancy");
            if (0 == o) return !1
        }
        var l = array.filter(function(e) {
                return e.name === r
            })[0],
            i = l.value;
        jobject = {
            id: a
        }, $(this), $.ajax({
            url: i,
            method: "POST",
            crossDomain: !0,
            data: jobject,
            dataType: "json",
            beforeSend: function(e) {},
            success: function(e) {
                alert(e.successMsg), void 0 != e.redirect && "undefined" != e.redirect && "" != e.redirect && void 0 != e.isredirect && "undefined" != e.isredirect && 0 != e.isredirect && (location.href = e.redirect)
            },
            error: function(e, r, t) {
                console.log(t)
            }
        })
    }
}), $("#from_ledger > optgroup").each(function() {
    var e = $(this).attr("parent_id");
    (void 0 == e || "" == e) && $(this).remove()
}), $("#to_ledger > optgroup").each(function() {
    var e = $(this).attr("parent_id");
    (void 0 == e || "" == e) && $(this).remove()
});