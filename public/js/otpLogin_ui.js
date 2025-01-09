console.log("this is otpLogin_ui.js" );
// OTP-LOGIN_____
const input = document.getElementById("input");
const lanjutkan = document.getElementById("lanjutkan");
input.addEventListener("input", () => {
  if (isNaN(input.value)) {
    input.value = "";
  } else {
    if (input.value.length === 6) {
      lanjutkan.classList.replace("none", "active");
    } else if (input.value.length > 6) {
      input.value = input.value.slice(0, -1);
    } else {
      lanjutkan.classList.replace("active", "none");
    }
  }
});
