$(function () {
    // Project - Create
    if (document.getElementById('page_project_create') != null) {
        if (jQuery().bootstrapWizard) {
            var r = $("#form_project_create"),
                t = $(".alert-danger", r),
                i = $(".alert-success", r);
                
            r.validate({
                doNotHideMessage: !0,
                errorElement: "span",
                errorClass: "help-block help-block-error",
                focusInvalid: !1,
                rules: {
                    id_company: "required",
                    id_project_type: "required",
                    name: "required",
                    division: "required",
                    department: "required",
                    start_date: "required",
                    end_date: "required",
                    name_group: "required"
                },
                messages: {
                    id_company: {
                        required:"Please insert company."
                    },
                    id_project_type: {
                        required:"Please insert project type."
                    },
                    name: {
                        required:"Please insert name."
                    },
                    division: {
                        required:"Please insert division."
                    },
                    department: {
                        required:"Please insert department."
                    },
                    start_date: {
                        required:"Please insert timeline from."
                    },
                    end_date: {
                        required:"Please insert timeline to."
                    },
                    name_group: {
                        required:"Please insert name group."
                    }
                },
                invalidHandler: function(e, r) {
                    i.hide(), t.show(), App.scrollTo(t, -200)
                },
                highlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-success").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
                success: function(e) {
                    "gender" == e.attr("for") || "payment[]" == e.attr("for") ? (e.closest(".form-group").removeClass("has-error").addClass("has-success"), e.remove()) : e.addClass("valid").closest(".form-group").removeClass("has-error").addClass("has-success")
                },
                submitHandler: function(e) {
                    i.show(), t.hide()
                }
            });
            
            var a = function() {
                $("#tab4 .form-control-static", r).each(function() {
                    var e = $('[name="' + $(this).attr("data-display") + '"]', r);
                    if (e.is(":radio") && (e = $('[name="' + $(this).attr("data-display") + '"]:checked', r)), e.is(":text") || e.is("textarea")) $(this).html(e.val());
                    else if (e.is("select")) $(this).html(e.find("option:selected").text());
                    else if (e.is(":radio") && e.is(":checked")) $(this).html(e.attr("data-title"));
                    else if ("payment[]" == $(this).attr("data-display")) {
                        var t = [];
                        $('[name="payment[]"]:checked', r).each(function() {
                            t.push($(this).attr("data-title"))
                        }), $(this).html(t.join("<br>"))
                    }
                })
            },
            o = function(e, r, t) {
                var i = r.find("li").length,
                    o = t + 1;
                $(".step-title", $("#form_wizard_1")).text("Step " + (t + 1) + " of " + i), jQuery("li", $("#form_wizard_1")).removeClass("done");
                for (var n = r.find("li"), s = 0; t > s; s++) jQuery(n[s]).addClass("done");
                1 == o ? $("#form_wizard_1").find(".button-previous").hide() : $("#form_wizard_1").find(".button-previous").show(), o >= i ? ($("#form_wizard_1").find(".button-next").hide(), $("#form_wizard_1").find(".button-submit").show(), a()) : ($("#form_wizard_1").find(".button-next").show(), $("#form_wizard_1").find(".button-submit").hide()), App.scrollTo($(".page-title"))
            };
            
            $("#form_wizard_1").bootstrapWizard({
                nextSelector: ".button-next",
                previousSelector: ".button-previous",
                onTabClick: function(e, r, t, i) {
                    return !1
                },
                onNext: function(e, a, n) {
                    return i.hide(), t.hide(), 0 == r.valid() ? !1 : void o(e, a, n)
                },
                onPrevious: function(e, r, a) {
                    i.hide(), t.hide(), o(e, r, a)
                },
                onTabShow: function(e, r, t) {
                    var i = r.find("li").length,
                        a = t + 1,
                        o = a / i * 100;
                    $("#form_wizard_1").find(".progress-bar").css({
                        width: o + "%"
                    })
                }
            }), $("#form_wizard_1").find(".button-previous").hide(), $("#form_wizard_1 .button-submit").click(function() {
                alert("Finished! Hope you like it :)")
            }).hide(), $("#country_list", r).change(function() {
                r.validate().element($(this))
            })
        }
        
        $('#project_type_others_name').hide();
        $('.id_project_type').change(function() {
            if (this.value == '96523343317958683') {
                $("#project_type_others_name").show();
            }
            else {
                $("#project_type_others_name").hide();
            }
        });
    }
    
    // Complaint - Create
    if (document.getElementById('page_complaint_create') != null) {
        var e=$("#form_complaint_create"),
            r=$(".alert-danger", e),
            i=$(".alert-success", e);
            
        e.validate( {
            errorElement:"span",
            errorClass:"help-block help-block-error",
            focusInvalid:!1,
            ignore:"",
            rules: {
                name: "required",
                id_user: "required",
                type: "required",
                description: "required"
            },
            messages: {
                name: {
                    required:"Please insert issue name."
                },
                id_user: {
                    required:"Please select user name."
                },
                type: {
                    required:"Please select type."
                },
                description: {
                    required:"Please insert description."
                }
            },
            invalidHandler:function(e, t) {
                i.hide(), r.show(), App.scrollTo(r, -200)
            },
            errorPlacement:function(e, r) {
                r.is(":checkbox")?e.insertAfter(r.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline")): r.is(":radio")?e.insertAfter(r.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline")): e.insertAfter(r)
            },
            highlight:function(e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight:function(e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
            success:function(e) {
                e.closest(".form-group").removeClass("has-error")
            },
            submitHandler:function(e) {
                i.show(), r.hide()
            }
        });
        
        return false;
    }
    
    // Company - Create
    if (document.getElementById('page_company_create') != null) {
        var e=$("#form_company_create"),
            r=$(".alert-danger", e),
            i=$(".alert-success", e);
            
        e.validate( {
            errorElement:"span",
            errorClass:"help-block help-block-error",
            focusInvalid:!1,
            ignore:"",
            rules: {
                name: {
                    required: true,
                    remote: {
                        url: newPathname + "check_company_name",
                        type: "post",
                        data: {
                            name: function() {
                                return $("#name").val();
                            }
                        }
                    }
                }
            },
            messages: {
                name: {
                    required:"Please insert company name.",
                    remote: "Name already exist"
                }
            },
            invalidHandler:function(e, t) {
                i.hide(), r.show(), App.scrollTo(r, -200)
            },
            errorPlacement:function(e, r) {
                r.is(":checkbox")?e.insertAfter(r.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline")): r.is(":radio")?e.insertAfter(r.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline")): e.insertAfter(r)
            },
            highlight:function(e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight:function(e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
            success:function(e) {
                e.closest(".form-group").removeClass("has-error")
            },
            submitHandler:function(e) {
                i.show(), r.hide();
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: e.action,
                    data: $(e).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        var response = $.parseJSON(data);
                        
                        new PNotify({
                            title: response.title,
                            text: response.msg,
                            type: response.type
                        });
                        
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
            }
        });
        
        return false;
    }
    
    // Project Type - Create
    if (document.getElementById('page_project_type_create') != null) {
        var e=$("#form_project_type_create"),
            r=$(".alert-danger", e),
            i=$(".alert-success", e);
            
        e.validate( {
            errorElement:"span",
            errorClass:"help-block help-block-error",
            focusInvalid:!1,
            ignore:"",
            rules: {
                name: {
                    required: true,
                    remote: {
                        url: newPathname + "check_project_type_name",
                        type: "post",
                        data: {
                            name: function() {
                                return $("#name").val();
                            }
                        }
                    }
                }
            },
            messages: {
                name: {
                    required:"Please insert project type name.",
                    remote: "Name already exist"
                }
            },
            invalidHandler:function(e, t) {
                i.hide(), r.show(), App.scrollTo(r, -200)
            },
            errorPlacement:function(e, r) {
                r.is(":checkbox")?e.insertAfter(r.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline")): r.is(":radio")?e.insertAfter(r.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline")): e.insertAfter(r)
            },
            highlight:function(e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight:function(e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
            success:function(e) {
                e.closest(".form-group").removeClass("has-error")
            },
            submitHandler:function(e) {
                i.show(), r.hide();
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: e.action,
                    data: $(e).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        var response = $.parseJSON(data);
                        
                        new PNotify({
                            title: response.title,
                            text: response.msg,
                            type: response.type
                        });
                        
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
            }
        });
        
        return false;
    }
    
    // Position - Create
    if (document.getElementById('page_position_create') != null) {
        var e=$("#form_position_create"),
            r=$(".alert-danger", e),
            i=$(".alert-success", e);
            
        e.validate( {
            errorElement:"span",
            errorClass:"help-block help-block-error",
            focusInvalid:!1,
            ignore:"",
            rules: {
                name: {
                    required: true,
                    remote: {
                        url: newPathname + "check_position_name",
                        type: "post",
                        data: {
                            name: function() {
                                return $("#name").val();
                            }
                        }
                    }
                }
            },
            messages: {
                name: {
                    required:"Please insert position name.",
                    remote: "Name already exist"
                }
            },
            invalidHandler:function(e, t) {
                i.hide(), r.show(), App.scrollTo(r, -200)
            },
            errorPlacement:function(e, r) {
                r.is(":checkbox")?e.insertAfter(r.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline")): r.is(":radio")?e.insertAfter(r.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline")): e.insertAfter(r)
            },
            highlight:function(e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight:function(e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
            success:function(e) {
                e.closest(".form-group").removeClass("has-error")
            },
            submitHandler:function(e) {
                i.show(), r.hide();
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: e.action,
                    data: $(e).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        var response = $.parseJSON(data);
                        
                        new PNotify({
                            title: response.title,
                            text: response.msg,
                            type: response.type
                        });
                        
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
            }
        });
        
        return false;
    }
    
    // Job Analyst - Create
    if (document.getElementById('page_job_analyst_create') != null) {
        var e=$("#form_job_analyst_create"),
            r=$(".alert-danger", e),
            i=$(".alert-success", e);
            
        e.validate( {
            errorElement:"span",
            errorClass:"help-block help-block-error",
            focusInvalid:!1,
            ignore:"",
            rules: {
                name: {
                    required: true,
                    remote: {
                        url: newPathname + "check_job_analyst_name",
                        type: "post",
                        data: {
                            name: function() {
                                return $("#name").val();
                            }
                        }
                    }
                }
            },
            messages: {
                name: {
                    required:"Please insert job analyst name.",
                    remote: "Name already exist"
                }
            },
            invalidHandler:function(e, t) {
                i.hide(), r.show(), App.scrollTo(r, -200)
            },
            errorPlacement:function(e, r) {
                r.is(":checkbox")?e.insertAfter(r.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline")): r.is(":radio")?e.insertAfter(r.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline")): e.insertAfter(r)
            },
            highlight:function(e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight:function(e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
            success:function(e) {
                e.closest(".form-group").removeClass("has-error")
            },
            submitHandler:function(e) {
                i.show(), r.hide();
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: e.action,
                    data: $(e).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        var response = $.parseJSON(data);
                        
                        new PNotify({
                            title: response.title,
                            text: response.msg,
                            type: response.type
                        });
                        
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
            }
        });
        
        return false;
    }
    
    // Job Role - Create
    if (document.getElementById('page_job_role_create') != null) {
        var e=$("#form_job_role_create"),
            r=$(".alert-danger", e),
            i=$(".alert-success", e);
            
        e.validate( {
            errorElement:"span",
            errorClass:"help-block help-block-error",
            focusInvalid:!1,
            ignore:"",
            rules: {
                name: {
                    required: true,
                    remote: {
                        url: newPathname + "check_job_role_name",
                        type: "post",
                        data: {
                            name: function() {
                                return $("#name").val();
                            }
                        }
                    }
                }
            },
            messages: {
                name: {
                    required:"Please insert job role name.",
                    remote: "Name already exist"
                }
            },
            invalidHandler:function(e, t) {
                i.hide(), r.show(), App.scrollTo(r, -200)
            },
            errorPlacement:function(e, r) {
                r.is(":checkbox")?e.insertAfter(r.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline")): r.is(":radio")?e.insertAfter(r.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline")): e.insertAfter(r)
            },
            highlight:function(e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight:function(e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
            success:function(e) {
                e.closest(".form-group").removeClass("has-error")
            },
            submitHandler:function(e) {
                i.show(), r.hide();
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: e.action,
                    data: $(e).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        var response = $.parseJSON(data);
                        
                        new PNotify({
                            title: response.title,
                            text: response.msg,
                            type: response.type
                        });
                        
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
            }
        });
        
        return false;
    }
});