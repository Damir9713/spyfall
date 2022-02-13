$(document).ready(function () {
  $(".missioninfo").click(function () {
    var missionid = $(this).data("id");
    $.ajax({
      url: "missionfile.php",
      type: "post",
      data: { missionid: missionid },
      success: function (response) {
        $(".modal-details").html(response);
        $("#staticBackdrop").modal("show");
      },
    });
  });
});
//

$(document).ready(function () {
  $(".agentinfo").click(function () {
    var userid = $(this).data("id");
    $.ajax({
      url: "agentfile.php",
      type: "post",
      data: { userid: userid },
      success: function (response) {
        $(".modal-agents").html(response);
        $("#modal2").modal("show");
      },
    });
  });
});

$(document).ready(function () {
  $(".contactinfo").click(function () {
    var contactid = $(this).data("id");
    $.ajax({
      url: "Contact.php",
      type: "post",
      data: { contactid: contactid },
      success: function (response) {
        $(".modal-contact").html(response);
        $("#modal3").modal("show");
      },
    });
  });
});

$(document).ready(function () {
  $(".targetinfo").click(function () {
    var targetid = $(this).data("id");
    $.ajax({
      url: "target.php",
      type: "post",
      data: { targetid: targetid },
      success: function (response) {
        $(".modal-target").html(response);
        $("#modal4").modal("show");
      },
    });
  });
});

$(document).ready(function () {
  $(".planqueinfo").click(function () {
    var planqueid = $(this).data("id");
    $.ajax({
      url: "planqueinfo.php",
      type: "post",
      data: { planqueid: planqueid },
      success: function (response) {
        $(".modalplanque").html(response);
        $("#modal5").modal("show");
      },
    });
  });
});
