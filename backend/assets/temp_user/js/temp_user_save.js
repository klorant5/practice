$("#tempusersaveform-create_new_user").on("click", function ()
{
    $(".existing_num_input").toggleClass("hidden");
    $(".existing_num_input input").prop("value", "");
});

$("#tempusersaveform-inactivate").on("click", function ()
{
    $(".creator_inputs").toggleClass("hidden");
    $(".existing_num_input input").prop("value", "");
});

