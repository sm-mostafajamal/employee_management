function changeImg() {
  $("#file_upload").click();
  $("#file_upload").change((e) => {
    e.preventDefault();
    let img = $("#file_upload").prop("files");
    if (img.length > 0) {
      document.getElementById("uploaded_img").src = URL.createObjectURL(img[0]);
    }
  });
}

function createUser() {
  let img = $("#file_upload").prop("files");

  let form_data = new FormData();
  // get all the values from input
  const inputData = JSON.stringify({
    age: $("option[value]:checked").val(),
    name: $("#fname").val(),
    gender: $("input[name=gender]:checked").val(),
    skills: $("input[name=skill]:checked")
      .map((v, el) => $(el).val())
      .get(),
    desc: $("#desc").val(),
  });

  form_data.append("image", img[0]);
  form_data.append("inputData", inputData);

  //  checking blank input
  if (img.length <= 0) {
    $("#imgErr").text("Upload an image!!!");
  } else if (!$("#fname").val().length) {
    $("#name").text("Name is required!!!");
  } else if ($("option[value]:checked").val() === undefined) {
    $("#name").text("Age is required!!!");
  } else if ($("input[name=gender]:checked").val() === undefined) {
    $("#genderErr").text("Select gender!!!");
  } else if (
    !$("input[name=skill]:checked")
      .map((v, el) => $(el).val())
      .get().length
  ) {
    $("#skillsErr").text("Select at least one skill!!!");
  } else {
    return sendUserData(form_data);
  }
}

const sendUserData = (data) => {
  $.ajax({
    url: "create.php",
    type: "POST",
    data: data,
    contentType: false,
    processData: false,
    success: (data, status) => {
      window.location = "index.php";
    },
  });
};
