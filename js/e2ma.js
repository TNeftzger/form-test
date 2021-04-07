jQuery(document).ready(function($) {

  let memberData = {};
  const fields = [
    {
      'shortcut' : 'first_name'
    }, {
      'shortcut' : 'last_name'
    }, {
      'shortcut' : 'subscriptions',
      'multiple_inputs' : true,
      'type': 'arr'
    }
  ]
  const opt_in_confirmation = false;
  const group_ids = [17142795];
  const signup_form_id = 1874746;
  const e = GetQueryStringParams("e");
  const mid = GetQueryStringParams("mid");
  const $contactViews = $("#welcomePersonalized, #manageButtons");
  const $form = $("#form");
  const $manage = $("#manage");
  const $useremail = $("#useremail");
  const $optoutPrevious = $("#optoutPrevious");
  const $manageNoEmail = $("#manageNoEmail");
  const $optoutSuccess = $("#optoutSuccess");
  const $optout = $("#optout");
  const $recieveOptions = $("#recieve-options");
  const $updateMemberBtn = $('#submitCont, #saveChanges');
  const $subscriptions = $(`input[id^="subscriptions"]`);
  const $initalHides = $("#manage, #classic, #updateFailure, #form, #contactFailure, #formHeaderSuccess, #manageNoEmail");
  const reduceMap = {
    "arr" : {
      "method": function(acc, i){ 
        console.log($(i).val())
        acc.push($(i).val()); 
        return acc; 
      },
      "init": []
    },
    "str": {
      "method": function(acc, i){ 
        acc += $(i).val(); 
        return acc; 
      },
      "init": ""
    }
  }

  $form.trigger('reset');
  $useremail.text(e);
  $optout.on('click', optoutMember);
  $subscriptions.on('click', toggleOptions);

  /* set form options on load */
	$initalHides.hide();
 	/* get member record via ajax calling e2ma-get.php */
	$.ajax({
		type: 'GET',
		url: 'api/e2ma-get.php?memberid='+mid+'&email='+encodeURIComponent(e),
		async: false,
		contentType: "application/json",
		dataType: 'json',
		success: successGetMember,
		error: errorGetMember
	});

  /* Validates form and submits if validation is passed */
  $updateMemberBtn.on('click', updateMember);

  function toggleOptions(){
    $recieveOptions.show();
  }

  function populateForm() {
    var obj = $.parseJSON(memberData);
    $("#id_member_id").val((obj['member_id']));
    $("#email").val((obj['email']));
    fields.forEach(function(field) {
      if(field.multiple_inputs && obj.fields[field.shortcut]) {
        if(field.type === "arr"){
          obj.fields[field.shortcut].forEach(function(d){
            $(`#${field.shortcut}_${d.split(" ").join("-")}`)
              .prop("checked", true)
          })
        }else{
          $(`#${field.shortcut}_${obj.fields[field.shortcut].split(" ").join("-")}`).prop("checked", true)
        }
      } else {
        $(`#${field.shortcut}`).val(function(){
          return obj.fields[field.shortcut];
        })
      }
    })
  }

  function updateMember() {
    var data = compileMemberData();

    $.ajax({
      type: "POST",
      cache: false,
      async: false,
      url : 'api/e2ma-update.php?memberid='+mid,
      contentType: 'application/json',
      dataType: 'json',
      data: data,
      beforeSend: optoutBeforeSend, 
      success: sendSuccess,
      error: sendError
    });
  }

  function sendError() {
    $("#contactFailure").show(); 
    $("#form").removeClass('loading'); 
  }

  function errorGetMember() {
    $("#contactFailure").show();
    $("#form").removeClass("loading");
  }

  /* OPTOUT A MEMBER FUNCTION */
  function optoutMember() {
    const email = encodeURIComponent(e);
    $.ajax({
        type: "POST",
        cache: false,
        async: false,
        url : `api/e2ma-optout.php?email=${email}`,
        data: "{}",
        contentType: 'application/json',
        dataType: 'json',
        beforeSend: optoutBeforeSend, 
        success: optoutSuccess,
        error: optoutError
    });
  }

  function getFieldValues() {
    return fields.reduce(function(obj, item){
      if(item.multiple_inputs) {
        const method = reduceMap[item.type].method
        const init = reduceMap[item.type].init
        const $el = $(`input[id^="${item.shortcut}"]:checked`);
        obj[item.shortcut] = $el.toArray().reduce(method, init);

        return obj;
      } else {
        $el = $(`#${item.shortcut}`);
        obj[item.shortcut] = $el.val();
        return obj;
      }
    }, {})
  }

  function sendSuccess(response) {
    if (response == 1) {
      $("#form, #manageWelcome").hide();
      $("#updateSuccess").show();
      $("#form").removeClass( "loading" );
      $('#updatedemail').html(e);
    }
  }

  function optoutSuccess(response) {
    if (response == 1) {
      $optoutSuccess.hide();
      $optoutPrevious.show();
    }
  }

  function optoutBeforeSend() {
    $("#form").addClass( "loading" );
  }

  function optoutError(postjson) {
    $("#contactFailure").show();
    $("#form").removeClass('loading');
  }

  function compileMemberData() {
    const source = "updatedByTechServCustomForm";
    const fields = getFieldValues();
    const email = e;
    const data = {email, ...fields, source, group_ids, signup_form_id, opt_in_confirmation};
    const data_string = JSON.stringify(data)
    return data_string;
  }

  function successGetMember(data) {
    $manage.show();
    memberData = JSON.stringify(data);
    showCorrectView();
  }

  function showCorrectView() {
    var obj = $.parseJSON(memberData);
    console.log(memberData);
    if ( obj["error"] == "User not found." ) {
      $contactViews.hide();
      $manageNoEmail.show();
    } else if ( obj["status"] == "opt-out" ) {
      $contactViews.hide();
      $form.removeClass("loading");
      $manage.hide();
      $optoutPrevious.show();
    } else if (typeof obj["error"] == "undefined") {
      $form.removeClass("loading");
      populateForm();
    } else {
      $manageNoEmail.show();
      $form.removeClass("loading");
    }
  }

  /* Gets Values from URL parameters/querystrings */
  function GetQueryStringParams(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sPageURL = decodeURIComponent(sPageURL); 
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
      var sParameterName = sURLVariables[i].split('=');
      if (sParameterName[0] == sParam)
      {
        return sParameterName[1];
      }
    }
  }

});