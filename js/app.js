$(document).ready(function () {
    // let i = 1;
    // setInterval(function() {
    // 	console.log($("#hourHand").css("transform", "rotate(" + i + "deg)"));
    // 	i++;
    // }, 1000);
    // $(".sidenav-19").click(function () {
    //     console.log($(this));
    // })
    // // toggling option div on mobile
    // $(document).on("click", "#show-opt-btn", function () {
    //     $("#desk-dx").toggle();
    //     $("#desk-sx").css("align-items", "flex-start");
    //     // $("#desk-sx img").addClass("mobile-img");
    //     // let className = $("#desk-sx svg").attr("id");
    //     // $("#desk-sx svg").addClass(`mobile-img ${className}`);
    // })
    // $(document).on("click", ".times", function () {
    //     $("#desk-dx").hide();
    //     $("#desk-sx").css("align-items", "center");
    //     // $("#desk-sx img,#desk-sx svg").removeClass("mobile-img")
    //     // $("#desk-sx svg").removeClass(function (index, css) {
    //     //     return (css.match(/(^|\s)watch-svg\S+/g) || []).join(' ');
    //     // });
    // })

    $(document).on("click", "#show-opt-btn", function () {
        $(this).hide();
        $("#desk-dx").show();
        // $("#desk-sx").css("align-items", "flex-start");
        // $("#desk-sx img").addClass("mobile-img");
        var div = $(".tail");
        // var svg = $(".tail svg");
        // var img = $(".tail");
        // $("#watch-svg2").css({ "width": "81%", "height": "87%" })
        // $("#watch-svg2").css("width": "81%", "height": "87%")
        startAnimation();
        function startAnimation() {
            div.css({
                "transform": "translate(0%,-11%)",
                "-webkit-transform": "translate(0%,-11%)",
                "-moz-transform": "translate(0%,-11%)",
                "transition": "all 0.3s",
                "-webkit-transition": "all 0.3s",
                "-moz-transition": "all 0.3s"
            });
        }
    });

    $(document).on("click", ".times", function () {
        $("#show-opt-btn").show();
        $("#desk-dx").hide();
        $(".scale-skull").addClass("d-none");
        // $("#desk-sx").css("align-items", "center");
        // $("#desk-sx img").removeClass("mobile-img")
        $("#desk-sx svg").removeClass(function (index, css) {
            return (css.match(/(^|\s)watch-svg\S+/g) || []).join(' ');
        });
        var div = $(".tail");
        // var svg = $(".tail svg");
        // var div = $(".tail");
        startAnimation();
        function startAnimation() {
            div.css({
                "transform": "scale(1)",
                "-webkit-transform": "scale(1)",
                "-moz-transform": "scale(1)",
                "transition": "all 0.3s",
                "-webkit-transition": "all 0.3s",
                "-moz-transition": "all 0.3s"
            });
        }

        $("#desk-sx svg").removeClass(function (index, css) {
            return (css.match(/(^|\s)watch-svg\S+/g) || []).join(' ');
        });

    });


    $(".mySwitch1 input").click(function () {
        if ($(this).prop("checked") == true) {
            $("#MINT,#HOUR").show();
            $("#bothHands").hide();
        } else if ($(this).prop("checked") == false) {
            $("#MINT,#HOUR").hide();
            $("#bothHands").show();
        }
    });

    $(".mySwitch2 input").click(function () {
        if ($(this).prop("checked") == true) {
            $(".forMen").hide();
            $(".forWomen").show();
            $("#toggleCaseType").text("FOR MEN");
        } else if ($(this).prop("checked") == false) {
            $(".forWomen").hide();
            $(".forMen").show();
            $("#toggleCaseType").text("FOR WOMEN");
        }
    });


    // register function
    $(document).on("click", "#registerBtn", function () {
        let name = $("#fullName").val().trim();
        let email = $("#registerEmail").val().trim();
        let password = $("#registerPassword").val().trim();
        let phone = $("#phoneNumber").val().trim();
        let pattern = /[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,3}/;
        let act = "register";
        // console.log(name, email, password, phone);
        if (name == "" || email == "" || password == "" || phone == "") {
            $(".registerNotify").html(`<div class="alert alert-danger alert-dismissible  show" role="alert">
                    <strong>All fields are required!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`);
        }
        else if (!pattern.test(email)) {

            $(".registerNotify").html(`<div class="alert alert-danger alert-dismissible  show" role="alert">
                <strong>Invalid Email!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`);

        }
        else {
            let dataString = `act=${act}&name=${name}&email=${email}&password=${password}&phone=${phone}`;
            // console.log(datastring);
            $.ajax({
                url: "./func.php",
                method: "POST",
                data: dataString,
                caches: false,
                success: (res) => {
                    if (res == 'success') {
                        $(".registerNotify").html(`<div class="alert alert-success alert-dismissible  show" role="alert">
                            <strong>Registered successfully!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`);
                        $("#fullName").val('');
                        $("#registerEmail").val('');
                        $("#registerPassword").val('');
                        $("#phoneNumber").val('');
                    }
                    // console.log(res);
                },
                error: (err) => {
                    console.log(err);
                }
            })
        }
    })

    // login function
    $(document).on("click", "#loginBtn", function () {
        let email = $("#loginEmail").val().trim();
        let password = $("#loginPassword").val().trim();
        let act = "login";
        // console.log(name, email, password, phone);
        if (email == "" || password == "") {
            $(".loginNotify").html(`<div class="alert alert-danger alert-dismissible show" role="alert">
            <strong>All fields are required!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>`)
        }
        else {
            let dataString = `act=${act}&email=${email}&password=${password}`;
            // console.log(datastring);
            $.ajax({
                url: "./func.php",
                method: "POST",
                data: dataString,
                caches: false,
                success: (res) => {
                    if (res == "success") {
                        // console.log(res);
                        $(".loginNotify").html(`<div class="alert alert-success alert-dismissible  show" role="alert">
                        <strong>Login successfully!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`);
                        $("#loginEmail").val("");
                        $("#loginPassword").val("");
                        $(".loginBtn").addClass("d-none");
                        $(".register").addClass("d-none");
                        $(".profileLink").removeClass("d-none");
                        // $(".screenShotBtn").removeClass("d-none");
                        $(".logoutBtn").removeClass("d-none");
                        $(".createLink").removeClass("d-none");
                        $("#uploadModel").attr({ "data-target": "#upload-model-modal", "data-toggle": "modal" });
                        $(".buyNowBtn").removeClass("d-none");
                        // $(".buyNowBtn").attr("data-target", "#order-modal");
                        if ($("#currentEmail").val() == "") {

                        }
                        setTimeout(() => {
                            $("button.close").trigger("click");
                        }, 800);
                    }
                    else {
                        $(".loginNotify").html(`<div class="alert alert-danger alert-dismissible  show" role="alert">
                        <strong>Incorrect Email Or Password!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`);
                    }
                },
                error: (err) => {
                    console.log(err);
                }
            })
        }
    })

    // prevneting button logout and savechanges button not to hide on refresh
    if ($("#currentEmail").val() != "") {
        $("#uploadModel").attr({ "data-target": "#upload-model-modal", "data-toggle": "modal" });
        $(".loginBtn").addClass("d-none");
        $(".register").addClass("d-none");
        $(".logoutBtn").removeClass("d-none");
        $(".profileLink").removeClass("d-none");
        // $(".screenShotBtn").removeClass("d-none");
        $(".createLink").removeClass("d-none");
        $(".buyNowBtn").removeClass("d-none");
        // $(".buyNowBtn").text("Buy Now");
        // $(".buyNowBtn").attr("data-target", "#order-modal");
    }

    // order now function
    $("#enquiryForm").on('submit', (function (e) {
        e.preventDefault();
        let name = $("#full_name").val().trim();
        let email = $("#enquiryEmail").val().trim();
        let contact_num = $("#contactNumber").val().trim();
        // let uploadImage = $("#uploadImage").val().trim();
        let detail = $("#enquiryDetail").val().trim();


        // if (name == "" || email == "" || contact_num == "" || uploadImage == "" || detail == "") {
        if (name == "" || email == "" || contact_num == "" || detail == "") {
            $(".enquiryNotify").html(`<div class="alert alert-danger alert-dismissible  show" role="alert">
            <strong>All fields are required!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>`)
        } else {
            $.ajax({
                url: "func.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: (res) => {
                    if (res == "success") {
                        // console.log(res);
                        $(".enquiryNotify").html(`<div class="alert alert-success alert-dismissible  show" role="alert">
                        <strong>Order placed successfully!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`);
                        $("#full_name").val('');
                        $("#enquiryEmail").val('');
                        $("#contactNumber").val('');
                        $("#uploadImage").val('');
                        $("#enquiryDetail").val('');
                        setTimeout(() => {
                            $("button.close").trigger("click");
                        }, 1500);
                    }
                },
                error: (err) => {
                    console.log(err);
                }
            });
        }
    }));

    let lastId;
    // create link function
    $(document).on("click", ".createLink", function () {
        let watch_id = $("svg.watch-svg").data("watch");
        let bezel = $("#bezel").attr("src");
        let Case = $("#case").attr("src");
        // let daimond = $("#daimond").attr("src");
        let face = $("#face").attr("src");
        let lumi = $("#handLumi").attr("src");
        let tip = $("#handTip").attr("src");
        let hour = $("#hourHand").attr("src");
        let min = $("#minHand").attr("src");
        let secHand = $("#secHand").attr("src");
        let strap = $("#watchStrap").attr("src");
        let winder = $("#winder").attr("src");
        let url = window.location.origin + window.location.pathname;

        let skullDetails = $("#skullDetails").val();
        if (skullDetails == "") skullDetails = ' "skullDetails" : "" '; else skullDetails = skullDetails
        let pngStyle = $("#pngSkull").css("display");
        let pngSkullSrc = $("#pngSkull").attr("src");
        let pngSize = $("#pngSkull").css("transform");

        let handStyleId = $(".watch-svg g#svg-hour").attr("style-id");
        let sechandStyleId = $(".watch-svg g#svg-sechand").attr("style-id");
        let lumiStyleId = $(".watch-svg g#svg-lumi").attr("style-id");
        let tipStyle = $("#handTip").css("display");
        let lumiStyle = $("#handLumi").css("display");
        let sechandStyle = $(".watch-svg g#svg-sechand").css("display");

        let newSkullDetails = `{ "pngStyle" : "${pngStyle}" ,"pngSize" : "${pngSize}" , "pngSkullSrc" : "${pngSkullSrc}" ,
         "handStyleId" : "${handStyleId}" ,"sechandStyleId" : "${sechandStyleId}" , "lumiStyleId" : "${lumiStyleId}" ,
         "sechandStyle" : "${sechandStyle}" , "tipStyle" : "${tipStyle}" ,"lumiStyle" : "${lumiStyle}" , ${skullDetails} }`;

        // $("#skullDetails").val(newSkullDetails);

        let act = "createLink";

        // console.log(url, watch_id);

        // let dataString = `act=${act}&bezel=${bezel}&Case=${Case}&daimond=${daimond}&face=${face}&lumi=${lumi}&tip=${tip}&hour=${hour}&min=${min}&skull=${skull}&strap=${strap}&winder=${winder}&url=${url}`;
        let dataString = `act=${act}&watch_id=${watch_id}&bezel=${bezel}&case=${Case}&face=${face}&lumi=${lumi}&tip=${tip}&hour=${hour}&min=${min}&secHand=${secHand}&skull=${newSkullDetails}&strap=${strap}&winder=${winder}&url=${url}`;
        console.log(newSkullDetails);
        // console.log(newSkullDetails,dataString);
        // if (bezel == "" || Case == "" || daimond == "" || face == "" || lumi == "" || tip == "" || hour == "" || min == "" || skull == "" || strap == "" || winder == "") {

        if (watch_id == "" || bezel == "" || Case == "" || face == "" || lumi == "" || tip == "" || hour == "" || min == "" || secHand == "" || skull == "" || strap == "" || winder == "") {
            alert("Do Some Chages!!");
        } else {
            $.ajax({
                url: "func.php",
                type: "POST",
                data: dataString,
                cache: false,
                success: (res) => {
                    res = JSON.parse(res);
                    // console.log(res);
                    lastId = res['lastId'];
                    if (res['result'] == "success") {
                        $("#saveChanges").val(url + "?id=" + res['lastId']);
                        alert(url + "?id=" + res['lastId']);
                        $("#changes-modal").show();
                        console.log($("#changes-modal").css('opacity', "1"));
                    }
                },
                error: (err) => {
                    console.log(err);
                }
            })
        }
    })

    // opening new window for savechanges
    $(document).on("click", "#applyChangesBtn", function () {

        if (lastId !== "" || lastId !== undefined) {
            window.open($("#saveChanges").val(), '_blank').focus();
        } else {
            window.open(window.location.origin + window.location.pathname, '_blank').focus();
        }
    })

    // handling logout button
    $(document).on("click", ".logoutBtn", function () {
        let dataString = `act=logout`;
        $.ajax({
            url: "./func.php",
            method: "POST",
            data: dataString,
            caches: false,
            success: (res) => {
                // console.log(res);
                if (res == "success") {
                    $(".profileLink").addClass("d-none");
                    // $(".screenShotBtn").addClass("d-none");
                    $(".logoutBtn").addClass("d-none");
                    $(".createLink").addClass("d-none");
                    $(".buyNowBtn").addClass("d-none");
                    $("#uploadModel").removeAttr("data-target data-toggle");
                    // $(".buyNowBtn").text("Login");
                    // $(".buyNowBtn").attr("data-target", "#login-modal");
                    $(".loginBtn").removeClass("d-none");
                    $(".register").removeClass("d-none");
                }
            },
            error: (err) => {
                console.log(err);
            }
        })
    })

})
