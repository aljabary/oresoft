
(function(){
    var isIE8 = !checkVersion();

    var video_want_send_data = true; // set to true if want to send video click event, false if not.
    var line_mem_pos_px;
    var line_tut_pos_px;
    var line_news_pos_px;

    var SKETCHBOOK_TRIAL_STATUS_IN_TRIAL = 0;
    var SKETCHBOOK_TRIAL_STATUS_TRIED_ON_THIS_MACHINE = 1;
    var SKETCHBOOK_TRIAL_STATUS_EXPIRED = 2;
    var SKETCHBOOK_TRIAL_STATUS_CAN_TRY = 3;

    var SKETCHBOOK_CAMPAIGN_STATUS_USING = 1;
    var SKETCHBOOK_CAMPAIGN_STATUS_NOT_USING = 0;

    var SKETCHBOOK_NOT_SUBSCRIBED = 0;

    var SKETCHBOOK_FREE_MEMBERSHIP = 0;
    var SKETCHBOOK_PRO_MEMBERSHIP = 1;

    var HOME_MEMBERSHIP_TAB = "membership";
    var HOME_TUTORIAL_TAB = "tutorials";

    /* Collect all the parameter values passed to the page here. */
    var LOCALE = sb_util.getParameterValue("locale", "en-us");
    var MEMBERSHIP = sb_util.getParameterValue("membership", "false");
    var SUBSCRIPTION = sb_util.getParameterValue("subscription", SKETCHBOOK_NOT_SUBSCRIBED.toString());
    var TRIAL = sb_util.getParameterValue("trial", SKETCHBOOK_TRIAL_STATUS_CAN_TRY.toString());
    var TRIAL_TIME_LEFT = sb_util.getParameterValue("trial_time_left", "0");
    var CAMPAIGN = sb_util.getParameterValue("campain_status", SKETCHBOOK_CAMPAIGN_STATUS_NOT_USING);
    var CAMPAIGN_TIME_LEFT = sb_util.getParameterValue("campaign_time_left", "0");
    var PAGE = sb_util.getParameterValue("page", "");
    var ISSIGNEDIN = sb_util.getParameterValue("signedin", "");
    var ISMAS = sb_util.getParameterValue("ismas", "false");
    var TRIAL_ACTIVATED = sb_util.getParameterValue("trial_activated", "false");
    var IS_ACTIVATING_TRIAL = sb_util.getParameterValue("is_activating_trial", "false");
    var VIDEO = sb_util.getParameterValue("video", "");
    var NEWS = sb_util.getParameterValue("news", "");
    var TRIAL_DAYS = sb_util.getParameterValue("trial_days", "15");
    /* End - Collect all the parameter values passed to the page here. */

    loadJS();

    window.onload=function(){ 
        localizePage();
        changeLinePos();
        selectParameters();
        hideBody(false);

        prepareUIForLocalization();

        $('#fullpage').fullpage({
            anchors: ['firstPage', 'secondPage', '3rdPage', '4rdPage', '5rdPage', '6rdPage','7rdPage', '8rdPage', '9rdPage'],
            verticalCentered: false,
            navigation: true,
            navigationPosition: 'right',
        });

        $("#ok_btn").click(function(){
            // Here we assume the page already has the trial time, so we just close the dialog here.
            $("#trial_activated").addClass("mhide");
        });

        load_loop_image();

        $("#index_34").click(function(){
            window.location.href = "sketchbook://banner/account";
        });
        
        //left_area_3 margin-top
        var height1=$('#section0 .left_area_1').height();
        var height2=$('#section0 .left_area_2').height();
        var margin2= (418-height1-height2)*0.21;
        var height3=$('#section0 .left_area_3').height();
        var margin3= (418-height1-height2-margin2-height3)/2;
        $('#section0 .left_area_2').css("margin-top", margin2);
        $('#section0 .left_area_3').css("margin-top", margin3);

        $("#free_txt_s0_2").html(TRIAL_DAYS);
    };

    function prepareUIForLocalization(){
        var locale = LOCALE;
        locale = sb_util.getLocaleFolder(locale);
        $("html").addClass(locale);

        var ismas = (ISMAS == "true") ? true : false;
        if (ismas) {
            $("body").addClass("mas");
        }else{
            $("body").addClass("notmas");
        }
    }

    function hideBody(hide){
        if(hide){
            $("body").addClass("mhidden");
        }else if($("body").hasClass("mhidden")){
            $("body").removeClass("mhidden");
        }
    }

    function localizePage(){
        $("#index_1").html(lan_index["index_1"]);
        $("#index_2").html(lan_index["index_2"]);
        $("#index_3").html(lan_index["index_3"]);

        $("#free_head_s0").html(lan_index["free_head_s0"]);
        // $("#free_txt_s0").html(lan_index["free_txt_s0"]);
        $("#free_txt_s0_1").html(lan_index["free_txt_s0_1"]);
        $("#free_txt_s0_3").html(lan_index["free_txt_s0_3"]);
        $("#trail_activated_head_s0").html(lan_index["trail_activated_head_s0"]);
        $("#trail_activated_txt_s0").html(lan_index["trail_activated_txt_s0"]);
        $("#trial_expired_head_s0").html(lan_index["trial_expired_head_s0"]);
        $("#trial_expired_txt_s0").html(lan_index["trial_expired_txt_s0"]);
        $("#campaign_activated_head_s0").html(lan_index["campaign_activated_head_s0"]);
        $("#campaign_activated_head_txt_s0").html(lan_index["campaign_activated_head_txt_s0"]);
        $("#pro_head_s0").html(lan_index["pro_head_s0"]);
        $("#buy_btn").html(lan_index["buy_btn"]);
        $("#try_btn_txt").html(lan_index["try_btn_txt"]);
        $("#left_area_3_login_txt").html(lan_index["left_area_3_login_txt"]);

        $("#login-btn").html(lan_index["login-btn"]);
        $("#left_area_3_buy_btn").html(lan_index["left_area_3_buy_btn"]);
        // $("#pro_txt").html(lan_index["pro_txt"]);
        $("#pro_txt_link").html(lan_index['pro_txt_link']);
        $("#pro_txt_1").html(lan_index['pro_txt_1']);
        $("#pro_txt_2").html(lan_index['pro_txt_2']);

        $("#countdown_txt_part1_1").html(lan_index["countdown_txt_part1_1"]);
        $("#countdown_txt_part1_2").html(lan_index["countdown_txt_part1_2"]);
        $("#countdown_fortrial").html(lan_index["countdown_fortrial"]);
        $("#author_tag_part1").html(lan_index["author_tag_part1"]);
        $("#author_tag_part2").html(lan_index["author_tag_part2"]);
        $("#free_head_s1").html(lan_index["free_head_s1"]);
        $("#free_txt_s1").html(lan_index["free_txt_s1"]);
        $("#activate_btn_s1").html(lan_index["activate_btn_s1"]);
        
        $("#gopro_btn_s1").html(lan_index["gopro_btn_s1"]);
        $("#tutorials_link_id_1").html(lan_index["tutorials_link_id_1"]);
        $("#tutorials_link_id_2").html(lan_index["tutorials_link_id_2"]);
        $("#tutorials_link_id_3").html(lan_index["tutorials_link_id_3"]);
        $("#tutorials_link_id_4").html(lan_index["tutorials_link_id_4"]);
        $("#tutorials_link_id_5").html(lan_index["tutorials_link_id_5"]);
        $("#tutorials_link_id_6").html(lan_index["tutorials_link_id_6"]);
        $("#tutorials_link_id_7").html(lan_index["tutorials_link_id_7"]);
        
        $("#free_head_s2").html(lan_index["free_head_s2"]);
        $("#free_txt_s2").html(lan_index["free_txt_s2"]);
        $("#activate_btn_s2").html(lan_index["activate_btn_s2"]);
        $("#gopro_btn_s2").html(lan_index["gopro_btn_s2"]);
        $("#free_head_s3").html(lan_index["free_head_s3"]);
        $("#free_txt_s3").html(lan_index["free_txt_s3"]);
        $("#activate_btn_s3").html(lan_index["activate_btn_s3"]);
        $("#gopro_btn_s3").html(lan_index["gopro_btn_s3"]);
        $("#free_head_s4").html(lan_index["free_head_s4"]);

        $("#free_txt_s4").html(lan_index["free_txt_s4"]);
        $("#activate_btn_s4").html(lan_index["activate_btn_s4"]);
        $("#gopro_btn_s4").html(lan_index["gopro_btn_s4"]);
        $("#free_head_s5").html(lan_index["free_head_s5"]);
        $("#free_txt_s5").html(lan_index["free_txt_s5"]);
        $("#activate_btn_s5").html(lan_index["activate_btn_s5"]);
        $("#gopro_btn_s5").html(lan_index["gopro_btn_s5"]);
        $("#free_head_s6").html(lan_index["free_head_s6"]);
        $("#free_txt_s6").html(lan_index["free_txt_s6"]);
        $("#activate_btn_s6").html(lan_index["activate_btn_s6"]);
        $("#gopro_btn_s6").html(lan_index["gopro_btn_s6"]);

        $("#free_head_s7").html(lan_index["free_head_s7"]);
        $("#free_txt_s7").html(lan_index["free_txt_s7"]);
        $("#activate_btn_s7").html(lan_index["activate_btn_s7"]);
        $("#gopro_btn_s7").html(lan_index["gopro_btn_s7"]);
        $("#trial_activated_header").html(lan_index["trial_activated_header"]);
        $("#trial_activated_failed_header").html(lan_index["trial_activated_failed_header"]);
        // $("#trial_activated_txt").html(lan_index["trial_activated_txt"]);
        $("#trial_validated_success_txt_1").html(lan_index["trial_validated_success_txt_1"]);
        $("#trial_validated_success_txt_2").html(lan_index["trial_validated_success_txt_2"]);
        $("#trial_not_activated_same_machine_txt").html(lan_index["trial_not_activated_same_machine_txt"]);
        $("#trial_not_activated_expired_txt").html(lan_index["trial_not_activated_expired_txt"]);

        $("#trial_not_activated_try_again_txt").html(lan_index["trial_not_activated_try_again_txt"]);
        $("#ok_btn").html(lan_index["ok_btn"]);

        $("#index_12").html(lan_index["index_12"]);
        $("#index_13").html(lan_index["index_13"]);
        $("#index_14").html(lan_index["index_14"]);

        $("#index_15").html(lan_index["index_15"]);
        $("#index_16").html(lan_index["index_16"]);
        $("#index_17").html(lan_index["index_17"]);
        $("#index_18").html(lan_index["index_18"]);
        $("#index_19").html(lan_index["index_19"]);
        $("#index_20").html(lan_index["index_20"]);

        $("#index_21").html(lan_index["index_21"]);
        $("#index_22").html(lan_index["index_22"]);
        $("#index_23").html(lan_index["index_23"]);
        $("#index_24").html(lan_index["index_24"]);
        $("#index_25").html(lan_index["index_25"]);
        $("#index_26").html(lan_index["index_26"]);

        $("#index_27").html(lan_index["index_27"]);
        $("#index_28").html(lan_index["index_28"]);
        $("#index_29").html(lan_index["index_29"]);
        $("#index_30").html(lan_index["index_30"]);
        $("#index_31").html(lan_index["index_31"]);
        $("#index_32").html(lan_index["index_32"]);

        $("#index_33").html(lan_index["index_33"]);
        $("#index_34").html(lan_index["index_34"]);

        $("#index_35").html(lan_index["index_35"]);
        $("#index_36").html(lan_index["index_36"]);

        $("#forjs_mo").html(lan_index["forjs_mo"]);
        $("#forjs_yr").html(lan_index["forjs_yr"]);

        $("#account_intro_free_id").html(lan_index["account_intro_free_id"]);
        $("#free_feature_list_1").html(lan_index["free_feature_list_1"]);

        $("#free_feature_list_2").html(lan_index["free_feature_list_2"]);
        $("#free_feature_list_3").html(lan_index["free_feature_list_3"]);
        $("#free_feature_list_4").html(lan_index["free_feature_list_4"]);
        $("#free_feature_list_5").html(lan_index["free_feature_list_5"]);
        $("#left_current_plan").html(lan_index["left_current_plan"]);
        $("#account_intro_pro_id").html(lan_index["account_intro_pro_id"]);
        
        $("#pro_feature_list_1").html(lan_index["pro_feature_list_1"]);
        $("#pro_feature_list_2").html(lan_index["pro_feature_list_2"]);
        $("#pro_feature_list_3").html(lan_index["pro_feature_list_3"]);
        $("#pro_feature_list_4").html(lan_index["pro_feature_list_4"]);
        $("#pro_feature_list_5").html(lan_index["pro_feature_list_5"]);
        $("#pro_feature_list_6").html(lan_index["pro_feature_list_6"]);
        $("#pro_feature_list_7").html(lan_index["pro_feature_list_7"]);
        $("#pro_feature_list_8").html(lan_index["pro_feature_list_8"]);
        $("#pro_feature_list_9").html(lan_index["pro_feature_list_9"]);
        $("#pro_feature_list_10").html(lan_index["pro_feature_list_10"]);

        $("#login").html(lan_index["login"]);

        $("#signup_btn").html(lan_index["signup_btn"]);
        $("#free_head_for_mas_s0").html(lan_index["free_head_for_mas_s0"]);
        $("#free_txt_for_mas_s0").html(lan_index["free_txt_for_mas_s0"]);
        $("#signup_btn_s1").html(lan_index["signup_btn_s1"]);
        $("#signup_btn_s2").html(lan_index["signup_btn_s2"]);
        $("#signup_btn_s3").html(lan_index["signup_btn_s3"]);
        $("#signup_btn_s4").html(lan_index["signup_btn_s4"]);
        $("#signup_btn_s5").html(lan_index["signup_btn_s5"]);
        $("#signup_btn_s6").html(lan_index["signup_btn_s6"]);
        $("#signup_btn_s7").html(lan_index["signup_btn_s7"]);

    };

    //change the position of the blue line under the tag
    function changeLinePos(){
        var father_pos = $("#tag").offset().left;
        var tag_1_pos = ($("#tag_1 h2").offset().left);
        var tag_2_pos = ($("#tag_2 h2").offset().left);
        var tag_3_pos = ($("#tag_3 h2").offset().left);
        var tag_1_width = $("#tag_1 h2").width();
        var tag_2_width = $("#tag_2 h2").width();
        var tag_3_width = $("#tag_3 h2").width();
        var line_mem_pos = tag_1_pos - father_pos + (tag_1_width-30)/2;
        var line_tut_pos = tag_2_pos - father_pos + (tag_2_width-30)/2;
        var line_news_pos = tag_3_pos - father_pos  + (tag_3_width-30)/2;
        line_mem_pos_px = line_mem_pos + "px";
        line_tut_pos_px = line_tut_pos + "px";
        line_news_pos_px = line_news_pos + "px";
    };

    //change the layout of the page depends on the parameters sent by the apps
    function selectParameters(){
        var isMembership = MEMBERSHIP;

        if(isMembership == "false"){
            selectParametersForNonMembership();
        }else{
            selectParametersForMembership();
        }
        
    };

    function selectParametersForNonMembership(){
        hideMembershipTab();
        customTutorialTab();
        if(isIE8){
            $("#t_videocontent").css("display","none");
            $("#v_image").css("display","block");
        }

        var page = (PAGE == "") ? HOME_TUTORIAL_TAB:PAGE;
        changeByPage(page);
    };

    function selectParametersForMembership(){
        if(isIE8){
            $("#t_videocontent").css("display","none");
            $("#v_image").css("display","block");
        }

        var trialActivated = (TRIAL_ACTIVATED == "true") ? true : false;
        var page = (PAGE == "") ? HOME_MEMBERSHIP_TAB : PAGE;
        var issignedin = ISSIGNEDIN;
        var trialStatus = TRIAL;
        var giftCodeStatus = CAMPAIGN;
        var subscription = SUBSCRIPTION;
        subscription = parseInt(subscription);
        var isActivatingTrial = IS_ACTIVATING_TRIAL == "true"? true : false;

        showTrialActivated(trialActivated);
        changeByPage(page);
        updateAccountButton(issignedin);

        if(subscription != SKETCHBOOK_NOT_SUBSCRIBED){ // pro user
            $(".pro_head").removeClass("mhide");
            $("#pro_txt").removeClass("mhide");
            updateTutorialTab(SKETCHBOOK_PRO_MEMBERSHIP);
        }else if(issignedin=="false"){ // user is not signed in
            var ismas = (ISMAS == "true") ? true : false;
            if (ismas ) {
                $(".free_head_for_mas").removeClass("mhide");
                $(".free_txt_for_mas").removeClass("mhide");
                $("#signup_btn").removeClass("mhide");
                $("#left-area-3-login").removeClass("mhide");

                // section 1 - 6
                $(".signup_btn").removeClass("mhide");

                updateTutorialTab(SKETCHBOOK_FREE_MEMBERSHIP);
            }else{
                $(".free_head").removeClass("mhide");
                $(".free_txt").removeClass("mhide");        
                showActivateTryButton(true);
                changeActivateTryButtonState(isActivatingTrial);
                
                $("#left-area-3-login").removeClass("mhide");

                // section 1 - 6
                $(".activate_btn").removeClass("mhide");

                updateTutorialTab(SKETCHBOOK_FREE_MEMBERSHIP);
            }
            
        }else if(giftCodeStatus == SKETCHBOOK_CAMPAIGN_STATUS_NOT_USING){
            updateUIAccordingToTrialStatus(trialStatus, isActivatingTrial);
            updateTutorialTab(SKETCHBOOK_FREE_MEMBERSHIP);
        }else{ // If the user is in campaign and in trial at the same time, show the longer one.
            var trialTimeLeft = TRIAL_TIME_LEFT;
            trialTimeLeft = parseInt(trialTimeLeft);

            var giftCodeTimeLeft = CAMPAIGN_TIME_LEFT;
            giftCodeTimeLeft = parseInt(giftCodeTimeLeft);

            if (trialTimeLeft <= giftCodeTimeLeft) {
                updateUIAccordingToCampaignStatus(giftCodeStatus);
            }else{
                updateUIAccordingToTrialStatus(trialStatus, isActivatingTrial);
            }
            updateTutorialTab(SKETCHBOOK_FREE_MEMBERSHIP);
            
        }
    };

    function updateAccountButton(issignedin){
        if (issignedin == "false") {
            $("#tag_login").removeClass("mhide");
        }else{
            $("#tag_account").removeClass("mhide");
        }
    }

    function updateTutorialTab(membership){
        switch(membership){
            case SKETCHBOOK_FREE_MEMBERSHIP:
                $(".t_lock_essentials").css("visibility","hidden");
                $(".t_content_starter").addClass("t_content_active");
                $(".t_content_essentials").addClass("t_content_active");
                $(".t_content_pro").addClass("t_content_inactive");
                break;
            case SKETCHBOOK_PRO_MEMBERSHIP:
                $(".t_lock_essentials").css("visibility","hidden");
                $(".t_lock_pro").css("visibility","hidden");
                $(".t_content_starter").addClass("t_content_active");
                $(".t_content_essentials").addClass("t_content_active");
                $(".t_content_pro").addClass("t_content_active");
                break;
            default:
                $(".t_lock_essentials").css("visibility","hidden");
                $(".t_content_starter").addClass("t_content_active");
                $(".t_content_essentials").addClass("t_content_active");
                $(".t_content_pro").addClass("t_content_inactive");
        }
    }

    function updateUIAccordingToCampaignStatus(giftCodeStatus){
        var giftCodeTimeLeft = CAMPAIGN_TIME_LEFT;
        giftCodeTimeLeft = parseInt(giftCodeTimeLeft);

        if (giftCodeStatus != SKETCHBOOK_CAMPAIGN_STATUS_NOT_USING) {
            $(".pro_head").removeClass("mhide");
            $("#pro_txt").removeClass("mhide");
            // $(".campaign_activated_head").removeClass("mhide");
            // $(".campaign_activated_txt").removeClass("mhide");
            $("#buy_btn").removeClass("mhide");
            showCampaignDaysCountDown(giftCodeTimeLeft);

            // section 1-6
            $(".gopro_btn").removeClass("mhide");

        }
    }

    function updateUIAccordingToTrialStatus(trialStatus, isActivatingTrial){
        var trialTimeLeft; // return in seconds
        if(trialStatus){
            trialTimeLeft = TRIAL_TIME_LEFT;
            trialTimeLeft = parseInt(trialTimeLeft);
        }

        if(trialStatus == SKETCHBOOK_TRIAL_STATUS_CAN_TRY){ // signed in but not in trial
            var ismas = (ISMAS == "true") ? true : false;
            if (ismas) {
                // section 0
                $(".free_head_for_mas").removeClass("mhide");
                $(".free_txt_for_mas").removeClass("mhide");
                $("#buy_btn").removeClass("mhide");

                // section 1-7
                $(".gopro_btn").removeClass("mhide");
            }else{
                $(".free_head").removeClass("mhide");
                $(".free_txt").removeClass("mhide");
                
                showActivateTryButton(true);
                changeActivateTryButtonState(isActivatingTrial);
                
                $("#left_area_3_buy").removeClass("mhide");

                // section 1-6
                $(".activate_btn").removeClass("mhide");
            }
        }else if(trialStatus == SKETCHBOOK_TRIAL_STATUS_IN_TRIAL){ // signed in and in trial
            $(".trial_activated_head").removeClass("mhide");
            $(".trial_activated_txt").removeClass("mhide");
            $("#buy_btn").removeClass("mhide");
            showTrialDaysCountDown(trialTimeLeft);

            // section 1
            $(".gopro_btn").removeClass("mhide");

            
        }else if(trialStatus == SKETCHBOOK_TRIAL_STATUS_EXPIRED){ // signed in but trial expired
            $(".trial_expired_head").removeClass("mhide");
            $(".trial_expired_txt").removeClass("mhide");
            $("#buy_btn").removeClass("mhide");
            showTrialDaysCountDown(trialTimeLeft);
            // $("#trial_days_expired_txt").removeClass("mhide");

            // section 1
            $(".gopro_btn").removeClass("mhide");


        }else if(trialStatus == SKETCHBOOK_TRIAL_STATUS_TRIED_ON_THIS_MACHINE){ // signed in but can not try because the current machine has already been tried
            // TODO:  change the UI
            $(".trial_expired_head").removeClass("mhide");
            $(".trial_expired_txt").removeClass("mhide");
            $("#buy_btn").removeClass("mhide");
            // $("#trial_days_expired_txt").removeClass("mhide");
            showTrialDaysCountDown(trialTimeLeft);

            // section 1
            $(".gopro_btn").removeClass("mhide");


        }else{
            // should not happend, but since issignedin is true, we change to signed in and tial expired mode.
            $(".free_head").removeClass("mhide");
            $(".free_txt").removeClass("mhide");
            $("#buy_btn").removeClass("mhide");
            showTrialDaysCountDown(trialTimeLeft);

            // section 1
            $(".gopro_btn").removeClass("mhide");

        }
    }

    function showActivateTryButton(show){
        if(show){
            $("#try_btn").removeClass("mhide");
        }else{
            $("#try_btn").addClass("mhide");
        }
    }

    function changeActivateTryButtonState(isActivatingTrial){
        if(isActivatingTrial){
            $("#activating_gif_s1").removeClass("mhide");
        }else{
            $("#try_btn_txt").removeClass("mhide");
        }
    }

    function showTrialActivated(show){
        var trialStatus = TRIAL;
        if (trialStatus) {
            trialStatus = parseInt(trialStatus);
            if(show){
                switch(trialStatus){
                    case SKETCHBOOK_TRIAL_STATUS_EXPIRED:
                    $("#trial_activated_failed_header").removeClass("mhide");
                    $("#trial_not_activated_expired_txt").removeClass("mhide");
                    break;
                    case SKETCHBOOK_TRIAL_STATUS_IN_TRIAL: // success
                    var timeleft = parseInt(TRIAL_TIME_LEFT);
                    var trialDaysLeft = Math.ceil(timeleft / 86400.0);
                    if (trialDaysLeft > 1) {
                        $("#trial_days").html(trialDaysLeft.toString());
                        $("#trial_validated_success_txt_2").removeClass("mhide");
                    }else{
                        // $("#trial_day").html(trialDaysLeft.toString());
                        // $("#campaign_validated_success_singular_txt").removeClass("mhide");
                    }
                    $("#trial_activated").addClass("trial_activate_success");
                    $("#trial_activated_header").removeClass("mhide");
                    $("#trial_activated_txt").removeClass("mhide");
                    break;
                    case SKETCHBOOK_TRIAL_STATUS_CAN_TRY:  // fail, try again
                    $("#trial_activated_failed_header").removeClass("mhide");
                    $("#trial_not_activated_try_again_txt").removeClass("mhide");
                    break;
                    case SKETCHBOOK_TRIAL_STATUS_TRIED_ON_THIS_MACHINE: // fail, no need to try again
                    $("#trial_activated_failed_header").removeClass("mhide");
                    $("#trial_not_activated_same_machine_txt").removeClass("mhide");
                    break;
                    default:
                    $("#trial_activated_failed_header").removeClass("mhide");
                    $("#trial_not_activated_try_again_txt").removeClass("mhide");
                    break;
                }
                if($("#trial_activated").hasClass("mhide")){
                    $("#trial_activated").removeClass("mhide");
                }
            }else{
                if(!$("#trial_activated").hasClass("mhide")){
                    $("#trial_activated").addClass("mhide");
                }
            }
        }
    }

    function showCampaignDaysCountDown(giftCodeTimeLeft){
        var giftCodeDaysLeft = Math.ceil(giftCodeTimeLeft / 86400.0);

        if (giftCodeDaysLeft == 0) {
            // won't show countdown when left day is 0.
            return;
            // $("#countdown_days").addClass("zero");
        };

        $("#countdown_days").text(giftCodeDaysLeft.toString());
        $("#trial_days_countdown").removeClass("mhide");
        
        if (giftCodeDaysLeft <= 1) {
            $("#countdown_txt_part1_2").removeClass("mhide");
        }else{
            $("#countdown_txt_part1_1").removeClass("mhide");
        }
    }

    function showTrialDaysCountDown(trialTimeLeft){
        var trialDaysLeft = Math.ceil(trialTimeLeft / 86400.0);

        if (trialDaysLeft == 0) {
            // won't show countdown when left day is 0
            return;
            // $("#countdown_days").addClass("zero");
        };
        $("#countdown_days").text(trialDaysLeft.toString());
        $("#trial_days_countdown").removeClass("mhide");
        $("#countdown_fortrial").removeClass("mhide");
        
        if (trialDaysLeft <= 1) {
            $("#countdown_txt_part1_2").removeClass("mhide");
        }else{
            $("#countdown_txt_part1_1").removeClass("mhide");
        }
    }

    function customTutorialTab(){
        $(".t_lock").addClass("mhide");
        $(".membership_type").addClass("mhide");
        $(".video_name").css("padding-left","10px");
        $(".t_content_starter").addClass("t_content_active");
        $(".t_content_essentials").addClass("t_content_active");
        $(".t_content_pro").addClass("t_content_active");
    }

    function hideMembershipTab(){
        if(!$("#tag_1").hasClass("mhide")){
            $("#tag_1").addClass("mhide");
        }
        if(!$("#content_1").hasClass("mhide")){
            $("#content_1").addClass("mhide");
        }
        changeLinePos();
    }


    //if is signed in, hide the bottom bar of the page
    function changeSignIn(issignedin){
        var i = issignedin;
        if(i=="true"){
            // $("#tag_account").css("display","none");
            $("#account").text(lan_index["signout"]);
            $("#account").attr("href", "sketchbook://banner/signout?source=signout-button");
        }
        else{
            // $("#tag_account").css("display","inline");
            $("#account").text(lan_index["login"]);
            $("#account").attr("href", "sketchbook://banner/signin?source=signin-button");
        }
        if($("#account").hasClass("mhide"))
            $("#account").removeClass("mhide");

    };

    //determine the page displayed first
    function changeByPage(page){
        var l_page = page;
        if(l_page == "membership"){
            $("#tag_1").addClass("tag_active");
            $("#tag_2").removeClass("tag_active");
            $(".tag_line").css("left",line_mem_pos_px);
            $("#content_2").css("left","640px");
            $("#content_1").css("left","0px");
            $("#content_3").css("left","640px");
        }
        else if(l_page == "tutorials"){
            checkVideo();
            $("#tag_1").removeClass("tag_active");
            $("#tag_2").addClass("tag_active");
            $(".tag_line").css("left",line_tut_pos_px);
            $("#content_2").css("left","0px");
            $("#content_1").css("left","-640px");
            $("#content_3").css("left","640px");
        }
        else if(l_page == "news"){   
            if(NEWS == ""){
                // changeByPage("membership");
                goToHomePage();
                return;
            }
            $("#tag_1").removeClass("tag_active");
            $("#tag_3").addClass("tag_active");
            $(".tag_line").css("left",line_news_pos_px);
            $("#content_2").css("left","-640px");
            $("#content_1").css("left","-640px");
            $("#content_3").css("left","0px");
        }
        else{
            $("#tag_1").addClass("tag_active");
            $(".tag_line").css("left",line_mem_pos_px);
            $("#content_2").css("left","640px");
            $("#content_1").css("left","0px");
            $("#content_3").css("left","640px");
        }
    };

    function goToHomePage(){
        var isMembership = MEMBERSHIP;
        if(isMembership == "false"){
            changeByPage("tutorials");
        }else{
            changeByPage("membership");
        }
        
    }

    function checkVideo(){
        var video_tag = VIDEO;
        if(video_tag != ""){
            video_want_send_data = false;
            $("#t_content_"+video_tag).click();
            if(video_tag=="gradient_fill" ||video_tag=="distort" ||video_tag=="flipbooks" ||video_tag=="perspective"){
                document.getElementById("t_list").scrollTop=1000;
            }
            else if(video_tag=="copic_color" ||video_tag=="ruler" || video_tag=="symmetry" || video_tag=="brush_property"){
                document.getElementById("t_list").scrollTop=100;
            }
        }
    };

    $(".tag").click(function(){
        var myVideo=document.getElementById("t_videocontent"); 
        //myVideo.pause();
        //first, get id
        var this_id=parseInt($(".tag_active").attr("id").split("_")[1]);
        var next_id=parseInt($(this).attr("id").split("_")[1]);
        //set content position
        var content_list=$("#content_wrap").find(".content");
        for(var i=0;i<content_list.length;i++){
            //set z-index to zero;
            $(content_list).eq(i).css("z-index","0");
            //position
            var this_content_id=parseInt(content_list.eq(i).attr("id").split("_")[1]);
            if(this_content_id<this_id){
                $(content_list.eq(i)).css("left","-640px");
            }else if(this_content_id==this_id){
                $(content_list.eq(i)).css("left","0px");
            }else{
                $(content_list.eq(i)).css("left","640px");
            }
        }
        //set content z-index
        $(content_list.eq(this_id-1)).css("z-index","20");
        $(content_list.eq(next_id-1)).css("z-index","40");
        //start to trans
        //alert("start");
        if(this_id<next_id){
            $(content_list.eq(this_id-1)).animate({left:'-640px'},400);
            $(content_list.eq(next_id-1)).animate({left:'0px'},400);
        }else if(this_id>next_id){
            $(content_list.eq(this_id-1)).animate({left:'640px'},400);
            $(content_list.eq(next_id-1)).animate({left:'0px'},400);
        }
        //change position of tag_line
        if(next_id==1){
            $(".tag_line").animate({left:line_mem_pos_px},400);
        }else if(next_id==2){
            $(".tag_line").animate({left:line_tut_pos_px},400);
        }else if(next_id==3){
            $(".tag_line").animate({left:line_news_pos_px},400);
        }
        //remove tag_active
        $("#tag_"+this_id).removeClass("tag_active");
        $("#tag_"+next_id).addClass("tag_active");
    });


    function checkVersion(){
        var ua = navigator.userAgent; 
        var b = ua.indexOf("MSIE ");
        if(b >= 0){   
            var version = parseFloat(ua.substring(b + 5, ua.indexOf(";", b)));
            if(version >= 9.0){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return true;
        }

    };

    $(".t_content_wrap").live("click",function(){
        if(!$(this).hasClass('t_content_inactive')){
            $("#unlockbar_content_pro").fadeOut();
            $("#unlockbar_content_essentials").fadeOut();
        }
        var id = $(".changegray").attr("id");
        if(video_want_send_data){
            sendMixPanelEvent($(this).attr("id"));
        }else{
            video_want_send_data = true;
        }
        
        $("#"+id).removeClass("changegray");
        $(this).addClass("changegray");
        var n_video_name = $(this).attr("id").substring(10);
        var myVideo=document.getElementById("t_videocontent"); 
        if(!isIE8){// check if can play the video
            myVideo.pause();
            myVideo.setAttribute("src", "../video/"+n_video_name+".mp4");
            $("#forchange").attr("src","../video/"+n_video_name+".mp4");
            $("#forchange_2").attr("src","../video/"+n_video_name+".mp4");
            myVideo.load();
            myVideo.play();
        }
        else{
            $("#v_image_pic").attr("src","../image_ie8/"+n_video_name+".jpg");
        }
    });

    function sendMixPanelEvent(id){
        switch(id){
            case "t_content_brush_puck":
                window.location.href = "sketchbook://banner/event?type=clicked&id=tutorials-video-brush-puck";
                break;
            case "t_content_color_wheel":
                window.location.href = "sketchbook://banner/event?type=clicked&id=tutorials-video-color-wheel";
                break;
            case "t_content_lagoon":
                window.location.href = "sketchbook://banner/event?type=clicked&id=tutorials-video-lagoon";
                break;
            case "t_content_brush_property":
                window.location.href = "sketchbook://banner/event?type=clicked&id=tutorials-video-brush-property";
                break;
            case "t_content_brush_management":
                window.location.href = "sketchbook://banner/event?type=clicked&id=tutorials-video-brush-management";
                break;                
            case "t_content_symmetry":
                window.location.href = "sketchbook://banner/event?type=clicked&id=tutorials-video-symmetry";
                break;
            case "t_content_copic_color":
                window.location.href = "sketchbook://banner/event?type=clicked&id=tutorials-video-copic-color-library";
                break;
            case "t_content_ruler":
                window.location.href = "sketchbook://banner/event?type=clicked&id=tutorials-video-ruler-french";
                break;
            case "t_content_gradient_fill":
                window.location.href = "sketchbook://banner/event?type=clicked&id=tutorials-video-gradient-fill";
                break;
            case "t_content_distort":
                window.location.href = "sketchbook://banner/event?type=clicked&id=tutorials-video-distort";
                break;
            case "t_content_flipbooks":
                window.location.href = "sketchbook://banner/event?type=clicked&id=tutorials-video-flipbooks";
                break;
            case "t_content_perspective":
                window.location.href = "sketchbook://banner/event?type=clicked&id=tutorials-video-perspective-tools";
                break;
            default:
                break;
        }
    };

    $(".t_content_inactive").live("click",function(){
        if($(this).hasClass('t_content_essentials')){
            $("#unlockbar_content_pro").fadeOut();
            $("#unlockbar_content_essentials").fadeTo(400,0.9);
        }
        else if($(this).hasClass('t_content_pro')){
            $("#unlockbar_content_essentials").fadeOut();
            $("#unlockbar_content_pro").fadeTo(400,0.9);
        }
    });

    function quick_tour_essentials_change(){
        video_want_send_data = false;
        $("#t_content_brush_property").click();
        setTimeout("$('#tag_2').click()",200);
        ess_learn_page_change.click();
        document.getElementById("t_list").scrollTop=100;
    };

    function quick_tour_pro_change(){
        video_want_send_data = false;
        $("#t_content_brush_management").click();
        setTimeout("$('#tag_2').click()",200);
        pro_learn_page_change.click();
        document.getElementById("t_list").scrollTop=1000;
    };

    function load_loop_image(){
        var num_of_list=5;
        var loop_image_name_list=["hero1","hero2","hero3","hero4","hero5"];
        var loop_image_length=[5,5,6,5,3];
        var loop_image_author_list=["Na Young Irene Lee","Kyle Runciman","Siyan Ren","Paul Vera Broadbent","Trent Kanigua"];
        
        var random_list=getRandomInt(0, num_of_list-1);
        
        var loop_image_div=$("#loop_images_section0 video");
        
        var myVideo=document.getElementById("myVideo"); 
        if (!isIE8) {
            myVideo.pause();
            myVideo.setAttribute("src", "../image/loop_image/" + loop_image_name_list[random_list] +".mp4");
            myVideo.load();
            myVideo.play();
        }else{
            $("#myVideo_img").attr("src", "../image/loop_image/" + loop_image_name_list[random_list] +"@2x.png");
        }

        var loop_image_author=$(".author");
        $("#author_name").text(loop_image_author_list[random_list]);

    }

    function loop_next_image(){
        var loop_image_list=$("#loop_images_section0").children();
        
        var last_active=loop_image_list.index($("#loop_images_section0").children(".active"));
        var next_active=last_active-1;
        if(last_active==0){
            next_active=loop_image_list.length;
        }
        for(var j=loop_image_list.length-1;j>=0;j--){
            if(j==next_active){
                loop_image_list.eq(j).fadeIn(2000);
                loop_image_list.eq(j).addClass("active");
            }
            else{
                setTimeout(function (){loop_image_list.eq(j).fadeOut(0);}, 2000);
                loop_image_list.eq(j).removeClass("active");
            }
        }
        setTimeout(loop_next_image, 2000);
    }

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    //slides arrow
    $(".arrowUp").click(function(){
        $.fn.fullpage.moveSectionUp();
    });

    $(".arrowDown").click(function(){
        $.fn.fullpage.moveSectionDown();
    });

    $(".explore_arrow").click(function(){
        $.fn.fullpage.moveSectionDown();
    });

    function loadJS(){
        var locale = LOCALE;
        locale = sb_util.getLocaleFolder(locale);
        sb_util.loadjscssfile("../lang/" + locale + "/lan_index.js", "js", localizePage);
    };

    // function getParameterValue(paramName, defaultValue){
    //     if (typeof(defaultValue)==='undefined') defaultValue = "";
    //     var value = urlParseModule.getURLParameter(paramName)?urlParseModule.getURLParameter(paramName):defaultValue;
    //     return value;
    // }

})();

