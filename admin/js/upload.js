$(document).ready(function () {

    $(document).on("click", ".navigator", function (e) {
        e.preventDefault();
        // $(".tab").addClass("d-none"); $(".navigator").removeClass("active");
        // $($(this).attr("href")).removeClass("d-none");
        $(".navigator").parent().removeClass("mm-active");
        $(this).parent().addClass("mm-active");
    })

    $(document).on("click", ".addColor", function () {
        $(this).parent().find("select").addClass("d-none");
        $(this).parent().find("select").val("");
        $(this).parent().find("input").removeClass("d-none");
    })

    $(document).on("click", ".slctColor", function () {
        $(this).parent().find("input").addClass("d-none");
        $(this).parent().find("input").val("");
        $(this).parent().find("select").removeClass("d-none");
    })

    // UPLOAD COMPONENTS HANDLING

    // uploadBezel function
    $(document).on("click", "#addBezel", function (e) {
        e.preventDefault();
        if ($('#uploadBezel').val() == '') {
            // alert('Please selet file');
            $("#bezelNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Upload Image!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else if ($("#bezelForm").find("select[name='watch']").val() == "") {
            $("#bezelNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Watch!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        }
        else if ($("#bezelForm").find("select[name='color']").val() == "" && $("#bezelForm").find("input[name='newColor']").val() == "") {
            $("#bezelNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Color!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else {
            $.ajax({
                type: "POST",
                url: "./admin_func.php?act=uploadBezel",
                data: new FormData(document.getElementById("bezelForm")),
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    res = JSON.parse(res);
                    // console.log(res)
                    if (res['result'] == "Uploaded" && res['status'] == "200") {
                        $('#uploadBezel').val("");
                        $("#bezelNotify").html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Bezel Uploaded Successfully!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                        $("#bezelForm").find("select[name='color']").val('');
                        $("#bezelForm").find("input[name='newColor']").val('');
                        $("#bezelForm").find("select[name='watch']").val('');
                    } else {
                        $("#bezelNotify").html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
                    }
                },
                error: err => console.log(err)
            });
        }
    });

    // uploadMenCase function
    $(document).on("click", "#addMenCase", function (e) {
        e.preventDefault();
        if ($('#uploadMenCase').val() == '') {
            // alert('Please selet file');
            $("#menCaseNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Upload Image!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else if ($("#menCaseForm").find("select[name='watch']").val() == "") {
            $("#menCaseNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Watch!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else if ($("#menCaseForm").find("select[name='color']").val() == "" && $("#menCaseForm").find("input[name='newColor']").val() == "") {
            $("#menCaseNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Color!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        }
        else {
            $.ajax({
                type: "POST",
                url: "./admin_func.php?act=uploadMenCase",
                data: new FormData(document.getElementById("menCaseForm")),
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    res = JSON.parse(res);
                    // console.log(res)
                    if (res['result'] == "Uploaded" && res['status'] == "200") {
                        $('#uploadMenCase').val("");
                        $("#menCaseNotify").html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Men Case Uploaded Successfully!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                        $("#menCaseForm").find("select[name='color']").val('');
                        $("#menCaseForm").find("input[name='newColor']").val('');
                        $("#menCaseForm").find("select[name='watch']").val('');
                    } else {
                        $("#menCaseNotify").html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
                    }
                },
                error: err => console.log(err)
            });
        }
    });

    // uploadWomenCase function
    $(document).on("click", "#addWomenCase", function (e) {
        e.preventDefault();
        if ($('#uploadWomenCase').val() == '') {
            // alert('Please selet file');
            $("#womenCaseNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Upload Image!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else if ($("#womenCaseForm").find("select[name='watch']").val() == "") {
            $("#womenCaseNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Watch!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else if ($("#womenCaseForm").find("select[name='color']").val() == "" && $("#womenCaseForm").find("input[name='newColor']").val() == "") {
            $("#womenCaseNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Color!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        }
        else {
            $.ajax({
                type: "POST",
                url: "./admin_func.php?act=uploadWomenCase",
                data: new FormData(document.getElementById("womenCaseForm")),
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    res = JSON.parse(res);
                    // console.log(res)
                    if (res['result'] == "Uploaded" && res['status'] == "200") {
                        $('#uploadWomenCase').val("");
                        $("#womenCaseNotify").html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Women Case Uploaded Successfully!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                        $("#womenCaseForm").find("select[name='color']").val('');
                        $("#womenCaseForm").find("input[name='newColor']").val('');
                        $("#womenCaseForm").find("select[name='watch']").val('');
                    } else {
                        $("#womenCaseNotify").html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
                    }
                },
                error: err => console.log(err)
            });
        }
    });

    // uploadDiamondBezel function
    $(document).on("click", "#addDiamondBezel", function (e) {
        e.preventDefault();
        if ($('#uploadDiamondBezel').val() == '') {
            // alert('Please selet file');
            $("#DiamondBezelNotify").html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Please Upload Image!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                `);
        } else if ($("#DiamondBezelForm").find("select[name='watch']").val() == "") {
            $("#DiamondBezelNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Watch!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else if ($("#DiamondBezelForm").find("select[name='color']").val() == "" && $("#DiamondBezelForm").find("input[name='newColor']").val() == "") {
            $("#DiamondBezelNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Color!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else {
            $.ajax({
                type: "POST",
                url: "./admin_func.php?act=uploadDiamondBezel",
                data: new FormData(document.getElementById("DiamondBezelForm")),
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    res = JSON.parse(res);
                    // console.log(res)
                    if (res['result'] == "Uploaded" && res['status'] == "200") {
                        $('#uploadDiamondBezel').val("");
                        $("#DiamondBezelNotify").html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Diamond Bezel Uploaded Successfully!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            `);
                        $("#DiamondBezelForm").find("select[name='color']").val('');
                        $("#DiamondBezelForm").find("input[name='newColor']").val('');
                        $("#DiamondBezelForm").find("select[name='watch']").val('');
                    } else {
                        $("#DiamondBezelNotify").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                    }
                },
                error: err => console.log(err)
            });
        }
    });

    // uploadFace function
    $(document).on("click", "#addFace", function (e) {
        e.preventDefault();
        if ($('#uploadFace').val() == '') {
            // alert('Please selet file');
            $("#faceNotify").html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please Upload Image!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
        } else if ($("#faceForm").find("select[name='watch']").val() == "") {
            $("#faceNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Watch!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        }
        else if ($("#faceForm").find("select[name='color']").val() == "" && $("#faceForm").find("input[name='newColor']").val() == "") {
            $("#faceNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Color!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else {
            $.ajax({
                type: "POST",
                url: "./admin_func.php?act=uploadFace",
                data: new FormData(document.getElementById("faceForm")),
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    res = JSON.parse(res);
                    // console.log(res)
                    if (res['result'] == "Uploaded" && res['status'] == "200") {
                        $('#uploadFace').val("");
                        $("#faceNotify").html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Face Uploaded Successfully!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                `);
                        $("#faceForm").find("select[name='color']").val('');
                        $("#faceForm").find("input[name='newColor']").val('');
                        $("#faceForm").find("select[name='watch']").val('');
                    } else {
                        $("#faceNotify").html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            `);
                    }
                },
                error: err => console.log(err)
            });
        }
    });

    // uploadLumi function
    $(document).on("click", "#addLumi", function (e) {
        e.preventDefault();
        if ($('#uploadLumi').val() == '') {
            // alert('Please selet file');
            $("#lumiNotify").html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please Upload Image!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
        } else if ($("#lumiForm").find("select[name='style']").val() == "") {
            $("#lumiNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Style!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        }
        else if ($("#lumiForm").find("select[name='color']").val() == "" && $("#lumiForm").find("input[name='newColor']").val() == "") {
            $("#lumiNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Color!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else {
            $.ajax({
                type: "POST",
                url: "./admin_func.php?act=uploadLumi",
                data: new FormData(document.getElementById("lumiForm")),
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    res = JSON.parse(res);
                    // console.log(res)
                    if (res['result'] == "Uploaded" && res['status'] == "200") {
                        $('#uploadLumi').val("");
                        $("#lumiNotify").html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Hands Lumi Uploaded Successfully!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                `);
                        $("#lumiForm").find("select[name='color']").val('');
                        $("#lumiForm").find("input[name='newColor']").val('');
                        $("#lumiForm").find("select[name='watch']").val('');
                    } else {
                        $("#lumiNotify").html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            `);
                    }
                },
                error: err => console.log(err)
            });
        }
    });

    // uploadTip function
    $(document).on("click", "#addTip", function (e) {
        e.preventDefault();
        if ($('#uploadTip').val() == '') {
            // alert('Please selet file');
            $("#tipNotify").html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please Upload Image!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
        } else if ($("#tipForm").find("select[name='watch']").val() == "") {
            $("#tipNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Watch!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        }
        else if ($("#tipForm").find("select[name='color']").val() == "" && $("#tipForm").find("input[name='newColor']").val() == "") {
            $("#tipNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Color!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else {
            $.ajax({
                type: "POST",
                url: "./admin_func.php?act=uploadTip",
                data: new FormData(document.getElementById("tipForm")),
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    res = JSON.parse(res);
                    // console.log(res)
                    if (res['result'] == "Uploaded" && res['status'] == "200") {
                        $('#uploadTip').val("");
                        $("#tipNotify").html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Hands Tip Uploaded Successfully!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                `);
                        $("#tipForm").find("select[name='color']").val('');
                        $("#tipForm").find("input[name='newColor']").val('');
                        $("#tipForm").find("select[name='watch']").val('');
                    } else {
                        $("#tipNotify").html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            `);
                    }
                },
                error: err => console.log(err)
            });
        }
    });

    // uploadHands function
    $(document).on("click", "#addHands", function (e) {
        e.preventDefault();
        if ($('#uploadHands').val() == '') {
            // alert('Please selet file');
            $("#handsNotify").html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please Upload Image!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
        } else if ($("#handsForm").find("select[name='style']").val() == "") {
            $("#handsNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Style!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        }
        else if ($("#handsForm").find("select[name='color']").val() == "" && $("#handsForm").find("input[name='newColor']").val() == "") {
            $("#handsNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Color!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else {
            $.ajax({
                type: "POST",
                url: "./admin_func.php?act=uploadHands",
                data: new FormData(document.getElementById("handsForm")),
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    res = JSON.parse(res);
                    // console.log(res)
                    if (res['result'] == "Uploaded" && res['status'] == "200") {
                        $('#uploadHands').val("");
                        $("#handsNotify").html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Hands Uploaded Successfully!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                `);
                        $("#handsForm").find("select[name='color']").val('');
                        $("#handsForm").find("input[name='newColor']").val('');
                        $("#handsForm").find("select[name='watch']").val('');
                    } else {
                        $("#handsNotify").html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            `);
                    }
                },
                error: err => console.log(err)
            });
        }
    });

    // uploadSecondHand function
    $(document).on("click", "#addSecondHand", function (e) {
        e.preventDefault();
        if ($('#uploadSecondHand').val() == '') {
            // alert('Please selet file');
            $("#secondHandNotify").html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please Upload Image!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
        } else if ($("#secondHandForm").find("select[name='style']").val() == "") {
            $("#secondHandNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Style!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        }
        else if ($("#secondHandForm").find("select[name='color']").val() == "" && $("#handsForm").find("input[name='newColor']").val() == "") {
            $("#secondHandNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Color!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else {
            $.ajax({
                type: "POST",
                url: "./admin_func.php?act=uploadSecondHand",
                data: new FormData(document.getElementById("secondHandForm")),
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    res = JSON.parse(res);
                    // console.log(res)
                    if (res['result'] == "Uploaded" && res['status'] == "200") {
                        $('#uploadSecondHand').val("");
                        $("#secondHandNotify").html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Hands Uploaded Successfully!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                `);
                        $("#handsForm").find("select[name='color']").val('');
                        $("#handsForm").find("input[name='newColor']").val('');
                        $("#handsForm").find("select[name='watch']").val('');
                    } else {
                        $("#secondHandNotify").html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            `);
                    }
                },
                error: err => console.log(err)
            });
        }
    });

    // uploadStrap function
    $(document).on("click", "#addStrap", function (e) {
        e.preventDefault();
        if ($('#uploadStrap').val() == '') {
            // alert('Please selet file');
            $("#strapNotify").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Please Upload Image!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
        } else if ($("#strapForm").find("select[name='watch']").val() == "") {
            $("#strapNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Watch!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else if ($("#strapForm").find("select[name='color']").val() == "" && $("#strapForm").find("input[name='newColor']").val() == "") {
            $("#strapNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Color!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        }
        else {
            $.ajax({
                type: "POST",
                url: "./admin_func.php?act=uploadStrap",
                data: new FormData(document.getElementById("strapForm")),
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    res = JSON.parse(res);
                    // console.log(res)
                    if (res['result'] == "Uploaded" && res['status'] == "200") {
                        $('#uploadStrap').val("");
                        $("#strapNotify").html(`
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Strap Uploaded Successfully!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    `);
                        $("#strapForm").find("select[name='color']").val('');
                        $("#strapForm").find("input[name='newColor']").val('');
                        $("#strapForm").find("select[name='watch']").val('');
                    } else {
                        $("#strapNotify").html(`
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                `);
                    }
                },
                error: err => console.log(err)
            });
        }
    });

    // uploadWinder function
    $(document).on("click", "#addWinder", function (e) {
        e.preventDefault();
        if ($('#uploadWinder').val() == '') {
            // alert('Please selet file');
            $("#winderNotify").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Please Upload Image!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
        } else if ($("#winderForm").find("select[name='watch']").val() == "") {
            $("#winderNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Watch!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        } else if ($("#winderForm").find("select[name='color']").val() == "" && $("#winderForm").find("input[name='newColor']").val() == "") {
            $("#winderNotify").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please Select Color!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `);
        }
        else {
            $.ajax({
                type: "POST",
                url: "./admin_func.php?act=uploadWinder",
                data: new FormData(document.getElementById("winderForm")),
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    res = JSON.parse(res);
                    // console.log(res)
                    if (res['result'] == "Uploaded" && res['status'] == "200") {
                        $('#uploadWinder').val("");
                        $("#winderNotify").html(`
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Winder Uploaded Successfully!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    `);
                        $("#winderForm").find("select[name='color']").val('');
                        $("#winderForm").find("input[name='newColor']").val('');
                        $("#winderForm").find("select[name='watch']").val('');
                    } else {
                        $("#winderNotify").html(`
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                `);
                    }
                },
                error: err => console.log(err)
            });
        }
    });

    // uploadSkull function
    $(document).on("click", "#addSkull", function (e) {
        e.preventDefault();
        if ($('#uploadSkull').val() == '') {
            // alert('Please selet file');
            $("#skullNotify").html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please Upload Image!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
        } else {
            $.ajax({
                type: "POST",
                url: "./admin_func.php?act=uploadSkull",
                data: new FormData(document.getElementById("skullForm")),
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    res = JSON.parse(res);
                    // console.log(res)
                    if (res['result'] == "Uploaded" && res['status'] == "200") {
                        $('#uploadSkull').val("");
                        $("#skullNotify").html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Skull Uploaded Successfully!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                `);
                    } else if (res['error'] == "File already exists") {
                        $("#skullNotify").html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            `);
                    } else {
                        $("#skullNotify").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strongSomething Went Wrong!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `);
                    }
                },
                error: err => console.log(err)
            });
        }
    });

    // // uploadHour function
    // $(document).on("change", "#uploadHour", function () {
    //     if ($('#uploadHour').val() == '') {
    //         // alert('Please selet file');
    //         $("#hourNotify").html(`
    //                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                     <strong>Please Upload Image!</strong>
    //                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                 </div>
    //                 `);
    //     } else {
    //         $.ajax({
    //             type: "POST",
    //             url: "./admin_func.php?act=uploadHour",
    //             data: new FormData(document.getElementById("hourForm")),
    //             cache: false,
    //             contentType: false,
    //             processData: false,
    //             success: function (res) {
    //                 res = JSON.parse(res);
    //                 // console.log(res)
    //                 if (res['result'] == "Uploaded" && res['status'] == "200") {
    //                     $('#uploadHour').val("");
    //                     $("#hourNotify").html(`
    //                             <div class="alert alert-success alert-dismissible fade show" role="alert">
    //                                 <strong>Hour Hand Uploaded Successfully!</strong>
    //                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                             </div>
    //                             `);
    //                 } else {
    //                     $("#hourNotify").html(`
    //                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                             <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
    //                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                         </div>
    //                         `);
    //                 }
    //             },
    //             error: err => console.log(err)
    //         });
    //     }
    // });

    // // uploadMin function
    // $(document).on("change", "#uploadMin", function () {
    //     if ($('#uploadMin').val() == '') {
    //         // alert('Please selet file');
    //         $("#minNotify").html(`
    //                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                     <strong>Please Upload Image!</strong>
    //                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                 </div>
    //                 `);
    //     } else {
    //         $.ajax({
    //             type: "POST",
    //             url: "./admin_func.php?act=uploadMin",
    //             data: new FormData(document.getElementById("minForm")),
    //             cache: false,
    //             contentType: false,
    //             processData: false,
    //             success: function (res) {
    //                 res = JSON.parse(res);
    //                 // console.log(res)
    //                 if (res['result'] == "Uploaded" && res['status'] == "200") {
    //                     $('#uploadMin').val("");
    //                     $("#minNotify").html(`
    //                             <div class="alert alert-success alert-dismissible fade show" role="alert">
    //                                 <strong>Minute Hand Uploaded Successfully!</strong>
    //                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                             </div>
    //                             `);
    //                 } else {
    //                     $("#minNotify").html(`
    //                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                             <strong>File With Same Name Already Exists Or Invalid File Type!</strong>
    //                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                         </div>
    //                         `);
    //                 }
    //             },
    //             error: err => console.log(err)
    //         });
    //     }
    // });

})